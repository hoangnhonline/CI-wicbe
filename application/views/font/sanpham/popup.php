
<script type="text/javascript" language="javascript"  src="<?= base_url('theme/js/organictabs.jquery.js') ?>" ></script>
<script type="text/javascript" language="javascript"  src="<?= base_url('theme/js/slide_item.js') ?>" ></script>
<?php
$CI = &get_instance();
$CI->load->model('M_item');
if($this->uri->segment(1)=="vn"){$sp = "Sản Phẩm";}else{$sp = "Product";}
if($this->uri->segment(1)=='en'){$cate = 'category';}else{$cate = 'danh-muc';}
if($this->uri->segment(1)=='en'){$pro = 'product';}else{$pro = 'san-pham';}
if($this->uri->segment(1)=='en'){$lg = '2';}else{$lg = '1';}
if($this->uri->segment(1)==''){$nn = 'vn';}else{$nn = $this->uri->segment(1);}

$list_lq = $CI->M_item->show_sp_lienquan($id_item,$link_con->category_id,$lg);
$cout_lq =  $CI->M_item->count_lq($link_con->category_id);
?>


<div id="breadcrumb">
	<ul class="list_bread">
		<li class="leaf_bread home"><a href="<?=site_url()?>" title="">Trang chủ</a></li>

		<li class="leaf_bread">
			<a href="<?=site_url($nn.'/'.$pro)?>" title="" <?php if(isset($last)){ ?> class="last" <?php }?>><?=$l->lang_sanpham[$lang]?></a></li>

		<?php if(isset($caregory1)) { ?>
			<li class="leaf_bread"><a <?php if(isset($last1)){ ?> class="last" <?php }?> href="<?=site_url($nn.'/'.$cate.'/'.$caregory1->category_link)?>" title=""><?=$caregory1->category_name?></a></li>
		<?php }?>

		<?php if(isset($link_last)) { ?>
			<li class="leaf_bread"><?=$link_last->category_name?></li>
		<?php } ?>

	</ul>
</div>
<div id="wrapper_content">
	<div class="content" id="content_sp">


		<div id="wrapper_content">
			<div class="content" id="content_sp">

				<div class="lay_chitiet_sp">

					<div class="top_content_sp">

						<div class="list_thumnail">
							<?php $chek = $this->M_item->other_img($item->id)?>
							<div class="thumnail_large">

								<img src="<?=  base_url($item->thumb)?>"
									 alt=""
									 title="<?=$item->item_name?>"
									/>
								<?php if(!empty($chek)){ ?>
									<?php $i=1; ?>
									<?php foreach ($chek as $r){?>
										<img src="uploads/san-pham/<?= $r->thumb ?>" alt="<?=$item->item_name.'_'.$i++?>" width="548"/>
									<?php } ?>
								<?php  }?>
							</div>

							<div class="lay_thumnail_small">
								<div class="control_thum left_thum"></div>
								<div class="thumnail_mall">
									<?php if(!empty($chek)){ ?>
										<a href="javascript:void(0)" class="small_m"><img src="<?=  base_url($item->thumb)?>" alt=""/></a>

										<?php foreach ($chek as $r){?>
											<a href="javascript:void(0)" class="small_m"><img src="<?=  base_url('uploads/san-pham/'.$r->thumb)?>" alt=""/></a>
										<?php } ?>
									<?php } ?>

								</div>

								<div class="control_thum right_thum"></div>
							</div>
						</div>


					</div>

				</div>

				<div class="info_sp">
					<h1 class="title"><?=$item->item_name?></h1>
					<div class="body">
						<?php if($item->item_summary !='') {?>
							<div class="thanhphan">
								<span class="icon_nd"></span>
								<?=$item->item_summary?>

							</div>
						<?php }?>
						<?php if($item->item_content !='') {?>
							<div class="thanhphan">
								<span class="icon_nd"></span>
								<?=$item->item_content?>

							</div>
						<?php }?>
						<?php if($item->item_thongso !='') {?>
							<div class="thanhphan">
								<span class="icon_nd"></span>
								<?=$item->item_thongso?>

							</div>
						<?php }?>
						<?php if($item->item_description !='') { ?>
							<div class="thanhphan">
								<span class="icon_nd"></span>
								<?=$item->item_description?>

							</div>
						<?php }?>
					</div>
				</div>
			</div>
			<div class="related_product">
				<div class="header">
					<h2 class="title_header"><?=$l->lang_splq[$lang]?></h2>
				</div>
				<div class="page_list_sp">
					<div class="slide_lq">


						<?php foreach($list_lq as $lq) { ?>
							<div class="item-sp slide_home">
								<?php $thumb = $CI->M_item->show_thumb($lq->id); ?>
								<a href="<?=  site_url($nn.'/'.$pro.'/'.$lq->item_link)?>"> <img class="thumnail_sp" src="<?=$thumb->thumb?>" /></a>
								<h3 class="title_sp"><a href="#"><?=$lq->item_name?></a></h3>
							</div>
						<?php } ?>

					</div>
				</div>

			</div>
		</div>
	</div>

	<script type="text/javascript">
		(function($){


			if($('.thumnail_mall .small_m').length < 4)
			{
				$('.thumnail_mall .small_m').click(function(event)
				{
					$(this).each(function(index,el){
						src = $(this).children('img').attr('src');
						$('.thumnail_large img:eq(0)').animate({opacity:0.5},600,function(){$('.thumnail_large img:eq(0)').attr('src',src)});
						$('.thumnail_large img:eq(0)').animate({opacity:1},600);
					});
				})
			}
			$('.thumnail_mall .small_m').click(function() {
				$('.thumnail_mall').trigger('slideTo', [this, 0] );
			});

			$('.lay_thumnail_small .thumnail_mall').carouFredSel({
				items: {
					minimum: 4,
					start:0
				},
				width:328,
				height:70,
				auto: false,
				next:{
					button:'.lay_thumnail_small .left_thum'
				},
				prev:{
					button:'.lay_thumnail_small .right_thum'
				},
				direction:'left',
				synchronise: ['.list_thumnail .thumnail_large', false, true],
				scroll: {
					// easing: "easeInOutQuad",
					//fx: 'crossfade',
					onBefore: function( data ) {
						data.items.old.eq(0).removeClass('selected');
						data.items.visible.eq(0).addClass('selected');
					},

					items:1,
					duration: 1000,
					pauseOnHover: true
				}
			});
			$('.list_thumnail .thumnail_large').carouFredSel({
				// synchronise: ['#antest .thumnail_mall', false, true],
				width: 392,
				height: 324,
				auto: false,

				items: 1,
				//  direction:'left',
				scroll: {
					items:1,
					fx: 'fade',
					duration: 1500
					//fx: 'directscroll'
				}
			});
			/*
			 if($('.thumnail_mall .small_m').length < 4)
			 {
			 $('.thumnail_mall .small_m').each(function(index,el)
			 {
			 src = $(this).attr('src');
			 $(this).click(function(event){
			 $('.thumnail_large img:eq(0)').animate({opacity:0.5},600,function(){$('.thumnail_large img:eq(0)').attr('src',src)});
			 $('.thumnail_large img:eq(0)').animate({opacity:1},600);
			 });
			 })
			 }
			 */
		}(jQuery));

	</script>
	<script>
		$(document).ready(function(){
			$('.slide_lq').bxSlider({
				auto: true,
				slideWidth: 192,
				mode: 'horizontal',
				minSlides: 4,
				maxSlides: 4,
				moveSlides: 1,
				slideMargin:15,
				<?php if($cout_lq >4) { ?>

				controls: true,
				<?php } else { ?>
				controls: false,

				<?php } ?>
				pager: false

			});
		});
	</script>



