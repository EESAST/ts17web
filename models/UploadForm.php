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
            [['sourcecode'], 'file', 'skipOnEmpty' => false, 'extensions' => 'c,cpp','maxSize'=>1024*1024,'checkExtensionByMimeType'=>false],
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
	date_default_timezone_set('PRC'); 
            $newsourcecode->uploaded_at = date("Y/m/d H:i:s");
            $newsourcecode->save();

            //先在数据库中insert一条数据，然后再命名文件
            $this->sourcecode->saveAs('uploads/' .$newsourcecode->id.'.cpp');

            return $newsourcecode->id;
        } else {
            return false;
        }
    }

    public function upload_first_round(){
        if ($this->validate()) {
            
            $newcode = new Firstroundcodes();

            $user = User::findByUsername(Yii::$app->user->identity->username);
            $myteam = Team::findOne(['teamname'=> $user->teamname]);
            $newcode->teamid = $myteam->id;
            $newcode->teamname = $myteam->teamname;
            $newcode->uploaded_by = $user->username;
            $newcode->uploaded_at = date("Y/m/d H:i:s");
            if($newcode->save()){
                //以队伍编号命名文件
                $this->sourcecode->saveAs('first_round_codes/' .$newcode->teamid.'.cpp');
                return $newcode->id;
            }
        } else {
            return false;
        }
        return false;
    }

    public function upload_final_round(){
        if ($this->validate()) {
            
            $newcode = new Finalroundcodes();

            $user = User::findByUsername(Yii::$app->user->identity->username);
            $myteam = Team::findOne(['teamname'=> $user->teamname]);
            $newcode->teamid = $myteam->id;
            $newcode->teamname = $myteam->teamname;
            $newcode->uploaded_by = $user->username;
            $newcode->uploaded_at = date("Y/m/d H:i:s");
            if($newcode->save()){
                //以队伍编号命名文件
                $this->sourcecode->saveAs('ts17webhhh_final_round_codes_hhh/' .$newcode->teamid.'.cpp');
                return $newcode->id;
            }
        } else {
            return false;
        }
        return false;
    }

}
?>
