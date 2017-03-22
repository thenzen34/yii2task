<?php

use app\models\DictIngredient;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DictDish */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="dict-dish-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'dictIngredientsIds')->checkboxList(ArrayHelper::map(
        DictIngredient::find()->orderBy(['name'=>SORT_ASC])->all(), 'id', 'name'), ['multiple' => 'true', 'size' => 20])
    ?>

    <div class="form-group">
        <?= Html::a('Вернутся', ['index', ], ['class' => 'btn btn-default']) ?>
        <?= Html::submitButton(
            $model->isNewRecord ? 'Создать' : 'Обновить',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
