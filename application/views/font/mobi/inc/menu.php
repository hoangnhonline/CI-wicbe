
<?php
$CI = &get_instance();
$CI->load->model('M_category');
$CI->load->model('Thongtin_web');
$mxh= $CI->Thongtin_web->show_company_lang(1,'vn');
?>


<div id="menu_mb">


    <div style="float: left;width: 100%;height: 5px;"></div>
    <div class="logo_mb">

        <a href="<?=site_url('gio-hang')?>" class="giohang"><b>(&nbsp;<?php echo $this->cart->total_items() ?>&nbsp;)</b></a>
        <a href="tel:<?=$mxh->copyright?>" class="phone"><?=$mxh->copyright?></a>
    </div>

</div>
<div id="menu_mb_menu">

    <div id="menu-open" title="Open Main Menu">
        <div class="wp_menu_wp">
            <div class="wp_menu">

                <img class="menu-open" alt="Open Main Menu Image" src="theme/images/menu_mb.png"/>
            </div>

        </div>
    </div>

    <div id="menu" aria-labelledby="tools-navigation">
        <div id="menuwrap">
            <p style="display: none">Menu</p>
            <a style="display: none" href="#" title="Click to Close">
                <div style="display: none" id="close">X</div>
            </a>
            <ul>

                <li><a href="<?= site_url() ?>"><b class="icon_menu_mb"></b> Trang chủ </a></li>
                <li><a href="<?= site_url('gioi-thieu')?>"><b class="icon_menu_mb"></b>Giới thiệu </a></li>
                <li><a href="<?= site_url('san-pham')?>"><b class="icon_menu_mb"></b>Sản phẩm - dịch vụ </a></li>

                <?php foreach ($CI->M_category->list_category_all(array('category.category_top' => 0, 'category.category_type' => 3,'category.category_status'=>1,'category.level'=>1),'vn') as $row) { ?>
                    <li style="display: none"><a href="<?=site_url($row->category_link)?>"><b class="icon_menu_mb" ></b><?=$row->category_name?></a></li>
                <?php } ?>
                <li style="display: none"><a href="<?= site_url('khuyen-mai')?>"><b class="icon_menu_mb"></b>Khuyến mãi</a></li>
                <li style="display: none"><a href="<?= site_url('tin-tuc')?>"><b class="icon_menu_mb"></b>Tin tức</a></li>
                <li><a href="<?= site_url('dai-ly')?>"><b class="icon_menu_mb" ></b>Đại lý</a></li>
                <li><a href="<?= site_url('tuyen-dung')?>"><b class="icon_menu_mb" ></b>Tuyển dụng</a></li>
                <li><a href="<?= site_url('lien-he')?>"><b class="icon_menu_mb"></b>Liên hệ</a></li>

            </ul>


        </div>

    </div>
</div>
<div style="float: left;clear: both;width: 100%;height: 1px"></div>

<script>
    $(document).ready(function () {
        $('#menu').pushScroll();
    });
</script>

