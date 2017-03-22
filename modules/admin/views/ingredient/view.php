<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DictIngredient */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Справочник Ингредиентов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dict-ingredient-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Вернутся', ['index', ], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Править', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'visible',
        ],
    ]) ?>

</div>
