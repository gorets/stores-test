<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\StoreScheduleCorrect;

/**
 * StoreScheduleCorrectSearch represents the model behind the search form of `app\models\StoreScheduleCorrect`.
 */
class StoreScheduleCorrectSearch extends StoreScheduleCorrect
{
    public $storeName;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'storeName', 'store_id'], 'safe'],
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
        $query = StoreScheduleCorrect::find();

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
            'store_id' => $this->store_id,
            'date' => $this->date,
            'open' => $this->open,
            'close' => $this->close,
        ]);


        $query->joinWith(['store' => function ($q) {
            $q->andFilterWhere(['like', 'store.name', $this->storeName]);
        }]);

        return $dataProvider;
    }
}
