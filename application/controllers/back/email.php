<?php

class Email extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form', 'text', 'file'));
        $this->load->library(array('form_validation', 'ftp'));
        $this->load->database();
        $this->load->model('M_session');
        $this->load->model('Title');
        $this->load->model('M_admin');
        $this->load->model('M_email');
    }

    public function letter($page_no=1) {
        if (!$this->M_session->userdata('admin_login')) redirect(site_url('admin/login'));
        $data['mod'] = 'letter';
        $data['view'] = "back/letter/letter";
        $page_co = 20;
        $start = ($page_no - 1) * $page_co;
        $count = $this->M_email->list_letter_could(1);
        $data['page_no'] = $page_no;
        $data['list']= $this->M_email->list_letter($page_co, $start,1);
        $data['link'] = $this->Title->paging($page_co, $count, 'back/email/letter/', $page_no);
        $this->load->view('back/v_admin', $data);
    }

    public function phone($page_no=1) {
        if (!$this->M_session->userdata('admin_login')) redirect(site_url('admin/login'));
        $data['mod'] = 'phone';
        $data['view'] = "back/letter/tuvan";
        $page_co = 20;
        $start = ($page_no - 1) * $page_co;
        $count = $this->M_email->list_letter_could(2);
        $data['page_no'] = $page_no;
        $data['list']= $this->M_email->list_letter($page_co, $start,2);
        $data['link'] = $this->Title->paging($page_co, $count, 'back/email/phone/', $page_no);
        $this->load->view('back/v_admin', $data);
    }


    function comment($page_no=1){
        if (!$this->M_session->userdata('admin_login')) redirect(site_url('admin/login'));
        $data['mod'] = 'comment';
        $data['view'] = "back/letter/comment";
        $page_co = 20;
        $start = ($page_no - 1) * $page_co;
        $count = $this->M_email->list_comment_could();
        $data['page_no'] = $page_no;
        $data['list']= $this->M_email->list_comment($page_co, $start);
        $data['link'] = $this->Title->paging($page_co, $count, 'back/letter/comment/', $page_no);
        $this->load->view('back/v_admin', $data);
    }


    function replace_all($string) {
        $url = 'uploads/san-pham/';
        $string = str_replace($url, '', $string);
        return $string;
    }
    public function delete($id) {
        if (!$this->M_session->userdata('admin_login')) redirect(site_url('admin/login'));
        $where = array('id' => $id);
        $this->db->delete('letter', $where);
        redirect('back/email/letter');
    }
    public function delete1($id) {
        if (!$this->M_session->userdata('admin_login')) redirect(site_url('admin/login'));
        $where = array('id' => $id);
        $this->db->delete('letter', $where);
        redirect('back/email/phone');
    }




}

?>