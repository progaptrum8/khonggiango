<?php
use yii\helpers\Html;
use yii\helpers\Url;
$this->registerJsFile(
        '@web/js/sanpham/danhMucSp.js', ['depends' => [\yii\web\JqueryAsset::className()]]
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
            ?> danh mục sản phẩm
        </h1>
    </h1>

</section>
<!-- Main content -->
<section class="content">
    <div class="box box-default">
        <div class="box-body">
            <div class="row">
                <?= Html::beginForm(['/danhmuc/danh-muc-san-pham/save'], 'post', ['id' => 'formDanhMucSP']) ?>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Tên danh mục sản phẩm (<font color="red">*</font>)</label>
                        <input value="<?=isset($data)?$data->name:""?>" name="nameDanhMucSP" class="form-control" type="text"/>
                    </div>
                </div>
                <div class="col-md-12">
                    <input value="<?=isset($data)?$data->id:""?>" name="id" type="hidden"/>
                    <button class="btn btn-primary pull-right mg-left" id="saveButton" type="submit">
                        Lưu
                    </button>                    
                    <a href="/danhmuc/danh-muc-san-pham/index" class="btn btn-info pull-right" >Quay lại</a>
                </div>
                <?= Html::endForm() ?>
            </div>
        </div>
    </div>	
</section>

