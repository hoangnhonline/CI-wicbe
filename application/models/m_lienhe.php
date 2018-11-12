<?php
class M_lienhe extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function dslienhe($limit, $offset,$type,$key,$email,$phone){
         $this->db->limit($limit, $offset);
          $this->db->where('type',$type);
          $this->db->like('name',$key);
          $this->db->like('email',$email);
           $this->db->like('phone',$phone);
         $this->db->order_by('id','DESC');
         $query = $this->db->get('contact');
         return $query->result();
    }
    public function dslienhe1($limit, $offset,$type){
        $this->db->limit($limit, $offset);
        $this->db->where('type',$type);
        $this->db->order_by('id','DESC');
        $query = $this->db->get('contact');
        return $query->result();
    }
    public function get_id($id){
        $this->db->where('id',$id);
        $query = $this->db->get('contact');
        return $query->row();
        
    }
    public function count($type,$key,$email,$phone){
        $this->db->where('type',$type);
         $this->db->like('name',$key);
          $this->db->like('email',$email);
           $this->db->like('phone',$phone);
         $query = $this->db->get('contact');
          return $query->num_rows();
    }
    public function count1($type){
        $this->db->where('type',$type);
        $query = $this->db->get('contact');
        return $query->num_rows();
    }
     function timkiem($limit, $offset,$key,$lang) {
         $type =array(3,4);
        $this->db->select("article.id,articledetail.article_name,articledetail.article_link,articledetail.article_content,article.article_type,articledetail.article_summary");
         $this->db->order_by('article.id', "DESC");
        $this->db->order_by('article.article_weight', "DESC");
        $this->db->where('country.name',$lang);
         $this->db->where_in('article.article_type',$type);
         $this->db->where('article.article_status', 1);
        $this->db->group_by('article.id');
        $this->db->limit($limit, $offset);
        $this->db->like('articledetail.article_name',$key);
        $this->db->from('article');
        $this->db->join('articledetail', 'articledetail.article_id=article.id');
         $this->db->join('country', 'articledetail.country_id=country.id');
        return $this->db->get()->result();
    }

    function count_timkiem($key,$lang) {
        $type =array(3,4);
        $this->db->group_by('article.id');
        $this->db->where_in('article.article_type',$type);
        $this->db->like('articledetail.article_name',$key);
        $this->db->where('country.name', $lang);
        $this->db->where('article.article_status', 1);
        $this->db->from('article');
        $this->db->join('articledetail', 'articledetail.article_id=article.id');
        $this->db->join('country', 'articledetail.country_id=country.id');
        return $this->db->get()->num_rows();
    }
    function count_where($params)
    {
        if(isset($params["where"]))
            $this->db->where($params["where"]);
        if(isset($params["or_where"]))
            foreach($params["or_where"] as $or_where)
                $this->db->or_where($or_where);
        if(isset($params["like"]))
            $this->db->like($params["like"]);
        if(isset($params["f_order"]))
        {
            if(!isset($params["direction"]))
                $params["direction"] = "asc";
            $this->db->order_by($params["f_order"],$params["direction"]);
        }
        if(isset($params["distinct"]))
            $this->db->distinct();
        if(isset($params["limit"]))
            $this->db->limit($params["limit"],$params["offset"]);
        return $this->db->get($params["name_table"])->num_rows();
    }
    function show_list_comment_page($limit, $offset,$type) {
        $this->db->select("*");
        $this->db->order_by('id', "DESC");
        $this->db->limit($limit, $offset);
        $this->db->where('type',$type);
        $this->db->from('item_comment');
        return $this->db->get()->result();
    }

    function show_list_comment_page_count($where = array()) {
        $this->db->select("*");
        $this->db->order_by('id', "DESC");
        $this->db->where($where);
        $this->db->from('item_comment');
        return $this->db->get()->num_rows();
    }

    public function list_hethong(){
        $this->db->select("hethong_detail.*,hethong.*");
        $this->db->order_by('hethong.weight', "DESC");
        $this->db->order_by('hethong.id', "DESC");
        $this->db->where('country.name','vn');
        $this->db->from('hethong');
        $this->db->join('hethong_detail', 'hethong_detail.id_hethong=hethong.id');
        $this->db->join('country', 'country.id=hethong_detail.country_id');
        return $this->db->get()->result();

    }
    public function get_ht($id){
        $this->db->where('id',$id);
        $this->db->from('hethong');
        $this->db->join('hethong_detail', 'hethong_detail.id_hethong=hethong.id');
        return $this->db->get()->row();
    }


    public function edit_hethong($where =array()){
        $this->db->select("hethong_detail.*,hethong.*");
        $this->db->order_by('hethong.weight', "DESC");
        $this->db->where($where);
        $this->db->order_by('hethong.id', "DESC");
        $this->db->from('hethong');
        $this->db->join('hethong_detail', 'hethong_detail.id_hethong=hethong.id');
        $this->db->join('country', 'country.id=hethong_detail.country_id');
        return $this->db->get()->row();

    }
    public function list_hethong_home($where =array()){
        $this->db->select("hethong_detail.*,hethong.*");
        $this->db->order_by('hethong.weight', "DESC");
        $this->db->order_by('hethong.id', "DESC");
        $this->db->where($where);
        $this->db->where('country.name','vn');
        $this->db->from('hethong');
        $this->db->join('hethong_detail', 'hethong_detail.id_hethong=hethong.id');
        $this->db->join('country', 'country.id=hethong_detail.country_id');
        return $this->db->get()->result();

    }

    public function search_item($lang,$key,$limit,$offset){
        $this->db->select("item.id,item.date_create,item.item_status,itemdetail.item_name,item.item_hot,item.item_weight,item.item_code,item.item_price_sale,item.item_price,itemdetail.item_link,item.file");
        $this->db->order_by('item.item_weight', "DESC");
        $this->db->where('country.name', $lang);
        $this->db->group_by('item.id');
        $this->db->like('itemdetail.item_name',$key);
        $this->db->limit($limit, $offset);
        $this->db->from('item');
        $this->db->join('itemdetail', 'itemdetail.item_id=item.id');
        $this->db->join('country', 'country.id=itemdetail.country_id');
        return $this->db->get()->result();
    }
    public function coult_search_item($lang,$key){
        $this->db->select("item.id,item.date_create,item.item_status,itemdetail.item_name,item.item_hot,item.item_weight");
        $this->db->order_by('item.item_weight', "DESC");
        $this->db->where('country.name', $lang);
        $this->db->group_by('item.id');
        $this->db->like('itemdetail.item_name',$key);
        $this->db->from('item');
        $this->db->join('itemdetail', 'itemdetail.item_id=item.id');
        $this->db->join('country', 'country.id=itemdetail.country_id');
        return $this->db->get()->num_rows();
    }
    public function list_support($where=array()){

        $this->db->where($where);
        $this->db->from('yahoo');
        $this->db->order_by('id', "DESC");
        return $this->db->get()->result();
    }
    public function get_yahoo($id){
        $this->db->where("id", $id);
        $this->db->from('yahoo');
        return $this->db->get()->row();
    }
}

?>