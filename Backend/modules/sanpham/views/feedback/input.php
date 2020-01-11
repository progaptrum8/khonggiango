<?php
use yii\helpers\Html;
use yii\helpers\Url;
$this->registerJsFile(
        '@web/js/sanpham/product.js', ['depends' => [\yii\web\JqueryAsset::className()]]
);
?>
<section class="content-header">
    <h1>
        <h1>
            <?php
            if (!$updateForm) {
                echo "Thêm mới";
            } else {
                echo "Cập nhật";
            }
            ?> Sản Phẩm
        </h1>
    </h1>

</section>
<!-- Main content -->
<section class="content">
    <div class="box box-default">
        <div class="box-body">
            <div class="row">
                <?= Html::beginForm(['/sanpham/feedback/save'], 'post', ['id' => 'formFeedback', 'enctype'=>'multipart/form-data']) ?>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Fullname (<font color="red">*</font>)</label>
                        <input value="<?=isset($data)?$data->fullname:""?>" id="fullname" name="fullname" class="form-control" type="text"/>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Email (<font color="red">*</font>)</label>
                        <input value="<?=isset($data)?$data->email:""?>" id="email" name="email" class="form-control" type="text"/>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Comment:</label>
                        <textarea name="comment" id="comment" style="width: 100%;"><?=$data->comment?></textarea>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Sản phẩm</label>
                        <select name="productId" id="productId" class="form-control">
                            <?php foreach ($products as $value) { ?>
                                <option <?=$data['product_id'] == $value->id ? "selected" : "" ?> value="<?=$value->id?>"><?=$value->title?></option>
                            <?php } ?>
                            <option value="0">Khác</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Công khai:</label>
                        <input type="checkbox" <?=$data['status'] == 1 ? 'checked' : ''?> name="status">
                    </div>
                </div>

                <div class="col-md-12">
                    <input value="<?=isset($data)?$data->id:""?>" name="id" class="feedbackId" type="hidden"/>
                    <button class="btn btn-primary pull-right mg-left" id="saveButton" type="submit">
                        Lưu
                    </button>                    
                    <a href="/sanpham/feedback/index" class="btn btn-info pull-right" >Quay lại</a>
                </div>
                <?= Html::endForm() ?>
            </div>
        </div>
    </div>	
</section>
