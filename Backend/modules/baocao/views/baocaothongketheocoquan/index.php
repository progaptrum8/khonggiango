<?php
use yii\helpers\Url;
use yii\helpers\Html;
$this->registerJsFile(
        '@web/js/development/baocao/baocaocommon.js', ['depends' => [\yii\web\JqueryAsset::className()]]
);
?>
<div class="listBaoCao">
    <section class="content-header">
        <h1>
            Báo cáo thống kê theo cơ quan
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <?= Html::beginForm(["/baocao/baocaothongketheocoquan/showview"], 'post', ['id' => 'formBaoCao','name' =>'formBaoCao','enctype' => 'multipart/form-data']) ?>
                <div class="row ">	 
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Ngày ban hành</label>
                            <div class="row-fuild">
                                <div class="col-md-5 padding-left col-5-l">
                                    <div class="input-group">
                                        <input id="datepickerFirst"  value="" name="tungay" class="form-control datepicker" type="text" value="<?= isset($tuNgay) ? \app\components\Common::dateUSToVNDate($tuNgay) : ""; ?>"/>
                                        <div class="input-group-addon datepickerFirst">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-2-c text-center">>></div>
                                <div class="col-md-5 padding-right col-5-l">
                                    <div class="input-group">
                                        <input id="datepickerEnd"  value="" name="denngay" class="form-control datepicker" type="text" value="<?= isset($denNgay) ? \app\components\Common::dateUSToVNDate($denNgay) : ""; ?>" />
                                        <div class="input-group-addon datepickerEnd">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Ngày chỉnh sửa</label>
                            <div class="row-fuild">
                                <div class="col-md-5 padding-left col-5-l">
                                    <div class="input-group">
                                        <input id="datepickerFirstOne"  value="" name="ngayChinhSuaTu" class="form-control datepicker" type="text" value="<?= isset($ngayChinhSuaTu) ? \app\components\Common::dateUSToVNDate($ngayChinhSuaTu) : ""; ?>"/>
                                        <div class="input-group-addon datepickerFirstOne">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-2-c text-center">>></div>
                                <div class="col-md-5 padding-right col-5-l">
                                    <div class="input-group">
                                        <input id="datepickerEndOne"  value="" name="ngayChinhSuaDen" class="form-control datepicker" type="text" value="<?= isset($ngayChinhSuaDen) ? \app\components\Common::dateUSToVNDate($ngayChinhSuaDen) : ""; ?>" />
                                        <div class="input-group-addon datepickerEndOne">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group mg-5">
                            <label class="control-label">Chọn tháng:</label>
                            <div class="radio monthArea">
                                <label>
                                    <input name="monthRadios" value="1" checked="" type="radio">
                                    1
                                </label>
                                <label class="pd-10">
                                    <input name="monthRadios" value="2" checked="" type="radio">
                                    2
                                </label>
                                <label class="pd-10">
                                    <input name="monthRadios" value="3" checked="" type="radio">
                                    3
                                </label>
                                <label class="pd-10">
                                    <input name="monthRadios" value="4" checked="" type="radio">
                                    4
                                </label>
                                <label class="pd-10">
                                    <input name="monthRadios" value="5" checked="" type="radio">
                                    5
                                </label>
                                <label class="pd-10">
                                    <input name="monthRadios" value="6" checked="" type="radio">
                                    6
                                </label>
                                <label class="pd-10">
                                    <input name="monthRadios" value="7" checked="" type="radio">
                                    7
                                </label>
                                <label class="pd-10">
                                    <input name="monthRadios" value="8" checked="" type="radio">
                                    8
                                </label>
                                <label class="pd-10">
                                    <input name="monthRadios" value="9" checked="" type="radio">
                                    9
                                </label>
                                <label class="pd-10">
                                    <input name="monthRadios" value="10" checked="" type="radio">
                                    10
                                </label>
                                <label class="pd-10">
                                    <input name="monthRadios" value="11" checked="" type="radio">
                                    11
                                </label>
                                <label class="pd-10">
                                    <input name="monthRadios" value="12" checked="" type="radio">
                                    12
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mg-5">
                            <label class="control-label">Chọn quý:</label>
                            <div class="radio">
                                <label>
                                    <input name="quarterRadios" value="1" checked="" type="radio">
                                    I
                                </label>
                                <label class="pd-10">
                                    <input name="quarterRadios" value="2" checked="" type="radio">
                                    II
                                </label>
                                <label class="pd-10">
                                    <input name="quarterRadios" value="3" checked="" type="radio">
                                    III
                                </label>
                                <label class="pd-10">
                                    <input name="quarterRadios" value="4" checked="" type="radio">
                                    IV
                                </label>
                            </div>
                        </div>
                    </div>	
                    <div  class="col-md-2">
                        <div class="form-group mg-5">
                            <label class="control-label">Chọn năm:</label>
                            <div class="radio">
                                <label>
                                    <input name="yearRadios" value="option1" checked="" type="radio">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">                            
                            <label class="control-label">Cơ quan ban hành</label>
                            <select id="selectCoQuan" class="form-control" name="selectCoQuan">
                                    <?php foreach ($listCoQuan as $itemCoQuan) { ?>
                                        <option value="<?= $itemCoQuan->id ?>"><?= $itemCoQuan->tenDonVi ?></option> 
                                    <?php }?>                                
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Đã xóa</label> 
                            <input name="daXoa" value="1" type="checkbox">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <input type="hidden" id="isExcel" name="isExcel" value="0">
                        <input type="hidden" id="isPrint" name="isPrint" value="0">
                        <a class="btn btn-info pull-right mg-left" id="exportButton"><i class="fa fa-file"></i> Xuất Excel</a>
                        <a class="btn btn-info pull-right mg-left" id="printButton" ><i class="fa fa-print"></i> In</a>
                        <a class="btn btn-primary pull-right mg-left" id="showButton"><i class="fa fa-eye"></i> Hiển thị</a>
                    </div>
                </div>                
                <?= Html::endForm() ?>
                <iframe class="col-md-12" style="overflow-x:visible; margin-top: 10px;" allowTransparency=true BORDER=0 scrolling=no FRAMEBORDER=no id="reportview" name="reportview" >
                </iframe>
            </div>
        </div>
    </section>
</div>