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
                <?= Html::beginForm(['/sanpham/san-pham/save'], 'post', ['id' => 'formSanPham', 'enctype'=>'multipart/form-data']) ?>
                <div class="col-md-12 pull-right text-center">
                    <div class="col-md-6 form-group">
                        <img src="<?=$data->thumbnail != "" && $data->thumbnail != null ? (Url::to(['/thongtin/filedinhkem/show-image','dirPath'=>base64_encode($data->thumbnail)])) : '/images/product.png'?>"  class="previewImg pull-left" id="thumbnail"/>
                        <input type="file" name="thumbnail" onclick="sanPhamByEvent.handleBrowseImage()" class="inputFile" id="avatarInputFile" value="Chọn hình đại diện">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Tên sản phẩm (<font color="red">*</font>)</label>
                        <input value="<?=isset($data)?$data->title:""?>" id="title" name="title" class="form-control" type="text"/>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Miêu tả sản phẩm (<font color="red">*</font>)</label>
                        <input value="<?=isset($data)?$data->describe:""?>" id="describe" name="describe" class="form-control" type="text"/>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Giá cả:</label>
                        <input type="text" name="price" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="<?=isset($data)?$data->price:""?>" data-type="currency">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Danh mục sản phẩm</label>
                        <select name="id_danhmuc" id="id_danhmuc" class="form-control">
                            <?php foreach ($danhMucSP as $value) { ?>
                                <option <?=$data['id_danhmuc'] == $value->id ? "selected" : "" ?> value="<?=$value->id?>"><?=$value->name?></option>
                            <?php } ?>
                            <option value="0">Khác</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Loại sản phẩm</label>
                        <select name="id_product_type" id="id_product_type" class="form-control">
                            <?php foreach ($productTypes as $value) { ?>
                                <option <?=$data['id_product_type'] == $value->id ? "selected" : "" ?> value="<?=$value->id?>"><?=$value->name?></option>
                            <?php } ?>
                            <option value="0">Khác</option>
                        </select>
                    </div>
                </div>
                 <div class="col-md-12">
                    <div class="form-group">
                        <p class="control-label" style="float: left; font-weight: bold; margin-right: 5px;">Sản phẩm nổi bật</p>
                        <input type="checkbox" <?=$data->is_noibat == 1 ? "checked" : ""?> onchange="sanPhamByEvent.checkIsNoiBat(this);return false;" name="isNoiBat" class="isNoiBat">
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="form-group">
                        <label style="width: 100%;" class="control-label">Hình ảnh sản phẩm</label>
                        <div class="containerImg">
                            <?php foreach ($imageProduct as $value) { ?>
                                <div class="imageBlock">
                                    <a href="<?=Url::to(['/thongtin/filedinhkem/show-image','dirPath'=>base64_encode($value['dirPath'])])?>" data-lightbox='roadtrip'>
                                        <img src="<?=Url::to(['/thongtin/filedinhkem/show-image','dirPath'=>base64_encode($value['dirPath'])])?>">
                                        <a class='deleteImage' data-idatt='<?=$value['idDK']?>' onclick='sanPhamByEvent.deleteImage(this);return false;'>x</a>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <article class="article">
                            <label for="files">Chọn hình ảnh: </label>
                            <input id="files" class="file1" data-stt="1" type="file" name="files[]" onchange="sanPhamByEvent.changeImages(this, event);" />
                            <div id="result" class="multipleImage" ></div>
                        </article>
                    </div>
                </div>

                <div class="col-md-12">
                    <input value="<?=isset($data)?$data->id:""?>" name="id" class="idProduct" type="hidden"/>
                    <button class="btn btn-primary pull-right mg-left" id="saveButton" type="submit">
                        Lưu
                    </button>                    
                    <a href="/sanpham/san-pham/index" class="btn btn-info pull-right" >Quay lại</a>
                </div>
                <?= Html::endForm() ?>
            </div>
        </div>
    </div>	
</section>
