var qthtUserEle = {
    searchUserForm:"#searchUser",
    pageSize:"#pageSize",
    selectItemCheckboxAll:"#selectedAll",
    selectItemCheckboxName:"selected[]",
    deleteButton:"#deleteButton",
    tableListUser:"#listUser",
    formUserCreate:"#formUserCreate",
    formUserUpdate:"#formUserUpdate",
    goBackButton:"#goBackButton",
    editInfomation:'#editInfomation',
    saveInfomation:"#saveInfomation",
    chiTietNguoiDung:"#chiTietNguoiDung"
};
var qthtUserEvent = {
    init:function(){
        this.pageSizeChange();
        this.toogleSelectCheckBoxClick();
        this.deleteClick();
        this.validationFormAdd();
        this.validationFormUpdate();        
        this.goBackButtonClick();
        this.editInfomation();
    },
    goBackButtonClick:function(){
        $(qthtUserEle.goBackButton).on("click",function(){
            window.location.href='/qtht/user/index';
        });
    },
    validationFormAdd: function () {
        $(qthtUserEle.formUserCreate).validate({
            rules: {
                fullname: {
                    required: true,
                    maxlength:255
                },
                email: {
                    required: true,
                    email:true,
                    maxlength:32,
                    remote:{
                        url: "/qtht/user/checkemail",
                        type: "post",
                        data: {
                          id: function() {
                            return $( "input[name=id]" ).val();
                          }
                        }
                    }
                },
                password: {
                    required: true,
                    maxlength:32
                },
                reTypePassword: {
                    required: true,
                    maxlength:32,
                    equalTo: "input[name=password]"
                }
            },
            messages: {
                fullname: {
                    required: "Không thể bỏ trống",
                    maxlength:"Nhập nhiều nhất 255 kí tự"
                },
                email: {
                    required: "Không thể bỏ trống",
                    email:"Phải là định dạng email",
                    maxlength:"Nhập nhiều nhất 32 kí tự",
                    remote:"Email đã tồn tại"
                },
                password: {
                    required: "Không thể bỏ trống",
                    maxlength:"Nhập nhiều nhất 32 kí tự"
                },
                reTypePassword: {
                    required: "Không thể bỏ trống",
                    maxlength:"Nhập nhiều nhất 32 kí tự",
                    equalTo:"Mật khẩu không trùng khớp"
                }
            }
        });
    },
    validationFormUpdate: function () {
        $(qthtUserEle.formUserUpdate).validate({
            rules: {
                fullname: {
                    required: true,
                    maxlength:255
                },
                email: {
                    required: true,
                    email:true,
                    maxlength:32,
                    remote:{
                        url: "/qtht/user/checkemail",
                        type: "post",
                        data: {
                          id: function() {
                            return $( "input[name=id]" ).val();
                          }
                        }
                    }
                },
                password: {
                    maxlength:32
                },
                reTypePassword: {
                    maxlength:32,
                    equalTo: "input[name=password]"
                }
            },
            messages: {
                fullname: {
                    required: "Không thể bỏ trống",
                    maxlength:"Nhập nhiều nhất 255 kí tự"
                },
                email: {
                    required: "Không thể bỏ trống",
                    email:"Phải là định dạng email",
                    maxlength:"Nhập nhiều nhất 32 kí tự",
                    remote: "Email đã tồn tại"
                },
                password: {
                    maxlength:"Nhập nhiều nhất 32 kí tự"
                },
                reTypePassword: {
                    maxlength:"Nhập nhiều nhất 32 kí tự",
                    equalTo:"Mật khẩu không trùng khớp"
                }
            }
        });
    },
    pageSizeChange:function(){
        $(qthtUserEle.pageSize).on("change",function(){
            $(qthtUserEle.searchUserForm).submit();
        });
    },
    toogleSelectCheckBoxClick:function(){
        $(qthtUserEle.selectItemCheckboxAll).on("click",function(){
            checkboxes = document.getElementsByName(qthtUserEle.selectItemCheckboxName);
            for (var i = 0, n = checkboxes.length; i < n; i++) {
                checkboxes[i].checked = this.checked;
            }
        });
    },
    deleteClick: function () {
        $(qthtUserEle.deleteButton).on("click",function(){
            var idSelected = $(qthtUserEle.tableListUser+' input[name="'+qthtUserEle.selectItemCheckboxName+'"]').map(function() {
                return this.checked ? this.value : null;
            }).get();

            if(idSelected.toString() === ""){
                alert('Vui lòng chọn người dùng cần xóa!');
            } else {
                if (confirm("Bạn có chắc muốn xóa người dùng?")) {
                    $.ajax({
                        type: 'POST',
                        url: "/qtht/user/delete",
                        data: exactDataAjax({idSelected: idSelected}),
                        async: false,
                        cache: false
                    });
                }
            }
        });
    },
    editInfomation:function(){
        qthtUserEvent.showInputs(false);
        $(qthtUserEle.editInfomation).on("click",function(){
            qthtUserEvent.showInputs(true);
        });
    },
    showInputs:function(boolean){
        if(boolean){
            $(qthtUserEle.saveInfomation).show();
            $(qthtUserEle.editInfomation).hide();
            $(qthtUserEle.chiTietNguoiDung+" input").each(function(){
                $(this).removeAttr('disabled');
            });
        }else{
            $(qthtUserEle.saveInfomation).hide();
            $(qthtUserEle.editInfomation).show();
            $(qthtUserEle.chiTietNguoiDung+" input").each(function(){
                $(this).prop('disabled', 'true');
            });
        }
    }
};
function file_change(f){
    var reader = new FileReader();
    reader.onload = function (e) {
        var img = document.getElementById("img");
        img.src = e.target.result;
        img.style.display = "inline";
         $.ajax({
            type: 'POST',
            url: "/qtht/user/detail",
            data: exactDataAjax({avatar: img.src}),
            async: false,
            cache: false
        });
    };
    reader.readAsDataURL(f.files[0]);
}
$(document).ready(function () {
    "use strict";
    qthtUserEvent.init();
});