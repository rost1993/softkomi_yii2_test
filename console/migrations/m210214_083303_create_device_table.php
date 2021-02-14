<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%device}}`.
 */
class m210214_083303_create_device_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%device}}', [
            'id' => $this->primaryKey(),
            'id_store' => $this->integer()->null()->defaultValue(0),
            'serial_number_device' => $this->string(100)->notNull()->unique(),
            'create_date' => $this->dateTime()->null(),
            'update_date' => $this->dateTime()->null(),
        ]);

        $this->createIndex('ind_device_id_store', 'device', 'id_store');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%device}}');
    }
}
