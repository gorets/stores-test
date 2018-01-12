<?php
/**
 * Created by PhpStorm.
 * User: gorets
 * Date: 11.01.2018
 * Time: 11:38
 */
?>

<table class="table table-striped table-bordered detail-view">
    <tr>
        <th>День недели</th>
        <th>Открытие</th>
        <th>Закрытие</th>
    </tr>

    <?
    foreach ($store->schedule as $item) {
        echo "<tr>";
        echo "<td>" . $item->dayName . "</td>";
        echo "<td>" . Yii::$app->formatter->asTime($item->open, 'HH:mm') . "</td>";
        echo "<td>" . Yii::$app->formatter->asTime($item->close, 'HH:mm') . "</td>";
        echo "</tr>";
    }
    ?>
</table>
