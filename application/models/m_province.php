<?php
class M_province extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
      public function list_category_all($where=array(),$lang = "vn") {
        $this->db->select("categorydetail.category_name,categorydetail.category_link,category.id,category.category_weight,category.category_top,category.category_status");
        $this->db->where("country.name", $lang);
        $this->db->order_by('category.category_weight', "ASC");
        $this->db->where($where);
        $this->db->from('province');
        $this->db->join('categorydetail', 'categorydetail.category_id=category.id');
        $this->db->join('country', 'categorydetail.country_id=country.id');
        return $this->db->get()->result();
    }
}
?>