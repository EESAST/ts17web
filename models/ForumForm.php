<?php

//大帖子，小帖子是DetailForumForm

namespace app\models;

use Yii;
use yii\base\Model;

use app\models\Forum;

/**
 * LoginForm is the model behind the login form.
 */
class ForumForm extends Model
{
    public $index;
    public $theme;
    public $content;
    public $created_at;

/*
    public function attributeLabels()
    {
        return [    
            'username' => '用户名',
            'password' => '密码',
        ];
    }
*/
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['theme', 'content','created_at'], 'required'],
            
        ];
    }

    
}