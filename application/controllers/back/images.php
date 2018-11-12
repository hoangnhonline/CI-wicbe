<?php

class Images extends CI_Controller {

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
    public function index($album_parent = 0,$page_no = 1){
        if (!$this->M_session->userdata('admin_login'))
            redirect(site_url('admin/login')); 
          if(isset($_GET['TieuDe'])) {$a=$this->KtraStr($_GET['TieuDe']);}else{$a='';};
        $data['view']='back/images/list';
        $data['album_parent']=$album_parent;
        $data['images']='images';
        $data['mod']='images_'.$album_parent;
        $page_co = 20;
        $start = ($page_no - 1) * $page_co;
        $count = $this->M_images->count_img($album_parent);
        $data['page_no'] = $page_no;
       $data['list']=  $this->M_images->list_img($album_parent,$page_co, $start,$a);
        $data['link'] = $this->Title->paging($page_co, $count, 'back/images/index/', $page_no);
    //    $data['list']=  $this->M_images->list_img($page_co, $start,$a);
         $this->load->view('back/v_admin',$data);
    }
    function KtraStr($str){
		$str=trim(strip_tags(mysql_real_escape_string($str)));
		return $str;
	}
     public function add($album_parent){
        if (!$this->M_session->userdata('admin_login'))
            redirect(site_url('admin/login')); 
        $data['view']='back/images/add';
        $data['images']='images';
         $data['album_parent']=$album_parent;
        $data['mod']='images_'.$album_parent;
        if(isset($_POST['ok'])){

            $this->form_validation->set_rules('name_vn', 'tiêu đề tiếng việt', 'trim|required|callback_chekpage_edit');
            $this->form_validation->set_rules('name_en', 'tiêu đề tiếng anh', 'trim|required|callback_chekpage_edit_en');
            $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
            $this->form_validation->set_message('chekpage_edit', 'Tên viết tiếng viêt có trong cơ sở dữ liệu');
            $this->form_validation->set_message('chekpage_edit_en', 'Tên bài viết tiếng anh trong cơ sở dữ liệu');


            if ($this->form_validation->run() == TRUE) {
             $sql = array(
                    'author' => $this->M_session->userdata('admin_login')->user_id,
                    'date_create'=>time(),
                    'weight'=>$_POST['weight'],
                 'album_parent'=>$album_parent

                );
                $this->db->insert('album', $sql);
                $abum_id = $this->db->insert_id();
                  $img = $this->Title->uploadhinh();
                $sql = array(
                    'author' => $this->M_session->userdata('admin_login')->user_id,
                    'thumb' => $img,
                    'link'=>$_POST['link'],
                );
                $this->db->insert('images', $sql);
                $image_id = $this->db->insert_id();
                 $sql = array(
                    'album_id' => $abum_id,
                    'image_id'=>$image_id,
                );
                  $this->db->insert('imagealbum', $sql);
                 foreach ($this->M_artice->show_list_lang() as $lang) {
           if($lang->name=='vn'){$title=$_POST['name_vn'];}elseif($lang->name=='en'){$title=$_POST['name_en'];}elseif($lang->name=='jp'){$title=$_POST['name_en'];};
                  $sql = array(
                   
                    'image_id' => $image_id,
                    'images_link'=>  $this->Title->changeTitle($title),
                    'images_name'=>$this->input->post('name_' . $lang->name),
                    'country_id'=>$lang->id,  
                );
                $this->db->insert('imagedetail', $sql);
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
                           'thumb' => $big_image,
                           'thumb_id'=>$image_id,
                );
                $this->db->insert('images', $sql);
                $id_other =  $this->db->insert_id();
                 $sql = array(
                    'album_id' => $abum_id,
                    'img_id'=>$id_other,
                );
                  $this->db->insert('img_album', $sql);
                         }
                   }
        }
        redirect('back/images/index/'.$album_parent);
}}
      $this->load->view('back/v_admin',$data);
}
public function edit($album_parent,$id){
      $data['view']='back/images/edit';
        $data['images']='images';
        $data['mod']='images_'.$album_parent;
         $data['album_parent']=$album_parent;

        $data['id']=$id;
      //  echo $this->M_images->get_id_img_daidien($id)->id; die();

        if(isset($_POST['ok'])){

                 $sql = array(
                   'weight'=>$_POST['weight'],

                );
               $this->db->where('id',$id);
               $this->db->update('album', $sql); 
            $img = $this->Title->uploadhinh();
            if ($_FILES['img']['name'] != '') {
                
                if ($this->M_images->get_id_img_daidien($id)->thumb != NULL) {
                    if (file_exists('./uploads/san-pham/' . $this->replace_all($this->M_images->get_id_img_daidien($id)->thumb)))
                        ; {
                        @unlink('./uploads/san-pham/' . $this->replace_all($this->M_images->get_id_img_daidien($id)->thumb));
                    }
                }
                $sql = array(
                    
                    'thumb' => $img,
                    
                );
           
            $this->db->where('id', $this->M_images->get_id_img_daidien($id)->id);
            $this->db->update('images', $sql);
             }
              foreach ($this->M_artice->show_list_lang() as $lang) {
                    if($lang->name=='vn'){$title=$_POST['name_vn'];}elseif($lang->name=='en'){$title=$_POST['name_en'];}elseif($lang->name=='jp'){$title=$_POST['name_en'];};
                  $sql = array(
                    'images_name'=>$this->input->post('name_' . $lang->name),
                    'images_link'=>  $this->Title->changeTitle($title),
                );
                  $this->db->where('image_id',$this->M_images->get_id_img_daidien($id)->id);
                $this->db->where('country_id',$lang->id);
                 $this->db->update('imagedetail', $sql);  
              }
            $sql = array(
                'link'=>$_POST['link'],
            );
            $this->db->where('id',$this->M_images->get_id_img_daidien($id)->id);
            $this->db->update('images', $sql);
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
                           'thumb' => $big_image,
                        
                );
                $this->db->insert('images', $sql);
                $id_other =  $this->db->insert_id();
                 $sql = array(
                    'album_id' => $id,
                    'img_id'=>$id_other,
                );
                  $this->db->insert('img_album', $sql);
                         }
                   }
        }
        redirect('back/images/edit/'.$album_parent.'/'.$id);
        }
    $this->load->view('back/v_admin',$data);
}
function delete_img($album_parent,$album_id = 0, $id_img = 0) {
        //  echo $this->M_item->show_thum_o($id_img)->thumb;die();
        if ($this->M_images->get_img_album($id_img)->thumb != NULL) {
            if (file_exists('./uploads/san-pham/' . $this->replace_all($this->M_images->get_img_album($id_img)->thumb))) {
                unlink('./uploads/san-pham/' . $this->replace_all($this->M_images->get_img_album($id_img)->thumb));
            }
        }
       
        $where = array('id' => $id_img);
        $this->db->delete('images', $where);
        
            $where = array('img_id' => $id_img);
            $this->db->delete('img_album', $where);
        
        redirect(site_url('back/images/edit/'.$album_parent.'/'. $album_id) . '?messager=success');
    }
public function delete($id){
     if ($this->M_images->get_img_album_dellete($id)->thumb != NULL) {
            if (file_exists('uploads/san-pham/' . $this->replace_all($this->M_images->get_img_album_dellete($id)->thumb))) {
                unlink('uploads/san-pham/' . $this->replace_all($this->M_images->get_img_album_dellete($id)->thumb));
            }
        }
         $where = array('id' => $this->M_images->get_img_album_dellete($id)->img_id_album);
          $this->db->delete('images', $where);
          if ($this->M_images->count_image_album($id) != 0) {
                foreach ($this->M_images->show_list_item_image($id) as $row) {
                    if ($this->M_images->show_list_item_image_id($row->id)->thumb != NULL) {
                        if (file_exists('uploads/san-pham/' . $this->M_images->show_list_item_image_id($row->id)->thumb)) {
                            unlink('uploads/san-pham/' . $this->M_images->show_list_item_image_id($row->id)->thumb);
                        }
                    }
                
                $where = array('img_id' => $row->id);
                $this->db->delete('img_album', $where);
                $where = array('id' => $row->id);
                $this->db->delete('images', $where);
                }
            }
        foreach ($this->M_artice->show_list_lang() as $lang) {
            $where = array('image_id' => $this->M_images->delete_img_album($id)->image_id);
            $this->db->delete('imagedetail', $where);
           }
           $where = array('album_id' => $id);
             $this->db->delete('imagealbum', $where);
            $where = array('id' => $id);
             $this->db->delete('album', $where);
            redirect('back/images/index');
       
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

        $chek1 = $this->M_artice->chekpage($this->Title->changeTitle($_POST['name_vn']));

        if (!empty($chek1)) {
            $this->form_validation->set_message('chekpage', "Tên bài viết tiếng việt trong cơ sở dữ liệu");
            return FALSE;
        } else {
            return true;
        }
    }
    public function chekpage_en() {

        $chek1 = $this->M_artice->chekpage($this->Title->changeTitle($_POST['name_en']));

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

}
?>