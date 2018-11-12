<?php
class Home extends CI_Controller{
    public function __construct() {
        parent::__construct();
         $this->load->helper(array('url', 'text', 'form', 'file'));
        $this->load->library(array('form_validation', 'ftp'));
        $this->load->database();
        $this->load->model('Thongtin_web');
        $this->load->library(array('session','cart'));
        $this->load->model('M_session');
        $this->load->model('M_banner');
        $this->load->model('M_artice');
        $this->load->library('user_agent');
    }
   

    public function index(){
      //  $r = $this->session->all_userdata();
        $data['home'] = 'home';
        //$ses = '';

        // if ($this->session->userdata('user')) {
           // $ses = $r['session_id'];
       // } else {
       //     foreach ($r as $k => $v) {
         //       $ses .= $v . '-';
         //   }
       // }


     //   $data['app'] = $app = $this->Thongtin_web->ThongTinSes($ses);
//        if ($this->uri->segment(1) == "") {
//            $lang = 'vn';
//        } else {
//            $lang = $this->uri->segment(1);
//        }
//        $data['lang'] = '';
//        $l = new lang();
//        if ($lang == '') {
//            $data['lang'] = 'en';
//        } else {
//            $data['lang'] = $lang;
//        }
//        $data['l'] = $l;

        $data['view'] = 'font/inc/content';
        $this->load->view('index.php', $data);

    }
    function addsession(){
       $this->session->set_userdata('popup', 1);
    }
    function addsession_datu(){
        $this->session->set_userdata('popup_dautu', 2);
    }



    function phanhoi(){
        $data['view']='font/inc/comment';

        $this->load->view('index.php',$data);

    }

    function letter(){
        $loi = "Gửi không thành công !! Bạn hãy thử lại";
        $email = $this->input->post('email');
        $sql = array(
            'email'=> $email,
            'time'=>time(),
            'type'=>1,
        );
        $this->db->insert('letter',$sql);
        $id = $this->db->insert_id();
        if (isset($id)) {
            echo "1";
        } else{
            echo $loi;
        }
        exit();
    }

    function email_letter(){
        $loi = "Gửi không thành công !! Bạn hãy thử lại";
        $email  = $_POST['email'];
        $sql =array(
            'email'=>$email,
            'date_reseive'=>date('Y-m-d H:i:s'),
            'type'=>4,
        );
        $this->db->insert('contact',$sql);
        $id = $this->db->insert_id();
        if (isset($id)) {
            echo 1;
        } else{
            echo $loi;
        }

    }

    function call(){
        $loi = "Gửi không thành công !! Bạn hãy thử lại";
        $id_item = $this->input->post('id_item');
        $phone = $this->input->post('phone');
        $link = $this->input->post('link');
        $sql = array(
            'id_item'=> $id_item,
            'phone'=>$phone,
            'link'=>$link,
            'time'=>time(),
            'type'=>2,
        );
        $this->db->insert('letter',$sql);
        $id = $this->db->insert_id();
        if (isset($id)) {
            echo 1;
        } else{
            echo $loi;
        }
        exit();

    }

    function gioithieu(){
        $data['gt'] = 'thongtin';
        $url = $this->uri->segment(1);
        $data['row'] = $this->M_artice->get_article_home(array('link'=>$url,'status' => 1));
     //   var_dump($data['row']);die;
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