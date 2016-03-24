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

    public function attributeLabels()
    {
        return [
            'sourcecode' => Yii::t('app', '上传文件'),
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            
            $newsourcecode = new Sourcecodes;

            $user = User::findByUsername(Yii::$app->user->identity->username);
            $newsourcecode->team = $user->teamname;
            $newsourcecode->uploaded_by = $user->username;
            $newsourcecode->uploaded_at = date("Y/m/d h:i:s");
            $newsourcecode->save();

            //先在数据库中insert一条数据，然后再命名文件
            $this->sourcecode->saveAs('uploads/' .$newsourcecode->id.'.cpp');

            return $newsourcecode->id;
        } else {
            return false;
        }
    }
}
?>
