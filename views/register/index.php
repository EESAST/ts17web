<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\RegisterForm */


use yii\helpers\Html;
use app\doc\widgets\myActiveForm;
use yii\captcha\Captcha;
$this->title = 'Register';
?>
<div class="am-g">
<div class="am-u-md-8 am-u-sm-centered">
    <?php $form = myActiveForm::begin([
        'id' => 'register-form',
        'options' => ['class' => 'form-horizontal','enctype' => 'multipart/form-data','onsubmit'=>"return check()"],
        'fieldConfig' => [
            'template' => "{input}",
            //'labelOptions' => ['class' => 'col-lg-1 control-label'],
            'errorOptions'=>['class'=>'am-text-danger']
        ],
    ]); ?>
    <br/><br/>
        <?= $form->field($model, 'username',['placeholder'=>'请设置一个用户名(应输入6-32个字符，汉字按照1个字符计算)']) ?>

        <?= $form->field($model, 'password',['placeholder'=>'请设置登录密码(至少应包含6个字符)'])->passwordInput() ?>

        <?= $form->field($model, 'password2',['placeholder'=>'请确认登录密码(两次输入的密码需要一致)'])->passwordInput() ?>

        <?= $form->field($model, 'email',['placeholder'=>'请输入您的邮箱(该邮箱将在找回密码)']) ?>

        <?= $form->field($model, 'realname',['placeholder'=>'请输入您的真实姓名(这有助于我们确定您的真实身份)']) ?>

        <?= $form->field($model, 'school',['placeholder'=>'请输入您的学校全称(五道口男子技术学院?)']) ?>

        <?= $form->field($model, 'class',['placeholder'=>'请输入您的院系-班级(例:电子工程系-无59班)']) ?>

        <?= $form->field($model, 'studentnumber',['placeholder'=>'请输入您的学号(例:2015012345)']) ?>

        <?= $form->field($model,
            'verifyCode',
            ['options' => ['class' => 'am-form-field'],
            ])->widget(Captcha::className(),

            ['template' => "{input}<div align='center'>{image}</div>",
                'imageOptions' => ['alt' => '验证码'],
                'captchaAction' => 'site/captcha',
            ]);
        ?>

        <?= Html::submitButton('注册', ['class' => 'am-btn am-btn-primary am-btn-block', 'name' => 'register-button']) ?>

    <?php myActiveForm::end(); ?>
</div>
</div>
<script type="text/javascript">
var error=0;
$(document).ready(function(){
    var username=$("#form_username").children("input");    
    var password=$("#form_password").children("input");
    var password2=$("#form_password2").children("input");
    var email=$("#form_email").children("input");
    var realname=$("#form_realname").children("input");
    var school=$("#form_school").children("input");
    var studentnumber=$("#form_studentnumber").children("input");
    var class1=$("#form_class").children("input");
    var verifyCode = $("#form_verifyCode").children("input");
    error=parseInt(<?php echo count($model['errors']) ?>);
    username.focus(function(){
        $("#form_username").removeClass("am-form-error").children("span").remove();
        --error;
    });
    username.blur(function(){
        var reg=/[\u4e00-\u9fa5\w]{6,32}/;
        if(reg.test(username.val())===false){
            $("#form_username").addClass("am-form-icon am-form-feedback am-form-error").append("<span class='am-icon-times'></span>");
            username.attr({"placeholder":"不合法的用户名"});
            ++error;
        };
    });
    password.focus(function(){
        $("#form_password").removeClass("am-form-error").children("span").remove();
        --error;
    });
    password.blur(function(){
        var reg=/\w{6,32}/;
        if(reg.test(password.val())===false) {
            $("#form_password").addClass("am-form-icon am-form-feedback am-form-error").append("<span class='am-icon-times'></span>");
            password.attr({"placeholder": "不合法的密码"});
            ++error;
        }
    });

    password2.focus(function(){
        $("#form_password2").removeClass("am-form-error").children("span").remove();
        --error;
    });

    password2.blur(function(){
        if(password.val()!==password2.val()){
            $("#form_password2").addClass("am-form-icon am-form-feedback am-form-error").append("<span class='am-icon-times'></span>");
            password2.attr({"placeholder":"两次密码不一致"});
            ++error;
        };
    });

    email.focus(function(){
        $("#form_email").removeClass("am-form-error").children("span").remove();
        --error;
    });
    email.blur(function(){
        var reg=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(reg.test(email.val())===false){
            $("#form_email").addClass("am-form-icon am-form-feedback am-form-error").append("<span class='am-icon-times'></span>");
            email.attr({"placeholder":"不合法的邮箱地址"});
            ++error;
        };
    });

    realname.focus(function(){
        $("#form_realname").removeClass("am-form-error").children("span").remove();
        --error;
    });
    realname.blur(function(){
        if(realname.val()==''){
            $("#form_realname").addClass("am-form-icon am-form-feedback am-form-error").append("<span class='am-icon-times'></span>");
            realname.attr({"placeholder":"真实姓名不能为空"});
            ++error;
        };
    });


    school.focus(function(){
        $("#form_school").removeClass("am-form-error").children("span").remove();
        --error;
    });
    school.blur(function(){
        if(school.val()==''){
            $("#form_school").addClass("am-form-icon am-form-feedback am-form-error").append("<span class='am-icon-times'></span>");
            school.attr({"placeholder":"学校名称不能为空"});
            ++error;
        };
    });
    verifyCode.focus(function(){
        $("#form_verifyCode").removeClass("am-form-error").children("span").remove();
    });
    class1.focus(function(){
        $("#form_class").removeClass("am-form-error").children("span").remove();
        --error;
    });
    class1.blur(function(){
        if(class1.val()==''){
            $("#form_class").addClass("am-form-icon am-form-feedback am-form-error").append("<span class='am-icon-times'></span>");
            class1.attr({"placeholder":"院系班级不能为空"});
            ++error;
        };
    });

    studentnumber.blur(function(){
        var reg=/\d{6,32}/;
        if(studentnumber.val()==''){
            $("#form_studentnumber").addClass("am-form-icon am-form-feedback am-form-error").append("<span class='am-icon-times'></span>");
            studentnumber.attr({"placeholder":"学生证号不能为空"});
            ++error;
        }else if(reg.test(studentnumber.val())===false){
            $("#form_studentnumber").addClass("am-form-icon am-form-feedback am-form-error").append("<span class='am-icon-times'></span>");
            studentnumber.attr({"placeholder":"您至少给个像样的学生证号吧"});
            ++error;
        }
    });
});
function check() {
    if(error>0)return false;
    return true;
}

</script>
