<?php 
$CI = &get_instance();
$CI->load->model('M_category');
if($this->uri->segment(1)==''){$nn = 'vn';}else{$nn = $this->uri->segment(1);}
if($this->uri->segment(1)=='en'){$cate = 'category';}else{$cate = 'danh-muc';}
$listdm = $CI->M_category->list_category_all(array('category.category_top' => 0,'category.category_type' =>1),$nn);

?>


<?php $i=1; ?>
<?php foreach ($listdm as $row) { ?>

<div class="item_menu <?php if($this->uri->segment(3)==$row->category_link || $product==$row->category_link ){echo 'item_menu_hover';} ?>">
                <div class="thum_wp">
					<div class="thumnail_menu">
						<a href="<?= site_url($nn.'/'.$cate.'/'.$row->category_link) ?>"><img src="<?=$row->icon?>" alt="" height="26" width="80"/></a>
					</div>
                    </div>
               
    <div class="text_menu <?php if($this->uri->segment(3)==$row->category_link || $product==$row->category_link){echo 'text_menu_hover';} ?>">
        <a class="<?php if($this->uri->segment(3)==$row->category_link || $product==$row->category_link){echo 'name_menu';} ?>" href="<?= site_url($nn.'/'.$cate.'/'.$row->category_link) ?>">
            <span class="trim"><?=$row->category_name?></span></a>
                      
                     <span class="icon_menu_cha <?php if($this->uri->segment(3)==$row->category_link || $product==$row->category_link){echo 'icon_menu_cha_h';} ?>"></span></div>  
            
               <li class="current1">
						
						<ul>
                                                     <?php foreach ($CI->M_category->list_category_chill($row->id,$nn) as $dmcon) { ?>
             <li><a href="<?=  site_url($nn.'/'.$row->category_link.'/'.$dmcon->category_link)?>"><?=$dmcon->category_name?></a></li>
                                                     <?php } ?>
						</ul>
					</li>
	</div>
<?php } ?>