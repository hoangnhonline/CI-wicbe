<?php

class M_user extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function list_user($limit, $offset)
    {
        $this->db->from('user_customer');
        $this->db->limit($limit, $offset);
        return $this->db->get()->result();
    }

    public function list_user_count()
    {
        $this->db->from('user_customer');
        return $this->db->get()->num_rows();
    }

    public function  chekten($name)
    {
        $this->db->where('name', $name);
        $this->db->from('user_customer');
        return $this->db->get()->row();
    }

    public function get_id($id)
    {
        $this->db->where('id', $id);
        $this->db->from('user_customer');
        return $this->db->get()->row();
    }

    public function  chek_ten_edit($name, $id)
    {
        $this->db->where('name', $name);
        $this->db->where('id !=', $id);
        $this->db->from('user_customer');
        return $this->db->get()->row();
    }
    public function chek_user_name($name){
        $this->db->where('user_loginname',$name);
        $this->db->from('tbl_user');
        return $this->db->get()->row();
    }
    public function chek_user_name_edit($name,$id){
        $this->db->where('user_loginname',$name);
        $this->db->where('user_id !=',$id);
        $this->db->from('tbl_user');
        return $this->db->get()->row();
    }
    public function list_user_ad($limit, $offset){
        $this->db->limit($limit, $offset);
        $this->db->where('group',2);
        $this->db->from('tbl_user');
        return $this->db->get()->result();
    }
    public function user_name_edit($id){
    $this->db->where('user_id',$id);
    $this->db->from('tbl_user');
    return $this->db->get()->row();
}
    public function get_phanquyen($id){
        $this->db->where('id_user',$id);
        $this->db->from('user_admin');
        return $this->db->get()->row();
    }

    public function count_user_ad(){

        $this->db->where('group',2);

        $this->db->from('tbl_user');
        return $this->db->get()->num_rows();
    }
    public function list_user_xem()
    {
        $this->db->from('user_customer');
        //  $this->db->limit($limit, $offset);
        return $this->db->get()->result();
    }

    function login_customer($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->where('status', 1);
        $this->db->where('password', md5($password));
        $this->db->from('user_customer');
        return $this->db->get()->row();

    }

    function get_row($table, $where = array())
    {
        $this->db->where($where);
        return $this->db->get($table)->first_row();
    }
    function set_login_customer($code,$p)
    {
        $this->db->where('email',$code);
        $this->db->where('status',1);
        $this->db->where('password',$p);
        return $this->db->get('user_customer')->row();

    }

    public function view($p){
        $this->db->where('id',$p);
        return $this->db->get('user_customer')->row();
    }
}

?>