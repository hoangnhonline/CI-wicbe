<?php

class ExportExcel extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form', 'text', 'file'));
        $this->load->library(array('form_validation', 'ftp'));
        $this->load->database();
        $this->load->model('M_session');
        $this->load->model('M_category');
        $this->load->model('Title');
        $this->load->model('M_admin');
        $this->load->model('M_artice');
        $this->load->model('M_oder');
        $this->load->model('M_item');
           $this->load->model('general');
    }




public function index(){


    require_once APPPATH."/PHPExcel/Classes/PHPExcel.php";
   // $this->load->library('phpexcel');
   // $this->load->library('PHPExcel/iofactory');

    $heading=array('TT','Name','Email','Address');

    //Create a new Object
    $objPHPExcel = new PHPExcel();
    $objPHPExcel->getActiveSheet()->setTitle("user");
    //Loop Heading
    $rowNumberH = 1;
    $colH = 'A';
    foreach($heading as $h){
        $objPHPExcel->getActiveSheet()->setCellValue($colH.$rowNumberH,$h);
        $colH++;
    }
    //Loop Result
    $totn=count($this->lihat_nilai_sesi());
    $nilai = $this->lihat_nilai_sesi();
    $no=1;
    $i=2;
        foreach ($nilai as $n) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $no);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $n->name);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $n->email);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $n->address);

            $no++;$i++; }



    //Freeze pane
    $objPHPExcel->getActiveSheet()->freezePane('A2');
    //Save as an Excel BIFF (xls) file
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Danh s�ch'.'user'.'.xls"');
    header('Cache-Control: max-age=0');

    $objWriter->save('php://output');
    exit();
}


    function lihat_nilai_sesi(){
        $this->db->from('user_customer');
        return $this->db->get()->result();
    }

    public function donhang(){

        require_once APPPATH."/PHPExcel/Classes/PHPExcel.php";
        // $this->load->library('phpexcel');
        // $this->load->library('PHPExcel/iofactory');

        $heading=array('TT','Name','Email','Address',"Phone","Note","Thanh toán","Tên sản phẩm","Số lượng", "Thành tiền","Thời gian","Mã sản phẩm","Tình trạng","Tổng tiền");

        //Create a new Object
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getActiveSheet()->setTitle("user");
        //Loop Heading
        $rowNumberH = 1;
        $colH = 'A';
        foreach($heading as $h){
            $objPHPExcel->getActiveSheet()->setCellValue($colH.$rowNumberH,$h);
            $colH++;
        }
        //Loop Result

        $nilai = $this->list_dohang();
        $no=1;
        $i=2;
        $x = 0;
        $tong = 0;
        foreach ($nilai as $n) {

          $order = $this->id_od_order($n->id);
            $row = $this->general->get_list_tableWhere(array("od_order_item.id_order" => $order->id), 'od_order_item');
            if($order->status==0){$tinhtrang = "Đang chờ duyệt";}elseif($order->status==1){$tinhtrang = "Đã duyệt";}else if($i->status==2){$tinhtrang = "Đã giao";}
            if($n->thanhtoan==0){$thanhtoan = "Tiền mặt";}else{$thanhtoan = "Chuyển khoản";}
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $no);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $n->ten);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $n->email);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $n->address);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $n->phone);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $n->note);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $i, $thanhtoan);
            $j=1;
          foreach($row as $r1) {
              $name = $this->M_item->show_detail_item_id_lang($r1->id_item, 'vn');

              $tong = $tong + ($r1->price * $r1->quantity);
              $j++;}
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $i, isset($name->item_name) ? $name->item_name : 'Sản phẩm đã bị xoá khỏi danh sách');

            $objPHPExcel->getActiveSheet()->setCellValue('I' . $i,  $r1->quantity);

            $objPHPExcel->getActiveSheet()->setCellValue('J' . $i , number_format(($r1->price * $r1->quantity), 0, ',', '.').' VND');

            $objPHPExcel->getActiveSheet()->setCellValue('K' . $i, date('d-m-Y',strtotime($order->date_create)));
            $objPHPExcel->getActiveSheet()->setCellValue('L' . $i, $order->code_booking);
            $objPHPExcel->getActiveSheet()->setCellValue('M' . $i, $tinhtrang);
            $objPHPExcel->getActiveSheet()->setCellValue('M' . $i, $tong);
            $no++;$i++; }



        //Freeze pane
        $objPHPExcel->getActiveSheet()->freezePane('A2');
        //Save as an Excel BIFF (xls) file
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Danh-sach'.'-don-hang'.'.xls"');
        header('Cache-Control: max-age=0');
        $objWriter->save('php://output');
        exit();
    }

    public function list_dohang(){
        $this->db->from('oder_tt');
        return $this->db->get()->result();
    }
    public function id_od_order($id){
        $this->db->select("od_order.*");
        $this->db->where('customer_id',$id);
        $this->db->from('od_order');
        return $this->db->get()->row();
    }


}
?>