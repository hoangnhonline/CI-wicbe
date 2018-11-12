<?php

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'form', 'text', 'file'));
        $this->load->library(array('form_validation', 'ftp'));
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('M_session');
        $this->load->model('M_user');
        $this->load->model('Title');
    }

public function index($page_no=1){
    if (!$this->M_session->userdata('admin_login'))
        redirect(site_url('admin/login'));
    $data['view'] = 'back/user/list';
    $data['mod'] = 'user';
    $page_co = 20;

    $start = ($page_no - 1) * $page_co;
    $count = $this->M_user->count_user_ad();
    $data['page_no'] = $page_no;
    $data['list'] = $this->M_user->list_user_ad( $page_co, $start);
    $data['link'] = $this->Title->paging($page_co, $count, 'back/user/index/', $page_no);
    $this->load->view('back/v_admin',$data);
}

public function add(){
    $data['view'] = 'back/user/add';
    $data['mod'] = 'user';
    if(isset($_POST['ok'])) {
        $this->form_validation->set_rules('password', 'mật khẩu', 'trim|required|callback_chek_pas');
        $this->form_validation->set_rules('name', 'user', 'trim|required|callback_chek_ten');
        $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
        $this->form_validation->set_message('chek_ten', 'Tên user có trong cơ sở dữ liệu');
        $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
        $this->form_validation->set_message('chek_pas', '2 mật khẩu không trùng nhau');
        if ($this->form_validation->run() == true) {
            $sql = array(
                'user_name'=>$_POST['name'],
                'user_note'=>$_POST['email'],
                'user_loginname'=>$_POST['username'],
                'phone'=>$_POST['phone'],
                'user_password'=>  md5($_POST['password']),
                'group'=>2,
                'user_modify'=>date('Y-m-d H:i:s'),
            );
            $this->db->insert('tbl_user', $sql);
            $id_user = $this->db->insert_id();
             $sql1 = array(
                'id_user'=>$id_user,
                 'web'=>$_POST['web'],
                 'thongtin'=>$_POST['thongtin'],
                 'huongdan'=>$_POST['huongdan'],
                 'banner'=>$_POST['banner'],
                 'quangcao'=>$_POST['quangcao'],
                 'size'=>$_POST['size'],
                 'color'=>$_POST['color'],
                 'suutap'=>$_POST['suutap'],
                 'cate'=>$_POST['cate'],
                 'sanpham'=>$_POST['sanpham'],
                 'comment_1'=>$_POST['comment_1'],
                 'comment_2'=>$_POST['comment_2'],
                 'thoitrang'=>$_POST['thoitrang'],
                 'nganhang'=>$_POST['nganhang'],
                 'user'=>$_POST['user'],
                 'donhang'=>$_POST['donhang'],
                 'lienhe'=>$_POST['lienhe'],
                 'hethong'=>$_POST['hethong'],
               );

               $this->db->insert('user_admin', $sql1);

            redirect('back/user/index');
        }
    }
    $this->load->view('back/v_admin',$data);
}
    public function edit($id){

        $data['view'] = 'back/user/edit';
        $data['mod'] = 'user';
        $data['row'] = $this->M_user->user_name_edit($id);
        $data['edit'] = $this->M_user->get_phanquyen($id);

        if(isset($_POST['ok'])) {

            $this->form_validation->set_rules('name', 'user', 'trim|required|callback_chek_ten_edit');
            $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
            $this->form_validation->set_message('chek_ten_edit', 'Tên user có trong cơ sở dữ liệu');
            $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
            if ($this->form_validation->run() == true) {

                $sql = array(
                    'user_name'=>$_POST['name'],
                    'user_note'=>$_POST['email'],
                    'user_loginname'=>$_POST['username'],
                    'phone'=>$_POST['phone'],
                    'user_modify'=>date('Y-m-d H:i:s'),
                );
                $this->db->where('user_id',$id);
                $this->db->update('tbl_user', $sql);
                if($_POST['pass'] !=''){
                    $sql = array(
                        'password' => md5($_POST['pass']),
                    );
                    $this->db->where('user_id',$id);
                    $this->db->update('tbl_user', $sql);
                }
                $sql1 = array(
                    'web'=>$_POST['web'],
                    'thongtin'=>$_POST['thongtin'],
                    'huongdan'=>$_POST['huongdan'],
                    'banner'=>$_POST['banner'],
                    'quangcao'=>$_POST['quangcao'],
                    'size'=>$_POST['size'],
                    'color'=>$_POST['color'],
                    'suutap'=>$_POST['suutap'],
                    'cate'=>$_POST['cate'],
                    'sanpham'=>$_POST['sanpham'],
                    'comment_1'=>$_POST['comment_1'],
                    'comment_2'=>$_POST['comment_2'],
                    'thoitrang'=>$_POST['thoitrang'],
                    'nganhang'=>$_POST['nganhang'],
                    'user'=>$_POST['user'],
                    'donhang'=>$_POST['donhang'],
                    'lienhe'=>$_POST['lienhe'],
                    'hethong'=>$_POST['hethong'],
                );
                $this->db->where('id_user',$id);
                $this->db->update('user_admin', $sql1);


                redirect('back/user/index');
            }
        }
        $this->load->view('back/v_admin',$data);

    }
    public function delete($id){
        $where = array('id' => $id);
        $this->db->delete('user_customer', $where);
        $where = array('user_id' => $id);
        $this->db->delete('xemtailieu', $where);
        redirect('back/user/index');
    }

    public function chek_pas(){
        if($_POST['password']==$_POST['newpass']){
            return TRUE;
        }
        else {
            $this->form_validation->set_message('chek_pas', '2 mật khẩu không trùng nhau');
            return FALSE;
        }
    }
    public function chek_ten(){
        $chek = $this->M_user->chek_user_name($_POST['name']);
        if (!empty($chek)) {
            $this->form_validation->set_message('chek_ten', "Tên user đã tồn tại có trong cơ sở dữ liệu");
            return FALSE;
        } else {
            return true;
        }
    }
    public function chek_ten_edit(){
        $chek = $this->M_user->chek_user_name_edit($_POST['name'],$this->uri->segment(4));
        if (!empty($chek)) {
            $this->form_validation->set_message('chek_ten_edit', "Tên user đã tồn tại có trong cơ sở dữ liệu");
            return FALSE;
        } else {
            return true;
        }
    }
    function anhien12($id, $fr, $wh) {
        $wh = $wh . '="' . $id . '"';
        $sql = "select status from $fr where $wh";
        $kq = $this->Title->LaySQL($sql);
        foreach ($kq as $t)
            $status = $t->status;
        if ($status == 1)
            $status = 0;
        else
            $status = 1;
        echo $this->AnHien($fr, $status, $wh);
    }
    function AnHien($fr,$status,$wh){
        $sql = "UPDATE $fr SET status = $status WHERE $wh";
        $this->db->query($sql);
        return "AnHien_{$status}.png";
    }
}
?>