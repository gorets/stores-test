<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\StoreSchedule */

$this->title = $model->storeName .' / ' .$model->dayName;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Store Schedules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="store-schedule-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            //'store_id',
            [
                'label' => 'Магазин',
                'attribute' => 'store_id',
                'value' => function ($data) {
                    return $data->storeName;
                }
            ],
            [
                'attribute' => 'day_of_week',
                'label' => 'День недели',
                'value' => function ($data) {
                    return $data->dayName;
                }
            ],
            'open',
            'close',
        ],
    ]) ?>

</div>
