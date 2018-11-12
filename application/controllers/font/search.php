<?php

class Search extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('url', 'form', 'text', 'file'));
        $this->load->library(array('form_validation', 'ftp'));
        $this->load->model('M_session');
        $this->load->model('M_artice');
        $this->load->model('M_lienhe');
        $this->load->model('Title');
        $this->load->model('M_item');
        $this->load->model('M_category');
         $this->load->view("font/lang/block");
		$this->load->library('session');
		$this->load->library(array('session','cart'));
    }
    public function timkiem($page_no=1){
        $lang = $this->uri->segment(1);
        $data['tin'] = "";
        $l = new lang();
        if ($lang == '') {
            $data['lang'] = 'en';
        } else
            $data['lang'] = $lang;
        $data['l'] = $l;

        if (!isset($_GET['keys'])) redirect(site_url());
        $link = explode('/', $_SERVER['REQUEST_URI']);



		if(empty($link[4])){
			$url1 = $link[3];
		}else{
			$url1 = $link[4];
		}
         $url = strstr($url1, '?');
		if($lang == 'vn'){
			$data['title']="Tìm kiếm";
		}else{
			$data['title']="Search";
		}
		$data['last'] = 'product';
        $key = $this->KtraStr($_GET['keys']);
	//	$value = $this->KtraStr($_GET['value']);
		$page_co = 16;
		$start = ($page_no - 1) * $page_co;
		$key = $this->replace_all($key);



	$count = $this->M_lienhe->coult_search_item($lang,$key);

	$data['page_no'] = $page_no;
	$data['list']= $this->M_lienhe->search_item($lang,$key,$page_co, $start);
	$data['link'] = $this->paging_search($url, $page_co, $count, $this->uri->segment(1).'/'.$this->uri->segment(2).'/', $page_no);
        $data['view'] = 'font/sanpham/list';
        $this->load->view('index', $data);
    }
     function KtraStr($str){
		$str=trim(strip_tags(mysql_real_escape_string($str)));
		return $str;
	}
	function replace_all($string) {
		$url = '.html';
		$string = str_replace($url, '', $string);
		return $string;
	}
         public function paging_search($cat_url, $page,$total,$url,$id=1)
	{
		$previous_btn = true;
		$next_btn = true;
		$first_btn = true;
		$last_btn = true;
		//kiem tra
		$count=$total;
		$tongtrang=ceil($total/$page);
		$num="";

		if($count!=0)
		{
			if ($id >= 7) {
				$start_loop = $id - 4;
				if ($tongtrang > $id + 4)
				$end_loop = $id + 4;
				else if ($id <= $tongtrang && $id > $tongtrang - 6) {
					$start_loop = $tongtrang - 6;
					$end_loop = $tongtrang;
				} else {
					$end_loop = $tongtrang;
				}
			} else {
				$start_loop = 1;
				if ($tongtrang > 7)
				$end_loop = 7;
				else
				$end_loop = $tongtrang;
			}
		}
		// FOR ENABLING THE FIRST BUTTON
		if ($first_btn && $id > 1) {
			$dau = "<li  class=''><a href='".  base_url($url.$cat_url)."'>Đầu</a></li>";
		} else if ($first_btn) {
			$dau= "";
		}
		// FOR ENABLING THE PREVIOUS BUTTON
		if ($previous_btn && $id > 1) {
			$tam=$id-1;
			$lui = "<li class=''><a href='".base_url($url. $tam.$cat_url)."'>Lùi</a></li>";
		} else if ($previous_btn) {
			$lui = "";
		}
		if ($next_btn && $id < $tongtrang) {
			$tam2=$id+1;
			$toi = "<li class=''><a href='".base_url($url. $tam2.$cat_url)."'> Tới </a></li>";
		} else if ($next_btn) {
			$toi = "";
		}
		// TO ENABLE THE END BUTTON
		if ($last_btn && $id < $tongtrang) {
			$cuoi= "<li  class=''><a href='".base_url($url.$tongtrang.$cat_url)."'> Cuối </a></li>";
		} else if ($last_btn) {
			$cuoi = "";
		}
		if($count>0)
		{
			for($i=$start_loop;$i<=$end_loop;$i++)
			{
				if($i==$id)
				$num.="<li class='page'><a href='#' title='' onclick='return false'>$i</a></li>";
				else
				$num.="<li><a href='".base_url($url . $i.$cat_url)."' title=''>$i</a></li>";
			}
		}
		if($count>0&&$tongtrang>1)
		$link="
		<ul class='pagination'>
			".$num."
		</ul>
			";
		else
		$link='';
		return $link;
	}
}
?>