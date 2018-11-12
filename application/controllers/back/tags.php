<?php

class Tags extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form', 'text', 'file'));
        $this->load->library(array('form_validation', 'ftp'));
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('M_session');
        $this->load->model('M_tags');
        $this->load->model('Title');
        $this->load->model('M_admin');
        $this->load->model('M_artice');
        $this->load->model('M_category');
    }
    public function index($page_no=1){
        if (!$this->M_session->userdata('admin_login')) redirect(site_url('admin/login'));
        if(isset($_GET['tieude'])) {$a=$_GET['tieude'];}else{$a='';};
        $data['view']="back/tags/list";
        $data['mod']='tags';
        $page_co = 20;
        $start = ($page_no - 1) * $page_co;
        $count = $this->M_tags->could_tags($a);
        $data['page_no'] = $page_no;
        $data['list']= $this->M_tags->list_tags($page_co, $start,$a);
        $data['link'] = $this->Title->paging($page_co, $count, 'back/tags/index/', $page_no);
        $this->load->view('back/v_admin',$data);
    }
    function KtraStr($str){
        $str=trim(strip_tags(mysql_real_escape_string($str)));
        return $str;
    }
    public function add(){

        if (!$this->M_session->userdata('admin_login')) redirect(site_url('admin/login'));
        $data['view']="back/tags/add";
        $data['mod']='tags';
        if(isset($_POST['ok'])){
            $this->form_validation->set_rules('name', 'tags', 'trim|required|callback_chektags');
            $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
            $this->form_validation->set_message('chektags', 'Tên tags có trong cơ sở dữ liệu');
            if ($this->form_validation->run() == TRUE) {
                $sql = array(
                    'status' => $_POST['status'],
                    'weight' => $this->input->post('weight'),
                    'time' => time(),
                    'name' => $this->input->post('name'),
                    'title' => $this->input->post('title'),
                    'keywords' => $this->input->post('keywords'),
                    'description' => $this->input->post('description'),
                    //'link' => $this->Title->changeTitle($_POST['name']),
                    'content'=>$_POST['content'],
                );
                $this->db->insert('tags', $sql);
                $id =  $this->db->insert_id();
                $sql = array(
                    'link'  => $this->Title->changeTitle($_POST['name']).'-'.$id,
                );
                $this->db->where('id',$id);
                $this->db->update('tags',$sql);
                $tags = $this->input->post('check_tags');
                if ($tags) {
                    foreach ($tags as $key => $value) {
                        if ($this->M_artice->count_table_where(array("id_tags" => $id, "id" => $key), 'tags_id') == 0) {
                            $sql = array('id_tags' => $id, 'id' => $key);
                            $this->db->insert('tags_id', $sql);
                        } } }
                redirect('back/tags');
            }
        }
        $this->load->view('back/v_admin',$data);
    }


    function hide($type,$id, $page_no) {
        $this->M_artice->update_tableID($id, array('article_status' => 0), "article");
        redirect(site_url('back/page' . "/index/" .$type.'/'. $page_no) . '?messager=success');
    }

    function show($type,$id, $page_no) {
        $this->M_artice->update_tableID($id, array('article_status' => 1), "article");
        redirect(site_url('back/page' . "/index/" .$type.'/'. $page_no) . '?messager=success');
    }

    public function edit($id=0){
        if (!$this->M_session->userdata('admin_login')) redirect(site_url('admin/login'));
        $data['view']="back/tags/edit";
        $data['mod']='tags';
        $data['row']= $this->M_tags->get_tags($id);
       // $data['list_tags']= $this->M_tags->get_list_tags_check($id);
        if (isset($_POST['ok'])) {
            $this->form_validation->set_rules('name', 'tags', 'trim|required|callback_chekpage_edit');
            $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
            $this->form_validation->set_message('chektags_edit', 'Tên tags có trong cơ sở dữ liệu');
            if ($this->form_validation->run() == TRUE) {
                $sql = array(
                    'status' => $_POST['status'],
                    'weight' => $this->input->post('weight'),
                    'time' => time(),
                    'name' => $this->input->post('name'),
                    'title' => $this->input->post('title'),
                    'keywords' => $this->input->post('keywords'),
                    'description' => $this->input->post('description'),
                    'link' => $this->Title->changeTitle($_POST['name']).'-'.$id,
                    'content'=>$_POST['content'],
                );
                $this->db->where('id', $id);
                $this->db->update('tags', $sql);
                $where = (array('id_tags' => $id));
                $this->db->delete('tags_id', $where);
                $tags = $this->input->post('check_tags');
                if ($tags) {
                    foreach ($tags as $key => $value) {
                        if ($this->M_artice->count_table_where(array("id_tags" => $id, "id" => $key), 'tags_id') == 0) {
                            $sql = array('id_tags' => $id, 'id' => $key, 'type' => 1);
                            $this->db->insert('tags_id', $sql);
                        } }
                }
                redirect(site_url('back/tags'));
            }
        }
        $this->load->view('back/v_admin',$data);
    }

    function article(){
        $id = $this->input->post("id_cate");
        $name = $this->input->post("article_name");
        if($id==0){
            $data['row']=$this->M_artice->get_article_id($name);
        }else{
            $data['row']=$this->M_artice->get_article_id_cate($id,$name);
        }
        $this->load->view('back/tags/article',$data);
    }
    function article_edit(){
        $id = $this->input->post("id_cate");
        $name = $this->input->post("article_name");
        $data['id_tags'] = $this->input->post("id_tags");
        if($id==0){
            $data['row']=$this->M_artice->get_article_id($name);
        }else{
            $data['row']=$this->M_artice->get_article_id_cate($id,$name);
        }
        $this->load->view('back/tags/article_edit',$data);
    }

    function article_1(){
        $id = $this->input->post("article_name");
        $data['row']=$this->M_artice->get_article_id_cate_1($id);
        $this->load->view('back/tags/article',$data);
    }

    public function delete($id=0){
        $where = (array('id_tags' =>$id));
        $this->db->delete('tags_id', $where);
        $where = (array('id' =>$id));
        $this->db->delete('tags', $where);
        redirect(site_url('back/tags'));
    }
    function replace_all($string) {
        $url = 'uploads/san-pham/';
        $string = str_replace($url, '', $string);
        return $string;
    }
    public function chektags() {
        $chek1 = $this->M_tags->chektags($this->Title->changeTitle($_POST['name']));
        if (!empty($chek1)) {
            $this->form_validation->set_message('chektags', "Tên tags trong cơ sở dữ liệu");
            return FALSE;
        } else {
            return true;
        }
    }

    public function chektags_edit() {
        $chek1 = $this->M_tags->chektags_edit($this->Title->changeTitle($_POST['name']),$this->uri->segment(5));
        if (!empty($chek1)) {
            $this->form_validation->chektags_edit('chekpage', "Tên tags trong cơ sở dữ liệu");
            return FALSE;
        } else {
            return true;
        }
    }

}
?>