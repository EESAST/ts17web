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
    <br/><br/>
    <div>
    <h3 width="90%">每个队伍每天最多上传50次<br/>你们今天已经上传了<?=$myteam->uploaded_time?>次<br/></h3>
    <?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data'],
            'fieldConfig' => [
                'template' => "{input}\n<div>{error}</div>",
                'labelOptions' => ['class' => 'col-lg-1 control-label'],
            ]
        ,]) ?>
        <?= $form->field($model, 'sourcecode')->fileInput() ?>
        
        <button class="am-btn am-btn-success am-btn-xs">提交</button>
    <?php ActiveForm::end() ?>
    <p>*请注意不要重复提交</p>
    </div>

</div>
