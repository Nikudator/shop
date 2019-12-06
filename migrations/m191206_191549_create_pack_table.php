<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pack}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%item}}`
 */
class m191206_191549_create_pack_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pack}}', [
            'id' => $this->primaryKey(),
            'item_id' => $this->integer()->notNull(),
            'quantity' => $this->integer()->notNull(),
            'price' => $this->decimal()->notNull(),
            'is_pack' => $this->boolean()->notNull()->defaultValue(false),
            'price' => $this->decimal()->notNull(),
            'pack_weight' => $this->integer()->notNull(),
            'picture' => $this->string()->notNull(),
        ]);

        // creates index for column `item_id`
        $this->createIndex(
            '{{%idx-pack-item_id}}',
            '{{%pack}}',
            'item_id'
        );

        // add foreign key for table `{{%item}}`
        $this->addForeignKey(
            '{{%fk-pack-item_id}}',
            '{{%pack}}',
            'item_id',
            '{{%item}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%item}}`
        $this->dropForeignKey(
            '{{%fk-pack-item_id}}',
            '{{%pack}}'
        );

        // drops index for column `item_id`
        $this->dropIndex(
            '{{%idx-pack-item_id}}',
            '{{%pack}}'
        );

        $this->dropTable('{{%pack}}');
    }
}
