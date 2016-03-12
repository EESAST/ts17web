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
            'verifypwd' => 'verifypwd',
            'newpwd' => 'newpwd',
            'verifynewpwd' => 'verifynewpwd',
        ];
    }

/*
    public function rules()
    {
        return [
            [['newpwd','verifynewpwd'], 'string'],
            ['verifynewpwd', 'compare', 'compareAttribute' => 'newpwd', 'message' => '两次输入的密码不一致'],
            ['newpwd', 'min' => 6],
        ];
    }
    */
}
