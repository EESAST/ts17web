<?php

namespace app\controllers;

use Yii;

class SupportingFilesController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	if (Yii::$app->user->isGuest) {
            return $this->render('/site/index');
        }//如果没登陆就进不了下载页面
        return $this->render('index');
    }

}
