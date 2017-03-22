<?php

use yii\db\Migration;

/**
 * Handles the creation of table `dict_dish`.
 */
class m170321_073240_create_dict_dish_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('dict_dish', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->unique()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('dict_dish');
    }
}
