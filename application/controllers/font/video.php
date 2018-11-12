<?php

class Video extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form', 'text', 'file'));
        $this->load->library(array('form_validation', 'ftp'));
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('M_session');
        $this->load->model('M_category');
        $this->load->model('Title');
          $this->load->view("font/lang/block");
        $this->load->model('M_admin');
        $this->load->model('M_artice','M_images');
        $this->load->library(array('session','cart'));
    }
    public function index($page_no=1){

        $data['view']='font/images/list_video';
       // echo $page_no;die();
        $lang = $this->uri->segment(1);
         $l = new lang();
        if ($lang == ''){
            $data['lang'] = 'vn';

            }
        else
            $data['lang'] = $lang;
        $data['l'] = $l;

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
    
    public function get_video()
	{

		$video_id = (int)$this->input->post('video_id');
		$this->db->select('articledetail.article_name');
		$this->db->where('article.id',$video_id);
                $this->db->where('article_type',4);
               $this->db->where("country.name", $this->uri->segment(1));
		$this->db->order_by('article.article_weight', 'ASC');
		$this->db->order_by('article.id', 'DESC');
		$this->db->from('article');
		$this->db->join('articledetail','articledetail.article_id=article.id');
              $this->db->join('country', 'articledetail.country_id=country.id');
		$query = $this->db->get();
		if($query->num_rows() >0 )
		{
			$row 	  = $query->row_array();
			$title 	  = $row['video_name'];
			$content  = "";
			
			
			$data = $title.'||'.$content; 
			echo $data;
		}else
		{
			$status = 1;
			$msg    = 'Data not found!';
			$data   = $status.'||'.$msg;
			echo $data;exit;
		}
	}
         public function paging($page, $total, $url, $id = 1) {

        $previous_btn = true;
        $next_btn = true;
        $first_btn = true;
        $last_btn = true;
        //kiem tra
        $count = $total;
        $tongtrang = ceil($total / $page);
        $num = "";

        if ($count != 0) {
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
            $dau = "<li  class=''><a href='" . site_url($url) . "'>Đầu</a></li>";
        } else if ($first_btn) {
            $dau = "";
        }

        // FOR ENABLING THE PREVIOUS BUTTON
        if ($previous_btn && $id > 1) {
            $tam = $id - 1;
            $lui = "<li class=''><a href='" . site_url($url . $tam) . "'>Lùi</a></li>";
        } else if ($previous_btn) {
            $lui = "";
        }


        if ($next_btn && $id < $tongtrang) {
            $tam2 = $id + 1;
            $toi = "<li class=''><a href='" . site_url($url . $tam2) . "'> Tới </a></li>";
        } else if ($next_btn) {
            $toi = "";
        }

        // TO ENABLE THE END BUTTON
        if ($last_btn && $id < $tongtrang) {
            $cuoi = "<li  class=''><a href='" . site_url($url . $tongtrang) . "'> Cuối </a></li>";
        } else if ($last_btn) {
            $cuoi = "";
        }
        if ($count > 0) {
            for ($i = $start_loop; $i <= $end_loop; $i++) {
                if ($i == $id)
                    $num.="<li class='page'><a href='#' title='' onclick='return false'>$i</a></li>";
                else
                    $num.="<li><a href='" . site_url($url . $i) . "' title=''>$i</a></li>";
            }
        }
        if ($count > 0 && $tongtrang > 1)
            $link = "
		<ul class='pagination'>
            
			"  . $num . "
			
		</ul>
			";
        else
            $link = '';

        return $link;
    }
    
    
}
?>