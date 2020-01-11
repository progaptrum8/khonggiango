<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <meta name="description" content="Sang Trọng - Tài Lộc - Bền Đẹp">
	    <meta name="author" content="">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
		<meta content="yes" name="apple-mobile-web-app-capable">
		<title><?=$this->title?></title>

		<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/css/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" type="text/css" href="/css/fontawesome/css/all.min.css">
		
		<link rel="stylesheet" href="/css/styles.css" type="text/css">
		<link rel="stylesheet" href="/css/quick-buy.css" type="text/css">

		<link rel="stylesheet" href="/css/flatsome.css" type="text/css">
		<link rel="stylesheet" type="text/css" href="/css/style.css">
		<link rel="stylesheet" type="text/css" href="/css/contact.css">
		<link rel="stylesheet" type="text/css" href="/css/slick.css"/>
		<link rel="stylesheet" type="text/css" href="/css/slick-theme.css"/>
		<link rel="stylesheet" type="text/css" href="/css/lightbox.css"/>
		
		<script type="text/javascript" src="/js/jquery.min.js"></script>
		<script type="text/javascript" src="/js/jquery.validate.js"></script>
		<script type="text/javascript" src="/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="/js/product.js"></script>
		<script type="text/javascript" src="/js/common.js"></script>
		<script type="text/javascript" src="/js/lightbox.js"></script>
		<script type="text/javascript" src="/js/slick.min.js"></script>

	</head>
	<body>
		<div id="wrapper">
			<header id="header" class="header has-sticky sticky-jump">
				<div class="header-wrapper">
					<img class="img-theme" src="/images/background-main.png">
					<nav class="navbar navbar-default" role="navigation">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="collapse navbar-collapse" id="collapse">
							<ul class="nav header-nav header-bottom-nav nav-left  nav-divided nav-size-xlarge nav-spacing-xlarge nav-uppercase">
								<li><a href="/" class="nav-top-link"><i class="fas fa-home whiteColor" aria-hidden="true"></i>Trang Chủ</a></li>
								<li><a href="/site/about" class="nav-top-link">Giới thiệu</a></li>
								<li><a href="/site/promotion" class="nav-top-link">Ưu đãi</a></li>
								<li><a href="/site/cash" class="nav-top-link">THANH TOÁN MUA HÀNG</a></li>
								<li><a href="/site/contact" class="nav-top-link">LIÊN HỆ</a></li>
							</ul>
						</div>
					</nav>
				</div>
			</header>
			<div class="content-body">
				<?=$content?>
			</div>
			
			<!-- Begin footer -->
			<footer id="footer" class="footer-wrapper">

				<section class="section dark" id="section_804654861">
					<div class="bg section-bg fill bg-fill  bg-loaded"> </div><!-- .section-bg -->

					<div class="section-content relative">
						<div class="row pdTop30">
							<div class="col medium-6 small-12 large-6"><div class="col-inner">

								<p><span class="fontSize140">Slon gỗ tại: </span><br><span class="fontSize120">64 -65 Nguyễn Phước Lan, Hòa Xuân, Cẩm Lệ, TP Đà Nẵng</span>
								</p>
							</div></div>
							<div class="col medium-6 small-12 large-6"><div class="col-inner">

								<p>
									<span>
										<span class="colorYellow fontSize120">Khonggiango.com</span> thuộc quản lý Của công ty CP XNK Mê Nam</span><br>
										<span class="fontSize120">Hotline: <strong><span class="colorRed">0935.987.356 - 0777.248.567</span></strong></span><br>
										<span class="fontSize120">Địa chỉ: 64 -65 Nguyễn Phước Lan, Hòa Xuân, Cẩm Lệ, TP Đà Nẵng</span><br>
										<span class="fontSize120">Email: Khonggiango.com@gmail.com</span><br>
										<span class="fontSize120">Zalo: Khonggiango.com</span><br><span class="fontSize120">FB: khonggiangocom</span></p>

							</div></div>

						</div>

					</div><!-- .section-content -->

				</section>

				<div class="absolute-footer dark medium-text-center text-center">
					<div class="container clearfix">


						<div class="footer-primary pull-left">
							<div class="copyright-footer">
							</div>
						</div><!-- .left -->
					</div><!-- .container -->
				</div><!-- .absolute-footer -->

			</footer>
			
		</div>
		<a id="stop" class="scrollTop">
	    	<i class="fas fa-angle-up"></i>
		</a>
		<!-- Contact -->
		<div class="call-mobile1">
			<a data-animate="fadeInDown" rel="noopener noreferrer" href="https://m.me/tynguyen19" target="_blank" class="button success" data-animated="true">
			    <span>Chat Facebook</span>
			</a>
		</div>
		<div class="call-mobile2">
			<a data-animate="fadeInDown" rel="noopener noreferrer" href="http://zalo.me/0782112327" target="_blank" class="button success" data-animated="true"> 
				<span>Chat Zalo</span>
			</a>
		</div>
		<div class="ppocta-ft-fix">
			<a href="tel:0782112327">
				<div class="hotline">
					<span class="before-hotline">Hotline:</span>
					<span class="hotline-number"> 0782.112.327</span>
				</div>
			</a>
		</div>
		<!-- End contact -->
			
	</body>
	<script>
		(function () {
			$.getScript = function(url, callback, cache)
			{
				$.ajax({
					type: "GET",
					url: url,
					success: callback,
					dataType: "script",
					cache: cache
				});
			};

			var scrollTop = $(".scrollTop");

		    $(window).scroll(function() {
				// declare variable
				var topPos = $(this).scrollTop();
				if (topPos > 500) {
					$(scrollTop).css("opacity", "1");

				} else {
					$(scrollTop).css("opacity", "0");
				}

				if(topPos > 300){
					$('.navbar-default').addClass('navbar-fixed-top');
					$('.header-nav').addClass('pdLeft15');
				}else{
					$('.navbar-default').removeClass('navbar-fixed-top');
					$('.header-nav').removeClass('pdLeft15');
				}

			});
			//Click event to scroll to top
			$(scrollTop).click(function() {
				$('html, body').animate({
					scrollTop: 0
				}, 800);
				return false;
			});
		})();
		$(document).ready(function()
		{
			$(".search_icon").click(function() {
		        $('.search_bar').fadeOut();
		        $("i", this).toggleClass("fa-search fa-close");
		    });
		    $(document).on('click', '.fa-close', function() {
		        $('.search_bar').fadeIn();
		    });
		});

	</script>
</html>

