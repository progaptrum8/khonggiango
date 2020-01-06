<?php
namespace app\components;
use Yii;
use yii\web\Controller;
use app\components\Common;

class BaseController extends Controller{    
    /**
     * @inheritdoc
     */    
    public function beforeAction($action)
    {
        Yii::$app->session->open();
        $valueCheck = trim(Yii::$app->request->get("token"));
        $sourceCheck = Common::removeParamUrl(Yii::$app->request->url,'token');
        if(Yii::$app->request->get("id")
            || Yii::$app->request->get("name")){
            if($valueCheck =="" || $valueCheck == null){
                throw new \yii\web\HttpException(403, 'Đường dẫn liên kết không đúng!');
            }elseif(Common::checkEncryptOneTime($valueCheck,$sourceCheck)){
            }else{
                throw new \yii\web\HttpException(403,'Đường dẫn liên kết không đúng!');
            }            
        }
        return parent::beforeAction($action);
    }
    
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
}
