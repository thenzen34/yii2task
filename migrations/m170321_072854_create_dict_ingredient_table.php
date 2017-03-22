<?php

use yii\db\Migration;

/**
 * Handles the creation of table `dict_ingredient`.
 */
class m170321_072854_create_dict_ingredient_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('dict_ingredient', [
            'id' => $this->primaryKey(),
            'name'=> $this->string(25)->unique()->notNull(),
            'visible'=> $this->boolean(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('dict_ingredient');
    }
}
