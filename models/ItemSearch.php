<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Item;

/**
 * ItemSearch represents the model behind the search form of `app\models\Item`.
 */
class ItemSearch extends Item
{
    public $manufacturer;
    public $country;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'manufacturer_id'], 'integer'],
            [['title', 'description', 'country', 'manufacturer'], 'safe'],
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
        $query = Item::find();
        $query->joinWith(['manufacturer'],
            ->joinWith['country']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['manufacturer'] = [
            'asc' => [Manufacturer::tableName().'.name' => SORT_ASC],
            'desc' => [Manufacturer::tableName().'.name' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['country'] = [
            'asc' => [Manufacturer::tableName().'.country' => SORT_ASC],
            'desc' => [Manufacturer::tableName().'.country' => SORT_DESC],
        ];
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'manufacturer_id' => $this->manufacturer_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', Manufacturer::tableName().'.name', $this->manufacturer])
            ->andFilterWhere(['like', Manufacturer::tableName().'.country', $this->country]);

        return $dataProvider;
    }
}
