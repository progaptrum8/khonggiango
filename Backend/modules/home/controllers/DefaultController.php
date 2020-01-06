<?php

namespace app\modules\home\controllers;

use app\components\BaseController;

/**
 * Default controller for the `home` module
 */
class DefaultController extends BaseController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
