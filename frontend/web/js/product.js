var product = {
	validate: function() {
        $("#purchaseForm").validate({
            rules:
            {
                "customerName" :
                {
                    required : true,
                    maxlength: 255,
                },
                "customerPhone" :
                {
                    required : true,
                    number : true,
                    minlength: 8,
                    maxlength: 16,
                },
                "customerEmail" : {
                    required : true,
                    minlength : 6,
                    maxlength : 50, 
                    email: true,
                },
                "customerAddress" :
                {
                    required : true,
                    maxlength: 255,
                },

            },
            messages: {
				"customerName": {
					required: "Bắt buộc nhập họ và tên khách hàng",
					maxlength: "Hãy nhập tối đa 255 ký tự"
				},
				"customerPhone" :
                {
                    required : "Bắt buộc nhập số điện thoại khách hàng",
                    number : "Chỉ được nhập số",
                    minlength: "Nhập tối thiểu 8 số",
                    maxlength: "Nhập tối đa 16 số",
                },
                "customerEmail" : {
                    required : "Bắt buộc nhập email khách hàng",
                    minlength : "Nhập tối thiểu 6 ký tự",
                    maxlength : "Nhập tối đa 50 ký tự", 
                    email: "Nhập đúng định dạng email",
                },
                "customerAddress" :
                {
                    required : "Bắt buộc nhập địa chỉ khách hàng",
                    maxlength: "Nhập tối đa 255 ký tự",
                },
			}
        });

        $("#commentForm").validate({
            rules:
            {
                "comment" :
                {
                    required : true,
                    minlength : 6
                },
                "author" :
                {
                    required : true,
                    maxlength: 50,
                },
                "email" : {
                    required : true,
                    minlength : 6,
                    maxlength : 50, 
                    email: true,
                },

            },
            messages: {
				"comment": {
					required: "Bắt buộc nhập đánh giá của khách hàng",
					minlength : "Hãy nhập tối thiểu 5 ký tự"
				},
				"author" :
                {
                    required : "Bắt buộc nhập tên của khách hàng",
                    maxlength: "Nhập tối đa 50 ký tự",
                },
                "email" : {
                    required : "Bắt buộc nhập email khách hàng",
                    minlength : "Nhập tối thiểu 6 ký tự",
                    maxlength : "Nhập tối đa 50 ký tự", 
                    email: "Nhập đúng định dạng email",
                },
			}
        });
    },
    orderProduct: function(){
    	product.validate();
    	var isSuccess = false;
    	var orderCode = "";
    	var htmlBinding = "";
    	if($("#purchaseForm").valid()){
    		$.ajax({
                type : 'POST',
                data : $('#purchaseForm').serialize(),
                url : '/order/order-product',
                cache : false,
                success: function (dataReturn)
                {
                    var result = JSON.parse(dataReturn);
                    if(result['status'] == 'success'){
                    	isSuccess = true;
                    	orderCode = result['orderCode'];
                    }
                },
                complete: function(){
                	if(isSuccess){
                		$('.devvn-popup-content').empty();
                		var htmlBinding = "<div class='popup-message successOrder' style='color: #333;'>"+
								"<p class='clearfix titleSuccessOrder'>Đặt hàng thành công!</p>" +
								"<p class='clearfix' style='color: #00c700; padding: 10px 0;'>Mã đơn hàng <span style='color: #333; font-weight: bold;'>"+orderCode+"</span></p>" +
								"<p class='clearfix'>Hệ thống sẽ liên hệ với bạn trong 24h tới. Cám ơn bạn đã cho chúng tôi cơ hội được phục vụ.</p>" +
								"<p class='clearfix'><strong>Hotline:</strong> 0782112327</p>"+
								"<p class='clearfix'><strong>Ghi chú: </strong>Đơn hàng chỉ có hiệu lực trong vòng 48h</p>"+
							"</div>";
						$('.devvn-popup-content').append(htmlBinding);
                	}else{
                		alert("Đặt hàng không thành công!");
                	}
                }
            });
    	}
    },
    sendFeedback: function(){
    	product.validate();
    	var isSuccess = false;
    	var htmlBinding = "";
    	var message = common.messageSendFeedBack;
    	if($("#commentForm").valid()){
    		$.ajax({
                type : 'POST',
                data : $('#commentForm').serialize(),
                url : '/site/send-feedback',
                cache : false,
                success: function (dataReturn)
                {
                	if(dataReturn == 'success'){
                		isSuccess = true;
                	}
                },
                complete: function(){
                	if(isSuccess){
                		$('.formComment').empty();
                		htmlBinding = "<p>"+message+"</p>";
                		$('.formComment').append(htmlBinding);
                	}
                }
            });
    	}
    },
    loadMoreComment: function(element, productId){
    	$(element).removeAttr("onclick");
    	$(element).find('span').text("Đang tải bình luận");
    	$('.loadMoreImg').removeClass("hidden");
    	var countCommentBox = $('.commentBox').length;
    	var dataParse = [];
    	var data = [];
    	var total = null;
    	var html = "";
    	if(countCommentBox > 0){
    		setTimeout(function(){
    			$.ajax({
	                type : 'POST',
	                data : {
	                	currentBox : countCommentBox,
	                	productId : productId
	                },
	                url : '/site/load-more-comment',
	                cache : false,
	                success: function (dataReturn)
	                {
	                	dataParse = JSON.parse(dataReturn);
	                	
	                },
	                complete: function(){
	                	if(dataParse['status'] == 'success'){
	                		data = dataParse['dataFeedback'];
	                		total = dataParse['totalData'];
	                		if(data.length > 0){
	                			$.each(data, function( index, value ) {
								 	html += common.loadMoreComment(value);
								});
								$('.commentContainer').append(html);
								var countCommentBox = $('.commentBox').length;
								if(countCommentBox == total){
									$(element).closest('.loadMoreComment').remove();
								}else {
									$('.loadMoreImg').addClass("hidden");
									$(element).attr("onclick", "product.loadMoreComment(this, "+productId+")");
									$(element).find('span').text("Xem thêm bình luận");
								}
	                		}
	                	}
	                }
	            });
    		}, 500);
    		
    	}
    },
    changeSort: function(){
        var slug = $('#slugDanhMuc').val();
        var sort = $('.orderby').val();
        window.location.href = "/product/danh-muc/"+slug+"?sort="+sort;
    },
    pageClick: function(page){
        var page = page + 1;
        var slug = $('#slugDanhMuc').val();
        var sort = $('.orderby').val();
        window.location.href = "/product/danh-muc/"+slug+"?sort="+sort+"&page="+page;
    }
}