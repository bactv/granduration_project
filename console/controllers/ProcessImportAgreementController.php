<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 25/03/2017
 * Time: 8:49 SA
 */
namespace console\controllers;

use backend\models\Agreement;
use console\models\AgreementTemp;
use console\models\ImportFile;
use Yii;
use yii\console\Controller;
use arogachev\excel\import\basic\Importer;
use yii\helpers\Html;

class ProcessImportAgreementController extends Controller
{
    /**
     * Xử lý
     */
    public function actionProcess()
    {
        $this->processFile();
        $this->insertToDb();
    }

    /**
     * Insert to agreement_temp
     */
    private function processFile()
    {
        $allFileDB = ImportFile::findAll(['status' => 0, 'type' => 'agreement']);
        $arr_file_ids = [];
        $arr_file_needed_update = [];

        $path = Yii::getAlias('@backend') . '/web' . Yii::$app->params['storage_url'] . 'agreement/';
        $list_files = glob($path . '*.xlsx');
        if (!empty($list_files)) {
            foreach ($list_files as $file) {
                $id = substr(basename($file), 0, -5);
                $arr_file_ids[] = $id;
            }
        }
        foreach ($allFileDB as $item) {
            if (in_array($item->id, $arr_file_ids)) {
                $arr_file_needed_update[] = $path . $item->id . '.xlsx';
            }
        }

        foreach ($arr_file_needed_update as $file) {
            $importer = new Importer([
                'filePath' => $file,
                'standardModelsConfig' => [
                    [
                        'className' => AgreementTemp::className(),
                        'standardAttributesConfig' => [
                            [
                                'name' => 'agreement_code',
                                'label' => 'Số HĐ'
                            ],
                            [
                                'name' => 'party_id_a',
                                'label' => 'Bên A (Hệ Thống Study.EDU)',
                                'valueReplacement' => function ($value) {
                                    return ($value == '' ? 1 : $value);
                                },
                            ],
                            [
                                'name' => 'party_id_b',
                                'label' => 'Bên B (Bên Cung Cấp ND | Giáo viên)'
                            ],
                            [
                                'name' => 'agreement_signed_date',
                                'label' => 'Ngày ký HĐ',
                                'valueReplacement' => function ($value) {
                                    return \PHPExcel_Style_NumberFormat::toFormattedString("$value", \PHPExcel_Style_NumberFormat::FORMAT_DATE_YYYYMMDD2);
                                },
                            ],
                            [
                                'name' => 'agreement_effective_date',
                                'label' => 'Ngày Hiệu Lực HĐ',
                                'valueReplacement' => function ($value) {
                                    return \PHPExcel_Style_NumberFormat::toFormattedString("$value", \PHPExcel_Style_NumberFormat::FORMAT_DATE_YYYYMMDD2);
                                },
                            ],
                            [
                                'name' => 'agreement_right_ids',
                                'label' => 'Quyền HĐ',
                                'valueReplacement' => function ($value) {
                                    return "$value";
                                },
                            ],
                            [
                                'name' => 'agreement_type_id',
                                'label' => 'Loại HĐ'
                            ],
                            [
                                'name' => 'mg',
                                'label' => 'Số Tiền Thanh Toán',
                                'valueReplacement' => function ($value) {
                                    return ($value == '' ? 0 : $value);
                                },
                            ],
                        ],
                    ],
                ],
            ]);

            if (!$importer->run()) {
                echo $importer->error;

                if ($importer->wrongModel) {
                    echo Html::errorSummary($importer->wrongModel);
                }
            } else {
                $id = substr(basename($file), 0, -5);
                Yii::$app->db->createCommand()->update('import_file', ['status' => 1], ['id' => $id])->execute();
            }
        }
    }

    /**
     * Update database
     */
    private function insertToDb()
    {
        $allData = AgreementTemp::findAll(['status' => 0]);
        foreach ($allData as $dt) {
            $model = Agreement::findOne(['agreement_code' => $dt['agreement_code']]);
            if (!empty($model)) {
                continue;
            }
            $model = new Agreement();
            $model->agreement_code = $dt->agreement_code;
            $model->party_id_a = $dt->party_id_a;
            $model->party_id_b = $dt->party_id_b;
            $model->agreement_signed_date = $dt->agreement_signed_date;
            $model->agreement_effective_date = $dt->agreement_effective_date;
            $model->agreement_type_id = $dt->agreement_type_id;
            $model->mg = $dt->mg;

            $arr_right = [];
            $rights = explode(',', $dt->agreement_right_ids);
            foreach($rights as $id) {
                if (trim($id) != '') {
                    $arr_right[] = trim($id);
                }
            }
            $model->agreement_right_ids = json_encode($rights);

            if (!$model->save()) {
                break;
            } else {
                Yii::$app->db->createCommand()->update('agreement_temp', ['status' => 1], ['id' => $dt->id])->execute();
            }
         }
    }
}