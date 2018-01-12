<?php
/**
 * Created by PhpStorm.
 * User: gorets
 * Date: 10.01.2018
 * Time: 22:27
 */

use kartik\datetime\DateTimePicker;
use yii\bootstrap\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

//$this->title = 'Работающие магазины';

?>

<?php Pjax::begin(['enablePushState' => false, 'id' => 'dataFilter']); ?>

<?= Html::beginForm(['/store/show-worked'], 'post', ['data-pjax' => '', 'class' => 'form-inline']); ?>

<?

echo DateTimePicker::widget([
    'name' => 'date',
    'type' => DateTimePicker::TYPE_INPUT,
    'value' => isset($date)? $date: date('d.m.Y H:i'),
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'dd.mm.yyyy hh:ii'
    ]
]);
?>

<?= Html::submitButton(Yii::t('app', 'Worked Stores'), ['class' => 'btn btn-primary', 'title'=>'Show Worked Stores', 'name' => 'send-button']) ?>

<?= Html::endForm() ?>

<hr>

<? if (isset($date)) {
    ?>
    <div class="alert alert-info">Работающие магазины на <strong><?= $date ?></strong> </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
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
            //'schedule_info',
            //'status',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'headerOptions' => ['width' => '40'],
            ],
        ],
    ]); ?>
<? } ?>
<?php Pjax::end(); ?>