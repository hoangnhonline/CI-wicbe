<?php
class Lienhe extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('url', 'form', 'text', 'file'));
        $this->load->library(array('form_validation', 'ftp'));
         $this->load->model('M_session');
            $this->load->model('M_artice');
            $this->load->model('Title');
         $this->load->model('M_lienhe');

    }
    public function index($page_no=1){
        if(isset($_GET['hoten'])) {$key=$this->KtraStr($_GET['hoten']);}else{$key='';};
         if(isset($_GET['email'])) {$email=$this->KtraStr($_GET['email']);}else{$email='';};
           if(isset($_GET['phone'])) {$phone=$this->KtraStr($_GET['phone']);}else{$phone='';};
        $data['view']='back/lienhe/list';
        $data['mod']='lienhe';
         $page_co = 20;
        
        $start = ($page_no - 1) * $page_co;
        $count = $this->M_lienhe->count(1,$key,$email,$phone);
        $data['page_no'] = $page_no;
        $data['list']= $this->M_lienhe->dslienhe($page_co, $start,1,$key,$email,$phone);
        $data['link'] = $this->Title->paging($page_co, $count, 'back/lienhe/index/', $page_no);
       
         $this->load->view('back/v_admin',$data);
    }
     function KtraStr($str){
		$str=trim(strip_tags(mysql_real_escape_string($str)));
		return $str;
	}
    public function xemlienhe($id){
        if (!$this->M_session->userdata('admin_login'))
            redirect(site_url('admin/login')); 
        $data['view']='back/lienhe/edit';
        $data['mod']='lienhe';
        $data['row']= $this->M_lienhe->get_id($id);
        mysql_query("update contact set status= '1' where id='".$id."'");
         $this->load->view('back/v_admin',$data);
    }
    public function delete($id){
        
       $data['view']='back/lienhe/list';
        $this->db->where('id',$id);
        $this->db->delete('contact');
        redirect('back/lienhe/index');
    }
    public function delete1($id){
        $data['view']='back/lienhe/list';
        $this->db->where('id',$id);
        $this->db->delete('contact');
        redirect('back/lienhe/email');
    }
     public function delete_donhang($id){
        
       $data['view']='back/lienhe/list';
        $this->db->where('id',$id);
        $this->db->delete('contact');
        redirect('back/lienhe/order_dichvu');
    }
    public function delete_dh($id){
        $data['view']='back/lienhe/list';
        $this->db->where('id',$id);
        $this->db->delete('contact');
        redirect('back/lienhe/order_dautu');
    }
    public function order_dichvu($page_no=1){
        if(isset($_GET['hoten'])) {$key=$this->KtraStr($_GET['hoten']);}else{$key='';};
         if(isset($_GET['email'])) {$email=$this->KtraStr($_GET['email']);}else{$email='';};
           if(isset($_GET['phone'])) {$phone=$this->KtraStr($_GET['phone']);}else{$phone='';};
        $data['view']='back/dathang/list';
        $data['mod']='dathang';
         $page_co = 20;
        
        $start = ($page_no - 1) * $page_co;
        $count = $this->M_lienhe->count(2,$key,$email,$phone);
        $data['page_no'] = $page_no;
        $data['list']= $this->M_lienhe->dslienhe($page_co, $start,2,$key,$email,$phone);
        $data['link'] = $this->Title->paging($page_co, $count, 'back/lienhe/order_dichvu/', $page_no);
       
         $this->load->view('back/v_admin',$data);
    }
    public function xemdonhang($id){
        if (!$this->M_session->userdata('admin_login'))
            redirect(site_url('admin/login')); 
        $data['view']='back/dathang/edit';
        $data['mod']='dathang';
        $data['row']= $this->M_lienhe->get_id($id);
        mysql_query("update contact set status= '1' where id='".$id."'");
         $this->load->view('back/v_admin',$data);
    }

    public function order_dautu ($page_no=1){
        if(isset($_GET['hoten'])) {$key=$this->KtraStr($_GET['hoten']);}else{$key='';};
        if(isset($_GET['email'])) {$email=$this->KtraStr($_GET['email']);}else{$email='';};
        if(isset($_GET['phone'])) {$phone=$this->KtraStr($_GET['phone']);}else{$phone='';};
        $data['view']='back/dathang/list_dautu';
        $data['mod']='dathang';
        $page_co = 20;

        $start = ($page_no - 1) * $page_co;
        $count = $this->M_lienhe->count(3,$key,$email,$phone);
        $data['page_no'] = $page_no;
        $data['list']= $this->M_lienhe->dslienhe($page_co, $start,3,$key,$email,$phone);
        $data['link'] = $this->Title->paging($page_co, $count, 'back/lienhe/order_dautu/', $page_no);

        $this->load->view('back/v_admin',$data);
    }
    public function email ($page_no=1){
        $data['view']='back/lienhe/list_email';
        $data['mod']='email';
        $page_co = 20;
        $start = ($page_no - 1) * $page_co;
        $count = $this->M_lienhe->count1(4);
        $data['page_no'] = $page_no;
        $data['list']= $this->M_lienhe->dslienhe1($page_co, $start,4);
        $data['link'] = $this->Title->paging($page_co, $count, 'back/lienhe/email/', $page_no);

        $this->load->view('back/v_admin',$data);
    }
    public function xemdautu($id){
        if (!$this->M_session->userdata('admin_login'))
            redirect(site_url('admin/login'));
        $data['view']='back/dathang/edit_dautu';
        $data['mod']='dathang';
        $data['row']= $this->M_lienhe->get_id($id);
        mysql_query("update contact set status= '1' where id='".$id."'");
        $this->load->view('back/v_admin',$data);
    }
    function comment($type = 0,$page_no=1)
    {  if (!$this->M_session->userdata('admin_login'))
        redirect(site_url('admin/login'));

        $data=array();

        $data['mod']='comment_'.$type;

        $data['type']= $type;

        $page_co=20;
        $start=($page_no-1)*$page_co;
        $count=$this->M_lienhe->show_list_comment_page_count(array('type'=>$type));

        $data['page_no']=$page_no;
        $data['list']=$this->M_lienhe->show_list_comment_page($page_co,$start,$type);
      
        $data['link']=$this->Title->paging($page_co,$count,'back/contact/comment/',$page_no);
        $data['view']='back/comment/list';
        $this->load->view('back/v_admin',$data);

    }
    public function list_support(){
        if (!$this->M_session->userdata('admin_login'))
            redirect(site_url('admin/login'));

        $data['mod']='support';
        $data['list']=$this->M_lienhe->list_support();
        $data['view']='back/support/list';
        $this->load->view('back/v_admin',$data);
    }
    public function edit_support($id){
        if (!$this->M_session->userdata('admin_login'))
            redirect(site_url('admin/login'));
        $data['mod']='support';
        $data['row']=$this->M_lienhe->get_yahoo($id);
        if(isset($_POST['ok'])){
            $sql = array(
                'name'=>$_POST['name'],
                'nick'=>$_POST['yahoo'],
                'skype'=>$_POST['skype'],
                'status'=>$_POST['status'],
                //  'type'=>$_POST['support'],
                'phone'=>$_POST['phone']
            );
            $this->db->where('id',$id);
            $this->db->update('yahoo',$sql);
            redirect('back/lienhe/edit_support/'.$id);
        }

        $data['view']='back/support/edit';
        $this->load->view('back/v_admin',$data);
    }
    public function add_support(){
        if (!$this->M_session->userdata('admin_login'))
            redirect(site_url('admin/login'));
        if(isset($_POST['ok'])){
            $sql = array(
                'name'=>$_POST['name'],
                'nick'=>$_POST['yahoo'],
                'skype'=>$_POST['skype'],
                'status'=>$_POST['status'],
                //  'type'=>$_POST['support'],
                'phone'=>$_POST['phone']
            );
            $this->db->insert('yahoo',$sql);
            redirect('back/lienhe/list_support');
        }


        $data['mod']='support';


        $data['view']='back/support/add';
        $this->load->view('back/v_admin',$data);
    }

    public function delete_support($id){
        $where = array('id' => $id);
        $this->db->delete('yahoo', $where);
        redirect('back/lienhe/list_support');
    }
    function delete_comment($id,$type,$page_no)
    {
        $where=array('id'=>$id);
        $this->db->delete('item_comment',$where);

        redirect( site_url('back/lienhe/comment/'.$type.'/'.$page_no).'?messager=success' );
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