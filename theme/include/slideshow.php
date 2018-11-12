<div class="lay_slideshow">

    <ul class="list_slide">
        <?php for ($i = 1; $i <= 3; $i++) { ?>
            <li>
                <a href="#" title="Slide_<?php echo $i ?>">
                    <img src="demo_image/slide.png" alt="Slide<?php echo $i ?>"/>
                </a>
            </li>
        <?php } ?>
    </ul>
    <div class="pager_slide_list">
        <?php for($x=1 ; $x<=3 ; $x++){ ?>
        <div class="item"><a href="javascript:return void(0)" data-slide-index="<?php echo $x ?>" class="pager-link"></a></div>
        <?php } ?>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.lay_slideshow ul.list_slide').carouFredSel({
            items: {
                minimum: 1,
                width: '1000',
                height: '283',
            },
            pagination: {container: ".lay_slideshow .pager_slide_list", anchorBuilder: false},
            auto: true,
            scroll: {
                easing: "easeInOutQuad",
                fx: 'crossfade',
                duration: 1000,
                pauseOnHover: true,
            }
        });

    });
</script>