<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sourcecodes".
 *
 * @property integer $id
 * @property string $teamid
 * @property string $teamname
 * @property string $uploaded_by
 * @property string $uploaded_at
 */

class Finalroundcodes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'finalroundcode';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['teamid','teamname', 'uploaded_by','uploaded_at'], 'required'],
            [['uploaded_at'], 'safe'],
            [['teamname', 'uploaded_by'], 'string', 'max' => 50]
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'teamname' => Yii::t('app', 'Teamname'),
            'teamid' => Yii::t('app', 'Team id'),
            'uploaded_by' => Yii::t('app', 'Uploaded by'),
            'uploaded_at' => Yii::t('app', 'Uploaded at'),
        ];
    }

}