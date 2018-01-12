<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StoreScheduleCorrect */

$this->title = Yii::t('app', 'Create Store Schedule Correct');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Store Schedule Corrects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="store-schedule-correct-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
