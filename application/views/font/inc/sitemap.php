<?php
$CI = &get_instance();
$CI->load->model('M_category');
$list = $CI->M_category->list_category_all(array('top' => 0,'status' => 1));
$ar = $CI->M_category->show_list_article_all(array('status' => 1))
?>
<?= '<?xml version="1.0" encoding="UTF-8"?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9">

    <url>
        <loc><?=site_url()?></loc>
        <lastmod><?=date('d-m-Y H:i:s')?></lastmod>
        <priority>1.00</priority>
    </url>
    <url>
        <loc><?=site_url('tin-tuc')?></loc>
        <lastmod><?=date('d-m-Y H:i:s')?></lastmod>
        <priority>1.00</priority>
    </url>
    <url>
        <loc><?=site_url('lien-he')?></loc>
        <lastmod><?=date('d-m-Y H:i:s')?></lastmod>
        <priority>1.00</priority>
    </url>
    <url>
        <loc><?=site_url('phan-hoi-khach-hang')?></loc>
        <lastmod><?=date('d-m-Y H:i:s')?></lastmod>
        <priority>1.00</priority>
    </url>
    <url>
        <loc><?=site_url('gioi-thieu')?></loc>
        <lastmod><?=date('d-m-Y H:i:s')?></lastmod>
        <priority>0.80</priority>
    </url>

    <?php foreach ($list as $r){ ?>
        <url>
            <loc><?=site_url($r->link)?></loc>
            <lastmod><?=date('d-m-Y H:i:s')?></lastmod>
            <priority>0.80</priority>
        </url>
        <?php foreach ($CI->M_category->list_category_chill($r->id) as $m){?>
            <url>
                <loc><?=site_url($m->link)?></loc>
                <lastmod><?=date('d-m-Y H:i:s')?></lastmod>
                <priority>0.80</priority>
            </url>
        <?php } ?>
    <?php } ?>

    <?php foreach ($ar as $i){  ?>
        <url>
            <loc><?=site_url($i->link)?></loc>
            <lastmod><?=date('d-m-Y H:i:s')?></lastmod>
            <priority>0.80</priority>
        </url>
    <?php } ?>
    <?php foreach ($list_item as $i){  ?>
        <url>
            <loc><?=site_url($i->link)?></loc>
            <lastmod><?=date('d-m-Y H:i:s')?></lastmod>
            <priority>0.80</priority>
        </url>
    <?php } ?>

</urlset>