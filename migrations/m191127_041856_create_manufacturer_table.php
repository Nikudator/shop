<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%manufacturer}}`.
 */
class m191127_041856_create_manufacturer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%manufacturer}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'country' => $this->string()->notNull(),
            'price' => $this->decimal()->notNull(),
        ]);
        $this->createIndex(
            '{{%idx-name-manufacturer}}',
            '{{%manufacturer}}',
            'name'
        );
        $this->createIndex(
            '{{%idx-country-manufacturer}}',
            '{{%manufacturer}}',
            'country'
        );         }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%manufacturer}}');
    }
}
