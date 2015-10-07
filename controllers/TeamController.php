<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\Team;
use app\models\TeamSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TeamController implements the CRUD actions for Team model.
 */
class TeamController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Team models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TeamSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if (Yii::$app->user->isGuest) //如果未登录则跳转至登录界面
            return $this->redirect(array('/login'));
        else return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Team model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Team model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $searchModel = new TeamSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if (Yii::$app->user->identity->teamname!=null){//如果该用户加入队伍，则返回主页
//            $team = team::findone(['teamname'=>Yii::$app->user->identity->teamname]);
//            return $this->render('index', [
//                'myTeamInfo' => $team,
//                'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider]);
        return $this->render('error',['message'=>'You have already been in another team.']);
        }
        $model = new Team();
        if ($model->load(Yii::$app->request->post()) ) {
            $user = User::findOne(['username'=>Yii::$app->user->identity->username]);
            $model->leadername=$user->username;//更改team的leader
            $model->status = 1;
            $user->teamname = $model->teamname;//更改user的team
            $user->updated_at = date("Y-m-d H:i:s");//更改user的update时间
            if($model->save()&& $user->save(false))
                return $this->redirect(['view', 'id' => $model->id]);
            else return $this->render('error',['message'=>'Please check if your team infomation is unique or if you have joined another team.']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Team model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $user = User::findByUsername(Yii::$app->user->identity->username);
        if ($model->leadername!=$user->username&&$user->group!='admin') return $this->render('error',['message'=>'Error:Only Team leader can update status.']);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           $user->teamname = $model->teamname;
          $user->update();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    public function actionJoin(){
        $input  = new Team;
        if($input->load(Yii::$app->request->post())) {
            $user = User::findOne(['username'=>Yii::$app->user->identity->username]);
            if ($user->teamname != null)
                return $this->render('error', ['message' => 'Error:<br>You have already joined another team.']);
            $team = Team::findOne(['teamname' => $input->teamname]);
            if ($team != null && $team->key == $input->key) {
                if ($team->member1name == '') {
                    $team->member1name = $user->username;
                    $user->teamname = $team->teamname;
                } elseif ($team->member2name == '') {
                    $team->member2name = $user->username;
                    $user->teamname = $team->teamname;
                } elseif ($team->member3name == '') {
                    $team->member3name = $user->username;
                    $user->teamname = $team->teamname;
                } else return $this->render('error', ['message' => 'Error:<br>This team has already 4 members.']);
                if($team->save()&&$user->save(false ))
                return $this->redirect(['view', 'id' => $team->id]);
            } else return $this->render('error', ['message' => 'Error:<br>Team name and key do not match.']);
        }
        else return $this->render('join', [
            'model' => $input]);
    }


    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $user = User::findone(['username'=>Yii::$app->user->identity->username]);
        if ($model->leadername!=$user->username&&$user->group!='admin') return $this->render('error',['message'=>'Error:Only Team leader can DELETE a team.']);
        $user = User::findOne(['username'=>$model->leadername]); if  ($user){ $user->teamname = null;$user->save(false);}
        $user = User::findOne(['username'=>$model->member1name]); if  ($user) {$user->teamname = null;$user->save(false);}
        $user = User::findOne(['username'=>$model->member2name]); if  ($user) {$user->teamname = null;$user->save(false);}
        $user = User::findOne(['username'=>$model->member3name]); if  ($user) {$user->teamname = null;$user->save(false);}
        $model->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Team model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Team the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Team::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
