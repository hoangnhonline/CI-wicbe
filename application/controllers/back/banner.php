<?php

class Banner extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form', 'text', 'file'));
        $this->load->library(array('form_validation', 'ftp'));
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('M_session');
        $this->load->model('Title');
        $this->load->model('M_admin');
        $this->load->model('M_banner');
    }
    public function index($type=0,$page_no=1){
      if (!$this->M_session->userdata('admin_login')) redirect(site_url('admin/login'));
        $data['view']='back/banner/list';
         $data['type']= $type;
        $data['bannner']='bannner';
        $data['mod']='banner_'.$type;
        $page_co = 20;
        $start = ($page_no - 1) * $page_co;
        $count = $this->M_banner->could_banner($type);
        $data['page_no'] = $page_no;
        $data['list']= $this->M_banner->list_banner(array('type'=> $type),$page_co, $start);
        $data['link'] = $this->Title->paging($page_co, $count, 'back/banner/index/'.$type.'/', $page_no);
        $this->load->view('back/v_admin',$data);
    }
    public function add($type=0){
        if (!$this->M_session->userdata('admin_login')) redirect(site_url('admin/login'));
         $data['view']='back/banner/add';
         $data['mod']='banner_'.$type;
          $data['type']= $type;
         if(isset($_POST['ok'])){
             $img=  $this->Title->uploadhinh();
         $sql=array(
             'name'=>$_POST['name'],
             'img'=>$img,
             'type'=>$type,
             'status'=>$_POST['status'],
             'name_link' => $this->Title->changeTitle($this->input->post('name')),
             'hot'=>$_POST['hot'],
             'link'=>$_POST['link'],
             'weight'=>$_POST['weight'],
             'time'=>time(),
         );
         $this->db->insert('banner',$sql);
             redirect('back/banner/index/'.$type);
         }
        $this->load->view('back/v_admin',$data);
    }
    public function edit($type,$id){
        if (!$this->M_session->userdata('admin_login')) redirect(site_url('admin/login'));
        $data['view']='back/banner/edit';
         $data['mod']='banner';
          $data['mod']='banner_'.$type;
          $data['type']= $type;
        $data['row']= $this->M_banner->get_id_banner($id);
         if(isset($_POST['ok'])){
             if(isset($_FILES['img']['name']) && $_FILES['img']['name']!=''){
                 if($this->M_banner->get_id_banner($id)->img!=NULL){
			if(file_exists('./uploads/san-pham/'.$this->replace_all($this->M_banner->get_id_banner($id)->img)));
			{
				@unlink('./uploads/san-pham/'.$this->replace_all($this->M_banner->get_id_banner($id)->img));
			}
		}
                 $img=  $this->Title->uploadhinh();
                 $sql=array(
                     'img'=>$img,
                 );
                 $this->db->where('id',$id);
                 $this->db->update('banner',$sql);
             }

             $sql=array(
                 'name'=>$_POST['name'],
                 'type'=>$type,
                 'status'=>$_POST['status'],
                 'name_link' => $this->Title->changeTitle($this->input->post('name')),
                 'hot'=>$_POST['hot'],
                 'link'=>$_POST['link'],
                 'weight'=>$_POST['weight'],
                 'time'=>time(),
             );
             $this->db->where('id',$id);
             $this->db->update('banner',$sql);
             redirect('back/banner/index/'.$type);
         }
        $this->load->view('back/v_admin',$data);
    }

    public function delete($type,$id){
        if($this->M_banner->get_id_banner($id)->img != NULL){
                            if (file_exists('./uploads/san-pham/' . $this->replace_all($this->M_banner->get_id_banner($id)->img))); {
                                @unlink('./uploads/san-pham/' . $this->replace_all($this->M_banner->get_id_banner($id)->img));
                        }
             }
             $where=array('id'=>$id);
             $this->db->delete('banner',$where);
             redirect('back/banner/index/'.$type);
             
    }
            function anhien12($id, $fr, $wh) {
        $wh = $wh . '="' . $id . '"';
        $sql = "select status from $fr where $wh";
        $kq = $this->Title->LaySQL($sql);
        foreach ($kq as $t)
            $status = $t->status;
        if ($status == 1)
            $status = 0;
        else
            $status = 1;
        echo $this->AnHien($fr, $status, $wh);
    }
    function AnHien($fr,$status,$wh){		 
		$sql = "UPDATE $fr SET status = $status WHERE $wh";
		$this->db->query($sql);
		return "AnHien_{$status}.png";
}
function replace_all($string) {
        $url = 'uploads/san-pham/';
        $string = str_replace($url, '', $string);
        return $string;
    }
}
?>