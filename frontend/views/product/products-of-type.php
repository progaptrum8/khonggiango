<?php
use yii\helpers\Url;
use app\components\CustomPagination;
?>
<div class="headerPage">
	<div class="row">
		<div class="col-sm-6 col-md-6 leftHeaderPage">
			<div class="is-small mgTop10">
				<nav class="woocommerce-breadcrumb breadcrumbs"><a href="/shop/index">Shop</a>
					<span class="divider">/</span> 	
					<span class="boldText"><?=$nameProductType?></span>
				</nav>
			</div>
		</div>
		<div class="col-sm-6 col-md-6 rightHeaderPage">
			<div class="sort">
		 		<p class="col-sm-6 col-md-6 pd0 textSort">Hiển thị một kết quả duy nhất</p>
		 		<form class="col-sm-6 col-md-6 pd0 formSort pull-right" id="formSort">
		 			<select class="orderby" onchange="product.changeSort();">
		 				<option <?=$sort == 'default' ? 'selected' : ''?> value="default">Thứ tự mặc định</option>
		 				<option <?=$sort == 'popularity' ? 'selected' : ''?> value="popularity">Thứ tự theo mức độ phổ biến</option>
		 				<option <?=$sort == 'date' ? 'selected' : ''?> value="date">Mới nhất</option>
		 				<option <?=$sort == 'price' ? 'selected' : ''?> value="price">Thứ tự theo giá: thấp đến cao</option>
		 				<option <?=$sort == 'price-desc' ? 'selected' : ''?> value="price-desc">Thứ tự theo giá: cao xuống thấp</option>
		 			</select>
		 			<input type="hidden" id="slugPage" value="<?=$slugPage?>">
		 			<input type="hidden" id="pageType" value="productType">
		 		</form>
		 	</div>
		</div>
	</div>
</div>
<div id="main">
	<div class="row category-page-row">
		<div class="col large-3 hide-for-medium">
			<div id="shop-sidebar" class="sidebar-inner col-inner">
				<ul class="sidebar-wrapper ul-reset ">
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
		</div>
		<div class="col large-9">
			<div class="shop-container">
				<div class="products row row-small large-columns-4 medium-columns-3 small-columns-2 has-shadow row-box-shadow-1 row-box-shadow-1-hover">
					<?php if(count($dataProducts) > 0){ ?>
						<?php foreach ($dataProducts as $item){ ?>
							<div class="product-small col has-hover product type-product instock shipping-taxable product-type-simple">
								<div class="col-inner">
									<div class="product-small box ">
										<div class="box-image">
											<div class="image-none">
												<a href="<?=Url::to(['product/detail-product','slug' => $item['slug']])?>">
													<img class="boxImgDanhMuc" src="<?php if($item["thumbnail"] != "" && $item["thumbnail"] != null){ echo $item["thumbnail"]; } else { echo '/images/no-image.png'; } ?>">
												</a>
											</div>
											<div class="box-text box-text-products text-center grid-style-2">
												<div class="title-wrapper">
													<p class="name product-title">
														<a href="<?=Url::to(['product/detail-product','slug' => $item['slug']])?>"><?=$item['title']?></a>
													</p>
												</div>
												<div class="price-wrapper">
													<span class="price"><span class="amount">Liên hệ</span></span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
					<?php } else{ ?>
						<p>Chưa có sản phẩm.</p>
					<?php } ?>
				</div>
			</div>
			<div class="col-md-7 text-right">
                <?php
                echo CustomPagination::widget([
                    'pagination' => $pages,
                ]);
                ?>
            </div>  
		</div>
	</div>
</div>