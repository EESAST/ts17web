<?php

namespace app\controllers;

use Yii;

class DashboardController extends \yii\web\Controller
{
	public $layout = 'main1';
    public function actionIndex()
    {
    	if(Yii::$app->user->isGuest){
    		return $this->render('/site/index');
    	}

        return $this->render('index');
    }

}
