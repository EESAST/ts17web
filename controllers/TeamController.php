<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\Team;
use app\models\TeamSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
/*error_reporting(E_ALL^E_NOTICE);
/**
 * TeamController implements the CRUD actions for Team model.
 */
class TeamController extends Controller
{
    public $layout = 'main1';

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
        if (Yii::$app->user->isGuest) //Èç¹ûÎ´µÇÂ¼ÔòÌø×ªÖÁµÇÂ¼½çÃæ
            return $this->redirect(array('/login'));
        else {
            $team = Team::findOne(['teamname'=>Yii::$app->user->identity->teamname]);
            return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'info'=>$team!==null?$team->id:0,
        ]);
        }
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
        if (Yii::$app->user->identity->teamname!=null){//Èç¹û¸ÃÓÃ»§¼ÓÈë¶ÓÎé£¬Ôò·µ»ØÖ÷Ò³
//            $team = team::findone(['teamname'=>Yii::$app->user->identity->teamname]);
//            return $this->render('index', [
//                'myTeamInfo' => $team,
//                'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider]);
        return $this->render('error',['message'=>'你已经在某个队伍里面了']);
        }
        $model = new Team();
        if ($model->load(Yii::$app->request->post()) ) {
            $user = User::findOne(['username'=>Yii::$app->user->identity->username]);
            $model->leadername=$user->username;//¸ü¸ÄteamµÄleader
            $model->status = 1;
            $user->teamname = $model->teamname;//¸ü¸ÄuserµÄteam
            $user->updated_at = date("Y-m-d H:i:s");//¸ü¸ÄuserµÄupdateÊ±¼ä
            if($model->save()&& $user->save(false))
                return $this->redirect(['view', 'id' => $model->id]);
            else return $this->render('error',['message'=>'请检查你的队伍信息是否唯一且你没有在另外一支队伍里面']);
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
    public function actionJoin($id){
        $input  = new Team;
        $team=Team::findOne(['id'=>$id]);
        if($input->load(Yii::$app->request->post())) {
            $user = User::findOne(['username'=>Yii::$app->user->identity->username]);
            if ($user->teamname != null)
                return $this->render('error', ['message' => '你已经加入另外一支队伍啦']);
            $team = Team::findOne(['id'=>$id]);
            if ($team != null && $team->key == $input->key) {
                if ($team->member1name == '') {
                    $team->member1name = $user->username;
                    $user->teamname = $team->teamname;
                    $team->status++;
                } elseif ($team->member2name == '') {
                    $team->member2name = $user->username;
                    $user->teamname = $team->teamname;
                    $team->status++;
                } elseif ($team->member3name == '') {
                    $team->member3name = $user->username;
                    $user->teamname = $team->teamname;
                    $team->status++;
                } else return $this->render('error', ['message' => '这支队伍已经有四个人啦']);
                if($team->save()&&$user->save(false ))
                return $this->redirect(['view', 'id' => $team->id]);
            } else return $this->render('error', ['message' => '密钥不对。。。']);
        }
        else return $this->render('join',['team'=>$team,
            'model' => $input]);
    }


    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $user = User::findone(['username'=>Yii::$app->user->identity->username]);
        if ($model->leadername!=$user->username&&$user->group!='admin') return $this->render('error',['message'=>'只有队长才可以删除队伍啊']);
        $user = User::findOne(['username'=>$model->leadername]); if  ($user){ $user->teamname = '';$user->save(false);}
        $user = User::findOne(['username'=>$model->member1name]); if  ($user) {$user->teamname = '';$user->save(false);}
        $user = User::findOne(['username'=>$model->member2name]); if  ($user) {$user->teamname = '';$user->save(false);}
        $user = User::findOne(['username'=>$model->member3name]); if  ($user) {$user->teamname = '';$user->save(false);}
        $model->delete();
        return $this->redirect(['index']);
    }
    public function actionQuit($id)
    {
        $model = $this->findModel($id);
        $user = User::findOne(['username'=>Yii::$app->user->identity->username]);


        if($user==User::findOne(['username'=>$model->member1name]))
        {   
            $model->member1name='';
            $model->status--;
            $model->save(false);
            $user->teamname = '';
            $user->save(false);
        }
        else if($user==User::findOne(['username'=>$model->member2name]))
        {   
            $model->member2name='';
            $model->status--;
            $model->save(false);
            $user->teamname = '';
            $user->save(false);
        }
        else if($user==User::findOne(['username'=>$model->member3name]))
        {   
            $model->member3name='';
            $model->status--;
            $model->save(false);
            $user->teamname = '';
            $user->save(false);
        }
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
