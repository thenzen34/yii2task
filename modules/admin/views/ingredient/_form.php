<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DictIngredient */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dict-ingredient-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'visible')->checkbox() ?>

    <div class="form-group">
        <?= Html::a('Вернутся', ['index', ], ['class' => 'btn btn-default']) ?>
        <?= Html::submitButton(
            $model->isNewRecord ? 'Создать' : 'Обновить',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
