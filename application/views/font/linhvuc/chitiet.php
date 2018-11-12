<div class="wp_wp">
    <div class="wp_wp_content">
        <div class="wp_wp_content_wp">
            <div class="title_dichvu">
                <span class="home_home" ><img src="theme/images/icon_trangchu_active.png" width="27"> <a href="#"> <?=$l->lang_home[$lang]?> </a>&nbsp; &nbsp;</span>
                <span class="home_home last" ><img style="margin-top: 15px" src="theme/images/arrow_bread.png" width="10"><a style="color: #f00;white-space: nowrap" href="<?= site_url($lang.'/'.$l->lang_gioithieu_link[$lang]) ?>"> <?=$l->lang_gioithieu[$lang]?></a></span>

            </div>
            <div class="content_all">
                <div class="content_all_all" style="width: 97%;float: left;margin-top: 5px;margin-left: 10px">
                    <h1> <?=$row->article_name?></h1>
                    <?=$row->article_content?>
                </div>

            </div>
            <div class="bt_ft"></div>
        </div>
    </div>
</div>