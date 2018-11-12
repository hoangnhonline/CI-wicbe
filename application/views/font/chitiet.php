    
   <script type="text/javascript" language="javascript"  src="<?= base_url('theme/js/organictabs.jquery.js') ?>" ></script>
<?php 
$CI = &get_instance();
$CI->load->model('M_item');
if($this->uri->segment(1)=="vn"){$sp = "Sản Phẩm";}else{$sp = "Product";}
if($this->uri->segment(1)=='en'){$cate = 'category';}else{$cate = 'danh-muc';}
if($this->uri->segment(1)=='en'){$pro = 'product';}else{$pro = 'san-pham';}
if($this->uri->segment(1)=='en'){$lg = '2';}else{$lg = '1';}
if($this->uri->segment(1)==''){$nn = 'vn';}else{$nn = $this->uri->segment(1);}

$list_lq = $CI->M_item->show_sp_lienquan($id_item,$linkdm->category_id,$lg);

?>

<div class="wp_chitiet">
   <div class="link_home"><span class="icon_menu_chitiet">&nbsp;</span><a href="<?= site_url()?>">&nbsp;<?=$sp?>&nbsp;</a> >> 
       <a class="dmcon_h" href="<?=  site_url($nn.'/'.$cate.'/'.$linkdm->category_link)?>">&nbsp;<?=$linkdm->category_name?>&nbsp;</a> 
    <div class="wp_chitiet_wp">
        
   <?php $this->load->view('font/sanpham/test') ?>
    
    <div style="clear: both"></div>
    
  <?php if(!empty($list_lq)) { ?>
    <div class="spkhac"><?= $l->lang_splq[$lang]?></div>
          <span class="white"></span>
         
          <div class="slide_item">
             
              <div class="slider_slide">
                  <?php foreach ($list_lq as $lq){ ?>
                 
                  <a href="<?=  site_url($nn.'/'.$pro.'/'.$lq->item_link)?>">
                      <P> <?=$lq->item_name?></P>
                      <?php $thumb = $CI->M_item->show_thumb($lq->id); ?>
                      <img src="<?=$thumb->thumb?>">
                  </a>
                  <?php }?>
              </div>
               
          </div>
          <?php } ?>
          <div style="clear: both;height: 20px"></div>
         </div>
    </div>
    </div>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53c4d2816723a67c" async="async"></script>



 <script>
        $(function() {
    
            $("#example-one").organicTabs();
            
            $("#example-two").organicTabs({
                "speed": 200
            });
    
        });
    </script>



<!--

<div val="tên văn bản" class="downloadvb"><img style="vertical-align:middle;" src="images/btndowload_03.png" /> &nbsp;Tập tin văn bản: Tên văn bản</div>
    <div class="bordervb"></div>
    <div style="position:relative; margin-bottom:15px">
    <iframe src="link văn bản" style="width:640px; height:800px;" frameborder="0"></iframe> 
-->
