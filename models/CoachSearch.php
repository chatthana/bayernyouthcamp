<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Coaches;

/**
 * CoachSearch represents the model behind the search form about `app\models\Coaches`.
 */
class CoachSearch extends Coaches
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'age', 'virtual_team'], 'integer'],
            [['name', 'name_en', 'identity_card_no', 'identity_card_path', 'telephone', 'email', 'school', 'address', 'created'], 'safe'],
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
        $query = Coaches::find();

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
            'age' => $this->age,
            'virtual_team' => $this->virtual_team,
            'created' => $this->created,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'name_en', $this->name_en])
            ->andFilterWhere(['like', 'identity_card_no', $this->identity_card_no])
            ->andFilterWhere(['like', 'identity_card_path', $this->identity_card_path])
            ->andFilterWhere(['like', 'telephone', $this->telephone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'school', $this->school])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}
