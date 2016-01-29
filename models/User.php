<?php

namespace app\models;

use Yii;

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
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
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
        return
[
[['id', 'username', 'password', 'email', 'realname', 'school', 'class', 'studentnumber', 'status', 'created_at', 'updated_at', 'group'], 'required'],
[['id', 'studentnumber', 'teamname', 'status'], 'integer'],
[['username', 'password', 'realname', 'school', 'class', 'authKey', 'accessToken', 'group'], 'string'],
[['created_at', 'updated_at'], 'safe'],
['username', 'filter', 'filter' => 'trim'],
['username', 'required','message' => 'ÓÃ»§Ãû²»ÄÜÎª¿Õ'],
['username', 'unique', 'targetClass' => 'app\models\User', 'message' => 'ÓÃ»§ÃûÒÑ´æÔÚ'],
['username', 'string', 'min' => 2, 'max' => 255],
['password', 'required','message' => 'ÃÜÂë²»ÄÜÎª¿Õ'],
['password', 'string', 'min' => 6],
['email','string'],
['email', 'unique', 'targetClass' => 'app\models\User', 'message' => 'ÓÊÏäÒÑ´æÔÚ'],
['realname','string'],
];
}
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'email' => Yii::t('app', 'Email'),
            'realname' => Yii::t('app', 'Realname'),
            'school' => Yii::t('app', 'School'),
            'class' => Yii::t('app', 'Class'),
            'studentnumber' => Yii::t('app', 'Studentnumber'),
            'authKey' => Yii::t('app', 'Auth Key'),
            'accessToken' => Yii::t('app', 'Access Token'),
            'teamname' => Yii::t('app', 'Teamname'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'group' => Yii::t('app', 'Group'),
        ];
    }


    public static function findIdentity($id)
    {
        /*
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
        */
        //return static::findOne($id);
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
        /*
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }
        return null;
        */
        //return static::findOne(['access_token' => $token]);
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
        /*
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }
        return null;
        */
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
        return $this->authKey === $authKey;
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

