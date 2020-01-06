var idFileObject = $('#idFileObject').val();
var urlFile = $('#fileDinhKemShow').data('url');
//tinymce.init({
//  selector: '#noiDung',
//  height: 200,
//  menubar: false,
//  plugins: [
//    'advlist autolink lists link image charmap print preview anchor',
//    'searchreplace visualblocks code fullscreen',
//    'insertdatetime media table contextmenu paste code'
//  ],
//  toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
//});
showHideTab(idFileObject,urlFile,"linkFileDinhKem");
var showHideHieuLuc = function(){
    var id = $('input[name=idLVB]').val();    
    $.ajax({
        type: 'POST',
        url: "/thongtin/vanban/usehieuluc",
        data: exactDataAjax({id: id}),
        async: false,
        cache: false,
        success:function(result){            
            if(result == 1){
                $(".showHieuLuc").show();
            }else{
                $(".showHieuLuc").hide();
            }
        }
    });
};
$('#idLVB_name').on("change",showHideHieuLuc);
$('#idLVB_name').trigger("change");