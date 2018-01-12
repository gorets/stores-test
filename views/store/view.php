<?php

use app\classes\DefaultSchedules;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $store app\models\Store */

$this->title = $store->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="store-view">

    <div class="row">
        <div class="col-sm-6">
            <h1>
                <?= Html::encode($this->title) ?>
                <?= $store->workedStatus() ? "<span class='badge badge-success'>Открыт</span>":"<span class='badge badge-danger'>Закрыт</span>"?>
            </h1>
        </div>
        <div class="col-sm-6 text-right">
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $store->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $store->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        </div>
    </div>

    <?= DetailView::widget([
        'model' => $store,
        'attributes' => [
            'id',
            'name',
            'schedule_info',
//            [
//                'label' => 'Состояние',
//                'format' => 'raw',
//                'value' => function ($data) {
//                    return $data->workedStatus() ? "<span class='badge badge-success'>Открыт</span>":"<span class='badge badge-danger'>Закрыт</span>";
//                }
//            ],
            //'status',
        ],
    ]) ?>


    <hr>
    <h4>Основной график работы</h4>
    <? if(count($store->schedule)){ ?>

    <?= $this->render('schedule-table', ['store' => $store])?>

    <? } else { ?>


        <?php Pjax::begin(['enablePushState' => false, 'id' => 'dataFilter']); ?>

        <div class="alert alert-warning">Основной график еще не задан. Выберите один из стандартных графиков.</div>

        <?= Html::beginForm(['/store/set-schedule'], 'post', ['data-pjax' => '', 'class' => 'form-inline']); ?>

        <?
        $data = [];
        $data[] = '';
        $sh = new DefaultSchedules;
        $schedules = $sh->getSchedules();
        foreach ($schedules as $item) {
            $data[$item['name']] = $item['info'];
        }
        ?>

        <?= Html::hiddenInput('store-id', $store->id) ?>

        <?= Html::dropDownList('schedule-name', [], $data, ['class' => 'form-control']) ?>

        <?= Html::submitButton(Yii::t('app', 'Set Schedule'), ['class' => 'btn btn-primary', 'title'=>'Set Schedule', 'name' => 'send-button']) ?>

        <?= Html::endForm() ?>

        <?php Pjax::end(); ?>


    <?}?>

    <? if (count($store->scheduleCorrect)) { ?>
    <hr>
    <h4>Корректировки графика</h4>
    <table class="table table-striped table-bordered detail-view">
        <tr>
            <th>Дата</th>
            <th>Открытие</th>
            <th>Закрытие</th>
        </tr>

        <?
        foreach ($store->scheduleCorrect as $item) {
            echo "<tr>";
            echo "<td>" . $item->date . "</td>";
            echo "<td>" . Yii::$app->formatter->asTime($item->open, 'HH:mm') . "</td>";
            echo "<td>" . Yii::$app->formatter->asTime($item->close, 'HH:mm') . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <? } ?>


</div>
