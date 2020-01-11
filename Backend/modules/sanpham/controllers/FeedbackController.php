<?php

namespace app\modules\sanpham\controllers;

use Yii;
use yii\data\Pagination;
use yii\data\Sort;
use app\components\BaseController;
use app\models\Products;
use app\models\DanhMucSanPham;
use app\models\ProductTypes;
use app\models\QlFiledinhkem;
use app\models\Feedback;

class FeedbackController extends BaseController {

    public function beforeAction($action)
    {
        // Disable csrf
        $this->enableCsrfValidation = false;

        return parent::beforeAction($action);
    }
    public function actionIndex() {
        //Tìm kiếm
        $stringCondition = " 1=1 ";
        $arrayCondition = array();
        $danhMucSearch = (int)(Yii::$app->request->post('danhMucSP'));
        $productTypeSearch = (int)(Yii::$app->request->post('productType'));
        $status = -1;
        if(Yii::$app->request->post('status') != '' && Yii::$app->request->post('status') != null){
            $status = (int)Yii::$app->request->post('status');
        }
        $search = trim(Yii::$app->request->post("search"));
        if ($search != null && $search != "") {
            $stringCondition .= " AND  ( MATCH (dmsp.`name`) AGAINST (:searchLike IN NATURAL LANGUAGE MODE) OR MATCH (pt.`name`) AGAINST (:searchLike IN NATURAL LANGUAGE MODE) OR MATCH (pd.`title`) AGAINST (:searchLike IN NATURAL LANGUAGE MODE) )  ";
            $arrayCondition[':searchLike'] = $search;
        }
        if($danhMucSearch > 0){
            $stringCondition .= " AND dmsp.id = :danhMucSearch ";
            $arrayCondition[':danhMucSearch'] = $danhMucSearch;
        }
        if($productTypeSearch > 0){
            $stringCondition .= " AND pt.id = :productTypeSearch ";
            $arrayCondition[':productTypeSearch'] = $productTypeSearch;
        }
        if($status >=0 && $status < 2 ){
            $stringCondition .= " AND fb.status = :status ";
            $arrayCondition[':status'] = $status;
        }
        $query = Feedback::find()->alias('fb')
                ->select('pd.title, pd.thumbnail, dmsp.`name` as nameDMSP, pt.`name` as nameLoaiSP, fb.fullname, fb.email, fb.comment, fb.created_date as dateComment, fb.status, fb.id')
                ->join('INNER JOIN','products as pd', 'fb.product_id = pd.id')
                ->join('LEFT JOIN','danhmuc_sanpham as dmsp', 'dmsp.id = pd.id_danhmuc')
                ->join('LEFT JOIN','product_types as pt', 'pt.id = pd.id_product_type')
                ->where($stringCondition, $arrayCondition)
                ->orderBy("fb.created_date DESC, fb.status DESC");
        // echo $query->createCommand()->rawSql;exit;
        //Phân trang
        $pageSize = Yii::$app->request->post("pageSize");
        $perPage = Yii::$app->request->get("per-page");
        if ((int) $pageSize <= 0) {
            if ((int) $perPage > 0) {
                $pageSize = (int) $perPage;
            } else {
                $pageSize = 20;
            }
        }
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => $pageSize]);
        // get data
        $data = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->asArray()
                ->all();
        $getDanhMucSP = DanhMucSanPham::find()->asArray()->all();
        $getProductType = ProductTypes::find()->asArray()->all();
        //Hiển thị
        return $this->render('index', [
            'search' => $search,
            'pageSize' => $pageSize,
            'data' => $data,
            'pages' => $pages,
            'danhMucSP' => $getDanhMucSP,
            'productTypes' => $getProductType,
            'danhMucSearch' => $danhMucSearch,
            'productTypeSearch' => $productTypeSearch,
            'status' => $status
        ]);
    }
    
    public function actionDelete() {
        try {
            $idSelected = Yii::$app->request->post("idSelected");
            if(is_array($idSelected)){
                foreach ($idSelected as $id){
                    $item = Feedback::findOne($id);
                    $item->delete();
                }
            }else{
                $item = Feedback::findOne($idSelected);
                $item->delete();
            }
        } catch (\yii\base\Exception $e) {
            Yii::$app->getSession()->setFlash('error', 'Xóa dữ liệu không thành công!');
            return $this->redirect("/sanpham/feedback/index");
        }
        Yii::$app->getSession()->setFlash('success', 'Xóa dữ liệu thành công!');
        return $this->redirect("/sanpham/feedback/index");
    }
    
    public function actionInput() {
        $item = new Feedback();
        $id = (int)trim(Yii::$app->request->get("id"));
        $products = Products::find()->all();
        if ((int) $id > 0) {
            $itemFind = Feedback::findOne($id);
            if ($itemFind != null) {
                $item = $itemFind;
                return $this->render('input', [
                    'data' => $item,
                    'updateForm' => true,
                    'products' => $products
                ]);
            }
        }
        return $this->render('input', [
            'data' => $item,
            'updateForm' => false,
            'products' => $products
        ]);
    }
    
    public function actionSave() {
        if (Yii::$app->request->isPost)
        {
            try {
                $requests = Yii::$app->request->post();
                $id = Yii::$app->request->post('id');
                $status = 0;
                if($requests['status'] == 'on'){
                    $status = 1;
                }
                $model = new Feedback();
                if ((int) $id > 0) {
                    $model = Feedback::findOne($id);
                }
                $model->fullname = trim($requests['fullname']);
                $model->email = trim($requests['email']);
                $model->product_id = (int)$requests['productId'];
                $model->comment = trim($requests['comment']);
                $model->created_date = date("Y-m-d H:i:s");
                $model->status = $status;
                if($model->save()){
                    Yii::$app->getSession()->setFlash('success', 'Thêm mới/Cập nhật sản phẩm thành công!');
                    return $this->redirect("/sanpham/feedback/index");       
                }else{
                    return $this->render('input', ['data' => $model,'updateForm' => true]);
                }
                
            } catch (Exception $e) {
                echo $e->getMessage(); exit;
            }
        }
    }

    public function actionDeleteAttachment(){
        if (Yii::$app->request->isPost)
        {
            try {
                $requests = Yii::$app->request->post();
                $pathCustomRoot = Yii::$app->params['pathFileCustom'];
                $idAttachment = $requests['idAttachment'];
                $model = QlFiledinhkem::findOne($idAttachment);
                if(count($model) > 0){
                    $filePath = $pathCustomRoot.$model->dirPath;
                    if(file_exists($filePath)){
                        unlink($filePath);
                    }
                    $model->delete();
                    echo 'Success';
                }
            } catch (Exception $e) {
                echo $e->getMessage(); exit;
            }
        }
    }

    public function actionChangeStatus(){
        if (Yii::$app->request->isPost)
        {
            try {
                $requests = Yii::$app->request->post();
                $value = $requests['value'];
                $feedbackId = $requests['feedbackId'];
                if($feedbackId != "" && $feedbackId != null){
                    $model = Feedback::findOne($feedbackId);
                    if(count($model) > 0){
                        $model->status = $value;
                        $model->save();
                    }
                }
                
            } catch (Exception $e) {
                echo $e->getMessage(); exit;
            }
        }
    }
}
