<?php
/**
 * Created by PhpStorm.
 * User: fourram
 * Date: 10/5/2015
 * Time: 12:43 PM
 */
class UserController extends BaseController
{
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) &&$model->validate()&& $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

}