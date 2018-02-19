<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\ManufacturerForm;
use app\models\Address;

class ManufacturerController extends Controller
{
    // ...existing code...

    //public $modelClass = 'app\models\ManufacturerFrom';

    public function actionIndex()
    {
        $model = new ManufacturerForm();
        $addressModel = new Address();

        if ($model->load(Yii::$app->request->post()) && $addressModel->load(Yii::$app->request->post()) && $model->validate() && $addressModel->validate()) {
            //echo $addressModel->line1;
            //$address = $addressModel->save();
            //echo $address;
            //$manufacturer = $model->insert();

            return $this->render('manufacturer', ['model' => $model, 'addressModel' => $addressModel, 'saved' => true]);
        } else {
            // either the page is initially displayed or there is some validation error
            return $this->render('manufacturer', ['model' => $model, 'addressModel' => $addressModel, 'saved' => false]);
            //return $this->renderPartial(null);
        }
    }

}