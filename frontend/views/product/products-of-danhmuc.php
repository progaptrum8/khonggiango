<?php
use yii\helpers\Url;
?>
	<div class="page-title shop-page-title product-page-title">
		<div class="page-title-inner flex-row medium-flex-wrap container">
		  	<div class="flex-col flex-grow medium-text-center">
		  		<div class="is-small">
					<nav class="woocommerce-breadcrumb breadcrumbs"><a href="/shop">Shop</a>
						<span class="divider">/</span> 	
						<a href="<?=Url::to(['product/product-of-danh-muc' , 'slug' => $slugProductType ])?>">
							<?=$nameDanhMuc?>
						</a>
					</nav>
				</div>
		 	</div>
		  <!-- onchange="product.sortProducts();" -->
		 	<div class="flex-col medium-text-center">
		 		<p class="woocommerce-result-count hide-for-medium">Hiển thị một kết quả duy nhất</p>
		 		<form class="woocommerce-ordering" id="formSort" method="get">
		 			<select name="orderBy" class="orderby">
		 				<option value="menu_order" selected">Thứ tự mặc định</option>
		 				<option value="popularity">Thứ tự theo mức độ phổ biến</option>
		 				<option value="date">Mới nhất</option>
		 				<option value="price">Thứ tự theo giá: thấp đến cao</option>
		 				<option value="price-desc">Thứ tự theo giá: cao xuống thấp</option>
		 			</select>
		 			<input type="hidden" name="pageSize" value="1">
		 		</form>
		 	</div>
		</div>
	</div>
	<div class="product type-product status-publish has-post-thumbnail first instock shipping-taxable product-type-simple">
		<div class="product-content">
			<div class="row content-row row-divided row-large">
				<div id="product-sidebar" class="col large-3 hide-for-medium shop-sidebar ">
					<ul class="sidebar-wrapper ul-reset ">
						<aside id="nav_menu-2" class="widget widget_nav_menu">
							<span class="widget-title ">
								<span>Danh mục sản phẩm</span>
							</span>
							<div class="is-divider small"></div>
							<div class="menu-danh-muc-san-pham-container">
								<ul id="menu-danh-muc-san-pham" class="menu">
									<?php foreach ($danhMucSP as $value) { ?>
										<li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat">
											<a href="<?=Url::to(['product/product-of-danh-muc' , 'slug' => $value['slug'] ])?>"><?=$value['name']?></a>
										</li>
									<?php } ?>
								</ul>
							</div>
						</aside>
						<aside id="text-19" class="widget widget_text">
							<div class="textwidget"><div><b><span style="color: #3d85c6; font-size: large;">HỖ TRỢ TRỰC TUYẾN</span></b></div>
							<div><img src="/images/online_fpt.gif"></div>
							<div>
								<div><span style="font-size: xx-large; color: #ed1c24;"><b>0782112327</b></span></div>
								<div>
									<div><b><span style="color: #3d85c6; font-size: large;">HỖ TRỢ TRỰC TUYẾN</span></b></div>
									<div><img src="/images/online_fpt.gif"></div>
									<div>
										<div></div>
									</div>
									<div>
										<div><span style="font-size: xx-large; color: #ed1c24;"><b>0782112327</b></span></div>
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
				<div class="col large-9">
					<div class="shop-container">
						<div class="products row row-small large-columns-4 medium-columns-3 small-columns-2 has-shadow row-box-shadow-1 row-box-shadow-1-hover">
							<?php foreach ($dataProducts as $value){ ?>
								<div class="product-small col has-hover post-4849 product type-product status-publish has-post-thumbnail product_cat-ban-ghe-phong-khach first instock shipping-taxable product-type-simple">
									<div class="col-inner">
										<div class="badge-container absolute left top z-1"></div>
										<div class="product-small box ">
											<div class="box-image">
												<div class="image-none">
													<a href="http://khonggiango.com/shop/salon-go-do-hoang-gia/">
														<img class="productImg600" src="http://khonggiango.com/wp-content/uploads/2019/03/salon-go-hoang-gia-1-600x600.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail">
													</a>
												</div>
												<div class="image-tools is-small top right show-on-hover"></div>
												<div class="image-tools is-small hide-for-small bottom left show-on-hover"></div>
												<div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover"></div>
											</div><!-- box-image -->

											<div class="box-text box-text-products text-center grid-style-2">
												<div class="title-wrapper"><p class="name product-title"><a href="http://khonggiango.com/shop/salon-go-do-hoang-gia/">Salon gỗ đỏ Hoàng Gia</a></p></div><div class="price-wrapper">
													<span class="price"><span class="amount">Liên hệ</span></span>
												</div>
											</div>
										</div><!-- box -->
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
