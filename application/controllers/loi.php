<?php
class Loi extends CI_Controller{
    public function __construct() {
        parent::__construct();
         $this->load->helper(array('url', 'text', 'form', 'file'));
        $this->load->library(array('form_validation', 'ftp'));
        $this->load->database();
        $this->load->view("font/lang/block");
            $this->load->helper('url');
        $this->load->model('M_session');
        $this->load->model('M_category');
        $this->load->model('M_item');
        $this->load->model('Title');
        $this->load->model('M_admin');
        $this->load->model('Counter');
        $this->load->model('M_color');
        $this->load->model('M_artice');
    }

    public function index() {
        redirect();
    }
    function PCategory($url, $page_no = 1) {
        $data['h1'] = 'show';
        $page_co=8;
         $data['sanpham']='sanpham';
        $data['view'] = 'font/sanpham/index';
        $array = array();
        $data['menu'] = $this->uri->segment(1);  
        $start = ($page_no - 1) * $page_co;
        $caregory = $this->M_item->category_detail($url);
        $count = $this->M_item->show_list_item_category_top_page($caregory->id,$page_co, $start, 0);
        $data['item'] = $this->M_item->show_list_item_category_top_page($caregory->id, $page_co, $start,1);
        $data['link'] = $this->paging($page_co, $count, $url . '/', $page_no);
        $data['title'] = $caregory->category_name;
        $data['mod'] = $url;
        if ($count > 0) {
            $data['content'] = 'item/category';
        } else {
            $data['content'] = 'error/empty';
        }
        $this->load->view("index", $data);
    }
    function Category($url, $page_no = 1) {
        $data['h1'] = 'show';
       $data['sanpham']='sanpham';
        $data['view'] = 'font/sanpham/index';
        $data['menu'] = $this->uri->segment(2);
        $array = array();
        
        $data['page_nom'] = 1;
        $page_co =2;
        $start = ($page_no - 1) * $page_co;
        $caregory = $this->M_item->category_detail_parent($this->uri->segment(1),$url);
        $count = $this->M_item->show_list_item_category_page($caregory->id, $page_co, $start, 0);
        $data['item'] = $this->M_item->show_list_item_category_page($caregory->id, $page_co, $start);
       // echo $url;
        $data['link'] = $this->paging($page_co, $count,  $this->uri->segment(1).'/'.$url . '/', $page_no);
        $data['title'] = $caregory->category_name;
        $data['mod'] = $url;
       // $data['company'] = $this->a_general->show_company($lang);
    //    $data['banner_detail'] = $this->a_item->get_banner($caregory->banner_id);
        if ($count > 0) {
            $data['content'] = 'item/category';
        } else {
            $data['content'] = 'error/empty';
        }
        $this->load->view("index", $data);
    }
     public function paging($page,$total,$url,$id=1)
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
			$dau = "<li  class=''><a href='".site_url($url)."'>Đầu</a></li>";
		} else if ($first_btn) {
			$dau= "";
		}

		// FOR ENABLING THE PREVIOUS BUTTON
		if ($previous_btn && $id > 1) {
			$tam=$id-1;
			$lui = "<li class=''><a href='".site_url($url. $tam)."'>Lùi</a></li>";
		} else if ($previous_btn) {
			$lui = "";
		}


		if ($next_btn && $id < $tongtrang) {
			$tam2=$id+1;
			$toi = "<li class=''><a href='".site_url($url. $tam2)."'> Tới </a></li>";
		} else if ($next_btn) {
			$toi = "";
		}

		// TO ENABLE THE END BUTTON
		if ($last_btn && $id < $tongtrang) {
			$cuoi= "<li  class=''><a href='".site_url($url.$tongtrang)."'> Cuối </a></li>";
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
				$num.="<li><a href='".site_url($url . $i)."' title=''>$i</a></li>";
			}
		}
		if($count>0&&$tongtrang>1)
		$link="
		<ul class='pagination'>
            
			".$dau.$lui.$num.$toi.$cuoi."
			
		</ul>
			";
		else
		$link='';

		return $link;

	}

}

?>