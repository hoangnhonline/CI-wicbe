<?php

class Video extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form', 'text', 'file'));
        $this->load->library(array('form_validation', 'ftp'));
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('M_session');
        $this->load->model('M_category');
        $this->load->model('Title');
        $this->load->model('M_admin');
        $this->load->model('M_artice');
    }
    public function index ($page_no=1){
        if (!$this->M_session->userdata('admin_login'))
            redirect(site_url('admin/login')); 
                $data['mod'] = 'video';
 if(isset($_GET['TieuDe'])) {$a=$this->KtraStr($_GET['TieuDe']);}else{$a='';};
         $data['view']="back/page/list";

         $page_co = 20;
        
        $start = ($page_no - 1) * $page_co;
        $count = $this->M_artice->count_page(array('article_type'=>4));
        $data['page_no'] = $page_no;
        $data['list']= $this->M_artice->show_list_page(array('article.article_type'=> 4),$page_co, $start,$a);
        $data['link'] = $this->Title->paging($page_co, $count, 'back/video/index/', $page_no);
        $data['view'] = "back/video/list";
         $this->load->view('back/v_admin', $data);
    }
     function KtraStr($str){
		$str=trim(strip_tags(mysql_real_escape_string($str)));
		return $str;
	}
    public function add(){
        if (!$this->M_session->userdata('admin_login'))
            redirect(site_url('admin/login')); 
           $data['mod'] = 'video';
           $data['view'] = "back/video/add";
             if(isset($_POST['ok'])){
 
            $sql = array(
                 'article_weight' => $this->input->post('article_weight'),
                    'article_status' => $_POST['status'],
                //    'article_weight' => $this->input->post('article_weight'),
                    'article_type' => 4,
                    'date_modify' => date('Y-m-d H:i:s'),
                    'date_create' => date('Y-m-d H:i:s'),
                    'author' => $this->M_session->userdata('admin_login')->user_id,
                );
                $this->db->insert('article', $sql);
                $article = $this->db->insert_id();
                
            foreach ($this->M_artice->show_list_lang() as $lang) {
if($lang->name=='vn'){$title=$_POST['name_vn'];}elseif($lang->name=='en'){$title=$_POST['name_en'];}elseif($lang->name=='jp'){$title=$_POST['name_en'];};
                    $sql = array(
                        'article_id' => $article,
                        'country_id' => $lang->id,
                        'article_name' => $this->input->post('name_' . $lang->name),
                        'article_link' => $this->Title->changeTitle($title),
                        
                       // 'article_description' => $this->input->post('description_' . $lang->name),
                        'link' => $this->input->post('link_' . $lang->name),
                         
                    );
                    $this->db->insert('articledetail', $sql);
                }
                $img = $this->Title->uploadhinh();
                $sql=array(
                    'thumb'=>$img,
                    'date_create'=>date('Y-m-d H:i:s'),
                     'author' => $this->M_session->userdata('admin_login')->user_id,
                );
                $this->db->insert('images',$sql);
                $images = $this->db->insert_id();

                    $sql = array(
                        'article_id' => $article,
                        'image_id' => $images,);
                    $this->db->insert('articleimages', $sql);
             
            
            redirect('back/video/index');
        }
        
         $this->load->view('back/v_admin', $data);
    }
     public function edit($id){
        if (!$this->M_session->userdata('admin_login'))
            redirect(site_url('admin/login')); 
        $data['view'] = "back/video/edit";
         $data['id'] = $id;
                $data['mod'] = 'video';
 $data['img']= $this->M_artice->show_thumb($id);
       
           if (isset($_POST['ok'])) {
            $sql = array(
                'article_status' => $_POST['status'],
                'article_type' =>4,
                'date_modify' => date('Y-m-d H:i:s'),
              'article_weight' => $this->input->post('article_weight'),
            );
            $this->db->where('id', $id);
            $this->db->update('article', $sql);
            foreach ($this->M_artice->show_list_lang() as $lang) {
                 if($lang->name=='vn'){$title=$_POST['name_vn'];}elseif($lang->name=='en'){$title=$_POST['name_en'];}elseif($lang->name=='jp'){$title=$_POST['name_en'];};
           
                $sql = array(
                    'article_name' => $_POST['name_' . $lang->name],
                 //   'article_summary' => $_POST['sum_' . $lang->name],
                //    'article_content'=>$_POST['editor_'.$lang->name],
                    'article_link' => $this->Title->changeTitle($title),
                 //   'article_keywords' => $_POST['keywords_' . $lang->name],
                 //   'article_description' => $_POST['description_' . $lang->name],
                    'link' => $this->input->post('link_' . $lang->name),
                );
                $this->db->where('article_id', $id);
                $this->db->where('country_id', $lang->id);
                $this->db->update('articledetail', $sql);
            }
            if (isset($_FILES['img']['name']) && $_FILES['img']['name'] != '') {
              //  echo $this->M_artice->show_thumb($id)->thumb;die();
                if($this->M_artice->show_thumb($id)->thumb != NULL){

                            if (file_exists('./uploads/san-pham/' . $this->replace_all($this->M_artice->show_thumb($id)->thumb))); {
                                @unlink('./uploads/san-pham/' . $this->replace_all($this->M_artice->show_thumb($id)->thumb));
                        }
                }
                $this->M_artice->up_img_article_baiviet($this->M_artice->show_thumb($id)->id,1);
            } else {
                $this->M_artice->up_img_article_baiviet($this->M_artice->show_thumb($id)->id,0);
            }
            redirect('back/video/index');
             }
        
         $this->load->view('back/v_admin', $data);
    }
    public function delete($id=0){
        if($this->M_artice->show_thumb($id)->thumb != NULL){

                            if (file_exists('./uploads/san-pham/' . $this->replace_all($this->M_artice->show_thumb($id)->thumb))); {
                                @unlink('./uploads/san-pham/' . $this->replace_all($this->M_artice->show_thumb($id)->thumb));
                        }
                }
                
            $where = (array('id' => $id,'article_type' => 4));
        $this->db->delete('article', $where);
        
         $where = (array('article_id' => $id));
        $this->db->delete('articledetail', $where);
        
         $where = (array('id' =>$this->M_artice->get_id_imgages($id)));
        $this->db->insert('images', $where);
        $where = (array('id' =>$this->M_artice->get_id_imgages($id)));
        $this->db->insert('articleimages', $where);
        redirect('back/video/index/');
    }
    public function chekpage() {
        foreach ($this->M_artice->show_list_lang() as $lang) {
$chek1 = $this->M_artice->chekpage(array('article_link'=>$this->Title->changeTitle($_POST['name_' . $lang->name])));
        }
        if (!empty($chek1)) {
            $this->form_validation->set_message('chekpage', "Tên video có trong cơ sở dữ liệu");
            return FALSE;
        } else {
            return true;
        }
    }
      function replace_all($string) {
        $url = 'uploads/san-pham/';
        $string = str_replace($url, '', $string);
        return $string;
    }
    function anhien12($id, $fr, $wh) {
        $wh = $wh . '="' . $id . '"';
        $sql = "select article_status from $fr where $wh";
        $kq = $this->Title->LaySQL($sql);
        foreach ($kq as $t)
            $status = $t->article_status;
        if ($status == 1)
            $status = 0;
        else
            $status = 1;
        echo $this->AnHien($fr, $status, $wh);
    }
    function AnHien($fr,$status,$wh){		 
		$sql = "UPDATE $fr SET article_status = $status WHERE $wh";
		$this->db->query($sql);
		return "AnHien_{$status}.png";
}
function noibat($id, $fr, $wh) {
        $wh = $wh . '="' . $id . '"';
        $sql = "select article_hot from $fr where $wh";
        $kq = $this->Title->LaySQL($sql);
        foreach ($kq as $t)
            $noibat = $t->article_hot;
        if ($noibat == 1)
            $noibat = 0;
        else
            $noibat = 1;
        echo $this->noibat1($fr, $noibat, $wh);
    }

    function noibat1($fr, $noibat, $wh) {
        $sql = "UPDATE $fr SET article_hot = $noibat WHERE $wh";
        $this->db->query($sql);
        return "noibat_{$noibat}.png";
    }
}
?>