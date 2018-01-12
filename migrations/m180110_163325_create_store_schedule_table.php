<?php

use yii\db\Migration;

/**
 * Handles the creation of table `store_shedule`.
 */
class m180110_163325_create_store_schedule_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%store_schedule}}', [
            'id' => $this->primaryKey(),
            'store_id' => $this->integer()->notNull()->defaultValue(0)->comment('Ссылка на магазин'),
            'day_of_week' => $this->integer()->notNull()->defaultValue(0)->comment('День недели'),
            'open' => $this->time()->notNull()->defaultValue('00:00:00')->comment('Время открытия'),
            'close' => $this->time()->notNull()->defaultValue('00:00:00')->comment('Время закрытия'),
        ]);

        $this->createIndex('store_schedule_store_id_day', '{{%store_schedule}}', ['store_id', 'day_of_week'], 1);
        $this->createIndex('store_schedule_work', '{{%store_schedule}}', ['day_of_week', 'open', 'close']);

        $this->addForeignKey(
            'fk_store_schedule_store_id',
            '{{%store_schedule}}',
            'store_id',
            'store',
            'id',
            'CASCADE'
        );

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropIndex('store_schedule_work', '{{%store_schedule}}');
        $this->dropIndex('store_schedule_store_id_day', '{{%store_schedule}}');
        $this->dropForeignKey('fk_store_schedule_store_id', '{{%store_schedule}}');
        $this->dropTable('{{%store_schedule}}');
    }
}
