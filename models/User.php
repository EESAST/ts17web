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
 * @property integer $teamid
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $group
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'User';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'username', 'password', 'email', 'realname', 'school', 'class', 'studentnumber', 'authKey', 'accessToken', 'teamid', 'status', 'created_at', 'updated_at', 'group'], 'required'],
            [['id', 'studentnumber', 'teamid', 'status'], 'integer'],
            [['username', 'password', 'email', 'realname', 'school', 'class', 'authKey', 'accessToken', 'group'], 'string'],
            [['created_at', 'updated_at'], 'safe']
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
            'teamid' => Yii::t('app', 'Teamid'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'group' => Yii::t('app', 'Group'),
        ];
    }
}
