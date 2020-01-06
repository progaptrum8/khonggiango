<?php

namespace app\modules\danhmuc\controllers;

use Yii;
use yii\data\Pagination;
use yii\data\Sort;
use app\components\BaseController;
use app\models\ProductTypes;

class LoaiSanPhamController extends BaseController {

    public function actionIndex() {
        //Tìm kiếm
        $stringCondition = " 1=1 ";
        $arrayCondition = array();
        $search = trim(Yii::$app->request->post("search"));
        if ($search != null && $search != "") {
            $stringCondition .= " AND  MATCH (`name`) AGAINST (:searchLike IN NATURAL LANGUAGE MODE) ";
            $arrayCondition[':searchLike'] = $search;
        }
        $query = ProductTypes::find()->where($stringCondition, $arrayCondition);

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
                    $item = ProductTypes::findOne($id);
                    $item->delete();    
                }
            }else{
                $item = ProductTypes::findOne($idSelected);
                $item->delete();
            }
        } catch (\yii\base\Exception $e) {
            Yii::$app->getSession()->setFlash('error', 'Xóa dữ liệu không thành công!');
            return $this->redirect("/danhmuc/loai-san-pham/index");
        }
        Yii::$app->getSession()->setFlash('success', 'Xóa dữ liệu thành công!');
        return $this->redirect("/danhmuc/loai-san-pham/index");
    }
    
    public function actionInput() {
        $item = new ProductTypes();
        $id = (int)trim(Yii::$app->request->get("id"));
        if ((int) $id > 0) {
            $itemFind = ProductTypes::findOne($id);
            if ($itemFind != null) {
                $item = $itemFind;
                return $this->render('input', ['data' => $item,'updateForm' => true]);
            }
        }
        return $this->render('input', ['data' => $item,'updateForm' => false]);
    }
    
    public function actionSave() {
        $id = (int)Yii::$app->request->post("id");
        $nameDanhMucSP = trim(Yii::$app->request->post("nameDanhMucSP"));

        $model = new ProductTypes();
        if ((int) $id > 0) {
            $model = ProductTypes::findOne($id);
        }
        $model->name = $nameDanhMucSP;
        if($model->validate()){
            $model->save();
            Yii::$app->getSession()->setFlash('success', 'Thêm mới/Cập nhật danh mục sản phẩm thành công!');
            return $this->redirect("/danhmuc/loai-san-pham/index");            
        }else{
            return $this->render('input', ['data' => $model,'updateForm' => true]);
        }
    }
}
