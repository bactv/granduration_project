<?php
/**
 * Created by PhpStorm.
 * User: Bac Truong Van
 * Date: 16/03/2017
 * Time: 1:00 SA
 */
namespace console\controllers;

use backend\models\Agreement;
use backend\models\AgreementAddendum;
use backend\models\Party;
use backend\models\Question;
use backend\models\QuestionAnswer;
use backend\models\Quiz;
use backend\models\Student;
use Yii;
use yii\console\Controller;

class FakerTestController extends Controller
{
    public function actionTestParty($count = 10)
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < $count; $i++) {
            $object = new Party();
            $object->party_type_id = 1;
            $object->party_name = $faker->name;
            $object->party_rep_title = $faker->name;
            $object->party_address = $faker->address;
            $object->party_tax_code = "$faker->randomNumber(9)";
            $object->party_phone = "$faker->phoneNumber";
            $object->party_created_time = $faker->date('Y-m-d H:i:s');
            $object->party_updated_time = $faker->date('Y-m-d H:i:s');
            $object->save();
        }
    }

    public function actionTestAgreement($count = 5)
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < $count; $i++) {
            $object = new Agreement();
            $object->agreement_code = $faker->unique()->sentence(5);
            $object->party_id_a = 1;
            $object->party_id_b = $faker->unique()->numberBetween(2, 11);
            $object->agreement_signed_date = $faker->date('Y-m-d');
            $object->agreement_effective_date = $faker->date('Y-m-d');
            $object->agreement_right_ids = json_encode($faker->randomElements(array(1, 2), $faker->randomElement(array(1, 2))));
            $object->agreement_type_id = $faker->numberBetween(1, 2);
            $object->mg = ($object->agreement_type_id == 1 ? $faker->randomFloat(4) : 0);
            $object->agreement_created_time = $faker->date('Y-m-d H:i:s');
            $object->agreement_updated_time = $faker->date('Y-m-d H:i:s');
            $object->save();
        }
    }

    public function actionTestAgreementAddendum($count = 20)
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < $count; $i++) {
            $object = new AgreementAddendum();
            $object->agreement_id = $faker->numberBetween(1, 5);
            $object->addendum_number = $faker->unique()->streetAddress;
            $object->addendum_content = $faker->sentence(30);
            $object->addendum_created_time = $faker->date('Y-m-d H:i:s');
            $object->addendum_updated_time = $faker->date('Y-m-d H:i:s');
            $object->save();
        }
    }

    public function actionTestQuestion($count = 1000)
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < $count; $i++) {
            $object = new Question();
            $object->question_content = $faker->unique()->sentence(17) . ' ?';
            if ($object->save()) {
                $random_true = mt_rand(0, 3);
                for ($j = 0; $j < 4; $j++) {
                    $object2 = new QuestionAnswer();
                    $object2->question_id = $object->question_id;
                    $object2->question_content = $object->question_content;
                    $object2->ans_content = $faker->unique()->sentence(2);
                    if ($j == $random_true) {
                        $object2->is_true = 1;
                    }
                    $object2->save();
                }
            }
        }
    }

    public function actionTestQuiz($count = 100)
    {
        $faker = \Faker\Factory::create();

        $class_ids = [1,2,3,4,5,6,7,8,9,10,11,12];
        $subject_ids = [1,2,3,4,5,6,7,8];
        $type = [1,2,3,4,5,6];

        $allQuestions = Question::findAll(['status' => 1]);
        $arr_question_ids = [];
        foreach ($allQuestions as $q) {
            $arr_question_ids[] = $q->question_id;
        }

        for ($i = 0; $i < $count; $i++) {
            $object = new Quiz();
            $object->quiz_name = $faker->unique()->sentence(6);
            $object->quiz_description = $faker->unique()->sentence(20);
            $object->quiz_type_id = $faker->randomElement($type);
            $object->quiz_level = $faker->randomElement(['easy', 'normal', 'hard']);
            $object->subject_id = $faker->randomElement($subject_ids);
            $object->class_level_id = $faker->randomElement($class_ids);

            // số câu hỏi theo đề thi
            if ($object->quiz_type_id == 1) {
                $num_questions = 20;
            } else if ($object->quiz_type_id == 2) {
                $num_questions = 40;
            } else if ($object->quiz_type_id == 3) {
                $num_questions = 50;
            } else if ($object->quiz_type_id == 4) {
                $num_questions = 50;
            } else if ($object->quiz_type_id == 5) {
                $num_questions = 50;
            } else {
                $num_questions = 50;
            }
            $object->question_ids = json_encode($faker->randomElements($arr_question_ids, $num_questions));
            $object->section = $faker->unique()->sentence(5);
            $object->price = mt_rand(0, 1000);
            $object->save();
        }
    }

    public function actionTestStudent($count = 5)
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < $count; $i++) {
            $model = new Student();
            $model->std_username = strtolower($faker->unique()->firstNameMale);
            $model->std_password = Yii::$app->security->generatePasswordHash($faker->randomElement(['123456', '13579', '02468']));
            $model->std_full_name = $faker->name;
            $model->save();
        }
    }
}