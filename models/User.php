<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\helpers\Html;

/**
 * This is the model class for table "User".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $realname
 * @property string $school
 * @property string $class
 * @property string $studentnumber
 * @property string $authKey
 * @property string $accessToken
 * @property integer $teamname
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $group
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return[
            //required
            [['username', 'password', 'email', 'realname', 'school',
                'class', 'studentnumber', 'status', 'created_at', 'updated_at', 'group'], 'required'],

            //unique
            ['username', 'unique', 'targetClass' => 'app\models\User', 'message' => '用户名已被注册'],
            ['email', 'unique', 'targetClass' => 'app\models\User', 'message' => '邮箱已被注册'],

            //data type and requirements
            [['username', 'password', 'email', 'realname', 'school',
                'class', 'authKey', 'accessToken', 'group'], 'string'],
            [['created_at', 'updated_at'], 'safe'],

            ['username', 'filter', 'filter' => 'trim'],
//['username', 'string', 'min' => 2, 'max' => 255],       
        ];
    }

    public static function findIdentity($id)
    {
        $user = User::find()->where(array('id' => $id))->asArray()->one();
        if ($user) {
            return new static($user);
        }
        return null;
    }
    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $user = User::find()->where(array('accessToken' => $token))->asArray()->one();
        if ($user) {
            return new static($user);
        }
        return null;
    }
    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $user = User::find()->where(array('username' => $username))->asArray()->one();
        if ($user) {
            return new static($user);
        }
        return null;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @inheritdoc
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * @inheritdoc
     */
    public function getRealname()
    {
        return $this->realname;
    }
    /**
     * @inheritdoc
     */
    public function getTeamname()
    {
        return $this->teamname;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {

        return $this->password === $password;
    }

    public function login()//登录
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


    //下面处理AuthKey
    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function beforeSave($insert){//生成AuthKey
        $this->username = Html::encode($this->username);
        $this->email = Html::encode($this->email);
        $this->school = Html::encode($this->school);
        $this->class = Html::encode($this->class);
        $this->realname = Html::encode($this->realname);
        $this->teamname = Html::encode($this->teamname);
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->authKey = \Yii::$app->security->generateRandomString();
            }
            return true;
        }
        return false;
    }

}

