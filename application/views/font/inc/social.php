<?php
$CI = &get_instance();
$CI->load->model('M_banner');
$banner_full1 = $CI->M_banner->list_banner(array('status'=>1,'type'=>2));

?>







<?php if(count($banner_full1) > 0){ ?>
<div id="doitac">
    <div class="doitac">
        <div class="doitac1">
            <?php foreach ($banner_full1 as $r){?>
            <a href=""><img src="<?= base_url() ?>timthumb.php?src=<?= base_url() ?><?=$r->img ?>&w=220&h=82&zc=1"> </a>
<?php } ?>
        </div>
    </div>
</div>
<?php } ?>
<script>
    $(document).ready(function () {
        $('.doitac1').bxSlider({
            auto: true,
            slideWidth: 220,
            mode: 'horizontal',
            minSlides: 1,
            maxSlides: 5, moveSlides: 1, slideMargin: 10, pager: false, controls: true
        });

    })
</script>

