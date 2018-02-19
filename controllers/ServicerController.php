<?php

namespace app;

class ServicerController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
