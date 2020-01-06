/*
 * Quản lý cơ quan
 * @author: MauBV
 * @date:   2017/07/07
 */
var danhMucSPByElement = {
    pageSize: "#pageSize",
    searchForm: "#searchForm",
    iconLoading: ".icon_loading",
    isActiveClick: ".kickHoat",
    deleteByButtonClick: "#deleteDanhMucSP",
    deleteLoaiSPButtonClick: "#deleteLoaiSP",
    selectItemCheckboxAll: "#selectedAll",
    selectItemCheckboxName: "selected[]",
    coQuanForm: "#formDanhMucSP"
};

var danhMucSPByEvent = {
    init: function () {
        this.pageSizeChange();     
        this.deleteByButtonClick();
        this.toogleSelectCheckBoxClick();
        this.deleteLoaiSPButtonClick();
        this.validationForm();
    },
    deleteByButtonClick: function () {
        $(danhMucSPByElement.deleteByButtonClick).on("click", function () {
            var idSelected = $('div.listDanhMuc input[name="selected[]"]').map(function () {
                return this.checked ? this.value : null;
            }).get();
            if (idSelected.toString() === ""){
                alert('Vui lòng chọn cơ quan cần xoá!');
            } else {
                if (confirm("Bạn có chắc muốn xóa?")) {
                    $.ajax({
                        type: 'POST',
                        url: "/danhmuc/danh-muc-san-pham/delete",
                        data: exactDataAjax({idSelected: idSelected}),
                        async: false,
                        cache: false
                    });
                }
            }
        });
    },
    deleteLoaiSPButtonClick: function () {
        $(danhMucSPByElement.deleteLoaiSPButtonClick).on("click", function () {
            var idSelected = $('div.listDanhMuc input[name="selected[]"]').map(function () {
                return this.checked ? this.value : null;
            }).get();
            if (idSelected.toString() === ""){
                alert('Vui lòng chọn cơ quan cần xoá!');
            } else {
                if (confirm("Bạn có chắc muốn xóa?")) {
                    $.ajax({
                        type: 'POST',
                        url: "/danhmuc/loai-san-pham/delete",
                        data: exactDataAjax({idSelected: idSelected}),
                        async: false,
                        cache: false
                    });
                }
            }
        });
    },
    toogleSelectCheckBoxClick: function () {
        $(danhMucSPByElement.selectItemCheckboxAll).on("click", function () {
            checkboxes = document.getElementsByName(danhMucSPByElement.selectItemCheckboxName);
            for (var i = 0, n = checkboxes.length; i < n; i++) {
                checkboxes[i].checked = this.checked;
            }
        });
    },
    // paging
    pageSizeChange: function () {
        $(danhMucSPByElement.pageSize).on("change", function () {
            $(danhMucSPByElement.searchForm).submit();
        });
    },
    validationForm: function () {
        $(danhMucSPByElement.coQuanForm).validate({
             rules: {
                maSoToChuc: {required: true,maxlength:50,spaceBar: true},
                tenDonVi: {required: true,maxlength:255},
                tenVietTat: {maxlength:255},
                diaChi: {maxlength:255},
                dienThoai: {maxlength:255, phonenumber: true},
                fax: {maxlength:255, faxnumber:true},
                email: {maxlength:255,email: true}
            },
            messages: {
                maSoToChuc: {required: "Không thể bỏ trống",maxlength:"Nhập nhiều nhất 50 kí tự"},
                tenDonVi: {required: "Không thể bỏ trống", maxlength:"Nhập nhiều nhất 255 kí tự"},
                tenVietTat: {maxlength:"Nhập nhiều nhất 255 kí tự"},
                diaChi: {maxlength:"Nhập nhiều nhất 255 kí tự"},
                dienThoai: {maxlength:"Nhập nhiều nhất 255 kí tự"},
                fax: {maxlength:"Nhập nhiều nhất 255 kí tự"},
                email: {maxlength:"Nhập nhiều nhất 255 kí tự",email:"Vui lòng nhập địa chỉ email hợp lệ"},
            }
        });
    },
};

$(document).ready(function () {
    "use strict";
    danhMucSPByEvent.init();
});
