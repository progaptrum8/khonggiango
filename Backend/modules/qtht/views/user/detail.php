<?php
use yii\helpers\Html;
use yii\helpers\Url;
$this->registerJsFile(
    '@web/js/development/qtht/user.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
?>
<!-- Content Header (Page header) -->
<?= Html::beginForm(['/qtht/user/saveinformation'], 'post',['id' => 'formUser','enctype'=>'multipart/form-data']) ?>
<section class="content-header">
    <h1>Thông tin người dùng</h1>
    <div class="breadcrumb">
        <button class="btn btn-primary pull-right mg-left" id="saveInfomation" type="submit" >Lưu</button>
        <button class="btn btn-info pull-right" type="button" id="editInfomation">Chỉnh sửa</button>
    </div>
</section>
<!-- Main content -->
<section class="content">
    <div class="box box-default">
        <div class="box-body">
            <div class="row" id="chiTietNguoiDung">
                <div class="col-md-3 pull-right text-center">
                    <div class="form-group">
                        <img style="width: 220px; height: 200px;" id="img" class="col-md-12" onerror="this.src='/images/avatar.png'"
                        src="<?= ($data->fileAvatar!=null) ?(Url::to(['/thongtin/filedinhkem/show-image','userId'=>$data->id])):"" ?>"/>
                        <input id="f" type="file" onchange="file_change(this)" style="display: none"  name="avatar"/>
                        <input type="button" class="btn btn-primary col-md-12" value="Chọn ảnh" onclick="document.getElementById('f').click()" />
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <label class="control-label">Họ và tên(<font color="red">*</font>)</label>
                        <input class="form-control" type="text" name="fullname" value="<?=$data->fullname?>">
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <label class="control-label">Email (<font color="red">*</font>)</label>
                        <input class="form-control" type="text" name="email" value="<?=$data->email?>">
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <label class="control-label">Mật khẩu
                            (<font color="red">*</font>)
                        </label>
                        <input class="form-control" type="password" name="password" id="password" placeholder="******">
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <label class="control-label">Nhập lại mật khẩu
                            (<font color="red">*</font>)
                        </label>
                        <input class="form-control" type="password" name="reTypePassword" placeholder="******">
                    </div>
                </div>
            </div>      
        </div>
    </div>	
</section>
<?=Html::endForm() ?>