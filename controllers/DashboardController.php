<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\ChangepwdForm;
use app\models\VerifyoldpwdForm;
use yii\db\ActiveRecord;


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

    public function actionVerifyoldpwd()
    {
    	if(Yii::$app->user->isGuest){
    		return $this->render('/site/index');
    	}
    	$user=User::findByUsername(Yii::$app->user->identity->username);

    	$model = new VerifyoldpwdForm();
       	if ($model->load(Yii::$app->request->post())) {
			if($model->verifypwd=='')return $this->redirect(['site/index']);
       		if(Yii::$app->getSecurity()->validatePassword($model->verifypwd, $user->password)){
            
        		$user->password = $this->newpwd;//Yii::$app->getSecurity()->generatePasswordHash($model->newpwd);
        		if($user->update(false)){
            		return $this->redirect(['site/index']);//(['dashboard/index']);
        		}
       		}
        }
        return $this->render('verifyoldpwd', [
            'model' => $model,
        ]);
    }

    public function actionChangepwd()
    {
    	if(Yii::$app->user->isGuest){
    		return $this->render('/site/index');
    	}

        $model = new ChangepwdForm();
       	if ($model->load(Yii::$app->request->post())) {
       		if($model->updatepwd()){
       			return $this->redirect(['site/index']);//(['dashboard/index']);
       		}
        
        }
        return $this->render('changepwd', [
            'model' => $model,
        ]);
    }


}
