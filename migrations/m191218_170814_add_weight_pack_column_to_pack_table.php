<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%pack}}`.
 */
class m191218_170814_add_weight_pack_column_to_pack_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%pack}}', 'weight_pack', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%pack}}', 'weight_pack');
    }
}
