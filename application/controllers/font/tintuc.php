<?php
class Tintuc extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('url', 'form', 'text', 'file'));
        $this->load->library(array('form_validation', 'ftp'));
        $this->load->model('M_session');
        $this->load->model('M_artice');
        $this->load->model('Title');
        $this->load->model('M_lienhe');
        $this->load->view("font/lang/block");
		$this->load->library('session');
		$this->load->library(array('session','cart'));
		$this->load->library('user_agent');
    }
    public function index($page_no =1){

		$data['title']="Tin tức - In bao bì Quốc Tiến";
        $data['tintuc']='chitiet';
        $data['type']=3;
		$page_co = 12;
		$start = ($page_no - 1) * $page_co;
		$count = $this->M_artice->count_page(array('type'=>2,'status'=>1));
		$data['page_no'] = $page_no;
		$data['list']= $this->M_artice->show_list_nga(array('type'=> 2,'status'=>1),$page_co, $start);
		$data['link'] = $this->paging($page_co, $count, $this->uri->segment(1).'/', $page_no);
		$data['view']='font/tintuc/list';
		$this->load->view('index.php', $data);

    }

	public function danhsach($page_no =1){
		$data['tin'] = "";

		$url = $this->uri->segment(1);

		$cate = $this->M_artice->get_link_cate($url);
		if($cate->title==''){
		    $title = $cate->name;
        }else{
            $title = $cate->title;
        }

		$data['title']= $title;
        $data['keywords']= $cate->keywords;
        $data['description']= $cate->description;
		$page_co = 12;
		$start = ($page_no - 1) * $page_co;
        $data['page_no'] = $page_no;
        $caregory = $this->M_artice->category_detail($url);
        if($cate->top ==0 ){
            $count = $this->M_artice->show_list_item_category_top_page($caregory->id, $page_co, $start, 0);
            $data['list'] = $this->M_artice->show_list_item_category_top_page($caregory->id, $page_co, $start, 1);
        }else{
            $count = $this->M_artice->show_list_item_category_top($caregory->id,$page_co, $start, 0);
            $data['list'] = $this->M_artice->show_list_item_category_top($caregory->id, $page_co, $start,1);
        }
        $data['link'] = $this->paging($page_co, $count, $this->uri->segment(1).'/', $page_no);
		$data['view']='font/tintuc/list';
		$this->load->view('index.php',$data);

	}

    public function tags($page_no =1){

        $url = $this->uri->segment(1);
        $cate = $this->M_artice->tas_row($url);
        if($cate->title==''){
            $title = $cate->name;
        }else{
            $title = $cate->title;
        }
        $data['title']= $title;
        $data['keywords']= $cate->keywords;
        $data['description']= $cate->description;
        $page_co = 12;
        $start = ($page_no - 1) * $page_co;
        $data['page_no'] = $page_no;
        $data['tags'] = $tags = $this->M_artice->tas_row($url);
        $count = $this->M_artice->show_list_tags($tags->id, $page_co, $start, 0);
        $data['list'] = $this->M_artice->show_list_item_category_top_page($tags->id, $page_co, $start, 1);
        $data['link'] = $this->paging($page_co, $count, $this->uri->segment(1).'/', $page_no);
        $data['view']='font/tintuc/list';
        $this->load->view('index.php',$data);

    }
    public function chitiet()
    {

        $url = $this->uri->segment(1);
        $data['tintuc'] = 'thongtin';
        $data['row'] = $this->M_artice->get_article_home(array('link' => $url, 'status' => 1));
        if (!isset($data['row']->id)) redirect();
        if($data['row']->title ==''){
            $title = $data['row']->name;
        }else{
            $title = $data['row']->title;
        }
        $data['name1']= site_url($data['row']->link);
        $data['link1']= $data['row']->img;
         $data['title']= $title;
		$data['keywords'] = $data['row']->keywords;
		$data['description']=$data['row']->description;
        $data['lienquan'] = $this->M_artice->tinlienquan(array('id !='=>$data['row']->id,'type'=>3,'status'=>1));
       $data['view']='font/tintuc/chitiet';
        $this->load->view('index.php',$data);

    }
    public function chitiet1()
    {

        $url = $this->uri->segment(1);
        $data['tintuc'] = 'thongtin';
        $data['row'] = $this->M_artice->get_article_home(array('link' => $url, 'status' => 1));
        if (!isset($data['row']->id)) redirect();
        if($data['row']->title ==''){
            $title = $data['row']->name;
        }else{
            $title = $data['row']->title;
        }
        $data['name1']= site_url($data['row']->link);
        $data['link1']= $data['row']->img;
        $data['title']= $title;
        $data['keywords'] = $data['row']->keywords;
        $data['description']=$data['row']->description;
        $data['view']='font/inc/about';
        $this->load->view('index.php',$data);

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
            
			".$num."
			
		</ul>
			";
		else
		$link='';

		return $link;

	}
    
}

?>