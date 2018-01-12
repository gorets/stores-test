<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StoreSchedule */

$this->title = Yii::t('app', 'Create Store Schedule');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Store Schedules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="store-schedule-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
