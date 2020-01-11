var danhMucSPByElement = {
    pageSize: "#pageSize",
    searchForm: "#searchForm",
    iconLoading: ".icon_loading",
    isActiveClick: ".kickHoat",
    deleteByButtonClick: "#deleteDanhMucSP",
    deleteLoaiSPButtonClick: "#deleteLoaiSP",
    deleteFeedbackClick: "#deleteFeedBack",
    selectItemCheckboxAll: "#selectedAll",
    selectItemCheckboxName: "selected[]",
    formSanPham: "#formSanPham",
    formFeedback: "#formFeedback",
};

var sanPhamByEvent = {
    init: function () {
        this.pageSizeChange();     
        this.deleteByButtonClick();
        this.toogleSelectCheckBoxClick();
        this.deleteLoaiSPButtonClick();
        this.validationForm();
        this.deleteFeedbackClick();
    },
    deleteByButtonClick: function () {
        $(danhMucSPByElement.deleteByButtonClick).on("click", function () {
            var idSelected = $('div.listDanhMuc input[name="selected[]"]').map(function () {
                return this.checked ? this.value : null;
            }).get();
            if (idSelected.toString() === ""){
                alert('Vui lòng chọn Sản Phẩm cần xoá!');
            } else {
                if (confirm("Bạn có chắc muốn xóa?")) {
                    $.ajax({
                        type: 'POST',
                        url: "/sanpham/san-pham/delete",
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
                alert('Vui lòng chọn Sản phẩm cần xoá!');
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
    deleteFeedbackClick: function () {
        $(danhMucSPByElement.deleteFeedbackClick).on("click", function () {
            var idSelected = $('div.listFeedback input[name="selected[]"]').map(function () {
                return this.checked ? this.value : null;
            }).get();
            if (idSelected.toString() === ""){
                alert('Vui lòng chọn Sản phẩm cần xoá!');
            } else {
                if (confirm("Bạn có chắc muốn xóa?")) {
                    $.ajax({
                        type: 'POST',
                        url: "/sanpham/feedback/delete",
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
        $(danhMucSPByElement.formSanPham).validate({
            rules: {
                title: {required: true,maxlength:50},
                describe: {required: true}
            },
            messages: {
                title: {required: "Không thể bỏ trống",maxlength:"Nhập nhiều nhất 50 kí tự"},
                describe: {required: "Không thể bỏ trống"},
            }
        });
        $(danhMucSPByElement.formFeedback).validate({
            rules: {
                fullname: {
                    required: true,
                    maxlength:50
                },
                email: {
                    required: true,
                    email: true
                },
                commment: {
                    required: true,
                    maxlength: 255
                }
            }
        });
        
    },

    handleBrowseImage: function () {
        var avatar_path = $("#thumbnail").attr("src");
        $(".inputFile").on("change", function(e){
            if (e.target.files[0].name.match(/\.(jpg|jpeg|png|gif|JPG|PNG|JPEG|GIF)$/i)) {
                common.getOrientation(e.target.files[0], function(orientation) {
                    imageOrientation = orientation;
                });
                var srcUserImage = common.createObjectURL(e.target.files[0]);
                $(this).parent().parent().find('.previewImg').attr("src", srcUserImage);
            }
            else {
                $(this).val("");
                $(this).parent().parent().find('.previewImg').attr("src", "/images/avatar.png");
                alert('Vui lòng chọn file hình ảnh'); return;
            }
        });

        // When previewImg has loaded => upload this img
        $(".previewImg").unbind("load").bind('load', function () {
            sanPhamByEvent.uploadImage(avatar_path);
        });
    },
    uploadImage: function(avatar_path) {
        var previewImg = $(".previewImg")[0];
        if($(".inputFile")[0].files[0] != null){
            common.resizeImage($(".inputFile")[0].files[0], previewImg, imageOrientation, function(fileToUpload){
                var fileExtension = common.getFileExtension(fileToUpload.name);
            }); 
        }
    },
    changeImages: function(element, e){
        var stt = $(element).data('stt');
        var newStt = stt + 1;
        if (e.target.files[0].name.match(/\.(jpg|jpeg|png|gif|JPG|PNG|JPEG|GIF)$/i)) {
            
            $('.file'+stt).addClass('hidden');
            var divAppend = '<input id="files" class="file'+newStt+'" data-stt="'+newStt+'" type="file" name="files[]" onchange="sanPhamByEvent.changeImages(this, event);" />';
            $('.article').append(divAppend);
            var srcUserImage = common.createObjectURL(e.target.files[0]);
            var divImagePreview = "<div class='productContainer'> " +
                                    "<a target='_blank' href='" + srcUserImage + "' data-lightbox='roadtrip'>" +
                                        "<img class='productPreview' src='" + srcUserImage + "'/>"+
                                        "<a class='removeImage' data-filestt='"+stt+"' onclick='sanPhamByEvent.removeImage(this);return false;'>x</a>"+
                                    "</a>" +
                                    "</div>";
            $('.multipleImage').append(divImagePreview);
        }
        else {
            alert('Vui lòng chọn file hình ảnh'); return;
        }
        
    },
    removeImage: function(element){
        var stt = $(element).data("filestt");
        console.log("stt=" + stt)
        $(element).closest(".productContainer").remove();
        $('.file' + stt).remove();
    },
    deleteImage : function(element){
        var message = "Bạn có chắc muốn xóa hình ảnh này khỏi sản phẩm?";
        var idAttachment = $(element).data("idatt");
        $('<div></div>').appendTo('body')
        .html('<div><h6>' + message + '?</h6></div>')
        .dialog({
            modal: true,
            title: 'Delete message',
            zIndex: 10000,
            autoOpen: true,
            width: 'auto',
            resizable: false,
            buttons: {
                Yes: function() {
                    $(element).closest('.imageBlock').remove();
                    $.ajax({
                        type: 'POST',
                        url: "/sanpham/san-pham/delete-attachment",
                        data: {
                            'idAttachment' : idAttachment
                        },
                        async: false,
                        cache: false
                    });
                    $('body').append('<h1>Confirm Dialog Result: <i>Yes</i></h1>');
                    $(this).dialog("close");
                },
                No: function() {
                    $('body').append('<h1>Confirm Dialog Result: <i>No</i></h1>');
                    $(this).dialog("close");
                }
            },
            close: function(event, ui) {
                $(this).remove();
            }
        });
    },
    checkIsNoiBat: function(element){
        var value = 0;
        var productId = $('.idProduct').val();

        if ($('.isNoiBat').is(":checked"))
        {
            value = 1;
        }
        $.ajax({
            type: 'POST',
            url: "/sanpham/san-pham/update-is-noi-bat",
            data: {
                value : value,
                productId : productId
            },
            async: false,
            cache: false
        });
    },
    formatCurrency: function(number) {
        var n = number.split('').reverse().join("");
        var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");    
        return  n2.split('').reverse().join('') + 'VNĐ';
    },
    changeStatus: function(feedbackId){
        var value = 0;

        if ($('.isPublicComment').is(":checked"))
        {
            value = 1;
        }
        $.ajax({
            type: 'POST',
            url: "/sanpham/feedback/change-status",
            data: {
                value : value,
                feedbackId : feedbackId
            },
            async: false,
            cache: false
        });
    },
};


$(document).ready(function () {
    "use strict";
    sanPhamByEvent.init();
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true
    });

    $("input[data-type='currency']").on('input', function(e){
        $(this).val(sanPhamByEvent.formatCurrency(this.value.replace(/[,VNĐ]/g,'')));
    }).on('keypress',function(e){
        if(!$.isNumeric(String.fromCharCode(e.which))) e.preventDefault();
    }).on('paste', function(e){    
        var cb = e.originalEvent.clipboardData || window.clipboardData;      
        if(!$.isNumeric(cb.getData('text'))) e.preventDefault();
    });
});
