<?php

class general extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    //===================country table========================
    function show_list_lang() {
        $this->db->where("status",1);
        return $this->db->get('country')->result();
    }

    function get_max($table, $var) {
        $this->db->select_max($var);
        $this->db->from($table);
        return $this->db->get()->row()->$var;
    }

    // get max  id
    //===========================================
    function paging($page, $total, $url, $id = 1) {

        $previous_btn = true;
        $next_btn = true;
        $first_btn = true;
        $last_btn = true;
        //kiem tra


        $count = $total;
        $tongtrang = ceil($total / $page);
        $num = "";

        if ($count != 0) {
            if ($id >= 7) {
                $start_loop = $id - 4;
                if ($tongtrang > $id + 4)
                    $end_loop = $id + 4;
                else if ($id <= $tongtrang && $id > $tongtrang - 6) {
                    $start_loop = $tongtrang - 6;
                    $end_loop = $tongtrang;
                } else {
                    $end_loop = $tongtrang;
                }
            } else {
                $start_loop = 1;
                if ($tongtrang > 7)
                    $end_loop = 7;
                else
                    $end_loop = $tongtrang;
            }
        }


        // FOR ENABLING THE FIRST BUTTON
        if ($first_btn && $id > 1) {
            $dau = "<li  class=''><a href='" . site_url($url) . "'>Đầu</a></li>";
        } else if ($first_btn) {
            $dau = "<li  class='text'>Đầu</li>";
        }

        // FOR ENABLING THE PREVIOUS BUTTON
        if ($previous_btn && $id > 1) {
            $tam = $id - 1;
            $lui = "<li class=''><a href='" . site_url($url . $tam) . "'>Lùi</a></li>";
        } else if ($previous_btn) {
            $lui = "<li class='text'>Lùi</li>";
        }


        if ($next_btn && $id < $tongtrang) {
            $tam2 = $id + 1;
            $toi = "<li class=''><a href='" . site_url($url . $tam2) . "'> Tới </a></li>";
        } else if ($next_btn) {
            $toi = "<li class='text'>Tới</li>";
        }

        // TO ENABLE THE END BUTTON
        if ($last_btn && $id < $tongtrang) {
            $cuoi = "<li  class=''><a href='" . site_url($url . $tongtrang) . "'> Cuối </a></li>";
        } else if ($last_btn) {
            $cuoi = "<li class='text'>Cuối</li>";
        }
        if ($count > 0) {
            for ($i = $start_loop; $i <= $end_loop; $i++) {
                if ($i == $id)
                    $num.="<li class='page'><a href='#' title='' onclick='return false'>$i</a></li>";
                else
                    $num.="<li><a href='" . site_url($url . $i) . "' title=''>$i</a></li>";
            }
        }
        if ($count > 0 && $tongtrang > 1)
            $link = "
		<ul class='pagination'>
            
			" . $dau . $lui . $num . $toi . $cuoi . "
			
		</ul>
			";
        else
            $link = '';

        return $link;
    }

//====================================
    function show_company($lang = "vn") {
        $this->db->select('companydetail.*,company.*');
        $this->db->where("country.name", $lang);
        $this->db->from('company');
        $this->db->join('companydetail', 'companydetail.id_company=company.id');
        $this->db->join('country', 'companydetail.id_country=country.id');
        return $this->db->get()->row();
    }

    //====================================
    function catalog() {
        $this->db->select("*");
        $this->db->from('file_catalog');
        return $this->db->get()->row();
    }

    //====================================
    function admin_detail($id) {
        $this->db->select("*");
        $this->db->where("user_id", $id);
        $this->db->from('tbl_user');
        return $this->db->get()->row();
    }

    //====================================
    function show_list_image($id) {
        $this->db->select("*");
        $this->db->where("id_image", $id);
        $this->db->from('med_image_album');
        return $this->db->get()->row();
    }

    //====================================
    function show_list_slide($id) {
        $this->db->select("*");
        $this->db->where("id_album", $id);
        $this->db->from('med_image_album');
        return $this->db->get()->row();
    }

    //====================================
    function show_list_category($lang = 'vn') {
        $this->db->select("categorydetail.name,category.id");
        $this->db->where("country.name", $lang);
        $this->db->where("category.status", 1);
        $this->db->order_by('category.weight', "ASC");
        $this->db->from('category');
        $this->db->join('categorydetail', 'categorydetail.category_id=category.id');
        $this->db->join('country', 'categorydetail.id_country=country.id');
        return $this->db->get()->result();
    }

    //====================================
    function show_list_manufacturer($lang = 'vn') {
        $this->db->select("manufacturerdetail.name,manufacturer.id");
        $this->db->where("country.name", $lang);
        $this->db->where("manufacturer.status", 1);
        $this->db->order_by('manufacturer.weight', "ASC");
        $this->db->from('manufacturer');
        $this->db->join('manufacturerdetail', 'manufacturerdetail.id_manufacturer=manufacturer.id');
        $this->db->join('country', 'manufacturerdetail.id_country=country.id');
        return $this->db->get()->result();
    }

    //====================================
    function show_list_origin() {
        $this->db->where("status", 1);
        $this->db->order_by('name', "ASC");
        return $this->db->get("origin")->result();
    }

    //====================================
    function show_list_contact_new() {
        $this->db->where("status", 0);
        $this->db->limit(5);
        $this->db->order_by('date_reseive', "ASC");
        return $this->db->get("contact")->result();
    }

    //====================================
    function show_list_contact_no($id) {
        $this->db->where("id <>", $id);
        $this->db->limit(10);
        $this->db->order_by('date_reseive', "DESC");
        return $this->db->get("contact")->result();
    }

    //====================================
    function show_list_contact_page($type, $limit, $offset) {
        $this->db->select("*");
        $this->db->order_by('date_reseive', "DESC");
        if ($type == 0) {
            $this->db->where('id_product', $type);
        } else {
            $this->db->where('id_product !=', $type);
        }
        $this->db->limit($limit, $offset);
        $this->db->from('contact');
        return $this->db->get()->result();
    }
    function show_list_installment_page($limit, $offset) {
        $this->db->select("*");
        $this->db->order_by('date_reseive', "DESC");

        $this->db->limit($limit, $offset);
        $this->db->from('installment');
        return $this->db->get()->result();
    }
    function show_list_comment_page($limit, $offset) {
        $this->db->select("*");
        $this->db->order_by('id', "DESC");
        $this->db->limit($limit, $offset);
        $this->db->from('item_comment');
        return $this->db->get()->result();
    }
    //====================================
    function show_list_promotion($lang = 'vn') {
        $this->db->select("country.unit,article.view,articledetail.summary,articledetail.name_link,articledetail.description,articledetail.name,article.id,article.date_create,article.date_modify,article.status,articleterm.id_term,images.thumb,articleimages.id_image,images.name as name_img");
        $this->db->where("country.name", $lang);
        $this->db->where("articleterm.id_term", 5);
        $this->db->where("article.status", 1);
        $this->db->order_by('article.weight', "ASC");
        $this->db->from('article');
        $this->db->join('articledetail', 'articledetail.id_article=article.id');
        $this->db->join('articleterm', 'articleterm.id_article=article.id');
        $this->db->join('articleimages', 'articleimages.id_article=article.id');
        $this->db->join('images', 'articleimages.id_image=images.id');
        $this->db->join('country', 'articledetail.id_country=country.id');
        return $this->db->get()->result();
    }

//====================================
    function show_list_intro($lang = 'vn') {
        $this->db->select("country.unit,article.view,articledetail.summary,articledetail.name_link,articledetail.description,articledetail.name,article.id,article.date_create,article.date_modify,article.status,articleterm.id_term,images.thumb,articleimages.id_image,images.name as name_img");
        $this->db->where("country.name", $lang);
        $this->db->where("articleterm.id_term", 2);
        $this->db->where("article.status", 1);
        $this->db->order_by('article.weight', "ASC");
        $this->db->from('article');
        $this->db->join('articledetail', 'articledetail.id_article=article.id');
        $this->db->join('articleterm', 'articleterm.id_article=article.id');
        $this->db->join('articleimages', 'articleimages.id_article=article.id');
        $this->db->join('images', 'articleimages.id_image=images.id');
        $this->db->join('country', 'articledetail.id_country=country.id');
        return $this->db->get()->result();
    }

//====================================
    function show_list_kythuat($lang = 'vn') {
        $this->db->select("country.unit,article.view,articledetail.summary,articledetail.name_link,articledetail.description,articledetail.name,article.id,article.date_create,article.date_modify,article.status,articleterm.id_term,images.thumb,articleimages.id_image,images.name as name_img");
        $this->db->where("country.name", $lang);
        $this->db->where("articleterm.id_term", 3);
        $this->db->where("article.status", 1);
        $this->db->order_by('article.weight', "ASC");
        $this->db->from('article');
        $this->db->join('articledetail', 'articledetail.id_article=article.id');
        $this->db->join('articleterm', 'articleterm.id_article=article.id');
        $this->db->join('articleimages', 'articleimages.id_article=article.id');
        $this->db->join('images', 'articleimages.id_image=images.id');
        $this->db->join('country', 'articledetail.id_country=country.id');
        return $this->db->get()->result();
    }

//====================================
    function show_list_sale($lang = 'vn') {
        $this->db->select("country.unit,article.view,articledetail.summary,articledetail.name_link,articledetail.description,articledetail.name,article.id,article.date_create,article.date_modify,article.status,articleterm.id_term,images.thumb,articleimages.id_image,images.name as name_img");
        $this->db->where("country.name", $lang);
        $this->db->where("articleterm.id_term", 4);
        $this->db->where("article.status", 1);
        $this->db->order_by('article.weight', "ASC");
        $this->db->from('article');
        $this->db->join('articledetail', 'articledetail.id_article=article.id');
        $this->db->join('articleterm', 'articleterm.id_article=article.id');
        $this->db->join('articleimages', 'articleimages.id_article=article.id');
        $this->db->join('images', 'articleimages.id_image=images.id');
        $this->db->join('country', 'articledetail.id_country=country.id');
        return $this->db->get()->result();
    }

    //=====================================
    function captcha() {
        //@$this->load->library('session');
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

    //=====================================
    function show_list_question_page($limit, $offset) {
        $this->db->select("*");
        $this->db->where("question", '1');
        $this->db->order_by('created_date', "DESC");
        $this->db->limit($limit, $offset);
        $this->db->from('question');
        return $this->db->get()->result();
    }

    /**
      table Size ,Color, Shape
      get list return array;
      get ID return row
     */
//=================  ====================
    function show_list_table_first($where = array(), $limit, $offset, $table, $page = 0) {
        $this->db->select("*");
        $this->db->where($where);
        $this->db->order_by('weight', "DESC");
        if ($page != 0)
            $this->db->limit($limit, $offset);
        $this->db->from($table);
        return $this->db->get()->first_row();
    }

    //=================  ====================
    function show_list_table($where = array(), $limit, $offset, $table, $page = 0) {
        $this->db->select("*");
        $this->db->where($where);
        $this->db->order_by('weight', "DESC");
        if ($page != 0)
            $this->db->limit($limit, $offset);
        $this->db->from($table);
        return $this->db->get()->result();
    }

    //================= Size ID ====================
    function get_tableID($id, $table) {
        $this->db->select("*");
        $this->db->where($table . '.id', $id);
        $this->db->from($table);
        return $this->db->get()->row();
    }

    function get_tableWhere($where = array(), $table) {
        $this->db->select("*");
        $this->db->where($where);
        $this->db->from($table);
        return $this->db->get()->row();
    }
     function get_list_tableWhere($where = array(), $table) {
        $this->db->select("*");
        $this->db->where($where);
        $this->db->from($table);
        return $this->db->get()->result();
    }

    /**
      table Province
      get list return array;
      get ID return row
     */ //================= Province ====================
    function show_list_province($where = array(), $limit, $offset, $p = 1) {
        $this->db->select("*");
        $this->db->where($where);
        $this->db->order_by('weight', "DESC");
        if ($p != 0)
            $this->db->limit($limit, $offset);
        $this->db->from('province');
        return $this->db->get()->result();
    }

    function show_list_item_other($where = array(), $limit, $offset, $p = 1) {
        $this->db->select("*");
        $this->db->where($where);
        $this->db->order_by('date_01', "ASC");
        if ($p != 0)
            $this->db->limit($limit, $offset);
        $this->db->from('item_other');
        return $this->db->get()->result();
    }

    //================= Province ID ====================
    function get_provinceID($id) {
        $this->db->select("*");
        $this->db->where('province.id', $id);
        $this->db->from('province');
        return $this->db->get()->row();
    }

    //================= AGENT ====================
    function show_list_agent($where = array(), $limit, $offset, $limit = 0) {
        $this->db->select("*");
        $this->db->where($where);
        $this->db->order_by('weight', "DESC");
        if ($limit != 0)
            $this->db->limit($limit, $offset);
        $this->db->from('agent');
        return $this->db->get()->result();
    }

    //================= Province ID ====================
    function get_agentID($id) {
        $this->db->select("*");
        $this->db->where('agent.id', $id);
        $this->db->from('agent');
        return $this->db->get()->row();
    }

    function get_agent_where($where = array()) {
        $this->db->select("*");
        $this->db->where($where);
        $this->db->from('agent');
        return $this->db->get()->result();
    }

    function count_table($table) {
        $this->db->from($table);
        return $this->db->get()->num_rows();
    }

    function count_table_where($where = array(), $table) {
        $this->db->where($where);
        $this->db->from($table);
        return $this->db->get()->num_rows();
    }

    function get_row_no_where($table) {
        //$this->db->where($where);
        return $this->db->get($table)->first_row();
    }

    /**
      table location
      get list return array;
      get ID return row
     */
    function show_list_location($where = array(), $limit, $offset, $p = 1) {
        $this->db->select("*");
        $this->db->where($where);
        $this->db->order_by('type', "ASC");
        $this->db->order_by('weight', "DESC");
        if ($p != 0)
            $this->db->limit($limit, $offset);
        $this->db->from('location');
        return $this->db->get()->result();
    }

    function get_locationID($id) {
        $this->db->select("*");
        $this->db->where('location.id', $id);
        $this->db->from('location');
        return $this->db->get()->row();
    }

    /**
      table Link website
      get list return array;
      get ID return row
     */
//================= AGENT ====================
    function show_list_link_website($where = array(), $limit, $offset, $limit = 0) {
        $this->db->select("*");
        $this->db->where($where);
        $this->db->order_by('weight', "DESC");
        if ($limit != 0)
            $this->db->limit($limit, $offset);
        $this->db->from('link_website');
        return $this->db->get()->result();
    }

//================= Province ID ====================
    function get_link_websiteID($id) {
        $this->db->select("*");
        $this->db->where('link_website.id', $id);
        $this->db->from('link_website');
        return $this->db->get()->row();
    }

    //============================================================================
    function count_get_row($table, $where = array()) {
        $this->db->where($where);
        return $this->db->get($table)->num_rows();
    }

    /**
      suppport online
     */
    function show_list_yahoo($where = array(), $limit, $offset) {
        $this->db->select("*");
        $this->db->where($where);
        $this->db->order_by('weight', "DESC");
        $this->db->limit($limit, $offset);
        $this->db->from('yahoo');
        return $this->db->get()->result();
    }

    function get_yahooID($id) {
        $this->db->select("*");
        $this->db->where('yahoo.id', $id);
        $this->db->from('yahoo');
        return $this->db->get()->row();
    }// show list color
    function show_list_color($where = array(), $limit, $offset,$page=0) {
        $this->db->select("*");
        $this->db->where($where);
        $this->db->order_by('weight', "DESC");
        if($page==1)$this->db->limit($limit, $offset);       
        $this->db->from('color');
        return $this->db->get()->result();
    }
    // get color id
    function get_colorID($id) {
        $this->db->select("*");
        $this->db->where('color.id', $id);
        $this->db->from('color');
        return $this->db->get()->row();
    }
function get_list_code_sale($user_id) {
        $this->db->select("*");
        $this->db->where("user_id",$user_id);
        $this->db->order_by('id', "DESC");
        $this->db->from('code_sale');
        return $this->db->get()->result();
    }
}
