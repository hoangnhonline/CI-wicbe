<?php

class Category extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form', 'text', 'file'));
        $this->load->library(array('form_validation', 'ftp'));
        $this->load->database();
        $this->load->model('M_session');
        $this->load->model('M_category');
        $this->load->model('Title');
        $this->load->model('M_admin');
        $this->load->model('M_artice');
    }

    public function index($type=0) {

 if (!$this->M_session->userdata('admin_login'))
            redirect(site_url('admin/login')); 
                $data['mod'] = 'cate_'.$type;

        $data['view'] = "back/category/list";
        $data['type']=$type;
        $data['listdm'] = $this->M_category->list_category_all(array('top' => 0,'type' => $type));

        $this->load->view('back/v_admin', $data);
    }

    public function add($type=0) {
       if (!$this->M_session->userdata('admin_login')) redirect(site_url('admin/login'));
        $data['view'] = "back/category/add";
        $data['type']=$type;
       
        $data['listdm'] = $this->M_category->list_category_all(array('top' => 0,'type' => $type));
        if (isset($_POST['ok'])) {
                $this->form_validation->set_rules('name', 'name', 'trim|required|callback_chekmenu');
                $this->form_validation->set_message('chekmenu', 'Tên menu có trong cơ sở dữ liệu');
                $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
            if ($this->form_validation->run() == TRUE) {
                $sql = array(
                    
                    'weight' => $_POST['weight'],
                    'top' => $_POST['danhmuc'],
                    'time' => time(),
                    'hot' => $this->input->post('hot'),
                    'status' => $this->input->post('status'),
                    'type'=>$type,
                    'name' => $_POST['name'],
                    'title' => $this->input->post('title'),
                    'link' => $this->Title->changeTitle($_POST['name']),
                    'keywords' => $_POST['keywords'],
                    'description' => $_POST['description'],
                );
                
                $this->db->insert('category', $sql);
                redirect('back/category/index/'.$type);
            }
        }
         $data['mod'] = 'cate_'.$type;
        $this->load->view('back/v_admin', $data);
    }
    function hide($type,$id) {
        $this->M_artice->update_tableID($id, array('status' => 0), "category");
        redirect(site_url('back/category' . "/index/". $type) . '?messager=success');

    }

    function show($type,$id) {
        $this->M_artice->update_tableID($id, array('status' => 1), "category");
        redirect(site_url('back/category' . "/index/". $type) . '?messager=success');
    }


    function hide_hot($type,$id) {
        $this->M_artice->update_tableID($id, array('hot' => 0), "category");
        redirect(site_url('back/category' . "/index/" .$type) . '?messager=success');
    }

    function show_hot($type,$id) {
        $this->M_artice->update_tableID($id, array('hot' => 1), "category");
        redirect(site_url('back/category' . "/index/" .$type) . '?messager=success');

    }
    public function edit($type=0,$id) {
       if (!$this->M_session->userdata('admin_login'))
            redirect(site_url('admin/login')); 
        $data['view'] = "back/category/edit";
        $data['class'] = 'term';
         $data['id']=$id;
        $data['type']=$type;
        $data['mod'] = 'cate_'.$type;
        $data['listdm'] = $this->M_category->list_category_all(array('top' => 0,'type' => $type));
      $data['row']= $this->M_category->get_cate($id);
         
        if (isset($_POST['ok'])) {
            $this->form_validation->set_rules('name', 'name', 'trim|required|callback_chekmenu_edit');
            $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
            $this->form_validation->set_message('chekmenu_edit', 'Tên menu  có trong cơ sở dữ liệu');

            if ($this->form_validation->run() == TRUE) {
              $sql = array(
                  'weight' => $_POST['weight'],
                  'top' => $_POST['danhmuc'],
                  'time' => time(),
                  'hot' => $this->input->post('hot'),
                  'status' => $this->input->post('status'),
                  'type'=>$type,
                  'name' => $_POST['name'],
                  'title' => $this->input->post('title'),
                  'link' => $this->Title->changeTitle($_POST['name']),
                  'keywords' => $_POST['keywords'],
                  'description' => $_POST['description'],
            );
            $this->db->where('id', $id);
            $this->db->update('category', $sql);

            redirect('back/category/index/'.$type);
        }}
        $this->load->view('back/v_admin', $data);
    }
 function replace_all($string) {
        $url = 'uploads/san-pham/';
        $string = str_replace($url, '', $string);
        return $string;
    }


    public function delete($type=0,$id) {
       if (!$this->M_session->userdata('admin_login'))  redirect(site_url('admin/login'));
       if(count($this->M_category->list_category_chill($id)) > 0){
           foreach ($this->M_category->list_category_chill($id) as $r){
               $where = array('id' => $r->id);
               $this->db->delete('category', $where);
           }
       }
        $where = array('id' => $id);
        $this->db->delete('category', $where);

        redirect('back/category/index/'.$type);
    }

    public function chekmenu() {
       
            $chek1 = $this->M_category->chekmenu($this->Title->changeTitle($_POST['name']));
     
        if (!empty($chek1)) {
            $this->form_validation->set_message('chekmenu', "Tên menu có trong cơ sở dữ liệu");
            return FALSE;
        } else {
            return true;
        }
    }

   
     public function chekmenu_edit() {
       
            $chek1 = $this->M_category->chekmenu_edit($this->Title->changeTitle($_POST['name']),$this->uri->segment(5));
        if (!empty($chek1)) {
            $this->form_validation->set_message('chekmenu_edit', "Tên menu có trong cơ sở dữ liệu");
            return FALSE;
        } else {
            return true;
        }
    }


    function anhien12($id, $fr, $wh) {
        $wh = $wh . '="' . $id . '"';
        $sql = "select category_status from $fr where $wh";
        $kq = $this->LaySQL($sql);
        foreach ($kq as $t)
            $status = $t->category_status;
        if ($status == 1)
            $status = 0;
        else
            $status = 1;
        echo $this->AnHien($fr, $status, $wh);
    }

    function LaySQL($sql) {
        $kq = $this->db->query($sql);
        return $kq->result();
    }

    function AnHien($fr, $status, $wh) {
        $sql = "UPDATE $fr SET category_status = $status WHERE $wh";
        $this->db->query($sql);
        return "AnHien_{$status}.png";
    }
    function noibat($id, $fr, $wh) {
        $wh = $wh . '="' . $id . '"';
        $sql = "select category_hot from $fr where $wh";
        $kq = $this->LaySQL($sql);
        foreach ($kq as $t)
            $status = $t->category_hot;
        if ($status == 1)
            $status = 0;
        else
            $status = 1;
        echo $this->noibat2($fr, $status, $wh);
    }



    function noibat2($fr, $status, $wh) {
        $sql = "UPDATE $fr SET category_hot = $status WHERE $wh";
        $this->db->query($sql);
        return "noibat_{$status}.png";
    }

}

?>