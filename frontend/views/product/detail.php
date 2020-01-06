<?php
use yii\helpers\Url;  
?>
	<div class="page-title shop-page-title product-page-title">
		<div class="page-title-inner flex-row medium-flex-wrap container">
		  	<div class="flex-col flex-grow medium-text-center">
		  		<div class="is-small">
					<nav class="woocommerce-breadcrumb breadcrumbs"><a href="/shop">Shop</a>
						<span class="divider">/</span> 	
						<a href="<?=Url::to(['product/product-of-danh-muc' , 'slug' => $dataProduct['slugDanhMuc'] ])?>"><?=$dataProduct['nameDanhMuc']?>
						</a>
					</nav>
				</div>
		 	</div>
		  
		    <div class="flex-col medium-text-center">
		    	<ul class="next-prev-thumbs is-small ">
		    		<?php if($previousProduct && count($previousProduct) > 0) { ?>
			    		<li class="prod-dropdown has-dropdown">
				    		<a href="<?=Url::to(['product/detail-product','slug' => $previousProduct['slug']])?>" rel="next" class="button icon is-outline circle">
				    			<i class="fas fa-arrow-left"></i>
				    		</a>
			    			<div class="nav-dropdown">
			    				<a title="<?=$previousProduct['title']?>" href="<?=Url::to(['product/detail-product','slug' => $previousProduct['slug']])?>">
			    					<img class="imgProductSmall" src="<?=$previousProduct['thumbnail']?>"></a>
		    				</div>
		    			</li>
	    			<?php } ?>
	    			<?php if($nextProduct && count($nextProduct) > 0) { ?>
		    			<li class="prod-dropdown has-dropdown">
		    				<a href="<?=Url::to(['product/detail-product','slug' => $nextProduct['slug']])?>" rel="next" class="button icon is-outline circle">
		    					<i class="fas fa-arrow-right"></i>
		    				</a>
	    					<div class="nav-dropdown">
	    						<a title="<?=$nextProduct['title']?>" href="<?=Url::to(['product/detail-product','slug' => $nextProduct['slug']])?>">
	    							<img class="imgProductSmall" src="<?=$nextProduct['thumbnail']?>">
	    						</a>
							</div>
						</li>
					<?php } ?>
				</ul>
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
					<div class="row">
						<div class="large-6 col">
							<div class="product-images relative mb-half has-hover woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images" data-columns="4" style="opacity: 1;">
								<figure class="woocommerce-product-gallery__wrapper product-gallery-slider slider slider-nav-small mb-half flickity-enabled" tabindex="0">
									<div class="flickity-viewport" style="height: 323px; touch-action: pan-y;">
										<div class="flickity-slider" style="left: 0px; transform: translateX(0%);">
											<div class="woocommerce-product-gallery__image slide first is-selected" aria-selected="true" style="position: absolute; left: 0%;">
												<a href="">
													<img width="550" height="550" src="<?=$imagesProduct[0]['dirPath']?>" class="wp-post-image skip-lazy" alt="" title="<?=$dataProduct['title']?>" sizes="(max-width: 550px) 100vw, 550px">
												</a>
											</div>
										</div>
									</div><button class="flickity-button flickity-prev-next-button previous" type="button" disabled="" aria-label="Previous"><svg class="flickity-button-icon" viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" class="arrow"></path></svg></button><button class="flickity-button flickity-prev-next-button next" type="button" disabled="" aria-label="Next"><svg class="flickity-button-icon" viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" class="arrow" transform="translate(100, 100) rotate(180) "></path></svg></button>
  								</figure>

								<div class="image-tools absolute bottom left z-3">
									<a class="hidden zoom-button button is-outline circle icon tooltip hide-for-small tooltipstered">
										<i class="icon-expand"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="product-info summary entry-summary col col-fit product-summary">
							<h1 class="product-title product_title entry-title"><?=$dataProduct['title']?></h1>
							<div class="is-divider small"></div>
							<div class="price-wrapper">
								<p class="price product-page-price ">
									<span class="amount">Liên hệ</span>
								</p>
							</div>
							<a data-toggle="modal" data-target="#purchase" class="devvn_buy_now devvn_buy_now_style">
								<strong>Mua ngay</strong>
								<span>Gọi điện xác nhận và giao hàng tận nơi</span>
							</a>
							<div class="social-icons share-icons share-row relative icon-style-outline ">
								<a href="whatsapp://send?text=<?=$dataProduct['slug']?> - <?=Yii::$app->request->getUrl();?>" data-action="share/whatsapp/share" class="icon button circle is-outline tooltip whatsapp show-for-medium tooltipstered">
									<i class="icon-phone"></i>
								</a>
								<a title="Share on facebook" href="//www.facebook.com/sharer.php?u=<?=Yii::$app->request->getUrl();?>" data-label="Facebook" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" rel="noopener noreferrer nofollow" target="_blank" class="icon button circle is-outline tooltip facebook tooltipstered">
									<i class="fab fa-facebook-f"></i>
								</a>
								<a title="Share on Twitter" href="//twitter.com/share?url=<?=Yii::$app->request->getUrl();?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" rel="noopener noreferrer nofollow" target="_blank" class="icon button circle is-outline tooltip twitter tooltipstered">
									<i class="fab fa-twitter"></i>
								</a>
								<a title="Email to a friend" href="mailto:enteryour@addresshere.com?subject=<?=$dataProduct['slug']?>&amp;body=Check%20this%20out:%20<?=Yii::$app->request->getUrl();?>" rel="nofollow" class="icon button circle is-outline tooltip email tooltipstered">
									<i class="fas fa-envelope-square"></i>
								</a>
								<a title="Pin on pinterest" href="//pinterest.com/pin/create/button/?url=<?=Yii::$app->request->getUrl();?>&amp;media=<?=Url::to('@web').$dataProduct['thumbnail'];?>&amp;description=<?=$dataProduct['slug']?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" rel="noopener noreferrer nofollow" target="_blank" class="icon button circle is-outline tooltip pinterest tooltipstered">
									<i class="fab fa-pinterest"></i>
								</a>
								<a href="//plus.google.com/share?url=<?=Yii::$app->request->getUrl();?>" target="_blank" class="icon button circle is-outline tooltip google-plus tooltipstered" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" rel="noopener noreferrer nofollow">
									<i class="fab fa-google-plus-g"></i>
								</a>
								<a href="//www.linkedin.com/shareArticle?mini=true&amp;url=<?=Yii::$app->request->getUrl();?>&amp;title=<?=$dataProduct['slug']?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" rel="noopener noreferrer nofollow" target="_blank" class="icon button circle is-outline tooltip linkedin tooltipstered">
									<i class="fab fa-linkedin-in"></i>
								</a>
							</div>
						</div><!-- .summary -->
					</div><!-- .row -->
					<div class="product-footer">
						<div class="woocommerce-tabs container tabbed-content">
							<ul class="product-tabs small-nav-collapse tabs nav nav-uppercase nav-line nav-left">
								<li class="reviews_tab active">
									<a href="#tab-reviews">Đánh giá (<?=count($feedbacks)?>)</a>
								</li>
							</ul>
							<div class="tab-panels">
								<div class="panel entry-content active" id="tab-reviews">
									<div class="row" id="reviews">
										<div class="col large-12" id="comments">
											<h3 class="normal">Đánh giá</h3>
											<?php if(count($feedbacks) == 0){ ?>
												<p class="woocommerce-noreviews">Chưa có đánh giá nào.</p>
											<?php } ?>
										</div>
										<div id="review_form_wrapper" class="large-12 col">
											<div class="commentContainer">
											<?php $i = 0; foreach ($feedbacks as $value) { if($i < 3){ ?>
												<!-- Comment box -->
													<div class="row commentBox">
														<div class="col-md-12 col-xs-12">
															<section class="comment-list">
																<article class="row">
																	<div class="boxAvatar hidden-xs"">
																		<figure class="avatarCustomer">
																			<img class="img-responsive" src="/images/user.png" />
																		</figure>
																	</div>
																	<div class="col-md-10 col-sm-10 pdLeft0">
																		<div class="panelBoxCmt panel-default">
																			<div class="panel-body-custom">
																				<strong><?=$value['fullname']?>:</strong>
																				<header class="text-left">
																					<time class="comment-date font11"><i class="far fa-clock"></i> <?=date('d/m/Y g:i:s A', strtotime($value['created_date']));?></time>
																				</header>
																				<div class="comment-post">
																					<p class="font11">
																						<?=$value['comment']?>
																					</p>
																				</div>
																			</div>
																		</div>
																	</div>
																</article>
															</section>
														</div>
													</div>
												<!-- End comment box -->
												<?php $i++; } } ?>
											</div>
											<?php if(count($feedbacks) > 3){ ?>
												<div class="row loadMoreComment">
													<div class="col-xs-12 loadMore textCenter">
														<a onclick="product.loadMoreComment(this, <?=$dataProduct['id']?>);">
															<img class="loadMoreImg hidden" src="/images/spinner.gif">
															<span>Xem thêm bình luận</span>
														</a>
													</div>
												</div>
											<?php } ?>
											<div id="review_form" class="col-inner">
												<div class="review-form-inner has-border">
													<div id="respond" class="comment-respond">
														<?php if(count($feedbacks) > 0) { ?>
															<h3 id="reply-title" class="comment-reply-title">Nhận xét sản phẩm “<?=$dataProduct['title']?>”
														<?php } else { ?>
															<h3 id="reply-title" class="comment-reply-title">Hãy là người đầu tiên nhận xét sản phẩm“<?=$dataProduct['title']?>”
															</h3>
														<?php } ?>
														<div class="formComment">
															<form method="post" id="commentForm" class="comment-form">
																<p class="comment-form-comment pComment">
																	<label for="comment">Nhận xét của bạn&nbsp;
																		<span class="required">*</span>
																	</label>
																	<textarea class="textInput" id="comment" name="comment" cols="45" rows="8" required=""></textarea>
																</p>
																<p class="comment-form-author pComment">
																	<label for="author">Tên&nbsp;
																		<span class="required">*</span>
																	</label>
																	<input class="textInput" id="author" name="author" type="text">
																</p>
																<p class="comment-form-email pComment">
																	<label for="email">Email&nbsp;
																		<span class="required">*</span>
																	</label>
																	<input id="email" class="textInput" name="email" type="email" value="" size="30">
																</p>
																<input type="hidden" name="productId" value="<?=$dataProduct['id']?>">
																<p class="form-submit">
																	<button class="btn btn-primary" type="button" onclick="product.sendFeedback();">Gửi đi</button>
																</p>
															</form>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<h3 class="product-section-title container-width product-section-title-related pt-half pb-half uppercase">Sản phẩm tương tự</h3>
							<?php if(count($sameProducts) > 3){ ?>
								<div class="col-xs-12 mgBot10">
									<a class="pull-right see-more" href="<?=Url::to(['product/product-of-type','slug' => $dataProduct['slugProductType']])?>">Xem thêm</a>
								</div>
							<?php } ?>
							<div class="col-xs-12">
								<?php
									$i = 0;
									foreach ($sameProducts as $value) {  ?>
									<?php if($i < 3) { ?><!-- Only show 3 same product  -->
										<div class="col-xs-4">
											<div class="product-small col has-hover product type-product status-publish has-post-thumbnail product_cat-ban-ghe-phong-khach instock shipping-taxable product-type-simple is-selected" aria-selected="true">
												<div class="col-inner">
													<div class="badge-container absolute left top z-1"></div>
													<div class="product-small box ">
														<div class="box-image">
															<div class="image-none">
																<a href="<?=Url::to(['product/detail-product','slug' => $value['slug']])?>">
																	<img src="<?php if($value["thumbnail"] != "" && $value["thumbnail"] != null){ echo $value["thumbnail"]; } else { echo '/images/no-image.png'; } ?>" class="thumb-product">	
																</a>
															</div>
															<div class="image-tools is-small top right show-on-hover">
															</div>
															<div class="image-tools is-small hide-for-small bottom left show-on-hover">
															</div>
															<div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
															</div>
														</div><!-- box-image -->

														<div class="box-text box-text-products text-center grid-style-2">
															<div class="title-wrapper">
																<p class="name product-title">
																	<a href="<?=Url::to(['product/detail-product','slug' => $value['slug']])?>"><?=$value['title']?></a>
																</p>
															</div>
															<div class="price-wrapper">
																<span class="price"><span class="amount">Liên hệ</span></span>
															</div>
														</div><!-- box-text -->
													</div><!-- box -->
												</div><!-- .col-inner -->
											</div>
										</div>
									<?php } ?>
								<?php $i++; } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="devvn-popup-quickbuy modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="z-index: 9999;">
	<div class="devvn-popup-inner modal-dialog modal-dialog-centered noTopLeft">
		<div class="devvn-popup-title">
			<span>Đặt mua <?=$dataProduct['title']?></span>
			<button type="button" class="devvn-popup-close" data-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="devvn-popup-content">
			<div class="devvn-popup-content-left ">
				<div class="devvn-popup-prod">
					<div class="devvn-popup-img">
						<img src="<?php if($dataProduct["thumbnail"] != "" && $dataProduct["thumbnail"] != null){ echo $dataProduct["thumbnail"]; } else { echo '/images/no-image.png'; } ?>" alt="">
					</div>
					<div class="devvn-popup-info">
						<span class="devvn_title"><?=$dataProduct['title']?></span>
						<span class="devvn_price"><span class="amount">Liên hệ</span></span>
					</div>
				</div>
				<div class="devvn_prod_variable" data-simpleprice=""></div>
				Lưu ý: Chi phí vận chuyển trên là tạm tính, có thể thay đổi đôi chút.
			</div>
			<div class="devvn-popup-content-right">
				<form id="purchaseForm">
					<div class="popup-customer-info">
						<div class="popup-customer-info-title">Thông tin người mua</div>
						<div class="popup-customer-info-group popup-customer-info-radio">
							<label>
								<input type="radio" name="customer-gender" value="1" checked="">
								<span>Anh</span>
							</label>
							<label>
								<input type="	
								radio	
								name	
								customer-gender	
								value	
								2	
								type">
								<span>Chị</span>
							</label>
						</div>
						<div class="popup-customer-info-group">
							<div class="popup-customer-info-item-2 inputFieldCustom">
								<input type="text" class="customer-name" name="customerName" id="customerName" placeholder="Họ và tên">
							</div>
							<div class="popup-customer-info-item-2 inputFieldCustom">
								<input type="text" class="customer-phone" name="customerPhone" id="customerPhone" placeholder="Số điện thoại">
							</div>
						</div>
						<div class="popup-customer-info-group">
							<div class="popup-customer-info-item-1 inputFieldCustom">
								<input type="text" class="customer-email" name="customerEmail" id="customerEmail" placeholder="Địa chỉ email">
							</div>
						</div>
						<div class="popup-customer-info-group">
							<div class="popup-customer-info-item-1 inputFieldCustom">
								<textarea class="customer-address" name="customerAddress" id="customerAddress" placeholder="Địa chỉ nhận hàng "></textarea>
							</div>
						</div>
						<div class="popup-customer-info-group">
							<div class="popup-customer-info-item-1 inputFieldCustom">
								<textarea class="order-note" name="orderNote" id="orderNote" placeholder="Ghi chú đơn hàng (Không bắt buộc)"></textarea>
							</div>
						</div>
						<div class="popup-customer-info-group">
							<div class="popup-customer-info-item-1 popup_quickbuy_shipping">
								<div class="popup_quickbuy_shipping_title">Tổng: <?=$dataProduct['price']?></div>
								<div class="popup_quickbuy_total_calc"></div>
							</div>
						</div>
						<div class="popup-customer-info-group">
							<div class="popup-customer-info-item-1">
								<button type="button" onclick="product.orderProduct();" class="devvn-order-btn">Đặt hàng ngay</button>
							</div>
						</div>
						<div class="popup-customer-info-group">
							<div class="popup-customer-info-item-1">
								<div class="devvn_quickbuy_mess"></div>
							</div>
						</div>
					</div>
					<input type="hidden" name="productId" value="<?=$dataProduct['id']?>">
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#purchase').on('hidden.bs.modal', function() {
	    	$('#purchaseForm input').val("");
			$('#purchaseForm textarea').val("");
	  	});
	});
</script>
