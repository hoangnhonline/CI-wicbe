<?php
$CI = &get_instance();
$CI->load->model('M_category');
$CI->load->model('M_artice');

if($this->uri->segment(1)==''){$nn = 'vn';}else{ $nn = $this->uri->segment(1);}
$list_about_home = $CI->M_artice->show_list_page_abouts(array('article.article_type'=>1,'article.article_status'=>1),$nn);
$list_dv_home = $CI->M_category->list_category_all(array('category.category_top' => 0, 'category.category_type' => 1),$nn);
$list_news_home = $CI->M_category->list_category_all(array('category.category_top' => 0, 'category.category_type' => 3),$nn);
$list_news_home_nb = $CI->M_artice->show_list_new_home(array('article.article_status'=>1,'article.article_type'=>4,'article.article_hot'=>1),5,0,$nn);
$list_giaoduc_home = $CI->M_category->list_category_all(array('category.category_top' => 0, 'category.category_type' => 4),$nn);
$i=1;
?>




<div id="content_content">
    <div class="content_content">
	 <div class="home_detail">
	     <a href="<?=site_url($lang.'/'.$l->lang_home_link[$lang])?>" class="herf_a_home_detail"><p class="icon_home_detail"></p> <?=$l->lang_home[$lang]?></a>
	     <span class="icon_arrow_detail"></span>
	     <a href="<?php if(isset($giaoduc)) { ?> <?=site_url($lang.'/'.$l->lang_giaoduc_link[$lang])?> <?php }?><?php if(isset($thuvien)) { ?> <?=site_url($lang.'/'.$l->lang_thuvien_link[$lang])?> <?php }?> " class="row_detail">
		  <?php if(isset($giaoduc)) { ?> <?=$l->lang_giaoduc[$lang]?> <?php }?>
		  <?php if(isset($thuvien)) { ?><?=$l->lang_thuvien[$lang]?> <?php }?>
	     </a>

	 </div>



	 <div class="right_content">
	     <?php foreach($list as $r) { ?>
		  <div class="child_row_list" style="<?php if($i%3==0) {echo "margin-right:0px";} ?><?php if($i > 3){echo 'margin-top:10px';} ?>">
		      <a href="<?=site_url($lang.'/'.$r->name_link)?>"> <img src="<?= base_url() ?>timthumb.php?src=<?= base_url() ?><?=$r->thumb ?>&w=225&h=150&zc=1"></a>

		      <a href="<?=site_url($lang.'/'.$r->name_link)?>" class="name_title"><?=$r->name?></a>
		  </div>
		  <?php $i ++; }?>

	     <p id="thanhphantrang"><?=$link?></p>




	 </div>
    </div>
</div>