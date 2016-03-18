<?php
use yii\widgets\ActiveForm;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\helpers\html;
?>

<div class="am-padding">
<br/>
    <div class="am-cf"><strong class="am-text-primary am-text-lg">代码提交</strong>
        /<small>请在这里提交你们的代码</small>
    </div>
    <br/>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
        <div class="am-form-group am-form-file">
            <div>
                <button type="button" class="am-btn am-btn-default am-btn-sm">
                    <i class="am-icon-cloud-upload"></i> 选择要上传的代码(.c或.cpp)
                </button>
            </div>
        <input type="file" id="uploadform-sourcecode" name="UploadForm[sourcecode]" onchange="document.getElementById('filename').innerHTML=this.value">
        </div>

        <p id="filename"></p>

        <button class="am-btn am-btn-success am-btn-xs">提交</button>
    <?php ActiveForm::end() ?>

</div>
