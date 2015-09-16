<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

use app\models\User;

/**
 * RegisterForm is the model behind the register form.
 */
class RegisterForm extends Model
{
    public $email;
    public $username;
    public $password;
    public $password2;//password confirm
    public $realname;
    public $teamname;

    private $_user = false;

    public function attributeLabels()
    {
        return [
            'email' => '邮箱',
            'username' => '用户名',
            'password' => '密码',
            'password2' => '确认密码',
            'realname' => '真实姓名',
        ];
    }

    public function rules()
    {
        return 
        [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required','message' => '用户名不能为空'],
            ['username', 'unique', 'targetClass' => 'app\models\User', 'message' => '用户名已存在'],
            ['username', 'string', 'min' => 2, 'max' => 255],
    

            ['password', 'required','message' => '密码不能为空'],
            ['password', 'string', 'min' => 6],

            ['password2','string'],
            ['password2','compare', 'compareAttribute'=>'password','message'=>'密码不一致'],

            ['email','string'],
            ['email', 'unique', 'targetClass' => 'app\models\User', 'message' => '邮箱已存在'],

            ['realname','string'],
        ];
    }

    public function register()
    {
        
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;            
            $user->password = $this->password;
            $user->realname = $this->realname;
            $user->email = $this->email;
            $user->teamname = $this->teamname;

            $connection = \Yii::$app->db;
            $connection->createCommand()->insert('user',
                [
                'username'=>$this->username,
                'password'=>$this->password,
                'email'=>$this->email,
                'realname'=>$this->realname,
                'teamname'=>'',
            ])->execute();
            
            return $user;
        }
        return null;
        
    }

    //实现注册之后直接登录
    public function login()
    {
       
        return Yii::$app->user->login($this->getUser(), 0);
        
        return false;
    }

    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }



}