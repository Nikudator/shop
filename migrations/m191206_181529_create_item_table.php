<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%item}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%manufacturer}}`
 */
class m191206_181529_create_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%item}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(100)->notNull()->unique(),
            'description' => $this->text()->notNull(),
            'manufacturer_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `manufacturer_id`
        $this->createIndex(
            '{{%idx-item-manufacturer_id}}',
            '{{%item}}',
            'manufacturer_id'
        );

        // add foreign key for table `{{%manufacturer}}`
        $this->addForeignKey(
            '{{%fk-item-manufacturer_id}}',
            '{{%item}}',
            'manufacturer_id',
            '{{%manufacturer}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%manufacturer}}`
        $this->dropForeignKey(
            '{{%fk-item-manufacturer_id}}',
            '{{%item}}'
        );

        // drops index for column `manufacturer_id`
        $this->dropIndex(
            '{{%idx-item-manufacturer_id}}',
            '{{%item}}'
        );

        $this->dropTable('{{%item}}');
    }
}
