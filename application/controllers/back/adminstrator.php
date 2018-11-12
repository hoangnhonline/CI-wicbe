<?php

class Adminstrator extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url','form', 'text',  'file'));
        $this->load->library(array('form_validation', 'ftp'));
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('M_session');
        $this->load->model('M_admin');
    }

    public function index() {
        if (!$this->M_session->userdata('admin_login')) {
            redirect(site_url('admin/login'));
        } else {
            redirect(base_url('admin/trangchu'));
        }
    }

    function login() {
        $this->load->library('form_validation');
        if ($this->input->post()) {
            $this->form_validation->set_rules('username', 'username', 'required|trim');
            $this->form_validation->set_rules('password', 'password', 'required|trim|callback_checklogin');
            $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
            $this->form_validation->set_message('checklogin', 'Sai username hoặc password');
            if ($this->form_validation->run() == true) {
                $user = strtolower($_POST['username']);
                $pass = $_POST['password'];
                $record = $this->M_admin->login($user, $pass); //TRUY VẤN DỮ LIỆU
                if ($record->num_rows() == 1) {
                    $login = $record->row();
                    $this->M_session->set_userdata('admin_login', $login);
                    @session_start();
                    @$_SESSION['active_log'] = true;
                    redirect(site_url('admin'));
                } else {
                    redirect(site_url('admin/login'));
                }}}
        $this->load->view('back/login');
    }
      public function changepass() {

        if (!$this->M_session->userdata('admin_login')) redirect(site_url('admin/login'));
        if (isset($_POST['btnOK'])) {
            $this->form_validation->set_rules('pass_old', 'Mật khẩu', 'trim|required|callback_checklogin_pass|max_length[24]|min_length[3]');
            $this->form_validation->set_rules('pass_new1', 'Mật khẩu mới', 'trim|required|max_length[24]|min_length[6]|'); //matches[pass_new2]
            $this->form_validation->set_rules('pass_new2', 'Nhập lại mật khẩu mới', 'trim|required|max_length[24]|min_length[6]|callback_cheknewpass');
            $this->form_validation->set_message('cheknewpass', 'Hai mật khẩu không trùng nhau');
            if ($this->form_validation->run() == TRUE) {
                $data = array('user_password' => md5($_POST['pass_new1']));
                $this->db->where('user_id',$this->M_session->userdata('admin_login')->user_id);
                $this->db->update('tbl_user', $data);
                $data['a'] = "Đổi mật khẩu thành công";
            }}
            $data['view'] = 'back/changepass';
          $data['mod']='';
        $this->load->view('back/v_admin', $data);
    }

    function checklogin() {
        if ($this->M_admin->get_admin(0, $_POST['username'], $_POST['password']))
            return true;
        else
            $this->form_validation->set_message('checklogin', 'Sai username hoặc password');
        return false;
    }

    //--LOGOUT---------------
    public function logout() {
        if ($this->M_session->userdata('admin_login')) {
            $this->M_session->destroy();
        }
        redirect();
    }

    public function trangchu() {
        $data['view'] = 'back/inc/trangchu';
         $data['mod'] = '';
        $this->load->view('back/v_admin', $data);
    }
       public function checklogin_pass($id) {
        if (!$this->M_session->userdata('admin_login')) redirect(site_url('admin/login'));
        $a = $this->get_idpass();
        if ($a->user_password == md5($_POST['pass_old']))
            return TRUE;
        else
            $this->form_validation->set_message('checklogin_pass', 'Mật khảu cũ không đúng');
        return FALSE;
    }
      public function get_idpass() {
        if (!$this->M_session->userdata('admin_login')) redirect(site_url('admin/login'));
        $this->db->where('user_id',$this->M_session->userdata('admin_login')->user_id);
        $query = $this->db->get('tbl_user');
        return $query->row();
    }
    public function cheknewpass(){
        if (!$this->M_session->userdata('admin_login')) redirect(site_url('admin/login'));
        if($_POST['pass_new1']==$_POST['pass_new2']){
            return TRUE;
        }
        else {
            $this->form_validation->set_message('cheknewpass', '2 mật khẩu không trùng nhau');
            return FALSE;
        }
    }


}

?>