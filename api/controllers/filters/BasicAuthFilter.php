<?php
    namespace app\controllers\filters;

    use Yii;
    use yii\base\ActionFilter;
    use yii\web\UnauthorizedHttpException;

    /**
     * Class BasicAuthFilter
     * @package api\controllers\filters
     */
    class BasicAuthFilter extends ActionFilter
    {
        /**
         * @param \yii\base\Action $action
         * @return bool
         * @throws UnauthorizedHttpException
         */
         /*
        public function beforeAction($action)
        {
            
            // get header basic authorization
            $authUser = Yii::$app->request->authUser;
            $athPass = Yii::$app->request->authPassword;
            // get config authorization
            $config = Yii::$app->params['authorization'];

            if( $authUser && $athPass && $authUser == $config['username'] && $athPass == $config['password'] ){
                // run action
                return parent::beforeAction( $action );
            }

            // throw exception
            throw new UnauthorizedHttpException(Yii::t('yii', 'Basic auth failed.'));
            
        }
        */
    }