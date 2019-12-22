<?php

namespace app\modules\admin\controllers;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pack;

/**
 * PackSearch represents the model behind the search form of `app\models\Pack`.
 */
class PackSearch extends Pack
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'item_id', 'quantity', 'is_pack', 'pack_weight', 'weight_pack'], 'integer'],
            [['price'], 'number'],
            [['picture'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Pack::find();

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
            'item_id' => $this->item_id,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'is_pack' => $this->is_pack,
            'pack_weight' => $this->pack_weight,
            'weight_pack' => $this->weight_pack,
        ]);

        $query->andFilterWhere(['like', 'picture', $this->picture]);

        return $dataProvider;
    }
}
