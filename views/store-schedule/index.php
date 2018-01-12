<?php

use app\models\Store;
use app\models\StoreSchedule;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StoreScheduleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Store Schedules');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="store-schedule-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Store Schedule'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        //'layout'=>"{pager}\n{summary}\n{items}",
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'storeName',
            //'store.id',
            [
                'attribute' => 'store_id',
                'label' => 'Магазин',
                'format' => 'text',
                'content' => function ($data) {
                    return $data->store->name;
                },
                'filter' => Store::getStoreList()
            ],
            [
                'attribute' => 'day_of_week',
                'label' => 'День недели',
                'content' => function ($data) {
                    return $data->dayName;
                },
                'filter' => StoreSchedule::getDayList()
            ],
            'open',
            'close',
            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['width' => '80'],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
