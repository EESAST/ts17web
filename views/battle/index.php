<?php
    use yii\helpers\Url;
    use yii\widgets\ActiveForm;
    use yii\helpers\ArrayHelper;
    use yii\helpers\Html;
    use app\models\Sourcecodes;
    use yii\widgets\LinkPager;
?>

    <br/>
<div>
    <br/>
    <div class="am-fl"><strong class="am-text-primary am-text-lg">在线对战</strong> /
        <small>Online Battle</small>
    </div>

    <br/>
</div>
    <br/>
    <br/>
    <div class="row" align="center">
        <h2 width="90%">每个队伍每天最多对战10次<br/>你们今天已经对战了<?=$myteam->battled_time?>次<br/></h2>
        <div class="battle-form">
            <?php $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'post',
                'options' => ['class' => 'form-inline']
            ]); ?>
            <?= $form->field($model, 'mycode')->dropDownList(ArrayHelper::map($mycodes, 'id', 'uploaded_at'), ['prompt' => '请选择你自己的ai',])->label('请选择自己的ai', ['class' => 'sr-only']) ?>

            <?= $form->field($model, 'enemyteam')->dropDownList(ArrayHelper::map($teams, 'id', 'teamname'), [
                'prompt' => '请选择对战队伍',
                'onchange'=>'
                    $.post("index.php?r=battle/site&teamname='.'"+$("#battleform-enemyteam option:selected").text(),function(data){
                        $("select#battleform-enemycode").html(data);
                    });',
                ])->label('请选择对战队伍', ['class' => 'sr-only']) ?>

            <?= $form->field($model, 'enemycode')->dropDownList($model->getTeamcodes($model->enemyteam), ['prompt' => '请选择队伍代码'])->label('请选择队伍代码', ['class' => 'sr-only']) ?>
        
            <br/><br/>

            <div class="form-group">
                <?= Html::submitButton('BATTLE！！', ['class' => 'btn btn-primary']) ?>
            </div>
                    <p>*请注意不要重复提交</p>
            <?php ActiveForm::end(); ?>
        </div>
    </div>

    
    <table border="1" width=95% align="center">
        <h2 align="center">比赛的结果们</h2>
        <td align="center"><b>编号</b></th>
        <td align="center"><b>挑战队伍</b></th>
        <td align="center"><b>ai号</b></th>
        <td align="center"><b>对战队伍</b></th>
        <td align="center"><b>ai号</b></th>
        <td align="center"><b>比赛时间</b></th>
        <td align="center"><b>对战结果</b></th>
        <?php foreach ($results as $result) { ?>
            <tr>
                <td align="center"><?= $result->id ?></td>
                <td align="center"><?= $result->team1 ?></td>
                <td align="center"><?= $result->ai1 ?></td>
                <td align="center"><?= $result->team2 ?></td>
                <td align="center"><?= $result->ai2 ?></td>
                <td align="center"><?= $result->battle_at ?></td>
                <td align="center" width="30%"><?= $result->result ?></td>
            </tr>
        <?php } ?>
    </table>

    <div align="center">
            <?php echo LinkPager::widget([
                'pagination' => $pagination,
            ]);
        ?>
    </div>
