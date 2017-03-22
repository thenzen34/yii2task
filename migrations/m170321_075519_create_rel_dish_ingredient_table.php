<?php

use yii\db\Migration;

/**
 * Handles the creation of table `rel_dish_ingredient`.
 * Has foreign keys to the tables:
 *
 * - `dict_dish`
 * - `dict_ingredient`
 */
class m170321_075519_create_rel_dish_ingredient_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('rel_dish_ingredient', [
            'id' => $this->primaryKey(),
            'dish_id' => $this->integer()->notNull(),
            'ingredient_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `dish_id`
        $this->createIndex(
            'idx-rel_dish_ingredient-dish_id',
            'rel_dish_ingredient',
            'dish_id'
        );

        // add foreign key for table `dict_dish`
        $this->addForeignKey(
            'fk-rel_dish_ingredient-dish_id',
            'rel_dish_ingredient',
            'dish_id',
            'dict_dish',
            'id',
            'CASCADE'
        );

        // creates index for column `ingredient_id`
        $this->createIndex(
            'idx-rel_dish_ingredient-ingredient_id',
            'rel_dish_ingredient',
            'ingredient_id'
        );

        // add foreign key for table `dict_ingredient`
        $this->addForeignKey(
            'fk-rel_dish_ingredient-ingredient_id',
            'rel_dish_ingredient',
            'ingredient_id',
            'dict_ingredient',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        // drops foreign key for table `dict_dish`
        $this->dropForeignKey(
            'fk-rel_dish_ingredient-dish_id',
            'rel_dish_ingredient'
        );

        // drops index for column `dish_id`
        $this->dropIndex(
            'idx-rel_dish_ingredient-dish_id',
            'rel_dish_ingredient'
        );

        // drops foreign key for table `dict_ingredient`
        $this->dropForeignKey(
            'fk-rel_dish_ingredient-ingredient_id',
            'rel_dish_ingredient'
        );

        // drops index for column `ingredient_id`
        $this->dropIndex(
            'idx-rel_dish_ingredient-ingredient_id',
            'rel_dish_ingredient'
        );

        $this->dropTable('rel_dish_ingredient');
    }
}
