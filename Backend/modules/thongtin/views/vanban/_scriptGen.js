for(var i=0;i<=_count;i++){
    $.ajax({
        type: 'POST',
        url: "/thongtin/vanban/updatefulltextsearchvanban",
        data: {offset: i},
        async: false,
        cache: false,
        success:function(result){
            $('#result').prepend(result);
        }
    });
}


