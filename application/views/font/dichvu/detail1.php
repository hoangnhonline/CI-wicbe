<?php
$CI = &get_instance();
$CI->load->model('M_category');
$CI->load->model('M_artice');
$CI->load->model('M_images');
$CI->load->model('M_item');
if($this->uri->segment(1)==''){$nn = 'vn';}else{ $nn = $this->uri->segment(1);}

$i=1;

$list_comment = $CI->M_item->show_list_comment_page($row->id,2);
$first_video_library_home = $CI->M_images->show_first_video_home_hot(array('video_library.hot'=>1,'video_library.status'=>1,'country.name'=>'vn'));
?>
<script type="text/javascript" src="<?php echo base_url() ?>theme/js/custom/rate/jquery.rateit.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>theme/js/custom/rate/rateit.css" type="text/css" />



<script src="https://apis.google.com/js/platform.js" async defer>
    {lang: 'vi'}
</script>


<div class="content_content1 content_content2">



        <h1 class="title_h1"><?=$row->article_name?></h1>
        <span style="float: left;width: 100%;height: 1px;background: #d0d0d0;clear: both;margin-top: 4px"></span>
        <span style="float: left;width: 100%;height: 1px;=clear: both;height: 5px"></span>
        <div style="" class="content_about_detail">
            <?=$row->article_content?>


        </div>

        <?php if($row->article_type == 3 || $row->article_type == 4 || $row->article_type == 6) { ?>
            <div class="involve_detail">Tin liên quan</div>
            <span style="float: left;width: 100%;height: 1px;background: #d0d0d0;clear: both"></span>

            <ul class="list_involve">
                <span style="float: left;width: 100%;height: 1px;=clear: both;height: 5px"></span>
                <?php foreach($lienquan as  $lq_h) { ?>
                    <li><a href="<?=site_url($lq_h->article_link)?>"><?=$lq_h->article_name?></a> </li>
                <?php } ?>
            </ul>
        <?php } ?>
        <span style="float: left;width: 100%;height: 1px;=clear: both;height: 10px"></span>

    </div>













