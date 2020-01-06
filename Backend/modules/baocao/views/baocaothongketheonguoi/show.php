<?php
use app\components\CustomPagination;
use yii\helpers\Html;
use yii\helpers\Url;
use app\components\Common;
use app\components\CommonUtil;
use app\assets\AppAsset;
use app\models\VbVanban;
AppAsset::register($this);
$this->registerJsFile(
        '@web/js/development/baocao/baocaocommon.js', ['depends' => [\yii\web\JqueryAsset::className()]]
);
?>
<?= Html::beginForm(['/baocao/baocaothongketheonguoi/showview'], 'post',['id' => 'formShowviewReport','name' => 'formShowviewReport']) ?>                
<!-- Main content -->
<style>
    .col-md-5{
        width: 40%;
        display: inline-block;
        float: left;
    }
    .col-md-7{
        width: 60%;
        display: inline-block;
        float: left;
    }
    .text-right{
        text-align: right;
    }
    ul.pagination {
        display: inline-block;
        padding: 0;
        margin: 0;
    }

    ul.pagination li {display: inline;}

    ul.pagination li a {
        color: black;
        padding: 0px 8px;
        text-decoration: none;
        transition: background-color .3s;
    }
    ul.pagination li.disabled {
        display: none;
    }
    ul.pagination li.active {
        background-color: #ddd;
        color: white;
    }
    table{
        border-spacing: 0;
        border-collapse: collapse;
    }
    .table-bordered,.table-bordered tr,.table-bordered td,.table-bordered th{
        border: 1px solid #000;
    }    
    ul.pagination li a:hover:not(.active) {background-color: #ddd;}
</style>
<section class="content">
    <div class="box box-default">
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-reponsive">
                        <table id="listDanhMuc" class="table table-striped table-bordered middle">
                            <thead>
                                <tr style="background-color:#cccccc">
                                    <td colspan="10">
                                        <div class="col-md-5">
                                            <div class="pagination form-group">
                                                <span class="float-left">Hiển thị</span>
                                                <select class="form-control float-left" name="pageSize" id="pageSize" onchange="submitForm();">
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
                                    </td>
                                </tr>
                                <tr style="background-color:#cccccc">
                                    <th rowspan="2" width="2%" align="center"><strong>STT</strong></th>
                                    <th colspan="9" align="center"><strong>Văn bản</strong></th>
                                </tr>
                                <tr style="background-color:#cccccc">
                                        <th width="9%" align="center">Số ký hiệu</th>
                                        <th width="8%" align="center">Cơ quan ban hành</th>
                                        <th width="8%" align="center">Ngày ban hành</th>
                                        <th width="32%" align="center">Trích yếu nội dung</th>
                                        <th width="8%" align="center">Ngày hiệu lực</th>
                                        <th width="8%" align="center">Người ký</th>
                                        <th width="8%" align="center">Ngày duyệt</th>
                                        <th width="8%" align="center">Người tiếp nhận</th>
                                        <th width="8%" align="center">Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(count($data)>0){
                                    $i=$pages->page*$pageSize+1;
                                    foreach($data as $item){
                                        $item = VbVanban::findOne($item);
                                    ?>
                                    <tr>
                                        <td class="text-center"><?=$i++?></td>
                                        <td class="text-center"><?=$item->soKyHieu?></td>
                                        <td class="text-center"><?=$item->coQuan->tenDonVi?></td>
                                        <td class="text-center"><?= Common::dateUSToVNDate($item->ngayBanHanh)?></td>
                                        <td class="text-center"><?=Common::reLineEndString($item->trichYeu)?></td>
                                        <td class="text-center"><?= Common::dateUSToVNDate($item->ngayHieuLuc)?></td>
                                        <td class="text-center"><?=$item->nguoiKy?></td>
                                        <td class="text-center"><?=Common::dateUSToVNDate($item->ngayDuyet)?></td>
                                        <td class="text-center"><?=$item->nguoiTiepNhan->fullname?></td>
                                        <td class="text-center">
                                            <?php
                                            if($item->isDeleted !=1){
                                            if($item->trangThai == CommonUtil::VANBAN_TRANGTHAI['CHO_BIEN_TAP']['value']){
                                                echo CommonUtil::VANBAN_TRANGTHAI['CHO_BIEN_TAP']['name'];
                                            }
                                            if($item->trangThai == CommonUtil::VANBAN_TRANGTHAI['CHO_BAN_HANH']['value']){
                                                echo CommonUtil::VANBAN_TRANGTHAI['CHO_BAN_HANH']['name'];
                                            }
                                            if($item->trangThai == CommonUtil::VANBAN_TRANGTHAI['DA_BAN_HANH']['value']){
                                                echo CommonUtil::VANBAN_TRANGTHAI['DA_BAN_HANH']['name'];
                                            }
                                            }else{
                                                echo "Đã xóa";
                                            }
                                            ?>
                                        </td>                                     
                                    </tr>
                                    <?php
                                    }
                                }else{
                                    ?>
                                    <tr>
                                        <td colspan="10" class="text-center">Không tìm thấy dữ liệu</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>                               
            </div>
        </div>        
    </div>
</div>	
</section>
<input type="hidden" name="tungay" value="<?=$tuNgay?>">
<input type="hidden" name="denngay" value="<?=$denNgay?>">
<input type="hidden" name="ngayChinhSuaTu" value="<?=$ngayChinhSuaTu?>">
<input type="hidden" name="ngayChinhSuaDen" value="<?=$ngayChinhSuaDen?>">
<input type="hidden" name="daXoa" value="<?=((int) $daXoa == 1 ? 1 : 0)?>">
<input type="hidden" name="selectNguoiTiepNhan" value="<?=$selectNguoiTiepNhan?>" />
<?=Html::endForm() ?>
<p id="lasttext"></p>
<script type="text/javascript">
    var iframeElement = window.parent.document.getElementById('reportview');
    iframeElement.style.height = ""+(document.getElementById("lasttext").offsetTop)+"px";
    iframeElement.width = "100%";    
    function pageClick(page){
        document.formShowviewReport.action = '/baocao/baocaothongketheonguoi/showview?page='+(page+1);
        document.formShowviewReport.submit();
    }    
    function submitForm(){
        document.formShowviewReport.action = '/baocao/baocaothongketheonguoi/showview';
        document.formShowviewReport.submit();
    }
</script>