<style>
    #table_tt{color: #565656; font-weight: bold;font-size: 14px; margin: auto;width: 800px;margin-top: 10px;border: 1px solid #0097f5;font-family: 'arial'}
    h2{color: #D81C23;font-size: 15px;font-family: 'arial'}
</style>
<script>
    function goBack() {
        window.history.back()
    }
</script>
<?php
$CI =&get_instance();
$CI->load->model('M_artice');
$item = $CI->M_artice->get_article_all(array('article.id'=>$row->id_product,'country.name'=>'vn'))

?>
<h2>Thông Tin Khách Hàng</h2>
<table border='1' id="table_tt" >
    <tbody>

    <tr>
        <td>Tên công ty</td>
        <td><?=$row->name?></td>
    </tr>

    <tr>
        <td>Email</td>
        <td><?=$row->email?></td>
    </tr>
    <tr>
        <td>Tên bài viết </td>
        <td><a target="_blank" href="<?=site_url('vn'.'/'.'co-hoi-dau-tu'.'/'.$item->article_link)?>"> <?=$item->article_name?></a></td>
    </tr>
    <tr>
        <td>Số điện thoại </td>
        <td><?=$row->phone?></td>
    </tr>
    <tr>
        <td>Ngày đặt hàng</td>
        <td> <?=date('d-m-Y H:i:s', strtotime($row->date_reseive))?></td>
    </tr>


    <tr>
        <td>Ghi chú</td>
        <td><?=$row->note?></td>
    </tr>

    </tbody>
</table>
<p style="clear:both;height: 20px"></p>

<p style="clear:both;height: 10px"></p>
<div style="width:900px;text-align: center">
    <input type="button" class="btn check_cat" onclick="goBack()" value="Trở Về" name="ok" style="text-align: center"/>
</div>

<style>
    a{list-style: none;color: #f00;text-decoration: none}
</style>