<?php
$CI = &get_instance();
$CI->load->model('M_category');
if($this->uri->segment(1)==""){$nn='vn';}else{ $nn =$this->uri->segment(1); }
$list = $CI->Thongtin_web->show_banner(1,array('status'=>1));

?>


<?php if($this->uri->segment(2)==''){ ?>

<div id="slide_home">
        <div class="slide_home">
            <?php foreach($list as $b) { ?>
            <a href="<?=$b->link?>"><img src="<?=$b->thumb?>"> </a>
            <?php } ?>
        </div>

</div>
<?php }?>
<script>

    $(document).ready(function(){
        $('.slide_home').bxSlider({
            auto: true,
         //   slideWidth: 1200,
            mode: 'fade',
            minSlides: 1,
            pause: 10000,
            maxSlides: 5,
            moveSlides: 1,
            //slideMargin: 20,
            pager: false, controls: false

        });
    });

</script>