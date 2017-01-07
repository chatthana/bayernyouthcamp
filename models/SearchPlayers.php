<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Players;

/**
 * SearchPlayers represents the model behind the search form about `app\models\Players`.
 */
class SearchPlayers extends Players
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'age', 'year', 'weight', 'height', 'virtual_team'], 'integer'],
            [['unique_id', 'name', 'name_en', 'nickname', 'birthdate', 'identity_card_no', 'identity_card_path', 'school', 'address', 'telephone', 'line_id', 'facebook_link', 'email', 'foot', 'pp', 'ppa', 'team', 'guardian_name', 'guardian_telephone', 'arena', 'source', 'created'], 'safe'],
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
        $query = Players::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'birthdate' => $this->birthdate,
            'age' => $this->age,
            'year' => $this->year,
            'weight' => $this->weight,
            'height' => $this->height,
            'virtual_team' => $this->virtual_team,
            'source' => $this->source,
            'created' => $this->created,
        ]);

        $query->andFilterWhere(['like', 'unique_id', $this->unique_id])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'name_en', $this->name_en])
            ->andFilterWhere(['like', 'nickname', $this->nickname])
            ->andFilterWhere(['like', 'identity_card_no', $this->identity_card_no])
            ->andFilterWhere(['like', 'identity_card_path', $this->identity_card_path])
            ->andFilterWhere(['like', 'school', $this->school])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'telephone', $this->telephone])
            ->andFilterWhere(['like', 'line_id', $this->line_id])
            ->andFilterWhere(['like', 'facebook_link', $this->facebook_link])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'foot', $this->foot])
            ->andFilterWhere(['like', 'pp', $this->pp])
            ->andFilterWhere(['like', 'ppa', $this->ppa])
            ->andFilterWhere(['like', 'team', $this->team])
            ->andFilterWhere(['like', 'guardian_name', $this->guardian_name])
            ->andFilterWhere(['like', 'source', $this->source])
            ->andFilterWhere(['like', 'guardian_telephone', $this->guardian_telephone])
            ->andFilterWhere(['like', 'arena', $this->arena]);

        return $dataProvider;
    }
}
