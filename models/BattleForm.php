<?php
namespace app\models;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use app\models\Sourcecodes;

class BattleForm extends \yii\db\ActiveRecord
{

    public $mycode;
    public $teamname;
    public $enemycode;

    public function rules()
    {
        return [
            //[['sourcecode'], 'file', 'skipOnEmpty' => false, 'extensions' => 'c,cpp','maxSize'=>1024*1024],
        ];
    }

    public function attributeLabels()
    {
        return [
            'mycode' => Yii::t('app', '我的代码'),
            'enemycode' => Yii::t('app', '对方的代码'),
        ];
    }

    public function getTeamcodes($teamname){

        $teamcodes = Sourcecodes::find()->where(['team'=>$teamname])->select('uploaded_at')->orderBy('uploaded_at DESC')->column();
        return $teamcodes;
    }

}
?>