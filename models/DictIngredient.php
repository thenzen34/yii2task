<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "dict_ingredient".
 *
 * @property integer $id
 * @property string $name
 * @property integer $visible
 *
 * @property RelDishIngredient[] $relDishIngredients
 */
class DictIngredient extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dict_ingredient';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['visible'], 'integer'],
            [['name'], 'string', 'max' => 25],
            [['name'], 'unique'],
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
            'visible' => 'Видимость',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelDishIngredients()
    {
        return $this->hasMany(RelDishIngredient::className(), ['ingredient_id' => 'id']);
    }
}
