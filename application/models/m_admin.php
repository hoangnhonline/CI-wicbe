<?php 
class M_admin extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    function login($user , $pass)
	{
		$this->db->where('user_loginname', trim($user) )->where('user_password', md5($pass) );
		$this->db->where('user_status', 1);
		return $this->db->get('tbl_user');
	}
	
	function get_admin($check,$t,$p)
	{
		$this->db->where('user_loginname',$t);
		$this->db->where('user_password',md5($p));
		if($check==1)
			return $this->db->get('tbl_user')->first_row();
		else
			return $this->db->get('tbl_user')->num_rows();
		
	}
    function ThongKe(){	
		$sql="SELECT sum(if(Username <>'' , 1 , 0)) As ThanhVien,sum(if(Username ='' , 1 , 0)) As Khach,count(*) As Tong FROM user_member";	
		$kq=$this->db->query($sql);
		return $kq->result();	
	}
        
        public function tinquahan(){
            $a=array('0','1');
            $this->db->where_in('show',$a);
            $this->db->where('Loai',3);
            $query = $this->db->get('news');
            return $query->result();
            
        }
        function upquahan($id){
            $data=array(
                'show'=>2,
                'quahan'=>1,
            );
            $this->db->where('id',$id);
             $this->db->where('Loai',3);
            $this->db->update('news',$data);
            
        }
    public function list_user($limit, $offset){
        $this->db->from('user_customer');
        $this->db->limit($limit, $offset);
        return $this->db->get()->result();
    }
    public function list_user_count(){
        $this->db->from('user_customer');
        return $this->db->get()->num_rows();
    }
    public function  chekten($name){
        $this->db->where('name',$name);
        $this->db->from('user_customer');
        return $this->db->get()->row();
    }
    public function get_id($id){
        $this->db->where('id',$id);
        $this->db->from('user_customer');
        return $this->db->get()->row();
    }
    public function  chek_ten_edit($name,$id){
        $this->db->where('name',$name);
        $this->db->where('id !=',$id);
        $this->db->from('user_customer');
        return $this->db->get()->row();
    }
    public function list_user_xem(){
        $this->db->from('user_customer');
        //  $this->db->limit($limit, $offset);
        return $this->db->get()->result();
    }
    function login_customer($email,$password)
    {
        $this->db->where('name',$email);
        $this->db->where('status',1);
        $this->db->where('password',md5($password));
        $this->db->from('user_customer');
        return $this->db->get()->row();

    }
        
}

?>