$(function () {
    $("#btnAdd").bind("click", function () {
        var div = $("<tr />");
        div.html(GetDynamicTextBox(""));
        $("#TextBoxContainer").append(div);
    });
    $("body").on("click", ".remove", function () {
        $(this).closest("tr").remove();
    });
});
function GetDynamicTextBox(value) {
    return '<td><input name = "DynamicTextBox" type="text" value = "' + value + '" class="form-control" /></td>' + '<td><select name="" class="form-control"><option> Select</option><option> Male</option><option> Female</option></select></td>' + '<td><button type="button" class="btn btn-danger remove"><i class="fa fa-fw fa-times"></i></button></td>'
}
$(function () {
    $("#btnAdd1").bind("click", function () {
        var div = $("<tr />");
        div.html(GetDynamicTextBox1(""));
        $("#TextBoxContainer-ip").append(div);
    });
    $("body").on("click", ".remove1", function () {
        $(this).closest("tr").remove();
    });
});
function GetDynamicTextBox1(value) {
    return '<td><input name = "DynamicTextBox1" type="text" value = "' + value + '" class="form-control" />\n\
            </td>' + 
            '<td><input name = "DynamicTextBox" type="text" value = "' + value + '" class="form-control" />\n\
            </td>' + 
            '<td><input name = "DynamicTextBox" type="text" value = "' + value + '" class="form-control" /></td>' + 
            '<td><select name="" class="form-control"><option> VND</option><option> USD </option></select></td>' + 
            '<td><button type="button" class="btn btn-danger remove"><i class="fa fa-fw fa-times"></i></button></td>';
}