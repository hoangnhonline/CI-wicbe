<?php
class Login extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'text', 'form', 'file'));
        $this->load->library(array('form_validation', 'ftp'));
        $this->load->database();
        $this->load->view("font/lang/block");
        $this->load->model('Thongtin_web');
        $this->load->library(array('session','cart'));
        $this->load->model('M_session');
        $this->load->model('M_item');
    }


    public function index(){

        $data['link_vn'] = 'login';
        $data['link_en'] = 'login';

        if ($this->uri->segment(1) == "") {
            $lang = 'vn';
        } else {
            $lang = $this->uri->segment(1);
        }
        $data['lang'] = '';
        $l = new lang();

        if ($lang == '') {
            $data['lang'] = 'en';

        } else {
            $data['lang'] = $lang;
        }
        $data['l'] = $l;
        $this->load->library('user_agent');


        $data['view'] = 'font/login/index';

        $this->load->view('index.php', $data);

    }
    function register(){
        $check = $this->a_general->get_row("user_customer", array("email" => $this->input->post('email_dk')));
        if (isset($check->id)) {
            echo "Email ?ã t?n t?i";
        } else {
        $sql = array(
            "name" => $this->input->post('name'),
            "code" => $this->input->post('code'),
            "status" => 1,
            "email"=>$this->input->post('email'),
            "password" => md5($this->input->post('password'))
        );
        $this->db->insert("user_customer", $sql);
        $id = $this->db->insert_id();
        $data['user'] = $this->a_general->get_row("user_customer", array("id" => $id));
        $this->session->set_userdata('user', $this->m_user->set_login_customer($data['user']->code, $data['user']->password));
        if (isset($id)) {

            redirect(site_url());
        }
    }}

    function addsession_datu(){

        $this->session->set_userdata('popup_dautu', 2);

    }


}
?>