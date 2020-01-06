<?php
namespace app\modules\qtht\models;
use Yii;
use yii\rbac\Item;
class AuthItem extends \app\models\AuthItem {
    
    function remove($names) {
        try{
            if (is_array($names)) {
                foreach ($names as $item) {
                    $model = AuthItem::findOne(['name' => $item]);
                    $model->delete();
                }
            } else {
                $model = AuthItem::findOne(['name' => $names]);
                $model->delete();
            }
            return true;
        } catch (yii\db\Exception $e){
            return false;
        }
    }
    
    function phanQuyenNhomNguoiDung($id,$items){
        $itemsAdd=[];
        $itemsRemove=[];
        $phanQuyenNhomNguoiDung=[];
        $manager = Yii::$app->getAuthManager();
        foreach ($manager->getChildren($id) as $item) {
            array_push($phanQuyenNhomNguoiDung, $item->name);
        }
        foreach($items as $row){
            if(!in_array($row, $phanQuyenNhomNguoiDung)){
                array_push($itemsAdd, $row);
            }
        }
        foreach($phanQuyenNhomNguoiDung as $rowRe){
            if(!in_array($rowRe, $items)){
                array_push($itemsRemove, $rowRe);
            }
        }
        $auth = Yii::$app->getAuthManager();
        $item = AuthItem::findOne(['name' => $id])->type === Item::TYPE_ROLE ? $auth->getRole($id) : $auth->getPermission($id);
        if ($item) {
            $model = new AuthItemObj($item);
            if(!empty($itemsAdd)){
                $model->addChildren($itemsAdd);
            }
            if(!empty($itemsRemove)){
                $model->removeChildren($itemsRemove);
            }
        }
    }
    
    public function phanQuyenNguoiDung($idUser,$items)
    {
        $itemsAdd=[];
        $itemsRemove=[];
        $phanQuyen = new Phanquyen($idUser);
        $phanQuyenNguoiDung = $phanQuyen->getItemsAssigned();
        foreach($items as $row){
            if(!in_array($row, $phanQuyenNguoiDung)){
                array_push($itemsAdd, $row);
            }
        }
        foreach($phanQuyenNguoiDung as $rowRe){
            if(!in_array($rowRe, $items)){
                array_push($itemsRemove, $rowRe);
            }
        }
        if(!empty($itemsAdd)){
            $phanQuyen->assign($itemsAdd);
        }
        if(!empty($itemsRemove)){
            $phanQuyen->revoke($itemsRemove);
        }
    }
    
    public function getParentPermissionOfRoute($name){
        $return = [];
        $authItem =AuthItem::findOne(['name' => $name]);         
        if($authItem->parents!=null){
            foreach($authItem->parents as $itemPer){
                if($itemPer->type === Item::TYPE_PERMISSION){
                    array_push($return, $itemPer);
                }
            }
        }
        return $return;
    }
    
    public function getGroupParentPermissionOfRoute($name){
        $return = [];
        $authItem =AuthItem::findOne(['name' => $name]);         
        if($authItem->parents!=null){
            foreach($authItem->parents as $itemPer){
                if($itemPer->type === 0){
                    array_push($return, $itemPer);
                }
            }
        }
        return $return;
    }
}
