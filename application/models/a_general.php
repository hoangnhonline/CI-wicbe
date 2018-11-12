<?php

class a_general extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    //=============== show company=====================
    function show_company($lang = "vn") {
        $this->db->select('companydetail.*,company.*');
        $this->db->where("country.name", $lang);
        $this->db->from('company');
        $this->db->join('companydetail', 'companydetail.id_company=company.id');
        $this->db->join('country', 'companydetail.id_country=country.id');
        return $this->db->get()->row();
    }

    // show list images album (banner)
    function show_list_image_album($album, $lang = 'vn') {
        $this->db->select("imagedetail.images_name,imagedetail.images_link,images.thumb,imagedetail.images_summary");
        $this->db->where("imagealbum.album_id", $album);
        $this->db->where("images.status", 1);
        $this->db->where("country.name", $lang);
        $this->db->group_by('images.id');
        $this->db->order_by('images.weight', 'DESC');
        $this->db->from('images');
        $this->db->join('imagealbum', 'imagealbum.image_id=images.id');
        $this->db->join('imagedetail', 'images.id=imagedetail.image_id');
        $this->db->join('country', 'imagedetail.country_id=country.id');
        return $this->db->get()->result();
    }

    // show list images album (banner) where
    function show_list_image_album_where($where = array(), $lang = "vn") {
        $this->db->select("imagedetail.images_name,imagedetail.images_link,imagedetail.images_summary,images.id,images.name");
        $this->db->where($where);
        $this->db->where("images.status", 1);
        $this->db->where("country.name", $lang);
        $this->db->group_by('images.id');
        $this->db->order_by('images.weight', 'DESC');
        $this->db->from('images');
        $this->db->join('imagealbum', 'imagealbum.image_id=images.id');
        $this->db->join('imagedetail', 'images.id=imagedetail.image_id');
        $this->db->join('country', 'imagedetail.country_id=country.id');
        return $this->db->get()->result();
    }

    // get only one images
    function show_list_image_album_first_row($album, $lang = 'vn') {
        $this->db->select("imagedetail.images_name,imagedetail.images_link,images.thumb,imagedetail.images_summary");
        $this->db->where("imagealbum.album_id", $album);
        $this->db->where("images.status", 1);
        $this->db->where("country.name", $lang);
        $this->db->group_by('images.id');
        $this->db->order_by('images.id', 'RANDOM');
        $this->db->from('images');
        $this->db->join('imagealbum', 'imagealbum.image_id=images.id');
        $this->db->join('imagedetail', 'images.id=imagedetail.image_id');
        $this->db->join('country', 'imagedetail.country_id=country.id');
        return $this->db->get()->first_row();
    }

    // show detail images id
    function show_detail_images_id($id) {
        $this->db->select("images.name,imagedetail.images_name,imagedetail.images_link,images.thumb,imagedetail.images_summary");
        $this->db->where("images.id", $id);
        $this->db->from('images');
        $this->db->join('imagedetail', 'images.id=imagedetail.image_id');
        return $this->db->get()->row();
    }

    // show images large with thumn id
    function show_detail_thumb_id($id) {
        $this->db->select("images.thumb");
        $this->db->where("images.thumb_id", $id);
        $this->db->from('images');
        return $this->db->get()->row();
    }

    //=========
    function get_row($table, $where = array()) {
        $this->db->where($where);
        return $this->db->get($table)->first_row();
    }

    //====================================================
    function get_row_no_where($table) {
        //$this->db->where($where);
        return $this->db->get($table)->first_row();
    }

    //============================================================================
    function count_get_row($table, $where = array()) {
        $this->db->where($where);
        return $this->db->get($table)->num_rows();
    }

    //====================================

    function show_list_image_album_first($album) {
        $this->db->select("images.name,images.title,images.link,images.id");
        $this->db->where("imagealbum.id_album", $album);
        $this->db->from('images');
        $this->db->order_by('imagealbum.id_album', "DESC");
        $this->db->join('imagealbum', 'imagealbum.id_image=images.id');
        return $this->db->get()->row();
    }

    function show_list_image_album_page($album, $limit, $offset) {
        $this->db->select("images.name,images.title,images.link");
        $this->db->where("imagealbum.id_album", $album);
        $this->db->from('images');
        $this->db->limit($limit, $offset);
        $this->db->join('imagealbum', 'imagealbum.id_image=images.id');
        return $this->db->get()->result();
    }

    //====================================
    function count_access_id($session) {
        $this->db->select();
        $this->db->where("session_id", $session);
        $this->db->from('counter');
        return $this->db->get()->num_rows();
    }

//====================================
    function count_access_date($date) {
        $this->db->select();
        $this->db->where("date", $date);
        $this->db->from('counter');
        return $this->db->get()->num_rows();
    }

    //====================================
    function count_access() {
        $this->db->select();
        $this->db->from('counter');
        return $this->db->get()->num_rows();
    }

    /*
     * 
     * */

    //=====================================
    function captcha() {
        @$this->load->library('session');
        $md5_hash = md5(rand(0, 999));
        $security_code = substr($md5_hash, 15, 5);
        $_SESSION["security_code"] = $security_code;
        $this->session->set_userdata('captcha', $security_code);
        $width = 70;
        $height = 28;
        $image = ImageCreate($width, $height);
        $white = ImageColorAllocate($image, 0, 0, 0);
        $black = ImageColorAllocate($image, 255, 255, 255);
        ImageFill($image, 0, 0, $black);
        ImageString($image, 15, 14, 2, $security_code, $white);
        header("Content-Type: image/jpeg");
        ImageJpeg($image);
        return ImageDestroy($image);
    }

    // color id
    function get_colorID($id) {
        $this->db->select("*");
        $this->db->where('color.id', $id);
        $this->db->from('color');
        return $this->db->get()->row();
    }

    function show_list_item_image($id) {
        $this->db->select('images.name,images.id');
        $this->db->where("other_img.id_item", $id);
        $this->db->from('images');
        $this->db->join('other_img', 'other_img.id_img=images.id');
        return $this->db->get()->result();
    }

    //================= Link website  ====================
    function show_list_link_website($where = array()) {
        $this->db->select("*");
        $this->db->where($where);
        $this->db->order_by('weight', "DESC");
        $this->db->from('link_website');
        return $this->db->get()->result();
    }

    function show_list_contact($where = array()) {
        $this->db->select("*");
        $this->db->where($where);
        $this->db->order_by('id', "DESC");
        $this->db->from('contact');
        return $this->db->get()->result();
    }
    function show_list_comment($id,$type) {
        $this->db->select("*");
        $this->db->where("status",1);
        $this->db->where("item_id",$id);
        $this->db->where("type",$type);
        $this->db->order_by('id', "DESC");
        $this->db->from('item_comment');
        return $this->db->get()->result();
    }

    //============================================================================
    function count_page($table, $where = array()) {
        if (count($where) > 0)
            $this->db->where($where);
        return $this->db->get($table)->num_rows();
        $this->db->close();
    }

    //================= show_list_table  ====================
    function show_list_table($where = array(), $limit, $offset, $table, $page = 0) {
        $this->db->select("*");
        $this->db->where($where);
        $this->db->order_by('weight', "DESC");
        if ($page != 0)
            $this->db->limit($limit, $offset);
        $this->db->from($table);
        return $this->db->get()->result();
    }
    // show list code-sale
    function get_list_code_sale($user_id) {
        $this->db->select("*");
        $this->db->where("user_id",$user_id);
        $this->db->order_by('id', "DESC");
        $this->db->from('code_sale');
        return $this->db->get()->result();
    }
    function get_sum_rate($id,$type) {
        $this->db->select_sum("rate");
        $this->db->where("item_id",$id);
        $this->db->where("type",$type);
        $this->db->from('item_rate');
        return $this->db->get()->row()->rate;
    }

    

}
