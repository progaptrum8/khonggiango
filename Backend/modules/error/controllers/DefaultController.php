<?php

namespace app\modules\error\controllers;

use yii\web\Controller;

/**
 * Default controller for the `error` module
 */
class DefaultController extends Controller
{
    /**
     * @inheritdoc
     */    
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    
    public function actionError()
    {
        $exception = Yii::$app->errorHandler->exception;        
        if ($exception !== null) {
            return $this->render('error', ['exception' => $exception]);
        }
    }
}
