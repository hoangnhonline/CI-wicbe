<style>
    .language{cursor: pointer; opacity: 0.5}
    .opacity{ opacity: 1}
    .div_lang.en{ display: none}
    .div_lang.jp{ display: none}
</style>
<script>
     $(document).ready(function() {
                $(".lang_vn").addClass("opacity");
                $(".language").click(function() {
                    $('.div_lang').hide();
                    $(".language").removeClass("opacity");
                    var data = $(this).attr("data");
                    $("." + data).show();
                    $(this).addClass("opacity");
                });
    });
</script>
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$CI = &get_instance();
$lang = $CI->M_artice->show_list_lang();
foreach ($lang as $l) {
    ?>
    <span data="<?php echo $l->name ?>" class="language <?php echo "lang_" . $l->name ?>"><img  src="<?php echo $l->name.".png" ?>"/></span>
    <?php } ?>