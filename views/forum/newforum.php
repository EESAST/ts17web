<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\RegisterForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
?>
<br/>
<br/>
<div class="am-g">
<div class="am-u-sm-12 am-u-md-8 am-u-lg-8">
    <?php $form = ActiveForm::begin([
        'id' => 'forum-form',
        'options' => ['class' => 'am-form'],
        'fieldConfig' => [
            'template' => "{input}",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

       <h3>帖子类型:</h3>
       <input type="hidden" name="ForumForm[kinds]">
       <div id="forumform-kinds" >
        <label><input type="radio" name="ForumForm[kinds]" value="tucao"> 吐槽灌水</label>
        <label><input type="radio" name="ForumForm[kinds]" value="tactic"> 战术讨论</label>
        <label><input type="radio" name="ForumForm[kinds]" value="rule"> 规则询问</label>
        <label><input type="radio" name="ForumForm[kinds]" value="bug"> 平台报错</label>
        <label><input type="radio" name="ForumForm[kinds]" value="team"> 队伍招募</label>
        </div>      
        <h3>帖子主题</h3>
        <?= $form->field($model, 'theme') ?>
        <h3>帖子内容</h3>
        <?= $form->field($model, 'content')->textarea(['rows' => 6])?>
        <div class="form-group">
            <br/>
            <?= Html::submitButton('提交', ['class' => 'am-btn am-btn-primary am-btn-block', 'name' => 'submit-button']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>

<?php //热门讨论贴，现在是赞最多的前八个?>
<div class="am-u-sm-12 am-u-md-4 am-u-lg-4 ">
      <section class="am-panel am-panel-default">
        <div class="am-panel-hd">热门讨论帖</div>
        <ul class="am-list blog-list">

            <?php foreach ($forums as $forum): ?>
                <li><a href="<?php echo Url::to(['forum/detail-forum','id'=>$forum->id])?>"><?= $forum->theme ?></a></li>
            <?php endforeach; ?>

        </ul>
        </section>
</div>
</div>
