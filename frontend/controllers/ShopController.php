<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\DanhMucSanPham;
use app\models\Products;
use yii\data\Pagination;
use common\components\CommonConst;
class ShopController extends Controller
{
	public $layout = 'homeLayout';
	
	public function beforeAction($action)
	{
		// Disable csrf
		$this->enableCsrfValidation = false;
		return parent::beforeAction($action);
	}
	public function actionIndex(){
		try {
			$this->view->title = "Shop";
			$requests = Yii::$app->request->get();
			$sort = $requests["sort"];
			$limit = CommonConst::LIMIT_LOAD_PRODUCT;
			$nameProductType ="allProduct";
			$page = Yii::$app->request->get("page");
			if($page == '' || $page == null){
				$page = 1;
			}
			$offset = ($page-1)*$limit;
			if($sort == '' || $sort == null){
				$sort = 'default';
			}
			$dataProducts = Products::getAllProducts($limit, $sort, $offset);
			$totalProducts = Products::find()->count();
			$danhMucSP = DanhMucSanPham::find()->asArray()->all();
			if(count($dataProducts) > 0){
				$pages = new Pagination(['totalCount' => $totalProducts, 'pageSize' => $limit]);
				return $this->render('index', [
					'dataProducts' => $dataProducts,
					'pages' => $pages,
					'nameProductType' => $nameProductType,
					'danhMucSP' => $danhMucSP,
					'sort' => $sort
				]);
			}else{
				$pages = new Pagination(['totalCount' => 0, 'pageSize' => $limit]);
				return $this->render('index', [
					'dataProducts' => $dataProducts,
					'pages' => $pages,
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
