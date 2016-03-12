<?php

namespace app\models;

use Yii;
use yii\base\Model;

use app\models\User;

/**
 * LoginForm is the model behind the login form.
 */
class VerifyoldpwdForm extends Model
{
    public $verifypwd;
    public $newpwd;
    public $verifynewpwd;

    public function attributeLabels()
    {
        return [
            'newpwd' => 'newpwd',
            'verifynewpwd' => 'verifynewpwd'
        ];
    }

    public function updatepwd()
    {
        var_dump($this->getErrors());
        $user=User::findByUsername(Yii::$app->user->identity->username);
        $user->password = $this->newpwd;//Yii::$app->getSecurity()->generatePasswordHash($model->newpwd);
        if($user->update(false)){
            return $user;
        }
        return null;
    }
}
