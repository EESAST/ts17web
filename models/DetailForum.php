<?php


//小帖子，大帖子是Forum

namespace app\models;

use Yii;

/**
 * This is the model class for table "forum".
 *
 * @property integer $index
 * @property integer $fatherindex
 * @property string $author
 * @property string $reply
 * @property string $created_at
 */
class DetailForum extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detailforum';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reply', 'created_at'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'index' => 'Index',
            'fatherindex' => 'Father Index',
            'author' => 'author',
            'reply' => 'Reply',
            'created_at' => 'Created At',
        ];
    }
}
