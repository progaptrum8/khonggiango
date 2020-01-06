<?php
use yii\helpers\Url;
use yii\helpers\Html;
use app\components\CustomPagination;
use app\modules\qtht\models\DanhmucCoquan;

$this->registerJsFile(
        '@web/js/sanpham/product.js', ['depends' => [\yii\web\JqueryAsset::className()]]
);
$this->title = 'Sản phẩm';
?>
<div class="listDanhMuc">
    <section class="content-header">
        <h1>
            Danh sách sản phẩm
        </h1>
        <div class="breadcrumb">
            <a class="btn btn-danger pull-right mg-left" id="deleteDanhMucSP" ><i class="fa fa-trash"></i> Xóa</a>
            <a class="btn btn-success pull-right mg-left" id="addDanhMucSP" href="/sanpham/san-pham/input"><i class="fa fa-plus"></i> Thêm mới</a>
        </div>	
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box box-default">
            <?= Html::beginForm(['/sanpham/san-pham/index'], 'post', ['id' => 'searchForm','name'=>'searchForm']) ?>
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="input-group">
                                <input class="form-control" placeholder="Nhập tên danh mục sản phẩm để tìm kiếm" type="text" name="search" value="<?=$search?>">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary pull-right mg-left" type="submit"><i class="fa fa-search"></i> Tìm kiếm</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-reponsive">
                                <table id="example1" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="selectedAll"></th>
                                            <th>STT</th>
                                            <th>Hình sản phẩm</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Danh mục sản phẩm</th>
                                            <th>Loại sản phẩm</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        <?php
                                        if ($data != null) {
                                            $i = $pages->page * $pageSize;
                                            foreach ($data as $item) {
                                                $i++;
                                                ?>
                                                <tr>
                                                    <td>
                                                        <input name="selected[]" 
                                                        type="checkbox"
                                                        value="<?php echo $item['id']; ?>"/>
                                                    </td>
                                                    <td> <?= $i ?> </td>
                                                    <td>
                                                        <a href="<?=$item["thumbnail"] != "" && $item["thumbnail"] != null ? (Url::to(['/thongtin/filedinhkem/show-image','dirPath'=>base64_encode($item["thumbnail"])])) : '/images/product.png'?>" data-lightbox="roadtrip">
                                                            <img src="<?=$item["thumbnail"] != "" && $item["thumbnail"] != null ? (Url::to(['/thongtin/filedinhkem/show-image','dirPath'=>base64_encode($item["thumbnail"])])) : '/images/product.png'?>" class="pull-left" style="width: 50px;height: 50px;"/>
                                                        </a>
                                                    </td>
                                                    <td class="" data-value="<?=$item["id"]?>">
                                                        <a href="<?= Url::to(['/sanpham/san-pham/input','id'=>$item["id"]]) ?>">
                                                            <?php echo $item["title"]?>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <?=$item["nameDMSP"]?>
                                                    </td>
                                                    <td>
                                                        <?=$item["nameLoaiSP"]?>
                                                    </td>
                                                </tr>
                                            <?php }
                                        } else { ?>
                                            <td> Không tìm thấy dữ liệu </td>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="pagination form-group">
                                <span class="float-left">Hiển thị</span>
                                <select class="form-control float-left" name="pageSize" id="pageSize">
                                    <option value="20" 	<?= $pageSize == 20 ? "selected" : "" ?>>20</option>
                                    <option value="40" <?= $pageSize == 40 ? "selected" : "" ?>>40</option>
                                    <option value="60" <?= $pageSize == 60 ? "selected" : "" ?>>60</option>
                                    <option value="80" <?= $pageSize == 80 ? "selected" : "" ?>>80</option>
                                    <option value="100" <?= $pageSize == 100 ? "selected" : "" ?>>100</option>
                                </select>
                                <span class="float-left"> dòng /trang</span>
                            </div>
                        </div>
                        <div class="col-md-7 text-right">
                            <?php
                            echo CustomPagination::widget([
                                'pagination' => $pages,
                            ]);
                            ?>
                        </div>                
                    </div>
                </div>
            </div>
            <?= Html::endForm() ?>
        </div>
    </section>	
</div>	
<script type="text/javascript"> 
    function pageClick(page){
        document.searchForm.action = '/sanpham/san-pham/index?page='+(page+1);
        document.searchForm.submit();
    }
</script>