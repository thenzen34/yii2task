<?php

/* @var $this yii\web\View */
use app\models\DictIngredient;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;

/* @var $dishes app\models\DictDish[] */
/* @var $model app\models\DishSearchForm */
/* @var $message string */

if(empty($message) && empty($dishes))
    $message = 'Ничего не найдено';

$this->title = 'Выборка блюд';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="row">
    <div class="col-sm-6">
        <? $form = ActiveForm::begin(['id' => 'searchForm']); ?>

            <?= $form->field($model, 'ingredients')->checkboxList(ArrayHelper::map(
            DictIngredient::find()->where(['visible' => 1])->orderBy(['name'=>SORT_ASC])->all(), 'id', 'name'),
            ['multiple' => 'true', 'size' => 20])
        ?>

        <div class="form-group">
            <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end();?>
    </div>
    <div class="col-sm-6">
        <label class="control-label">Возможные блюда из выбранных ингредиентов</label>
        <?
        if(!empty($message))
            echo Html::tag('div', $message, ['class' => 'well']);

        echo Html::ul(ArrayHelper::map($dishes, 'id', 'name'));

        ?>
    </div>
</div>

<?
$_script = <<<JS
    $('#searchForm').on('change', function(){
        var form = this;
        var submits = $(form).find('[type=submit]');
        var checked_checkboxs = $(form).find('input[type=checkbox]:checked')
        if(checked_checkboxs.length > 5)
            submits.prop('disabled', true);
        else
            submits.prop('disabled', false);
    });
    $('#searchForm').on('beforeSubmit', function(){
        var form = this;
        var checked_checkboxs = $(form).find('input[type=checkbox]:checked')
        if(checked_checkboxs.length < 2) {
            alert('Выберите больше ингредиентов');
            return false;
        }
        return true;
    });
JS;
$this->registerJs($_script);