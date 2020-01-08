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
use yii\data\Pagination;
use common\components\CommonConst;
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
					$imagesProduct = QlFiledinhkem::find()->where(['idObject' => $dataProduct['id']])->asArray()->all();
					$danhMucSP = DanhMucSanPham::find()->asArray()->all();
					$getFeedback = Feedback::getFeedback($dataProduct['id']);
					$getPreviousProduct = Products::getPreviousProduct($dataProduct);
					$getNextProduct = Products::getNextProduct($dataProduct);

					//Update view when click detail
					Products::updateWhenViewProduct($dataProduct);
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
			$requests = Yii::$app->request->get();
			$slug = $requests["slug"];
			$sort = $requests["sort"];
			$limit = CommonConst::LIMIT_LOAD_PRODUCT;
			$nameDanhMuc = "";
			$page = Yii::$app->request->get("page");
			if($page == '' || $page == null){
				$page = 1;
			}
			$offset = ($page-1)*$limit;
			if($sort == '' || $sort == null){
				$sort = 'default';
			}
			$dataProducts = Products::getProductsByDanhMuc($slug, $limit, $sort, $offset);
			$totalProducts = Products::getTotalProductByDanhMuc($slug);
			$danhMucSP = DanhMucSanPham::find()->asArray()->all();
			$totalProducts = $totalProducts['CNT'];
			if(count($dataProducts) > 0){
				$nameDanhMuc = $dataProducts[0]['nameDanhMuc'];
				$pages = new Pagination(['totalCount' => $totalProducts, 'pageSize' => $limit]);
				return $this->render('products-of-danhmuc', [
					'dataProducts' => $dataProducts,
					'pages' => $pages,
					'slugPage' => $slug,
					'nameDanhMuc' => $nameDanhMuc,
					'danhMucSP' => $danhMucSP,
					'sort' => $sort
				]);
			}else{
				$pages = new Pagination(['totalCount' => 0, 'pageSize' => $limit]);
				return $this->render('products-of-danhmuc', [
					'dataProducts' => $dataProducts,
					'pages' => $pages,
					'slugPage' => $slug,
					'nameDanhMuc' => $nameDanhMuc,
					'danhMucSP' => $danhMucSP,
					'sort' => $sort
				]);
			}
		} catch (Exception $e) {
			throw new \yii\web\NotFoundHttpException("No products found!");
		}
	}

	public function actionProductOfType(){
		try {
			$requests = Yii::$app->request->get();
			$slug = $requests["slug"];
			$sort = $requests["sort"];
			$limit = CommonConst::LIMIT_LOAD_PRODUCT;
			$nameProductType ="";
			$page = Yii::$app->request->get("page");
			if($page == '' || $page == null){
				$page = 1;
			}
			$offset = ($page-1)*$limit;
			if($sort == '' || $sort == null){
				$sort = 'default';
			}
			$dataProducts = Products::getProductsByType($slug, $limit, $sort, $offset);
			$totalProducts = Products::getTotalProductByType($slug);
			$danhMucSP = DanhMucSanPham::find()->asArray()->all();
			$totalProducts = $totalProducts['CNT'];
			if(count($dataProducts) > 0){
				$nameProductType = $dataProducts[0]['nameProductType'];
				$pages = new Pagination(['totalCount' => $totalProducts, 'pageSize' => $limit]);
				return $this->render('products-of-type', [
					'dataProducts' => $dataProducts,
					'pages' => $pages,
					'slugPage' => $slug,
					'nameProductType' => $nameProductType,
					'danhMucSP' => $danhMucSP,
					'sort' => $sort
				]);
			}else{
				$pages = new Pagination(['totalCount' => 0, 'pageSize' => $limit]);
				return $this->render('products-of-type', [
					'dataProducts' => $dataProducts,
					'pages' => $pages,
					'slugPage' => $slug,
					'nameProductType' => $nameProductType,
					'danhMucSP' => $danhMucSP,
					'sort' => $sort
				]);
			}
		} catch (Exception $e) {
			throw new \yii\web\NotFoundHttpException("No products found!");
		}
	}
}
