<?php
use yii\widgets\ActiveForm;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\helpers\html;
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
Please Upload your source code here.
<?= $form->field($model, 'sourcecode')->fileInput() ?>
<button>Submit</button>

<?php ActiveForm::end() ?>

Online compile:
<?php print_r($indexs);?>
<?echo Html::dropDownList( 'Source Code List',null , $indexs );  ?>
