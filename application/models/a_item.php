<?php

class a_item extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    //================ show list category====================
    function show_list_category_where($where = array(), $lang = 'vn') {
        $this->db->select("categorydetail.category_name,category.id,category.date_create,category.date_modify,category.category_status,category.category_top,category.category_weight,category.category_type,categorydetail.category_link,category.picture");
        $this->db->where("country.name", $lang);
        $this->db->where($where);
        $this->db->order_by('category.category_weight', "ASC");
        $this->db->from('category');
        $this->db->join('categorydetail', 'categorydetail.category_id=category.id');
        $this->db->join('country', 'categorydetail.country_id=country.id');
        return $this->db->get()->result();
    }

    // show list catgory with category_top !=0
    function show_list_category_child($category_top, $lang = 'vn') {
        $this->db->select("category.id");
        $this->db->where("category.category_top", $category_top);
        $this->db->from('category');
        return $this->db->get()->result();
    }

    //================= show_categoryID ====================
    function show_categoryID($id_item = 0) {
        $this->db->select("itemcategory.id_category");
        $this->db->where('id_item', $id_item);
        $this->db->from('itemcategory');

        return $this->db->get()->row();
    }

    function show_hsx($id_item = 0) {
        $this->db->select("itemcategory.category_id,categorydetail.category_name");
        $this->db->where('item_id', $id_item);
        $this->db->where('category.category_type', 2);
        $this->db->from('itemcategory');
        $this->db->join('category', 'itemcategory.category_id=category.id');
        $this->db->join('categorydetail', 'categorydetail.category_id=category.id');
        return $this->db->get()->row();
    }

    //====================================
    function show_detail_category_id($id, $lang = 'vn') {
        $this->db->select("categorydetail.name,category.id,category.author,category.edit,category.weight,category.per,category.top_category,category.date_create,category.date_modify,category.status");
        $this->db->where("country.name", $lang);
        $this->db->where("category.id", $id);
        $this->db->from('category');
        $this->db->join('categorydetail', 'categorydetail.id_category=category.id');
        $this->db->join('country', 'categorydetail.id_country=country.id');
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


    // detail item
    function show_detail_item_where($where = array()) {
        $this->db->where($where);
        $this->db->from('item');
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
