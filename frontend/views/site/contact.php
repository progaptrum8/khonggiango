<?php
use yii\helpers\Url;  
?>
<div id="main" class="page-wrapper">
	<div class="row category-page-row">
		<div class="col-xs-12 col-sm-3 col-md-3">
			<div id="shop-sidebar" class="sidebar-inner col-inner">
				<ul class="danhMuc">
					<aside id="nav_menu-2" class="widget widget_nav_menu">
						<span class="widget-title "><span>Danh mục sản phẩm</span></span>
						<div class="menu-danh-muc-san-pham-container">
							<ul id="menu-danh-muc-san-pham" class="menu">
								<?php foreach ($danhMucSP as $value){ ?>
									<li id="menu-item" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item">
										<a href="<?=Url::to(['product/product-of-danh-muc' , 'slug' => $value['slug'] ])?>"><?=$value['name']?></a>
									</li>
								<?php } ?>
							</ul>
						</div>
					</aside>
					<aside id="text-19" class="widget widget_text">
						<div class="textwidget"><div><b><span class="widgetStyle">HỖ TRỢ TRỰC TUYẾN</span></b></div>
						<div><img src="/images/online_fpt.gif"></div>
						<div>
							<div><span class="phoneStyle"><b>0782112327</b></span></div>
							<div>
								<div><b><span class="widgetStyle">HỖ TRỢ TRỰC TUYẾN</span></b></div>
								<div><img src="/images/online_fpt.gif"></div>
								<div>
									<div></div>
								</div>
								<div>
									<div><span class="phoneStyle"><b>0782112327</b></span></div>
								</div>
							</div>
						</div>
						</div>
					</aside>
					<aside id="text-20" class="widget widget_text">
						<div class="textwidget">
							<p><img src="/images/hdmuahang.PNG"></p>
							<p>&nbsp;</p>
							<p><a href="/site/cash"><img class="aligncenter" src="/images/can-stock-photo_csp7216985.jpg" alt="Thanh toán mua hàng"></a></p>
						</div>
					</aside>
				</ul>
			</div>
		</div>
		<div class="col-xs-12 col-sm-9 col-md-9" role="main">
			<div class="page-inner">
				<?=base64_decode($content)?>
			</div>
		</div>
	</div>
</div>