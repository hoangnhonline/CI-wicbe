<?php
$CI = &get_instance();
$CI->load->model('M_category');

$list = $this->M_category->list_category_all(array('top' => 0,'type' => 1,'status' => 1));

?>





<ul class="ul_li_menu1">
    <?php foreach ($list as $r){ ?>
    <li><a class="<?php if($this->uri->segment(1)==$r->link){ ?>actimenu_left<?php } ?>"  href="<?php echo site_url($r->link) ?>"><?=$r->name?></a> </li>
    <?php } ?>
</ul>