<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DictDish */

$this->title = 'Добавить Блюдо';
$this->params['breadcrumbs'][] = ['label' => 'Dict Dishes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dict-dish-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
