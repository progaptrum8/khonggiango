<?php
use yii\widgets\ActiveForm;
use app\modules\qtht\models\Menu;
use app\assets\AutocompleteAsset;
use yii\helpers\Json;

AutocompleteAsset::register($this);
$opts = Json::htmlEncode([
    'menus' => Menu::getMenuSource(),
    'routes' => Menu::getAppRoutes(),
]);
$this->registerJsFile(
    '@web/js/development/qtht/menu.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
$this->registerJs("var _opts = $opts;");
$this->registerJs($this->render('_script.js'));
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php if(!$updateForm){
            echo "Thêm mới";
            $formMenu = "formMenuCreate";
        }else{
            echo "Cập nhật";
            $formMenu = "formMenuUpdate";
        }?> Menu
    </h1>

</section>
<!-- Main content -->
<section class="content">
    <div class="box box-default">
        <div class="box-body">
            <div class="row">
                <?php $form = ActiveForm::begin(['action' =>['/qtht/menu/save'],'method'=>'post','id' => $formMenu]);
                ?>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Tên menu (<font color="red">*</font>)</label>
                        <input class="form-control" type="text" name="name" value="<?=($updateForm)?$data->name:"" ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Cấp menu cha</label>
                        <input type="hidden" name="parent" value="<?=($updateForm)?$data->parent:"" ?>" id="parent_id">
                        <input class="form-control" type="text" name="parent_name" id="parent_name" value="<?=($updateForm && $data->menuParent)?$data->menuParent->name:"" ?>">
                        <?php
                        if($updateForm && $data->getErrors('parent_name')){
                        ?>
                        <label for="parent_name" generated="true" class="error"><?=$data->getErrors('parent_name')[0]?></label>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Liên kết</label>
                        <input class="form-control" type="text" name="route" id="route" value="<?=($updateForm)?$data->route:"" ?>">
                        <?php
                        if($updateForm && $data->getErrors('route')){
                        ?>
                        <label for="route" generated="true" class="error"><?=$data->getErrors('route')[0]?></label>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Sắp xếp</label>
                        <input class="form-control" type="number" min="0" name="order" value="<?=($updateForm)?$data->order:"" ?>">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Icon CSS</label>
                        <input class="form-control" name="class" value="<?=($updateForm)?$data->class:"" ?>">
                    </div>
                </div>
                <div class="col-md-12">
                    <input type="hidden" name="id" value="<?=($updateForm)?$data->id:"" ?>">
                    <button class="btn btn-primary pull-right mg-left" type="submit">Lưu</button>
                    <button class="btn btn-info pull-right" type="button" id="goBackButton">Quay lại</button>
                </div>
                <?php ActiveForm::end() ?>
            </div>
        </div>
    </div>	
</section>