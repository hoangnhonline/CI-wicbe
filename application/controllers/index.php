<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Index extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('session', 'cart'));
        $this->load->helper(array("url"));
        $this->load->view("font/lang/block");
        $this->load->model(array("Title", "M_user"));

       // $this->load->model('M_session');
    }
    
    public function oder(){
      //  if(isset($_POST['ok'])){
           $lang = $this->uri->segment(1);
        $l = new lang();
        if ($lang == ''){
            $data['lang'] = 'en';
            }
        else
            $data['lang'] = $lang;
        $data['l'] = $l;
        if($this->uri->segment(1)=='vn'){$loi = "Gửi không thành công !! Bạn hãy thử lại";}else{$loi = "Send failed! Please try again";}
        
       $sql=array(
                      'name'=>$_POST['name'],
                      'email'=>$_POST['email'],
                      'note'=>$_POST['sl'],
                      'date_reseive'=>date('Y-m-d H:i:s'),
                      'type'=>1,
                      'phone'=>$_POST['phone'],
                      'status'=>0,
                  );
                  $this->db->insert('contact',$sql);

           
            $id = $this->db->insert_id();
            
            if (isset($id)) {
                echo "1";
            } else
                echo $loi;
      //  }
    }
    public function order_service(){
        $lang = $this->uri->segment(1);
        $l = new lang();
        if ($lang == ''){
            $data['lang'] = 'en';
        }
        else
            $data['lang'] = $lang;
        $data['l'] = $l;
        if($this->uri->segment(1)=='vn'){$loi = "Gửi không thành công !! Bạn hãy thử lại";}else{$loi = "Send failed! Please try again";}

        $sql=array(
            'name'=>$_POST['company'],
            'email'=>$_POST['email'],
            'note'=>$_POST['note'],
            'id_product'=>$_POST['select_baogia'],
            'date_reseive'=>date('Y-m-d H:i:s'),
            'type'=>2,
            'phone'=>$_POST['phone'],
            'status'=>0,
        );
        $this->db->insert('contact',$sql);


        $id = $this->db->insert_id();

        if (isset($id)) {
            echo "1";
        } else
            echo $loi;
    }

    public function order_dautu(){
        $lang = $this->uri->segment(1);
        $l = new lang();
        if ($lang == ''){
            $data['lang'] = 'en';
        }
        else
            $data['lang'] = $lang;
        $data['l'] = $l;
        if($this->uri->segment(1)=='vn'){$loi = "Gửi không thành công !! Bạn hãy thử lại";}else{$loi = "Send failed! Please try again";}
        $sql=array(
            'name'=>$_POST['name'],
            'email'=>$_POST['email'],
            'note'=>$_POST['note'],
            'id_product'=>$_POST['id'],
            'date_reseive'=>date('Y-m-d H:i:s'),
            'type'=>3,
            'phone'=>$_POST['phone'],
            'status'=>0,
        );
        $this->db->insert('contact',$sql);
        $id = $this->db->insert_id();
        if (isset($id)) {
            echo "1";
        } else
            echo $loi;
    }

    function download2($url){
    
    $this->load->helper('download');
$name = $url;
$data = file_get_contents(base_url('download/'.$url)); // Read the file's contents - cannot use relative path. It will try to call the file from same directory (controller) as this file. In order for it get the contents from the root folder put a . in front of the relative path//
force_download($name, $data);
}
    function LoginAjax() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $this->session->set_userdata('user', $this->M_user->login_customer($email, $password));
        if (count($this->M_user->login_customer($email, $password)) > 0) {
            echo "1";
        } else {
            echo "0";
        }
    }
    function logout() {
        $this->session->sess_destroy();
        redirect(site_url());

    }


    public function resetpass(){
        $lang = $this->uri->segment(1);
        $l = new lang();
        if ($lang == ''){
            $data['lang'] = 'en';
        }
        else
            $data['lang'] = $lang;
        $data['l'] = $l;
        $check = $this->M_user->get_row("user_customer", array("email" => $this->input->post('email')));
        $code = $this->Title->randomPassword(32) . "_" . date("d-Y");
        if (!isset($check->id)) {
           echo $l->lang_email_chua_dk[$lang];
        }else{
            $sql = array(
                "code" => $code,
            );
            $this->db->where('id',$check->id);
            $this->db->update("user_customer", $sql);

            if (isset($check->id)) {
                echo "1";
            } else{
                echo "Error";
            }
        }

    }


    function SiginAjax($lang = 'vn') {
        $code = $this->Title->randomPassword(32) . "_" . date("d-Y");
        $lang = $this->uri->segment(1);
        $l = new lang();
        if ($lang == ''){
            $data['lang'] = 'en';
        }
        else
            $data['lang'] = $lang;
        $data['l'] = $l;
    $code = $this->Title->randomPassword(32) . "_" . date("d-Y");
    $check = $this->M_user->get_row("user_customer", array("email" => $this->input->post('email_dk')));
    if (isset($check->id)) {
        echo $l->lang_email_tontai[$lang];
    } else {
        $sql = array(
            "name" => $this->input->post('name_dk'),
            "address" => $this->input->post('address_dk'),
            "mobile" => $this->input->post('phone_dk'),
            "email" => $this->input->post('email_dk'),
            "code" => 0,
            "status" => 1,
            "birthday" => strtotime($this->input->post("datepicker")),
            "general" => $this->input->post('general'),
            "password" => md5($this->input->post('password_dk'))
        );

        $this->db->insert("user_customer", $sql);
        $id = $this->db->insert_id();
        $data['user'] = $this->M_user->get_row("user_customer", array("id" => $id));
        $this->session->set_userdata('user', $this->M_user->set_login_customer($data['user']->email, $data['user']->password));
        if (isset($id)) {
            echo "1";
        } else
            echo $l->lang_dk_loi[$lang];;
    }
//-----------------------------------------------
}

}
?>