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
    public $studentnumber;
    public $school;
    public $class;
    private $_user = false;

    public function attributeLabels()
    {
        return [
            'email' => '邮箱',
            'username' => '用户名',
            'password' => '密码',
            'password2' => '确认密码',
            'realname' => '真实姓名',
            'school'=>'学校',
            'class'=>'班级',
            'studentnumber' => '学生证号'
        ];
    }

    public function rules()
    {
        return
            [
                [['username', 'password', 'email', 'realname', 'school', 'class', 'studentnumber',], 'required','message'=>'该栏目不能为空'],
                [['username', 'password', 'realname', 'school', 'class'], 'string'],
                ['username', 'filter', 'filter' => 'trim'],
                ['username', 'required','message' => '用户名不能为空'],
                ['username', 'unique', 'targetClass' => 'app\models\User', 'message' => '用户名已存在'],
                ['username', 'string', 'min' => 2, 'max' => 32],
                ['password', 'required','message' => '密码不能为空'],
                ['password', 'string', 'min' => 6],
                ['email', 'unique', 'targetClass' => 'app\models\User', 'message' => '邮箱已存在'],
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
                $user->school = $this->school;
                $user->class = $this->class;
                $user->studentnumber = $this->studentnumber;
                $user->created_at = date("Y-m-d H:i:s");
                $user->updated_at = date("Y-m-d H:i:s");
                $user->status = 1;
                $user->group = 'player';
            $connection = \Yii::$app->db;
//            $connection->createCommand()->insert('user',
//                [
//                'username'=>$this->username,
//                'password'=>$this->password,
//                'email'=>$this->email,
//                'realname'=>$this->realname,
//                'teamname'=>'',
//            ])->execute();
            $user->save(false);
            return $user;
        }
        return null;
        
    }

    //实现注册之后直接登录
    public function login()
    {
        return Yii::$app->user->login($this->getUser(), 0);
    }

    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}