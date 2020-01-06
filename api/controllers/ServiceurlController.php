<?php
    namespace app\controllers;

    use Yii;
    use app\components\ApiController;
    use app\models\Friend;
    use app\models\User;
    class ServiceurlController extends ApiController
    {
        // Set layout for controller
        public $layout = '';

        public function actionGetallowurls()
        {
            if (Yii::$app->request->isPost)
            {
                $request = Yii::$app->request->post();
                var_dump($request); exit;
                $countRequest = count($request['phone']);

                $user = User::find()->all();
                $countUser = User::find()->count();

                for ($i=0; $i <$countRequest ; $i++) { 
                    $request['phone'][$i]['phone_user'] = str_replace(array('(',')'),'',$request['phone'][$i]['phone_user']);
                }
                
                $arrayPhoneUser = array();
                for ($i=0; $i <$countUser ; $i++) { 
                    array_push($arrayPhoneUser, $user[$i]->phone);
                }

                $inMozi = array();
                $notMozi = array(); 
            
                for ($i=0; $i <$countRequest ; $i++) { 
                    if (in_array($request['phone'][$i]['phone_user'],$arrayPhoneUser))
                        array_push($inMozi,array("phone_user"=>$request['phone'][$i]['phone_user'],"Name"=>$request['phone'][$i]['Name']));
                      //  array_push($inMozi,$request['phone'][$i]['phone_user']);
                    else
                        array_push($notMozi,array("phone_user"=>$request['phone'][$i]['phone_user'],"Name"=>$request['phone'][$i]['Name']));
                }
                var_dump($inMozi); 
                var_dump($notMozi);
                exit;
                // try {


                    return $result =  [
                        'status'=> 200,
                        'inMozi' => $inMozi,
                        'notMozi' => $notMozi
                    ];

                //     //return ApiHelper::sendResponse(200, '', $returnData);
                // } catch ( \Exception $e ) {
                //     //return ApiHelper::sendResponse(500, '', 'Error ' . $e);
                // }
            }
        }
    }   