<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\icons\Icon;
use backend\models\AdminAction;
use backend\models\AdminController;
use yii\helpers\Url;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $model backend\models\AdminGroup */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-group-form">

    <?php $form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => [
            'labelSpan' => 2,
            'deviceSize' => ActiveForm::SIZE_SMALL
        ]
    ]); ?>

    <?= $form->field($model, 'ad_group_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'ad_group_description')->textarea(['rows' => 5]) ?>

    <?= $form->field($model, 'ad_group_status')->checkbox(['label' => '<i>(Active | Deactive)</i>'])->label(Yii::t('cms', 'Status')) ?>

    <div class="list_permission">
        <h3><b><?php echo Yii::t('cms', 'Permissions') ?></b></h3>
        <p><?php echo Html::a(Icon::show('refresh fa-spin fa-fw') . Yii::t('cms', 'Update Router'), 'javascript:void(0);', array(
                'class' => 'btn btn-warning',
                'onclick' => 'updatePermission("' . Url::toRoute(['/update-permission/update-router']) . '")'
            )) ?></p>
        <div id="w2" class="grid-view table-responsive package">
            <table class="w0-table-admin table table-striped table-bordered">
                <thead>
                    <th>Controllers</th>
                    <th>Actions</th>
                    <th>Tất cả
                        <?php echo Html::tag('input', '', array(
                            'type' => 'checkbox',
                            'onclick' => 'checkAllControllers(this)',
                        )) ?>
                    </th>
                </thead>
                <tbody>
                <?php foreach (AdminController::getAllAdminControllers() as $controller) { ?>
                    <tr>
                        <td><?php echo Html::encode($controller['ad_controller_name']) ?></td>
                        <td>
                            <?php
                            $actions = AdminAction::getAllAdminActions(array('ad_controller_id' => $controller['ad_controller_id']));
                            $arr_action_ids = [];
                            foreach ($actions as $action) {
                                $arr_action_ids[] = $action['ad_action_id'];
                                $checked = false;
                                if (isset($actions_ids) && in_array($action['ad_action_id'], $actions_ids)) {
                                    $checked = true;
                                }
                                echo "<p>" . Html::tag('input', '', array(
                                    'type' => 'checkbox',
                                    'name' => 'action_ids[]',
                                    'value' => $action['ad_action_id'],
                                    'id' => 'all-action-' . $controller['ad_controller_id'],
                                    'checked' => $checked
                                )) . " " . $action['ad_action_name'] . "</p>";
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $checked = false;
                            if (isset($actions_ids) && array_diff($arr_action_ids, $actions_ids) == null) {
                                $checked = true;
                            }
                            ?>
                            <?php echo Html::tag('input', '', array(
                                'type' => 'checkbox',
                                'class' => 'check-all',
                                'id' => $controller['ad_controller_id'],
                                'checked' => $checked,
                                'onclick' => 'checkAllControllerPermission(this)'
                            )); ?>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <br/>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Icon::show('floppy-o') . " " .  Yii::t('cms', 'Create') : Yii::t('cms', 'Update'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Icon::show('undo') . " " .  Yii::t('cms', 'Reset'), ['class' => 'btn btn-default']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
