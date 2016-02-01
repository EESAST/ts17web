<?php
namespace app\controllers;
use Yii;
use yii\data\Pagination;
use yii\data\sort;
use app\models\Forum;
use app\models\ForumForm;
use app\models\DetailForum;
use app\models\DetailForumForm;

class ForumController extends \yii\web\Controller
{

    public function actionIndex()
    {
        $sort = new Sort([
            'attributes' => [

                'theme'=>[
                    'asc' => ['theme' => SORT_ASC],
                    'desc' => ['theme' => SORT_DESC],
                    'default' => SORT_ASC,
                    'label' => '主题',
                ],
                'author' => [
                    'asc' => ['author' => SORT_ASC],
                    'desc' => ['author' => SORT_DESC],
                    'default' => SORT_DESC,
                    'label' => '作者',
                ],
                'reply' => [
                    'asc' => ['reply' => SORT_ASC],
                    'desc' => ['reply' => SORT_DESC],
                    'default' => SORT_DESC,
                    'label' => '回复',

                ],
                'updated_at' => [
                    'asc' => ['updated_at' => SORT_ASC],
                    'desc' => ['updated_at' => SORT_DESC],
                    'default' => SORT_DESC,
                    'label' => '最后更新',
                ],

            ],

            'defaultOrder' => ['updated_at' => SORT_DESC], 

        ]);

        $query = Forum::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $forums = $query->orderBy($sort->orders)
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'forums' => $forums,
            'pagination' => $pagination,
            'sort' => $sort,
        ]);
    }
   	public function actionNewForum(){

        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

   		$model = new ForumForm;
   		$model->created_at = date("Y-m-d H:i:s");
   		if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $forum = new Forum;
            $forum->author = Yii::$app->user->identity->username;
            $forum->theme = $model->theme;
            $forum->content = $model->content;
            $forum->kinds = $model->kinds;
            $forum->created_at = $model->created_at;
            $forum->updated_at = $model->created_at;
			$forum->save(true);

            return $this->redirect(['index']);

        } else {
            return $this->render('newforum', ['model' => $model]);
        }

   	}


    //点入查看帖子的回复
    public function actionDetailForum($id)
    {
        
        $model = new DetailForumForm;
        $model->created_at = date("Y-m-d H:i:s");

        $fathermodel=$this->findModel($id);

        //新建回复
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $forum = new DetailForum;
            $forum->author = Yii::$app->user->identity->username;
            $forum->fatherindex = $id;
            $forum->reply = $model->reply;
            $forum->created_at = $model->created_at;
            $forum->save(true);

            $fathermodel->reply=$fathermodel->reply+1;
            $fathermodel->updated_at=$forum->created_at;
            $fathermodel->save(true);
            return $this->redirect(['forum/detail-forum','id'=>$fathermodel->index]);//应该  成服务器对应的网址
        } 
        else {
            return $this->render('detailforum', [
            'forum' => $fathermodel, 'detailforums'=>$this->findReplies($id),'model'=>$model
        ]);
        }

    }


    protected function findModel($id)
    {
        if (($model = Forum::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findReplies($id)
    {

        $query = DetailForum::find()->where(['fatherindex' => $id]);

        $detailforums = $query->orderBy('index')->all();

        return $detailforums;

    }

}
