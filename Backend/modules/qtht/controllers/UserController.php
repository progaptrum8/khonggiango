<?php

namespace app\modules\qtht\controllers;

use app\components\BaseController;
use app\modules\qtht\models\AuthItem;
use app\modules\qtht\models\User;
use yii\data\Pagination;
use yii\data\Sort;
use Yii;
use yii\db\Expression;
use app\models\QlFiledinhkem;
use app\components\CommonUtil;
use app\modules\qtht\models\Phanquyen;

class UserController extends BaseController {

    /**
     * Danh mục người dùng
     * @author HuyTD
     * @created 2017/01/06
     */
    public function actionIndex() {
        //Tìm kiếm
        $stringCondition = " isDeleted = 0 ";
        $arrayCondition = array();
        $search = trim(Yii::$app->request->post("search"));
        if ($search != null && $search != "") {
            $stringCondition .= " AND CONTAINS(u.fullname,:fullname) or u.fullname like :fullnamelike )";
            $arrayCondition[':fullname'] = '"'.$search.'"';
            $arrayCondition[':fullnamelike'] = '%' . $search . '%';
        }
        
        $searchCoQuan = trim(Yii::$app->request->post("searchCoQuan"));
        if ($searchCoQuan != null && $searchCoQuan != "") {
            $stringCondition .= " AND (( CONTAINS(cq.tenDonVi,:coquan) or cq.tenDonVi like :coquanlike )";
            $stringCondition .= " AND (CONTAINS(dep.tenDonVi,:phong) or dep.tenDonVi like :phonglike ))";
            $arrayCondition[':coquan'] = '"'.$searchCoQuan.'"';
            $arrayCondition[':coquanlike'] = '%' . $searchCoQuan . '%';
            $arrayCondition[':phong'] = '"'.$searchCoQuan.'"';
            $arrayCondition[':phonglike'] = '%' . $searchCoQuan . '%';
        }
        $query = User::find()->alias('u')                
                ->join('LEFT JOIN', 'danhmuc_coquan as cq', 'cq.id = u.donViId')
                ->join('LEFT JOIN', 'danhmuc_coquan as dep', 'dep.id = u.phongId')
                ->where($stringCondition, $arrayCondition);
        //Sort
        $sort = new Sort([
            'attributes' => [
                'fullname' => [
                    'default' => SORT_ASC,
                    'label' => 'Tên người dùng',
                ],
            ],
        ]);
        //Phân trang
        $pageSize = Yii::$app->request->post("pageSize");
        $perPage = Yii::$app->request->get("per-page");        
        if( (int) $pageSize <= 0){
            if((int)$perPage >0){
                $pageSize = (int)$perPage;
            }else{
                $pageSize = 20;
            }
        }
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => $pageSize]);
        //Lấy dữ liệu
        $data = $query->offset($pages->offset)
                ->orderBy($sort->orders)
                ->limit($pages->limit)
                ->all();
        //Hiển thị
        return $this->render('index', [
                    'search' => $search,
                    'searchCoQuan'=>$searchCoQuan,
                    'pageSize' => $pageSize,
                    'data' => $data,
                    'pages' => $pages,
                    'sort' => $sort,
        ]);
    }

    /**
     * Form thêm mới/cập nhật người dùng
     * @author HuyTD
     * @created 2017/01/06
     */
    public function actionInput() {
        $item = new User();
        $id = (int)trim(Yii::$app->request->get("id"));
        $manager = Yii::$app->getAuthManager();        
        if ((int) $id > 0) {
            $itemFind = User::findOne($id);
            if ($itemFind != null) {
                $item = $itemFind;
                return $this->render('input', ['data' => $item,'manager'=>$manager,'phanQuyen'=>new Phanquyen($id, $item), 'updateForm' => true]);
            }
        }
        return $this->render('input', ['data' => $item,'manager'=>$manager,'phanQuyen'=>new Phanquyen() ,'updateForm' => false]);
    }

    //Lưu Thêm mới/Cập nhật người dùng
    public function actionSave() {
        $email = trim(Yii::$app->request->post("email"));
        $fullname = trim(Yii::$app->request->post("fullname"));
        $password = Yii::$app->request->post("password");
        $reTypePassword = Yii::$app->request->post("reTypePassword");
        $isActive = trim(Yii::$app->request->post("isActive"));
        $id = trim(Yii::$app->request->post("id"));
        $itemsRoute = Yii::$app->request->post("selRoute",[]);
        $itemsNhomNguoiDung = Yii::$app->request->post("selectItemCheckboxNhomNguoiDung",[]);
        $itemsPhanQuyen = array_merge($itemsRoute,$itemsNhomNguoiDung);
        $item = new User();
        $phanquyen = new Phanquyen();
        if ((int) $id > 0) {
            $item = User::findOne($id);
            $phanquyen = new Phanquyen($id, $item);
        }else{
            $item->createdAt = date("Y-m-d H:i:s");
        }
        $item->username = $email;
        $item->email = $email;
        $item->fullname = $fullname;
        if ($password != null && $password != "" && $password == $reTypePassword) {
            $item->password = md5($password);
        }else{
        }
        $item->status = ((int) $isActive == 1 ? 1 : 0);
        $item->isActive = ((int) $isActive == 1 ? 1 : 0);
        $item->updatedAt = date("Y-m-d H:i:s");
        $manager = Yii::$app->getAuthManager();
        if($item->validate()){
            $item->save();
            $modelPhanQuyen = new AuthItem();
            $modelPhanQuyen->phanQuyenNguoiDung($item->id, $itemsPhanQuyen);
            Yii::$app->getSession()->setFlash('success', 'Thêm mới/Cập nhật người dùng thành công!');
            return $this->redirect("/qtht/user/index");            
        }else{
            return $this->render('input', ['data' => $item,'manager'=>$manager,'phanQuyen'=>$phanquyen ,'updateForm' => true]);
        }
    }

    //Xóa người dùng
    public function actionDelete() {
        try {
            $idSelected = Yii::$app->request->post("idSelected");
            if(is_array($idSelected)){
                foreach ($idSelected as $id){
                    $user = User::findOne($id);
                    $user->isDeleted = "1";
                    $user->save();    
                }
            }else{
                $user = User::findOne($idSelected);
                $user->isDeleted = "1";
                $user->save();
            }
        } catch (\yii\base\Exception $e) {
            Yii::$app->getSession()->setFlash('error', 'Xóa dữ liệu không thành công!');
            return $this->redirect("/qtht/user/index");
        }
        Yii::$app->getSession()->setFlash('success', 'Xóa dữ liệu thành công!');
        return $this->redirect("/qtht/user/index");
    }
    
    public function actionCheckemail(){
        $id = (int)Yii::$app->request->post("id");
        $email = trim(Yii::$app->request->post("email"));
        $items=[];
        if ($id > 0) {
            $items =User::find()->where(['email'=>$email])
                                ->andWhere(['!=','isDeleted',1])
                                ->andWhere(['!=','id',$id])->all();
        }else{
            $items =User::find()->where(['email'=>$email])->andWhere(['!=','isDeleted',1])->all();
        }
        if(count($items)>0){
            echo 'false';
        }else{
            echo 'true';
        }
        exit;
    }

    public function actionDetail(){
        $item = new User();
        $id = Yii::$app->user->identity->id;
        $manager = Yii::$app->getAuthManager();  
        $itemFind = User::findOne($id);
        if ($itemFind != null) {
            $item = $itemFind;
            return $this->render('detail', ['data' => $item,'manager'=>$manager,'updateForm' => true]);
        }
    }

    //Cập nhật thông tin
    public function actionSaveinformation() {
        $email = trim(Yii::$app->request->post("email"));
        $fullname = trim(Yii::$app->request->post("fullname"));
        $password = Yii::$app->request->post("password");
        $reTypePassword = Yii::$app->request->post("reTypePassword");
        $id = Yii::$app->user->identity->id;
        $modelFileDinhKem = new QlFiledinhkem();
        $avatar = $_FILES['avatar'];
        $avatarDir = "";
        $mime = "";
        $dataResize = [];
        if($avatar['size'] > 0) { // save thumbnail image
            $dataResize = QlFiledinhkem::getDataFileAfterResize($avatar);
        }
        if(count($dataResize) > 0){
            $avatarDir = $dataResize['urlThumbnail'];
            $mime = $dataResize['mime'];
        }
        $item = new User();
        if ((int) $id > 0) {
            $item = User::findOne($id);
            $maSoOld=null;
            if($item->fileAvatar!=null){
                $maSoOld= (int)$item->fileAvatar->idDK;
            }
            $item->username = $email;
            $item->email = $email;
            $item->fullname = $fullname;
            if(count($dataResize) > 0){
                $item->avatar = $avatarDir;
                $item->mimeAvatar = $mime; 
            }
            
            if ($password != null && $password != "" && $password == $reTypePassword) {
                $item->password = md5($password);
            }
            $item->updatedAt = date("Y-m-d H:i:s");
            if($item->validate()){
                $item->save();
                Yii::$app->getSession()->setFlash('success', 'Cập nhật thông tin thành công!');
            }
            return $this->redirect('detail');          
        }else{
            return $this->redirect('/');
        }
    }
}
