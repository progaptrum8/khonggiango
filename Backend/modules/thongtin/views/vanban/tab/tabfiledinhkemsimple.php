<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<div class="row fileDinhKem<?=$idObject ?>" id="fileDinhKem<?= $idObject ?>">
<?= Html::beginForm(["/thongtin/vanban/savefiledinhkem"], 'post', ['id' => 'fileDinhKemForm' . $idObject, 'enctype' => 'multipart/form-data']) ?>
    <input name="idObject" type="hidden" value="<?= $idObject?>" />
    <input name="simple" type="hidden" value="<?= $simple?>" />
    <div class="col-sm-12">
        <table class="table table-striped table-bordered middle ">
            <thead>
            <th width="5%">STT</th>
            <th width="50%">Tên file đính kèm</th>
            <!--th width="20%">Chọn ban hành</th-->
            <th></th>
            </thead>
            <tbody>                                
                <?php
                if (count($fileDinhKem)>0) {
                    $stt = 1;                    
                    foreach ($fileDinhKem as $rows) {
                        $urlDownload=Url::to(['/thongtin/filedinhkem/download', 'maSo' => $rows->maSo]);
                        ?>
                        <tr>
                            <td class="text-center"><?= $stt++ ?></td>
                            <td width="50%">                                
                                <?php
                                if(strtolower(pathinfo($rows->fileName, PATHINFO_EXTENSION))=="pdf"){
                                ?>                                                                
                                <a class="hidden-reponsive" onclick="viewerInFormPDF('<?=Url::to(['/thongtin/filedinhkem/download', 'maSo' => $rows->maSo],true) ?>')">                                    
                                    <?=$rows->fileName ?>
                                </a>
                                <a class="show-reponsive" onclick="viewerPDF('<?=Url::to(['/thongtin/filedinhkem/download', 'maSo' => $rows->maSo],true) ?>')">                                    
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
                                ?>                                
                            </td>
                            <!--td class="text-center"><input type="checkbox" class="selectedFile" value="<?=$rows->idDK?>" data-idobject="<?php /*echo $idObject */ ?>" <?php /*echo $rows->chonBanHanh == 1 ?"checked":"" */ ?>></td-->
                            <td class="text-center">
                                <a class="btn btn-danger deleteFileDinhKemButton" data-id="<?= $idObject ?>" data-delete="<?= $rows->idDK ?>" data-simple="<?= $simple?>"><i class="fa fa-trash"></i>Xóa</a>
                            </td>
                        </tr>
                        <?php
                    }
                }else{
                    ?>
                        <tr>
                            <td class="text-center" colspan="3">Không có file đính kèm</td>                            
                        </tr>
                    <?php
                }
                ?>
                <tr>
                    <td class="text-center" colspan="3"><input id="fileUpload" name="fileUpload" class="form-control" data-id="<?= $idObject ?>" type="file" /></td>
                </tr>
            </tbody>
        </table>
    </div>
<?= Html::endForm() ?>
</div>