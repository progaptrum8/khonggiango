<div class="page-wrapper page-left-sidebar">
	<div class="row">
		<div id="content" class="large-9 right col" role="main">
			<div class="page-inner">
				<?=base64_decode($content)?>
			</div>
		</div>
		<div class="large-3 col col-first col-divided">
			<div id="secondary" class="widget-area " role="complementary">
				<aside id="nav_menu-2" class="widget widget_nav_menu">
					<span class="widget-title "><span>Danh mục sản phẩm</span></span>
					<div class="is-divider small"></div>
					<div class="menu-danh-muc-san-pham-container">
						<ul id="menu-danh-muc-san-pham" class="menu">
							<?php foreach ($danhMucSP as $value){ ?>
								<li id="menu-item" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item">
									<a href="#"><?=$value->name?></a>
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
			</div>
		</div>
	</div>
</div>
