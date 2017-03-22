<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DictIngredient */

$this->title = 'Добавить Ингредиент';
$this->params['breadcrumbs'][] = ['label' => 'Справочник Ингредиентов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dict-ingredient-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
