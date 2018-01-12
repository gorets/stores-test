<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StoreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Stores');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="store-index">
    <div class="row">
        <div class="col-sm-6">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="col-sm-6 text-right">
            <?= Html::a(Yii::t('app', 'Create Store'), ['create'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'id',
                'contentOptions' => ['style' => 'width: 100px;']
            ],
            'name',
            [
                'label' => 'График',
                'value' => function ($data) {
                    return count($data->schedule) ? $data->schedule_info: null;
                    //return  null;
                }
            ],
            [
                'label' => 'Состояние',
                'format' => 'raw',
                'value' => function ($data) {
                    return $data->workedStatus() ? "<span class='badge badge-success'>Открыт</span>":"<span class='badge badge-danger'>Закрыт</span>";
                },
            ],
            //'schedule_info',
            //'status',
            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['width' => '80'],
            ],
        ],
    ]); ?>


    <?php Pjax::end(); ?>
</div>
