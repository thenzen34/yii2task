<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "dict_dish".
 *
 * @property integer $id
 * @property string $name
 *
 * @property RelDishIngredient[] $relDishIngredients
 * @property int[] $dictIngredientsIds
 */
class DictDish extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dict_dish';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50],
            [['name'], 'unique'],
            ['dictIngredientsIds', 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '№',
            'name' => 'Наименование',
            'dictIngredientsIds' => 'Список ингредиентов',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelDishIngredients()
    {
        return $this->hasMany(RelDishIngredient::className(), ['dish_id' => 'id']);
    }

    public function getDictIngredientsIds()
    {
        return RelDishIngredient::getDishIngredient($this->id);
    }

    public function setDictIngredientsIds($ingredient_ids)
    {
        if($this->isNewRecord) {
            $this->dictIngredientsIds = $ingredient_ids;
            return false;
        }

        return RelDishIngredient::saveDishIngredient($this->id, $ingredient_ids);
    }
}
