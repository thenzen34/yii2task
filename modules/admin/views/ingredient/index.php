<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Справочник Ингредиентов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dict-ingredient-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить Ингредиент', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'options' => ['style' => ['width' => '1%']]
            ],

            'id',
            'name',
            [
                'attribute' => 'visible',
                'value' => function ($data) {
                    if ($data->visible == 0) {
                        return 'Нет';
                    }
                    return 'Да';
                },
                'filter' => ['0' => 'Нет', '1' => 'Да'],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
