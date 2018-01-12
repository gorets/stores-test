<?php

use app\models\Store;
use app\models\StoreSchedule;
use kartik\datetime\DateTimePicker;
use kartik\time\TimePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StoreSchedule */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="store-schedule-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'store_id')->dropDownList(Store::getStoreList()) ?>

    <?= $form->field($model, 'day_of_week')->dropDownList(StoreSchedule::getDayList())->label('День недели') ?>

    <?= $form->field($model, 'open')->textInput()->widget(TimePicker::className(), ['pluginOptions' => ['showMeridian' => false]]) ?>

    <?= $form->field($model, 'close')->textInput()->widget(TimePicker::className(), ['pluginOptions' => ['showMeridian' => false]]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
