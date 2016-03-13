<?php

namespace app\controllers;


use Yii;
use app\models\LoginForm;


class ContactController extends \yii\web\Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }
}
?>