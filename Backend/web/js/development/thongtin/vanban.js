var vanBanEle = {
    searchDanhMucForm:"#searchDanhMuc",
    pageSize:"#pageSize",
    selectItemCheckboxAll:"#selectedAll",
    selectItemCheckboxName:"selected[]",
    deleteButton:".deleteButton",
    huyBanHanhButton:".huyBanHanhButton",
    banHanhButton:".banHanhButton",
    tableListDanhMuc:"#listDanhMuc",
    formDanhMucUpdate:"#formUpdate",
    selectTypeDanhMuc:'#selectTypeDanhMuc',
    ngayBanHanh:"input[name=ngayBanHanh]",
    ngayHieuLuc:"input[name=ngayHieuLuc]",
    searchOptionDisplay:"#searchOptionDisplay",
    optionSearchArea:"#optionSearchArea",
    banHanhVanBanMultiButton:"#banHanhVanBanMultiButton",
    goBackButton:"#goBackButton"
};
var vanBanEvent = {
    init:function(){
        this.pageSizeChange();
        this.toogleSelectCheckBoxClick();
        this.deleteClick();
        this.banHanhClick();
        this.banHanhVanBanMultiClick();
        this.huyBanHanhClick();
        this.validationForm();
        this.changeDanhMuc();
        this.goBackButtonClick();
        this.changeNgayBanHanh();
        this.searchOptionDisplay();
    },
    changeNgayBanHanh:function(){
        //$(vanBanEle.ngayBanHanh).val(formatShortDate(new Date()));
        //$(vanBanEle.ngayHieuLuc).val(formatShortDate(new Date()));
        $(vanBanEle.ngayBanHanh).on("change",function(){
            $(vanBanEle.ngayHieuLuc).val($(this).val());
        });
    },
    goBackButtonClick:function(){
        $(vanBanEle.goBackButton).on("click",function(){
             window.location.href=$(this).data("url");
        });
    },
    changeDanhMuc:function(){
        $(vanBanEle.selectTypeDanhMuc).on("change",function(){
            window.location.href = $(vanBanEle.selectTypeDanhMuc).val();
        });
    },
    validationForm: function () {
        $(vanBanEle.formDanhMucUpdate).validate({
            rules: {
                soKyHieu: {
                    required: true,
                    maxlength:255                    
                },
                idLVB: {
                    required: true
                },
                ngayBanHanh: {
                    required: true
                },
                ngayHieuLuc: {
                    required: true
                },
                trichYeu: {
                    required: true,
                    maxlength:2048
                },
                idCoQuan: {
                    required: true
                },
                idNguoiKy_name: {
                    required: true
                }
            },
            messages: {
                soKyHieu: {
                    required: "Không thể bỏ trống",
                    maxlength:"Nhập nhiều nhất 255 kí tự"
                },
                idLVB: {
                    required: "Không thể bỏ trống"
                },
                ngayBanHanh: {
                    required: "Không thể bỏ trống"
                },
                ngayHieuLuc: {
                    required: "Không thể bỏ trống"
                },
                trichYeu: {
                    required: "Không thể bỏ trống",
                    maxlength:"Nhập nhiều nhất 2048 kí tự" 
                },
                idCoQuan: {
                    required: "Không thể bỏ trống"
                },
                idNguoiKy_name: {
                    required: "Không thể bỏ trống"
                }
            }
        });
    },
    pageSizeChange:function(){
        $(vanBanEle.pageSize).on("change",function(){
            $(vanBanEle.searchDanhMucForm).submit();
        });
    },
    toogleSelectCheckBoxClick:function(){
        $(vanBanEle.selectItemCheckboxAll).on("click",function(){
            checkboxes = document.getElementsByName(vanBanEle.selectItemCheckboxName);
            for (var i = 0, n = checkboxes.length; i < n; i++) {
                checkboxes[i].checked = this.checked;
            }
        });
    },
    deleteClick: function () {
        $(vanBanEle.deleteButton).on("click",function(){
            var idSelected = $(this).data("id");
            if (confirm("Bạn có chắc muốn xóa văn bản này?")) {
                $.ajax({
                    type: 'POST',
                    url: "/thongtin/vanban/delete",
                    data: exactDataAjax({
                        idSelected: idSelected,
                        idType:$(vanBanEle.selectTypeDanhMuc+" option:selected").attr('data-id')
                    }),
                    async: false,
                    cache: false
                });
            }            
        });
    },
    banHanhClick: function () {
        $(vanBanEle.banHanhButton).on("click",function(){
            var idSelected = $(this).data("id");
            if (confirm("Bạn có chắc muốn ban hành văn bản này?")) {
                $.ajax({
                    type: 'POST',
                    url: "/thongtin/vanban/banhanhvanban",
                    data: exactDataAjax({
                        idSelected: idSelected,
                        idType:$(vanBanEle.selectTypeDanhMuc+" option:selected").attr('data-id')
                    }),
                    async: false,
                    cache: false,
                    success:function(result){
                        eval(result);
                    }
                });
            }            
        });
    },
    banHanhVanBanMultiClick: function () {
        $(vanBanEle.banHanhVanBanMultiButton).on("click",function(){
            var idSelected = $(vanBanEle.tableListDanhMuc+' input[name="'+vanBanEle.selectItemCheckboxName+'"]').map(function() {
                return this.checked ? this.value : null;
            }).get();

            if(idSelected.toString() === ""){
                alert('Vui lòng chọn văn bản cần ban hành!');
            } else {
                if (confirm("Bạn có chắc muốn ban hành các văn bản này?")) {
                    $.ajax({
                        type: 'POST',
                        url: "/thongtin/vanban/banhanhvanban",
                        data: exactDataAjax({idSelected: idSelected}),
                        async: false,
                        cache: false,
                        success:function(result){
                            eval(result);
                        }
                    });
                }
            }
        });
    },
    huyBanHanhClick: function () {
        $(vanBanEle.huyBanHanhButton).on("click",function(){
            var idSelected = $(this).data("id");
            if (confirm("Bạn có chắc muốn hủy ban hành văn bản này?")) {
                $.ajax({
                    type: 'POST',
                    url: "/thongtin/vanban/huybanhanhvanban",
                    data: exactDataAjax({
                        idSelected: idSelected,
                        idType:$(vanBanEle.selectTypeDanhMuc+" option:selected").attr('data-id')
                    }),
                    async: false,
                    cache: false,
                    success:function(result){
                        eval(result);
                    }
                });
            }            
        });
    },
    searchOptionDisplay: function () {
        $(vanBanEle.searchOptionDisplay).on('click', function() {
            $(vanBanEle.optionSearchArea).slideToggle();
            var isClick = $(this).attr('isclick');
            if (isClick === '1') {
                $(this).find('span').text('Hiển thị bớt tùy chọn tìm kiếm');
                $(this).attr('isclick','0');
            } else {
                $(vanBanEle.optionSearchArea).find('input').val('');
                $(this).find('span').text('Hiển thị thêm tùy chọn tìm kiếm');
                $(this).attr('isclick','1');
            }
        });
    }
};
$(document).ready(function () {
    "use strict";
    vanBanEvent.init();    
});