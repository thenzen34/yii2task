<?php

namespace app\modules\admin;
use Yii;
use yii\base\Module;
use yii\web\ForbiddenHttpException;

/**
 * admin module definition class
 */
class AdminModule extends Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * @inheritdoc
     */
    public $defaultRoute = 'ingredient';

    /**
     * @inheritdoc
     */
    public $layout = 'admin';

    /**
     * @inheritdoc
     */
    public function init()
    {
        if(Yii::$app->user->isGuest)
            throw new ForbiddenHttpException('Доступ ограничен');
        parent::init();
    }
}
