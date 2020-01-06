<?php
    namespace app\components;

    use Yii;
    use yii\rest\Controller;
    use app\controllers\filters\BasicAuthFilter;

    /**
     * Controller is the customized base controller class.
     * All controller classes for this application should extend from this base class.
     */
    class ApiController extends Controller
    {
        public $enableCsrfValidation = false;
        
        public function init()
        {
            parent::init();
        }

        public function behaviors()
        {
            $behaviors = parent::behaviors();
            
            $behaviors['corsFilter'] = [
                'class' => \yii\filters\Cors::className(),
            ];

            $behaviors['basicauth'] = [
                'class' => BasicAuthFilter::className()
            ];

            return $behaviors;
        }
    }