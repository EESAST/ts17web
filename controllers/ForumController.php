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

    public function actionIndex($kinds='all')
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
                'like' => [
                    'asc' => ['like' => SORT_ASC],
                    'desc' => ['like' => SORT_DESC],
                    'default' => SORT_DESC,
                    'label' => '赞',
                ],
                'kinds' => [
                    'asc' => ['kinds' => SORT_ASC],
                    'desc' => ['kinds' => SORT_DESC],
                    'default' => SORT_ASC,
                    'label' => '类别',
                ],

            ],

            'defaultOrder' => ['updated_at' => SORT_DESC], 

        ]);
        
        if($kinds==='all'){
            $query = Forum::find();
        }elseif ($kinds==='tucao') {
            $query = Forum::find()->where(array('kinds'=>'tucao'));
        }elseif ($kinds==='tactic') {
            $query = Forum::find()->where(array('kinds'=>'tactic'));
        }elseif ($kinds==='rule') {
            $query = Forum::find()->where(array('kinds'=>'rule'));
        }elseif ($kinds==='bug') {
            $query = Forum::find()->where(array('kinds'=>'bug'));
        }elseif ($kinds==='aboutme') {
            $query1 = Forum::find()->where(array('author'=>Yii::$app->user->identity->username));
            $query2id = DetailForum::find()->select(['fatherindex'])
                ->where(array('author'=>Yii::$app->user->identity->username));
            $query2 = Forum::find()->where(array('index'=>$query2id));
            $query1->union($query2);//这里下面的排序还只能实现两个各自排，就是第一个排好然后排第二个然后接在一起
            $query=$query1;
        }else{
            $query = Forum::find();
        }

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $forums = $query->orderBy($sort->orders)
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $sort1 = new Sort([//用来置顶2个点赞量最高的
            'attributes' => [
                'like' => [
                    'asc' => ['like' => SORT_ASC],
                    'desc' => ['like' => SORT_DESC],
                    'default' => SORT_DESC,
                    'label' => '赞',
                ],

            ],
            'defaultOrder' => ['like' => SORT_DESC],
        ]);
        $topquery = Forum::find()->orderBy($sort1->orders)
            ->limit(2)
            ->all();//用来置顶3个浏览量最高的

        return $this->render('index', [
            'forums' => $forums,
            'pagination' => $pagination,
            'sort' => $sort,
            'topquery' => $topquery,//用来置顶3个浏览量最高的
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

        //以下热门讨论贴
        $sort = new Sort([
            'attributes' => [
                'like' => [
                    'asc' => ['like' => SORT_ASC],
                    'desc' => ['like' => SORT_DESC],
                    'default' => SORT_DESC,
                    'label' => '赞',
                ],
            ],
            'defaultOrder' => ['like' => SORT_DESC], 
        ]);
        $forums = Forum::find()->orderBy($sort->orders)
            ->limit(8)
            ->all();
        //以上热门讨论贴

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
            return $this->redirect(['forum/detail-forum','id'=>$fathermodel->index]);
        } 
        else {
            return $this->render('detailforum', [
            'forum' => $fathermodel,//当前的论坛帖子
            'detailforums'=>$this->findReplies($id),//回复的帖子们
            'model'=>$model, //新建的回复
            'forums'=>$forums//热门讨论贴
        ]);
        }

    }

    //删除自己发的帖子
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->delete();
        return $this->redirect(['index']);
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
