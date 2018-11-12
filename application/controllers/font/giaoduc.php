<?php
class Giaoduc extends CI_Controller{
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
    }
    public function index($page_no =1){
        $data['view']='font/giaoduc/list';
        $lang = $this->uri->segment(1);
        if($lang == 'vn'){
            $data['title']="Giáo dục";
        }else{
            $data['title']="Education";
        }

        $data['link_vn'] = "giao-duc";
        $data['link_en'] = "education";
        $data['giaoduc']="Tin tức";
        $lang = $this->uri->segment(1);
        $l = new lang();
        if ($lang == '') {
            $data['lang'] = 'en';
        } else
            $data['lang'] = $lang;
        $data['l'] = $l;

        $data['thongtin']='chitiet';

        $page_co = 9;

        $start = ($page_no - 1) * $page_co;

        $count = $this->M_artice->count_page(array('article.article_type'=>5,'article.article_status'=>1));

        $data['page_no'] = $page_no;
        $data['list']= $this->M_artice->show_list_nga(array('article.article_type'=> 5,'article.article_status'=>1),$lang,$page_co, $start);

        $data['link'] = $this->paging($page_co, $count, $this->uri->segment(1).'/'. $this->uri->segment(2).'/', $page_no);

        $this->load->view('index.php',$data);
    }
    public function danhsach($page_no =1){
        $data['tin'] = "";
        $data['view']='font/tintuc/list';
        $lang = $this->uri->segment(1);
        $l = new lang();
        if ($lang == '') {
            $data['lang'] = 'en';
        } else
            $data['lang'] = $lang;
        $data['l'] = $l;
        $data['tintuc']="tintuc";
        $link_vn_en = $this->M_artice->link_vn_en_cate($this->uri->segment(3));
        $link_vn = $this->M_artice->link_vn_en_cate_2($link_vn_en->category_id,1);
        $link_en = $this->M_artice->link_vn_en_cate_2($link_vn_en->category_id,2);
        $data['link_vn'] = "danh-muc-tin/".$link_vn->category_link;
        $data['link_en'] = "list-of-news/".$link_en->category_link;
        if($lang=='vn'){
            $data['title']=$link_vn->category_name;
        }else{
            $data['title']=$link_en->category_name;
        }
        $lang = $this->uri->segment(1);
        $l = new lang();
        if ($lang == '') {
            $data['lang'] = 'en';
        } else
            $data['lang'] = $lang;
        $data['l'] = $l;
        $page_co = 1;
        $data['thongtin']='chitiet';
        $start = ($page_no - 1) * $page_co;

        $count = $this->M_artice->count_td($this->uri->segment(3),4);

        $data['page_no'] = $page_no;
        $data['list']= $this->M_artice->danhsach_td($this->uri->segment(3),$lang,4,$page_co, $start);
        $data['link'] = $this->paging($page_co, $count, $this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/', $page_no);
        $this->load->view('index.php',$data);
    }
    public function chitiet(){
        $lang = $this->uri->segment(1);
        $data['tin'] = "";
        $l = new lang();
        if ($lang == '') {
            $data['lang'] = 'en';
        } else
            $data['lang'] = $lang;
        $data['l'] = $l;
        $data['view']='font/dichvu/detail';
        $data['thongtin']='thongtin';

        $data['row']=$this->M_artice->get_article_home(array('articledetail.article_link'=> $this->uri->segment(2),'article.article_status'=>1),$lang);
        if(!isset($data['row']->id)) redirect ();
        $link_vn = $this->M_artice->article_link($data['row']->id,1);
        $link_en = $this->M_artice->article_link($data['row']->id,2);
        $data['link_vn'] = $link_vn->article_link;
        $data['link_en'] = $link_en->article_link;
        $data['title']=$data['row']->article_name;
        $data['keywords']=$data['row']->article_keywords;
        $data['description']=$data['row']->article_description;



        if($this->M_artice->check_cate_show($data['row']->id,'dangbo') != 0) {

            $id_Cate = $this->M_artice->chek_ct('dangbo',$this->uri->segment(2));
            $data['lienquan'] = $this->M_artice->show_list_tin_lq(2, array('article.id !=' => $data['row']->id,'category.id'=>$id_Cate->category_id), 'dangbo');

            $data['dichvu']='dichvu';
        }else{
            $id_Cate = $this->M_artice->chek_ct('tuyendung',$this->uri->segment(2));
            $data['news']='dichvu';
            $data['lienquan'] = $this->M_artice->show_list_tin_lq(4, array('article.id !=' => $data['row']->id,'category.id'=>$id_Cate->category_id), 'tuyendung');

        }

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