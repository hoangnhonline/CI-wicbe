<?php
class M_email extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Title');
        $this->load->helper(array('url', 'text', 'form', 'file'));
    }

    public function list_letter($limit, $offset,$type){
        $this->db->limit($limit, $offset);
        $this->db->where('type',$type);
        $this->db->from('letter');
        return $this->db->get()->result();
    }
    public function list_letter_could($type){
        $this->db->where('type',$type);
        $this->db->from('letter');
        return $this->db->get()->num_rows();
    }
    public function get_id($id){
        $this->db->where('id',$id);
        $this->db->from('letter');
        return $this->db->get()->row();

    }
    public function list_comment($limit, $offset){
        $this->db->limit($limit, $offset);
        $this->db->from('comment');
        return $this->db->get()->result();
    }

    public function list_comment_could(){
        $this->db->from('comment');
        return $this->db->get()->num_rows();
    }


}

?>