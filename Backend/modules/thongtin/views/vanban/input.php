<?php
use yii\widgets\ActiveForm;
use app\assets\AutocompleteAsset;
use yii\helpers\Json;
use yii\helpers\Url;
use app\components\Common;
use app\components\CommonUtil;
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
$this->registerJs($this->render('_script.js'));
$this->registerJs($this->render('_scriptUpdate.js'));
if(!is_null($dataFileDinhKem)){
    $this->registerJs("viewerInFormPDF('".Url::to(['/thongtin/filedinhkem/download', 'maSo' => $dataFileDinhKem->maSo],true)."');");
}
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php if(!$updateForm){
            echo "Thêm mới";
        }else{
            echo "Cập nhật";
        }?> văn bản
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="box box-default">
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <?php $form = ActiveForm::begin(['action' =>['/thongtin/vanban/save'],'method'=>'post','id' => 'formUpdate']);?>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Số, Ký hiệu văn bản (<font color="red">*</font>)</label>
                            <input class="form-control" type="text" name="soKyHieu" value="<?=(!is_null($data->soKyHieu))?$data->soKyHieu:"" ?>">
                            <?php
                            if($updateForm && $data->getErrors('soKyHieu')){
                            ?>
                            <label for="soKyHieu" generated="true" class="error"><?=$data->getErrors('soKyHieu')[0]?></label>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Lĩnh vực văn bản </label>
                            <select class="form-control" name="idLVVB">
                                <?php
                                foreach($linhVucVanBan as $item){
                                ?>
                                <option value="<?=$item->idLV?>" <?=(!is_null($data->idLVVB) && $data->idLVVB ==$item->idLV)?"selected":""?>><?=$item->name?></option>
                                <?php
                                }
                                ?>
                            </select>     
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Loại văn bản(<font color="red">*</font>)</label>
                            <input type="hidden" name="idLVB" value="<?=(!is_null($data->idLVB))?$data->idLVB:"" ?>" id="idLVB_id">
                            <input class="form-control" type="text" name="idLVB_name" id="idLVB_name" value="<?=(!is_null($data->loaiVanBan))?$data->loaiVanBan->name:"" ?>">
                            <?php
                            if($updateForm && $data->getErrors('idLVB')){
                            ?>
                            <label for="idLVB_name" generated="true" class="error"><?=$data->getErrors('idLVB')[0]?></label>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Cơ quan(<font color="red">*</font>)</label>
                            <input type="hidden" name="idCoQuan" value="<?=(!is_null($data->idCoQuan))?$data->idCoQuan:"" ?>" id="idCoQuan_id">
                            <input class="form-control" type="text" name="idCoQuan_name" id="idCoQuan_name" value="<?=(!is_null($data->coQuan))?$data->coQuan->tenDonVi:"" ?>">
                            <?php
                            if($updateForm && $data->getErrors('idCoQuan')){
                            ?>
                            <label for="idCoQuan_name" generated="true" class="error"><?=$data->getErrors('idCoQuan')[0]?></label>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Ngày ban hành(<font color="red">*</font>)</label>
                            <div class="input-group">
                                <input class="form-control datepicker" id="ngayBanHanh" name="ngayBanHanh" value="<?=(!is_null($data->ngayBanHanh))? Common::dateUSToVNDate($data->ngayBanHanh):"" ?>">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>                           
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Người ký(<font color="red">*</font>)</label>
                            <input type="hidden" name="idNguoiKy" value="" id="idNguoiKy_id">
                            <input class="form-control" type="text" name="idNguoiKy_name" id="idNguoiKy_name" value="<?=(!is_null($data->nguoiKy))?$data->nguoiKy:"" ?>">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-6 showHieuLuc" style="display:none">
                        <div class="form-group">
                            <label class="control-label">Ngày hiệu lực(<font color="red">*</font>)</label>
                            <div class="input-group">
                                <input class="form-control datepicker" name="ngayHieuLuc" value="<?=(!is_null($data->ngayHieuLuc))? Common::dateUSToVNDate($data->ngayHieuLuc):"" ?>">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>                           
                            </div>
                        </div>                                
                    </div>
                    <div class="col-md-6 showHieuLuc" style="display:none">
                        <?php
                        if($updateForm && (!is_null($data->trangThai))){
                            if($data->trangThai == CommonUtil::VANBAN_TRANGTHAI['DA_BAN_HANH']['value']){
                            ?>
                            <div class="form-group">
                                <label class="control-label"></label>
                                <div class="input-group">
                                    <label class="control-label">Đã hết hiệu lực </label>
                                    <input type="checkbox" name="isHetHieuLuc" value="1" <?=(!is_null($data->isHetHieuLuc))?((int)$data->isHetHieuLuc==1?"checked":""):"" ?>>
                                </div>
                            </div>
                            <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Trích yếu (<font color="red">*</font>)</label>
                            <textarea class="form-control" name="trichYeu"><?=(!is_null($data->trichYeu))?Common::reLineEndString($data->trichYeu):"" ?></textarea>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Hỏa tốc </label>
                            <input type="checkbox" name="isHoaToc" value="1" <?=(!is_null($data->isHoaToc))?((int)$data->isHoaToc==1?"checked":""):"" ?>>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <input type="hidden" id="idFileObject" name="idFileObject" value="<?=$idFileObject?>">
                    <input type="hidden" id="id" name="id" value="<?=(!is_null($data->idVanBan))?$data->idVanBan:"" ?>">
                    <?php ActiveForm::end() ?>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">File đính kèm</label>  
                            <input data-url="<?=Url::to(['/thongtin/vanban/tabfiledinhkem','id'=>$idFileObject,'simple'=>1])?>" id="fileDinhKemShow" type="hidden">
                            <div id="autoShowHideDiv<?=$idFileObject?>" class="showView">                    
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-primary pull-right mg-left" type="submit" form="formUpdate">Lưu</button>
                        <button class="btn btn-info pull-right" type="button" id="goBackButton" data-url="<?=Url::to(['/thongtin/vanban/index','idType'=>(!is_null($data->trangThai))?$data->trangThai:CommonUtil::VANBAN_TRANGTHAI['CHO_BIEN_TAP']['value']])?>">Quay lại</button>
                    </div>
                    <div class="clearfix"></div>
                </div>                
                <div class="col-md-6 hidden-reponsive">                    
                    <div id="contentInFormPDF" style="height: 450px; border: 1px solid #000;text-align: center">
                        <h3>Khung xem file PDF</h3>
                    </div>                    
                </div>                
            </div>            
        </div>
    </div>	
</section>
