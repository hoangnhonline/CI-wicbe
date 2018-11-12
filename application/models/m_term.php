<?php
class M_term extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function chekmenu($where=array()){
        $this->db->where($where);
        $query = $this->db->get('termdetail');
        return $query->row();
    }
     public function list_term_all($where=array(),$lang = "vn") {
        $this->db->select("termdetail.term_name,termdetail.term_link,term.id,term.weight,term.date_modify,term.status");
        $this->db->where("country.name", $lang);
        $this->db->order_by('term.weight', "ASC");
        $this->db->where($where);
        $this->db->from('term');
        $this->db->join('termdetail', 'termdetail.term_id=term.id');
        $this->db->join('country', 'termdetail.country_id=country.id');
        return $this->db->get()->result();
    }
    public function list_term_chill($id,$lang = "vn") {
        $this->db->select("termdetail.term_name,termdetail.term_link,term.id,term.weight,term.date_modify");
        $this->db->where("term.parent_id",$id);
        $this->db->where("country.name", $lang);
        $this->db->order_by('term.weight', "ASC");
        $this->db->from('term');
        $this->db->join('termdetail', 'termdetail.term_id=term.id');
        $this->db->join('country', 'termdetail.country_id=country.id');
        return $this->db->get()->result();
    }
      public function get_term($id) {
        $this->db->select("termdetail.term_name,termdetail.term_link,term.id,term.weight");
        $this->db->where("term.id", $id);
       $this->db->order_by('term.weight', "desc");
        $this->db->from('term');
        $this->db->join('termdetail', 'termdetail.term_id=term.id');
        $this->db->join('country', 'termdetail.country_id=country.id');
        return $this->db->get()->row();
    }
   
   

}
    