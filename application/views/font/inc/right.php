<?php
$CI  =&get_instance();
$CI->load->model('M_artice');
$CI->load->model('Thongtin_web');
$CI->load->model('M_banner');
$CI->load->model('Title');
$list_nb_1 = $CI->M_artice->show_list_news_2(2,1,5,4);
if(isset($row)) {
    $list_tags = $CI->M_artice->list_tags($row->id);
}
$list_banner = $CI->M_banner->show_list_bn(2);
?>



<?php $this->load->view('font/inc/social')?>
<div class="list_content_home_2">
    <h2>tin nổi bật</h2>
    <i class="line_2"></i>
</div>
<div class="list_nb_11">
    <?php $b=1; foreach ($list_nb_1 as $hh){ ?>
        <?php if($b < 2) {?>

            <div class="first_news_1">
                <a href="<?=site_url($hh->link)?>" class="first_1">
                    <img src="<?= base_url($hh->img) ?>">
                </a>
                <a href="" class="img_name_12"><?=$hh->name?></a>

            </div>

        <?php }?>
        <?php $b++; }?>
    <ul class="ul_li_hot">
        <?php $k=1; foreach ($list_nb_1 as $hh){ ?>
            <?php if($k > 1) {?>
                <li>
                    <a href="<?=site_url($hh->link)?>" class="img_a_2">
                        <img src="<?= base_url() ?>timthumb.php?src=<?= base_url() ?><?=$hh->img ?>&w=200&h=150&zc=1">
                    </a>
                    <p class="name_like_commnet_1">
                        <a href="<?=site_url($hh->link)?>" class="name_2"><?=$hh->name?></a>
                    </p>
                </li>
            <?php }?>
            <?php $k++; }?>
    </ul>

    <?php if(isset($list_tags)){ ?>
        <p style="height: 15px;width: 100%;display: inline-block"></p>
    <div class="list_content_home_2">
        <h2>Tags</h2>
        <i class="line_2"></i>
    </div>
    <ul class="list-tag">
        <?php foreach ($list_tags as $tag) {?>
            <li><a href="<?=site_url($tag->link)?>"><?=$tag->name?></a></li>
        <?php }?>
    </ul>
    <?php }?>

    <div class="div_banner_1">
        <?php foreach ($list_banner as $b){ ?>
            <a href="<?=$b->link?>" target="_blank" class="banner_1_list"> <img src="<?= base_url($b->img) ?>"></a>
        <?php }?>
    </div>
</div>