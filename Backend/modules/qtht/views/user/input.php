<?php
use yii\helpers\Html;
$this->registerJsFile(
    '@web/js/development/qtht/user.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
$this->registerJsFile(
    '@web/js/development/qtht/phanquyen.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php if(!$updateForm){
            echo "Thêm mới";
            $formUser = "formUserCreate";
        }else{
            echo "Cập nhật";
            $formUser = "formUserUpdate";
        }?> người dùng
    </h1>
</section>
<?= Html::beginForm(['/qtht/user/save'], 'post',['id' => $formUser]) ?>
<!-- Main content -->
<section class="content">
    <div class="box box-default">
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Họ và tên (<font color="red">*</font>)</label>
                        <input class="form-control" type="text" name="fullname" value="<?=($updateForm)?$data->fullname:"" ?>">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Email (<font color="red">*</font>)</label>
                        <input class="form-control" type="text" name="email" value="<?=($updateForm)?$data->email:"" ?>">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Mật khẩu
                            <?php
                            if(!$updateForm){
                            ?>
                            (<font color="red">*</font>)
                            <?php
                            }
                            ?>
                        </label>
                        <input class="form-control" type="password" name="password" id="password" placeholder="******">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Nhập lại mật khẩu
                            <?php
                            if(!$updateForm){
                            ?>
                            (<font color="red">*</font>)
                            <?php
                            }
                            ?>
                        </label>
                        <input class="form-control" type="password" name="reTypePassword" placeholder="******">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Được sử dụng</label> 
                        <input type="checkbox" name="isActive" value="1" <?=($updateForm)?((int)$data->status==1?"checked":""):"" ?>>
                    </div>
                </div>
            </div>
            <h3>
                Phân quyền người dùng
            </h3>
            <div class="row">
                <div class="container table-reponsive col-sm-12">
                    <h4>Nhóm người dùng</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width:5%">#</th>
                                <th style="width:5%"><input type="checkbox" id="selectedAllNhomNguoiDung"></th>
                                <th>Tên nhóm người dùng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $phanQuyenNguoiDung=[];
                            if($updateForm){
                                $phanQuyenNguoiDung = $phanQuyen->getItemsAssigned($data->id);
                            }
                            $roles = $manager->getRoles();
                            $i=0;
                            $phanQuyenNhomNguoiDung=[];
                            foreach($roles as $itemRole){
                                ?>
                                <tr>
                                    <td><?=++$i?></td>
                                    <td>
                                        <input
                                            <?php
                                            if(!empty($phanQuyenNguoiDung)){
                                                if(in_array($itemRole->name,$phanQuyenNguoiDung)){
                                                    echo "checked";
                                                    foreach ($manager->getChildren($itemRole->name) as $itemPhanQuyenNhom) {
                                                        array_push($phanQuyenNhomNguoiDung, $itemPhanQuyenNhom->name);
                                                    }
                                                }                                                
                                            }
                                            ?>
                                            name="selectItemCheckboxNhomNguoiDung[]"
                                            value="<?=$itemRole->name?>"
                                            type="checkbox" >
                                    </td>
                                    <td><?=$itemRole->description?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="container col-sm-12">
                    <h4>Chức năng</h4>
                    <table class="table table-chucnang">
                        <thead>
                            <tr>
                                <th style="width:5%">#</th>
                                <th style="width:5%"><input type="checkbox" id="checkAllChucNang"></th>
                                <th>Tên module</th>
                                <th>Tên chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i=0;
                            foreach($phanQuyen->getGroupPermisstions() as $itemGroupPer){
                                $countChildGroupPer=count($manager->getChildren($itemGroupPer->name));  
                                if($countChildGroupPer>0){
                            ?>
                            <tr>
                                <td rowspan="<?=$countChildGroupPer?>"><?=++$i?></td>
                                <td rowspan="<?=$countChildGroupPer?>">
                                    <input
                                        <?php
                                        if(!empty($phanQuyenNguoiDung)){
                                            echo in_array($itemGroupPer->name,$phanQuyenNguoiDung)?"checked":"";
                                        }
                                        ?>
                                        rel="cn-selector"
                                        name="selRole[]"
                                        value="<?=$itemGroupPer->name?>"
                                        type="checkbox" >
                                </td>
                                <td rowspan="<?=$countChildGroupPer?>">
                                    <b><?=$itemGroupPer->description?></b>
                                </td>
                                <?php
                                $j = 0;
                                foreach($manager->getChildren($itemGroupPer->name) as $itemChildPerStepOne){
                                    if(++$j !=1){
                                        ?>
                                        </tr>
                                        <tr>
                                        <?php
                                    }
                                ?>
                                    <td>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td style="width:5%">
                                                        <input
                                                            <?php
                                                            if(!empty($phanQuyenNguoiDung)){
                                                                echo in_array($itemChildPerStepOne->name,$phanQuyenNguoiDung)?"checked":"";
                                                            }
                                                            ?>
                                                            rel="cn-selector"
                                                            name="selRole[]"
                                                            parent-id="<?=$itemGroupPer->name?>"
                                                            value="<?=$itemChildPerStepOne->name?>"
                                                            type="checkbox" >
                                                    </td>
                                                    <td>
                                                        <b><?=$itemChildPerStepOne->description?></b>
                                                    </td>
                                                </tr>
                                            </thead>
                                            <tbody>                                            
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <?php
                                                        foreach($manager->getChildren($itemChildPerStepOne->name) as $itemChildPerStepTwo){
                                                            if(!empty($phanQuyenNhomNguoiDung)){
                                                                if(!in_array($itemChildPerStepTwo->name,$phanQuyenNhomNguoiDung)){
                                                                    ?>
                                                                    <input
                                                                        <?php
                                                                        if(!empty($phanQuyenNguoiDung)){
                                                                            echo in_array($itemChildPerStepTwo->name,$phanQuyenNguoiDung)?"checked":"";
                                                                        }
                                                                        ?>
                                                                        rel="cn-selector"
                                                                        name="selRoute[]"
                                                                        parent-id="<?=$itemChildPerStepOne->name?>"
                                                                        value="<?=$itemChildPerStepTwo->name?>"
                                                                        type="checkbox"> <?=$itemChildPerStepTwo->description?>
                                                                    <?php
                                                                }
                                                            }else{
                                                            ?>
                                                            <input
                                                                <?php
                                                                if(!empty($phanQuyenNguoiDung)){
                                                                    echo in_array($itemChildPerStepTwo->name,$phanQuyenNguoiDung)?"checked":"";
                                                                }
                                                                ?>
                                                                rel="cn-selector"
                                                                name="selRoute[]"
                                                                parent-id="<?=$itemChildPerStepOne->name?>"
                                                                value="<?=$itemChildPerStepTwo->name?>"
                                                                type="checkbox"> <?=$itemChildPerStepTwo->description?>
                                                            <?php
                                                            }
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                <?php
                                }
                                ?>
                            </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <input type="hidden" id="id" name="id" value="<?=($updateForm)?$data->id:"" ?>">
                    <button class="btn btn-primary pull-right mg-left" type="submit">Lưu</button>
                    <button class="btn btn-info pull-right" type="button" id="goBackButton">Quay lại</button>
                </div>
            </div>            
        </div>
    </div>	
</section>
<?=Html::endForm() ?>