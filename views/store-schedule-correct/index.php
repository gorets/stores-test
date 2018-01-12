<?php

use app\models\Store;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StoreScheduleCorrectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Store Schedule Corrects');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="store-schedule-correct-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Store Schedule Correct'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            //'id',
            //'storeName',
            [
                'attribute' => 'store_id',
                'label' => 'Магазин',
                'format' => 'text',
                'content' => function ($data) {
                    return $data->store->name;
                },
                'filter' => Store::getStoreList()
            ],
            'date',
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
