<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "store_schedule_correct".
 *
 * @property int $id
 * @property int $store_id Ссылка на магазин
 * @property string $date Дата
 * @property string $open Время открытия
 * @property string $close Время закрытия
 *
 * @property Store $store
 */
class StoreScheduleCorrect extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'store_schedule_correct';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['store_id','date', 'open', 'close'], 'required'],
            [['store_id'], 'integer'],
            [['date', 'open', 'close'], 'safe'],
            [['store_id', 'date'], 'unique', 'targetAttribute' => ['store_id', 'date']],
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
            'date' => Yii::t('app', 'Дата'),
            'open' => Yii::t('app', 'Время открытия'),
            'close' => Yii::t('app', 'Время закрытия'),
            'storeName' => Yii::t('app', 'Магазин'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStore()
    {
        return $this->hasOne(Store::className(), ['id' => 'store_id']);
    }

    public function getStoreName() {
        return $this->store->name;
    }

}
