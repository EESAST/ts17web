
<?php
/**
 * Created by PhpStorm.
 * User: fourram
 * Date: 1/18/2016
 * Time: 1:52 PM
 */
use 	yii\helpers\Html;
echo "代码已经成功上传!<br>"; ?>
<?php echo Html::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;','style'=>'font-size: 14px;font-weight: bold;'));?>