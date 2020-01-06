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

class SanPhamController extends BaseController {

    public function actionIndex() {
        //Tìm kiếm
        $stringCondition = " 1=1 ";
        $arrayCondition = array();
        $search = trim(Yii::$app->request->post("search"));
        if ($search != null && $search != "") {
            $stringCondition .= " AND  ( MATCH (dmsp.`name`) AGAINST (:searchLike IN NATURAL LANGUAGE MODE) OR MATCH (pt.`name`) AGAINST (:searchLike IN NATURAL LANGUAGE MODE) OR MATCH (pd.`title`) AGAINST (:searchLike IN NATURAL LANGUAGE MODE) )  ";
            $arrayCondition[':searchLike'] = $search;
        }
        $query = Products::find()->alias('pd')
                ->select('pd.*, dmsp.`name` as nameDMSP, pt.`name` as nameLoaiSP')
                ->join('INNER JOIN','danhmuc_sanpham as dmsp', 'dmsp.id = pd.id_danhmuc')
                ->join('LEFT JOIN','product_types as pt', 'pt.id = pd.id_product_type')
                ->where($stringCondition, $arrayCondition);
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
        //Hiển thị
        return $this->render('index', [
            'search' => $search,
            'pageSize' => $pageSize,
            'data' => $data,
            'pages' => $pages
        ]);
    }
    
    public function actionDelete() {
        try {
            $idSelected = Yii::$app->request->post("idSelected");
            if(is_array($idSelected)){
                foreach ($idSelected as $id){
                    $item = Products::findOne($id);
                    $item->delete();
                    $model = QlFiledinhkem::deleteAll(['idObject' => $id]);
                }
            }else{
                $item = Products::findOne($idSelected);
                $item->delete();
                $model = QlFiledinhkem::deleteAll(['idObject' => $idSelected]);
            }
        } catch (\yii\base\Exception $e) {
            Yii::$app->getSession()->setFlash('error', 'Xóa dữ liệu không thành công!');
            return $this->redirect("/sanpham/san-pham/index");
        }
        Yii::$app->getSession()->setFlash('success', 'Xóa dữ liệu thành công!');
        return $this->redirect("/sanpham/san-pham/index");
    }
    
    public function actionInput() {
        $item = new Products();
        $id = (int)trim(Yii::$app->request->get("id"));
        $danhMucSP = DanhMucSanPham::find()->all();
        $productTypes = ProductTypes::find()->all();
        $imageProduct = [];
        if ((int) $id > 0) {
            $itemFind = Products::findOne($id);
            $imageProduct = QlFiledinhkem::find()->where(['idObject' => $id ])->asArray()->all();
            if ($itemFind != null) {
                $item = $itemFind;
                return $this->render('input', [
                    'data' => $item,
                    'updateForm' => true,
                    'danhMucSP' => $danhMucSP,
                    'productTypes' => $productTypes,
                    'imageProduct' => $imageProduct
                ]);
            }
        }
        return $this->render('input', [
            'data' => $item,'updateForm' => false,
            'danhMucSP' => $danhMucSP,
            'productTypes' => $productTypes,
            'imageProduct' => $imageProduct
        ]);
    }
    
    public function actionSave() {
        if (Yii::$app->request->isPost)
        {
            try {
                $requests = Yii::$app->request->post();
                $pathFile = Yii::$app->params['pathFileCustom'] . '\Upload/';
                $urlThumbnail = "";
                $mime = "";
                $dataResize = [];
                $dataFiles = $_FILES['files'];

                if($_FILES['thumbnail']['size'] > 0) { // save thumbnail image
                    $dataResize = QlFiledinhkem::getDataFileAfterResize($_FILES['thumbnail']);
                }
                if(count($dataResize) > 0){
                    $urlThumbnail = $dataResize['urlThumbnail'];
                }

                $id = $requests["id"] != null && $requests["id"] != '' ? $requests["id"] : 0 ;
                $model = new Products();
                if ((int) $id > 0) {
                    $model = Products::findOne($id);
                }
                $model->title = trim($requests['title']);
                $model->describe = trim($requests['describe']);
                $model->id_danhmuc = trim($requests['id_danhmuc']);
                $model->id_product_type = trim($requests['id_product_type']);
                $model->date_created = date("Y-m-d H:i:s");
                $model->price = $requests['price'] !="" && $requests['price'] != null ? trim($requests['price']) : "0 VNĐ";
                if($urlThumbnail != "" && $urlThumbnail != null){
                   $model->thumbnail = $urlThumbnail;
                }
                if($model->save()){
                    $idProject = $model->id;
                    $dataInsert = [];
                    $pathFile = Yii::$app->params['pathFileCustom'] . '\Upload/';
                    for ($i=0; $i < count($dataFiles['name']) ; $i++) { 
                        if($dataFiles['size'][$i] > 0){
                            $file = $dataFiles['tmp_name'][$i];
                            $sourceProperties = getimagesize($file);
                            $mime = $sourceProperties['mime'];
                            $ext = pathinfo($dataFiles['name'][$i], PATHINFO_EXTENSION);
                            $fileNewName = md5($dataFiles['name'][$i].rand(0,9999999)).".".$ext;
                            move_uploaded_file($dataFiles['tmp_name'][$i], $pathFile.'/'.$fileNewName);
                            $dataInsert[] = [
                                'maSo' => $fileNewName,
                                'fileName' => $dataFiles['name'][$i],
                                'mime' => $mime,
                                'idProject' => $idProject
                            ];
                        }
                    }
                    $insert = QlFiledinhkem::insertAttachmentToDb($dataInsert);
                    if($insert){
                        Yii::$app->getSession()->setFlash('success', 'Thêm mới/Cập nhật sản phẩm thành công!');
                        return $this->redirect("/sanpham/san-pham/index"); 
                    }else {
                        throw new \yii\web\HttpException(404, 'Có lỗi xảy ra');
                    }
                               
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

    public function actionUpdateIsNoiBat(){
        if (Yii::$app->request->isPost)
        {
            try {
                $requests = Yii::$app->request->post();
                $value = $requests['value'];
                $productId = $requests['productId'];
                if($productId != "" && $productId != null){
                    $model = Products::findOne($productId);
                    if(count($model) > 0){
                        $model->is_noibat = $value;
                        $model->save();
                    }
                }
                
            } catch (Exception $e) {
                echo $e->getMessage(); exit;
            }
        }
    }
}
