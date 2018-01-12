<?php

namespace app\models;

use app\classes\DefaultSchedules;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\ConflictHttpException;

/**
 * This is the model class for table "store".
 *
 * @property int $id
 * @property string $name Название магазина
 * @property int $status Статус
 */
class Store extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'store';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status'], 'integer'],
            [['name', 'schedule_info'], 'string', 'max' => 255],
            [['status'], 'default', 'value' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Название магазина'),
            'schedule_info' => Yii::t('app', 'Название графика'),
            'status' => Yii::t('app', 'Статус'),
        ];
    }

    /**
     * @param $name
     * @return bool|mixed
     * @throws ConflictHttpException
     */
    public function setDefaultSchedule($name)
    {
        $schedules = new DefaultSchedules();
        $schedule = $schedules->getSchedule($name);

        if (!$schedule) {
            throw new ConflictHttpException('Не указан дефолтный график!');
        }

        if (count($this->schedule) == 0) {
            foreach ($schedule['schedule'] as $item) {

                $data = new StoreSchedule;
                $data['store_id'] = $this->id;
                $data['day_of_week'] = $item['day_of_week'];
                $data['open'] = $item['open'];
                $data['close'] = $item['close'];
                $data->save();
            }
            $this->schedule_info = $schedule['info'];
            $this->save();

            return $schedule;
        } else {
            throw new ConflictHttpException('У магазина уже задан график!');
        }
    }


    /**
     * Открыт ли магазин в заданное время
     * @param string $dt
     * @return int
     */
    public function workedStatus($dt = '')
    {
        $dateTime = new \DateTime($dt);

        $date = $dateTime->format('Y-m-d');
        $day_of_week = $dateTime->format('w');
        $time = $dateTime->format('H:i:s');
        $day_of_week_mysql = $day_of_week + 1;

        $sh = StoreSchedule::find()
            ->andWhere(['=', 'store_id', $this->id])
            ->andWhere(['=', 'day_of_week', $day_of_week_mysql])
            ->andWhere(['<=', 'open', $time])
            ->andWhere(['>=', 'close', $time])
            ->one();

        $status = $sh ? 1 : 0;

        $correct = StoreScheduleCorrect::find()
            ->andWhere(['=', 'store_id', $this->id])
            ->andWhere(['=', 'date', $date])
            ->one();

        if ($correct != null) {

            $open = new \DateTime($correct['date'] . ' ' . $correct['open']);
            $close = new \DateTime($correct['date'] . ' ' . $correct['close']);

            $status = ($open <= $dateTime && $dateTime <= $close) ? 1 : 0;
        }

        return $status;
    }

    public static function getStoreList()
    {
        $stores = Store::find()
            ->select(['id', 'name'])
            ->all();
        return ArrayHelper::map($stores, 'id', 'name');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchedule()
    {
        return $this->hasMany(StoreSchedule::className(), ['store_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getScheduleCorrect()
    {
        return $this->hasMany(StoreScheduleCorrect::className(), ['store_id' => 'id']);
    }

}
