<?php
class M_color extends CI_Model{
      var $_images_path = "";
    var $_images_url = "";
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Title');
        $this->load->helper(array('url', 'text', 'form', 'file'));
        $this->_images_url = "uploads/color";
        $this->_images_path = realpath(APPPATH . "../uploads/color");
    }
    public function show_color_all($where=array()){
        $this->db->where($where);
        $query = $this->db->get('color');
        return $query->result();
    }
    public function add(){
        $img=  $this->uploadhinh();
        $data=array(
            'name'=>$_POST['name'],
            'slug'=>  $this->Title->changeTitle($_POST['name']),
            'status'=>$_POST['status'],
            'weight'=>$_POST['weight'],
            'date_create'=>date('Y-m-d H:i:s'),
            'thumb'=>  $img,
        );
        $this->db->insert('color',$data);
    }
    
    public function edit($id,$p){
         $img=  $this->uploadhinh();
         if(isset($_REQUEST['ok']))
             if($p==1){
                 $data=array(
             'name'=>$_POST['name'],
             'thumb'=>$img,
             'status'=>$_POST['status'],
             'slug'=>$this->Title->changeTitle($_POST['name']),
             'weight'=>$_POST['weight'],
             'date_create'=>date('Y-m-d H:i:s'),
                     );
             }  else {
                 $data=array(
              'name'=>$_POST['name'],
             'status'=>$_POST['status'],
             'slug'=>$this->Title->changeTitle($_POST['name']),
             'weight'=>$_POST['weight'],
             'date_create'=>date('Y-m-d H:i:s'),
                     );
             }
         $this->db->where('id',$id);
         $this->db->update('color',$data);
     }
     public function get_id($id){
         $this->db->where('id',$id);
          $this->db->from('color');
       
        return $this->db->get()->row();
         
     }
             function replace_all($string) {
        $url = 'uploads/color/';
        $string = str_replace($url, '', $string);
        return $string;
    }
     function uploadhinh(){
        $config = array('upload_path'   => $this->_images_path,
                        'allowed_types' => 'gif|jpg|png|jpeg',
                        'max_size'      => '2000',
						'file_name'     => $this->ChuoiNgauNhien(50));
        $this->load->library("upload",$config);
        if(!$this->upload->do_upload("img")){
            return false;
        }else{
            $data = $this->upload->data();
			$name = $this->_images_url.'/'.$config['file_name'].$data['file_ext'];
			return $name;   
        }       
    }
    function ChuoiNgauNhien($sokytu){$giatri='';
		$chuoi="ABCDEFGHIJKLMNOPQRSTUVWXYZWabcdefghijklmnopqrstuvwxyzw0123456789";
		for ($i=0; $i < $sokytu; $i++){
			$vitri = mt_rand( 0 ,strlen($chuoi) );
			$giatri=$giatri . substr($chuoi,$vitri,1 );
		}
		return $giatri;
	}
        function count_table_where($where=array(),$table){
		$this->db->where($where);
		$this->db->from($table);
		return $this->db->get()->num_rows();
	}
        
}

?>