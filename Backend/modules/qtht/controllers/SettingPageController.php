<?php

namespace app\modules\qtht\controllers;

use app\components\BaseController;
use app\modules\qtht\models\Menu;
use yii\data\Pagination;
use yii\data\Sort;
use app\models\Cash;
use app\models\About;
use app\models\Promotion;
use app\models\Contact;
use Yii;

class SettingPageController extends BaseController {

	public function beforeAction($action)
	{
		// Disable csrf
		$this->enableCsrfValidation = false;
		return parent::beforeAction($action);
	}

	public function actionIndex(){
		try {
			$params = Yii::$app->request->post();
			$typeSetting = Yii::$app->request->get("typeSetting");
			if($typeSetting == ''  || $typeSetting == null){
				$typeSetting = 1;
			}
			$data = [];
			if($typeSetting == 1){
				$data = About::findOne(1);
			} else if($typeSetting == 2){
				$data = Promotion::findOne(1);
			} else if($typeSetting == 3){
				$data = Cash::findOne(1);
			} else if($typeSetting == 4){
				$data = Contact::findOne(1);
			}
			return $this->render('index', [
				'content' => $data->content,
				'typeSetting' => $typeSetting
			]);
		} catch (Exception $e) {
			echo 'fail';
		}
	}

	public function actionSave(){
		try {

			$params = Yii::$app->request->post();
			$typeSetting = $params['typeSetting'];
			$textValueEncode = base64_decode($params['textValueEncode']);
			// Delete copyright
			$emStartPos = strpos($textValueEncode,"<p data-f-id");
		    $emEndPos = strpos($textValueEncode,"</a></p>");
		    $emEndPos += 4;
	        $len = $emEndPos - $emStartPos;
	        $textValueEncode = substr_replace($textValueEncode, '', $emStartPos, $len);
			$textValueEncode = base64_encode($textValueEncode);

			if($typeSetting == ''  || $typeSetting == null){
				$typeSetting = 1;
			}
			$data = [];
			if($typeSetting == 1){
				$data = About::findOne(1);
			} else if($typeSetting == 2){
				$data = Promotion::findOne(1);
			} else if($typeSetting == 3){
				$data = Cash::findOne(1);
			} else if($typeSetting == 4){
				$data = Contact::findOne(1);
			}
			$data->content = $textValueEncode;

			if($data->save()){
				Yii::$app->getSession()->setFlash('success', 'Thay đổi thông tin thành không!');
	            return $this->redirect("/qtht/setting-page/index?typeSetting=".$typeSetting);
			} else {
				Yii::$app->getSession()->setFlash('error', 'Thay đổi thông tin không thành công!');
	            return $this->redirect("/qtht/setting-page/index?typeSetting=".$typeSetting);
			}
		} catch (Exception $e) {
			echo 'fail';
		}
	}
}