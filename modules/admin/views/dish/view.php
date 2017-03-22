<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DictDish */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Справочник Блюд', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dict-dish-view">

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
        ],
    ]) ?>

    <label class="control-label">Список ингредиентов</label>

    <?= Html::ul(ArrayHelper::map($model->getDictIngredient(), 'id', 'name')); ?>

</div>
