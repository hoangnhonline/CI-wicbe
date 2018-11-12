<?php
$CI = &get_instance();
$CI->load->model('M_category');
$CI->load->model('M_artice');
$CI->load->model('Title');
if($this->uri->segment(1)=='vn'){$nn = 'vn';}else{$nn= 'en';}
if($this->uri->segment(1)=='vn'){$d = 'gioi-thieu';}else{$d= 'about-us';}
if($this->uri->segment(1)=='vn'){$sd1 = 'so-do-to-chuc';}else{$sd1= 'organizational-chart';}
if($this->uri->segment(1)=='vn'){$tin = 'tin-tuc';}else{$tin= 'news';}
$codong =  $CI->M_artice->show_sodo_gt(array('articledetail.article_id'=>93,'article.article_type'=>8),$nn);
$kiemsoat =  $CI->M_artice->show_sodo_gt(array('articledetail.article_id'=>94,'article.article_type'=>8),$nn);
$quantri =  $CI->M_artice->show_sodo_gt(array('articledetail.article_id'=>95,'article.article_type'=>8),$nn);
$dieuhanh =  $CI->M_artice->show_sodo_gt(array('articledetail.article_id'=>96,'article.article_type'=>8),$nn);
$cuahang =  $CI->M_artice->show_sodo_gt(array('articledetail.article_id'=>97,'article.article_type'=>8),$nn);
$kehoach =  $CI->M_artice->show_sodo_gt(array('articledetail.article_id'=>98,'article.article_type'=>8),$nn);
$ketoan =  $CI->M_artice->show_sodo_gt(array('articledetail.article_id'=>99,'article.article_type'=>8),$nn);
$hanhchinh =  $CI->M_artice->show_sodo_gt(array('articledetail.article_id'=>100,'article.article_type'=>8),$nn);
?>

<div id="modal_1" class="popupContainer" style="display:none;top: 80px">
    <header class="popupHeader">
        <span class="header_title"><?=$codong->article_name?>       </span>
        <span class="modal_close"><i class="fa fa-times"></i></span>
    </header>

    <section class="popupBody">
        <!-- Social Login -->
        <div class="social_login social_login_">
            <?=$codong->article_content?>
        </div>

    </section>
</div>
<script type="text/javascript">
    $("#modal_2").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });

    $(function(){
        // Calling Login Form
        $("#login_form").click(function(){
            $(".social_login").show();
            $(".user_login").show();
            return false;
        });
        $("#modal_2").click(function(){
            $(".social_login_").show();
            $(".user_login_").show();

        });

    });
</script>
<!--                              ban kiểm soát -->
<div id="modal_kiemsoat" class="popupContainer" style="display:none;top: 80px">
    <header class="popupHeader">
        <span class="header_title"><?=$kiemsoat->article_name?>       </span>
        <span class="modal_close"><i class="fa fa-times"></i></span>
    </header>

    <section class="popupBody">
        <!-- Social Login -->
        <div class="social_login social_login_">
            <?=$kiemsoat->article_content?>
        </div>

    </section>
</div>
<script type="text/javascript">
    $("#kiemsoat").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });

    $(function(){
        // Calling Login Form
        $("#login_form").click(function(){
            $(".social_login").show();
            $(".user_login").show();
            return false;
        });
        $("#kiemsoat").click(function(){
            $(".social_login_").show();
            $(".user_login_").show();

        });

    });
</script>
<div id="modal_quantri" class="popupContainer" style="display:none;top: 80px">
    <header class="popupHeader">
        <span class="header_title"><?=$quantri->article_name?>       </span>
        <span class="modal_close"><i class="fa fa-times"></i></span>
    </header>

    <section class="popupBody">
        <!-- Social Login -->
        <div class="social_login social_login_">
            <?=$quantri->article_content?>
        </div>

    </section>
</div>
<script type="text/javascript">
    $("#quantri").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });

    $(function(){
        // Calling Login Form
        $("#login_form").click(function(){
            $(".social_login").show();
            $(".user_login").show();
            return false;
        });
        $("#quantri").click(function(){
            $(".social_login_").show();
            $(".user_login_").show();

        });

    });
</script>
<div id="modal_dieuhanh" class="popupContainer" style="display:none;top: 80px">
    <header class="popupHeader">
        <span class="header_title"><?=$dieuhanh->article_name?>       </span>
        <span class="modal_close"><i class="fa fa-times"></i></span>
    </header>

    <section class="popupBody">
        <!-- Social Login -->
        <div class="social_login social_login_">
            <?=$dieuhanh->article_content?>
        </div>

    </section>
</div>
<script type="text/javascript">
    $("#dieuhanh").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });

    $(function(){
        // Calling Login Form
        $("#login_form").click(function(){
            $(".social_login").show();
            $(".user_login").show();
            return false;
        });
        $("#dieuhanh").click(function(){
            $(".social_login_").show();
            $(".user_login_").show();

        });

    });
</script>
<div id="modal_cuahang" class="popupContainer" style="display:none;top: 80px">
    <header class="popupHeader">
        <span class="header_title"><?=$cuahang->article_name?>       </span>
        <span class="modal_close"><i class="fa fa-times"></i></span>
    </header>

    <section class="popupBody">
        <!-- Social Login -->
        <div class="social_login social_login_">
            <?=$cuahang->article_content?>
        </div>

    </section>
</div>
<script type="text/javascript">
    $("#cuahang").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });

    $(function(){
        // Calling Login Form
        $("#login_form").click(function(){
            $(".social_login").show();
            $(".user_login").show();
            return false;
        });
        $("#cuahang").click(function(){
            $(".social_login_").show();
            $(".user_login_").show();

        });

    });
</script>
<div id="modal_kehoach" class="popupContainer" style="display:none;top: 80px">
    <header class="popupHeader">
        <span class="header_title"><?=$kehoach->article_name?>       </span>
        <span class="modal_close"><i class="fa fa-times"></i></span>
    </header>

    <section class="popupBody">
        <!-- Social Login -->
        <div class="social_login social_login_">
            <?=$kehoach->article_content?>
        </div>

    </section>
</div>
<script type="text/javascript">
    $("#kehoach").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });

    $(function(){
        // Calling Login Form
        $("#login_form").click(function(){
            $(".social_login").show();
            $(".user_login").show();
            return false;
        });
        $("#kehoach").click(function(){
            $(".social_login_").show();
            $(".user_login_").show();

        });

    });
</script>
<div id="modal_ketoan" class="popupContainer" style="display:none;top: 80px">
    <header class="popupHeader">
        <span class="header_title"><?=$ketoan->article_name?>       </span>
        <span class="modal_close"><i class="fa fa-times"></i></span>
    </header>

    <section class="popupBody">
        <!-- Social Login -->
        <div class="social_login social_login_">
            <?=$ketoan->article_content?>
        </div>

    </section>
</div>
<script type="text/javascript">
    $("#ketoan").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });

    $(function(){
        // Calling Login Form
        $("#login_form").click(function(){
            $(".social_login").show();
            $(".user_login").show();
            return false;
        });
        $("#ketoan").click(function(){
            $(".social_login_").show();
            $(".user_login_").show();

        });

    });
</script>
<div id="modal_hanhchinh" class="popupContainer" style="display:none;top: 80px">
    <header class="popupHeader">
        <span class="header_title"><?=$hanhchinh->article_name?>       </span>
        <span class="modal_close"><i class="fa fa-times"></i></span>
    </header>

    <section class="popupBody">
        <!-- Social Login -->
        <div class="social_login social_login_">
            <?=$hanhchinh->article_content?>
        </div>

    </section>
</div>
<script type="text/javascript">
    $("#hanhchinh").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });

    $(function(){
        // Calling Login Form
        $("#login_form").click(function(){
            $(".social_login").show();
            $(".user_login").show();
            return false;
        });
        $("#hanhchinh").click(function(){
            $(".social_login_").show();
            $(".user_login_").show();

        });

    });
</script>