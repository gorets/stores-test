<?php

use yii\db\Migration;

/**
 * Class m180110_170032_create_default_data
 */
class m180110_170032_create_default_data extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->insert('{{%store}}', ['name' => 'Первый магазин', 'schedule_info' => 'custom', 'status' => 1]);
        $this->insert('{{%store_schedule}}', ['store_id' => 1, 'day_of_week' => 2, 'open' => '09:00:00', 'close' => '18:00:00']);
        $this->insert('{{%store_schedule}}', ['store_id' => 1, 'day_of_week' => 3, 'open' => '09:00:00', 'close' => '18:00:00']);
        $this->insert('{{%store_schedule}}', ['store_id' => 1, 'day_of_week' => 4, 'open' => '09:00:00', 'close' => '18:00:00']);
        $this->insert('{{%store_schedule}}', ['store_id' => 1, 'day_of_week' => 5, 'open' => '09:00:00', 'close' => '18:00:00']);
        $this->insert('{{%store_schedule}}', ['store_id' => 1, 'day_of_week' => 6, 'open' => '09:00:00', 'close' => '18:00:00']);
        $this->insert('{{%store_schedule}}', ['store_id' => 1, 'day_of_week' => 7, 'open' => '11:00:00', 'close' => '16:00:00']);
        $this->insert('{{%store_schedule}}', ['store_id' => 1, 'day_of_week' => 1, 'open' => '00:00:00', 'close' => '00:00:00']);

        $this->insert('{{%store_schedule_correct}}', ['store_id' => 1, 'date' => '2018-01-01', 'open' => '00:00:00', 'close' => '00:00:00']);
        $this->insert('{{%store_schedule_correct}}', ['store_id' => 1, 'date' => '2018-01-02', 'open' => '12:00:00', 'close' => '15:00:00']);


        $this->insert('{{%store}}', ['name' => 'Второй магазин', 'schedule_info' => 'custom', 'status' => 1]);
        $this->insert('{{%store_schedule}}', ['store_id' => 2, 'day_of_week' => 2, 'open' => '09:00:00', 'close' => '18:00:00']);
        $this->insert('{{%store_schedule}}', ['store_id' => 2, 'day_of_week' => 3, 'open' => '09:00:00', 'close' => '18:00:00']);
        $this->insert('{{%store_schedule}}', ['store_id' => 2, 'day_of_week' => 4, 'open' => '09:00:00', 'close' => '18:00:00']);
        $this->insert('{{%store_schedule}}', ['store_id' => 2, 'day_of_week' => 5, 'open' => '09:00:00', 'close' => '18:00:00']);
        $this->insert('{{%store_schedule}}', ['store_id' => 2, 'day_of_week' => 6, 'open' => '09:00:00', 'close' => '18:00:00']);
        $this->insert('{{%store_schedule}}', ['store_id' => 2, 'day_of_week' => 7, 'open' => '11:00:00', 'close' => '16:00:00']);
        $this->insert('{{%store_schedule}}', ['store_id' => 2, 'day_of_week' => 1, 'open' => '00:00:00', 'close' => '00:00:00']);

        $this->insert('{{%store_schedule_correct}}', ['store_id' => 2, 'date' => '2018-01-01', 'open' => '00:00:00', 'close' => '23:59:00']);
        $this->insert('{{%store_schedule_correct}}', ['store_id' => 2, 'date' => '2018-01-06', 'open' => '00:00:00', 'close' => '23:59:00']);

        $this->insert('{{%store}}', ['name' => 'Третий магазин', 'schedule_info' => 'custom', 'status' => 1]);
        $this->insert('{{%store_schedule}}', ['store_id' => 3, 'day_of_week' => 2, 'open' => '09:00:00', 'close' => '18:00:00']);
        $this->insert('{{%store_schedule}}', ['store_id' => 3, 'day_of_week' => 3, 'open' => '09:00:00', 'close' => '18:00:00']);
        $this->insert('{{%store_schedule}}', ['store_id' => 3, 'day_of_week' => 4, 'open' => '09:00:00', 'close' => '18:00:00']);
        $this->insert('{{%store_schedule}}', ['store_id' => 3, 'day_of_week' => 5, 'open' => '09:00:00', 'close' => '18:00:00']);
        $this->insert('{{%store_schedule}}', ['store_id' => 3, 'day_of_week' => 6, 'open' => '09:00:00', 'close' => '18:00:00']);
        $this->insert('{{%store_schedule}}', ['store_id' => 3, 'day_of_week' => 7, 'open' => '11:00:00', 'close' => '16:00:00']);
        $this->insert('{{%store_schedule}}', ['store_id' => 3, 'day_of_week' => 1, 'open' => '00:00:00', 'close' => '00:00:00']);

        $this->insert('{{%store}}', ['name' => 'Круглосуточный магазин', 'schedule_info' => 'круглосуточный', 'status' => 1]);
        $this->insert('{{%store_schedule}}', ['store_id' => 4, 'day_of_week' => 2, 'open' => '00:00:00', 'close' => '23:59:00']);
        $this->insert('{{%store_schedule}}', ['store_id' => 4, 'day_of_week' => 3, 'open' => '00:00:00', 'close' => '23:59:00']);
        $this->insert('{{%store_schedule}}', ['store_id' => 4, 'day_of_week' => 4, 'open' => '00:00:00', 'close' => '23:59:00']);
        $this->insert('{{%store_schedule}}', ['store_id' => 4, 'day_of_week' => 5, 'open' => '00:00:00', 'close' => '23:59:00']);
        $this->insert('{{%store_schedule}}', ['store_id' => 4, 'day_of_week' => 6, 'open' => '00:00:00', 'close' => '23:59:00']);
        $this->insert('{{%store_schedule}}', ['store_id' => 4, 'day_of_week' => 7, 'open' => '00:00:00', 'close' => '23:59:00']);
        $this->insert('{{%store_schedule}}', ['store_id' => 4, 'day_of_week' => 1, 'open' => '00:00:00', 'close' => '23:59:00']);

        $this->insert('{{%store_schedule_correct}}', ['store_id' => 4, 'date' => '2018-01-01', 'open' => '00:00:00', 'close' => '00:00:00']);

        $this->insert('{{%store}}', ['name' => 'Пятый магазин', 'schedule_info' => '', 'status' => 1]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->truncateTable('{{%store}}');
        $this->truncateTable('{{%store_schedule}}');
        $this->truncateTable('{{%store_schedule_correct}}');

        echo "data truncated.\n";
    }

}
