<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Horarios;

/**
 * HorariosSearch represents the model behind the search form about `app\models\Horarios`.
 */
class HorariosSearch extends Horarios
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['horario', 'tallerid'], 'safe'],
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
        $query = Horarios::find();
        $query->joinWith(['taller']);
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
            //'tallerid' => $this->tallerid,
        ]);

        $query->andFilterWhere(['like', 'horario', $this->horario])
            ->andFilterWhere(['like', 'talleres.taller', $this->tallerid]);

        return $dataProvider;
    }
}
