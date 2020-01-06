<?php
use app\components\Common;
use app\components\CommonUtil;
?>
<table class="table table-striped table-bordered middle">
    <thead>
        <tr>
            <th>#</th>
            <th nowrap="nowrap">Ngày</th>
            <th nowrap="nowrap">Hành động</th>
            <th nowrap="nowrap">Người thực hiện</th>			
        </tr>
    </thead>
    <tbody>
        <?php
        if(count($listLichSu)>0){
            $stt = 1;
            foreach($listLichSu as $item){
            ?>
            <tr> 
                <td><?=$stt++?></td>
                <td nowrap="nowrap"><?=Common::datetimeUSToVNDatetime($item->ngayChuyen)?></td>                
                <td nowrap="nowrap">
                    <?php
                    if($item->trangThai == CommonUtil::VANBAN_PL_TRANGTHAI['TIEP_NHAN']['value']){
                        echo CommonUtil::VANBAN_PL_TRANGTHAI['TIEP_NHAN']['name'];
                    }
                    if($item->trangThai == CommonUtil::VANBAN_PL_TRANGTHAI['HUY_BAN_HANH']['value']){
                        echo CommonUtil::VANBAN_PL_TRANGTHAI['HUY_BAN_HANH']['name'];
                    }
                    if($item->trangThai == CommonUtil::VANBAN_PL_TRANGTHAI['BAN_HANH']['value']){
                        echo CommonUtil::VANBAN_PL_TRANGTHAI['BAN_HANH']['name'];
                    }
                    if($item->trangThai == CommonUtil::VANBAN_PL_TRANGTHAI['CAP_NHAT']['value']){
                        echo CommonUtil::VANBAN_PL_TRANGTHAI['CAP_NHAT']['name'];
                    }
                    ?>
                </td>
                <td nowrap="nowrap"><?=$item->nguoiChuyen->fullname?></td>
            </tr>
            <?php
            }
        }else{
        ?>
        <tr> 
            <td colspan="4" class="text-center">Không có lịch sử luân chuyển</td>	
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
