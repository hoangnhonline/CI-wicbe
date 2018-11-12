<?php
class M_oder extends CI_Model{
      var $_images_path = "";
    var $_images_url = "";
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Title');
        $this->load->helper(array('url', 'text', 'form', 'file'));
        $this->_images_url = "uploads/color";
        $this->_images_path = realpath(APPPATH . "../uploads/color");
    }
    public function show($lang,$where = array()){
          $this->db->select("categorydetail.category_name,categorydetail.category_link,category.id,category.category_weight,category.category_top,category.category_status");
        $this->db->where("country.name", $lang);
        $this->db->order_by('category.id', "DESC");
        $this->db->order_by('category.category_weight', "DESC");
        $this->db->limit(1000,5);
        $this->db->where($where);
        $this->db->from('od_order');
        $this->db->join('od_order_item', 'od_order_item.id_order=od_order.id');
        
        return $this->db->get()->result();
    }
    function show_list_order_page($limit=10,$start=0)
    {
        $this->db->limit($limit,$start);
        $this->db->from('od_order');
        $this->db->order_by("id","DESC");
        return $this->db->get()->result();
    }

    function show_sum_order_item_id($id)
    {
        $this->db->select_sum('total');
        $this->db->where('id_order',$id);
        $this->db->from('od_order_item');
        $this->db->join('od_order','od_order_item.id_order=od_order.id');
        return $this->db->get()->row();
    }
    function show_detail_order_id($id)
    {
        $this->db->where('id',$id);
        $this->db->from('od_order');
        return $this->db->get()->row();
    }
}
?>