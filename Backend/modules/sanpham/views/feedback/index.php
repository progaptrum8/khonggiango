<?php
use yii\helpers\Url;
use yii\helpers\Html;
use app\components\CustomPagination;

$this->registerJsFile(
        '@web/js/sanpham/product.js', ['depends' => [\yii\web\JqueryAsset::className()]]
);
$this->title = 'Feedback';
?>
<div class="listFeedback">
    <section class="content-header">
        <h1>
            Danh sách đánh giá sản phẩm
        </h1>
        <div class="breadcrumb">
            <a class="btn btn-danger pull-right mg-left" id="deleteFeedBack" ><i class="fa fa-trash"></i> Xóa</a>
            <a class="btn btn-success pull-right mg-left" id="addDanhMucSP" href="/sanpham/feedback/input"><i class="fa fa-plus"></i> Thêm mới</a>
        </div>	
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box box-default">
            <?= Html::beginForm(['/sanpham/feedback/index'], 'post', ['id' => 'searchForm','name'=>'searchForm']) ?>
            <div class="box-header with-border">
                <div class="row">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="danhMucSP">Danh mục sản phẩm:</label>
                            <select class="form-control" name="danhMucSP" id="danhMucSP">
                                <option value="0">Chọn danh mục sản phẩm cần tìm kiếm</option>
                                <?php foreach ($danhMucSP as $value){ ?>
                                    <option <?=$value['id'] == $danhMucSearch ? 'selected' : ''?> value="<?=$value['id']?>"><?=$value['name']?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="productType">Loại sản phẩm:</label>
                            <select class="form-control" name="productType" id="productType">
                                <option value="0">Chọn loại sản phẩm cần tìm kiếm</option>
                                <?php foreach ($productTypes as $value){ ?>
                                    <option <?=$value['id'] == $productTypeSearch ? 'selected' : ''?> value="<?=$value['id']?>"><?=$value['name']?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="status">Công khai:</label>
                            <select class="form-control" name="status" id="status">
                                <option <?=$status == 2 ? 'selected' : ''?> value="2">Tất cả</option>
                                <option <?=$status == 0 ? 'selected' : ''?> value="0">Chưa công khai</option>
                                <option <?=$status == 1 ? 'selected' : ''?> value="1">Đã công khai</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="input-group">
                                <input class="form-control" placeholder="Nhập tên sản phẩm/danh mục sản phẩm/loại sản phẩm để tìm kiếm" type="text" name="search" value="<?=$search?>">
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
                                            <th>Người đánh giá</th>
                                            <th>Email</th>
                                            <th>Đánh giá</th>
                                            <th>Ngày đánh giá</th>
                                            <th>Được public</th>
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
                                                        <a href="<?= Url::to(['/sanpham/feedback/input','id'=>$item["id"]]) ?>">
                                                            <?php echo $item["title"]?>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <?=$item["fullname"]?>
                                                    </td>
                                                    <td>
                                                        <?=$item["email"]?>
                                                    </td>
                                                    <td>
                                                        <?=$item["comment"]?>
                                                    </td>
                                                    <td>
                                                        <?=$item["dateComment"]?>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" <?=$item['status'] == 1 ? 'checked' : ''?> class="isPublicComment" onclick="sanPhamByEvent.changeStatus(<?=$item["id"]?>, this);">
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
        document.searchForm.action = '/sanpham/feedback/index?page='+(page+1);
        document.searchForm.submit();
    }
</script>