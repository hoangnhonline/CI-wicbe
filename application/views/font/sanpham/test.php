<link type="text/css" rel="stylesheet" media="all" href="<?= base_url('theme/css/all.min.css') ?>"/>
<script type="text/javascript" language="javascript"  src="<?= base_url('theme/js/jquery.magnific-popup.min.js') ?>" ></script>

<?php
$CI = &get_instance();
$CI->load->model('M_category');
if($this->uri->segment(1)==''){$nn = 'vn';}else{$nn = $this->uri->segment(1);}
if($this->uri->segment(1)=='en'){$cate = 'category';}else{$cate = 'danh-muc';}
$listdm = $CI->M_category->list_category_all(array('category.category_top' => 0,'category.category_type' =>1),$nn);


?>

<style>
    .cate:last-child{display: none}
</style>
    <div class="list_menu_item">
        <?php foreach ($listdm as $rdc) {?>
        <a href="<?=  site_url($nn.'/'.$cate.'/'.$rdc->category_link)?>" class="<?php if($rdc->category_link==$linkdm->category_link) {?>menu_i_t<?php }?>">
            <span class="icon_list_"></span><?=$rdc->category_name?>
        </a>
        <?php }?>
    </div>
<?php $dmc = $CI->M_category->list_category_chill($linkdm->category_id,$nn) ?>
<?php if(!empty($dmc)) { ?>
  <div class="link_chitiet">
       <?php foreach ($dmc as $dmcon) { ?>
      <a class="<?php if($link_con->category_link==$dmcon->category_link) {echo'link_ct_h';}?>" href="<?=  site_url($nn.'/'.$linkdm->category_link.'/'.$dmcon->category_link)?>">&nbsp;<?=$dmcon->category_name?>&nbsp;</a>
      <span class="cate"> >></span>
       <?php }?>
    </div>
<?php }?>
    <span class="white"></span>
    <h1><?=$item->item_name?></h1>
    <span class="sumary_item">
       <?=$item->item_summary?>
    </span>

       <!-- hình chi tiết sản phẩm -->
    <div style="clear: both"></div>
    <div class="item_ct_sp">
       <?php $this->load->view('font/sanpham/slide') ?>
        <div class="text_item_sp">
            <div class="tt_kythuat">
                <div class="popup_item">

                    <div class="popup-gallery">
                        <a href="<?=$item->thumb?>" title="">
                            <img src="theme/images/button_full.png">
                        </a>
                        <?php $chek = $this->M_item->other_img($item->id)?>
                        <?php foreach($chek as $p) { ?>
                            <a style="display: none" href="uploads/san-pham/<?= $p->thumb ?>" title=""></a>

                        <?php  } ?>
                    </div>

                    <script>
                        $(document).ready(function() {
                            $('.popup-gallery').magnificPopup({
                                delegate: 'a',
                                type: 'image',
                                tLoading: 'Loading image #%curr%...',
                                mainClass: 'mfp-img-mobile',
                                gallery: {
                                    enabled: true,
                                    navigateByImgClick: true,
                                    preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                                },
                                image: {
                                    tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                                    titleSrc: function(item) {
                                        return item.el.attr('title') + '<small></small>';
                                    }
                                }
                            });
                        });
                    </script>


                </div>
                 <span class="masp"><p style="color:#fff;float: left"><?= $l->lang_ma[$lang]?></p> &nbsp; : &nbsp; <?=$item->item_code?></span>

            <?=$item->item_content?>
</div>
            <?php if($item->file !='') { ?>

                <div class="pdf" onclick="downloadfile(<?=$item->id?>)">
                    <a class="icon_pfd" href="javascript:;"></a>&nbsp;<?=$item->item_keywords?>
                </div>
            <?php } ?>


            <div class="add_thiss">
            <!-- Go to www.addthis.com/dashboard to customize your tools -->
<div class="addthis_native_toolbox"></div>
            <div class="add_thiss">

        </div>

    </div>
</div>
    </div>
      <!-- tính năng -->
    <?php $this->load->view('font/sanpham/oder') ?>
       <!-- tag -->
       <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js" type="text/javascript"></script>
       <div style="clear: both"></div>
       <div class="ct_kythuat">
    <div id="example-two">

        <ul class="nav">
            <li class="nav-one"><a href="#featured2" class="current"> <span class="icon_tag"></span>Features</a></li>
                <li class="nav-two"><a href="#core2"><span class="icon_tag"></span>Specifications</a></li>

            </ul>

    		<div class="list-wrap">

    			<ul id="featured2">
    				<?=$item->item_thongso?>
    			</ul>

        		 <ul id="core2" class="hide">
                   <?=$item->item_description?>
        		 </ul>



    		 </div> <!-- END List Wrap -->

		 </div> <!-- END Organic Tabs (Example One) -->
</div>
        <style>
          .masp{width: 100%;float: left;margin-top: 5px;font-weight: bold;font-family: 'arial'}
          .tt_kythuat p{padding-bottom: 3px}
          .popup_item{float: left;width: 100%}
          .popup_item img{float: right}
       </style>
<script>
    function downloadfile(id)
    {
        var url = 'download/'+id;
        window.location = url;
    }

</script>