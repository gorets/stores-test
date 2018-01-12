<?php
/**
 * Created by PhpStorm.
 * User: gorets
 * Date: 10.01.2018
 * Time: 17:23
 */

use yii\helpers\Html;
use yii\widgets\Pjax;

$this->title = Yii::$app->params['site.title'];
//$this->params['breadcrumbs'][] = $this->title;
?>
<h1>Работающие магазины</h1>
<?= $this->render('/store/filtered-list')?>
