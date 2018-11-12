<?php

class Sanpham extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('url', 'form', 'text', 'file'));
        $this->load->library(array('form_validation', 'ftp'));
        $this->load->model('M_session');
        $this->load->library('session');
        $this->load->model('M_artice');
        $this->load->model('Title');
        $this->load->model('M_item');
        $this->load->model('a_item');
        $this->load->model('M_category');
        $this->load->view("font/lang/block");
        $this->load->library(array('session','cart'));
        $this->load->library('user_agent');

    }

    public function index ($page_no=1){
        $data['sanpham'] = 'product';
        $page_co = 12;
        $start = ($page_no - 1) * $page_co;
        $data['product'] ='';
        $data['title'] = 'Sản phẩm - Serum dưỡng trắng da wicbe';
        $data['title1'] = 'Sản phẩm';
        $count = $this->M_item->count_list_item_sp(array('type'=>1,'status'=>1));
        $data['list'] = $this->M_item->show_list_item_sp(array('type'=>1,'status'=>1),$page_co, $start);
        $data['link'] = $this->paging($page_co, $count,  $this->uri->segment(1) . '/', $page_no);
        $data['view'] = 'font/sanpham/list';
        $this->load->view('index', $data);
    }

    public function tags($page_no =1){

        $url = $this->uri->segment(1);
        $cate = $this->M_item->tas_row($url);
        if($cate->title==''){
            $title = $cate->name;
        }else{
            $title = $cate->title;
        }
        $data['title']= $title;
        $data['keywords']= $cate->keywords;
        $data['description']= $cate->description;
        $page_co = 12;
        $start = ($page_no - 1) * $page_co;
        $data['page_no'] = $page_no;
        $data['tags'] = $tags = $this->M_item->tas_row($url);
        $count = $this->M_item->show_list_tags($tags->id, $page_co, $start, 0);
        $data['list'] = $this->M_item->show_list_tags($tags->id, $page_co, $start, 1);
        $data['link'] = $this->paging($page_co, $count, $this->uri->segment(1).'/', $page_no);
        $data['view']='font/sanpham/list';
        $this->load->view('index.php',$data);

    }

    public function danhsach ($page_no=1){

        $data['sanpham'] = 'product';
        $page_co = 20;
        $start = ($page_no - 1) * $page_co;
        $data['product'] ='';
        $url = $this->uri->segment(1);
        $data['caregory'] =  $caregory = $this->M_item->category_detail($url);
       if($caregory->title==''){$title = $caregory->name;}else{$title = $caregory->title;}
        $data['title'] = $title;
        $data['description'] = $caregory->description;
        $data['keywords'] = $caregory->keywords;

        if($caregory->top==0){
            $count = $this->M_item->show_list_item_category_top_page($caregory->id,$page_co, $start,0);
            $data['list'] = $this->M_item->show_list_item_category_top_page($caregory->id, $page_co, $start,1);
        }else{
            $count = $this->M_item->show_list_item_category_page_count($caregory->id);
            $data['list'] = $this->M_item->show_list_item_category_page($caregory->id, $page_co, $start);
        }

        $data['link'] = $this->paging($page_co, $count,  $url . '/', $page_no);
        $data['view'] = 'font/sanpham/list';
        $this->load->view('index', $data);
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
            $dau = "";
        }

        // FOR ENABLING THE PREVIOUS BUTTON
        if ($previous_btn && $id > 1) {
            $tam = $id - 1;
            $lui = "<li class=''><a href='" . site_url($url . $tam) . "'>Lùi</a></li>";
        } else if ($previous_btn) {
            $lui = "";
        }


        if ($next_btn && $id < $tongtrang) {
            $tam2 = $id + 1;
            $toi = "<li class=''><a href='" . site_url($url . $tam2) . "'> Tới </a></li>";
        } else if ($next_btn) {
            $toi = "";
        }

        // TO ENABLE THE END BUTTON
        if ($last_btn && $id < $tongtrang) {
            $cuoi = "<li  class=''><a href='" . site_url($url . $tongtrang) . "'> Cuối </a></li>";
        } else if ($last_btn) {
            $cuoi = "";
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
            
			"  . $num . "
			
		</ul>
			";
        else
            $link = '';

        return $link;
    }


    public function chitiet() {

        $data['sanpham'] = 'sanpham';
        $link = $this->M_item->show_detail_item_id_home(array('link' => $this->uri->segment(1)));
        if(!isset($link->id)) redirect ();
       $data['item'] = $this->M_item->show_detail_item_id_home(array('link' => $this->uri->segment(1)));
        $data['name1'] = site_url($data['item']->link);
        $data['link1'] = $data['item']->img;
        $data['title'] = $data['item']->name;
        $data['description'] = $data['item']->description;
        $data['keywords'] = $data['item']->keywords;
        $data['images_slide'] = $this->M_item->show_list_item_image1(isset($data['item']->id) ? $data['item']->id : 0);
        $lq = $this->M_item->show_item_lq($data['item']->id,$data['item']->cate);
        if(count($lq) > 0){
            $data['lienquan'] = $this->M_item->show_item_lq($data['item']->id,$data['item']->cate);
        }else{
            $data['lienquan'] = $this->M_item->show_item_lq1($data['item']->id);
        }

       $data['view'] = 'font/sanpham/chitiet';
            $this->load->view('index', $data);


    }
    public function thanhtoan(){
        $data['title'] = "Giỏ hàng";
        $loi = "Gửi không thành công !! Bạn hãy thử lại";
        $hoten = strip_tags($this->input->post('name'));
        $email = strip_tags($this->input->post('email'));
        $dienthoai = strip_tags($this->input->post('phone'));
        $diachi = strip_tags($this->input->post('address'));
        $note = strip_tags($this->input->post('note'));
        $sql = array(
            'name' => $hoten,
            'address' => $diachi,
            'mobile' => $dienthoai,
            'email' => $email,
            'note' =>$note,
            'points'=>0,
            'status' => 0);
        if ($this->db->insert('user_customer', $sql)) {
            $code_booking = "OD" . $this->Title->randomPassword(5) . "-" . date("Y-m-d");
            $sql_2 = array(
                'customer_id' => $this->db->insert_id(),
                'code_booking' => $code_booking,
                'date_create' => date("Y-m-d"),
                'status' => 0);
            if ($this->db->insert('od_order', $sql_2)) {
                $price=0;
                $id_insert = $this->db->insert_id();
                foreach ($this->cart->contents() as $row) {
                    $id =$row['id'];
                    $sanpham = $this->M_item->show_detail_item_where(array('id' => $id));
                    if ($sanpham->price_pro > 0)
                        $price = $sanpham->price_pro;
                    else
                        $price = $sanpham->price;
                    $donhang = array('id_order' => $id_insert, 'id_item' => $id, 'quantity' => $row['qty'], 'price' => $price, 'total' => $price * $row['qty']);
                    $this->db->insert('od_order_item', $donhang);
                }

                $id =  $this->db->insert_id();
                $this->cart->destroy();
             //   echo "<script>alert('Đặt hàng thành công !');location.href='" . site_url() . "'</script>";
                $data['order'] = "Giỏ hàng";
                if (isset($id)) {
                    echo "1";
                } else
                    echo $loi;
            }}}
    public function thanhtoan1(){

        $loi = "Gửi không thành công !! Bạn hãy thử lại";
    //    $hoten = strip_tags($this->input->post('hoten'));
    //    $email = strip_tags($this->input->post('email'));
        $dienthoai = strip_tags($this->input->post('phone_cart_1'));
    //    $diachi = strip_tags($this->input->post('diachi'));
    //    $quan = strip_tags($this->input->post('quan'));
    //    $tinh = strip_tags($this->input->post('tinh'));

        $sql = array(
      //      'name' => $hoten,
      //      'address' => $diachi.' - ' .$quan.' - ' .$tinh,
            'mobile' => $dienthoai,
      //      'email' => $email,
       //     'password' => md5('123456'),
           // 'note' =>$ghichu,
            'points'=>1,
            'status' => 0);
        if ($this->db->insert('user_customer', $sql)) {
            $code_booking = "OD" . $this->Title->randomPassword(5) . "-" . date("Y-m-d");
            $sql_2 = array(
                'customer_id' => $this->db->insert_id(),
                'code_booking' => $code_booking,
                'date_create' => date("Y-m-d"),
                'status' => 0);
            if ($this->db->insert('od_order', $sql_2)) {
                $price=0;
                $id_insert = $this->db->insert_id();
                foreach ($this->cart->contents() as $row) {
                    $id =$row['id'];
                    $sanpham = $this->a_item->show_detail_item_where(array('itemdetail.item_id' => $id), 'vn');
                    if ($sanpham->item_price_sale > 0)
                        $price = $sanpham->item_price_sale;
                    else
                        $price = $sanpham->item_price;
                    $donhang = array('id_order' => $id_insert, 'id_item' => $id, 'quantity' => $row['qty'], 'price' => $price, 'total' => $price * $row['qty']);
                    $this->db->insert('od_order_item', $donhang);
                }
                $id =  $this->db->insert_id();
                $this->cart->destroy();
                if (isset($id)) {
                    echo "1";
                } else
                    echo $loi;
            }}}
    public function download($id){
        $data['id']=$this->M_item->id_item($id);
        $file =  $data['id']->file;


        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.basename($file));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');

        readfile($file);
        exit;

    }

    function addcart() {
        $idsp = $this->input->post('idsp');
        $id = $idsp;
        $gia = "123";
        $sl =$this->input->post('sl');
        $fag = false;
        foreach ($this->cart->contents() as $row) {
            if ($row['id'] == $id) {
                $rid = $row['rowid'];
                $qty = $row['qty'] + $sl;
                $fag = true;
                break;
            }
        }
        if (!$fag) {
            $data = array(
                "id" => $id,
                "name" => "sp1",
                "qty" => $sl,
                "price" => $gia,
            );

            $this->cart->insert($data);
            echo "insert";
        } else {
            $data = array(
                'rowid' => $rid,
                'qty' => $qty
            );

            $this->cart->update($data);
            echo "up";
        }
        redirect(site_url('gio-hang'));
    }

    function addcardetail() {

        $idsp = $this->input->post('idsp');
     $sl = $this->input->post('soluong');
        $id = $idsp;
        $gia = "123";
     //  $sl = 1;
        $fag = false;
        foreach ($this->cart->contents() as $row) {
            if ($row['id'] == $id) {

                $rid = $row['rowid'];
                $qty = $row['qty'] + $sl;
                $fag = true;
                break;
            }
        }
        if (!$fag) {
//echo "b";die;
            $data = array(
                "id" => $id,
                "name" => "sp1",
                "qty" => $sl,
                "price" => $gia,
            );

            $this->cart->insert($data);
            echo "insert";
        } else {
            $data = array(
                'rowid' => $rid,
                'qty' => $qty
            );

            $this->cart->update($data);
            echo "up";
        }
    }

//====================== Update====================
    function update_cart() {
        $rowid = $this->input->post('rowid');
        $qty = $this->input->post('qty');
        $data = array(
            'rowid' => $rowid,
            'qty' => $qty
        );

        $this->cart->update($data);
        if ($this->uri->segment(1) == 'vn') {
            echo "Đã cập nhật số lượng";
        } else {
            echo "Đã cập nhật số lượng !";
        }
    }

//==================== Remove  ======================
    function remove_cart() {
        $rowid = $this->input->post('rowid');
        $data = array(
            'rowid' => $rowid,
            'qty' => 0
        );
        $this->cart->update($data);
      //  echo "Đã cập nhật số lượng !";
    }

//============ Remove All============
    function remove_all_cart() {
        $lang = $this->uri->segment(1);
        $l = new lang();
        if ($lang == '') {
            $data['lang'] = 'en';
        } else
            $data['lang'] = $lang;
        $data['l'] = $l;
        $this->cart->destroy();
        redirect(site_url($lang));
    }

//===========================
    function cong_soluong() {
        $rowid = $this->input->post('rowid');
        $qty = $this->input->post('qty');
        $data = array(
            'rowid' => $rowid,
            'qty' => $qty + 1
        );
//echo "ok";
        $this->cart->update($data);
    }

//===========================
    function tru_soluong() {
        $rowid = $this->input->post('rowid');
        $qty = $this->input->post('qty');
        $data = array(
            'rowid' => $rowid,
            'qty' => $qty - 1
        );
        $this->cart->update($data);
    }

    function order() {
            $data['title'] = "Giỏ hàng";
            $data['view'] = 'font/oder/index';
            $this->load->view('index', $data);
    }

//========================================

//========================================
    function order_success() {
        $lang = 'vn';
        $data['lang'] = '';
        $l = new lang();
        if ($lang == '')
            $data['lang'] = 'en';
        else
            $data['lang'] = $lang;
        $data['l'] = $l;
        //    $data['title'] = $l->lang_donhangdadatmua[$lang];
        //     $data['description'] = $this->meta_description;
        //    $data['keywords'] = $this->meta_keywords;
        $data['view'] = 'order/order_success';
        $this->remove_all_cart();
        $this->load->view("font/index", $data);
    }

    function add_agent() {
        $data['item'] = $this->a_general->get_agent_where(array("id_province" => $this->input->post('id')));
        $this->load->view('front/page/item/add_agent', $data);
    }
    function save_comment(){
        $value=$this->input->post("value");
        $id=$this->input->post("id");
        $note=$this->input->post("note");
        $name=$this->input->post("name");
        $sql=array(
            "item_id"=>$id,
            "note"=>$note,
            "rate"=>$value,
            "create_date"=>date("Y-m-d",time()),
            "name"=>$name,
            "type"=>$this->input->post("type"),

        );
        $this->db->insert("item_comment",$sql);
    }
    function email(){


        $email=$this->input->post("email");
        $sql=array(

            "time"=>date("Y-m-d",time()),
            "email"=>$email,

        );
        $this->db->insert("email_km",$sql);
        $id = $this->db->insert_id();
        if(isset($id)){
            echo "1";
        }else{
            echo "error";
        }
    }




    function muahang()
    {

        @session_start();


        $this->lang->load('form_validation', 'vietnam');

        $hoten = strip_tags($this->input->post('name'));
        $email = strip_tags($this->input->post('email'));
        $dienthoai = strip_tags($this->input->post('phone'));
        $ghichu = strip_tags($this->input->post('note'));
        $diachi = strip_tags($this->input->post('address'));
        $thanhtoan = strip_tags($this->input->post('check'));
        $sql = array(
            'ten' => $hoten,
            'address' => $diachi,
            'phone' => $dienthoai,
            'email' => $email,
            'note' => $ghichu,
            'thanhtoan' => $thanhtoan,
            'status' => 0);
        if ($this->db->insert('oder_tt', $sql)) {
            $code_booking = "OD" . $this->Title->randomPassword(5) . "-" . date("Y-m-d");
            $sql_2 = array(
                'customer_id' => $this->db->insert_id(),
                'code_booking' => $code_booking,
                'date_create' => date("Y-m-d"),
                'status' => 0);
            if ($this->db->insert('od_order', $sql_2)) {
                $price = 0;
                $id_insert = $this->db->insert_id();
                foreach ($this->cart->contents() as $row) {
                    $id = $row['id'];
                    $sanpham = $this->a_item->show_detail_item_where(array('itemdetail.item_id' => $id), 'vn');
                    if ($sanpham->item_price_sale > 0)
                        $price = $sanpham->item_price_sale;
                    else
                        $price = $sanpham->item_price;
                    $donhang = array('id_order' => $id_insert, 'id_item' => $id, 'quantity' => $row['qty'], 'price' => $price, 'total' => $price * $row['qty']);
                    $this->db->insert('od_order_item', $donhang);
                }
                // $this->send_mail($hoten, $diachi, $dienthoai, $email, $id_insert);
                if(isset($id_insert)){
                    $this->cart->destroy();
                    echo "1";
                }else{
                    echo "0";
                }

//gui mail kich hoat
//$this->send_mail->register($hoten , $email , $this->input->post('password'), $iduser , $key , $lang);
//redirect(site_url('home/register_success/'.$lang));
            }


        }
    }
    function order_info() {

        @session_start();



        $data['title'] = 'Thông tin đặt hàng';

        $data['link_vn'] = 'thanh-toan';
        $data['link_en'] = 'checkout';

        $data['breadcrumb'] = "Giỏ hàng";

        $this->lang->load('form_validation', 'vietnam');

        if ($this->input->post('ok')) {
            $this->form_validation->set_rules('hoten', 'Họ tên', 'trim|required|max_length[100]');
            $this->form_validation->set_rules('email', "Email", 'trim|required|valid_email|max_length[150]');
            $this->form_validation->set_rules('dienthoai', 'Điện thoại', 'trim|required|numeric|max_length[20]');
            $this->form_validation->set_rules('diachi', 'Địa chỉ', 'trim|required|max_length[200]');
            $this->form_validation->set_rules('ghichu', 'Ghi chú', 'trim|max_length[500]');
            $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('index', $data);
            } else {
                $hoten = strip_tags($this->input->post('hoten'));
                $email = strip_tags($this->input->post('email'));
                $dienthoai = strip_tags($this->input->post('dienthoai'));
                $ghichu = strip_tags($this->input->post('ghichu'));
                $diachi = strip_tags($this->input->post('diachi'));
                $sql = array(
                    'name' => $hoten,
                    'address' => $diachi,
                    'mobile' => $dienthoai,
                    'email' => $email,
                    'password' => md5('123456'),
                    'note'=> $ghichu,
                    'status' => 0);
                if ($this->db->insert('user_customer', $sql)) {
                    $code_booking = "OD" . $this->Title->randomPassword(5) . "-" . date("Y-m-d");
                    $sql_2 = array(
                        'customer_id' => $this->db->insert_id(),
                        'code_booking' => $code_booking,
                        'date_create' => date("Y-m-d"),
                        'status' => 0);
                    if ($this->db->insert('od_order', $sql_2)) {
                        $price=0;
                        $id_insert = $this->db->insert_id();
                        foreach ($this->cart->contents() as $row) {
                            $id =$row['id'];
                            $sanpham = $this->a_item->show_detail_item_where(array('itemdetail.item_id' => $id), 'vn');
                            if ($sanpham->item_price_sale > 0)
                                $price = $sanpham->item_price_sale;
                            else
                                $price = $sanpham->item_price;
                            $donhang = array('id_order' => $id_insert, 'id_item' => $id, 'quantity' => $row['qty'], 'price' => $price, 'total' => $price * $row['qty']);
                            $this->db->insert('od_order_item', $donhang);
                        }
                        // $this->send_mail($hoten, $diachi, $dienthoai, $email, $id_insert);
                        echo "<script>alert('Dat hang thanh cong !');location.href='" . site_url('thanh-toan') . "'</script>";

//gui mail kich hoat
//$this->send_mail->register($hoten , $email , $this->input->post('password'), $iduser , $key , $lang);
//redirect(site_url('home/register_success/'.$lang));
                    }
                }else {
                    echo "<script>alert('Dat hang khong thanh cong');location.href='" . site_url('thanh-toan') . "'</script>";
                }
            }
        } else {
            if($this->agent->is_mobile()) {
                $data['view'] = 'font/mobi/inc/order_info';
                $this->load->view('font/mobi/index.php', $data);
            }else {

                $data['view'] = 'font/oder/order_info';
                $this->load->view('index', $data);
            }
        }
    }


}

?>