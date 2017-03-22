<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\Expression;
use yii\db\Query;

/**
 * DishSearchForm is the model behind the dish search form.
 */
class DishSearchForm extends Model
{
    public $ingredients;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            ['ingredients', 'safe'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'ingredients' => 'Список ингредиентов',
        ];
    }

    public function getDishesWithIngredientsIds()
    {
        //блюда с скрытыми ингедиентами
        $subQuery = (new Query)
            ->select([new Expression('1')])
            ->from(RelDishIngredient::tableName().' rel')
            ->join('Join', DictIngredient::tableName().' di', 'di.id = rel.ingredient_id and di.visible = 0')
            ->where('rel.dish_id = s.id');

        $_dishes = DictDish::find()->alias('s')
            ->join('Join', RelDishIngredient::tableName().' rel', 's.id=rel.dish_id')
            ->leftJoin(DictIngredient::tableName().' di','di.id=rel.ingredient_id and di.id in ('.implode(',', $this->ingredients   ).')')
            ->select([
                'id' => 's.id',
                'match_ing' => 'count(di.id)',
                'total_ing' => 'count(rel.ingredient_id)',
            ])
            ->where(['not exists', $subQuery])
            ->groupBy('s.id')
            ->having('count(di.id)>=2')
            ->orderBy([
                'match_ing' => SORT_DESC,
                'total_ing' => SORT_ASC
            ])
            ->asArray()
            ->all();

        $_full = [];
        $_part = [];

        foreach ($_dishes as $_dish) {
            if(($_dish['match_ing'] == $_dish['total_ing'])) {
                //все ингредиенты в сборе
                $_full[] = $_dish['id'];
            } else {
                //частичные блюда
                $_part[] = $_dish['id'];
            }
        }

        $_ids = empty($_full) ? $_part : $_full;

        return DictDish::find()->where(['IN', 'id', $_ids])->all();
    }
}
