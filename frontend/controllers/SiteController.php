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
use app\models\Feedback;
class SiteController extends Controller
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
	public function actionIndex()
	{
		$this->view->title = "Không gian gỗ";
		$danhMucSP = DanhMucSanPham::find()->all();
		$getDataHome = Products::getDataHome();
		$loaiSP = ProductTypes::find()->all();
		return $this->render('index', [
			'danhMucSP' => $danhMucSP,
			'data' => $getDataHome,
			'loaiSP' => $loaiSP
		]);
	}

	public function actionAbout()
	{
		$this->view->title = "Giới thiệu";
		$data = About::findOne(1);
		$content = $data->content;
		return $this->render('about', [
			'content' => $content
		]);
	}

	public function actionPromotion()
	{
		$data = Promotion::findOne(1);
		$content = $data->content;
		$this->view->title = "Ưu đãi";
		return $this->render('promotion', [
			'content' => $content
		]);
	}

	public function actionCash()
	{
		$data = Cash::findOne(1);
		$content = $data->content;
		$this->view->title = "Thanh toán mua hàng";
		return $this->render('cash', [
			'content' => $content
		]);
	}

	public function actionContact()
	{
		$data = Contact::findOne(1);
		$danhMucSP = DanhMucSanPham::find()->all();
		$content = $data->content;

		$this->view->title = "Liên hệ";
		return $this->render('contact', [
			'content' => $content,
			'danhMucSP' => $danhMucSP
		]);
	}
	public function actionSendFeedback(){
		if (Yii::$app->request->isPost)
        {
        	try {
        		$requests = Yii::$app->request->post();
        		$model = new Feedback();
        		$model->product_id = (int)$requests['productId'];
        		$model->comment = trim($requests['comment']);
        		$model->fullname = trim($requests['author']);
        		$model->email = trim($requests['email']);
        		$model->created_date = date("Y-m-d h:i:s");
        		if($model->save()){
        			echo 'success'; exit;
        		}else{
        			echo 'fail'; exit;
        		}
        		var_dump($requests); exit;
        	} catch (Exception $e) {
        		echo 'fail'; exit;
        	}
        }
    }

    public function actionLoadMoreComment(){
		if (Yii::$app->request->isPost)
        {
        	try {
        		$requests = Yii::$app->request->post();
        		$result = [];
        		$productId = (int)$requests['productId'];
        		$offset = (int)$requests['currentBox'];
        		$limit = CommonConst::LOAD_MORE_COMMENT;
        		$getDataLoadMore = Feedback::getDataLoadMore($productId, $offset, $limit);
        		$totalData = Feedback::find()->where([
        			'product_id' => $productId,
        			'status' => 1
        		])->count();
        		$result = [
        			'status' => 'success',
        			'dataFeedback' => $getDataLoadMore,
        			'totalData' => $totalData
        		];
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
