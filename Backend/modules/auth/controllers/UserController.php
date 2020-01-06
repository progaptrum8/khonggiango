<?php

namespace app\modules\auth\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use app\modules\auth\models\LoginForm;

/**
 * Default controller for the `auth` module
 */
class UserController extends Controller
{    
    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
       $this->layout = '@app/views/layouts/login.php';
       return parent::beforeAction($action);
    }
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    
    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
