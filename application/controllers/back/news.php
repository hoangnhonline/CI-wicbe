<?php

class News extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form', 'text', 'file'));
        $this->load->library(array('form_validation', 'ftp'));
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('M_session');
        $this->load->model('M_category');
        $this->load->model('Title');
        $this->load->model('M_admin');
        $this->load->model('M_artice');
        $this->load->model('M_tags');
    }
    public function index($type=0,$page_no=1){
        if (!$this->M_session->userdata('admin_login')) redirect(site_url('admin/login'));
        if(isset($_GET['name'])) {$a=$_GET['name'];}else{$a='';};
        $data['view']="back/news/list";
        $data['type']=$type;
        $data['mod']='page_'.$type;
        $page_co = 20;
        $start = ($page_no - 1) * $page_co;
        $count = $this->M_artice->count_page(array('type'=>$type),$a);
        $data['page_no'] = $page_no;
        $data['list']= $this->M_artice->show_list_page(array('type'=> $type),$page_co, $start,$a);
        $data['link'] = $this->Title->paging($page_co, $count, 'back/news/index/'.$type.'/', $page_no);

        $this->load->view('back/v_admin',$data);
    }
    function KtraStr($str){
        $str=trim(strip_tags(mysql_real_escape_string($str)));
        return $str;
    }
    public function add($type=0){
        if (!$this->M_session->userdata('admin_login')) redirect(site_url('admin/login'));
        $data['view']="back/news/add";
        $data['type']=$type;
        $data['mod']='page_'.$type;
        $data['weight'] = $this->Title->get_max('article', 'status') + 1;
        if(isset($_POST['ok'])){
            $this->form_validation->set_rules('name', 'tiêu đề tiếng việt', 'trim|required|callback_chekpage');
            $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
            $this->form_validation->set_message('chekpage', 'Tên viết  có trong cơ sở dữ liệu');
            if ($this->form_validation->run() == TRUE) {
                $img = $this->Title->uploadhinh();
                $sql = array(
                    'status' => $_POST['status'],
                    'weight' => $this->input->post('weight'),
                    'type' => $type,
                    'time' => time(),
                    'hot' => $this->input->post('hot'),
                    'cate' => $this->input->post('cate'),
                    'img'=>$img,
                    'title'=>$_POST['title'],
                    'name' => $this->input->post('name'),
                    'link' => $this->Title->changeTitle($this->input->post('name')),
                    'summary' => $this->input->post('summary'),
                    'content' => $this->input->post('content'),
                    'description' => $this->input->post('description'),
                    'keywords' => $this->input->post('keywords'),
                );
                $this->db->insert('article', $sql);

                $id =  $this->db->insert_id();
                $tags = $this->input->post('check_tags');
                if ($tags) {
                    foreach ($tags as $key => $value) {
                        if ($this->M_artice->count_table_where(array("id_article" => $id, "id_tags" => $key), 'tags_id') == 0) {
                            $sql = array('id_article' => $id, 'id_tags' => $key);
                            $this->db->insert('tags_id', $sql);
                        } } }
                redirect('back/news/index'.'/'.$type);
            }}
        $this->load->view('back/v_admin',$data);

    }

    public function edit($type=0,$id=0){
        if (!$this->M_session->userdata('admin_login')) redirect(site_url('admin/login'));
        $data['view']="back/news/edit";
        $data['id']=$id;
        $data['mod']='page_'.$type;
        $data['type']=$type;
        $data['row']= $this->M_artice->get_id($id);

        if (isset($_POST['ok'])) {
            $this->form_validation->set_rules('name', 'tiêu đề tiếng việt', 'trim|required|callback_chekpage_edit');
            $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
            $this->form_validation->set_message('chekpage_edit', 'Tên viết tiếng viêt có trong cơ sở dữ liệu');

            if ($this->form_validation->run() == TRUE) {
                $sql = array(
                    'status' => $_POST['status'],
                    'weight' => $this->input->post('weight'),
                    'type' => $type,
                    'time' => time(),
                    'hot' => $this->input->post('hot'),
                    'cate' => $this->input->post('cate'),
                    'name' => $this->input->post('name'),
                    'link' => $this->Title->changeTitle($this->input->post('name')),
                    'summary' => $this->input->post('summary'),
                    'content' => $this->input->post('content'),
                    'title'=>$_POST['title'],
                    'description' => $this->input->post('description'),
                    'keywords' => $this->input->post('keywords'),
                );
                $this->db->where('id', $id);
                $this->db->update('article', $sql);
                $where = (array('id' => $id));
                $this->db->delete('tags_id', $where);
                $tags = $this->input->post('check_tags');
                if ($tags) {
                    foreach ($tags as $key => $value) {
                        if ($this->M_artice->count_table_where(array("id" => $id, "id_tags" => $key), 'tags_id') == 0) {
                            $sql = array('id' => $id, 'id_tags' => $key);
                            $this->db->insert('tags_id', $sql);
                        } } }

                if (isset($_FILES['img']['name']) && $_FILES['img']['name'] != '') {
                    $img = $this->Title->uploadhinh();
                    if($this->M_artice->get_id($id)->img != NULL){
                        if(file_exists('./uploads/san-pham/' . $this->replace_all($this->M_artice->get_id($id)->img))); {
                            @unlink('./uploads/san-pham/' . $this->replace_all($this->M_artice->get_id($id)->img));
                        } }
                    $sql = array('img'=>$img,);
                    $this->db->where('id', $id);
                    $this->db->update('article', $sql);
                }
                redirect('back/news/index'.'/'.$type);
            }
        }
        $this->load->view('back/v_admin',$data);
    }
    public function delete($type=0,$id=0){
        if($this->M_artice->get_id($id)->img != NULL){
            if(file_exists('./uploads/san-pham/' . $this->replace_all($this->M_artice->get_id($id)->img))); {
                @unlink('./uploads/san-pham/' . $this->replace_all($this->M_artice->get_id($id)->img));
            }
        }
        $where = (array('id' => $id));
        $this->db->delete('tags_id', $where);
        $where = (array('id' => $id,'type' => $type));
        $this->db->delete('article', $where);
        redirect('back/news/index/'.$type);
    }
    function hide($type,$id, $page_no) {


        $this->M_artice->update_tableID($id, array('status' => 0), "article");

        redirect(site_url('back/news' . "/index/" .$type.'/'. $page_no) . '?messager=success');

    }

    function show($type,$id, $page_no) {


        $this->M_artice->update_tableID($id, array('status' => 1), "article");

        redirect(site_url('back/news' . "/index/" .$type.'/'. $page_no) . '?messager=success');

    }


    function hide_hot($type,$id, $page_no) {


        $this->M_artice->update_tableID($id, array('hot' => 0), "article");

        redirect(site_url('back/news' . "/index/" .$type.'/'. $page_no) . '?messager=success');

    }

    function show_hot($type,$id, $page_no) {


        $this->M_artice->update_tableID($id, array('hot' => 1), "article");

        redirect(site_url('back/news' . "/index/" .$type.'/'. $page_no) . '?messager=success');

    }
    function replace_array($string) {
        $url = 'Array';
        $string = str_replace($url, '', $string);
        return $string;
    }
    function replace_all($string) {
        $url = 'uploads/san-pham/';
        $string = str_replace($url, '', $string);
        return $string;
    }
    public function chekpage() {
        $chek1 = $this->M_artice->chekpage($this->Title->changeTitle($_POST['name']));
        if (!empty($chek1)) {
            $this->form_validation->set_message('chekpage', "Tên bài viết trong cơ sở dữ liệu");
            return FALSE;
        } else {
            return true;
        }
    }

    public function chekpage_edit() {
        $chek1 = $this->M_artice->chekpage_edit($this->Title->changeTitle($_POST['name']),$this->uri->segment(5));
        if (!empty($chek1)) {
            $this->form_validation->set_message('chekpage_edit', "Tên bài viết trong cơ sở dữ liệu");
            return FALSE;
        } else {
            return true;
        }
    }

}
?>