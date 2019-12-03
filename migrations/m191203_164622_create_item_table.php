<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%item}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%manufacturer}}`
 * - `{{%unit}}`
 */
class m191203_164622_create_item_table extends Migration
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
            'pack_id' => $this->notNull()->integer(),
            'sku' => $this->string(10)->notNull(),
            'active' => $this->boolean()->defaultValue(true)->notNull(),
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

        // creates index for column `pack_id`
        $this->createIndex(
            '{{%idx-item-pack_id}}',
            '{{%item}}',
            'pack_id'
        );

        // add foreign key for table `{{%unit}}`
        $this->addForeignKey(
            '{{%fk-item-pack_id}}',
            '{{%item}}',
            'pack_id',
            '{{%unit}}',
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

        // drops foreign key for table `{{%unit}}`
        $this->dropForeignKey(
            '{{%fk-item-pack_id}}',
            '{{%item}}'
        );

        // drops index for column `pack_id`
        $this->dropIndex(
            '{{%idx-item-pack_id}}',
            '{{%item}}'
        );

        $this->dropTable('{{%item}}');
    }
}
