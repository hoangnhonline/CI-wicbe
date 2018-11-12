<?php
class M_item extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function chekmenu($name){
        $this->db->where('link',$name);
        $query = $this->db->get('item');
        return $query->row();
    }
    
   function show_list_item_page_type($id = 0, $limit, $offset,$key) {
        $this->db->where("type", $id);
        $this->db->order_by('weight', "DESC");
        $this->db->order_by('item.id', "DESC");
        $this->db->group_by('item.id');
        $this->db->limit($limit, $offset);
        $this->db->like('name',$key);
        $this->db->from('item');
        return $this->db->get()->result();
    }
    
      function show_list_item_page_type_home($where=array()) {
        $this->db->where($where);
        $this->db->order_by('weight', "DESC");
        $this->db->limit(10, 0);
        $this->db->group_by('item.id');
        $this->db->from('item');
        return $this->db->get()->result();
    }

    function show_list_hot($where=array()) {
        $this->db->where($where);
        $this->db->order_by('weight', "DESC");
        $this->db->group_by('item.id');
        $this->db->from('item');
        return $this->db->get()->result();
    }
    function update_tableID($id, $sql = array(), $table) {
        $this->db->where('id', $id);
        $this->db->update($table, $sql);

    }
    function show_list_item_sp($where=array(),$limit, $offset) {
        $this->db->where($where);
        $this->db->limit($limit, $offset);
        $this->db->order_by('item.weight', "DESC");
        $this->db->order_by('item.id', "DESC");
        $this->db->group_by('item.id');
        $this->db->from('item');
        return $this->db->get()->result();
    }

    function show_list_item_sp1($where=array()) {
        $this->db->where($where);
        $this->db->order_by('item.weight', "DESC");
        $this->db->order_by('item.id', "DESC");
        $this->db->group_by('item.id');
        $this->db->from('item');
        return $this->db->get()->result();
    }
      function count_list_item_sp($where) {
       $this->db->where($where);
        $this->db->order_by('weight', "DESC");
          $this->db->order_by('id', "DESC");
        $this->db->group_by('item.id');
        $this->db->from('item');
        return $this->db->get()->num_rows();
    }
    function check_tags($where=array()) {
        $this->db->where($where);
        $this->db->from('tags_id');
        return $this->db->get()->num_rows();
    }
    function show_tags($where=array()) {
        $this->db->select("tags.*");
        $this->db->where($where);
        $this->db->order_by('tags.weight', "DESC");
        $this->db->group_by('tags.id');
        $this->db->from('tags');
        $this->db->join('tags_id', 'tags_id.id_tags=tags.id');
        return $this->db->get()->result();
    }
      public function get_item_img($id) {
        $this->db->select("images.id as img_id");
        $this->db->where("item.id", $id);
        $this->db->from('item');
        $this->db->join('itemimages', 'itemimages.item_id=item.id');
        $this->db->join('images', 'images.id=itemimages.image_id');
        return $this->db->get()->row();
    }
    function show_list_item_slide() {
        $this->db->select("item.id,item.date_create,item.item_status,itemdetail.item_name,itemdetail.item_link,item.item_hot,item.item_weight");
        $this->db->where("item.item_type", 1);
        $this->db->order_by('item.item_weight', "DESC");
        $this->db->where('itemdetail.country_id', 1);
        $this->db->where('item.item_status', 1);
        $this->db->group_by('item.id');
        $this->db->limit(10,0);
        $this->db->from('item');
        $this->db->join('itemdetail', 'itemdetail.item_id=item.id');
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
    function count_item_where($where=array()){
		$this->db->where($where);
		$this->db->from('item');
		return $this->db->get()->num_rows();
    }
 function show_thumb($id) {
        $this->db->where("id", $id);
        $this->db->from('item');
        return $this->db->get()->row();
    }
    function show_detail_item_id($where=array()) {
        $this->db->where($where);
        $this->db->from('item');
        return $this->db->get()->row();
    }
    function show_detail_item_id_home($where=array()) {
        $this->db->where($where);
        $this->db->from('item');
        return $this->db->get()->row();
    }
      function show_detail_item_id_lang($item_id) {
        $this->db->where("item.id", $item_id);
        $this->db->from('item');
        return $this->db->get()->row();
    }
       function check_cate_detail($id_cate) {
        $this->db->where('category_id', $id_cate);
     //   $this->db->where('country_id', $lang);
        $this->db->from('categorydetail');
        return $this->db->get()->row();
    }
    public function get_category($where=array(), $lang = "vn") {
        $this->db->select("categorydetail.category_name,categorydetail.category_link,category.id,category.category_weight");
        $this->db->where($where);
        $this->db->where("country.name", $lang);
        $this->db->order_by('category.category_weight', "ASC");
        $this->db->from('category');
        $this->db->join('categorydetail', 'categorydetail.category_id=category.id');
        $this->db->join('country', 'categorydetail.country_id=country.id');
        return $this->db->get()->row();
        
      }
        function item_detail($id_item,$id_lang) {
        $this->db->where('item_id', $id_item);
        $this->db->where('country_id', $id_lang);
        $this->db->from('itemdetail');
        return $this->db->get()->row();
    }
    function show_detail_item_where($where = array()) {
        $this->db->where($where);
        $this->db->from('item');
        return $this->db->get()->row();
    }
    function item_cate_color($id_item,$id_cate) {
        $this->db->where('item_id', $id_item);
        $this->db->where('category_id', $id_cate);
        $this->db->from('item_color');
        return $this->db->get()->num_rows();
    }
    function count_item_category($id_item) {
        $this->db->where('item_id', $id_item);
        $this->db->from('itemcategory');
        $this->db->join('category', 'categorydetail.category_id=category.id');
        return $this->db->get()->row();
    }

    public function get_category_th($where = array()) {
        $this->db->select("itemcategory.category_id");
        $this->db->where($where);
        $this->db->where("country.name", 'vn');
        $this->db->order_by('category.category_weight', "ASC");
        $this->db->from('category');
        $this->db->join('itemcategory', 'itemcategory.category_id=category.id');
        $this->db->join('country', 'categorydetail.country_id=country.id');
        return $this->db->get()->row();
    }
        function count_table_where($where=array(),$table){
		$this->db->where($where);
		$this->db->from($table);
		return $this->db->get()->num_rows();
	}
         function show_img_other($id_item) {
         $this->db->select("images.thumb,images.id");
        $this->db->where('item.id', $id_item);
        $this->db->from('item');
        $this->db->join('other_img', 'other_img.item_id=item.id');
        $this->db->join('images','images.id=other_img.img_id');
        return $this->db->get()->result();
    }
    public function chekitem($link,$id){
        $this->db->where('link',$link);
        $this->db->where('id !=',$id);
        $query = $this->db->get('item');
        return $query->row();
    }
       public function chekitemadd($name){
        $this->db->where('link',$name);
        $query = $this->db->get('item');
        return $query->row();
    }
   
    public function get_categoty($name){
        $this->db->select("category.id");
        $this->db->where('categorydetail.category_link',$name);
        $this->db->from('category');
        $this->db->join('categorydetail', 'categorydetail.category_id=category.category_top');
          return $this->db->get()->result();
    }
    


     function show_list_category_child($category_top) {
        $this->db->select("category.id");
        $this->db->where("category.top", $category_top);
        $this->db->from('category');
        return $this->db->get()->result();
    }

    function show_list_item_category_top_page($id,$limit, $offset, $page = 1) {
        $array = array($id);
        $list = $this->show_list_category_child($id);
        foreach ($list as $l) {
            $array[] = $l->id;
        }
        $this->db->where("item.status", '1');
        $this->db->where("item.type", '1');
        $this->db->where_in("item.cate", $array);
        if ($page == 1)
            $this->db->limit($limit, $offset);
        $this->db->from('item');
        $this->db->order_by('item.weight', 'DESC');
        $this->db->order_by('item.id', 'DESC');
        $this->db->group_by('item.id');
        if ($page == 0)
            return $this->db->get()->num_rows();
        else
            return $this->db->get()->result();
    }


      function category_check($where = array()) {
        $this->db->select("categorydetail.category_link,category.category_top,category.id");
        $this->db->where("country.name", 'vn');
        $this->db->where($where);
        $this->db->from('category');
        $this->db->join('categorydetail', 'categorydetail.category_id=category.id');
        $this->db->join('country', 'categorydetail.country_id=country.id');
        return $this->db->get()->row();
    }
      function category_detail($link) {
        $this->db->where("link", $link);
        $this->db->where("status", 1);
        $this->db->from('category');
        return $this->db->get()->row();
    }
     function category_detail_link($id,$lang) {
        $this->db->where("categorydetail.category_id", $id);
        $this->db->where("categorydetail.country_id",$lang);
        $this->db->from('categorydetail');
        return $this->db->get()->row();
    }
function category_detail_parent($link) {
        $this->db->select("categorydetail.category_name,category.id,category.banner_id");
        $this->db->where("category_link", $link);
        $this->db->where("country.name", 'vn');
        //$this->db->where("category.category_top", $top->id);
        $this->db->where("category.category_status", 1);
        $this->db->from('category');
        $this->db->join('categorydetail', 'categorydetail.category_id=category.id');
        $this->db->join('country', 'categorydetail.country_id=country.id');
        return $this->db->get()->row();
    }
    function show_list_item_category_page($id, $limit, $offset) {
        $this->db->where("item.type", '1');
        $this->db->where("item.status", '1');
        $this->db->where("cate", $id);
        $this->db->limit($limit, $offset);
        $this->db->from('item');
        $this->db->order_by('item.weight', 'DESC');
        $this->db->group_by('item.id');
        return $this->db->get()->result();
    }
   function show_list_item_category_page_count($id) {
        $this->db->where("item.status", '1');
       $this->db->where("item.type", '1');
        $this->db->where("cate", $id);
        $this->db->from('item');
        $this->db->order_by('item.weight', 'DESC');
        $this->db->group_by('item.id');;
        return $this->db->get()->num_rows();
        
    }
     public function other_img($id){
          $this->db->where("other_img.id_item", $id);
         $this->db->from('other_img');
         return $this->db->get()->result();
    }
    function count_image_other_id($id){
		$this->db->where('img_id',$id);
		$this->db->from('other_img');
		return $this->db->get()->num_rows();
	}
        public function show_thum_o($img){
        $this->db->where("img", $img);
        $this->db->from('other_img');
        return $this->db->get()->row();
        }

       function show_list_item_image($id) {
        $this->db->select("other_img.*");
        $this->db->where("other_img.id_item", $id);
        $this->db->order_by('item.weight', 'DESC');
        $this->db->from('item');
        $this->db->join('other_img', 'other_img.id_item=item.id');
        $this->db->group_by('item.id');
        return $this->db->get()->result();
    }
    function show_list_item_image1($id) {
        $this->db->where("other_img.id_item", $id);
        $this->db->from('other_img');
        return $this->db->get()->result();
    }
  function show_list_item_hot() {
        $this->db->where("status",1);
      $this->db->where("type",1);
      $this->db->where("hot",1);
      $this->db->order_by('weight', 'DESC');
      $this->db->order_by('id', 'DESC');
      $this->db->limit(12, 0);
        $this->db->from('item');
        return $this->db->get()->result();
    }
    function count_item_other($id){
		$this->db->where('id_item',$id);
		$this->db->from('other_img');
		return $this->db->get()->num_rows();
	}
      public function product($lang){
          $this->db->select("category.*,categorydetail.*");
        $this->db->order_by('category.category_weight', "DESC");
        $this->db->order_by('category.id', "DESC");
          $this->db->where('categorydetail.country_id',$lang);
        $this->db->from('category');
         $this->db->join('categorydetail', 'categorydetail.category_id=category.id');
        return $this->db->get()->first_row();
      }
      public function link_name($id,$lang){
          $this->db->where('category_id',$id);
          $this->db->where('country_id',$lang);
        $this->db->from('categorydetail');
        
        return $this->db->get()->row();
      }
      public function get_link_item($id,$lang){
           $this->db->where('item_id',$id);
          $this->db->where('country_id',$lang);
           $this->db->from('itemdetail');
           return $this->db->get()->row();
      }
      public function item_color($id){
          $this->db->select("color.thumb");
        $this->db->where("itemcolor.item_id", $id);
        $this->db->from('itemcolor');
        $this->db->order_by('color.weight', 'DESC');
         $this->db->order_by('color.id', 'DESC');
        $this->db->group_by('color.id');
        $this->db->join('color', 'color.id=itemcolor.color_id');
        return $this->db->get()->result();
      }
      public function item_cha($id,$lang){
        $this->db->select("categorydetail.category_name,categorydetail.category_link,itemcategory.category_id,category.category_top");
        $this->db->where("itemcategory.item_id", $id);
         $this->db->where("country.name", $lang);
        $this->db->from('itemcategory');
        $this->db->join('categorydetail', 'categorydetail.category_id=itemcategory.category_id');
        $this->db->join('country', 'categorydetail.country_id=country.id');
        $this->db->join('category', 'categorydetail.category_id=category.id');
        return $this->db->get()->row();
      }
      public function chek_catgory_top($id,$lang){
         $this->db->select("categorydetail.category_name,categorydetail.category_link,categorydetail.category_id");
        $this->db->where("category.id", $id);
         $this->db->where("categorydetail.country_id", $lang);
        $this->db->from('category');
        $this->db->join('categorydetail', 'categorydetail.category_id=category.id');
       
       return $this->db->get()->row();
      }
       public function get_term_dh($id) {
        $this->db->select("itemdetail.*,item.*");
        $this->db->where("item.id", $id);
        $this->db->from('item');
        $this->db->join('itemdetail', 'itemdetail.item_id=item.id');
        return $this->db->get()->row();
    }
        function show_sp_lienquan($id_item,$id,$lang) {
            $this->db->select("itemdetail.item_name,itemdetail.item_link,item.*");
            $this->db->order_by('item.item_weight', "DESC");
            $this->db->order_by('item.id', "DESC");
            $this->db->where('item.id !=', $id_item);
            $this->db->where('itemcategory.category_id', $id);
            $this->db->where('country.name', $lang);
            $this->db->where('item.item_status', 1);
            $this->db->group_by('item.id');
            $this->db->limit(3, 0);
            $this->db->from('itemcategory');
            $this->db->join('itemdetail', 'itemdetail.item_id=itemcategory.item_id');
            $this->db->join('item', 'item.id=itemdetail.item_id');
            $this->db->join('country', 'itemdetail.country_id=country.id');
        return $this->db->get()->result();
    }
    public function id_item($id){
        $this->db->where('id',$id);
        $this->db->from('item');
        return $this->db->get()->row();
    }


    function show_item_hot_1_2() {
        $this->db->order_by('sanpham.idSP' , 'DESC');
        $this->db->from('sanpham');
        return $this->db->get()->result();
    }

    function count_lq($id){
        $this->db->where('category_id',$id);
        $this->db->where('item.item_status', 1);
        $this->db->from('itemcategory');
        $this->db->join('item', 'item.id=itemcategory.item_id');
        return $this->db->get()->num_rows();
    }

    function show_delete() {
        $this->db->from('itemdetail');
        return $this->db->get()->result();
    }

    function coult_delete($where=array()) {
        $this->db->where($where);
        $this->db->from('itemdetail');
        return $this->db->get()->num_rows();
    }
    function show_item_hot_1($where=array()) {
        $this->db->select("item.*,itemdetail.item_summary,itemdetail.item_name,itemdetail.*");
        $this->db->where($where);
        $this->db->where('country_id',1);
        $this->db->order_by('item.item_weight' , 'DESC');
        $this->db->order_by('item.id' , 'DESC');
        $this->db->limit(12 ,0);
        $this->db->from('item');
        $this->db->join('itemdetail', 'itemdetail.item_id=item.id');
        return $this->db->get()->result();
    }
    function show_item_hot_2($where=array()) {
        $this->db->select("item.*,itemdetail.item_summary,itemdetail.item_name,itemdetail.*");
        $this->db->where($where);
        $this->db->where('country_id',1);
        $this->db->order_by('item.item_weight' , 'DESC');
        $this->db->order_by('item.id' , 'DESC');
        $this->db->limit(5 ,0);
        $this->db->from('item');
        $this->db->join('itemdetail', 'itemdetail.item_id=item.id');
        return $this->db->get()->result();
    }

    function show_item_hot_home($where=array(), $lang) {
        $this->db->select("item.*,itemdetail.item_summary,itemdetail.item_name,itemdetail.*");
        $this->db->where($where);
        $this->db->where('country.name',$lang);
        $this->db->order_by('item.item_weight' , 'DESC');
        $this->db->order_by('item.id' , 'DESC');
        $this->db->limit(8 ,0);
        $this->db->from('item');
        $this->db->join('itemdetail', 'itemdetail.item_id=item.id');
        $this->db->join('country', 'itemdetail.country_id=country.id');
        return $this->db->get()->result();
    }
    function show_list_item_type_page($lang,$type, $limit, $offset)
    {
        $this->db->select("item.id,itemdetail.item_link,itemdetail.item_name,itemdetail.item_summary,item.item_price_sale,item.item_code,item.item_price");
        $this->db->where("country.name", $lang);
        $this->db->where("item.item_status", '1');
        $this->db->where("item.item_type", $type);
        $this->db->limit($limit, $offset);
        $this->db->from('item');
        $this->db->order_by('item.item_weight', 'DESC');
        $this->db->group_by('item.id');
        $this->db->join('itemdetail', 'itemdetail.item_id=item.id');
        $this->db->join('country', 'itemdetail.country_id=country.id');
        return $this->db->get()->result();

    }

    function count_show_list_item_type_page($lang,$type)
    {
        $this->db->select("item.id,itemdetail.item_link,itemdetail.item_name,itemdetail.item_summary,item.item_price_sale,item.item_code");
        $this->db->where("country.name", $lang);
        $this->db->where("item.item_status", '1');
        $this->db->where("item.item_type", $type);
        $this->db->from('item');
        $this->db->order_by('item.item_weight', 'DESC');
        $this->db->group_by('item.id');
        $this->db->join('itemdetail', 'itemdetail.item_id=item.id');
        $this->db->join('country', 'itemdetail.country_id=country.id');
        return $this->db->get()->num_rows();

    }

    public function check_item_category($id_item,$id_cate,$table){
        $this->db->where("item_id", $id_item);
        $this->db->where("category_id", $id_cate);
        $this->db->from($table);
        return $this->db->get()->num_rows();
    }
     public function list_product_category($link,$lang,$limit, $offset,$table){

    $this->db->select("item.id,itemdetail.item_link,itemdetail.item_name,itemdetail.item_summary,item.item_price_sale,item.item_code,item.item_price");
    $this->db->where("categorydetail.category_link", $link);
    $this->db->where("country.name", $lang);
    $this->db->where("item.item_status", '1');
    $this->db->limit($limit, $offset);
    $this->db->from('categorydetail');
    $this->db->order_by('item.item_weight', 'DESC');
    $this->db->order_by('item.id', 'DESC');
    $this->db->group_by('item.id');
    $this->db->join($table,$table.'.category_id=categorydetail.category_id');
    $this->db->join('itemdetail', $table.'.item_id=itemdetail.item_id');
    $this->db->join('item', 'item.id=itemdetail.item_id');
    $this->db->join('country', 'itemdetail.country_id=country.id');
    return $this->db->get()->result();

}

    public function count_list_product_category($link,$lang,$table){

        $this->db->select("item.id,itemdetail.item_link,itemdetail.item_name,itemdetail.item_summary,item.item_price_sale,item.item_code,item.item_price");
        $this->db->where("categorydetail.category_link", $link);
        $this->db->where("country.name", $lang);
        $this->db->where("item.item_status", '1');
        $this->db->from('categorydetail');
        $this->db->order_by('item.item_weight', 'DESC');
        $this->db->order_by('item.id', 'DESC');
        $this->db->group_by('item.id');
        $this->db->join($table,$table.'.category_id=categorydetail.category_id');
        $this->db->join('itemdetail', $table.'.item_id=itemdetail.item_id');
        $this->db->join('item', 'item.id=itemdetail.item_id');
        $this->db->join('country', 'itemdetail.country_id=country.id');
        return $this->db->get()->num_rows();

    }


    public function list_product_category_bosuutap($lang,$limit, $offset,$table){

        $this->db->select("item.id,itemdetail.item_link,itemdetail.item_name,itemdetail.item_summary,item.item_price_sale,item.item_code,item.item_price");
        $this->db->where("country.name", $lang);
        $this->db->where("item.item_status", '1');
        $this->db->limit($limit, $offset);
        $this->db->from('item');
        $this->db->order_by('item.item_weight', 'DESC');
        $this->db->order_by('item.id', 'DESC');
        $this->db->group_by('item.id');
        $this->db->join($table,$table.'.item_id=item.id');
        $this->db->join('itemdetail', $table.'.item_id=itemdetail.item_id');
        $this->db->join('country', 'itemdetail.country_id=country.id');
        return $this->db->get()->result();

    }

    public function count_list_product_category_bosuutap($lang,$table){

        $this->db->select("item.id,itemdetail.item_link,itemdetail.item_name,itemdetail.item_summary,item.item_price_sale,item.item_code,item.item_price");
        $this->db->where("country.name", $lang);
        $this->db->where("item.item_status", '1');
        $this->db->from('item');
        $this->db->order_by('item.item_weight', 'DESC');
        $this->db->order_by('item.id', 'DESC');
        $this->db->group_by('item.id');
        $this->db->join($table,$table.'.item_id=item.id');
        $this->db->join('itemdetail', $table.'.item_id=itemdetail.item_id');
        $this->db->join('country', 'itemdetail.country_id=country.id');
        return $this->db->get()->num_rows();

    }


    function get_row($table, $where = array()) {
        $this->db->where($where);
        return $this->db->get($table)->first_row();
    }
    public function get_id_cate($id_item){
        $this->db->where("item_id", $id_item);
        $this->db->from('itemcategory');
        return $this->db->get()->row();
    }
    function show_list_item_image_first($id) {
        $this->db->select("images.id,images.date_create,images.status,images.thumb");
        $this->db->where("other_img.item_id", $id);
        $this->db->order_by('images.weight', 'DESC');
        $this->db->from('images');
        $this->db->join('other_img', 'other_img.img_id=images.id');
        $this->db->group_by('images.id');
        return $this->db->get()->first_row();
    }
    function get_sum_rate($id,$type) {
    $this->db->select_sum("rate");
    $this->db->where("item_id",$id);
    $this->db->where("type",$type);
    $this->db->from('item_rate');
    return $this->db->get()->row()->rate;
}

    function show_list_comment_page($id,$type) {
        $this->db->select("*");
        $this->db->where("item_id",$id);
        $this->db->where("type",$type);
        $this->db->where("status",1);
        $this->db->order_by('id', "DESC");
        $this->db->from('item_comment');
        return $this->db->get()->result();
    }
    function show_list_item_sp_home($where=array(),$lang) {
        $this->db->select("item.id,itemdetail.item_name,itemdetail.item_link,itemdetail.item_content,item.item_hot,itemdetail.item_summary,item.item_code,item.item_price,item.item_price_sale");
        $this->db->where($where);
        $this->db->order_by('item.item_weight', "DESC");
        $this->db->order_by('item.id', "DESC");
        $this->db->limit(6,0);
        $this->db->where('country.name', $lang);
        $this->db->group_by('item.id');
        $this->db->from('item');
        $this->db->join('itemdetail', 'itemdetail.item_id=item.id');
        $this->db->join('country', 'itemdetail.country_id=country.id');
        return $this->db->get()->result();
    }

    public function get_od_order($id){
        $this->db->where('id',$id);
        $this->db->from('od_order');
        return $this->db->get()->row();
    }
    public function id_od_order($id){
        $this->db->where('customer_id',$id);
        $this->db->from('od_order');
        return $this->db->get()->row();
    }

        function show_sp_home($id,$lang, $limit, $offset, $page = 1) {
            $array = array($id);
            $list = $this->show_list_category_child($id);
            foreach ($list as $l) {
                $array[] = $l->id;
            }
            $this->db->select("item.id,itemdetail.item_link,itemdetail.item_name,itemdetail.item_summary,item.item_price_sale,item.item_code,item.item_price");
            $this->db->where("country.name",$lang);
            $this->db->where("item.item_status", '1');
            $this->db->where("item.item_hot", '1');
            $this->db->where_in("category.id", $array);
            if ($page == 1)
                $this->db->limit($limit, $offset);
            $this->db->from('item');
            $this->db->order_by('item.item_weight', 'DESC');
            $this->db->group_by('item.id');
            $this->db->join('itemcategory', 'itemcategory.item_id=item.id');
            $this->db->join('category', 'itemcategory.category_id=category.id');
            $this->db->join('itemdetail', 'itemdetail.item_id=item.id');
            $this->db->join('country', 'itemdetail.country_id=country.id');
            if ($page == 0)
                return $this->db->get()->num_rows();
            else
                return $this->db->get()->result();

    }

    function show_sp_cate($id) {
        $array = array($id);
        $list = $this->show_list_category_child($id);
        foreach ($list as $l) {
            $array[] = $l->id;
        }
        $this->db->select("item.id,itemdetail.item_link,itemdetail.item_name,itemdetail.item_summary,item.item_price_sale,item.item_code,item.item_price");
        $this->db->where("itemdetail.country_id",1);
        $this->db->where("item.item_status", '1');
        $this->db->where("item.item_hot", '1');
        $this->db->where_in("category.id", $array);
        $this->db->limit(4, 0);
        $this->db->from('item');
        $this->db->order_by('item.item_weight', 'DESC');
        $this->db->group_by('item.id');
        $this->db->join('itemcategory', 'itemcategory.item_id=item.id');
        $this->db->join('category', 'itemcategory.category_id=category.id');
        $this->db->join('itemdetail', 'itemdetail.item_id=item.id');
        return $this->db->get()->result();

    }



    function show_sp_left() {
        $this->db->select("itemdetail.item_name,itemdetail.item_link,item.*");
        $this->db->order_by('item.item_weight', "DESC");
        $this->db->order_by('item.id', "DESC");
        $this->db->where('country.name', 'vn');
        $this->db->where('item.item_status', 1);
        $this->db->group_by('item.id');
        $this->db->limit(4, 0);
        $this->db->from('item');
        $this->db->join('itemdetail', 'item.id=itemdetail.item_id');
        $this->db->join('country', 'itemdetail.country_id=country.id');
        return $this->db->get()->result();
    }
    function show_list_order_page($limit=20,$start=0)
    {
        $this->db->select('od_order.*');
        if(isset($_GET['name'])){
            $this->db->like('name',$_GET['name']);
        }
        if(isset($_GET['email'])){
            $this->db->like('email',$_GET['email']);
        }

        if(isset($_GET['phone'])){
            $this->db->like('mobile',$_GET['phone']);
        }
        $this->db->limit($limit,$start);
        $this->db->from('od_order');
        $this->db->order_by("od_order.id","DESC");
        $this->db->join('user_customer', 'od_order.customer_id=user_customer.id');
        return $this->db->get()->result();
    }
    function show_list_order_page_count()
    {


        if(isset($_GET['name'])){
            $this->db->like('name',$_GET['name']);
        }
        if(isset($_GET['email'])){
            $this->db->like('email',$_GET['email']);
        }

        if(isset($_GET['phone'])){
            $this->db->like('mobile',$_GET['phone']);
        }
        $this->db->from('od_order');
        $this->db->order_by("od_order.id","DESC");
        $this->db->join('user_customer', 'od_order.customer_id=user_customer.id');
        return $this->db->get()->num_rows();
    }
    function show_sum_order_item_id($id)
{
    $this->db->select_sum('total');
    $this->db->where('id_order',$id);
    $this->db->from('od_order_item');
    $this->db->join('od_order','od_order_item.id_order=od_order.id');
    return $this->db->get()->row();
}
    function get_tableID($id, $table) {
        $this->db->select("*");
        $this->db->where($table . '.id', $id);
        $this->db->from($table);
        return $this->db->get()->row();
    }

    function get_table($phone) {
        $this->db->where('mobile', $phone);
        $this->db->from('user_customer');
        return $this->db->get()->row();
    }
    function show_detail_order_id($id)
    {
        $this->db->where('id',$id);
        $this->db->from('od_order');
        return $this->db->get()->row();
    }
    function get_list_tableWhere($where = array(), $table) {
        $this->db->select("*");
        $this->db->where($where);
        $this->db->from($table);
        return $this->db->get()->result();
    }
    function get_tableWhere($where = array(), $table) {
        $this->db->select("*");
        $this->db->where($where);
        $this->db->from($table);
        return $this->db->get()->row();
    }
    function show_list_item_category($id,$limit, $offset) {
        $array = array($id);
        $list = $this->show_list_category_child($id);
        foreach ($list as $l) {
            $array[] = $l->id;
        }
        $this->db->select("item.id,itemdetail.item_link,itemdetail.item_name,itemdetail.item_summary,item.item_price_sale,item.item_code,item.item_price");
        $this->db->where("itemdetail.country_id",1);
        $this->db->where("item.item_status", '1');
        $this->db->where_in("category.id", $array);
        $this->db->limit($limit, $offset);
        $this->db->from('item');
        $this->db->order_by('item.item_weight', 'DESC');
        $this->db->group_by('item.id');
        $this->db->join('itemcategory', 'itemcategory.item_id=item.id');
        $this->db->join('category', 'itemcategory.category_id=category.id');
        $this->db->join('itemdetail', 'itemdetail.item_id=item.id');
        return $this->db->get()->result();
    }


    function show_item_lq($item_id,$cate) {

        $this->db->where("item.id !=", $item_id);
        $this->db->where("item.cate", $cate);
        $this->db->where("type", 1);
        $this->db->where("status", '1');
        $this->db->order_by('item.weight', 'DESC');
        $this->db->order_by('item.id', 'DESC');
        $this->db->limit(4, 0);
        $this->db->from('item');
        return $this->db->get()->result();
    }
    function show_item_lq1($item_id) {
        $this->db->where("item.id !=", $item_id);
        $this->db->where("status", 1);
        $this->db->where("type", 1);
        $this->db->order_by('item.weight', 'DESC');
        $this->db->order_by('item.id', 'DESC');
        $this->db->limit(9, 0);
        $this->db->from('item');
        return $this->db->get()->result();
    }
    public function list_home_sp(){

        $this->db->select("item.id,itemdetail.item_link,itemdetail.item_name,itemdetail.item_summary,item.item_price_sale,item.item_code,item.item_price");
        $this->db->where("itemdetail.country_id",1);
        $this->db->where("item.item_status", '1');
        $this->db->limit(12, 0);
        $this->db->from('item');
        $this->db->order_by('item.item_weight', 'DESC');
        $this->db->group_by('item.id');
        $this->db->join('itemcategory', 'itemcategory.item_id=item.id');
        return $this->db->get()->result();
    }
    function show_list_tags($id,$limit, $offset, $page = 1)
    {

        $this->db->where("status", '1');
        $this->db->order_by('item.weight', 'DESC');
        $this->db->order_by('item.id', 'DESC');
        $this->db->where("tags_id.id_tags", $id);
        if ($page == 1)
            $this->db->limit($limit, $offset);
        $this->db->group_by('item.id');
        $this->db->from('item');
        $this->db->join('tags_id', 'tags_id.id=item.id');
        if ($page == 0)
            return $this->db->get()->num_rows();
        else
            return $this->db->get()->result();
    }


    function tas_row($link)
    {
        $this->db->where("status", '1');
        $this->db->where("link", $link);
        $this->db->from('tags');
        return $this->db->get()->row();
    }
    public function list_sp_1($type){
        $this->db->where("item.status", '1');
        $this->db->where("item.type", $type);
        $this->db->from('item');
        $this->db->order_by('item.weight', 'DESC');
        $this->db->group_by('item.id');
        return $this->db->get()->result();
    }
}        
?>