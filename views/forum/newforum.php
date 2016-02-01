<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\RegisterForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<br/>
<br/>
<div class="am-g">
<div class="am-u-sm-8">
    <?php $form = ActiveForm::begin([
        'id' => 'forum-form',
        'options' => ['class' => 'am-form'],
        'fieldConfig' => [
            'template' => "{label}\n<div>{input}</div>\n",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>
        <?= $form->field($model, 'kinds')->radioList(['tucao'=>'吐槽灌水','tactic'=>'战术讨论',
            'rule'=>'规则询问','bug'=>'平台报错']) ?>
        <?= $form->field($model, 'theme') ?>
        <?= $form->field($model, 'content')->textarea(['rows' => 6])?>
        <div class="form-group">
            <br/>
            <?= Html::submitButton('提交', ['class' => 'am-btn am-btn-default am-btn-block', 'name' => 'submit-button']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>
<div class="am-u-sm-4 ">
      <section class="am-panel am-panel-default">
        <div class="am-panel-hd">热门讨论帖</div>
        <ul class="am-list blog-list">
          <li><a href="#">你真的愿意写热门么？</a></li>
          <li><a href="#">我再问一次，你们真的写么</a></li>
          <li><a href="#">还有啥啥啥的</a></li>
          <li><a href="#">然后帖主有删帖子的权利，评论者有扯评论的权利</a></li>
          <li><a href="#">点赞、评论其他人的帖子，@</a></li>
          <li><a href="#">到底写不写嘛</a></li>          
        </ul>
        </section>
</div>
</div>
