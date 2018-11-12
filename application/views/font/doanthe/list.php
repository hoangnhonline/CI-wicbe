<?php
$CI = &get_instance();
$CI->load->model('M_category');
$CI->load->model('M_artice');
$CI->load->model('Title');
if($this->uri->segment(1)=='vn'){$nn = 'vn';}else{$nn= 'en';}
if($this->uri->segment(1)=='vn'){$d = 'dang-doan-the';}else{$d= 'party-union';}
if($this->uri->segment(1)=='vn'){$tin = 'tin-doan-the';}else{$tin= 'private-organizations';}

?>


<div class="wp_wp">
	<div class="wp_wp_content">
		<div class="wp_wp_content_wp">
		<div class="title_dichvu">
			<span class="home_home" ><img src="theme/images/icon_trangchu_active.png" width="27"> <a href="#"> <?=$l->lang_home[$lang]?>&nbsp;&nbsp; </a></span>
			<span class="home_home last" ><img style="margin-top: 12px" src="theme/images/arrow_bread.png" width="10"><a style="color: #f00" href="<?= site_url($lang.'/'.$l->lang_dangbo_link[$lang]) ?>"> <?=$l->lang_dangbo[$lang]?> </a></span>

		</div>
		<div class="content_all">
			<div class="content_all_all" style="width: 97%;float: left;margin-top: 5px;margin-left: 10px">
			<div class="left_content">
				<div class="icon_content"><p><?=$l->lang_dangbo[$lang]?></p></div>
					<div class="menu_content">
						<ul class="menu_child">
							<?php foreach ($CI->M_category->list_category_all(array('category.category_top' => 0, 'category.category_type' => 7),$nn) as $row) { ?>

							<li><span class="icon_tt <?php if($this->uri->segment(3)==$row->category_link) {echo 'icon_tt_h';} ?> "></span>
								<a class="<?php if($this->uri->segment(3)==$row->category_link) {echo 'icon_tt_h_c';} ?>" href="<?=site_url($nn.'/'.$d.'/'.$row->category_link)?>"><?=$row->category_name?></a> </li>
							<?php } ?>
						</ul>

					</div>

			</div>


				<div class="right_content">
					<?php $i=1; ?>
<?php foreach($list as $t){ ?>
					<div style="<?php if($i%2==0){echo 'float:right';} ?>" class="tin_child <?=$i++;?>">
						<?php $thumb = $CI->M_artice->show_thumb($t->id)  ?>
					<a href="<?=site_url($nn.'/'.$tin.'/'.$t->article_link)?>">	<img src="<?=$thumb->thumb?>" width="155" height="125"/></a>
						<div class="title_summary_tt">
							<a href="<?=site_url($nn.'/'.$tin.'/'.$t->article_link)?>"><?=$t->article_name?></a>
							<span class="sumary_tt">
								<?=$CI->Title->laychuoi($t->article_summary,400)?>
							</span>
							<span class="sumary_tt_rp">
								<?=$CI->Title->laychuoi($t->article_summary,100)?>
							</span>
							<span class="icon_ct"><a href="<?=site_url($nn.'/'.$tin.'/'.$t->article_link)?>"><?=$l->lang_ct[$lang]?><span class="icon_ct_ct"></span></a> </span>
						</div>

						<span class="border_bottom"></span>
					</div>
<?php } ?>
				</div>
			</div>
			<?php if(isset($dangbo))  {?>
			<p id="thanhphantrang"><?=$link?></p>
			<span style="clear: both;height: 20px;width: 100%;float: left"></span>
			<?php } ?>
		</div>
			<div class="bt_ft"></div>
	</div>
	</div>
</div>

<style>


</style>