<?php
use app\components\CustomPagination;
use yii\helpers\Html;
use yii\helpers\Url;
$this->registerJsFile(
    '@web/js/sanpham/contact.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
?>
<!-- Content Header (Page header) -->
<div class="divContent">
    <section class="content-header">
        <h1>
            Setting Page
        </h1>	
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box box-default">
            <form action="/qtht/setting-page/save" id="formSetting" method="POST">
                <div class="col-xs-6 form-group">
                    <label for="typeSetting">Chọn loại setting</label>
                    <select class="form-control" name="typeSetting" id="typeSetting">
                        <option value="1" <?=$typeSetting == 1 ? "selected" : "" ?>>Giới thiệu</option>
                        <option value="2" <?=$typeSetting == 2 ? "selected" : "" ?>>Ưu đãi</option>
                        <option value="3" <?=$typeSetting == 3 ? "selected" : "" ?>>Thanh toán mua hàng</option>
                        <option value="4" <?=$typeSetting == 4 ? "selected" : "" ?>>Liên hệ</option>
                    </select>
                </div>
            
                <div class="col-xs-12 col-xs-12">
                    <textarea name="textValue" id="textArea"><?=$content != null && $content != '' ? base64_decode($content) : "" ?></textarea>
                    <input type="hidden" id="textValueEncode" name="textValueEncode">
                </div>
                <div class="col-xs-6 pull-right mgTop15">
                    <input class="btn btn-info pull-right" type="button" id="submitBtn" value="Save" />
                </div>


            </form>
        </div>
    </section>
</div>