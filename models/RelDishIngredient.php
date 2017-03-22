<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "rel_dish_ingredient".
 *
 * @property integer $id
 * @property integer $dish_id
 * @property integer $ingredient_id
 *
 * @property DictDish $dish
 * @property DictIngredient $ingredient
 */
class RelDishIngredient extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rel_dish_ingredient';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dish_id'], 'required'],
            [['dish_id', 'ingredient_id'], 'integer'],
            [['dish_id'], 'exist', 'skipOnError' => true, 'targetClass' => DictDish::className(), 'targetAttribute' => ['dish_id' => 'id']],
            [['ingredient_id'], 'exist', 'skipOnError' => true, 'targetClass' => DictIngredient::className(), 'targetAttribute' => ['ingredient_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dish_id' => 'Dish ID',
            'ingredient_id' => 'Ingredient ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDish()
    {
        return $this->hasOne(DictDish::className(), ['id' => 'dish_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredient()
    {
        return $this->hasOne(DictIngredient::className(), ['id' => 'ingredient_id']);
    }

    /**
     * @param int $dish_id
     * @return int[]
     */
    public static function getDishIngredientIds($dish_id) {
        return ArrayHelper::map(
            self::getDishIngredient($dish_id), 'id', 'id');
    }

    /**
     * @param int $dish_id
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getDishIngredient($dish_id) {
        /*
        return self::find()->alias('s')->where(['dish_id' => $dish_id])
                ->join('JOIN', DictIngredient::tableName() . ' as di', 's.ingredient_id = di.id')
                ->select('di.*')->all();
               */
        return DictIngredient::find()->alias('s')
            ->join('JOIN', self::tableName() . ' as di', 'di.ingredient_id = s.id and di.dish_id = ' . $dish_id)
            ->all();
    }

    /**
     * @param int $dish_id
     * @param int[] $ingredient_ids
     * @return bool
     */
    public static function saveDishIngredient($dish_id, $ingredient_ids)
    {
        if(empty($ingredient_ids))
            $ingredient_ids = [];

        $exists_ingredients = ArrayHelper::map(
            self::findAll(['dish_id' => $dish_id]), 'ingredient_id', 'ingredient_id');

        $remove_ingredients = array_diff($exists_ingredients, $ingredient_ids);
        self::deleteAll(['AND', ['dish_id' => $dish_id], ['IN', 'ingredient_id', $remove_ingredients]]);

        $new_ingredients = array_diff($ingredient_ids, $exists_ingredients);
        $data = [];
        foreach($new_ingredients as $_v) {
            $data[] = [
                'id',
                'dish_id' => $dish_id,
                'ingredient_id' => $_v,
            ];
        }
        if(count($new_ingredients) > 0) {
            $numberAffectedRows = self::getDb()->createCommand()
                ->batchInsert(self::tableName(), self::attributes(), $data)
                ->execute();

            return $numberAffectedRows === count($new_ingredients);
        }

        return true;
    }
}
