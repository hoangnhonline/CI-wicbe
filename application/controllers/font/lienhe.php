<?php
class Lienhe extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('url', 'form', 'text', 'file'));
        $this->load->library(array('form_validation', 'ftp'));
        $this->load->model('M_session');
        $this->load->library(array('session','cart'));
        $this->load->model('M_artice');
        $this->load->model('Title');
        $this->load->model('M_lienhe');
        $this->load->view("font/lang/block");
        $this->load->model('Thongtin_web');
        $this->load->library('user_agent');
    }
    public function index(){

        $lang=  $this->uri->segment(1);
        $data['link_vn']='lien-he';
        $data['lienhe']="ss";
        $data['link_en']='contact';
        if($this->uri->segment(1)=='en'){$lh='Contact';}else{$lh='Liên Hệ';};
        $data['title']= $lh;
        $l = new lang();
        if ($lang == ''){
            $data['lang'] = 'en';
        }
        else
        $data['lang'] = $lang;
        $data['l'] = $l;

        $data['view'] = 'font/lienhe_gioithieu/lienhe';
        $this->load->view('index.php', $data);


    }
    public function gioithieu(){
        $data['title']="Giới thiệu";
        $data['view']='font/lienhe_gioithieu/gioithieu';
        $data['row']=$this->Thongtin_web->get_gioithieu(2);
        $this->load->view('index.php',$data);
    }
     public function checkcap() {
        if ($_POST['code'] == $_SESSION['captcha_code']) {
            return TRUE;
        } else {
            $this->form_validation->set_message('checkcap', "Mã xác nhận không đúng");
            return FALSE;
        }
    }
}

?>