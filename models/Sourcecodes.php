<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sourcecodes".
 *
 * @property integer $id
 * @property string $team
 * @property string $uploadedby
 * @property string $uploadedat
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
            [['team', 'uploadedby', 'uploadedat'], 'required'],
            [['uploadedat'], 'safe'],
            [['team', 'uploadedby'], 'string', 'max' => 50]
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
            'uploadedby' => Yii::t('app', 'Uploadedby'),
            'uploadedat' => Yii::t('app', 'Uploadedat'),
        ];
    }
}
