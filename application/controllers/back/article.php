<?php

class Article extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url','form', 'text',  'file'));
        $this->load->library(array('form_validation', 'ftp'));
        $this->load->database();
        $this->load->helper('url');
        ob_start();
        $this->load->model('M_session');
        $this->load->model('M_admin');
        $this->load->model('Title');
    }
    public function index(){
        if (!$this->M_session->userdata('admin_login'))
            redirect(site_url('admin/login')); 
       $data['view']='back/article/list';
     
       $this->load->view('back/v_admin',$data);      
    }

    function anhien12($id, $fr, $wh) {
        $wh = $wh . '="' . $id . '"';
        $sql = "select article_status from $fr where $wh";
        $kq = $this->Title->LaySQL($sql);
        foreach ($kq as $t)
            $status = $t->article_status;
        if ($status == 1)
            $status = 0;
        else
            $status = 1;
        echo $this->AnHien($fr, $status, $wh);
    }
    function AnHien($fr,$status,$wh){		 
		$sql = "UPDATE $fr SET article_status = $status WHERE $wh";
		$this->db->query($sql);
		return "AnHien_{$status}.png";
}
function danhmuc($id) {
   //  $sql = 'select id from category where id=' . $id;
        $data['loai'] = $this->M_category->list_category_chill($id);
    //    var_dump($data['loai']);
        $this->load->view('back/news/load_ajax', $data);
    }
    function noibat($id, $fr, $wh) {
        $wh = $wh . '="' . $id . '"';
        $sql = "select article_hot from $fr where $wh";
        $kq = $this->Title->LaySQL($sql);
        foreach ($kq as $t)
            $status = $t->article_hot;
        if ($status == 1)
            $status = 0;
        else
            $status = 1;
        echo $this->noibat2($fr, $status, $wh);
    }
    function noibat2($fr,$status,$wh){
        $sql = "UPDATE $fr SET article_hot = $status WHERE $wh";
        $this->db->query($sql);
        return "noibat_{$status}.png";
    }
    function hi($id, $fr, $wh) {
        $wh = $wh . '="' . $id . '"';
        $sql = "select time_1 from $fr where $wh";
        $kq = $this->Title->LaySQL($sql);
        foreach ($kq as $t)
            $status = $t->time_1;
        if ($status == 1)
            $status = 0;
        else
            $status = 1;
        echo $this->hi2($fr, $status, $wh);
    }
    function hi2($fr,$status,$wh){
        $sql = "UPDATE $fr SET time_1 = $status WHERE $wh";
        $this->db->query($sql);
        return "noibat_{$status}.png";
    }

}

?>