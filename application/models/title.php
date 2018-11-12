<?php 
class Title extends CI_Model{
    var $_images_path = "";
    var $_images_url = "";
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('url', 'text', 'form', 'file'));
        $this->_images_url = "uploads/san-pham";
        $this->_images_path = realpath(APPPATH . "../uploads/san-pham");
    }
    function stripUnicode($str) {
        if (!$str)
            return false;
        $unicode = array(
            'a' => 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
            'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd' => 'đ',
            'D' => 'Đ',
            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i' => 'í|ì|ỉ|ĩ|ị',
            'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
            'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
        );
        foreach ($unicode as $khongdau => $codau) {
            $arr = explode("|", $codau);
            $str = str_replace($arr, $khongdau, $str);
        }
        return $str;
    }

    function changeTitle($str) {
        //exit('aa');
        $str = $this->stripUnicode($str);
        $str = str_replace("?", " ", $str);
        $str = str_replace("&", " ", $str);
        $str = str_replace("'", " ", $str);
        $str = str_replace("/", " ", $str);
        $str = str_replace("\\", " ", $str);
        $str = str_replace(",", " ", $str);
        $str = str_replace(".", " ", $str);
        $str = str_replace("…", " ", $str);
        $str = str_replace("(", " ", $str);
        $str = str_replace(")", " ", $str);
        $str = str_replace("]", " ", $str);
        $str = str_replace("[", " ", $str);
        $str = str_replace("}", " ", $str);
        $str = str_replace("{", " ", $str);
        $str = str_replace(">", " ", $str);
        $str = str_replace("<", " ", $str);
        $str = str_replace("$", " ", $str);
        $str = str_replace("*", " ", $str);
        $str = str_replace("-", " ", $str);
        $str = str_replace("@", " ", $str);
        $str = str_replace("#", " ", $str);
        $str = str_replace("_", " ", $str);
        $str = str_replace("–", " ", $str);
        $str = str_replace("!", " ", $str);
        $str = str_replace("+", " ", $str);
        $str = str_replace("|", " ", $str);
        $str = str_replace('”', " ", $str);
        $str = str_replace('“', " ", $str);
        $str = str_replace('"', ' ', $str);
        $str = str_replace(';', ' ', $str);
        $str = str_replace(':', ' ', $str);
        $str = str_replace('%', ' ', $str);
        $str = str_replace('&', ' ', $str);
        $str = trim($str);
        $str = mb_convert_case($str, MB_CASE_LOWER, 'utf-8');
        // MB_CASE_UPPER/MB_CASE_TITLE/MB_CASE_LOWER
        $str = preg_replace('/[\s]+/mu', ' ', $str);
        $str = str_replace(" ", "-", $str);
        return $str;
    }
    function uploadhinh(){
        $config = array('upload_path'   => $this->_images_path,
                        'allowed_types' => 'gif|jpg|png|jpeg',
                        'max_size'      => '8000',
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
    function uploadhinh1($name){
        $config = array('upload_path'   => $this->_images_path,
            'allowed_types' => 'gif|jpg|png|jpeg',
            'max_size'      => '8000',
            'file_name'     => $this->changeTitle($name).'-'.$this->ChuoiNgauNhien(3));
        $this->load->library("upload",$config);
        if(!$this->upload->do_upload("img")){
            return false;
        }else{
            $data = $this->upload->data();
            $name = $this->_images_url.'/'.$config['file_name'].$data['file_ext'];
            return $name;
        }
    }
    function images_img(){
        $config = array('upload_path'   => $this->_images_path,
                        'allowed_types' => 'gif|jpg|png|jpeg',
                        'max_size'      => '8000',
						'file_name'     => $this->ChuoiNgauNhien(50));
        $this->load->library("upload",$config);
        if(!$this->upload->do_upload("img_other")){
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
        
  function LaySQL($sql) {
        $kq = $this->db->query($sql);
        return $kq->result();
    }
    function AnHien($fr,$status,$wh){		 
		$sql = "UPDATE $fr SET status = $status WHERE $wh";
		$this->db->query($sql);
		return "AnHien_{$status}.png";
}

    function time_format($date) {

        $langs = array('Giây', 'Phút', 'Giờ', 'Ngày', 'Tuần', 'Tháng', 'Năm');
        $chunks = array(
            array( 60 * 60 * 24 * 365 ,  $langs[6], $langs[6] ),
            array( 60 * 60 * 24 * 30 ,$langs[5], $langs[5] ),
            array( 60 * 60 * 24 * 7, $langs[4],$langs[4] ),
            array( 60 * 60 * 24 , $langs[3],$langs[3] ),
            array( 60 * 60 , $langs[2], $langs[2] ),
            array( 60 , $langs[1],$langs[1] ),
            array( 1,  $langs[0],$langs[0] )
        );

        $newer_date = time();
        $since = $newer_date - $date;
        if ( 0 > $since )
            return __( 'Gần đây', 'swhtd' );
        for ( $i = 0, $j = count($chunks); $i < $j; $i++) {
            $seconds = $chunks[$i][0];
            if ( ( $count = floor($since / $seconds) ) != 0 )
                break;
        }
        $output = ( 1 == $count ) ? '1 '. $chunks[$i][1] : $count . ' ' . $chunks[$i][2];
        if ( !(int)trim($output) ){
            $output = '0 ' .  $langs[0];
        }
        $output .= ' trước';
        return $output;
    }
public function paging($page,$total,$url,$id=1)
	{

		$previous_btn = true;
		$next_btn = true;
		$first_btn = true;
		$last_btn = true;
		//kiem tra


		$count=$total;
		$tongtrang=ceil($total/$page);
		$num="";

		if($count!=0)
		{
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
			$dau = "<li  class=''><a href='".site_url($url)."'>Đầu</a></li>";
		} else if ($first_btn) {
			$dau= "<li  class='text'>Đầu</li>";
		}

		// FOR ENABLING THE PREVIOUS BUTTON
		if ($previous_btn && $id > 1) {
			$tam=$id-1;
			$lui = "<li class=''><a href='".site_url($url. $tam)."'>Lùi</a></li>";
		} else if ($previous_btn) {
			$lui = "<li class='text'>Lùi</li>";
		}


		if ($next_btn && $id < $tongtrang) {
			$tam2=$id+1;
			$toi = "<li class=''><a href='".site_url($url. $tam2)."'> Tới </a></li>";
		} else if ($next_btn) {
			$toi = "<li class='text'>Tới</li>";
		}

		// TO ENABLE THE END BUTTON
		if ($last_btn && $id < $tongtrang) {
			$cuoi= "<li  class=''><a href='".site_url($url.$tongtrang)."'> Cuối </a></li>";
		} else if ($last_btn) {
			$cuoi = "<li class='text'>Cuối</li>";
		}
		if($count>0)
		{
			for($i=$start_loop;$i<=$end_loop;$i++)
			{
				if($i==$id)
				$num.="<li class='page'><a href='#' title='' onclick='return false'>$i</a></li>";
				else
				$num.="<li><a href='".site_url($url . $i)."' title=''>$i</a></li>";
			}
		}
		if($count>0&&$tongtrang>1)
		$link="
		<ul class='pagination'>
            
			".$dau.$lui.$num.$toi.$cuoi."
			
		</ul>
			";
		else
		$link='';

		return $link;

	}
        function randomPassword($n) {
     $chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.
            '0123456789';
		  $str = '';
		  $max = strlen($chars) - 1;
		
		  for ($i=0; $i < $n; $i++)
			$str .= $chars[rand(0, $max)];
		
		  return $str;
}
 function get_max($table, $var) {
        $this->db->select_max($var);
        $this->db->from($table);
        return $this->db->get()->row()->$var;
    }
function laychuoi($str,$bien){ $a='';
		$str=trim(strip_tags($str));
		if(strlen($str)<=$bien) return $str;
		$chuoi=explode(' ',$str);
		if(count($chuoi)==1) return substr($str,0,$bien);
		for($i=1;$i<100;$i++){
			$a="'".substr($str,$bien,1)."'";
			if($a=="' '") { 				
				$a= substr($str,0,$bien); 
				return $a.'...';
			}
			if(strlen($str)==$bien) return substr($str,0,$bien);
			$bien++;
		}	
	}
         function replace_all($string) {
        $url = 'uploads/san-pham/';
        $string = str_replace($url, '', $string);
        return $string;
    }
}
?>