<?php
/**
 * Created by PhpStorm.
 * User: gorets
 * Date: 10.01.2018
 * Time: 22:56
 */

use yii\helpers\Html;
use yii\widgets\Pjax;

?>

<?php Pjax::begin(['enablePushState' => false, 'id' => 'dataFilter']); ?>

<?= Html::beginForm(['/store/show-worked'], 'post', ['data-pjax' => '', 'class' => 'form-inline']); ?>

<?= Html::input('text', 'date', isset($date)? $date: date('d.m.Y H:i'), ['class' => 'form-control']) ?>

<?= Html::submitButton(Yii::t('app', 'Worked Stores'), ['class' => 'btn btn-primary', 'title'=>'Show Worked Stores', 'name' => 'send-button']) ?>

<?= Html::endForm() ?>



<?php Pjax::end(); ?>
