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
            'class'=>'院系班级',
            'studentnumber' => '学生证号(如果有)',

        ];
    }

    public function rules()
    {
        return
            [
                ['username', 'required', 'message' => '用户名不能为空'],
                ['password', 'required', 'message' => '密码不能为空'],
                ['password2', 'required', 'message' => '确认密码不能为空'],
                ['email', 'required', 'message' => '邮箱不能为空'],
                ['realname', 'required', 'message' => '真实姓名不能为空'],
                ['school', 'required', 'message' => '学校不能为空'],
                ['class', 'required', 'message' => '院系班级不能为空'],
                ['studentnumber', 'required', 'message' => '学生证号不能为空'],

                //unique
           //     ['username', 'unique', 'targetClass' => 'app\models\User', 'message' => '用户名已被注册'],
             //   ['email', 'unique', 'targetClass' => 'app\models\User', 'message' => '邮箱已被注册'],

                //double check password
                ['password2', 'compare', 'compareAttribute' => 'password', 'message' => '两次输入的密码不一致'],

                //data type and requirements
                ['username', 'filter', 'filter' => 'trim'],
                ['username', 'string', 'length' => [5, 12]],
                ['password', 'string', 'min' => 6],
                ['school', 'string', 'min' => 2, 'max' => 10],
                ['email', 'email', 'message' => '请检查您的电子邮件地址'],
            ];
    }
    public function register()
    {
        $this->validate();
        var_dump($this->getErrors());
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
            $user->realname = $this->realname;
            $user->email = $this->email;
            $user->school = $this->school;
            $user->class = $this->class;
            $user->studentnumber = $this->studentnumber;
            $user->created_at = date("Y-m-d H:i:s");
            $user->updated_at = date("Y-m-d H:i:s");
            $user->status = 1;
            $user->group = 'player';
            if ($user->save(true)) {//true调用User里的rules方法进行二次验证
                return $user;
            }
            return null;
        }
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
?>

