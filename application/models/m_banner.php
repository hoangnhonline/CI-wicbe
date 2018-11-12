<?php

class M_banner extends CI_Model {

    function __construct() {
        parent::__construct();
    }


    function list_banner($where = array(),$limit, $offset) {
        $this->db->where($where);
        $this->db->limit($limit, $offset);
        $this->db->order_by('weight', "DESC");
        $this->db->from('banner');
        return $this->db->get()->result();
    }
    function list_banner1($where = array()) {
        $this->db->where($where);
        $this->db->order_by('weight', "DESC");
        $this->db->from('banner');
        return $this->db->get()->result();
    }
    function could_banner($type) {
        $this->db->where('type', $type);
        $this->db->from('banner');
        return $this->db->get()->num_rows();
    }


    function get_id_banner($id) {
        $this->db->where("id", $id);
        $this->db->from('banner');
        return $this->db->get()->row();
    }

    function first_row() {
        $this->db->order_by('id', 'RANDOM')
        or
        $this->db->order_by('rand()');
        $this->db->where("type", 4);
        $this->db->limit(1);
        $this->db->from('banner');
        return $this->db->get()->row();
    }

    function show_banner_home($limit, $offset,$type) {
        $this->db->limit($limit, $offset);
        $this->db->group_by('banner.id');
        $this->db->where('type',$type);
        $this->db->from('banner');
        return $this->db->get()->result();
    }
    function show_duan($limit, $offset,$type) {
        $this->db->limit($limit, $offset);
        $this->db->group_by('banner.id');
        $this->db->where('status', 1);
        $this->db->where('type',$type);
        $this->db->from('banner');
        return $this->db->get()->result();
    }
    function could_duan($type) {
        $this->db->where('type', $type);
        $this->db->where('status', 1);
        $this->db->from('banner');
        return $this->db->get()->num_rows();
    }

    //====================================
    function show_detail_banner($id) {
        $this->db->where('status', 1);
        $this->db->where('id', $id);
        $this->db->from('banner');
        return $this->db->get()->row();
    }

    //=============== check category=====================
    function category_check($where = array(), $lang = 'vn') {
        $this->db->select("categorydetail.category_link,category.category_top,category.id");
        $this->db->where("country.name", $lang);
        $this->db->where($where);
        $this->db->from('category');
        $this->db->join('categorydetail', 'categorydetail.category_id=category.id');
        $this->db->join('country', 'categorydetail.country_id=country.id');
        return $this->db->get()->row();
    }

    //===============  category detail=====================
    function category_detail($link, $lang = 'vn') {
        $this->db->select("categorydetail.category_name,category.id,category.banner_id");
        $this->db->where("category_link", $link);
        $this->db->where("country.name", $lang);
        $this->db->where("category.category_status", 1);
        $this->db->from('category');
        $this->db->join('categorydetail', 'categorydetail.category_id=category.id');
        $this->db->join('country', 'categorydetail.country_id=country.id');
        return $this->db->get()->row();
    }

    function category_detail_parent($parent,$link, $lang = 'vn') {
        $top=$this->category_detail($parent,$lang);
        $this->db->select("categorydetail.category_name,category.id,category.banner_id");
        $this->db->where("category_link", $link);
        $this->db->where("country.name", $lang);
        $this->db->where("category.category_top", $top->id);
        $this->db->where("category.category_status", 1);
        $this->db->from('category');
        $this->db->join('categorydetail', 'categorydetail.category_id=category.id');
        $this->db->join('country', 'categorydetail.country_id=country.id');
        return $this->db->get()->row();
    }

    // show list item-where
    function show_list_item_where_page($where = array(), $limit, $offset, $lang = 'vn', $page = 1) {
        $this->db->select("item.id,itemdetail.item_link,itemdetail.item_name,item.item_price,item.item_price_sale,item.item_hot,item.item_code");
        $this->db->where("country.name", $lang);
        $this->db->where($where);
        $this->db->where("item.item_status", '1');
        if ($page == 1)
            $this->db->limit($limit, $offset);
        $this->db->from('item');
        $this->db->order_by('item.item_weight', 'DESC');
        $this->db->group_by('item.id');
        $this->db->join('itemdetail', 'itemdetail.item_id=item.id');
        $this->db->join('country', 'itemdetail.country_id=country.id');
        if ($page == 0)
            return $this->db->get()->num_rows();
        else
            return $this->db->get()->result();
    }

    //========== search key
    function show_list_item_search($item_link, $limit, $offset, $lang = 'vn', $page = 1) {
        $this->db->select("item.id,itemdetail.item_link,itemdetail.item_name,item.item_price,item.item_price_sale,item.item_hot,item.item_code");
        $this->db->where("country.name", $lang);
        $this->db->like("item_link", $item_link);
        $this->db->where("item.item_status", '1');
        if ($page == 1)
            $this->db->limit($limit, $offset);
        $this->db->from('item');
        $this->db->order_by('item.item_weight', 'DESC');
        $this->db->group_by('item.id');
        $this->db->join('itemdetail', 'itemdetail.item_id=item.id');
        $this->db->join('country', 'itemdetail.country_id=country.id');
        if ($page == 0)
            return $this->db->get()->num_rows();
        else
            return $this->db->get()->result();
    }

    function show_list_item_result_page($loaisp, $phan_loai, $price, $hsx, $limit, $offset, $lang = 'vn', $page = 0) {
        $condition = "status =1 ";
        if ($loaisp != 0) {
            if ($phan_loai != 0) {
                $condition.=" AND itemcategory.category_id=" . $phan_loai;
            } else {
                $array = array($loaisp);
                $list = $this->show_list_category_child($loaisp);
                foreach ($list as $l) {
                    $array[] = $l->id;
                }
                $this->db->where_in("itemcategory.category_id", $array);
            }
        }
        if ($price != 0) {
            if ($price == 1)
                $condition .=" AND item.item_price< 500000";
            else if ($price == 2)
                $condition .=" AND item.item_price BETWEEN 500000 AND 1000000 ";
            else if ($price == 3)
                $condition .=" AND item.item_price BETWEEN 1000000 AND 2000000";
            else if ($price == 4)
                $condition .=" AND item.item_price BETWEEN 2000000 AND 3000000";
            else if ($price == 5)
                $condition .=" AND item.item_price > 3000000 ";
        }
        if ($hsx != 0) {
            $condition.=" AND itemcategory.category_id=" . $hsx;
        }
        $this->db->select("item.id,itemdetail.item_link,itemdetail.item_name,item.item_price,item.item_price_sale,item.item_hot,item.item_code");
        //$this->db->where(array("status"=>1));
        $this->db->where($condition);
        $this->db->order_by('item.item_weight', "DESC");
        $this->db->group_by('item.id');
        if ($page != 0) {
            $this->db->limit($limit, $offset);
        }
        $this->db->from('item');
        $this->db->join('itemdetail', 'itemdetail.item_id=item.id');
        $this->db->join('country', 'itemdetail.country_id=country.id');
        $this->db->join('itemcategory', 'itemcategory.item_id=item.id');
        if ($page == 0)
            return $this->db->get()->num_rows();
        else
            return $this->db->get()->result();
    }

    //================== show list item in category_top==================
    function show_list_item_category_top_page($id, $limit, $offset, $lang = 'vn', $page = 1) {
        $array = array($id);
        $list = $this->show_list_category_child($id);
        foreach ($list as $l) {
            $array[] = $l->id;
        }
        $this->db->select("item.id,itemdetail.item_link,itemdetail.item_name,item.item_price,item.item_price_sale,item.item_code");
        $this->db->where("country.name", $lang);
        $this->db->where("item.item_status", '1');
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

    // shiw list item with category_top !=0
    function show_list_item_category_page($id, $limit, $offset, $lang = 'vn', $page = 1) {
        $this->db->select("item.id,itemdetail.item_link,itemdetail.item_name,item.item_price,item.item_price_sale,item.item_code");
        $this->db->where("country.name", $lang);
        $this->db->where("item.item_status", '1');
        $this->db->where("category.id", $id);
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

// shiw list item with category_top !=0
    function show_list_item_other_in_category($item_id, $cate_id, $limit, $offset, $lang = 'vn', $page = 1) {
        $this->db->select("item.id,itemdetail.item_link,itemdetail.item_name,item.item_price,item.item_price_sale,item.item_code");
        $this->db->where("country.name", $lang);
        $this->db->where("item.item_status", '1');
        $this->db->where("category.id", $cate_id);
        $this->db->where("item.id !=", $item_id);
        $this->db->where("category.category_type", 1);
        if ($page == 1)
            $this->db->limit($limit, $offset);
        $this->db->from('item');
        $this->db->order_by('item.item_weight', 'DESC');
        $this->db->group_by('item.id');
        $this->db->join('itemcategory', 'itemcategory.item_id=item.id');
        $this->db->join('category', 'itemcategory.category_id=category.id');
        $this->db->join('itemdetail', 'itemdetail.item_id=item.id');
        $this->db->join('country', 'itemdetail.country_id=country.id');
        return $this->db->get()->result();
    }

    // detail item
    function show_detail_item_where($where = array(), $lang = 'vn') {
        $this->db->select("item.item_price_sale,item.item_price,itemdetail.*,item.item_code,item.file,item.item_order");

        $this->db->where($where);
        $this->db->where("country.name", $lang);
        $this->db->from('item');
        $this->db->join('itemdetail', 'itemdetail.item_id=item.id');
        $this->db->join('country', 'itemdetail.country_id=country.id');
        return $this->db->get()->row();
    }

    //================ show image ite,====================
    function show_thumb($id = 0) {
        $this->db->select('*');
        $this->db->where("itemimages.item_id", $id);
        $this->db->from('images');
        $this->db->join('itemimages', 'itemimages.image_id=images.id');
        return $this->db->get()->row();
    }

    //================= Color ====================
    function list_color_item($id) {
        $this->db->select("color.id,color.name,color.thumb");
        $this->db->where('color.status', '1');
        $this->db->where('item_id', $id);
        $this->db->order_by('weight', "DESC");
        $this->db->from('color');
        $this->db->join('itemcolor', 'itemcolor.color_id=color.id');
        return $this->db->get()->result();
    }

    //================= Get banner detail item ====================
    function get_banner($id) {
        $this->db->select('images.thumb,images.name');
        $this->db->where('id', $id);
        $this->db->from('images');
        return $this->db->get()->row();
    }

    // show list item imag
    function show_list_item_image($id) {
        $this->db->select("images.id,images.date_create,images.status,images.thumb");
        $this->db->where("other_img.item_id", $id);
        $this->db->order_by('images.weight', 'DESC');
        $this->db->from('images');
        $this->db->join('other_img', 'other_img.img_id=images.id');
        $this->db->group_by('images.id');
        return $this->db->get()->result();
    }

    //====================================
}
