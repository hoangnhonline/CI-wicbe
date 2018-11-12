<style>
    .abcd{color: #ccc; background: #333 !important}
</style> 

<div id="leftside">
    <?php
    $CI = &get_instance();
    $CI->load->model('M_session');
    $admin = $this->M_session->userdata('admin_login');
    ?>
    <div class="user">
        <img src="<?= base_url() ?>theme/img/avatar.png" width="44" height="44" class="hoverimg" alt="Avatar" />
        <p>Logged in as:</p>
        <p class="username"><?= $admin->user_name ?></p>
        <p class="userbtn"><a href="<?= base_url('admin/logout') ?>" title="Thoát">Log out</a></p>
    </div>
    <div class="notifications">
        <p class="change"><a href="<?= base_url('admin/changepass') ?>" title="Thay đổi mật khẩu">Đổi mật khẩu</a></p>
    </div>
    <ul id="nav">
        <li>
            <ul class="navigation">
                <a class="expanded heading">Thông tin website</a>
        <li class="<?php if ($mod == 'company_1') echo'abcd'; ?>" ><a class="a_li" href="<?= site_url('back/company/index/1') ?>">Thông tin website</a></li>
            </ul>

        </li>
        <li>
            <ul class="navigation">
                <a class="expanded heading">Giới thiệu </a>
                <li class="<?php if ($mod == 'page_1') echo'abcd'; ?>"><a class="a_li" href="<?= site_url('back/page/index/1') ?>">Giới thiệu</a></li>
                <li class="<?php if ($mod == 'page_4') echo'abcd'; ?>"><a class="a_li" href="<?= site_url('back/page/index/4') ?>">Bài viết</a></li>
            </ul>
        </li>
        <li>
            <ul class="navigation">
                <a class="expanded heading">Banner</a>
                <li class="<?php if ($mod == 'banner_1') echo'abcd'; ?>"><a class="a_li" href="<?= site_url('back/banner/index/1') ?>">Banner </a></li>
                <li class="<?php if ($mod == 'banner_2') echo'abcd'; ?>"><a class="a_li" href="<?= site_url('back/banner/index/2') ?>">Hoạt động shop</a></li>
                <li class="<?php if ($mod == 'banner_3') echo'abcd'; ?>"><a class="a_li" href="<?= site_url('back/banner/index/3') ?>">Phản hồi khách hang</a></li>
                <li class="<?php if ($mod == 'banner_4') echo'abcd'; ?>"><a class="a_li" href="<?= site_url('back/banner/index/4') ?>">Video</a></li>
                <li class="<?php if ($mod == 'page_2') echo'abcd'; ?>"><a class="a_li" href="<?= site_url('back/page/index/2') ?>">Giới thiệu video</a></li>
            </ul>
        </li>

        <li>
            <ul class="navigation">
                <a class="expanded heading">Sản phẩm</a>
                <li style="" class="<?php if ($mod == 'tags') echo'abcd'; ?>"><a class="a_li" href="<?= site_url('back/tags') ?>">Tags</a></li>
                <li style="" class="<?php if ($mod == 'cate_1') echo'abcd'; ?>"><a class="a_li" href="<?= site_url('back/category/index/1') ?>">Danh mục</a></li>
                <li class="<?php if ($mod == 'item_1') echo'abcd'; ?>"><a class="a_li" href="<?= site_url('back/item/index/1') ?>">Sản phẩm</a></li>
                <li class="<?php if ($mod == 'order') echo'abcd'; ?>"><a class="a_li" href="<?= site_url('back/order/index') ?>">Đơn hàng</a></li>
            </ul>
        </li>
        <li>
            <ul class="navigation">
                <a class="expanded heading">Bài viết</a>
                <li style="" class="<?php if ($mod == 'cate_2') echo'abcd'; ?>"><a class="a_li" href="<?= site_url('back/category/index/2') ?>">Danh mục</a></li>
                <li style="" class="<?php if ($mod == 'page_3') echo'abcd'; ?>"><a class="a_li" href="<?= site_url('back/news/index/3') ?>">Bài viết</a></li>
            </ul>
        </li>
        <li>
            <ul class="navigation">
                <a class="expanded heading">Email letter</a>
                <li class="<?php if ($mod == 'letter') echo 'abcd'; ?>"><a class="a_li" href="<?= site_url('back/email/letter') ?>">Letter</a></li>
                <li class="<?php if ($mod == 'phone') echo 'abcd'; ?>"><a class="a_li" href="<?= site_url('back/email/phone') ?>">Tư vấn</a></li>
            </ul>
        </li>


        <li style="display: none">
            <ul class="navigation">
                <a class="expanded heading">DS User & Liên Hệ</a>
                <li class="<?php if ($mod == 'support') echo'abcd'; ?>"> <a  class="a_li" href="<?php echo base_url('back/lienhe/list_support') ?>" title="">Hỗ trợ</a> </li>
                <li class="<?php if ($mod == 'lienhe') echo'abcd'; ?>"><a class="a_li" href="<?= base_url('back/lienhe/index') ?>">List liên hệ</a></li>

            </ul>
        </li>

    </ul>
</div>