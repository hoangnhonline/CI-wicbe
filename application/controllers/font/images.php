<?php

class Images extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form', 'text', 'file'));
        $this->load->library(array('form_validation', 'ftp'));
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('M_session');
        $this->load->model('M_category');
        $this->load->model('Title');
        $this->load->model('M_images');
        $this->load->model('M_artice');
		$this->load->library('session');
          $this->load->view("font/lang/block");
		$this->load->library(array('session','cart'));
    }
    
    public function index ($page_no = 1){

       $data['view']='font/images/list';
       if($this->uri->segment(1)=='vn'){
            $data['title'] = "Thư viện";
       }else{
            $data['title'] = "Images";
       }
       
        $lang = $this->uri->segment(1);
        $l = new lang();
        if ($lang == '') {
            $data['lang'] = 'en';
        } else
            $data['lang'] = $lang;
        $data['l'] = $l;
	 $data['thuvien']='list_video';
         $page_co = 9;
        $data['link_vn'] = "thu-vien";
        $data['link_en'] = "library";
        $start = ($page_no - 1) * $page_co;
        $count = $this->M_images->count_show_list_img_home_thuvien(array('video_library.status'=>1,'country.name'=>$lang));
        $data['page_no'] = $page_no;
      $data['list']=$this->M_images->show_list_img_home_thuvien(array('video_library.status'=>1,'country.name'=>$lang),$page_co, $start);

      $data['link'] = $this->paging($page_co, $count, $this->uri->segment(1).'/'.$this->uri->segment(2).'/', $page_no);
        
        $this->load->view('index',$data);
    }

    public function hinhanhtrungtam($page_no = 1){
	 $data['view']='font/images/list';
	 if($this->uri->segment(1)=='vn'){
	     $data['title'] = "Hình ảnh trung tâm";
	 }else{
	     $data['title'] = "Pictures center";
	 }

	 $lang = $this->uri->segment(1);
	 $l = new lang();
	 if ($lang == '') {
	     $data['lang'] = 'en';
	 } else
	     $data['lang'] = $lang;
	 $data['l'] = $l;
	 $page_co = 9;
	 $data['thuvien']='list_video';
	 $data['link_vn'] = "hinh-anh-trung-tam";
	 $data['link_en'] = "pictures-center";
	 $start = ($page_no - 1) * $page_co;
	 $count = $this->M_images->count_show_list_img_home(2,array('video_library.status'=>1,'country.name'=>$lang));
	 $data['page_no'] = $page_no;
	 $data['list']=$this->M_images->show_list_img_home(2,array('video_library.status'=>1,'country.name'=>$lang),$page_co, $start);
	 $data['link'] = $this->paging($page_co, $count, $this->uri->segment(1).'/'.$this->uri->segment(2).'/', $page_no);

	 $this->load->view('index',$data);
    }
    public function thuvienanh($page_no = 1){
	 $data['view']='font/images/list';
	 if($this->uri->segment(1)=='vn'){
	     $data['title'] = "Thư viện ảnh";
	 }else{
	     $data['title'] = "Pictures library";
	 }

	 $lang = $this->uri->segment(1);
	 $l = new lang();
	 if ($lang == '') {
	     $data['lang'] = 'en';
	 } else
	     $data['lang'] = $lang;
	 $data['l'] = $l;
	 $page_co = 9;
	 $data['giaoduc']='font';
	 $data['link_vn'] = "thu-vien-anh";
	 $data['link_en'] = "pictures-library";
	 $start = ($page_no - 1) * $page_co;
	 $count = $this->M_images->count_show_list_img_home(1,array('video_library.status'=>1,'country.name'=>$lang));
	 $data['page_no'] = $page_no;
	 $data['list']=$this->M_images->show_list_img_home(1,array('video_library.status'=>1,'country.name'=>$lang),$page_co, $start);
	 $data['link'] = $this->paging($page_co, $count, $this->uri->segment(1).'/'.$this->uri->segment(2).'/', $page_no);

	 $this->load->view('index',$data);
    }
    public function sinhhoatchung($page_no = 1){
	 $data['view']='font/images/list';
	 if($this->uri->segment(1)=='vn'){
	     $data['title'] = "Hình ảnh sinh hoạt chung";
	 }else{
	     $data['title'] = "Photos living";
	 }

	 $lang = $this->uri->segment(1);
	 $l = new lang();
	 if ($lang == '') {
	     $data['lang'] = 'en';
	 } else
	     $data['lang'] = $lang;
	 $data['l'] = $l;
	 $page_co = 9;
	 $data['thuvien']='list_video';
	 $data['link_vn'] = "hinh-anh-sinh-hoat-chung";
	 $data['link_en'] = "photos-living";
	 $start = ($page_no - 1) * $page_co;
	 $count = $this->M_images->count_show_list_img_home(3,array('video_library.status'=>1,'country.name'=>$lang));
	 $data['page_no'] = $page_no;
	 $data['list']=$this->M_images->show_list_img_home(3,array('video_library.status'=>1,'country.name'=>$lang),$page_co, $start);

	 $data['link'] = $this->paging($page_co, $count, $this->uri->segment(1).'/'.$this->uri->segment(2).'/', $page_no);

	 $this->load->view('index',$data);
    }
    public function video($page_no = 1){

	 $data['view']='font/images/list_video';
	 $data['sukien']='list_video';
	 if($this->uri->segment(1)=='vn'){
	     $data['title'] = "Video";
	 }else{
	     $data['title'] = "Video";
	 }
	 $lang = $this->uri->segment(1);
	 $l = new lang();
	 if ($lang == '') {
	     $data['lang'] = 'en';
	 } else
	     $data['lang'] = $lang;
	 $data['l'] = $l;
	 $page_co = 9;
	 $data['link_vn'] = "video";
	 $data['link_en'] = "video";
	 $start = ($page_no - 1) * $page_co;
	 $count = $this->M_images->count_show_list_img_home(2,array('video_library.status'=>1,'country.name'=>$lang));
	 $data['page_no'] = $page_no;
	 $data['list']=$this->M_images->show_list_img_home(2,array('video_library.status'=>1,'country.name'=>$lang),$page_co, $start);

	 $data['link'] = $this->paging($page_co, $count, $this->uri->segment(1).'/'.$this->uri->segment(2).'/', $page_no);

	 $this->load->view('index',$data);
    }
    public function thuvien_video($page_no = 1){
	 $data['view']='font/images/list_video';
	 $data['giaoduc']='list_video';
	 if($this->uri->segment(1)=='vn'){
	     $data['title'] = "Video";
	 }else{
	     $data['title'] = "Video";
	 }
	 $lang = $this->uri->segment(1);
	 $l = new lang();
	 if ($lang == '') {
	     $data['lang'] = 'en';
	 } else
	     $data['lang'] = $lang;
	 $data['l'] = $l;
	 $page_co = 9;
	 $data['link_vn'] = "thu-vien-video";
	 $data['link_en'] = "video-library";
	 $start = ($page_no - 1) * $page_co;
	 $count = $this->M_images->count_show_list_img_home(5,array('video_library.status'=>1,'country.name'=>$lang));
	 $data['page_no'] = $page_no;
	 $data['list']=$this->M_images->show_list_img_home(5,array('video_library.status'=>1,'country.name'=>$lang),$page_co, $start);

	 $data['link'] = $this->paging($page_co, $count, $this->uri->segment(1).'/'.$this->uri->segment(2).'/', $page_no);

	 $this->load->view('index',$data);
    }

    function chitiet_video(){
	 $data['view']='font/images/detail_video';
	 $url = $this->uri->segment(2);
	 $lang = $this->uri->segment(1);

	 $l = new lang();
	 if ($lang == '') {
	     $data['lang'] = 'en';
	 } else
	     $data['lang'] = $lang;
	 $data['l'] = $l;
	 $data['img']= $img_id = $this->M_images->get_img_link_nn(array('video_library_detail.name_link'=>$url,'video_library.status'=>1,'country.name'=>$lang));

	 $data['title'] =  $data['img']->name;
	 $link_vn = $this->M_images->get_img_link_nn(array('video_library.id'=>$img_id->id,'video_library.status'=>1,'country.name'=>'vn'));
	 $link_en = $this->M_images->get_img_link_nn(array('video_library.id'=>$img_id->id,'video_library.status'=>1,'country.name'=>'en'));

	 $data['link_vn'] = $link_vn->name_link;
	 $data['link_en'] = $link_en->name_link;
	 if($img_id->type==2) {

	     $data['sukien']='list_video';
	     $data['lienquan'] = $this->M_images->show_list_video_home_hot(array('video_library.type' => 2, 'video_library.id !=' => $img_id->id,'country.name'=>$lang), 8, 0);

	 }else{
	     $data['giaoduc']='list_video';
	     $data['lienquan'] = $this->M_images->show_list_video_home_hot(array('video_library.type' => 2, 'video_library.id !=' => $img_id->id,'country.name'=>$lang), 9, 0);
	 }



	 $this->load->view('index',$data);

    }

    function chitiet(){
	 $data['view']='font/images/detail';
        $url = $this->uri->segment(2);
	 $lang = $this->uri->segment(1);
	 $l = new lang();
	 if ($lang == '') {
	     $data['lang'] = 'en';
	 } else
	     $data['lang'] = $lang;
	 $data['l'] = $l;
	 $data['img']= $img_id = $this->M_images->get_img_link_nn(array('video_library_detail.name_link'=>$url,'video_library.status'=>1,'country.name'=>$lang));
	 $data['title'] =  $data['img']->name;
	 $link_vn = $this->M_images->get_img_link_nn(array('video_library.id'=>$img_id->id,'video_library.status'=>1,'country.name'=>'vn'));
	 $link_en = $this->M_images->get_img_link_nn(array('video_library.id'=>$img_id->id,'video_library.status'=>1,'country.name'=>'en'));

	 $data['link_vn'] = $link_vn->name_link;
	 $data['link_en'] = $link_en->name_link;
	 if($img_id->type==1){
	     $data['giaoduc']='list_video';
	     $data['lienquan'] = $this->M_images->show_list_img_home_hot(array('video_library.type' => 1, 'video_library.id !=' => $img_id->id,'country.name'=>$lang), 9, 0);
	 }elseif($img_id->type==2){

	     $data['thuvien']='list_video';
	     $data['lienquan'] = $this->M_images->show_list_img_home_hot(array('video_library.type' => 2, 'video_library.id !=' => $img_id->id,'country.name'=>$lang), 9, 0);
	 }else{
	     $data['thuvien']='list_video';
	     $data['lienquan'] = $this->M_images->show_list_img_home_hot(array('video_library.type' => 3, 'video_library.id !=' => $img_id->id,'country.name'=>$lang), 9, 0);
	 }


	 $this->load->view('index',$data);

    }
    public function load(){
        
       $this->load->view('font/congtrinh/load_ajax');
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
			$dau = "<li  class=''><a href='".site_url($url)."'>‹‹</a></li>";
		} else if ($first_btn) {
			$dau= "<li  class='text'></li>";
		}

		// FOR ENABLING THE PREVIOUS BUTTON
		if ($previous_btn && $id > 1) {
			$tam=$id-1;
			$lui = "<li class=''><a href='".site_url($url. $tam)."'><<</a></li>";
		} else if ($previous_btn) {
			$lui = "<li class='text'>Lùi</li>";
		}


		if ($next_btn && $id < $tongtrang) {
			$tam2=$id+1;
			$toi = "<li class=''><a href='".site_url($url. $tam2)."'> Tới </a></li>";
		} else if ($next_btn) {
			$toi = "<li class='text'>Tới</li>";
		}

		// TO ENABLE THE END BUTTON
		if ($last_btn && $id < $tongtrang) {
			$cuoi= "<li  class=''><a href='".site_url($url.$tongtrang)."'> Cuối </a></li>";
		} else if ($last_btn) {
			$cuoi = "<li class='text'>Cuối</li>";
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
