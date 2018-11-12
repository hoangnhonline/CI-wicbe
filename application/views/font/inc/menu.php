<?php
$CI = &get_instance();
$CI->load->model('Thongtin_web');
$CI->load->model('M_category');
$menu_sp = $CI->M_category->list_category_all(array('category.category_status' => 1,'category.category_top' => 0, 'category.category_type' => 1),'vn');
$menu_sp1 = $CI->M_category->list_category_all(array('category.category_status' => 1,'category.category_top' => 0, 'category.category_type' => 3),'vn');
$menu_news = $CI->M_category->list_category_all(array('category.category_status' => 1,'category.category_top' => 0, 'category.category_type' => 2),'vn');
$menu_td = $CI->M_category->list_category_all(array('category.category_status' => 1,'category.category_top' => 0, 'category.category_type' => 5),'vn');
$mxh = $CI->Thongtin_web->show_company(1,'vn');
?>
<a class="animateddrawer" id="ddsmoothmenu-mobiletoggle" href="#" onclick="return false"><span></span></a>
<div style="" class="line_header_1"></div>
<div id="header_1">
<div id="header">
    <div class="header">
        <div class="header1">
            <div class="header2">
                <div class="brand">
                    <a href="<?=site_url()?>" class="logo"><img src="<?=$mxh->logo?>" > </a>
                </div>
            <div class="top-nav">

                <div class="menu">
                    <div id="smoothmenu1" class="ddsmoothmenu">
                        <ul>
                            <li><a href="<?=site_url()?>" class="<?php if(isset($home)){echo 'active_menu';} ?>">Trang chủ</a></li>
                            <li><a class="<?php if(isset($gioithieu)){echo 'active_menu';} ?>" href="<?=site_url('gioi-thieu')?>">Giới thiệu</a></li>
                            <li><a class="<?php if(isset($sanpham)){echo 'active_menu';} ?>" href="<?=site_url('san-pham')?>">Sản phẩm</a>
                                <ul>
                                    <?php foreach($menu_sp1 as $m) { ?>
                                    <li><a href="<?=site_url($m->category_link)?>"><?=$m->category_name?></a></li>
               <?php } ?>
                                </ul>
                            </li>
                            <li><a class="<?php if(isset($tintuc)){echo 'active_menu';} ?>" href="<?=site_url('tin-tuc')?>">Tin tức</a>
                                <ul>
                                    <?php foreach($menu_news as $m) { ?>
                                        <li><a href="<?=site_url($m->category_link)?>"><?=$m->category_name?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li><a class="<?php if(isset($lienhe)){echo 'active_menu';} ?>" href="<?=site_url('lien-he')?>">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            </div>
            <a class="giohang" href="<?=site_url('gio-hang')?>">
                <p class="icon_giohang"></p>
                <p class="giohang_a">(&nbsp;<b><?php echo $this->cart->total_items() ?></b>&nbsp;)</p>
            </a>
             <div class="phone_heder_news">
                    <i class="icon_phone1"></i>
                    <p>Gọi
                        <b><?=$mxh->copyright?></b>
                    </p>
            </div>
            <a href="<?=site_url('dat-nuoc')?>" class="header3">
                <i class="icon_phone1_1"></i>
                <p>đặt nước <br>
                    online
                </p>
            </a>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    ddsmoothmenu.init({
        mainmenuid: "smoothmenu1",
        orientation: 'h',
        classname: 'ddsmoothmenu',
        contentsource: "markup"
    })

</script>
