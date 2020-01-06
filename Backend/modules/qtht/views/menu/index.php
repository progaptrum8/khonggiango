<?php
use app\components\CustomPagination;
use yii\helpers\Html;
use yii\helpers\Url;
$this->registerJsFile(
    '@web/js/development/qtht/menu.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Danh sách Menu
    </h1>
    <div class="breadcrumb">
        <a class="btn btn-danger pull-right mg-left" href="javascript:void(0);" id="deleteButton"><i class="fa fa-trash"></i>Xóa</a>
        <a class="btn btn-success pull-right mg-left" href="/qtht/menu/input"><i class="fa fa-plus"></i>Thêm mới</a>
    </div>	
</section>
<!-- Main content -->
<section class="content">
    <div class="box box-default">
        <?= Html::beginForm(['/qtht/menu/index'], 'post',['id' => 'searchMenu','name'=>'searchForm']) ?>
        <div class="box-header with-border">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Tên menu:</label>
                        <input class="form-control" type="text" name="searchName" value="<?=$searchName?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Cấp menu cha:</label>
                        <input class="form-control" type="text" name="searchParentName" value="<?=$searchParentName?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Liên kết:</label>
                        <input class="form-control" type="text" name="searchRoute" value="<?=$searchRoute?>">
                    </div>
                </div>         
                <div class="col-md-12">
                    <button class="btn btn-primary pull-right mg-left" type="submit"><i class="fa fa-search"></i> Tìm kiếm</button>
                </div>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-reponsive">
                        <table id="listMenu" class="table table-striped">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="selectedAll"></th>
                                    <th>STT</th>
                                    <th><?=$sort->link('name')?></th>
                                    <th><?=$sort->link('parent')?></th>
                                    <th><?=$sort->link('route')?></th>
                                    <th><?=$sort->link('order')?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(count($data)>0){
                                $i=$pages->page*$pageSize;
                                foreach($data as $item){
                                    $i++;
                                ?>
                                <tr>
                                    <td><input type="checkbox" name="selected[]" value="<?=$item->id?>"></td>
                                    <td><?=$i ?></td>
                                    <td><a href="<?= Url::to(['/qtht/menu/input','id'=>$item->id]) ?>"><?=$item->name ?></a></td>
                                    <td><?=($item->menuParent)?$item->menuParent->name:"" ?></td>
                                    <td><?=$item->route ?></td>
                                    <td><?=(int)$item->order ?></td>
                                </tr>
                                <?php
                                }}else{
                                    ?>
                                    <tr>
                                        <td colspan="6" class="text-center">Không tìm thấy dữ liệu</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="pagination form-group">
                        <span class="float-left">Hiển thị</span>
                        <select class="form-control float-left" name="pageSize" id="pageSize">
                            <option value="20" <?=$pageSize==20?"selected":""?>>20</option>
                            <option value="40" <?=$pageSize==40?"selected":""?>>40</option>
                            <option value="60" <?=$pageSize==60?"selected":""?>>60</option>
                            <option value="80" <?=$pageSize==80?"selected":""?>>80</option>
                            <option value="100" <?=$pageSize==100?"selected":""?>>100</option>
                        </select>
                        <span class="float-left"> dòng /trang</span>
                    </div>
                </div>
                <div class="col-md-8 text-right">
                    <?php
                    echo CustomPagination::widget([
                        'pagination' => $pages,
                    ]);
                    ?>
                </div>                
            </div>
        </div>
        <?=Html::endForm() ?>
    </div>
</section>
<script type="text/javascript"> 
    function pageClick(page){
        document.searchForm.action = '/qtht/menu/index?page='+(page+1);
        document.searchForm.submit();
    }
</script>