<?php
class model extends CI_Model{
	function __construct()
	{
		parent::__construct();
	}
	//===================================
	function catchuoi($str,$limit)
	{
		if(strlen($str)> $limit)
		{
			$re =  substr($str,0,$limit);
			$re =  substr($re, 0, strrpos($re, " "));
			$re .="...";
			return $re;
		}
		else
		{
			return $str;
		}

	}
	//==============================================
	function count_where($params)
	{
		if(isset($params["where"]))
		$this->db->where($params["where"]);
		if(isset($params["or_where"]))
		foreach($params["or_where"] as $or_where)
		$this->db->or_where($or_where);
		if(isset($params["like"]))
		$this->db->like($params["like"]);
		if(isset($params["f_order"]))
		{
			if(!isset($params["direction"]))
			$params["direction"] = "asc";
			$this->db->order_by($params["f_order"],$params["direction"]);
		}
		if(isset($params["distinct"]))
		$this->db->distinct();
		if(isset($params["limit"]))
		$this->db->limit($params["limit"],$params["offset"]);
		return $this->db->get($params["name_table"])->num_rows();
	}
	//=====================================================
	public function get_detail($params,$type = "object")
	{
		if(isset($params["select"]))
		$this->db->select($params["select"]);
		else
		$this->db->select("*");
		if(isset($params["where"]))
		$this->db->where($params["where"]);
		if(isset($params["f_order"]))
		$this->db->order_by($params["f_order"],$params["direction"]);
		$query = $this->db->get($params["name_table"]);
		if($type == "object")
		return $query->row();
		else
		return $query->row_array();
	}
	//======================================================
	public function get_data($params,$type="object")
	{
		if(isset($params["select"]))
		$this->db->select($params["select"]);
		else
		$this->db->select("*");
		if(isset($params["where"]))
		$this->db->where($params["where"]);
		if(isset($params["or_where"]))
        $this->db->or_where($params["or_where"]);
		//foreach($params["or_where"] as $or_where)
		//$this->db->or_where($or_where);
		if(isset($params["like"]))
		$this->db->like($params["like"]);
		if(isset($params["f_order"]))
		{
			if(!isset($params["direction"]))
				$params["direction"] = "asc";
			$this->db->order_by($params["f_order"],$params["direction"]);
		}
		if(isset($params["distinct"]))
		$this->db->distinct();
		if(isset($params["limit"]))
		$this->db->limit($params["limit"],$params["offset"]);
		$query = $this->db->get($params["name_table"]);
		if($type == "object")
		return $query->result();
		else
		return $query->result_array();
	}
    //==========================================================
    function item_same($params,$type="object"){
        if(isset($params["select"]))
		$this->db->select($params["select"]);
		else
		$this->db->select("*");
        if(isset($params["where"]))
		$this->db->where($params["where"]);
        if(isset($params["or_where"]))
		foreach($params["or_where"] as $or_where)
		$this->db->or_where($or_where);
		if(isset($params["like"]))
		$this->db->like($params["like"]);
		if(isset($params["f_order"]))
		{
			if(!isset($params["direction"]))
				$params["direction"] = "asc";
			$this->db->order_by($params["f_order"],$params["direction"]);
		}
		if(isset($params["distinct"]))
		$this->db->distinct();
		if(isset($params["limit"]))
		$this->db->limit($params["limit"],$params["offset"]);
        $this->db->from('item');
		$this->db->join('item_items','item.id_item = item_items.id_item');
		$this->db->join('items','item_items.id_items = items.id_items');
		$query = $this->db->get();
		if($type == "object")
		return $query->result();
		else
		return $query->result_array();    
    }
	//======================================================
	public function get_item_list($params,$type="object")
	{
		if(isset($params["select"]))
		$this->db->select($params["select"]);
		else
		$this->db->select("*");
		if(isset($params["where"]))
		$this->db->where($params["where"]);
		if(isset($params["or_where"]))
        $this->db->or_where($params["or_where"]);
		//foreach($params["or_where"] as $or_where)
		//$this->db->or_where($or_where);
		if(isset($params["like"]))
		$this->db->like($params["like"]);
		if(isset($params["f_order"]))
		{
			if(!isset($params["direction"]))
				$params["direction"] = "asc";
			$this->db->order_by($params["f_order"],$params["direction"]);
		}
		if(isset($params["distinct"]))
		$this->db->distinct();
		if(isset($params["limit"]))
		$this->db->limit($params["limit"],$params["offset"]);
		$this->db->from('item');
		$this->db->join('item_items','item_items.id_item=item.id_item');
		$query = $this->db->get();
		if($type == "object")
		return $query->result();
		else
		return $query->result_array();
	}
	//===========================================================
function unicode($text)
	{
		/*$str = mb_strtolower(trim($str),'UTF-8');
		if(!$str) return false;
		$unicode = array(
			'a'=>array('á','à','ả','ã','ạ','ă','ắ','ặ','ằ','ẳ','ẵ','â','ấ','ầ','ẩ','ẫ','ậ','á','à','ạ', 'á'),
			'A'=>array('Á','À','Ả','Ã','Ạ','Ă','Ắ','Ặ','Ằ','Ẳ','Ẵ','Â','Ấ','Ầ','Ẩ','Ẫ','Ậ'),
			'd'=>array('đ'),
			'D'=>array('Đ'),
			'e'=>array('é','è','ẻ','ẽ','ẹ','ê','ế','ề','ể','ễ','ệ', 'ẹ', 'é','ẹ', 'é', 'ẹ'),
			'E'=>array('É','È','Ẻ','Ẽ','Ẹ','Ê','Ế','Ề','Ể','Ễ','Ệ'),
			'i'=>array('í','ì','ỉ','ĩ','ị', 'ì', 'ì'),
			'I'=>array('Í','Ì','Ỉ','Ĩ','Ị'),
			'o'=>array('ó','ò','ỏ','õ','ọ','ô','ố','ồ','ổ','ỗ','ộ','ơ','ớ','ờ','ở','ỡ','ợ','ó'),
			'0'=>array('Ó','Ò','Ỏ','Õ','Ọ','Ô','Ố','Ồ','Ổ','Ỗ','Ộ','Ơ','Ớ','Ờ','Ở','Ỡ','Ợ'),
			'u'=>array('ú','ù','ủ','ũ','ụ','ư','ứ','ừ','ử','ữ','ự'),
			'U'=>array('Ú','Ù','Ủ','Ũ','Ụ','Ư','Ứ','Ừ','Ử','Ữ','Ự'),
			'y'=>array('ý','ỳ','ỷ','ỹ','ỵ'),
			'Y'=>array('Ý','Ỳ','Ỷ','Ỹ','Ỵ'),
			''=>array(',','.','^',':','"','|','/','~',')','(','%','!','&','*','!','@','#','$','(',')','®','+',"'",'`',"\\",'<','>','?','_','[',']','{','}','acute;','circ;','grave',';', '”', '“', '…'),
			'-'=>array('&quot;','.',' - ',' ','--','---', '-–-')
						);
  	        foreach($unicode as $nonUnicode=>$uni)
				{
					foreach($uni as $value)
					$str = str_replace($value,$nonUnicode,trim($str));
				}
    	return $str;*/
    //global $ibforums;
//Charachters must be in ASCII and certain ones aint allowed
$text = html_entity_decode ($text);
$text = preg_replace("/(ä|à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $text);
$text = str_replace("ç","c",$text);
$text = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $text);
$text = preg_replace("/(ì|í|î|ị|ỉ|ĩ)/", 'i', $text);
$text = preg_replace("/(ö|ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $text);
$text = preg_replace("/(ü|ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $text);
$text = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $text);
$text = preg_replace("/(đ)/", 'd', $text);
//CHU HOA
$text = preg_replace("/(Ä|À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'a', $text);
$text = str_replace("Ç","a",$text);
$text = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'e', $text);
$text = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'i', $text);
$text = preg_replace("/(Ö|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'o', $text);
$text = preg_replace("/(Ü|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'u', $text);
$text = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'y', $text);
$text = preg_replace("/(Đ)/", 'd', $text);
//Special string


$text = str_replace(" / ","-",$text);
$text = str_replace("/","-",$text);
$text = str_replace(" - ","-",$text);
$text = str_replace("_","-",$text);
$text = str_replace(" ","-",$text);
$text = str_replace( "ß", "ss", $text);
$text = str_replace( "&", "", $text);
$text = str_replace( "%", "", $text);
$text = ereg_replace("[^A-Za-z0-9-]", "", $text);

$text = str_replace("----","-",$text);
$text = str_replace("---","-",$text);
$text = str_replace("--","-",$text);
$text = preg_replace("/( |!||#|$|%|')/", '', $text);
$text = preg_replace("/(̀|́|̉|$|>)/", '', $text);
$text = preg_replace ("'<[\/\!]*?[^<>]*?>'si", "", $text);
$text = strtolower($text);
return $text;
	}
	function convert_search($str)
	{
		$str = trim($str);
		$unicode = array(
			'a'=>array('á','à','ả','ã','ạ','ă','ắ','ặ','ằ','ẳ','ẵ','â','ấ','ầ','ẩ','ẫ','ậ'),
			'A'=>array('Á','À','Ả','Ã','Ạ','Ă','Ắ','Ặ','Ằ','Ẳ','Ẵ','Â','Ấ','Ầ','Ẩ','Ẫ','Ậ'),
			'd'=>array('đ'),
			'D'=>array('Đ'),
			'e'=>array('é','è','ẻ','ẽ','ẹ','ê','ế','ề','ể','ễ','ệ'),
			'E'=>array('É','È','Ẻ','Ẽ','Ẹ','Ê','Ế','Ề','Ể','Ễ','Ệ'),
			'i'=>array('í','ì','ỉ','ĩ','ị'),
			'I'=>array('Í','Ì','Ỉ','Ĩ','Ị'),
			'o'=>array('ó','ò','ỏ','õ','ọ','ô','ố','ồ','ổ','ỗ','ộ','ơ','ớ','ờ','ở','ỡ','ợ'),
			'0'=>array('Ó','Ò','Ỏ','Õ','Ọ','Ô','Ố','Ồ','Ổ','Ỗ','Ộ','Ơ','Ớ','Ờ','Ở','Ỡ','Ợ'),
			'u'=>array('ú','ù','ủ','ũ','ụ','ư','ứ','ừ','ử','ữ','ự'),
			'U'=>array('Ú','Ù','Ủ','Ũ','Ụ','Ư','Ứ','Ừ','Ử','Ữ','Ự'),
			'y'=>array('ý','ỳ','ỷ','ỹ','ỵ'),
			'Y'=>array('Ý','Ỳ','Ỷ','Ỹ','Ỵ'),
			''=>array(',','.','^',':','"','|','/','~',')','(','%','!','&','*','!','@','#','$','(',')','®','+',"'",'`',"\\",'<','>','?','_','[',']','{','}','acute;','circ;','grave',';', '”', '“'),
			'+'=>array('&quot;','.',' - ',' ','++','+++')
						);
  	        foreach($unicode as $nonUnicode=>$uni)
				{
					foreach($uni as $value)
					$str = str_replace($value,$nonUnicode,$str);
				}
    	return strtolower($str);
	}
    
}
