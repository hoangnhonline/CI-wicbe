<?php
$CI = &get_instance();
$CI->load->model('M_category');
$CI->load->model('Thongtin_web');
$CI->load->model('M_images');

$ft = $CI->Thongtin_web->show_company_lang(1,$lang);
//$cate = $CI->M_category->list_category_all_home_slide(array('category.category_status' => 1, 'category.category_top' => 0, 'category.category_type' => $type,),$lang);

$list = $CI->Thongtin_web->show_banner(4,array('status'=>1));
$list_video = $CI->M_images->show_first_video_home_hot(array('video_library.status'=>1,'video_library.hot'=>1,'video_library.type'=>1));
$list_image = $CI->M_images->show_first_video_home_hot(array('video_library.status'=>1,'video_library.hot'=>1,'video_library.type'=>2));
$list_img_orther = $CI->M_images->get_img_orther_list(array('img_video_library.id_video_library'=>$list_image->id));
?>





<div class="left_content">
    <div class="title_div_1"><?php if(isset($detail)){echo $detail;}else{echo $title;}?></div>
    <ul class="ul_li_menu_left">
<!--        --><?php //foreach ($cate as $c){ ?>
<!--            <li><i></i><a href="--><?//=site_url($lang.'/'.$c->category_link)?><!--">--><?//=$c->category_name?><!--</a> </li>-->
<!--        --><?php // } ?>

    </ul>

    <div class="support_home">
        <div class="title_div_2"><?php if($lang=='vn'){echo 'Hỗ trợ trực tuyến';}else{echo 'online support';} ?></div>
        <div class="hot_line_1">
            <p class="hotline_h_1">Hotline</p>
            <p class="hotline_p_1"><?=$ft->copyright?></p>
        </div>
        <div class="hot_line_2">
            <p class="hotline_h_1">Email</p>
            <p class="hotline_p_2">kinhdoanh410@gmail.com</p>
        </div>

    </div>

    <div class="list_video_home">
        <div class="title_border_1">
            <p>VIDEO</p>
        </div>

        <div class="video1">
            <iframe class="iframe_video" src="//www.youtube.com/embed/<?=substr($list_video->link,16)?>" width="" height=""> </iframe>
        </div>
        <a class="name_video" href="<?=site_url($lang.'/'.$list_video->name_link)?>"><?=$list_video->name?></a>

        <div class="title_border_1">
            <p><?=$l->lang_images[$lang]?></p>
        </div>

        <div class="images_1">

            <div class="list_baner_images">
                <div class="list_baner_images_1">

                    <img src="<?= base_url() ?>timthumb.php?src=<?= base_url() ?><?=$list_image->thumb ?>&w=278&h=243&zc=1">
                    <?php foreach($list_img_orther as $img_o) { ?>
                        <img src="<?= base_url() ?>timthumb.php?src=<?= base_url() ?>uploads/san-pham/<?=$img_o->thumb_orther?>&w=278&h=243&zc=1">

                    <?php  }?>

                </div>
            </div>



        </div>



    </div>




</div>


<script type="text/javascript">
    $(document).ready(function(){
        $('.list_baner_images_1').bxSlider({
            auto: true,
            mode: 'fade',
            minSlides: 1,
            pause: 10000,
            maxSlides: 5,
            moveSlides: 1,
            pager: false, controls: true

        });
    });
</script>