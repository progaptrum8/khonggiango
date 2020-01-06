var fileDinhKemEvent={
    init:function(){
        this.saveFileDinhKem();
        this.deleteFileDinhKemButtonClick();
        this.chonBanHanhFileDinhKem();
    },
    saveFileDinhKem:function(){
        $("div.wrapper").delegate("div.showView input#fileUpload","change",function(){
            $($(this).closest('#fileDinhKemForm'+$(this).data("id"))).validate({
                rules: {
                    'fileUpload':{required: true}
                },
                messages: {
                    'fileUpload': { required: "Không thể bỏ trống"}
                }
            }).form();    
            var form =$($(this).closest('#fileDinhKemForm'+$(this).data("id")));
            var formData = new FormData(form[0]);  
            if (form.valid()){
                $.ajax({
                    url: $($(this).closest('#fileDinhKemForm'+$(this).data("id"))).attr("action"),
                    data: formData,
                    type: "post",
                    contentType: false,
                    processData: false,
                    async: false,
                    cache: false,
                    success: function (data) {
                        formData =new FormData();
                        eval(data);
                    }
                });
            }
         });
     },
     
    deleteFileDinhKemButtonClick:function(){
       $("div.wrapper").delegate("div.showView .deleteFileDinhKemButton","click",function(){
            var idObject = $(this).data("id");            
            var id = $(this).data("delete");
            var simple = $(this).data("simple");
            if (confirm("Bạn có chắc muốn xóa?")) {
                $.ajax({
                    type: 'POST',
                    url: "/thongtin/vanban/deletefiledinhkem",
                    data: exactDataAjax({id: id,idObject:idObject,simple:simple}),
                    async: false,
                    cache: false,
                    success: function (data) {
                        eval(data);
                    }
                });
            }
        });
    },
    chonBanHanhFileDinhKem:function(){
        $("div.wrapper").delegate("div.showView .selectedFile","change", function () {
            var id = $(this).val();
            var idObject=$(this).data('idobject');
            var check = $(this).is(":checked");
            $.ajax({
                url: "/thongtin/vanban/chonbanhanhfiledinhkem",
                data: {"id":id, "check":check,"idObject":idObject},
                type: "post",
                async: false,
                cache: false
            });        
        });
    }
};
$(document).ready(function () {
    "use strict";
    fileDinhKemEvent.init();    
});