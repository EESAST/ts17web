<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class User extends /* \yii\base\Object */ \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $id;
    public $email;
    public $username;
    public $password;
    public $realname;
    public $teamname;
    public $authKey;
    public $accessToken;

    public static function tableName() 
    {
        return 'user';
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'username' => 'Username',
            'password' => 'Password',
            'realname' => 'Real Name',
            'teamname' => 'Team Name',
            'authKey' => 'AuthKey',
            'accessToken' => 'AccessToken',

        ];
    }

    /**
     * @inheritdoc
     */
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
}
