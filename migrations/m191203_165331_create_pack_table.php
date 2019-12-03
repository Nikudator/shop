<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pack}}`.
 */
class m191203_165331_create_pack_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pack}}', [
            'id' => $this->primaryKey(),
            'weight_pack' => $this->decimal()()->notNull(),
            'quantity' => $this->decimal()()->notNull(),
            'price' => $this->decimal()()->notNull(),
            'picture' => $this->string()()->notNull(),
            'is_pack' => $this->boolean()->defaultValue(false)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pack}}');
    }
}
