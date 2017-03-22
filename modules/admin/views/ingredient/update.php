<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DictIngredient */

$this->title = 'Править Ингредиент: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Справочник Ингредиентов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Править';
?>
<div class="dict-ingredient-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
