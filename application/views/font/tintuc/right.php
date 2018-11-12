

<?php
$CI = &get_instance();
$CI->load->model('Title');
$CI->load->model('M_artice');
$list_nb = $CI->M_artice->tinlienquan(array('id !='=>$row->id,'cate'=>$row->cate,'hot'=>1));
$list_hh = $CI->M_artice->tinlienquan(array('id !='=>$row->id,'cate'=>$row->cate,'hot'=>2));
$list_tags  = $CI->M_artice->list_tags($row->id);
?>



<div class="right_content">
    <div class="div_title">tin nổi bật</div>
    <ul class="ul_li_hot">

<?php foreach ($list_nb as  $nb){ ?>
        <li>
            <a href="<?=site_url($nb->link)?>" class="img_a_2">
                <img src="<?= base_url() ?>timthumb.php?src=<?= base_url() ?><?=$nb->img ?>&w=200&h=150&zc=1">
            </a>
            <p class="name_like_commnet">
                <a href="<?=site_url($nb->link)?>" class="name_2"><?=$nb->name?></a>
            </p>
        </li>
        <?php } ?>
    </ul>

    <p style="height: 10px;display: inline-block;width: 100%"></p>
    <div class="div_title">Thông tin hữu ích</div>
    <ul class="ul_li_hot">

        <?php foreach ($list_hh as  $nb){ ?>
            <li>
                <a href="<?=site_url($nb->link)?>" class="img_a_2">
                    <img src="<?= base_url() ?>timthumb.php?src=<?= base_url() ?><?=$nb->img ?>&w=200&h=150&zc=1">
                </a>
                <p class="name_like_commnet">
                    <a href="<?=site_url($nb->link)?>" class="name_2"><?=$nb->name?></a>


                </p>

            </li>
        <?php } ?>

    </ul>

    <p style="height: 10px;display: inline-block;width: 100%"></p>
    <div class="div_title">Tags</div>
    <ul class="list-tag">
        <?php foreach ($list_tags as $tag) {?>
            <li><a href="<?=site_url($tag->link)?>"><?=$tag->name?></a></li>
        <?php }?>
    </ul>




</div>

