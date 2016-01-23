<?php
namespace app\models;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use app\models\Sourcecodes;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $sourcecode;

    public function rules()
    {
        return [
            [['sourcecode'], 'file', 'skipOnEmpty' => false, 'extensions' => 'c,cpp','maxSize'=>1024*1024],
        ];
    }
    public function indextoadd(){
        $connection = \Yii::$app->db;
        $command = $connection->createCommand('SELECT max(id) FROM sourcecodes');
        if (array_values($nextindex = $command->queryOne())[0]!="")
            return array_values($nextindex = $command->queryOne())[0];
        else return 0;
    }

    public function upload()
    {

        if ($this->validate()) {
            $this->sourcecode->saveAs('uploads/' .$this->indextoadd(). '.' . $this->sourcecode->extension);
            $newsourcecode = new Sourcecodes;
            $user = User::findByUsername(Yii::$app->user->identity->username);
            $newsourcecode->team = $user->teamname;
            $newsourcecode->uploadedby = $user->username;
            $newsourcecode->uploadedat = date("Y/m/d h:i:s");
            $newsourcecode->save();
            return true;
        } else {
            return false;
        }
    }
}
?>