<?php
$CI = &get_instance();
$CI->load->model('M_banner');
$banner_full1 = $CI->M_banner->list_banner1(array('status'=>1,'type'=>1));

?>


<div id="banner">
    <div class="banner">
        <?php foreach ($banner_full1 as $r){ ?>

        <a href=""><img alt="<?=$r->name?>" title="<?=$r->name?>" src="<?= base_url() ?>timthumb.php?src=<?= base_url() ?><?=$r->img ?>&w=1440&h=400&zc=1"> </a>
        <?php } ?>
    </div>
</div>



<script type="text/javascript">
    $(document).ready(function(){
        $('.banner').bxSlider({
            auto: true, mode: 'fade', minSlides: 1, pause: 8000,maxSlides: 5, moveSlides: 1, pager: false, controls: true
        });
    });
</script>