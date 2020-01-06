<?php
use yii\helpers\Url;  
?>
<div id="content" class="content-area">
	<div class="gap-element homeProduct">
		<div class="row">
			<div class="col hide-for-medium medium-3 small-12 large-3">
				<div class="col-inner">
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
			<div class="col list-product-home medium-9 small-12 large-9">
				<div class="col-inner">
					<?php foreach ($loaiSP as  $value){ ?>
						<div class="boxHomeContainer">
							<p><span class="SpanTitleProduct"><strong><?=$value['name']?></strong></span></p>
							<div class="container section-title-container">
								<h3 class="section-title section-title-center"><b></b><span class="section-title-main">sẢN PHẨM NỔI BẬT</span><b></b>
								</h3>
							</div>
							<div class="row large-columns-3 medium-columns- small-columns-2 row-small has-shadow row-box-shadow-1 row-box-shadow-2-hover">
								<?php foreach ($data as $key => $product){ ?>
									<?php if($product['id_product_type'] == $value['id']){ ?>
										<div class="col">
											<div class="col-inner">
												<div class="col-xs-6 product-small box has-hover box-normal box-text-bottom">
													<div class="box-image">
														<div class="image-cover">
															<a href="<?=Url::to(['product/detail-product','slug' => $product['slug']])?>">
																<img width="400" height="400" src="<?php if($product["thumbnail"] != "" && $product["thumbnail"] != null){ echo $product["thumbnail"]; } else { echo '/images/no-image.png'; } ?>">	
															</a>
														</div>
														<div class="image-tools top right show-on-hover">
														</div>
														<div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
														</div>
													</div><!-- box-image -->

													<div class="box-text text-center">
														<div class="title-wrapper"><p class="name product-title"><a href="<?=Url::to(['product/detail-product', 'slug' => $product['slug']])?>"><?=$product['title']?></a></p>
														</div>
														<div class="price-wrapper">
															<span class="price"><span class="amount">Liên hệ</span></span>
														</div>
													</div>
												</div>
											</div>
										</div>
									<?php } ?>
								<?php } ?>
							</div>
						</div>
					<? } ?>

				</div>
			</div>
		</div>
		<section class="section">
			<div class="bg section-bg fill bg-fill  bg-loaded">
			</div>
			<div class="section-content relative">
				<div class="row" id="row-1895157275">
					<div class="col small-12 large-12" data-animate="fadeInUp" data-animated="true"><div class="col-inner">
						<div class="container section-title-container"><h3 class="section-title section-title-normal"><b></b><span class="section-title-main" style="font-size:160%;color:rgb(255, 255, 255);">PHƯƠNG CHÂM</span><b></b></h3></div><!-- .section-title -->
						<div class="gap-element" style="display:block; height:auto; padding-top:20px"></div>
						<p><span style="font-size: 140%;">khongiango.com mong muốn trở thành đơn vị chuyên cung cấp nội thất gỗ hoàn toàn tự nhiên. Chuyên nghiệp , uy tín, giá cả cạnh tranh nhất thị trường Việt Nam</span></p>
						<div>
							<p><span style="font-size: 140%;">Đến với chúng tôi, quý khách sẽ nhận được sự tư vấn tận tình từ các nhân viên có kinh nghiệm. Mọi thắc khi mua hàng hoặc mắc trao đổi về sản phẩm xin vui lòng gọi đến số Hotline:&nbsp;<b>0935 987 356 – 0777 248 567 .&nbsp;</b>Chúng tôi&nbsp;sẽ giải đáp trong thời gian sớm nhất.</span></p>
							<p><span style="font-size: 140%;">Xin chân thành cảm ơn!</span></p>
							<div>
								<div><img src="https://sites.google.com/site/ctykhanggiaphat/_/rsrc/1498119063487/home/gt.png" border="0"></div>
								<div></div>
								<div><span style="font-size: 140%;"><span style="color: #555555;">&nbsp;Dựa trên nền tảng&nbsp;</span><b style="color: #555555;">“Uy tín – Chuyên nghiệp – Hiệu quả”</b></span></div>
								<div>
									<p><span style="font-size: 140%;">&nbsp;&nbsp; &nbsp;–&nbsp;<b>Uy tín:</b>&nbsp;Đặt lên hàng đầu, lấy uy tín làm vũ khí cạnh tranh và bảo vệ uy tín như bảo vệ danh dự.</span></p>
									<p><span style="font-size: 140%;">&nbsp;&nbsp; &nbsp;–&nbsp;<b>Chuyên nghiệp:</b>&nbsp;Làm đòn bẩy để phát triển, là động lực tạo ra các giá trị khác biệt, mang bản sắc&nbsp;riêng trong mỗi sản &nbsp;phẩm, dịch vụ.</span></p>
									<p><span style="font-size: 140%;">&nbsp;&nbsp; &nbsp;–&nbsp;<b>Hiệu quả:</b>&nbsp;Là năng suất công việc mong muốn đạt đến.</span></p>
									<p><img class="aligncenter wp-image-4820 size-full" src="/images/Untitled.png" alt="" width="1221" height="5" sizes="(max-width: 1221px) 100vw, 1221px"></p>
								</div>
							</div>
						</div>
					</div></div>
				</div>
			</div>
			
		</section>
		<section class="section">
			<div class="bg section-bg fill bg-fill  bg-loaded">
			</div><!-- .section-bg -->

			<div class="section-content relative">
				<div class="row" id="row-596167002">
					<div class="col medium-6 small-12 large-6">
						<div class="col-inner">
							<div class="icon-box featured-box icon-box-left text-left">
								<div class="icon-box-img" style="width: 75px">
									<div class="icon">
										<div class="icon-inner">
											<img width="74" height="74" src="/images/ts1.png" class="attachment-medium size-medium" alt="">
										</div>
									</div>
								</div>
								<div class="icon-box-text last-reset">
									<p><span style="font-size: 170%;"><strong>CHUYÊN NGHIỆP</strong></span></p>
									<p><span style="font-size: 140%;">chuyên gia công và cung cấp các mặt hàng thành phẩm của gỗ : trắc , hương, thủy tùng ,cẩm các loại … Bao gồm : tượng Dilac, Quan âm, Lục bình, Bình nghệ thuật lớn nhỏ các loại, bàn ghế ,nội thất.</span></p>
								</div>
							</div><!-- .icon-box -->
						</div>
					</div>
					<div class="col medium-6 small-12 large-6">
						<div class="col-inner">

							<div class="icon-box featured-box icon-box-left text-left">
								<div class="icon-box-img" style="width: 75px">
									<div class="icon">
										<div class="icon-inner">
											<img width="74" height="74" src="/images/ts3.png" class="attachment-medium size-medium" alt="">
										</div>
									</div>
								</div>
								<div class="icon-box-text last-reset">

									<p><strong><span style="font-size: 170%;">TIẾT KIỆM</span></strong></p>
									<p><span style="font-size: 140%;">Giúp quý khách hàng tiết kiệm tối đa chi phí mà vẫn lựa chọn có được những sản phẩm chất lượng với giá cả cạnh tranh.</span></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row" id="row-918558225">
					<div class="col medium-6 small-12 large-6">
						<div class="col-inner">
							<div class="icon-box featured-box icon-box-left text-left">
								<div class="icon-box-img" style="width: 75px">
									<div class="icon">
										<div class="icon-inner">
											<img width="74" height="74" src="/images/ts2.png" class="attachment-medium size-medium" alt="">
										</div>
									</div>
								</div>
								<div class="icon-box-text last-reset">

									<p><span style="font-size: 170%;"><strong>NHANH CHÓNG</strong></span></p>
									<p><span style="font-size: 140%;">Sở hữu đội ngũ nhân viên lành nghề, từng thi công nhiều cho nhiều công trình với quy mô khác nhau – đảm bảo hoàn thành đúng tiến độ công việc đã nhận.</span></p>
								</div>
							</div>
						</div>
					</div>
					<div class="col medium-6 small-12 large-6">
						<div class="col-inner">
							<div class="icon-box featured-box icon-box-left text-left">
								<div class="icon-box-img" style="width: 75px">
									<div class="icon">
										<div class="icon-inner">
											<img width="74" height="74" src="/images/ts4.png" class="attachment-medium size-medium" alt="">
										</div>
									</div>
								</div>
								<div class="icon-box-text last-reset">
									<p><strong><span style="font-size: 140%;">UY TÍN – CHẤT LƯỢNG</span></strong></p>
									<p><span style="font-size: 140%;">Với có kinh nghiệm lâu năm trong lĩnh vực sản xuất &amp; cung cấp đồ gỗ nội thất, cam kết về chất lượng các sản phẩm do đơn vị cung cấp.</span></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>