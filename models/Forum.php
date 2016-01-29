<?php

//大帖子，小帖子是DetailForum

namespace app\models;

use Yii;

/**
 * This is the model class for table "forum".
 *
 * @property integer $index
 * @property string $author
 * @property string $theme
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 */
class Forum extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'forum';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['theme', 'content','author', 'created_at'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'index' => 'Index',
            'author' => 'author',
            'theme' => 'Theme',
            'content' => 'Content',
            'created_at' => 'Created At',
            'updated_at' =>'updated_at',
        ];
    }
}
