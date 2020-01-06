var qthtMenuEle = {
    searchMenuForm:"#searchMenu",
    pageSize:"#pageSize",
    selectItemCheckboxAll:"#selectedAll",
    selectItemCheckboxName:"selected[]",
    deleteButton:"#deleteButton",
    tableListMenu:"#listMenu",
    formMenuCreate:"#formMenuCreate",
    formMenuUpdate:"#formMenuUpdate",
    goBackButton:"#goBackButton"
};
var qthtMenuEvent = {
    init:function(){
        this.pageSizeChange();
        this.toogleSelectCheckBoxClick();
        this.deleteClick();
        this.validationFormAdd();
        this.validationFormUpdate();        
        this.goBackButtonClick();
    },
    goBackButtonClick:function(){
        $(qthtMenuEle.goBackButton).on("click",function(){
            window.location.href='/qtht/menu/index';
        });
    },
    validationFormAdd: function () {
        $(qthtMenuEle.formMenuCreate).validate({
            rules: {
                name: {
                    required: true,
                    maxlength:50
                },
                route: {
                    linkLienKet:true
                }
            },
            messages: {
                name: {
                    required: "Không thể bỏ trống",
                    maxlength:"Nhập nhiều nhất 50 kí tự"                            
                }
            }
        });
    },
    validationFormUpdate: function () {
        $(qthtMenuEle.formMenuUpdate).validate({
            rules: {
                name: {
                    required: true,
                    maxlength:50
                },
                route: {
                    linkLienKet:true
                }
            },
            messages: {
                name: {
                    required: "Không thể bỏ trống",
                    maxlength:"Nhập nhiều nhất 50 kí tự"                            
                }
            }
        });
    },
    pageSizeChange:function(){
        $(qthtMenuEle.pageSize).on("change",function(){
            $(qthtMenuEle.searchMenuForm).submit();
        });
    },
    toogleSelectCheckBoxClick:function(){
        $(qthtMenuEle.selectItemCheckboxAll).on("click",function(){
            checkboxes = document.getElementsByName(qthtMenuEle.selectItemCheckboxName);
            for (var i = 0, n = checkboxes.length; i < n; i++) {
                checkboxes[i].checked = this.checked;
            }
        });
    },
    deleteClick: function () {
        $(qthtMenuEle.deleteButton).on("click",function(){
            var idSelected = $(qthtMenuEle.tableListMenu+' input[name="'+qthtMenuEle.selectItemCheckboxName+'"]').map(function() {
                return this.checked ? this.value : null;
            }).get();

            if(idSelected.toString() === ""){
                alert('Vui lòng chọn menu cần xóa!');
            } else {
                if (confirm("Bạn có chắc muốn xóa menu?")) {
                    $.ajax({
                        type: 'POST',
                        url: "/qtht/menu/delete",
                        data: exactDataAjax({idSelected: idSelected}),
                        async: false,
                        cache: false
                    });
                }
            }
        });
    }
};
$(document).ready(function () {
    "use strict";
    qthtMenuEvent.init();
});