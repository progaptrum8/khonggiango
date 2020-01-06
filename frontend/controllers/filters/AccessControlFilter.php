<?php
namespace frontend\controllers\filters;

use Yii;
use yii\base\ActionFilter;

class AccessControlFilter extends ActionFilter
{
    public function beforeAction($action)
    {
        // get controller id
        $controller = Yii::$app->controller->id;

        // get action id
        $action = Yii::$app->controller->action->id;

        // set operation
        $operation = $controller . '/' . $action;

        // These controller and action will allow to access if we don't have login session
        $operationAccess = [
            'site/index',
            'site/login',
            '/',
            'site/signup',
            'site/signup-user',
            'site/form-forgot-password',
            'site/send-sms-forgot-password',
            'site/form-new-password'
        ];

        // User logged in
        // if ( Yii::$app->session->get('userId') != null)
        // {
        //     if ( Yii::$app->session->get('role') == "normaluser")
        //     {
        //         return true;
        //     }
        // }
        // else // Not exist session => session is timeout => redirect to login page
        // {
        //     if (in_array($operation, $operationAccess))
        //     {
        //         return true;
        //     }
        //     else
        //         Yii::$app->getResponse()->redirect(['/']);
        // }
        
        return false; // or false to not run the action        
    }
}