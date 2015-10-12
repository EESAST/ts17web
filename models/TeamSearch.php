<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Team;

/**
 * TeamSearch represents the model behind the search form about `app\models\Team`.
 */
class TeamSearch extends Team
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['teamname', 'leadername', 'member1name', 'member2name', 'member3name', 'slogan', 'key'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Team::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'teamname', $this->teamname])
            ->andFilterWhere(['like', 'leadername', $this->leadername])
            ->andFilterWhere(['like', 'member1name', $this->member1name])
            ->andFilterWhere(['like', 'member2name', $this->member2name])
            ->andFilterWhere(['like', 'member3name', $this->member3name])
            ->andFilterWhere(['like', 'slogan', $this->slogan])
            ->andFilterWhere(['like', 'key', $this->key]);

        return $dataProvider;
    }
}