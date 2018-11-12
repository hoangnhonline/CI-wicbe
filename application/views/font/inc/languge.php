<?php
$CI = &get_instance();
$CI->load->model('Thongtin_web');
$CI->load->model('M_artice');

$list_huongdan = $CI->M_artice->show_home_footer('vn',2);


?>



<div id="languge_support">

<div class="languge_support">

        <ul class="support_name">
            <?php foreach($list_huongdan as $n) { ?>
            <li><a href="<?=site_url($n->article_link)?>"><?=$n->article_name?></a></li>
         <?php } ?>
            <li style="position: relative;display: none">  <?php if(isset($link_vn)){?>
                    <a href="<?php echo site_url('vn/'.$link_vn)?>" class="icon_lang lang_vn <?php echo ($this->uri->segment(1)=="" || $this->uri->segment(1) == "vn")?"active":""?>"></a>
                <?php }else{?>
                    <a href="<?php echo base_url()?>" class="icon_lang lang_vn <?php echo ($this->uri->segment(1)=="" || $this->uri->segment(1) == "vn")?"active":""?>"></a>
                <?php }?>
                <?php if(isset($link_en)){?>
                    <a href="<?php echo site_url('en/'.$link_en)?>" class="icon_lang lang_en <?php echo ($this->uri->segment(1) == "en")?"active":""?>"></a>
                <?php }else{?>
                    <a href="<?php echo site_url('en')?>" class="icon_lang lang_en <?php echo ($this->uri->segment(1) == "en")?"active":""?>"></a>
                <?php }?> </li>
        </ul>


</div>



</div>