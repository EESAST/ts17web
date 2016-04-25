<?php
use yii\widgets\ActiveForm;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\helpers\html;
?>

<div class="am-padding">
<br/>
    <div class="am-cf"><strong class="am-text-primary am-text-lg">"决赛"代码提交</strong>
        /<small>请在这里提交你们的<b>"决赛"</b>代码</small>
    </div>
    <p>注意啦这里是提交<b>"决赛代码"</b>的地方！！</p>
    <p>如果要玩&nbsp<b>[在线对战]</b>&nbsp的话请左转<b>[代码提交]</b>and<b>[在线对战]</b></p>
    <?php if($alreadysubmit){?>
        <br/><p><i><b><?=$myteam->teamname?>队，你们已经提交过代码啦，当然你们也可以提交另外一个版本</b></i></p>
    <?php }else{?>
        <br/><p><i><b><?=$myteam->teamname?>队，你们还没有提交过代码</b></i></p>
    <?php }?>
    <br/>
    <div>
    <?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data'],
            'fieldConfig' => [
                'template' => "{input}\n<div>{error}</div>",
                'labelOptions' => ['class' => 'col-lg-1 control-label'],
            ]
        ,]) ?>
        <?= $form->field($model, 'sourcecode')->fileInput() ?>
        
        <button class="am-btn am-btn-success am-btn-xs">提交</button>&nbsp*仅保留最后一次提交的代码
    <?php ActiveForm::end() ?>
    </div>

</div>