<?php namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class PortraitForm extends Model
{
/**
* @var UploadedFile
*/
public $imagefile;
public $userid;
public function rules()
{
return [
[['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
];
}

public function upload()
{
if ($this->validate()) {
    $this->imagefile->saveAs('portrait/' . $this->userid . '.' . $this->imagefile->extension);
    $user=User::findByUsername(Yii::$app->user->identity->username);
    $user->portrait = 'portrait/' . $this->userid . '.' . $this->imagefile->extension;
    $user->save();
    var_dump($user->errors);
    return true;
} else {
    return false;
}
}
    public function fileaddress()
    {
       return  'portrait/' . $this->userid . '.' . $this->imagefile->extension;
    }

}
?>