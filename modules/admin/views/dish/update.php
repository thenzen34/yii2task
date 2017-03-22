<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DictDish */

$this->title = 'Править Блюдо: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Справочник Блюд', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Править';
?>
<div class="dict-dish-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
