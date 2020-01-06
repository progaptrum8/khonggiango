<?php
use app\components\CustomPagination;
use yii\helpers\Html;
use yii\helpers\Url;
use app\components\Common;
use app\components\CommonUtil;
use app\assets\AutocompleteAsset;
use yii\helpers\Json;
use app\models\VbVanban;
AutocompleteAsset::register($this);
$opts = Json::htmlEncode([
    'listLoaiVanBan' => $loaiVanBan,
    'listCoQuan' => $coQuan,
    'listNguoiKy' => $nguoiKy,
]);
$this->registerJsFile(
    '@web/js/development/thongtin/vanban.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
$this->registerJsFile(
    '@web/js/development/thongtin/filedinhkem.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
$this->registerJs("var _opts = $opts;");
$this->registerJs("$(element.search).on('keyup', mark); $(element.search).trigger('keyup');");
$this->registerJs($this->render('_script.js'));
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Danh sách văn bản <?php
            foreach($listTypes as $itemType){
                if($idType==$itemType['value']){
                    echo $itemType['namelower'];
                }         
            }?>   
    </h1>	
    <?php
    if($idType != CommonUtil::VANBAN_TRANGTHAI['DA_BAN_HANH']['value']){
        if($daXoa!=1){        
        ?>        
        <div class="breadcrumb">        
            <a class="btn btn-success pull-right mg-left" href="javascript:void(0);" id="banHanhVanBanMultiButton"><i class="fa fa-link"></i> Ban hành văn bản</a>
        </div>
        <?php
        }
    }
    ?>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-default">        
        <div class="box-header with-border">
            <div class="row">
                <?= Html::beginForm(['/thongtin/vanban/index','idType'=>$idType], 'post',['id' => 'searchDanhMuc','name'=>'searchForm']) ?>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Trạng thái văn bản:</label>
                        <select class="form-control" name="selectTypeDanhMuc" id="selectTypeDanhMuc">
                            <?php
                            foreach($listTypes as $itemType){
                            ?>            
                            <option value="<?= Url::to(['/thongtin/vanban/index','idType'=>$itemType['value']]) ?>" data-id="<?=$itemType['value']?>" <?=$idType==$itemType['value']?"selected":""?>><?=$itemType['name']?></option>
                            <?php            
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Số, ký hiệu VB:</label>
                        <input class="form-control" name="searchSoKyHieu" value="<?=$searchSoKyHieu?>" type="text">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Trích yếu:</label>
                        <input class="form-control" type="text" name="search" value="<?=$search?>">
                    </div>
                </div>      
            </div>                    
            <div id="optionSearchArea" class="row" style="display: none;">                
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Cơ quan:</label>
                        <input type="hidden" name="searchCoQuanId" value="<?=$searchCoQuanId ?>" id="idCoQuan_id">
                        <input class="form-control" type="text" name="searchCoQuan" id="idCoQuan_name" value="<?=$searchCoQuan?>">                        
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Người ký:</label>
                        <input type="hidden" name="searchNguoiKyId" value="<?=$searchNguoiKyId ?>" id="idNguoiKy_id">
                        <input class="form-control" type="text" name="searchNguoiKy" id="idNguoiKy_name" value="<?=$searchNguoiKy ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Loại văn bản:</label>
                        <input type="hidden" name="idLVB" value="<?=$idLVB?>" id="idLVB_id">
                        <input class="form-control" type="text" name="idLVB_name" id="idLVB_name" value="<?=$idLVB_name?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Lĩnh vực văn bản:</label>
                        <select class="form-control" name="idLVVB">
                            <option value="" selected>-- Chọn lĩnh vực văn bản--</option>
                            <?php
                            foreach($linhVucVanBan as $item){
                            ?>
                            <option value="<?=$item->idLV?>" <?=(($idLVVB ==$item->idLV)?"selected":"")?>><?=$item->name?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>                               
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Ngày ban hành</label>
                        <div class="row-fuild">
                            <div class="col-md-5 padding-left col-5-l">
                                <div class="input-group">
                                    <input value="<?=$ngayBanHanhTu?>" name="ngayBanHanhTu" class="form-control datepicker" maxlength="10" type="text">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-2-c text-center">&gt;&gt;</div>
                            <div class="col-md-5 padding-right col-5-l">
                                <div class="input-group">
                                    <input value="<?=$ngayBanHanhDen?>" name="ngayBanHanhDen" class="form-control datepicker" maxlength="10" type="text">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Ngày tạo</label>
                        <div class="row-fuild">
                            <div class="col-md-5 padding-left col-5-l">
                                <div class="input-group">
                                    <input value="<?=$ngayTiepNhanTu?>" name="ngayTiepNhanTu" class="form-control datepicker" maxlength="10" type="text">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-2-c text-center">&gt;&gt;</div>
                            <div class="col-md-5 padding-right col-5-l">
                                <div class="input-group">
                                    <input value="<?=$ngayTiepNhanDen?>" name="ngayTiepNhanDen" class="form-control datepicker" maxlength="10" type="text">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Ngày hiệu lực</label>
                        <div class="row-fuild">
                            <div class="col-md-5 padding-left col-5-l">
                                <div class="input-group">
                                    <input value="<?=$ngayHieuLucTu?>" name="ngayHieuLucTu" class="form-control datepicker" maxlength="10" type="text">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-2-c text-center">&gt;&gt;</div>
                            <div class="col-md-5 padding-right col-5-l">
                                <div class="input-group">
                                    <input value="<?=$ngayHieuLucDen?>" name="ngayHieuLucDen" class="form-control datepicker" maxlength="10" type="text">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Ngày chỉnh sửa</label>
                        <div class="row-fuild">
                            <div class="col-md-5 padding-left col-5-l">
                                <div class="input-group">
                                    <input value="<?=$ngayChinhSuaTu?>" name="ngayChinhSuaTu" class="form-control datepicker" maxlength="10" type="text">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-2-c text-center">&gt;&gt;</div>
                            <div class="col-md-5 padding-right col-5-l">
                                <div class="input-group">
                                    <input value="<?=$ngayChinhSuaDen?>" name="ngayChinhSuaDen" class="form-control datepicker" maxlength="10" type="text">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                if($idType != CommonUtil::VANBAN_TRANGTHAI['DA_BAN_HANH']['value']){
                ?>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Đã xóa</label> 
                        <input name="daXoa" value="1" type="checkbox" <?=$daXoa==1?"checked":""?>>
                    </div>
                </div>
                <?php
                }
                ?>
                <div class="col-md-12" style="margin-top: 5px;">
                    <a id="searchOptionDisplay" class="pull-left" isclick="1" style="cursor: pointer;">
                        <span>Hiển thị thêm tùy chọn tìm kiếm</span>
                    </a>
                    <button class="btn btn-primary pull-right mg-left" type="submit"><i class="fa fa-search"></i> Tìm kiếm</button>
                </div>                
                <?=Html::endForm() ?>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-reponsive">
                        <table id="listDanhMuc" class="table table-striped table-bordered middle">
                            <thead>
                                <tr style="background-color:#cccccc">
                                    <th><input type="checkbox" id="selectedAll"></th>
                                    <th>STT</th>                                    
                                    <th>Văn bản</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(count($data)>0){
                                    $i=$pages->page*$pageSize;
                                    foreach($data as $item){
                                        $item = VbVanban::findOne($item);
                                        $i++;
                                    ?>
                                    <tr>
                                        <td class="text-center"><input type="checkbox" name="selected[]" value="<?=$item->idVanBan?>"></td>
                                        <td class="text-center"><?=$i ?></td>
                                        <td class="col-md-8">
                                            <p><b><?=$item->soKyHieu." - ". Common::dateUSToVNDate($item->ngayBanHanh)." - ".$item->coQuan->tenDonVi?></b></p>
                                            <p class="markspan"><?=Common::reLineEndString($item->trichYeu)?></p>
                                            <a type="button" class="showViewChiTiet" onclick="showHideTab('<?=$item->idVanBan?>', '<?=Url::to(['/thongtin/vanban/tabchitiet','id'=>$item->idVanBan])?>', 'linkChiTiet')">
                                                <i class="fa fa-info"></i><span id="linkChiTiet<?=$item->idVanBan?>"> Chi tiết</span>
                                            </a>
                                            <a type="button" class="showViewLichSu mg-left" onclick="showHideTab('<?=$item->idVanBan?>', '<?=Url::to(['/thongtin/vanban/tablichsu','id'=>$item->idVanBan])?>', 'linkLichSu')">
                                                <i class="fa fa-list-ul"></i><span id="linkLichSu<?=$item->idVanBan?>"> Lịch sử cập nhật</span>
                                            </a>
                                            <a type="button" class="showViewFileDinhKem mg-left" onclick="showHideTab('<?=$item->idVanBan?>', '<?=Url::to(['/thongtin/vanban/tabfiledinhkem','id'=>$item->idVanBan])?>', 'linkFileDinhKem')"> 
                                                <i class="fa fa-file-image-o"></i><span id="linkFileDinhKem<?=$item->idVanBan?>"> File đính kèm</span>
                                            </a>
                                            <div id="autoShowHideDiv<?=$item->idVanBan?>" class="showView">                         
                                            </div>
                                        </td>
                                        <td>
                                            <?php
                                            if($item->isDeleted == 0){
                                                ?>
                                                <a href="<?= Url::to(['/thongtin/vanban/input','id'=>$item->idVanBan]) ?>"><i class="fa fa-edit"></i> Cập nhật</a></br>
                                                <?php
                                                if($item->trangThai == CommonUtil::VANBAN_TRANGTHAI['DA_BAN_HANH']['value']){
                                                ?>
                                                    <a data-id="<?= $item->idVanBan?>" class="huyBanHanhButton"><i class="fa fa-unlink"></i> Hủy ban hành văn bản</a></br>
                                                <?php
                                                }else{
                                                ?>
                                                    <a data-id="<?= $item->idVanBan?>" class="deleteButton"><i class="fa fa-trash"></i> Xóa</a></br>
                                                    <a data-id="<?= $item->idVanBan?>" class="banHanhButton"><i class="fa fa-link"></i> Ban hành văn bản</a></br>
                                                <?php
                                                }
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                }else{
                                    ?>
                                    <tr>
                                        <td colspan="5" class="text-center">Không tìm thấy dữ liệu</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="pagination form-group">
                        <span class="float-left">Hiển thị</span>
                        <select class="form-control float-left" name="pageSize" id="pageSize" form="searchDanhMuc">
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
    </div>
</div>	
</section>
<script type="text/javascript"> 
    function pageClick(page){
        document.searchForm.action = '/qtht/chucnang/index?page='+(page+1);
        document.searchForm.submit();
    }
</script>