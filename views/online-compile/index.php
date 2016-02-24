<?php
use yii\widgets\ActiveForm;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\helpers\html;
?>

<div class="am-padding">
      <div class="am-cf"><strong class="am-text-primary am-text-lg">代码提交</strong>/<small>请在这里提交你们的代码</small></div>
      <br/>
      <hr/><small>本页面处于开发阶段，请随意吐槽</small><hr/>
      <br/>
<?php if(!Yii::$app->user->isGuest&&Yii::$app->user->identity->teamname==''): ?>
您还没有加入战队，无法提交代码.
<?php elseif(Yii::$app->user->isGuest): ?>
您还没有注册、登录，无法提交代码
<?php else : ?>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
<div class="am-form-group am-form-file">

      <div>
       <button type="button" class="am-btn am-btn-default am-btn-sm">
          <i class="am-icon-cloud-upload"></i> 选择要上传的文件
        </button>
      </div>
      <input type="file" id="uploadform-sourcecode" name="UploadForm[sourcecode]">
 </div>
 <button class="am-btn am-btn-success am-btn-xs">Submit</button>
<?php ActiveForm::end() ?>


Online compile:
<?php print_r($indexs);?>
<?echo Html::dropDownList( 'Source Code List',null , $indexs );  ?>

<?php endif; ?>
</div>
