<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



require_once( BASEPATH .'database/DB'. EXT ); $db =& DB();
$route['default_controller'] = "font/home/index";
$route['404_override'] = 'loi/index';

$route['(khach-hang)'] = 'font/khachhang/index';
$route['(download)/(:any)'] = 'font/sanpham/download/$2';
$route['(download)'] = 'font/sanpham/download';

$route['update_cart'] = "font/sanpham/update_cart";
$route['cong_soluong'] = "font/sanpham/cong_soluong";
$route['(thanh-toan)'] = "font/sanpham/order_info/$1";

$route['(email)'] = "font/sanpham/email";
$route['remove_all_cart'] = "font/sanpham/remove_all_cart";
$route['(reset_pas)'] = "index/resetpass";
$route['tru_soluong'] = "font/sanpham/tru_soluong";
$route['save_mua'] = "font/sanpham/muahang";
$route['addcart'] = "font/sanpham/addcart";
$route['addcart'] = "font/sanpham/addcart";
$route['addcart-detail'] = "font/sanpham/addcardetail";
$route['update_cart'] = "font/sanpham/update_cart";
$route['remove_cart'] = "font/sanpham/remove_cart";
$route['(login-ajax)'] = 'index/LoginAjax';
$route['(sigin-ajax)'] = "index/SiginAjax";
$route['(thoat)'] = "index/Logout";
$route['(dat-hang)'] = 'index/oder';
$route['(gio-hang)'] = 'font/sanpham/order';
$route['(san-pham)/(:num)'] = 'font/sanpham/index/$2';
$route['(san-pham)'] = 'font/sanpham/index';
$route['(insert-order)'] = 'font/sanpham/thanhtoan';

$route['(login|login)'] = 'font/login/index';
$route['(thoat)'] = "index/Logout";
$route['(dat-hang)'] = 'index/oder';
$route['(lien-he)'] = 'font/lienhe/index';

$route['(tim-kiem)/(:num)'] = 'font/search/timkiem/$3';
$route['(tim-kiem)'] = 'font/search/timkiem';

$route['(du-an-da-thuc-hien)/(:num)'] = 'font/home/duan/$1';
$route['(phan-hoi-khach-hang)'] = 'font/home/phanhoi';
$route['(du-an-da-thuc-hien)'] = 'font/home/duan';
$route['(gioi-thieu)'] = 'font/home/gioithieu';
$route['(email-letter)'] = 'font/home/letter';
$route['(call-back)'] = 'font/home/call';
$route['sitemap\.xml'] = "font/sitemap/index";

$db->select("link");
$db->where(array('status'=>1,'type'=>1));
$db->from('category');
$query_cat1 = $db->get();$result_cat1 = $query_cat1->result(); $query_cat1->free_result();
if(count($result_cat1)>0){	foreach ($result_cat1 as $cat_catsp1){
    $route[''.$cat_catsp1->link.'/(:num)'] = "font/sanpham/danhsach/$2";
    $route[''.$cat_catsp1->link.''] = "font/sanpham/danhsach";
}}
$db->select("link");
$db->where(array('status'=>1,'type'=>1));
$db->from('item');
$query_cat1 = $db->get();$result_cat1 = $query_cat1->result(); $query_cat1->free_result();
if(count($result_cat1)>0){	foreach ($result_cat1 as $cat_catsp1){
    $route[''.$cat_catsp1->link.''] = "font/sanpham/chitiet";
}}

$db->select("link");
$db->where(array('status'=>1,'type'=>2));
$db->from('category');
$query_cat1 = $db->get();$result_cat1 = $query_cat1->result(); $query_cat1->free_result();
if(count($result_cat1)>0){	foreach ($result_cat1 as $cat_catsp1){
    $route[''.$cat_catsp1->link.'/(:num)'] = "font/tintuc/danhsach/$1";
    $route[''.$cat_catsp1->link.''] = "font/tintuc/danhsach";
}}

$db->select("link");
$db->where(array('status'=>1));
$db->from('tags');
$query_cat1 = $db->get();$result_cat1 = $query_cat1->result(); $query_cat1->free_result();
if(count($result_cat1)>0){	foreach ($result_cat1 as $cat_catsp1){
    $route[''.$cat_catsp1->link.'/(:num)'] = "font/sanpham/tags/$2";
    $route[''.$cat_catsp1->link.''] = "font/sanpham/tags";
}}

$db->select("link");
$db->where(array('status'=>1,'type'=>3));
$db->from('article');
$query_cat1 = $db->get();$result_cat1 = $query_cat1->result(); $query_cat1->free_result();
if(count($result_cat1)>0){	foreach ($result_cat1 as $cat_catsp1){
    $route[''.$cat_catsp1->link.''] = "font/tintuc/chitiet";
}}

$db->select("link");
$db->where(array('status'=>1,'type'=>4));
$db->from('article');
$query_cat1 = $db->get();$result_cat1 = $query_cat1->result(); $query_cat1->free_result();
if(count($result_cat1)>0){	foreach ($result_cat1 as $cat_catsp1){
    $route[''.$cat_catsp1->link.''] = "font/tintuc/chitiet1";
}}



//$db->select("link");
//$db->where(array('status'=>1,'type'=>1));
//$db->from('article');
//$query_cat1 = $db->get();$result_cat1 = $query_cat1->result(); $query_cat1->free_result();
//if(count($result_cat1)>0){	foreach ($result_cat1 as $cat_catsp1){
//    $route[''.$cat_catsp1->link.''] = "font/home/gioithieu";
//}}


$route['admin/login'] = "back/adminstrator/login";
$route['admin'] = 'back/adminstrator/trangchu';
$route['(admin/logout)'] = 'back/adminstrator/logout';
$route['(admin/changepass)'] = 'back/adminstrator/changepass';

////$route['(admin/article)'] = "back/article/index";
//$route['(back/category/index/1)'] = "back/category/index/1";
//$route['(admin/category)/(:any)'] = "back/category/$2";
//$route['(admin/term)'] = "back/term/index";
//$route['(admin/term)/(:any)'] = "back/term/$2";
//$route['(admin/item)'] = "back/item/index";
//$route['(admin/item)/(:any)'] = "back/item/$2";
//$route['(admin/information)'] = "back/information/index";
//$route['(admin/information)/(:any)'] = "back/information/$2";
//$route['(admin/page)'] = "back/page/index";
//$route['(admin/page)/(:any)'] = "back/page/$2";
//$route['(admin/banner)'] = "back/banner/index";
//$route['(admin/banner)/(:any)'] = "back/banner/$2";
//$route['(admin/province)'] = "back/province/index";
//$route['(admin/province)/(:any)'] = "back/province/$2";
/* End of file routes.php */
/* Location: ./application/config/routes.php */