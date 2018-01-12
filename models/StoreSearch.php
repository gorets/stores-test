<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\VarDumper;

/**
 * StoreSearch represents the model behind the search form of `app\models\Store`.
 */
class StoreSearch extends Store
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['name'], 'safe'],
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
        $query = Store::find();

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
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);


        //поиск на определенную дату работы
        if (isset($params['date'])) {
            if (strtotime($params['date'])) {
                $dateTime = new \DateTime($params['date']);

                $date = $dateTime->format('Y-m-d');
                $day_of_week = $dateTime->format('w');
                $time = $dateTime->format('H:i:s');
                $day_of_week_mysql = $day_of_week + 1;

                $sh = $querySchedule = StoreSchedule::find()
                    ->select(['store_id'])
                    ->andWhere(['=', 'day_of_week', $day_of_week_mysql])
                    ->andWhere(['<=', 'open', $time])
                    ->andWhere(['>=', 'close', $time])
                    ->all();

                $active = [];
                foreach ($sh as $item) {
                    $active[] = $item['store_id'];
                }

                $correct = StoreScheduleCorrect::find()
                    ->andWhere(['=', 'date', $date])
                    ->all();

                //корректировки на выбранный день
                if ($correct) {
                    foreach ($correct as $item) {

                        $open = new \DateTime($item['date'] . ' ' . $item['open']);
                        $close = new \DateTime($item['date'] . ' ' . $item['close']);
                        $status = ($open <= $dateTime && $dateTime <= $close) ? 1 : 0;
                        $store_id = $item['store_id'];

                        //если по корректировке закрыт
                        $key = array_search($store_id, $active);
                        if ($key !== false && $status == 0) {
                            unset($active[$key]);
                        }

                        //если по корректировке открыт
                        if($key === false && $status == 1){
                            $active[] = $store_id;
                        }
                    }
                }
                //VarDumper::dump($active, 10, 1);

                $query->andFilterWhere(['in', 'id', $active]);
            }
        }

        return $dataProvider;
    }


}
