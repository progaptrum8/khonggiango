<?php
namespace frontend\controllers;

use Yii;
use frontend\components\BaseController;
use yii\web\Controller;
use yii\web\Response;
use app\models\Cash;
use app\models\Contact;
use app\models\About;
use app\models\Promotion;
use app\models\DanhMucSanPham;
use app\models\Products;
use app\models\ProductTypes;
use app\models\QlFiledinhkem;
use app\models\Feedback;
class ProductController extends Controller
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

	public function actionDetailProduct(){
		try {
			$requests = Yii::$app->request->get();
			$slug = $requests["slug"];
			if($slug != '' && $slug != null){
				$dataProduct = Products::getInfoProduct($slug);
				if(count($dataProduct) > 0){
					$getSameProducts = Products::getSameProducts($dataProduct);
					$imagesProduct = QlFiledinhkem::find()->where(['idObject' => $dataProduct['id']])->all();
					$danhMucSP = DanhMucSanPham::find()->asArray()->all();
					$getFeedback = Feedback::getFeedback($dataProduct['id']);
					$getPreviousProduct = Products::getPreviousProduct($dataProduct);
					$getNextProduct = Products::getNextProduct($dataProduct);
					return $this->render('detail', [
						'dataProduct' => $dataProduct,
						'danhMucSP' => $danhMucSP,
						'sameProducts' => $getSameProducts,
						'imagesProduct' => $imagesProduct,
						'feedbacks' => $getFeedback,
						'previousProduct' => $getPreviousProduct,
						'nextProduct' => $getNextProduct
					]);
				}else{
					throw new \yii\web\NotFoundHttpException("No product found!");
				}
			}else{
				throw new \yii\web\NotFoundHttpException("No product found!");
			}
			 
			
		} catch (Exception $e) {
			throw new \yii\web\NotFoundHttpException();
		}
	}

	public function actionProductOfDanhMuc(){
		try {
			echo 'chua code'; exit;
			$requests = Yii::$app->request->get();
			$slug = $requests["slug"];
		} catch (Exception $e) {
			
		}
	}

	public function actionProductOfType(){
		try {
			echo 'chua code'; exit;
			$requests = Yii::$app->request->get();
			$slug = $requests["slug"];
		} catch (Exception $e) {
			
		}
	}
}
