<?php
class Counter extends CI_Model{
	function __construct()
	{
		parent::__construct();
	}
	//================== article==================
        function count_article_where($where=array()){
		$this->db->where($where);
		$this->db->from('article');
		return $this->db->get()->num_rows();
	}
        function count_article_term($id_term){
		$this->db->where('term_id',$id_term);
		$this->db->from('articleterm');
		return $this->db->get()->num_rows();
	}
        // check article in term_id
        function count_list_article_term_check($term){
		$this->db->select("*");
		$this->db->where("articleterm.id_term",$term);
		$this->db->from('article');
		$this->db->join('articleterm','articleterm.article_id=article.id');
		return $this->db->get()->num_rows();
	}
        // check item in category
        function count_item_id($id){
		$this->db->where('category_id',$id);
		$this->db->from('itemcategory');
		return $this->db->get()->num_rows();
	}
        // check item in category
        function count_item_id_in($id){
		$this->db->where('item_id',$id);
		$this->db->from('itemcategory');
		return $this->db->get()->num_rows();
	}
        //====================================
	function count_category(){
		$this->db->from('category');
		return $this->db->get()->num_rows();
	}
        /**
         * item , category  
         * 
         *          */
        //================= check item have category===================
	function count_item_category($category_id,$id_item){
		$this->db->where('category_id',$category_id);
		$this->db->where('item_id',$id_item);
		$this->db->from('itemcategory');
		return $this->db->get()->num_rows();
	}
	//====================================
	function count_term(){
		$this->db->from('term');
		return $this->db->get()->num_rows();
	}
	//====================================
	
	function count_item_other($id){
		$this->db->where('item_id',$id);
		$this->db->from('other_img');
		return $this->db->get()->num_rows();
	}
	//====================================
	function count_item_where($where=array()){
		$this->db->where($where);
		$this->db->from('item');
		return $this->db->get()->num_rows();
	}
	function count_order_where($where=array()){
		$this->db->where($where);
		$this->db->from('od_order');
		return $this->db->get()->num_rows();
	}

	//====================================
	function count_article_id($id){
		$this->db->where('id',$id);
		$this->db->from('article');
		return $this->db->get()->num_rows();
	}
//================= OTHER IMAGES ITEM===================
	function count_image_id($id){
		$this->db->where('id',$id);
		$this->db->from('images');
		return $this->db->get()->num_rows();
	}
        function count_image_other_id($id){
		$this->db->where('img_id',$id);
		$this->db->from('other_img');
		return $this->db->get()->num_rows();
	}

	//====================================
	
	
	//====================================
	function count_item_size($id_size,$id_item){
		$this->db->where('id_size',$id_size);
		$this->db->where('id_item',$id_item);
		$this->db->from('item_size');
		return $this->db->get()->num_rows();
	}
	//====================================
	function count_item_color($id_color,$id_item){
		$this->db->where('id_color',$id_color);
		$this->db->where('id_item',$id_item);
		$this->db->from('item_color');
		return $this->db->get()->num_rows();
	}

	//============== count image in album======================
	function count_image_album($album_id,$image_id){
		$this->db->where('album_id',$album_id);
		$this->db->where('image_id',$image_id);
		$this->db->from('imagealbum');
		return $this->db->get()->num_rows();
	}
        // count images with id_image
        function count_image_album_check($id){
		$this->db->where('image_id',$id);
		$this->db->where('album_id !=','0');
		$this->db->from('imagealbum');
		return $this->db->get()->num_rows();
	}
        //================ count images====================
	function count_image_album_List($id){
		$this->db->where('album_id',$id);
		$this->db->from('imagealbum');
		return $this->db->get()->num_rows();
	}
	
	//====================================
	function count_item(){
		$this->db->where('status',1);
		$this->db->from('item');
		return $this->db->get()->num_rows();
	}
	//====================================
	function count_article(){
		$this->db->from('article');
		return $this->db->get()->num_rows();
	}
//====================================
	function count_image(){
		$this->db->from('imagealbum');
		$this->db->where('album_id !=','0');
		//$this->db->join('imagealbum','imagealbum.image_id=images.id');
		return $this->db->get()->num_rows();
	}

//====================================
	function count_project(){
		$this->db->where('status',1);
		$this->db->from('project');
		return $this->db->get()->num_rows();
	}
	//====================================
	function count_item_origin(){
		$this->db->select("*");
		$this->db->where('item.status',1);
		$this->db->from('item');
		$this->db->join('itemorigin','itemorigin.id_item=item.id');
		return $this->db->get()->num_rows();
	}
//====================================
	function count_item_origin_id($id){
		$this->db->select("*");
		$this->db->where('item.status',1);
		$this->db->where('itemorigin.id_origin',$id);
		$this->db->from('item');
		$this->db->join('itemorigin','itemorigin.id_item=item.id');
		return $this->db->get()->num_rows();
	}
	//====================================
	function count_item_manufacturer(){
		$this->db->select("*");
		$this->db->where('item.status',1);
		$this->db->from('item');
		$this->db->join('itemmanufacturer','itemmanufacturer.id_item=item.id');
		return $this->db->get()->num_rows();
	}
//====================================
	function count_item_manufacturer_id($id){
		$this->db->select("*");
		$this->db->where('item.status',1);
		$this->db->where('itemmanufacturer.id_manufacturer',$id);
		$this->db->from('item');
		$this->db->join('itemmanufacturer','itemmanufacturer.id_item=item.id');
		return $this->db->get()->num_rows();
	}
	//====================================
	function count_contact_new(){
		$this->db->where('status',0);
		$this->db->from('contact');
		return $this->db->get()->num_rows();
	}
	function count_table_where($where=array(),$table){
		$this->db->where($where);
		$this->db->from($table);
		return $this->db->get()->num_rows();
	}
	
}
