<?php
namespace app\models;
use Yii;

/**
 * This is the model class for table "team".
 *
 * @property integer $id
 * @property string $teamname
 * @property string $leadername
 * @property string $member1name
 * @property string $member2name
 * @property string $member3name
 * @property string $slogan
 * @property string $key
 * @property integer $status
 */
class Team extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'team';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['teamname', 'leadername','slogan', 'key', 'status'], 'required'],
            [['slogan', 'key'], 'string'],
            [['status'], 'integer'],
            [['leadername'], 'unique'],
            [['teamname', 'leadername', 'member1name', 'member2name', 'member3name'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'teamname' => Yii::t('app', '队名'),
            'leadername' => Yii::t('app', '队长'),
            'member1name' => Yii::t('app', '队员'),
            'member2name' => Yii::t('app', '队员'),
            'member3name' => Yii::t('app', '队员'),
            'slogan' => Yii::t('app', '简介'),
            'key' => Yii::t('app', '密钥'),
            'status' => Yii::t('app', '成员'),
        ];
    }
}
