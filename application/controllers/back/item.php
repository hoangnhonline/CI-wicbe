<?php

class Item extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form', 'text', 'file'));
        $this->load->library(array('form_validation', 'ftp'));
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('M_session');
        $this->load->model('M_category');
        $this->load->model('M_item');
        $this->load->model('Title');
        $this->load->model('M_admin');
        $this->load->model('M_artice');
    }

    public function index($id = 0, $page_no = 1) {
        if (isset($_GET['name'])) {
            $a = $this->KtraStr($_GET['name']);
        } else {
            $a = '';
        };
        if (!$this->M_session->userdata('admin_login'))  redirect(site_url('admin/login'));
        $data['view'] = 'back/item/list';
        $data['mod'] = 'item_' . $id;
        $page_co = 20;
        $start = ($page_no - 1) * $page_co;
        $count = $this->M_item->count_item_where(array('type' => $id));
        $data['page_no'] = $page_no;
        $data['id'] =  $data['type']  = $id;
        $data['item'] = $this->M_item->show_list_item_page_type($id, $page_co, $start, $a);
        $data['link'] = $this->paging($page_co, $count, 'back/item/index/' . $id . "/", $page_no);
        $this->load->view('back/v_admin', $data);
    }

    function KtraStr($str) {
        $str = trim(strip_tags(mysql_real_escape_string($str)));
        return $str;
    }

    function replace_all_index($string) {
        $url = '1?TieuDe=';
        $string = str_replace($url, '', $string);
        return $string;
    }



    public function add($type = 0) {
        if (!$this->M_session->userdata('admin_login')) redirect(site_url('admin/login'));
        $data['view'] = 'back/item/add';
        $data['weight'] = $this->Title->get_max('item', 'weight') + 1;
        $data['code'] = "N_" . $this->Title->randomPassword(5) . "_" . ($this->Title->get_max('item', 'id') + 1);
        $data['mod'] = 'item_' . $type;
        $data['type'] = $type;

        if (isset($_POST['ok'])) {
                $this->form_validation->set_rules('name', 'name', 'trim|required|callback_chekitemadd');
                $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
                $this->form_validation->set_message('chekitemadd', 'Tên sản phẩm có trong cơ sở dữ liệu');
                $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
            if ($this->form_validation->run() == true) {
                $status = $_POST['status'];
                if($_POST['name_img'] != ''){
                    $name_img = $_POST['name_img'];
                }else{
                    $name_img = $_POST['name'];
                }
                $img = $this->Title->uploadhinh1($name_img);
                $sql = array(
                    'status' => $status,
                    'time' => time(),
                    'type' => $type,
                    'code' => $this->input->post('code'),
                    'hot' => $this->input->post('hot'),
                    'weight' => $this->input->post('weight'),
                    'name' => $this->input->post('name'),
                    'link' => $this->Title->changeTitle($this->input->post('name')),
                    'summary' => $this->input->post('summary'),
                    'title' => $this->input->post('title'),
                    'price' => $this->input->post('price'),
                    'content' => $this->input->post('content'),
                    'content1' => $this->input->post('content1'),
                    'description' => $this->input->post('description'),
                    'keywords' => $this->input->post('keywords'),
                    'cate' => $this->input->post('cate'),
                    'price_pro'=>$this->input->post('price_pro'),
                    'name_hot'=>$_POST['name_hot'],
                    'img'=>$img,
                );
                $this->db->insert('item', $sql);
                $item_id = $this->db->insert_id();
                $cate = $this->input->post('check_tags');
                if ($cate) {
                    foreach ($cate as $key => $value) {
                        if ($this->M_item->count_table_where(array("id" => $item_id, "id_tags" => $key), 'tags_id') == 0) {
                            $sql = array('id' => $item_id, 'id_tags' => $key,'type'=>1);
                            $this->db->insert('tags_id', $sql);
                        }// end if
                    }
                }
                if (isset($_FILES['img_other']['name']) && count($_FILES['img_other']['name']) > 0) {
                    $this->load->library('upload', $this->set_upload_options1());
                    $this->load->library('image_lib', $this->set_upload_options1());
                    $files = $_FILES;
                    $array_img = count($_FILES['img_other']['name']);
                    for ($i = 0; $i < $array_img; $i++) {
                        $_FILES['img_other']['name'] = $files['img_other']['name'][$i];
                        $_FILES['img_other']['type'] = $files['img_other']['type'][$i];
                        $_FILES['img_other']['tmp_name'] = $files['img_other']['tmp_name'][$i];
                        $_FILES['img_other']['error'] = $files['img_other']['error'][$i];
                        $_FILES['img_other']['size'] = $files['img_other']['size'][$i];
                        $this->upload->initialize($this->set_upload_options1());
                        if (!$this->upload->do_upload("img_other")) {
                            echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
                            echo "<script>
					  alert('Cập nhật bi lỗi');location.href='" . base_url() . "back/item/add/" . $type . "'</script>";
                            exit;
                        } else {
                            $img = $this->upload->data();
                            $this->_resizeimage($img['file_name']);
                            $big_image = $img['file_name'];
                            $ext_img = $img['file_ext'];
                            $name_img = $img['raw_name'];
                            $thumb_image = $img['file_name'];
                            $sql = array('id_item' => $item_id, 'img' => $big_image);
                            $this->db->insert('other_img', $sql);
                        }
                    }
                }
                redirect('back/item/index/' . $type);

            }
        }
        $this->load->view('back/v_admin', $data);
    }

    private function set_upload_options1() {
        if($_POST['name_img1'] !=''){
            $name = $_POST['name_img1'];
        }else{
            $name = $_POST['name'];
        }
        $config = array();
        $config['upload_path'] = './uploads/san-pham';
        $config['allowed_types'] = '*';
        $config['source_image'] = $this->Title->changeTitle($name).'-'.$this->Title->ChuoiNgauNhien(3);
        $config['file_name']= $this->Title->changeTitle($name).'-'.$this->Title->ChuoiNgauNhien(3);
        $config['image_library'] = 'gd2';
        $config['max_size'] = '15000';
        return $config;
    }
    private function set_upload_options() {
        //  upload an image options
        $config = array();
        $config['upload_path'] = './uploads/san-pham';
        $config['allowed_types'] = '*';
        $config['image_library'] = 'gd2';
        $config['max_size'] = '15000';
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        return $config;
    }

    function delete_img($type = 0, $item_id = 0, $id_img = 0) {
        if ($this->M_item->show_thum_o($id_img)->img != NULL) {
            if (file_exists('./uploads/san-pham/' . $this->replace_all($this->M_item->show_thum_o($id_img)->img))) {
                unlink('./uploads/san-pham/' . $this->replace_all($this->M_item->show_thum_o($id_img)->img));
            } }
        $where = array('img' => $id_img);
        $this->db->delete('other_img', $where);
        redirect(site_url('back/item/edit/'.$type."/".$item_id)).'?messager=success';
    }

    public function delete($type = 0, $id) {
        if ($this->M_item->show_thumb($id)->img != NULL) {
            if (file_exists('./uploads/san-pham/' . $this->replace_all($this->M_item->show_thumb($id)->img)))
                ; {
                @unlink('./uploads/san-pham/' . $this->replace_all($this->M_item->show_thumb($id)->img));
            }
        }
        if ($this->M_item->count_item_other($id) != 0) {

            foreach ($this->M_item->other_img($id) as $row) {
                if ($this->M_item->show_thum_o($row->img)->img != NULL) {
                    if (file_exists('./uploads/san-pham/' . $this->M_item->show_thum_o($row->img)->img)) {
                        unlink('./uploads/san-pham/' . $this->M_item->show_thum_o($row->img)->img);
                    }
                }
                $where = array('img' => $row->img);
                $this->db->delete('other_img', $where);
            }

        }
        $where = array('id' => $id,'type' => 1);
        $this->db->delete('tags_id', $where);
        $where = array('id' => $id);
        $this->db->delete('item', $where);
        redirect(site_url('back/item/index/'.$type)).'?messager=success';
    }

    function uploadhinh() {
        $config = array('upload_path' => $this->_images_path,
            'allowed_types' => 'gif|jpg|png|jpeg',
            'max_size' => '2000',
            'file_name' => $this->ChuoiNgauNhien(18));
        $this->load->library("upload", $config);
        if (!$this->upload->do_upload("img_other")) {
            return false;
        } else {
            $data = $this->upload->data();
            $name = $this->_images_url . '/' . $config['file_name'] . $data['file_ext'];
            return $name;
        }
    }

    function _resizeimage($fileName) {
        //$url = substr(base_url(),0,-4);
        $config['image_library'] = 'gd2';
        $config['source_image'] = './uploads/san-pham' . $fileName;
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        $this->image_lib->clear();
    }

    function ChuoiNgauNhien($sokytu) {
        $giatri = '';
        $chuoi = "ABCDEFGHIJKLMNOPQRSTUVWXYZWabcdefghijklmnopqrstuvwxyzw0123456789";
        for ($i = 0; $i < $sokytu; $i++) {
            $vitri = mt_rand(0, strlen($chuoi));
            $giatri = $giatri . substr($chuoi, $vitri, 1);
        }
        return $giatri;
    }

    public function edit($type = 0, $item_id = 0) {
        if (!$this->M_session->userdata('admin_login')) redirect(site_url('admin/login'));
        $data['view'] = 'back/item/edit';
        $data['code'] = "N_" . $this->Title->randomPassword(5) . "_" . ($this->Title->get_max('item', 'id') + 1);
        $data['mod'] = 'item_' . $type;
        $data['id'] = $item_id;
        $data['type'] = $type;
        $data['item'] = $this->M_item->show_detail_item_id(array('item.id' => $item_id));
        if (isset($_POST['ok'])) {
                $this->form_validation->set_rules('name', 'name', 'trim|required|callback_chekitem');
                $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
                $this->form_validation->set_message('chekitem', 'Tên sản phẩm có trong cơ sở dữ liệu');
            if ($this->form_validation->run() == TRUE) {
                $status = $_POST['status'];
                $sql = array(
                    'status' => $status,
                    'time' => time(),
                    'type' => $type,
                    'code' => $this->input->post('code'),
                    'hot' => $this->input->post('hot'),
                    'weight' => $this->input->post('weight'),
                    'price' => $this->input->post('price'),
                    'name' => $this->input->post('name'),
                    'link' => $this->Title->changeTitle($this->input->post('name')),
                    'summary' => $this->input->post('summary'),
                    'title' => $this->input->post('title'),
                    'content' => $this->input->post('content'),
                    'content1' => $this->input->post('content1'),
                    'description' => $this->input->post('description'),
                    'keywords' => $this->input->post('keywords'),
                    'cate' => $this->input->post('cate'),
                    'price_pro'=>$this->input->post('price_pro'),
                    'name_hot'=>$_POST['name_hot'],
                );
                $this->db->where('id',$item_id);
                $this->db->update('item', $sql);
                $where = (array('id' => $item_id));
                $this->db->delete('tags_id', $where);
                $cate = $this->input->post('check_tags');
                if ($cate) {
                    foreach ($cate as $key => $value) {
                        if ($this->M_item->count_table_where(array("id" => $item_id, "id_tags" => $key), 'tags_id') == 0) {
                            $sql = array('id' => $item_id, 'id_tags' => $key,'type'=>1);
                            $this->db->insert('tags_id', $sql);
                        } } }
                if ($_FILES['img']['name'] != '') {
                    if($_POST['name_img'] != ''){
                        $name_img = $_POST['name_img'];
                    }else{
                        $name_img = $_POST['name'];
                    }
                    $img = $this->Title->uploadhinh1($name_img);
                    if ( $data['item']->img != NULL) {
                        if (file_exists('./uploads/san-pham/' . $this->replace_all( $data['item']->img)))
                            ; {
                            @unlink('./uploads/san-pham/' . $this->replace_all( $data['item']->img));
                        }
                    }
                    $sql = array('img'=>$img );
                    $this->db->where('id', $item_id);
                    $this->db->update('item', $sql);
                }
                if (isset($_FILES['img_other']['name']) && count($_FILES['img_other']['name']) > 0) {
                    $this->load->library('upload', $this->set_upload_options1());
                    $this->load->library('image_lib', $this->set_upload_options1());
                    $files = $_FILES;
                    $array_img = count($_FILES['img_other']['name']);
                    for ($i = 0; $i < $array_img; $i++) {
                        $_FILES['img_other']['name'] = $files['img_other']['name'][$i];
                        $_FILES['img_other']['type'] = $files['img_other']['type'][$i];
                        $_FILES['img_other']['tmp_name'] = $files['img_other']['tmp_name'][$i];
                        $_FILES['img_other']['error'] = $files['img_other']['error'][$i];
                        $_FILES['img_other']['size'] = $files['img_other']['size'][$i];
                        $this->upload->initialize($this->set_upload_options1());
                        if (!$this->upload->do_upload("img_other")) {
                            echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
                            echo "<script>alert('Cập nhật bi lỗi');
					  location.href='" . base_url() . "back/item/edit/" . $type . "/" . $item_id . "'
				  </script>";
                            exit;
                        } else {
                            $img = $this->upload->data();
                            $this->_resizeimage($img['file_name']);
                            $big_image = $img['file_name'];
                            $ext_img = $img['file_ext'];
                            $name_img = $img['raw_name'];
                            $thumb_image = $img['file_name'];
                            $sql = array('id_item' => $item_id, 'img' => $big_image);
                            $this->db->insert('other_img', $sql);
                        }
                    }
                }

                $url = site_url('back/item/edit/'. $type.'/'.$item_id).'?messager=success';
               redirect($url);
              //  redirect(site_url());
            }
        }

        $this->load->view('back/v_admin', $data);
    }

    public function paging($page, $total, $url, $id = 1) {
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

    function anhien12($id, $fr, $wh) {
        $wh = $wh . '="' . $id . '"';
        $sql = "select item_status from $fr where $wh";
        $kq = $this->LaySQL($sql);
        foreach ($kq as $t)
            $status = $t->item_status;
        if ($status == 1)
            $status = 0;
        else
            $status = 1;
        echo $this->AnHien($fr, $status, $wh);
    }

    function LaySQL($sql) {
        $kq = $this->db->query($sql);
        return $kq->result();
    }

    function AnHien($fr, $status, $wh) {
        $sql = "UPDATE $fr SET item_status = $status WHERE $wh";
        $this->db->query($sql);
        return "AnHien_{$status}.png";
    }


    function hide($type,$id, $page_no) {


        $this->M_item->update_tableID($id, array('status' => 0), "item");

        redirect(site_url('back/item' . "/index/" .$type.'/'. $page_no) . '?messager=success');

    }

    function show($type,$id, $page_no) {


        $this->M_item->update_tableID($id, array('status' => 1), "item");

        redirect(site_url('back/item' . "/index/" .$type.'/'. $page_no) . '?messager=success');

    }


    function hide_hot($type,$id, $page_no) {


        $this->M_item->update_tableID($id, array('hot' => 0), "item");

        redirect(site_url('back/item' . "/index/" .$type.'/'. $page_no) . '?messager=success');

    }

    function show_hot($type,$id, $page_no) {


        $this->M_item->update_tableID($id, array('hot' => 1), "item");

        redirect(site_url('back/item' . "/index/" .$type.'/'. $page_no) . '?messager=success');

    }
    function noibat($id, $fr, $wh) {
        $wh = $wh . '="' . $id . '"';
        $sql = "select hot from $fr where $wh";
        $kq = $this->LaySQL($sql);
        foreach ($kq as $t)
            $noibat = $t->hot;
        if ($noibat == 1)
            $noibat = 0;
        else
            $noibat = 1;
        echo $this->noibat1($fr, $noibat, $wh);
    }

    function noibat1($fr, $noibat, $wh) {
        $sql = "UPDATE $fr SET hot = $noibat WHERE $wh";
        $this->db->query($sql);
        return "noibat_{$noibat}.png";
    }

    function chayslide($id, $fr, $wh) {
        $wh = $wh . '="' . $id . '"';
        $sql = "select home_sale from $fr where $wh";
        $kq = $this->LaySQL($sql);
        foreach ($kq as $t)
            $noibat = $t->home_sale;
        if ($noibat == 1)
            $noibat = 0;
        else
            $noibat = 1;
        echo $this->chayslide1($fr, $noibat, $wh);
    }

    function chayslide1($fr, $noibat, $wh) {
        $sql = "UPDATE $fr SET home_sale = $noibat WHERE $wh";
        $this->db->query($sql);
        return "noibat_{$noibat}.png";
    }

    function replace_all($string) {
        $url = 'uploads/san-pham/';
        $string = str_replace($url, '', $string);
        return $string;
    }

    function replace_file($string) {
        $url =  base_url('uploads/Files/');
        $string = str_replace($url, '', $string);
        return $string;
    }
    public function chekitem() {
            $chek1 = $this->M_item->chekitem($this->Title->changeTitle($_POST['name']), $this->uri->segment(5));
        if (!empty($chek1)) {
            $this->form_validation->set_message('chekitem', "Tên sản phẩm có trong cơ sở dữ liệu");
            return FALSE;
        } else {
            return true;
        }
    }

    public function chekitemadd() {
            $chek1 = $this->M_item->chekitemadd($this->Title->changeTitle($_POST['name']));
        if (!empty($chek1)) {
            $this->form_validation->set_message('chekitemadd', "Tên sản phẩm có trong cơ sở dữ liệu");
            return FALSE;
        } else {
            return true;
        }
    }


}

?>