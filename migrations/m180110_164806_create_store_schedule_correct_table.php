<?php

use yii\db\Migration;

/**
 * Handles the creation of table `store_shedule_correct`.
 */
class m180110_164806_create_store_schedule_correct_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%store_schedule_correct}}', [
            'id' => $this->primaryKey(),
            'store_id' => $this->integer()->notNull()->defaultValue(0)->comment('Ссылка на магазин'),
            'date' => $this->date()->comment('Дата'),
            'open' => $this->time()->notNull()->defaultValue('00:00:00')->comment('Время открытия'),
            'close' => $this->time()->notNull()->defaultValue('00:00:00')->comment('Время закрытия'),
        ]);

        $this->createIndex('store_schedule_correct_work', '{{%store_schedule_correct}}', ['date', 'open', 'close']);
        $this->createIndex('store_schedule_correct_unique', '{{%store_schedule_correct}}', ['store_id', 'date'], true);

        $this->addForeignKey(
            'fk_store_schedule_correct_store_id',
            '{{%store_schedule_correct}}',
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
        $this->dropIndex('store_schedule_correct_unique', '{{%store_schedule_correct}}');
        $this->dropIndex('store_schedule_correct_work', '{{%store_schedule_correct}}');
        $this->dropForeignKey('fk_store_schedule_correct_store_id', '{{%store_schedule_correct}}');

        $this->dropTable('{{%store_schedule_correct}}');
    }
}
