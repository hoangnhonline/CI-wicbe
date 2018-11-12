
<?php
$CI = &get_instance();
$CI->load->model('M_artice');
$CI->load->model('Title');
$CI->load->model('M_item');

$CI->load->model('M_banner');


$list = $CI->M_banner->show_banner_home(4,0);
$list_1 = $CI->M_banner->show_banner_home_1(1,4);
?>



<div id="video_home">
    <div class="video_home">
        <div class="list_content_home_2">
            <h2>Videos</h2>
            <i class="line_2"></i>
        </div>

        <div class="video_home_list">
            <?php foreach ($list as $vi){ ?>
            <div class="child_video">
              
                <iframe src="//www.youtube.com/embed/<?=substr($vi->link,16)?>?rel=0" width="100%" height="204"> </iframe>
                <a rel="canonical" href="<?=site_url($vi->name_link)?>" class="name_link_video"><h3 class="h3_1"><?=$vi->name?></h3></a>
            </div>
            <?php }?>
        </div>




    </div>
</div>