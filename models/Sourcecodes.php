<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sourcecodes".
 *
 * @property integer $id
 * @property string $team
 * @property string $uploaded_by
 * @property string $uploaded_at
 */

class Sourcecodes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sourcecodes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['team', 'uploaded_by', 'uploaded_at'], 'required'],
            [['uploaded_at'], 'safe'],
            [['team', 'uploaded_by'], 'string', 'max' => 50]
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'team' => Yii::t('app', 'Team'),
            'uploaded_by' => Yii::t('app', 'Uploaded by'),
            'uploaded_at' => Yii::t('app', 'Uploaded at'),
        ];
    }
}
