<?php

class M_tags extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function list_tags($limit,$offset) {
        $this->db->limit($limit, $offset);
        $this->db->order_by('tags.weight', "DESC");
        $this->db->order_by('tags.id', "DESC");
        $this->db->from('tags');
        return $this->db->get()->result();
    }

    public function could_tags(){
        $this->db->from('tags');
        return $this->db->get()->num_rows();
    }

    public function show_list_tags() {
        $this->db->order_by('tags.weight', "DESC");
        $this->db->where("status", 1);
        $this->db->order_by('tags.id', "DESC");
        $this->db->from('tags');
        return $this->db->get()->result();
    }
    public function get_list_tags_check($id) {

        $this->db->select("article.name,article.id");
        $this->db->where('tags_id.id_tags', $id);
        $this->db->order_by('article.weight', "DESC");
        $this->db->order_by('article.id', "DESC");
        $this->db->from('article');
        $this->db->join('tags_id', 'tags_id.id_article=article.id');
        return $this->db->get()->result();
    }

    function update_tableID($id, $sql = array(), $table) {
        $this->db->where('id', $id);
        $this->db->update($table, $sql);

    }
   public function chec($id_article,$id_tags){
        $this->db->where("id", $id_article);
        $this->db->where("id_tags",$id_tags);
        $this->db->from('tags_id');
        return $this->db->get()->num_rows();
    }

    public function chektags($link) {
        $this->db->where('link',$link);
        $this->db->from('tags');
        return $this->db->get()->row();
    }


    public function get_tags($id) {
        $this->db->where('id',$id);
        $this->db->from('tags');
        return $this->db->get()->row();
    }





    public function chektags_edit($link,$id) {
        $this->db->where('link', $link);
        $this->db->where('id !=', $id);
        $this->db->from('tags');
        return $this->db->get()->row();
    }


    public function list_category_all_home($where=array(),$lang) {
        $this->db->select("categorydetail.category_name,categorydetail.category_link,category.id,category.category_weight,category.category_top,category.category_status");
        $this->db->where("country.name", $lang);
        $this->db->order_by('category.id', "DESC");
        $this->db->order_by('category.category_weight', "DESC");
        $this->db->limit(5,0);
        $this->db->where($where);
        $this->db->from('category');
        $this->db->join('categorydetail', 'categorydetail.category_id=category.id');
        $this->db->join('country', 'categorydetail.country_id=country.id');
        return $this->db->get()->result();
    }
    public function list_category_count() {
        $this->db->order_by('category.id', "DESC");
        $this->db->order_by('category.category_weight', "DESC");
        $this->db->where('category.category_status',1);
        $this->db->where('category.category_type',1);
        $this->db->from('category');

        return $this->db->get()->num_rows();
    }
    public function list_category_all_home_count($where=array(),$lang) {
        $this->db->select("categorydetail.category_name,categorydetail.category_link,category.id,category.category_weight,category.category_top,category.category_status");
        $this->db->where("country.name", $lang);
        $this->db->order_by('category.id', "DESC");
        $this->db->order_by('category.category_weight', "DESC");
        $this->db->limit(1000,5);
        $this->db->where($where);
        $this->db->from('category');
        $this->db->join('categorydetail', 'categorydetail.category_id=category.id');
        $this->db->join('country', 'categorydetail.country_id=country.id');
        return $this->db->get()->result();
    }
    public function get_category_menu($link,$lang) {
        $this->db->select("categorydetail.category_name,categorydetail.category_link,category.id,category.category_weight");
        $this->db->where('categorydetail.category_link', $link);
        $this->db->where("country.name", $lang);
        $this->db->order_by('category.category_weight', "ASC");
        $this->db->from('category');
        $this->db->join('categorydetail', 'categorydetail.category_id=category.id');
        $this->db->join('country', 'categorydetail.country_id=country.id');
        return $this->db->get()->row();
    }
    public function danhmuc($name,$limit, $offset,$lang){
        $this->db->select("itemdetail.item_name,itemdetail.item_id as id,itemdetail.item_link,itemdetail.item_content");
        $this->db->where("categorydetail.category_link", $name);
        $this->db->limit($limit, $offset);
        $this->db->where("item.item_status", 1);
        $this->db->where("country.name",$lang);
        $this->db->order_by('category.category_weight', "ASC");
        $this->db->group_by('itemdetail.item_id');
        $this->db->from('categorydetail');
        $this->db->join('category', 'category.id=categorydetail.category_id');
        $this->db->join('itemcategory', 'itemcategory.category_id=category.id');
        $this->db->join('itemdetail', 'itemdetail.item_id=itemcategory.item_id');
        $this->db->join('country', 'itemdetail.country_id=country.id');
        $this->db->join('item', 'item.id=itemdetail.item_id');
        return $this->db->get()->result();
    }
    public function cuont_danhmuc($name){
        $this->db->select("itemdetail.item_name,itemdetail.item_id as id,itemdetail.item_link");
        $this->db->where("categorydetail.category_link", $name);
        $this->db->where("item.item_status", 1);
        $this->db->order_by('category.category_weight', "ASC");
        $this->db->group_by('itemdetail.item_id');
        $this->db->from('categorydetail');
        $this->db->join('category', 'category.id=categorydetail.category_id');
        $this->db->join('itemcategory', 'itemcategory.category_id=category.id');
        $this->db->join('itemdetail', 'itemdetail.item_id=itemcategory.item_id');
        $this->db->join('item', 'item.id=itemdetail.item_id');
        return $this->db->get()->num_rows();
    }
    public function count_category($id){
        $this->db->where("category.category_top", $id);
        $this->db->from('category');
        return $this->db->get()->num_rows();
    }
    public function count_category_chek($id){
        $this->db->where("category.id", $id);
        $this->db->from('category');
        return $this->db->get()->num_rows();
    }
    public function count_tuyendung($id){
        $this->db->where("category_id", $id);
        $this->db->from('tuyendung');
        return $this->db->get()->num_rows();
    }
    public function list_category_chill_td($id, $lang) {
        $this->db->select("categorydetail.category_name,categorydetail.category_link,category.id,category.category_weight,category.category_status");
        $this->db->where("country.name", $lang);
        $this->db->where('category.category_top', $id);
        $this->db->where('category.category_type', 2);
        $this->db->order_by('category.category_weight', "ASC");
        $this->db->from('category');
        $this->db->join('categorydetail', 'categorydetail.category_id=category.id');
        $this->db->join('country', 'categorydetail.country_id=country.id');
        return $this->db->get()->result();
    }
    public  function get_link_nb($link){
        $this->db->where("categorydetail.category_link", $link);
        $this->db->from('categorydetail');
        $this->db->join('category', 'category.id=categorydetail.category_id');
        return $this->db->get()->row();
    }
    public function chekmenu_nb($id,$lang) {
        $this->db->where('categorydetail.category_id',$id);
        $this->db->where('categorydetail.country_id',$lang);
        $this->db->from('categorydetail');
        return $this->db->get()->row();
    }
    public function row_catelogy($where=array(),$lang) {
        $this->db->select("categorydetail.category_name,categorydetail.category_link,category.id,category.category_weight,category.category_top,category.category_status,category.icon");
        $this->db->where("country.name", $lang);
        $this->db->order_by('category.category_weight', "DESC");
        $this->db->order_by('category.id', "DESC");
        $this->db->where($where);
        $this->db->from('category');
        $this->db->join('categorydetail', 'categorydetail.category_id=category.id');
        $this->db->join('country', 'categorydetail.country_id=country.id');
        return $this->db->get()->row();
    }


    public function list_categor_hang($a,$b=null) {
        $this->db->select("categorydetail.category_name,categorydetail.category_link,category.id,category.category_weight,category.category_top,category.category_status,category.icon,category.category_hot,category.level");
        $this->db->where('categorydetail.country_id',1);
        $this->db->limit($a, $b);
        $this->db->order_by('category.category_weight', "DESC");
        $this->db->where("category.category_status", 1);
        $this->db->where("category.category_top !=", 0);
        $this->db->where("category.category_type", 3);
        $this->db->where("category.category_hot", 1);
        $this->db->group_by('category.id');
        $this->db->from('category');
        $this->db->join('categorydetail', 'categorydetail.category_id=category.id');
        return $this->db->get()->result();

    }

    public function list_categor_hang1() {
        $this->db->select("categorydetail.category_name,categorydetail.category_link,category.id,category.category_weight,category.category_top,category.category_status,category.icon,category.category_hot,category.level");
        $this->db->limit(2,2);
        $this->db->group_by('category.id');
        $this->db->from('category');
        $this->db->join('categorydetail', 'categorydetail.category_id=category.id');
        return $this->db->get()->result();

    }


}
?>