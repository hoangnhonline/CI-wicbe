<?php
class Thongtin_web extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Title');
    }
    
    function show_list_lang() {
        $this->db->where('status',1);
        return $this->db->get('country')->result();
    }

    //=========================tin danh muc===============================

   function show_company($id){
        $this->db->where("company.id",$id);
		$this->db->from('company');
		return $this->db->get()->row();
	}

        function show_company_lang($id,$lang){
		$this->db->select("companydetail.name,company.logo,company.email,company.logo_detail,companydetail.footer,companydetail.youtube,companydetail.in,companydetail.wellcome,companydetail.meta_keywords,companydetail.meta_description,companydetail.office,companydetail.detail,companydetail.address,companydetail.address_2,company.copyright");
        $this->db->where("company.id",$id);
		$this->db->where("country.name",$lang);
		$this->db->from('company');
		$this->db->join('companydetail','companydetail.id_company=company.id');
		$this->db->join('country','companydetail.id_country=country.id');
		return $this->db->get()->row();
	}
         function get_article_all($id,$lang){
		$this->db->select("articledetail.article_name,articledetail.article_summary,article.id,article.date_create,article.date_modify,article.article_status");
		$this->db->where("country.name",$lang);
		$this->db->where("article.id",$id);
		$this->db->order_by('article.article_weight',"ASC");
		$this->db->from('article');
		$this->db->join('articledetail','articledetail.article_id=article.id');
		$this->db->join('country','articledetail.country_id=country.id');
		return $this->db->get()->row();
	}



     function ThongTinSes($ses){
    
		$ses_arr=explode('-',$ses);$sessionTime = 2;

	 	//$ipAddress = $ses_arr[1]; 
		//$userAgent = $ses_arr[2];		
		//$lastVisit = $ses_arr[3];
		//$session_start = $ses_arr[3];
     //           echo count('session_user',$session_start);
		$idSession = $ses_arr[0];				
		$sql = "SELECT session FROM user_online WHERE session='".$idSession."'";
		$kq = $this->db->query($sql);		
		if ($kq->num_rows()>0 ){ 
			$this->time1 = time();	
 			$this->db->update('user_online', $this,array('session'=>$idSession));	
		} else { 
			$this->session = $idSession;
			$this->time = time();
			//$this->ses_start = $session_start;
			//$this->session = $idSession;		
			$this->db->insert('user_online', $this);
                        $this->demtruycap(1);
		}	
		$sql="DELETE FROM user_online WHERE unix_timestamp() - time >= $sessionTime * 60";
		$this->db->query($sql);	
//		return $userAgent;	
	}	
        public function demtruycap($id){
            $data=array(
                'dem'=> $this->truycap(1)->dem + 1,
            );
            $this->db->where('id',$id);
            $this->db->update('truycap',$data);	
        }
        public function truycap($id){
            $this->db->where('id',$id);
           $query =$this->db->get('truycap');
            return $query->row();
        }
        function ThongKe(){	
		$sql="SELECT sum(if(session ='' , 1 , 0)) As Khach,count(*) As Tong FROM user_online";	
		$kq=$this->db->query($sql);
		return $kq->result();	
	}

    function cuont_truycap(){
        $kq = $this->db->get('user_online');
        return $kq->num_rows();
    }
    function count_table_where($where=array(),$table){
        $this->db->where($where);
        $this->db->from($table);
        return $this->db->get()->num_rows();
    }


}

?>