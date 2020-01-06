var imageOrientation = -1;
var common = {
	messageSendFeedBack : "Cảm ơn bạn đã gửi đánh giá sản phẩm đến hệ thống , hệ thống sẽ kiểm duyệt và gửi đánh giá của bạn lên!",
	loadMoreComment: function(data){
		var html = "";
		html = 
			'<div class="row commentBox">' +
				'<div class="col-md-12 col-xs-12">' +
					'<section class="comment-list">' +
						'<article class="row">' +
							'<div class="boxAvatar hidden-xs">' +
								'<figure class="avatarCustomer">' +
									'<img class="img-responsive" src="/images/user.png">' +
								'</figure>' +
							'</div>' +
							'<div class="col-md-10 col-sm-10 pdLeft0">' +
								'<div class="panelBoxCmt panel-default">' +
									'<div class="panel-body-custom">' +
										'<strong>'+data["fullname"]+'</strong>' +
										'<header class="text-left">' +
											'<time class="comment-date font11"><i class="far fa-clock"></i> '+data['created_date']+'</time>' +
										'</header>' +
										'<div class="comment-post">' +
											'<p class="font11">'
												+data["comment"]+
											'</p>' +
										'</div>' +
									'</div>' +
								'</div>' +
							'</div>' +
						'</article>' +
					'</section>' +
				'</div>' +
			'</div>';
		return html;
	}

};

var isMobile = {
	Android: function () {
		return /Android/i.test(navigator.userAgent);
	},
	BlackBerry: function () {
		return /BlackBerry/i.test(navigator.userAgent);
	},
	iOS: function () {
		return /iPhone|iPad|iPod/i.test(navigator.userAgent);
	},
	Windows: function () {
		return /IEMobile/i.test(navigator.userAgent);
	},
	any: function () {
		return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Windows());
	},
	isIOS: function () {
		return (isMobile.iOS());
	},
	isAndroid: function () {
		return (isMobile.Android());
	},
	iOSAndAndroid: function () {
		return (isMobile.Android() || isMobile.iOS());
	},
	webViewIOS: function () {
		return /(iPhone|iPod|iPad).*AppleWebKit(?!.*Safari)/i.test(navigator.userAgent);
	},
	webViewAndroid: function () {
		return isRunOnAndroidApp;
	},
	webView: function () {
		return (isMobile.webViewIOS() || isMobile.webViewAndroid());
	}
};
