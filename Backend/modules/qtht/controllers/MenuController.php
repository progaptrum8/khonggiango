<?php

namespace app\modules\qtht\controllers;

use app\components\BaseController;
use app\modules\qtht\models\Menu;
use yii\data\Pagination;
use yii\data\Sort;
use Yii;

class MenuController extends BaseController {

    /**
     * Danh sách menu
     * @author HuyTD
     * @created 2017/01/06
     */
    public function actionIndex() {
        //Tìm kiếm
        $stringCondition = " (1=1) ";
        $arrayCondition = array();
        $searchName = trim(Yii::$app->request->post("searchName"));
        if ($searchName != null && $searchName != "") {
            $stringCondition .= " AND m.name like :namelike ";
            $arrayCondition[':namelike'] = '%' . $searchName . '%';
        }
        $searchParentName = trim(Yii::$app->request->post("searchParentName"));
        if ($searchParentName != null && $searchParentName != "") {
            $stringCondition .= " AND pm.name like :parentnamelike ";
            $arrayCondition[':parentnamelike'] = '%' . $searchParentName . '%';
        }
        $searchRoute = trim(Yii::$app->request->post("searchRoute"));
        if ($searchRoute != null && $searchRoute != "") {
            $stringCondition .= " AND  m.route like :routelike ";
            $arrayCondition[':routelike'] = '%' . $searchRoute . '%';
        }
        $query = Menu::find()
            ->from(Menu::tableName() . ' m')
            ->joinWith(['menuParent' => function ($q) {
                $q->from(Menu::tableName() . ' pm');
            }])
            ->where($stringCondition, $arrayCondition);
        //Sort
        $sort = new Sort([
            'attributes' => [
                'name' => [
                    'default' => SORT_ASC,
                    'label' => 'Tên',
                ],
                'parent' => [
                    'default' => SORT_ASC,
                    'label' => 'Cấp menu cha',
                ],
                'route' => [
                    'default' => SORT_ASC,
                    'label' => 'Liên kết',
                ],
                'order' => [
                    'asc' => ['parent' => SORT_ASC, 'order' => SORT_ASC],
                    'desc' => ['parent' => SORT_DESC, 'order' => SORT_DESC],
                    'default' => SORT_ASC,
                    'label' => 'Sắp xếp',
                ]
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
                    'searchName' => $searchName,
                    'searchParentName' => $searchParentName,
                    'searchRoute' => $searchRoute,
                    'pageSize' => $pageSize,
                    'data' => $data,
                    'pages' => $pages,
                    'sort' => $sort,
        ]);
    }

    /**
     * Form thêm mới/cập nhật menu
     * @author HuyTD
     * @created 2017/01/06
     */
    public function actionInput() {
        $item = new Menu();
        $id = (int)trim(Yii::$app->request->get("id"));
        if ((int) $id > 0) {
            $itemFind = Menu::findOne($id);
            if ($itemFind != null) {
                $item = $itemFind;
                return $this->render('input', ['data' => $item, 'updateForm' => true]);
            }
        }
        return $this->render('input', ['data' => $item, 'updateForm' => false]);
    }

    /**
     * Lưu Thêm mới/Cập nhật menu
     * @author HuyTD
     * @created 2017/01/06
     */
    public function actionSave() {
        //get params from request
        $name = trim(Yii::$app->request->post("name"));
        $route = trim(Yii::$app->request->post("route"));
        $parent = trim(Yii::$app->request->post("parent"));
        $parent_name = trim(Yii::$app->request->post("parent_name"));
        $order = Yii::$app->request->post("order");
        $data = Yii::$app->request->post("data");
        $class= Yii::$app->request->post("class");
        $id = trim(Yii::$app->request->post("id"));
        //save Add / Update
        $item =new Menu();
        if((int)$id){
            $item = Menu::findOne((int)$id);
        }
        $item->name = $name;
        $item->route = $route;
        $item->parent_name = $parent_name; 
        $item->parent = $parent;
        $item->order = (int)$order;
        $item->data = $data;
        $item->class = $class;
        if($item->validate()){
            $item->save();
            Yii::$app->getSession()->setFlash('success', 'Thêm mới/Cập nhật menu thành công!');
            return $this->redirect("/qtht/menu/index");
        }else{
            return $this->render('input', ['data' => $item, 'updateForm' => true]);
        }
    }

    /**
     * Xóa menu
     * @author HuyTD
     * @created 2017/01/06
     */
    public function actionDelete() {
        try {
            $idSelected = Yii::$app->request->post("idSelected");
            if(is_array($idSelected)){
                foreach ($idSelected as $id){
                    $menu = Menu::findOne($id);
                    $menu->delete();    
                }
            }else{
                $menu = Menu::findOne($idSelected);
                $menu->delete();
            }
        } catch (\yii\base\Exception $e) {
            Yii::$app->getSession()->setFlash('error', 'Xóa dữ liệu không thành công!');
            return $this->redirect("/qtht/menu/index");
        }
        Yii::$app->getSession()->setFlash('success', 'Xóa dữ liệu thành công!');
        return $this->redirect("/qtht/menu/index");
    }
}
