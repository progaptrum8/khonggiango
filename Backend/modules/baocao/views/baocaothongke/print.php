<?php
use app\components\CustomPagination;
use yii\helpers\Html;
use yii\helpers\Url;
use app\components\Common;
use app\components\CommonUtil;
use app\models\VbVanban;
?>
<style>
    table{
        border-spacing: 0;
        border-collapse: collapse;
    }
    .table-bordered,.table-bordered tr,.table-bordered td,.table-bordered th{
        border: 1px solid #000;
    }
</style>
<!-- Main content -->
<section class="content">
    <div class="box box-default">
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-reponsive">
                        <table id="listDanhMuc" class="table table-striped table-bordered middle">
                            <thead>
                                <tr style="background-color:#cccccc">
                                    <th rowspan="2" width="2%" align="center"><strong>STT</strong></th>
                                    <th colspan="9" align="center"><strong>Văn bản</strong></th>
                                    <th rowspan="2" width="3%" align="center"><strong>Ghi chú</strong></th>
                                </tr>
                                <tr style="background-color:#cccccc">
                                        <th width="9%" align="center">Số ký hiệu</th>
                                        <th width="8%" align="center">Cơ quan ban hành</th>
                                        <th width="8%" align="center">Ngày ban hành</th>
                                        <th width="32%" align="center">Trích yếu nội dung</th>
                                        <th width="8%" align="center">Ngày hiệu lực</th>
                                        <th width="8%" align="center">Người ký</th>
                                        <th width="8%" align="center">Ngày tiếp nhận</th>
                                        <th width="8%" align="center">Người tiếp nhận</th>
                                        <th width="8%" align="center">Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(count($data)>0){
                                    $i=1;
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
                                        <td class="text-center"><?=Common::dateUSToVNDate($item->ngayTiepNhan)?></td>
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
                                        <td class="text-center"></td>                                        
                                    </tr>
                                    <?php
                                    }
                                }else{
                                    ?>
                                    <tr>
                                        <td colspan="11" class="text-center">Không tìm thấy dữ liệu</td>
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
<script type="text/javascript">
    print();
</script>