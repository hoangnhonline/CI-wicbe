<?php

class M_category extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function list_cate_slide($where=array(),$lang,$limit,$offset) {
        $this->db->select("categorydetail.category_name,categorydetail.category_link,category.id,category.category_weight,category.category_top,category.category_status,category.icon,category.category_hot");
        $this->db->where($where);
        $this->db->where("country.name", $lang);
        $this->db->limit($limit, $offset);
        $this->db->order_by('category.category_weight', "DESC");
        $this->db->order_by('category.id', "DESC");
        $this->db->from('category');
        $this->db->join('categorydetail', 'categorydetail.category_id=category.id');
        $this->db->join('country', 'categorydetail.country_id=country.id');
        return $this->db->get()->result();
    }

    public function get_delete($id){
        $this->db->select("categorydetail.*,category.*");
        $this->db->where('category.category_top', $id);
        $this->db->from('category');
        $this->db->join('categorydetail', 'categorydetail.category_id=category.id');
        return $this->db->get()->row();
    }
    public function list_promotion($where=array(),$limit, $offset,$key)
    {
        $this->db->order_by('category.category_weight', "DESC");
        $this->db->order_by('category.id', "DESC");
        $this->db->where($where);
        $this->db->limit($limit, $offset);
        if(isset($_GET['name'])){
        $this->db->where('category_top',$_GET['name']);
        }
        $this->db->like('icon', $key);
        $this->db->from('category');
        return $this->db->get()->result();
    }

    public function count_promotion($where=array(),$key)
    {
        $this->db->order_by('category.category_weight', "DESC");
        $this->db->order_by('category.id', "DESC");
        $this->db->where($where);
        $this->db->like('icon', $key);
        if(isset($_GET['name'])){
            $this->db->where('category_top',$_GET['name']);
        }
        $this->db->from('category');
        return $this->db->get()->num_rows();
    }
    public function list_category_all($where=array()) {
    $this->db->order_by('weight', "DESC");
    $this->db->order_by('category.id', "DESC");
    $this->db->where($where);
    $this->db->from('category');
    return $this->db->get()->result();
}
    function update_tableID($id, $sql = array(), $table) {
        $this->db->where('id', $id);
        $this->db->update($table, $sql);

    }

    public function list_category_all_home_slide($where=array()) {

        $this->db->order_by('weight', "DESC");
        $this->db->order_by('category.id', "DESC");
        $this->db->where($where);
        $this->db->from('category');
        return $this->db->get()->result();
    }
      public function get_cate($id) {
        $this->db->where('category.id',$id);
        $this->db->from('category');
        return $this->db->get()->row();
    }
    public function get_cate1($id) {
        $this->db->order_by('weight', "ASC");
        $this->db->where('category.id',$id);
        $this->db->from('category');
        return $this->db->get()->row();
    }
      public function get_term_ngonngu($id) {
        $this->db->order_by('weight', "ASC");
        $this->db->where('category.id',$id);
        $this->db->from('category');
        return $this->db->get()->row();
    }

    public function list_category_chill($id) {

        $this->db->where('top', $id);
        $this->db->order_by('weight', "DESC");
        $this->db->order_by('category.id', "DESC");
        $this->db->from('category');

        return $this->db->get()->result();
    }
    
    public function get_icon($id){
         $this->db->where("id", $id);
         $this->db->from('category');
         return $this->db->get()->row();
    }

    public function get_category($id) {
        $this->db->where('category.id', $id);
        $this->db->order_by('weight', "ASC");
        $this->db->from('category');
        return $this->db->get()->row();
    }
    
     public function chekmenu($name_link) {
    $this->db->where('link', $name_link);
    $this->db->from('category');
    return $this->db->get()->row();
}

    public function thumb_home($name_link,$type) {
        $this->db->where('link', $name_link);
        $this->db->where('type', $type);
        $this->db->from('category');
        return $this->db->get()->row();
    }
    public function chekmenu_edit($name_link,$id) {
        $this->db->where('link', $name_link);
        $this->db->where('id !=',$id);
        $this->db->from('category');
        return $this->db->get()->row();
    }
     public function list_category_all_home($where=array()) {
        $this->db->order_by('category.id', "DESC");
        $this->db->order_by('weight', "DESC");
        $this->db->limit(5,0);
        $this->db->where($where);
        $this->db->from('category');
        return $this->db->get()->result();
    }
     public function list_category_count() {
        $this->db->order_by('category.id', "DESC");
        $this->db->order_by('weight', "DESC");
        $this->db->where('status',1);
        $this->db->where('type',1);
        $this->db->from('category');
       
        return $this->db->get()->num_rows();
    }
     public function count_category($id) {
        $this->db->where('top', $id);
        $this->db->from('category');
        return $this->db->get()->num_rows();
    }
    public function get_category_menu($link) {
        $this->db->where('link', $link);
        $this->db->order_by('weight', "ASC");
        $this->db->from('category');
        return $this->db->get()->row();
    }
   public function danhmuc($name,$limit, $offset){

        $this->db->where("link", $name);
        $this->db->limit($limit, $offset);
        $this->db->where("status", 1);

        $this->db->order_by('weight', "ASC");
        $this->db->group_by('item.id');
        $this->db->from('item');
        return $this->db->get()->result();
    }


    function show_list_article_all($where = array())
    {
        $this->db->where($where);
        $this->db->order_by('article.weight', "ASC");
        $this->db->from('article');
        return $this->db->get()->result();
    }



}
?>