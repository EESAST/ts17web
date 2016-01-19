<?php

//小帖子，大帖子是ForumForm

namespace app\models;

use Yii;
use yii\base\Model;

use app\models\DetailForum;

/**
 * LoginForm is the model behind the login form.
 */
class DetailForumForm extends Model
{
    public $index;
    public $reply;
    public $created_at;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [[ 'reply','created_at'], 'required'],
            
        ];
    }

    
}