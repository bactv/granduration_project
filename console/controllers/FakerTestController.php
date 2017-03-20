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
            $object->agreement_right_id = $faker->numberBetween(1, 2);
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
}