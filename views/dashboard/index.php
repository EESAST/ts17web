<?php 
use app\doc\widgets\myActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<br/>
<div>
    <br/>
    <div class="am-fl"><strong class="am-text-primary am-text-lg">个人资料</strong> / <small>Personal information</small></div>

    <br/>
</div>
<br/>
<div class="am-g">
    <div class="am-u-sm-8 am-u-lg-8">
        <div class="am-input-group am-input-group-primary">
            <span class="am-input-group-label"><i class="am-icon-user am-icon-fw"></i></span>
            <input type="text" class="am-form-field" disabled="disabled" value="<?="姓名： ".$model->username ?>">
        </div>
        <br/>
        <div class="am-input-group am-input-group-secondary">
            <span class="am-input-group-label"><i class="am-icon-envelope am-icon-fw"></i></span>
            <input type="text" class="am-form-field" disabled="disabled" value="<?="邮箱： ".$model->email ?>">
        </div>
        <br/>
        <div class="am-input-group am-input-group-success">
            <span class="am-input-group-label"><i class="am-icon-user am-icon-fw"></i></span>
            <input type="text" class="am-form-field" disabled="disabled" value="<?="真实姓名：".$model->realname ?>">
        </div>
        <br/>
        <div class="am-input-group am-input-group-warning">
            <span class="am-input-group-label"><i class="am-icon-graduation-cap am-icon-fw"></i></span>
            <input type="text" class="am-form-field" disabled="disabled" value="<?="学校：".$model->school ?>">
        </div>
        <br/>
        <div class="am-input-group am-input-group-danger">
            <span class="am-input-group-label"><i class="am-icon-users am-icon-fw"></i></span>
            <input type="text" class="am-form-field" disabled="disabled" value="<?="班级： ".$model->email ?>">
        </div>
        <br/>
        <div class="am-input-group am-input-group-danger">
            <span class="am-input-group-label"><i class="am-icon-tag am-icon-fw"></i></span>
            <input type="text" class="am-form-field" disabled="disabled" value="<?="学生证号： ".$model->studentnumber ?>">
        </div>
        <br/>

        <a class="am-link-muted" href="<?php echo Url::to(['dashboard/verifyoldpwd'])?>">
            <button  class="am-btn am-btn-default am-btn-block">修改密码</button>
        </a>
    </div>
    <div class="am-u-sm-4 am-u-lg-4">
        <div style="width:120px;border: grey 1px solid;padding-top: 10px;">
        <img class="am-center" src="touxiang/".<?=$model->username?>.".png" onerror="this.src='images/star4.png'" width="100" height="100" >
        <button class="am-btn am-btn-block" id="button">更换头像</button>
        </div>
        <script>
            $("button").hover(function(){$(this).addClass("am-btn-primary")});
            $("button").mouseleave(function(){$(this).removeClass("am-btn-primary")});
        </script>
    </div>
</div>
