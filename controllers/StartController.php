<?php

namespace app\controllers;

class StartController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
