$('#idLVB_name').autocomplete({
    source: function (request, response) {
        var result = [];
        var limit = 10;
        var term = request.term.toLowerCase();
        $.each(_opts.listLoaiVanBan, function () {
            var loaiVanBan = this;
            if (term == '' || loaiVanBan.name.toLowerCase().indexOf(term) >= 0) {
                result.push(loaiVanBan);
                limit--;
                if (limit <= 0) {
                    return false;
                }
            }
        });
        response(result);
    },
    focus: function (event, ui) {
        $('#idLVB_name').val(ui.item.name);
        return false;
    },
    select: function (event, ui) {
        $('#idLVB_name').val(ui.item.name);
        $('#idLVB_id').val(ui.item.idLVB);
        return false;
    },
    search: function () {
        $('#idLVB_id').val('');
    }
}).autocomplete("instance")._renderItem = function (ul, item) {
    return $("<li>")
        .append($('<a>').append($('<b>').text(item.name)))
        .appendTo(ul);
};
$('#idCoQuan_name').autocomplete({
    source: function (request, response) {
        var result = [];
        var limit = 10;
        var term = request.term.toLowerCase();
        $.each(_opts.listCoQuan, function () {
            var coQuan = this;
            if (term == '' || coQuan.name.toLowerCase().indexOf(term) >= 0) {
                result.push(coQuan);
                limit--;
                if (limit <= 0) {
                    return false;
                }
            }
        });
        response(result);
    },
    focus: function (event, ui) {
        $('#idCoQuan_name').val(ui.item.name);
        return false;
    },
    select: function (event, ui) {
        $('#idCoQuan_name').val(ui.item.name);
        $('#idCoQuan_id').val(ui.item.idCQ);
        return false;
    },
    search: function () {
        $('#idCoQuan_id').val('');
    }
}).autocomplete("instance")._renderItem = function (ul, item) {
    return $("<li>")
        .append($('<a>').append($('<b>').text(item.name)))
        .appendTo(ul);
};
$('#idNguoiKy_name').autocomplete({
    source: function (request, response) {
        var result = [];
        var limit = 10;
        var term = request.term.toLowerCase();
        $.each(_opts.listNguoiKy, function () {
            var nguoiKy = this;
            if (term == '' || nguoiKy.name.toLowerCase().indexOf(term) >= 0) {
                result.push(nguoiKy);
                limit--;
                if (limit <= 0) {
                    return false;
                }
            }
        });
        response(result);
    },
    focus: function (event, ui) {
        $('#idNguoiKy_name').val(ui.item.name);
        return false;
    },
    select: function (event, ui) {
        $('#idNguoiKy_name').val(ui.item.name);
        $('#idNguoiKy_id').val(ui.item.idNguoiKy);
        return false;
    },
    search: function () {
        $('#idNguoiKy_id').val('');
    }
}).autocomplete("instance")._renderItem = function (ul, item) {
    return $("<li>")
        .append($('<a>').append($('<b>').text(item.name)))
        .appendTo(ul);
};
