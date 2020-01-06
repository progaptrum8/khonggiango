var contactByElement = {
    selectForm : "#typeSetting",
    idForm : "#formSetting",
    submitBtn : "#submitBtn",
};

var contactByEvent = {
    init: function () {
        this.pageOnchangeSelect();
        this.submitForm();
    },
    pageOnchangeSelect : function(){
        $(contactByElement.selectForm).on("change", function(e){
            e.preventDefault();
            var type = $(this).val();

            $(contactByElement.idForm).attr('action', "/qtht/setting-page/index?typeSetting=" + type);
            $(contactByElement.idForm).submit();
        });
    },
    submitForm: function(){
        $(contactByElement.submitBtn).on("click", function(){
            var textValue = $('#textArea').val();
            $('#textValueEncode').val(base64Encode(textValue));

            $(contactByElement.idForm).attr('action', "/qtht/setting-page/save");
            $(contactByElement.idForm).submit();
        });
    }
};

$(document).ready(function () {
    contactByEvent.init();
    var editor = new FroalaEditor('#textArea', {
    });
});
