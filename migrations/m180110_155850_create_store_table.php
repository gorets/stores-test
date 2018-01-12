<?php

use yii\db\Migration;

/**
 * Handles the creation of table `store`.
 */
class m180110_155850_create_store_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%store}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull()->defaultValue('')->comment('Название магазина'),
            'schedule_info' => $this->string(255)->notNull()->defaultValue('')->comment('Название графика'),
            'status' => $this->boolean()->notNull()->defaultValue(1)->comment('Статус'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%store}}');
    }
}
