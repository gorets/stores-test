<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\StoreScheduleCorrect */

$this->title = $model->storeName .' / ' .$model->date;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Store Schedule Corrects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="store-schedule-correct-view">

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
            [
                'attribute' => 'store_id',
                'value' => function ($data) {
                    return $data->storeName;
                }
            ],

            'date',
            'open',
            'close',
        ],
    ]) ?>

</div>
