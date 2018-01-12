<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "store_schedule".
 *
 * @property int $id
 * @property int $store_id Ссылка на магазин
 * @property int $day_of_week День недели
 * @property string $open Время открытия
 * @property string $close Время закрытия
 *
 * @property Store $store
 */
class StoreSchedule extends \yii\db\ActiveRecord
{
    public static $days = [
        1 => 'Воскресенье',
        2 => 'Понедельник',
        3 => 'Вторник',
        4 => 'Среда',
        5 => 'Четверг',
        6 => 'Пятница',
        7 => 'Суббота'
    ];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'store_schedule';
    }

    /**
     * @return array
     */
    public static function getDayList()
    {
        return StoreSchedule::$days;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['store_id', 'day_of_week', 'open', 'close'], 'required'],
            [['store_id', 'day_of_week'], 'integer'],
            [['open', 'close'], 'safe'],
            [['store_id'], 'exist', 'skipOnError' => true, 'targetClass' => Store::className(), 'targetAttribute' => ['store_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'store_id' => Yii::t('app', 'Ссылка на магазин'),
            'day_of_week' => Yii::t('app', 'День недели ID'),
            'open' => Yii::t('app', 'Время открытия'),
            'close' => Yii::t('app', 'Время закрытия'),
            'storeName' => Yii::t('app', 'Магазин'),
            'dayName' => Yii::t('app', 'День недели'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStore()
    {
        return $this->hasOne(Store::className(), ['id' => 'store_id']);
    }

    /**
     * @return string
     */
    public function getStoreName()
    {
        return $this->store->name;
    }

    /**
     * @return mixed
     */
    public function getDayName()
    {
        return StoreSchedule::$days[$this->day_of_week];
    }
}
