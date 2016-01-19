
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
            'teamname' => Yii::t('app', 'Team Name'),
            'leadername' => Yii::t('app', 'Leader ID'),
            'member1name' => Yii::t('app', 'Member ID'),
            'member2name' => Yii::t('app', 'Member ID'),
            'member3name' => Yii::t('app', 'Member ID'),
            'slogan' => Yii::t('app', 'Slogan'),
            'key' => Yii::t('app', 'Key'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
