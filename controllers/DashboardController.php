<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\ChangepwdForm;
use app\models\VerifyoldpwdForm;
use yii\helpers\Html;

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
       	if ($model->load(Yii::$app->request->post()) ){
            $model->verifypwd = Html::encode($_POST['VerifyoldpwdForm']['verifypwd']);
            $model->newpwd = Html::encode($_POST['VerifyoldpwdForm']['newpwd']);
            $model->verifynewpwd = Html::encode($_POST['VerifyoldpwdForm']['verifynewpwd']);

       		if(Yii::$app->getSecurity()->validatePassword($model->verifypwd, $user->password)){
        		$newpwd = Yii::$app->getSecurity()->generatePasswordHash($model->newpwd);

                $user = User::findOne(['username'=>$user->username]);
                
                $user->password = $newpwd;
                $user->save(false);

                return $this->redirect(['site/index']);
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
	public function actionResetpic()
	{

		$a=$_POST['data'];
		$a=HTML::encode($a);
		$user=User::findByUsername(Yii::$app->user->identity->username);
		$user->pic=$a;

		$link = mysqli_connect("localhost","root","tttsss17","ts18web") or die("Could not connect database");
		if(mysqli_query($link,"UPDATE user SET pic = '$a'  WHERE username = '$user->username'")){

			return $this->redirect(['dashboard/index',['model'=>$user]]);
		}
		else return $this->redirect(['site/index']);//(['dashboard/index']);
	}


}
