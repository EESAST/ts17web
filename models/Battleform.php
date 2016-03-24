<?php
namespace app\models;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use app\models\Sourcecodes;

class BattleForm extends \yii\db\ActiveRecord
{
    public $id;
    public $myteam;
    public $mycode;
    public $enemyteam;
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

        $teamcodes = Sourcecodes::find()->where(['team'=>$teamname])->orderBy('uploaded_at DESC')->all();
        return $teamcodes;
    }

    public function battle()
    {
    $address = '59.66.141.24';
    $service_port = 8001;
    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    if ($socket === false) {
    $_SESSION["feedback_negative"][] = "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
    }
      $result = socket_connect($socket, $address, $service_port);
    if ($result === false) {
        $SELECT["feedback_negative"][] = "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
      }
    socket_write($socket,'b  ',3);
    socket_write($socket,$this->myteam.'  ', strlen($this->myteam)+2);
    socket_write($socket,$this->enemyteam.'  ', strlen($this->enemyteam)+2);
    socket_write($socket,$this->mycode.'  ', strlen($this->mycode)+2);
    socket_write($socket,$this->enemycode, strlen($this->enemycode)+2);
     return "Request sent.";
    }

}
?>
