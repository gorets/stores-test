<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StoreSchedule */

$this->title = Yii::t('app', 'Update: {nameAttribute}', [
    'nameAttribute' => $model->storeName .' / ' .$model->dayName,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Store Schedules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->storeName .' / ' .$model->dayName, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="store-schedule-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
