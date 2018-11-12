<?php
class Sitemap extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('url', 'form', 'text', 'file'));
        $this->load->library(array('form_validation', 'ftp'));
        $this->load->model('M_session');
        $this->load->model('M_artice');
        $this->load->model('Title');
        $this->load->model('M_lienhe');
        $this->load->model('M_item');
        $this->load->library('session');
    }
    public function index(){

        $data['list_item'] = $this->M_item->list_sp_1(1);
        header("Content-Type: text/xml;charset=iso-8859-1");
        $this->load->view("font/inc/sitemap",$data);
    }



}

?>