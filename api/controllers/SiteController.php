<?php
    namespace api\controllers;

    use Yii;
    use yii\rest\Controller;

    /**
     * Site controller
     */
    class SiteController extends Controller
    {
        public $serializer = [
            'class' => 'yii\rest\Serializer',
            'collectionEnvelope' => 'dataProvider',
        ];

        /**
         * @inheritdoc
         */
        public function actions()
        {
            return [
                'error' => [
                    'class' => 'api\components\ErrorAction',
                ],
            ];
        }

        public function actionIndex()
        {
            return [
                "message" => "Everything work fine, if you need configure response format do it in config",
            ];
        }
    }
