<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Talleres;

/**
 * TalleresSearch represents the model behind the search form about `app\models\Talleres`.
 */
class TalleresSearch extends Talleres
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['taller', 'cicloid'], 'safe'],
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
        $query = Talleres::find();
        $query->joinWith(['ciclo']);

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
            //'cicloid' => $this->cicloid,
        ]);

        $query->andFilterWhere(['like', 'taller', $this->taller])
            ->andFilterWhere(['like', 'ciclos.ciclo', $this->cicloid]);

        return $dataProvider;
    }
}
