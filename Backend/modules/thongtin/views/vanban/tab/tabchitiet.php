<?php
use yii\helpers\Url;
use app\components\Common;
?>
<table class="table table-striped table-bordered middle">
    <tbody>
        <tr> 
            <td style="color:blue;width:12%;" nowrap="nowrap">Số, ký hiệu VB</td> 
            <td ><?= $item->soKyHieu ?></td> 
        </tr>
        <tr>             
             <td style="color:blue;width:12%;" nowrap="nowrap">Ngày ban hành</td> 
             <td ><?= Common::dateUSToVNDate($item->ngayBanHanh) ?></td>
         </tr>
         <tr>             
             <td style="color:blue;width:12%;" nowrap="nowrap">Ngày hiệu lực</td> 
             <td ><?= Common::dateUSToVNDate($item->ngayHieuLuc) ?><?=((int)$item->isHetHieuLuc ==1)?" (Đã hết hiệu lực)":""?></td>
         </tr>
        <tr> 
            <td style="color:blue;width:12%;" nowrap="nowrap">Người ký</td> 
            <td ><?= $item->nguoiKy ?></td>
        </tr>
        <tr>             
            <td style="color:blue;width:12%;" nowrap="nowrap">Trích yếu</td> 
            <td ><?= Common::reLineEndString($item->trichYeu) ?></td>
        </tr>
        <tr>
            <td style="color:blue;width:12%;" nowrap="nowrap">Cơ quan ban hành</td> 
            <td ><?= $item->coQuan->tenDonVi ?></td> 
        </tr>
        <tr>
            <td style="color:blue;width:12%;" nowrap="nowrap">Lĩnh vực văn bản</td> 
            <td ><?= ($item->linhVucVanBan!=null)?$item->linhVucVanBan->name:"" ?></td>
        </tr>
        <tr>
            <td style="color:blue;width:12%;" nowrap="nowrap">Loại văn bản</td> 
            <td ><?= $item->loaiVanBan->name ?></td>
        </tr>
        <tr>
            <td style="color:blue;width:12%;" nowrap="nowrap">Người tạo văn bản</td> 
            <td ><?= $item->userCreateName ?></td>
        </tr>      
        <tr>
            <td style="color:blue;width:12%;" nowrap="nowrap">File đính kèm</td> 
            <td>
                <?php
                foreach ($item->fileDinhKem as $rows) {
                    $urlDownload=Url::to(['/thongtin/filedinhkem/download', 'maSo' => $rows->maSo]);
                    if(strtolower(pathinfo($rows->fileName, PATHINFO_EXTENSION))=="pdf"){
                    ?>                                                                
                    <a onclick="viewerPDF('<?=Url::to(['/thongtin/filedinhkem/download', 'maSo' => $rows->maSo],true) ?>')">                                    
                        <?=$rows->fileName ?>
                    </a>
                    <a href="<?= $urlDownload ?>">
                        <i class="fa fa-download"></i>
                    </a>
                    <?php
                    }else{
                    ?>
                    <a href="<?= $urlDownload ?>">                                    
                        <?=$rows->fileName ?><i class="fa fa-download"></i>
                    </a>
                    <?php
                    }
                }
                ?>
            </td>
        </tr>
    </tbody>
</table>

