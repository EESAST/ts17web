<?php

namespace app\controllers;

use Yii;
use app\models\User;
class DashboardController extends \yii\web\Controller
{
	public $layout = 'main1';
    public function actionIndex()
    {
    	if(Yii::$app->user->isGuest){
    		return $this->render('/site/index');
    	}
    	$user=User::findByUsername(Yii::$app->user->identity->username);
        return $this->render('index', ['model'=>$user]);
    }

}
