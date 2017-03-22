<?php

namespace app\controllers;

use app\models\DishSearchForm;
use Yii;
use yii\web\Controller;

class DishController extends Controller
{
    public function actionIndex()
    {
        $model = new DishSearchForm();
        $_dishes = [];
        $_message = "Выберите от 2 до 5 ингредиентов";

        if ($model->load(Yii::$app->request->post())) {
            $_message = "";
            if(count($model->ingredients) >= 2)
                $_dishes = $model->getDishesWithIngredientsIds();
            else
                $_message = "Выберите больше ингредиентов";

            return $this->render('index', [
                'model' => $model,
                'dishes' => $_dishes,
                'message' => $_message,
            ]);
        }

        return $this->render('index', [
            'model' => $model,
            'dishes' => [],
            'message' => $_message,
        ]);
    }

}
