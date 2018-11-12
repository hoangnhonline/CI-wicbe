<?php
$CI = &get_instance();
$CI->load->model('Thongtin_web');
$CI->load->model('M_artice');
$CI->load->model('M_category');
$CI->load->model('M_banner');
$lh = $CI->Thongtin_web->show_company(1);
$list = $this->M_category->list_category_all(array('top' => 0,'type' => 1,'status' => 1));
$list1 = $this->M_category->list_category_all(array('top' => 0,'type' => 2,'status' => 1));
$list_2 = $CI->M_artice->show_list_news_1(3);
?>


    <header>
        <div id="header">
            <a class="animateddrawer" id="ddsmoothmenu-mobiletoggle" href="#" onclick="return false">
                <span></span>
            </a>
            <div class="header">
                <a href="<?=site_url()?>" class="logo"><img src="<?=$lh->logo?>" alt="<?=$lh->name?>"></a>
                <p class="slogan">

      CÔNG TY CỔ PHẦN SOSENCO
                    <b>CHUYÊN SẢN XUẤT MỸ PHẨM CHĂM SÓC DA</b>
                </p>
                <a class="giohang_h" href="<?=site_url('gio-hang')?>"><b>giỏ hàng</b> <b><?php echo $this->cart->total_items() ?></b></a>
            </div>
            <div class="top-nav">
                <div class="menu">
                    <div id="smoothmenu1" class="ddsmoothmenu" >
                        <ul id="menu">
                            <li class="<?php if(isset($home)){echo 'active_menu';} ?>"><a href="<?=site_url()?>">Trang chủ</a></li>
                            <li class="<?php if(isset($gt)){echo 'active_menu';} ?>"><a href="<?=site_url('gioi-thieu')?>">Giới thiệu</a></li>

                            <?php if(count($list) > 0){ ?>
                                <?php foreach ($list as $r1){ ?>
                                    <li class=""><a href="<?=site_url($r1->link)?>"><?=$r1->name?></a>
                                        <?php if(count($this->M_category->list_category_chill($r1->id)) > 0){ ?>
                                            <ul>
                                                <?php foreach ($this->M_category->list_category_chill($r1->id) as $m){?>
                                                    <li><a href="<?php echo site_url($m->link) ?>"><?=$m->name?></a> </li>
                                                <?php } ?>
                                            </ul>
                                        <?php } ?>
                                    </li>
                                <?php } ?>
                            <?php } ?>

                            <?php if(count($list1) > 0){ ?>
                                <?php foreach ($list1 as $r1){ ?>
                                    <li class=""><a href="<?=site_url($r1->link)?>"><?=$r1->name?></a>
                                        <?php if(count($this->M_category->list_category_chill($r1->id)) > 0){ ?>
                                            <ul>
                                                <?php foreach ($this->M_category->list_category_chill($r1->id) as $m){?>
                                                    <li><a href="<?php echo site_url($m->link) ?>"><?=$m->name?></a> </li>
                                                <?php } ?>
                                            </ul>
                                        <?php } ?>
                                    </li>
                                <?php } ?>
                            <?php } ?>
                            <li class="<?php if(isset($phanhoi)){echo 'active_menu';} ?>"><a href="<?=site_url('phan-hoi-khach-hang')?>" class=""> Phản Hồi Khách Hàng</a></li>
                            <li class="<?php if(isset($lienhe)){echo 'active_menu';} ?>"><a href="<?=site_url('lien-he')?>" class="">Liên hệ</a></li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </header>
<script type="text/javascript">
    ddsmoothmenu.init({mainmenuid: "smoothmenu1", orientation: 'h', classname: 'ddsmoothmenu', contentsource: "markup"})
</script>

