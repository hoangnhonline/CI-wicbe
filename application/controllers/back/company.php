<?php

class Company extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form', 'text', 'file'));
        $this->load->library(array('form_validation', 'ftp'));
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('M_session');
        $this->load->model('M_admin');
        $this->load->model('M_artice');
        $this->load->model('Title');
        $this->load->model('Thongtin_web');
    }

    public function index($id = 0) {
       
        if (!$this->M_session->userdata('admin_login')) redirect(site_url('admin/login'));
        $data['view'] = "back/Information/company";
        $data['information'] = 'information';
        $data['mod'] = 'company_' . $id;

        $data['row'] = $this->Thongtin_web->show_company($id);
        if (isset($_POST['ok'])) {
            $img = $this->Title->uploadhinh();
            if ($_FILES['img']['name'] != '') {
                if ($data['list']->logo != NULL) {
                    if (file_exists('./uploads/san-pham/' . $this->replace_all($data['list']->logo)))
                        ; {
                        @unlink('./uploads/san-pham/' . $this->replace_all($data['list']->logo));
                    }
                }
                $sql = array(
                    'logo' => $img,
                );
            $this->db->where('id', $id);
            $this->db->update('company', $sql);
             }
            $sql = array(
                'name' => $_POST['name'],
                'keywords' => $_POST['keywords'],
                'description' => $_POST['description'],
                'contact' => $_POST['contact'],
                'footer' => $_POST['footer'],
                 'youtube' => $_POST['youtube'],
                 'address' => $_POST['address'],
                 'phone' => $_POST['phone'],
                 'face' => $_POST['facebook'],
                'analytic'=>$_POST['analytic'],
                'twitter'=>$_POST['twitter'],
                'gg'=>$_POST['gg'],
            );
            $this->db->where('id', $id);
            $this->db->update('company', $sql);

            redirect('back/company/index/' . $id);
        }
        $this->load->view('back/v_admin', $data);
    }

    public function gioithieu($id=0) {
        if (!$this->M_session->userdata('admin_login'))
            redirect(site_url('admin/login')); 
        $data['view'] = "back/Information/gioithieu";
        $data['information'] = 'information';
        $data['mod'] = 'company_' . $id;
        $data['row']=$this->Thongtin_web->get_gioithieu($id);
        if(isset($_POST['ok'])){
            $sql =array(
                'name'=>$_POST['name'],
                'wellcome'=>$_POST['editor'],
            );
            $this->db->where('id_company',$id);
            $this->db->update('companydetail',$sql);
             redirect('back/company/gioithieu/' . $id);
        }
        
        $this->load->view('back/v_admin', $data);
    }

    function replace_all($string) {
        $url = 'uploads/san-pham/';
        $string = str_replace($url, '', $string);
        return $string;
    }

}

?>