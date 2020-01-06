<?php
namespace frontend\controllers;

use Yii;
use frontend\components\BaseController;
use yii\web\Controller;
use common\components\CommonConst;
use yii\mongodb\Collection;
use yii\web\Response;
use app\models\Cash;
use app\models\Contact;
use app\models\About;
use app\models\Promotion;
use app\models\DanhMucSanPham;
use app\models\Products;
use app\models\ProductTypes;
use app\models\Order;
class OrderController extends Controller
{
	public $layout = 'homeLayout';
	
	public function beforeAction($action)
	{
		// Disable csrf
		$this->enableCsrfValidation = false;

		return parent::beforeAction($action);
	}

	/**
	 * {@inheritdoc}
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

	/**
	 * Displays homepage.
	 *
	 * @return mixed
	 */
	public function actionOrderProduct(){
		if (Yii::$app->request->isPost)
        {
        	try {
        		$result = [];
        		$requests = Yii::$app->request->post();
        		$model = new Order();
        		$model->sex = (int)$requests['customer-gender'];
        		$model->fullname = trim($requests['customerName']);
        		$model->phone = trim($requests['customerPhone']);
        		$model->email = trim($requests['customerEmail']);
        		$model->address = trim($requests['customerAddress']);
        		$model->order_note = trim($requests['orderNote']);
        		$model->product_id = (int)$requests['productId'];
        		$model->ordered_date = date("Y-m-d h:i:s");
        		if($model->save()){
        			$orderCode = "#".date("Ymd").$model->id;
        			$model->orderCode = $orderCode;
        			$model->update();
        			$result = [
        				'status' => 'success',
        				'orderCode' => $orderCode
        			];
        			
        		}else{
        			$result = [
        				'status' => 'fail'
        			];
        		}
        		echo json_encode($result); exit;
        	} catch (Exception $e) {
        		$result = [
        			'status' => 'fail'
        		];
        		echo json_encode($result); exit;
        	}
        }
	}

	
	
}
