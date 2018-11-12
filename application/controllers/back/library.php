<?php

class Library extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form', 'text', 'file'));
        $this->load->library(array('form_validation', 'ftp'));
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('M_session');
        $this->load->model('Title');
        $this->load->model('M_admin');
        $this->load->model('M_images');
        $this->load->model('M_category');
        $this->load->model('M_artice');
        $this->load->model('Thongtin_web');
    }
    public function index($type = 0,$page_no = 1){

        if (!$this->M_session->userdata('admin_login'))
            redirect(site_url('admin/login'));
        if(isset($_GET['TieuDe'])) {$a=$this->KtraStr($_GET['TieuDe']);}else{$a='';};
        $data['view']='back/library/list';
        $data['type']=$type;
        $data['images']='library';
        $data['mod']='library_'.$type;
        $page_co = 20;
        $start = ($page_no - 1) * $page_co;
        $count = $this->M_images->count_show_list_img($type,$a);
        $data['page_no'] = $page_no;
        $data['list']=  $this->M_images->show_list_img($type,$page_co, $start,$a);
       $data['link'] = $this->Title->paging($page_co, $count, 'back/library/index/', $page_no);
        $this->load->view('back/v_admin',$data);
    }
    function KtraStr($str){
        $str=trim(strip_tags(mysql_real_escape_string($str)));
        return $str;
    }
    public function add($type = 0){
        if (!$this->M_session->userdata('admin_login'))
            redirect(site_url('admin/login'));
        $data['view']='back/library/add';
        $data['images']='images';
        $data['type']= $type;
        $data['mod']='library_'.$type;
        if(isset($_POST['ok'])){

            $this->form_validation->set_rules('name_vn', 'tiêu đề tiếng việt', 'trim|required|callback_chekpage');
            $this->form_validation->set_rules('name_en', 'tiêu đề tiếng anh', 'trim|required|callback_chekpage_en');
            $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
            $this->form_validation->set_message('chekpage', 'Tên viết tiếng viêt có trong cơ sở dữ liệu');
            $this->form_validation->set_message('chekpage_en', 'Tên bài viết tiếng anh trong cơ sở dữ liệu');
            if ($this->form_validation->run() == TRUE) {
                $img = $this->Title->uploadhinh();
                $sql = array(
                    'thumb' => $img,
                    'time'=>date('Y-m-d H:i:s'),
                    'weight'=>$_POST['weight'],
                    'status'=>$_POST['status'],
                    'type'=>$type,
                    'hot'=>$_POST['hot'],

                );
                $this->db->insert('video_library', $sql);
                $video_library_id = $this->db->insert_id();


                foreach ($this->M_artice->show_list_lang() as $lang) {
                    $sql = array(
                        'id_video_library' => $video_library_id,
                        'name' => $this->input->post('name_' . $lang->name),
                        'name_link' => $this->Title->changeTitle($this->input->post('name_' . $lang->name)),
                        'link'=>$_POST['link'],
                        'country_id' => $lang->id,
                      //  'text_1' => $this->input->post('text_1_' . $lang->name),
                     //   'text_2' => $this->input->post('text_2_' . $lang->name),
                    );
                    $this->db->insert('video_library_detail', $sql);
                }
                if (isset($_FILES['img_other']['name']) && count($_FILES['img_other']['name']) > 0) {
                    $this->load->library('upload', $this->set_upload_options());
                    $this->load->library('image_lib', $this->set_upload_options());
                    $files = $_FILES;
                    $array_img = count($_FILES['img_other']['name']);
                    for ($i = 0; $i < $array_img; $i++) {
                        $_FILES['img_other']['name'] = $files['img_other']['name'][$i];
                        $_FILES['img_other']['type'] = $files['img_other']['type'][$i];
                        $_FILES['img_other']['tmp_name'] = $files['img_other']['tmp_name'][$i];
                        $_FILES['img_other']['error'] = $files['img_other']['error'][$i];
                        $_FILES['img_other']['size'] = $files['img_other']['size'][$i];
                        $this->upload->initialize($this->set_upload_options());
                        if (!$this->upload->do_upload("img_other")) {
                            // echo $this->upload->display_errors(); exit;
                            echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

                            echo "<script>
					  alert('Cập nhật bi lỗi');
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

                            $sql = array(
                                'id_video_library' => $video_library_id,
                                'thumb_orther' => $big_image,
                            );
                            $this->db->insert('img_video_library', $sql);
                        }
                    }
                }
                redirect('back/library/index/'.$type);
            }}
        $this->load->view('back/v_admin',$data);
    }
    public function edit($type,$id){
        $data['view']='back/library/edit';
        $data['images']='images';
        $data['mod']='library_'.$type;
        $data['type']=$type;

        $data['id']=$id;
        //  echo $this->M_images->get_id_img_daidien($id)->id; die();

        if(isset($_POST['ok'])){

            $this->form_validation->set_rules('name_vn', 'tiêu đề tiếng việt', 'trim|required|callback_chekpage_edit');
            $this->form_validation->set_rules('name_en', 'tiêu đề tiếng anh', 'trim|required|callback_chekpage_edit_en');
            $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
            $this->form_validation->set_message('chekpage_edit', 'Tên viết tiếng viêt có trong cơ sở dữ liệu');
            $this->form_validation->set_message('chekpage_edit_en', 'Tên bài viết tiếng anh trong cơ sở dữ liệu');
            if ($this->form_validation->run() == TRUE) {

                $sql = array(
                    'time'=>date('Y-m-d H:i:s'),
                    'weight'=>$_POST['weight'],
                    'status'=>$_POST['status'],
                    'type'=>$type,
                    'hot'=>$_POST['hot'],

                );
                $this->db->where('id',$id);
                $this->db->update('video_library', $sql);
                if (isset($_FILES['img']['name']) && $_FILES['img']['name'] != '') {
                    $img = $this->Title->uploadhinh();
                    if($this->M_images->check_name(array('video_library.id'=>$id))->thumb != NULL){

                        if (file_exists('./uploads/san-pham/' . $this->replace_all($this->M_images->check_name(array('video_library.id'=>$id))->thumb))); {
                            @unlink('./uploads/san-pham/' . $this->replace_all($this->M_images->check_name(array('video_library.id'=>$id))->thumb));
                        }
                    }

                    $sql = array(
                        'thumb' => $img,
                    );
                    $this->db->where('id',$id);
                    $this->db->update('video_library', $sql);

                }

                foreach ($this->M_artice->show_list_lang() as $lang) {
                    $sql = array(
                        'name' => $this->input->post('name_' . $lang->name),
                        'name_link' => $this->Title->changeTitle($this->input->post('name_' . $lang->name)),
                      //  'text_1' => $this->input->post('text_1_' . $lang->name),
                      //  'text_2' => $this->input->post('text_2_' . $lang->name),
                        'link'=>$_POST['link'],
                        'country_id' => $lang->id,
                    );
                    $this->db->where('id_video_library',$id);
                    $this->db->where('country_id', $lang->id);
                    $this->db->update('video_library_detail', $sql);
                }
                if (isset($_FILES['img_other']['name']) && count($_FILES['img_other']['name']) > 0) {
                    $this->load->library('upload', $this->set_upload_options());
                    $this->load->library('image_lib', $this->set_upload_options());
                    $files = $_FILES;
                    $array_img = count($_FILES['img_other']['name']);
                    for ($i = 0; $i < $array_img; $i++) {
                        $_FILES['img_other']['name'] = $files['img_other']['name'][$i];
                        $_FILES['img_other']['type'] = $files['img_other']['type'][$i];
                        $_FILES['img_other']['tmp_name'] = $files['img_other']['tmp_name'][$i];
                        $_FILES['img_other']['error'] = $files['img_other']['error'][$i];
                        $_FILES['img_other']['size'] = $files['img_other']['size'][$i];
                        $this->upload->initialize($this->set_upload_options());
                        if (!$this->upload->do_upload("img_other")) {
                            // echo $this->upload->display_errors(); exit;
                            echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

                            echo "<script>
					  alert('Cập nhật bi lỗi');
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

                            $sql = array(
                                'id_video_library' => $id,
                                'thumb_orther' => $big_image,
                            );
                            $this->db->insert('img_video_library', $sql);
                        }
                    }
                }

              //  $url = site_url('back/library/edit/'.$type.'/'.$id);

             //   echo "<script>window.alert('Cập nhật thành công !');window.location.href='".$url."';</script>";
              redirect('back/library/index/'.$type);
            }}
        $this->load->view('back/v_admin',$data);
    }
    function delete_img($type,$id = 0, $id_img = 0) {
        if ($this->M_images->get_img_orther(array('img_video_library.id'=>$id_img))->thumb_orther != NULL) {
            if (file_exists('./uploads/san-pham/' . $this->replace_all($this->M_images->get_img_orther(array('img_video_library.id'=>$id_img))->thumb_orther))) {
                unlink('./uploads/san-pham/' . $this->replace_all($this->M_images->get_img_orther(array('img_video_library.id'=>$id_img))->thumb_orther));
            }
        }

        $where = array('id' => $id_img);
        $this->db->delete('img_video_library', $where);


        redirect(site_url('back/library/edit/'.$type.'/'.$id) . '?messager=success');
    }
    public function delete($type,$id){
        if($this->M_images->check_name(array('video_library.id'=>$id))->thumb != NULL){

            if (file_exists('./uploads/san-pham/' . $this->replace_all($this->M_images->check_name(array('video_library.id'=>$id))->thumb))); {
                @unlink('./uploads/san-pham/' . $this->replace_all($this->M_images->check_name(array('video_library.id'=>$id))->thumb));
            }
        }


        if (count($this->M_images->get_img_orther(array('img_video_library.id_video_library'=>$id))) != 0) {
            foreach ($this->M_images->list_img_orther(array('img_video_library.id_video_library'=>$id)) as $row){
                if ($this->M_images->get_img_orther(array('img_video_library.id'=>$row->id_img))->thumb_orther != NULL) {
                    if (file_exists('./uploads/san-pham/' . $this->replace_all($this->M_images->get_img_orther(array('img_video_library.id'=>$row->id_img))->thumb_orther))) {
                        unlink('./uploads/san-pham/' . $this->replace_all($this->M_images->get_img_orther(array('img_video_library.id'=>$row->id_img))->thumb_orther));
                    }
                }

                $where = array('img_id' => $row->id);
                $this->db->delete('img_album', $where);

            }
        }

        $where = array('id_video_library' => $id);
        $this->db->delete('video_library_detail', $where);
        $where = array('id' => $id);
        $this->db->delete('video_library', $where);
        redirect('back/library/index/'.$type);

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

    function _resizeimage($fileName) {
        //$url = substr(base_url(),0,-4);
        $config['image_library'] = 'gd2';
        $config['source_image'] = './uploads/san-pham' . $fileName;
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        $this->image_lib->clear();
    }
    function ChuoiNgauNhien($sokytu){$giatri='';
        $chuoi="ABCDEFGHIJKLMNOPQRSTUVWXYZWabcdefghijklmnopqrstuvwxyzw0123456789";
        for ($i=0; $i < $sokytu; $i++){
            $vitri = mt_rand( 0 ,strlen($chuoi) );
            $giatri=$giatri . substr($chuoi,$vitri,1 );
        }
        return $giatri;
    }

    function replace_all($string) {
        $url = 'uploads/san-pham/';
        $string = str_replace($url, '', $string);
        return $string;
    }
    function anhien12($id, $fr, $wh) {
        $wh = $wh . '="' . $id . '"';
        $sql = "select status from $fr where $wh";
        $kq = $this->LaySQL($sql);
        foreach ($kq as $t)
            $status = $t->status;
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
        $sql = "UPDATE $fr SET status = $status WHERE $wh";
        $this->db->query($sql);
        return "AnHien_{$status}.png";
    }
    public function chekpage() {

        $chek1 = $this->M_images->check_name(array('video_library_detail.name_link'=>$this->Title->changeTitle($_POST['name_vn'])));

        if (!empty($chek1)) {
            $this->form_validation->set_message('chekpage', "Tên bài viết tiếng việt trong cơ sở dữ liệu");
            return FALSE;
        } else {
            return true;
        }
    }
    public function chekpage_en() {
        $chek1 = $this->M_images->check_name(array('video_library_detail.name_link'=>$this->Title->changeTitle($_POST['name_en'])));

        if (!empty($chek1)) {
            $this->form_validation->set_message('chekpage', "Tên bài viết tiếng anh có trong cơ sở dữ liệu");
            return FALSE;
        } else {
            return true;
        }
    }
    public function chekpage_edit() {

        $chek1 = $this->M_artice->chekpage_edit($this->Title->changeTitle($_POST['name_vn']),$this->uri->segment(5));

        if (!empty($chek1)) {
            $this->form_validation->set_message('chekpage', "Tên bài viết tiếng việt trong cơ sở dữ liệu");
            return FALSE;
        } else {
            return true;
        }
    }
    public function chekpage_edit_en() {

        $chek1 = $this->M_artice->chekpage_edit($this->Title->changeTitle($_POST['name_vn']),$this->uri->segment(5));

        if (!empty($chek1)) {
            $this->form_validation->set_message('chekpage_edit_en', "Tên bài viết tiếng anh có trong cơ sở dữ liệu");
            return FALSE;
        } else {
            return true;
        }
    }
    function noibat($id, $fr, $wh) {
        $wh = $wh . '="' . $id . '"';
        $sql = "select hot from $fr where $wh";
        $kq = $this->Title->LaySQL($sql);
        foreach ($kq as $t)
            $status = $t->hot;
        if ($status == 1)
            $status = 0;
        else
            $status = 1;
        echo $this->noibat2($fr, $status, $wh);
    }
    function noibat2($fr,$status,$wh){
        $sql = "UPDATE $fr SET hot = $status WHERE $wh";
        $this->db->query($sql);
        return "noibat_{$status}.png";
    }

}
?>