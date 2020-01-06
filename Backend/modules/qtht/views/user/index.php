<?php
use app\components\CustomPagination;
use yii\helpers\Html;
use yii\helpers\Url;
$this->registerJsFile(
    '@web/js/development/qtht/user.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Danh sách người dùng
    </h1>
    <div class="breadcrumb">        
        <a class="btn btn-danger pull-right mg-left" href="javascript:void(0);" id="deleteButton"><i class="fa fa-trash"></i>Xóa</a>
        <a class="btn btn-success pull-right mg-left" href="/qtht/user/input"><i class="fa fa-plus"></i>Thêm mới</a>
    </div>	
</section>
<!-- Main content -->
<section class="content">
    <div class="box box-default">
        <?= Html::beginForm(['/qtht/user/index'], 'post',['id' => 'searchUser','name'=>'searchForm']) ?>
        <div class="box-header with-border">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Tên người dùng:</label>
                        <input class="form-control" type="text" name="search" value="<?=$search?>">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Cơ quan:</label>
                        <input class="form-control" type="text" name="searchCoQuan" value="<?=$searchCoQuan?>">
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
                        <table id="listUser" class="table table-striped">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="selectedAll"></th>
                                    <th>STT</th>
                                    <th><?=$sort->link('fullname')?></th>
                                    <th>Tài khoản</th>
                                    <th>Chức danh</th>
                                    <th>Sử dụng</th>
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
                                    <td><a href="<?= Url::to(['/qtht/user/input','id'=>$item->id]) ?>"><?=$item->fullname ?></a></td>
                                    <td><?=$item->email ?></td>
                                    <td></td>
                                    <td><?=($item->status==0)?"Không":"Có" ?></td>
                                </tr>
                                <?php
                                }} else { ?>
                                
                                    <tr>
                                        <td colspan="5" class="text-center">Không tìm thấy dữ liệu</td>
                                    </tr>
                                <?php }?>
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
                            <option value="20" <?=$pageSize==20?"selected":""?>>20</option>
                            <option value="40" <?=$pageSize==40?"selected":""?>>40</option>
                            <option value="60" <?=$pageSize==60?"selected":""?>>60</option>
                            <option value="80" <?=$pageSize==80?"selected":""?>>80</option>
                            <option value="100" <?=$pageSize==100?"selected":""?>>100</option>
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
        <?=Html::endForm() ?>
    </div>
</section>		
<script type="text/javascript"> 
    function pageClick(page){
        document.searchForm.action = '/qtht/user/index?page='+(page+1);
        document.searchForm.submit();
    }
</script>