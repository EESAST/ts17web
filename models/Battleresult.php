<?php
namespace app\models;
use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "battleresult".
 *
 * @property integer $id
 * @property string $team1
 * @property string $ai1
 * @property string $team2
 * @property string $ai2
 * @property string $battle_at
 * @property string $result
 */
class Battleresult extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'battleresult';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'team1' => Yii::t('app', '挑战者'),
            'team2' => Yii::t('app', '对战者'),
            'battle_at' => Yii::t('app', '对战时间'),
            'result' => Yii::t('app', '比赛结果'),
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->team1 = Html::encode($this->team1);
            $this->team2 = Html::encode($this->team2);
            $this->battle_at = Html::encode($this->battle_at);
            $this->result = Html::encode($this->result);
            return true;
        } else {
            return false;
        }
    }


}