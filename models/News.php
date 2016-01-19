<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "newss".
 *
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property string $addedby
 * @property string $addedat
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'newss';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'text', 'addedby', 'addedat'], 'required'],
            [['text'], 'string'],
            [['addedat'], 'safe'],
            [['title'], 'string', 'max' => 100],
            [['addedby'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'text' => Yii::t('app', 'Text'),
            'addedby' => Yii::t('app', 'Addedby'),
            'addedat' => Yii::t('app', 'Addedat'),
        ];
    }
}
