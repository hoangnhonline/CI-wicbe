<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>ĐĂNG NHẬP</title>
        <base href="<?php echo base_url(); ?>" />
        <link href="<?= base_url('theme/css/layout.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('theme/css/login.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Theme Start -->
        <link href="<?= base_url('theme/css/login/styles.css') ?>" rel="stylesheet" type="text/css" />

    </head>
    <body>
        <div id="logincontainer">
            <div id="loginbox">
                <div id="loginheader">
                    <img src="<?= base_url() ?>theme/img/cp_logo_logjn1.png" alt="Control Panel Login" />
                </div>
                <div id="innerlogin">
                    <form action="<?= site_url('admin/login') ?>" method="post" name="admin_login" enctype="application/x-www-form-urlencoded">
                        <p style="color:#FFF"></p>
                        <p>Tài khoản của bạn:</p>

                        <input type="text" class="logininput"  name="username" id="username" /><?php echo form_error('username'); ?>                
                        <p>Mật khẩu:</p>
                        <input type="password" class="logininput"  name="password" id="password"/>   <?php echo form_error('password'); ?>                
                        <input type="submit" name="btnLog" class="loginbtn" value="Đăng nhập" /><br />
                        <?php echo form_error('login'); ?>
                    </form>
                </div>
            </div>

        </div>
    </body>
</html>
