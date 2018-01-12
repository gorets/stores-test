<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\StoreSchedule;
use yii\helpers\VarDumper;

/**
 * StoreScheduleSearch represents the model behind the search form of `app\models\StoreSchedule`.
 */
class StoreScheduleSearch extends StoreSchedule
{
    public $storeName;

    public $dayName;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['storeName','dayName','store_id','day_of_week'], 'safe'],
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
        $query = StoreSchedule::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        /**
         * statement below
         */
//        $dataProvider->setSort([
//            'attributes' => [
//            ]
//        ]);

        $dataProvider->setSort([
            'attributes' => [
                'storeName' => [
                    'asc' => ['store.name' => SORT_ASC],
                    'desc' => ['store.name' => SORT_DESC],
                    'label' => 'Магазин'
                ]
            ]
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
            //'day_of_week' => $this->day_of_week,
            //'open' => $this->open,
            //'close' => $this->close,
            'store_id' => $this->store_id,
            'day_of_week' => $this->day_of_week,
        ]);

        $query->joinWith(['store' => function ($q) {
            $q->andFilterWhere(['like', 'store.name', $this->storeName]);
        }]);

        //VarDumper::dump($query->sql, 10, 1);

        return $dataProvider;
    }
}
