<?php
class M_images extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function list_img ($album_parent,$limit, $offset,$key){
          $this->db->select("album.id,album.date_create,imagedetail.images_name,images.thumb,album.status,album.weight");
       $this->db->order_by('images.id', "DESC");
         $this->db->order_by('images.weight', "DESC");
        $this->db->group_by('album.id');
        $this->db->where('album.album_parent',$album_parent);
         $this->db->limit($limit, $offset);
         $this->db->like('imagedetail.images_name',$key);
        $this->db->from('album');
         $this->db->join('imagealbum', 'imagealbum.album_id=album.id');
         $this->db->join('imagedetail', 'imagedetail.image_id=imagealbum.image_id');
        $this->db->join('images', 'images.id=imagedetail.image_id');
        return $this->db->get()->result();
    }
    public function list_img_home ($lang,$limit, $offset){
          $this->db->select("album.id,album.date_create,imagedetail.images_name,images.thumb,album.weight");
       $this->db->order_by('images.id', "DESC");
        $this->db->group_by('album.id');
        $this->db->where('album.status',1);
        $this->db->where('country.name',$lang);
        $this->db->limit($limit, $offset);
        $this->db->from('album');
         $this->db->join('imagealbum', 'imagealbum.album_id=album.id');
         $this->db->join('imagedetail', 'imagedetail.image_id=imagealbum.image_id');
        $this->db->join('images', 'images.id=imagedetail.image_id');
        $this->db->join('country', 'imagedetail.country_id=country.id');
        return $this->db->get()->result();
    }
         public function show_img_home ($lang){
        $this->db->select("album.id,album.date_create,imagedetail.images_name,images.thumb");
         $this->db->order_by('images.id', "DESC");
        $this->db->group_by('album.id');
        $this->db->where('country.name',$lang);
        $this->db->where('album.status',1);
        $this->db->from('album');
         $this->db->join('imagealbum', 'imagealbum.album_id=album.id');
         $this->db->join('imagedetail', 'imagedetail.image_id=imagealbum.image_id');
        $this->db->join('images', 'images.id=imagedetail.image_id');
        $this->db->join('country', 'imagedetail.country_id=country.id');
        return $this->db->get()->first_row();
    }

      public function list_img_count (){
          $this->db->select("album.id,album.date_create,imagedetail.images_name,images.thumb");
       $this->db->order_by('images.id', "DESC");
        $this->db->group_by('album.id');
        $this->db->from('album');
         $this->db->join('imagealbum', 'imagealbum.album_id=album.id');
         $this->db->join('imagedetail', 'imagedetail.image_id=imagealbum.image_id');
        $this->db->join('images', 'images.id=imagedetail.image_id');
        $this->db->join('country', 'imagedetail.country_id=country.id');
        return $this->db->get()->num_rows();
    }
       public function count_img ($album_parent){
          $this->db->select("album.id,album.date_create,imagedetail.images_name,images.thumb");
       $this->db->order_by('images.id', "DESC");
        $this->db->group_by('album.id');
           $this->db->where('album.album_parent',$album_parent);
        $this->db->from('album');
         $this->db->join('imagealbum', 'imagealbum.album_id=album.id');
         $this->db->join('imagedetail', 'imagedetail.image_id=imagealbum.image_id');
        $this->db->join('images', 'images.id=imagedetail.image_id');
        return $this->db->get()->num_rows();
    }
    public function other_img ($id){
         $this->db->select("images.id,images.thumb");
         $this->db->where('thumb_id',$id);
        $this->db->group_by('images.id');
        $this->db->from('images');
         $this->db->join('imagedetail', 'imagedetail.image_id=imagealbum.image_id');
        return $this->db->get()->result();
    }
    public function get_img($id,$album_parent,$lang){
        $this->db->select("album.id,album.date_create,imagedetail.images_name,images.thumb,album.weight,images.link");
         $this->db->where('album.id',$id);
        $this->db->where('album.album_parent',$album_parent);
         $this->db->where('imagedetail.country_id',$lang);
        $this->db->group_by('album.id');
        $this->db->from('album');
         $this->db->join('imagealbum', 'imagealbum.album_id=album.id');
         $this->db->join('imagedetail', 'imagedetail.image_id=imagealbum.image_id');
        $this->db->join('images', 'images.id=imagedetail.image_id');
        return $this->db->get()->row();
    }
    public function list_img_lv ($lang){
        $this->db->select("album.id,album.date_create,imagedetail.images_name,images.thumb,album.weight,images.link");
        $this->db->order_by('images.id', "DESC");
        $this->db->group_by('album.id');
        $this->db->where('album.status',1);
        $this->db->where('country.name',$lang);

        $this->db->from('album');
        $this->db->join('imagealbum', 'imagealbum.album_id=album.id');
        $this->db->join('imagedetail', 'imagedetail.image_id=imagealbum.image_id');
        $this->db->join('images', 'images.id=imagedetail.image_id');
        $this->db->join('country', 'imagedetail.country_id=country.id');
        return $this->db->get()->result();
    }
      public function get_img_album($id){
        $this->db->select("images.thumb");
         $this->db->where('id',$id);
        $this->db->group_by('images.id');
        $this->db->from('images');

        return $this->db->get()->row();
    }
    public function get_id_img($id){
        $this->db->select("images.thumb,images.id");
        $this->db->where('img_album.album_id',$id);
        $this->db->from('img_album');
        $this->db->join('images', 'images.id=img_album.img_id');
         return $this->db->get()->result();
    }
     public function get_id_img_daidien($id){
        $this->db->select("images.thumb,images.id");
        $this->db->where('imagealbum.album_id',$id);
        $this->db->from('imagealbum');
        $this->db->join('images', 'images.id=imagealbum.image_id');
         return $this->db->get()->row();
    }
      public function get_img_delete($id){
        $this->db->select("album.id,album.date_create,imagedetail.images_name,images.thumb");
         $this->db->where('album.id',$id);
        $this->db->group_by('album.id');
        $this->db->from('album');
         $this->db->join('imagealbum', 'imagealbum.album_id=album.id');
         $this->db->join('imagedetail', 'imagedetail.image_id=imagealbum.image_id');
        $this->db->join('images', 'images.id=imagedetail.image_id');
        return $this->db->get()->row();
    }
     function show_list_item_image($id) {
        $this->db->select("images.id,images.date_create,images.status,images.thumb");
        $this->db->where("img_album.album_id", $id);
        $this->db->order_by('images.weight', 'DESC');
        $this->db->from('images');
        $this->db->join('img_album', 'img_album.img_id=images.id');
        $this->db->group_by('images.id');
        return $this->db->get()->result();
    }
     function show_list_item_image_id($id) {
        $this->db->select("images.id,images.date_create,images.status,images.thumb");
        $this->db->where("images.id", $id);
        $this->db->from('images');
        return $this->db->get()->row();
    }
      function count_image_album($id) {
        $this->db->where("img_album.album_id", $id);
        $this->db->from('img_album');
        return $this->db->get()->num_rows();
    }
     function delete_img_album($id) {
        $this->db->where('album_id', $id);
        $this->db->from('imagealbum');
        return $this->db->get()->row();
    }
    public function get_img_album_dellete($id){
        $this->db->select("album.id,album.date_create,imagedetail.images_name,images.thumb,images.id as img_id_album");
         $this->db->where('album.id',$id);
        $this->db->group_by('album.id');
        $this->db->from('album');
         $this->db->join('imagealbum', 'imagealbum.album_id=album.id');
         $this->db->join('imagedetail', 'imagedetail.image_id=imagealbum.image_id');
        $this->db->join('images', 'images.id=imagedetail.image_id');
        return $this->db->get()->row();
    }
    public function get_img_link($album_parent,$lang){
        $this->db->select("album.id,album.date_create,imagedetail.images_name,images.thumb,album.weight,images.link");
        $this->db->where('imagedetail.country_id',$lang);

        $this->db->group_by('album.id');
        $this->db->from('album');
        $this->db->join('imagealbum', 'imagealbum.album_id=album.id');
        $this->db->join('imagedetail', 'imagedetail.image_id=imagealbum.image_id');
        $this->db->join('images', 'images.id=imagedetail.image_id');
        return $this->db->get()->row();
    }



    public function count_show_list_img($type,$key){
        $this->db->select("video_library.*,video_library_detail.*");
        $this->db->where('type',$type);
        $this->db->like('video_library_detail.name',$key);
        $this->db->from('video_library');
        $this->db->join('video_library_detail', 'video_library_detail.id_video_library = video_library.id');
        return $this->db->get()->num_rows();
    }

    public function show_list_img($type,$limit ,$offset,$key){
    $this->db->select("video_library.*,video_library_detail.*");
    $this->db->where('video_library.type',$type);
        $this->db->order_by('video_library.weight', "DESC");
        $this->db->order_by('video_library.id', "DESC");
    $this->db->group_by('video_library.id');
    $this->db->limit($limit, $offset);
    $this->db->like('video_library_detail.name',$key);
    $this->db->from('video_library');
    $this->db->join('video_library_detail', 'video_library_detail.id_video_library = video_library.id');
    return $this->db->get()->result();
}

    public function show_video_library($id){
        $this->db->select("video_library.*,video_library_detail.*");
        $this->db->where('video_library.id',$id);
        $this->db->group_by('video_library.id');
        $this->db->from('video_library');
        $this->db->join('video_library_detail', 'video_library_detail.id_video_library = video_library.id');

        return $this->db->get()->row();
    }
    public function check_name($where = array()){
        $this->db->select("video_library.*,video_library_detail.*");
        $this->db->where($where);
        $this->db->group_by('video_library.id');
        $this->db->from('video_library');
        $this->db->join('video_library_detail', 'video_library_detail.id_video_library = video_library.id');
        return $this->db->get()->row();
    }
    public function check_name_edit($where = array()){
        $this->db->select("video_library.*,video_library_detail.*");
        $this->db->where($where);
        $this->db->group_by('video_library.id');
        $this->db->from('video_library');
        $this->db->join('video_library_detail', 'video_library_detail.id_video_library = video_library.id');
        $this->db->join('country', 'video_library_detail.country_id=country.id');
        return $this->db->get()->row();
    }
    public function list_img_orther($where = array()){
        $this->db->select('img_video_library.id as id_img,img_video_library.thumb_orther,video_library.id');
        $this->db->where($where);
        $this->db->order_by('video_library.weight', "DESC");
        $this->db->order_by('video_library.id', "DESC");
        $this->db->from('video_library');
        $this->db->join('img_video_library', 'img_video_library.id_video_library = video_library.id');
        return $this->db->get()->result();
    }
    public function get_img_orther($where = array()){
        $this->db->select('img_video_library.id as id_img,img_video_library.thumb_orther,video_library.id');
        $this->db->where($where);
        $this->db->from('video_library');
        $this->db->join('img_video_library','img_video_library.id_video_library = video_library.id');
        return $this->db->get()->row();

    }
    public function count_show_list_img_home_thuvien($where=array()){
        $a = array(2,3);
        $this->db->select("video_library.*,video_library_detail.*");
        $this->db->where_in('type',$a);
        $this->db->where($where);
        $this->db->from('video_library');
        $this->db->join('video_library_detail', 'video_library_detail.id_video_library = video_library.id');
        $this->db->join('country', 'video_library_detail.country_id=country.id');
        return $this->db->get()->num_rows();
    }

    public function show_list_img_home_thuvien($where=array(),$limit ,$offset){
        $a = array(2,3);
        $this->db->select("video_library.*,video_library_detail.*");
        $this->db->where_in('type',$a);
        $this->db->where($where);
        $this->db->order_by('video_library.weight', "DESC");
        $this->db->order_by('video_library.id', "DESC");
        $this->db->group_by('video_library.id');
        $this->db->limit($limit, $offset);
        $this->db->from('video_library');
        $this->db->join('video_library_detail', 'video_library_detail.id_video_library = video_library.id');
        $this->db->join('country', 'video_library_detail.country_id=country.id');
        return $this->db->get()->result();
    }
    public function get_img_link_nn($where = array()){
        $this->db->select("video_library.*,video_library_detail.*");
        $this->db->where($where);
        $this->db->order_by('video_library.weight', "DESC");
        $this->db->order_by('video_library.id', "DESC");
        $this->db->from('video_library');
        $this->db->join('video_library_detail', 'video_library_detail.id_video_library = video_library.id');
        $this->db->join('country', 'video_library_detail.country_id=country.id');
        return $this->db->get()->row();

    }
    public function get_img_orther_list($where = array()){
        $this->db->select('img_video_library.id as id_img,img_video_library.thumb_orther,video_library.id');
        $this->db->where($where);
        $this->db->order_by('video_library.weight', "DESC");
        $this->db->order_by('video_library.id', "DESC");
        $this->db->from('video_library');
        $this->db->join('img_video_library','img_video_library.id_video_library = video_library.id');
        return $this->db->get()->result();

    }
    public function img_lienquan($where = array()){
        $this->db->select("video_library.*,video_library_detail.*");
        $this->db->where($where);
        $this->db->order_by('video_library.weight', "DESC");
        $this->db->order_by('video_library.id', "DESC");
        $this->db->from('video_library');
        $this->db->join('video_library_detail', 'video_library_detail.id_video_library = video_library.id');
        $this->db->join('country', 'video_library_detail.country_id=country.id');
        return $this->db->get()->result();
    }

    public function count_show_list_img_home($type,$where=array()){
        $this->db->select("video_library.*,video_library_detail.*");
        $this->db->where('type',$type);
        $this->db->where($where);
        $this->db->order_by('video_library.weight', "DESC");
        $this->db->order_by('video_library.id', "DESC");
        $this->db->from('video_library');
        $this->db->join('video_library_detail', 'video_library_detail.id_video_library = video_library.id');
        $this->db->join('country', 'video_library_detail.country_id=country.id');
        return $this->db->get()->num_rows();
    }

    public function show_list_img_home($type,$where=array(),$limit ,$offset){
        $this->db->select("video_library.*,video_library_detail.*");
        $this->db->where('type',$type);
        $this->db->where($where);
        $this->db->order_by('video_library.weight', "DESC");
        $this->db->order_by('video_library.id', "DESC");
        $this->db->group_by('video_library.id');
        $this->db->limit($limit, $offset);
        $this->db->from('video_library');
        $this->db->join('video_library_detail', 'video_library_detail.id_video_library = video_library.id');
        $this->db->join('country', 'video_library_detail.country_id=country.id');
        return $this->db->get()->result();
    }
    public function show_list_img_home_hot($where=array(),$limit ,$offset){
        $this->db->select("video_library.*,video_library_detail.*");
        $a = array(1,2,3);
        $this->db->where($where);
        $this->db->where_in('type',$a);
        $this->db->order_by('video_library.weight', "DESC");
        $this->db->order_by('video_library.id', "DESC");
        $this->db->group_by('video_library.id');
        $this->db->limit($limit, $offset);
        $this->db->from('video_library');
        $this->db->join('video_library_detail', 'video_library_detail.id_video_library = video_library.id');
        $this->db->join('country', 'video_library_detail.country_id=country.id');
        return $this->db->get()->result();
    }
    public function show_list_video_home_hot($where=array(),$limit ,$offset){
        $this->db->select("video_library.*,video_library_detail.*");
      
        $this->db->where($where);
        $this->db->where('type',2);
        $this->db->order_by('video_library.weight', "DESC");
        $this->db->order_by('video_library.id', "DESC");
        $this->db->group_by('video_library.id');
        $this->db->limit($limit, $offset);
        $this->db->from('video_library');
        $this->db->join('video_library_detail', 'video_library_detail.id_video_library = video_library.id');
        $this->db->join('country', 'video_library_detail.country_id=country.id');
        return $this->db->get()->result();
    }
    public function show_first_video_home_hot($where=array()){
        $this->db->select("video_library.*,video_library_detail.*");
        $this->db->where($where);
        $this->db->order_by('video_library.weight', "DESC");
        $this->db->order_by('video_library.id', "DESC");
        $this->db->group_by('video_library.id');
        $this->db->from('video_library');
        $this->db->join('video_library_detail', 'video_library_detail.id_video_library = video_library.id');
        $this->db->join('country', 'video_library_detail.country_id=country.id');
        return $this->db->get()->first_row();
    }
    public function show_list_tk($type,$where=array()){
        $this->db->select("video_library.*,video_library_detail.*");
        $this->db->where('type',$type);
        $this->db->where($where);
        $this->db->order_by('video_library.weight', "DESC");
        $this->db->order_by('video_library.id', "DESC");
        $this->db->group_by('video_library.id');
        $this->db->from('video_library');
        $this->db->join('video_library_detail', 'video_library_detail.id_video_library = video_library.id');
        $this->db->join('country', 'video_library_detail.country_id=country.id');
        return $this->db->get()->result();
    }

}
?>