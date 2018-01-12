<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StoreScheduleCorrect */

$this->title = Yii::t('app', 'Update: {nameAttribute}', [
    'nameAttribute' => $model->storeName .' / ' .$model->date,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Store Schedule Corrects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->storeName .' / ' .$model->date, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="store-schedule-correct-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
