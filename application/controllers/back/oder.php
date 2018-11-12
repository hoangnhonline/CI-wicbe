<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Oder extends CI_Controller {

    function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->helper(array('url', 'text', 'form', 'file'));
        $this->load->library(array('session', 'form_validation', 'ftp'));
        $this->load->database();
        $this->load->model(array('M_admin', 'counter', 'general', 'model', 'M_oder', 'M_item'));

        $this->load->model('M_session');
        date_default_timezone_set('Asia/Saigon');
    }

    function admin() {
        parent::Controller();
    }

    function index($page_no = 1) {
        if (!$this->M_session->userdata('admin_login')) redirect(site_url('admin/login'));
        $data = array();

        $data['name_project'] = '';
        $data['mod'] = 'order';

        $page_co = 20;
        $start = ($page_no - 1) * $page_co;
        $count = $this->model->count_where(array('select' => '*', 'name_table' => 'od_order'));
        $data['page_no'] = $page_no;
        $data['order'] = $this->M_oder->show_list_order_page($page_co, $start);
        $data['link'] = $this->paging($page_co, $count, 'back/oder/index/', $page_no);
        //$this->print_arr($data['items']);
        $data['view'] = 'back/order/list';
        $this->load->view('back/v_admin',$data);
    }

    function list_ajax() {
        $condition = "od_order.id !=0";
        $date_one = date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('date_one'))));
        $date_two = date('Y-m-d ', strtotime(str_replace('/', '-', $this->input->post('date_two'))));

        $order_status = $this->input->post('order_status');
        if ($this->input->post('date_one') != '' && $date_two == '')
            $condition.=" AND date_create >= '" . $date_one . "'";
        if ($this->input->post('date_two') != '')
            $condition.=" AND date_create >= '" . $date_one . "' AND date_create <= '" . $date_two . "'";
        if ($order_status != 0)
            $condition.=" AND status =" . $order_status;
        $data['item'] = $this->m_order->show_list_order_where($condition);
        $data['page_no'] = 1;
        $this->load->view('back/order/list_ajax', $data);
    }

    //============================================
    function view($id) {
        if (!$this->M_session->userdata('admin_login')) redirect(site_url('admin/login'));
        $data = array();
        $data['name_project'] = '';
        $data['mod'] = 'order';

        $data['order'] = $this->M_oder->show_detail_order_id($id);
        $data['customers'] = $this->general->get_tableID($data['order']->customer_id, 'oder_tt');
        if ($data['order']->other_user != 0)
            $id_other = $data['order']->other_user;
        else
            $id_other = $data['order']->customer_id;
        $data['other_customers'] = $this->general->get_tableID($id_other, 'buy_customer');
        if (isset($_POST['ok'])) {
            $sql = array(
                'status' => $this->input->post('status')
            );
            $this->db->where('id', $id);
            $this->db->update('od_order', $sql);
        }
        $data['row'] = $this->general->get_list_tableWhere(array("od_order_item.id_order" => $data['order']->id), 'od_order_item');
        $data['view'] = 'back/order/view';
        $this->load->view('back/v_admin',$data);
    }

    //============================================\
    function delete($id, $page_no) {
        if (!$this->M_session->userdata('admin_login')) redirect(site_url('admin/login'));
        $where = array('id_order' => $id);
        $this->db->delete('od_order_item', $where);
        $id_custum = $this->M_item->get_od_order($id);
        $where = array('id' => $id_custum->customer_id);
        $this->db->delete('oder_tt', $where);
        $where = array('id' => $id);
        $this->db->delete('od_order', $where);
        redirect(site_url('back/oder/index/' . $page_no) . '?messager=success');
    }

//============================================\
    function delete_more($id) {
        if (!$this->M_session->userdata('admin_login')) redirect(site_url('admin/login'));
        $where = array('id_order' => $id);
        $this->db->delete('od_order_item', $where);
        $where = array('id' => $id);
        $this->db->delete('od_order', $where);
        return true;
    }

//============================================
    public function checkuser() {
        if (!$this->m_session->userdata('admin_login'))
            redirect(site_url('admin/login'));
        $a = $this->m_session->userdata('admin_login')->per;
        $p = unserialize($a);
        foreach ($p as $r->value) {
            if ($r->value == 'order' || $r->value == 'full')
                return true;
        }
        return false;
    }

//===========================================
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
            $dau = "<li  class='text'>Đầu</li>";
        }
        // FOR ENABLING THE PREVIOUS BUTTON
        if ($previous_btn && $id > 1) {
            $tam = $id - 1;
            $lui = "<li class=''><a href='" . site_url($url . $tam) . "'>Lùi</a></li>";
        } else if ($previous_btn) {
            $lui = "<li class='text'>Lùi</li>";
        }
        if ($next_btn && $id < $tongtrang) {
            $tam2 = $id + 1;
            $toi = "<li class=''><a href='" . site_url($url . $tam2) . "'> Tới </a></li>";
        } else if ($next_btn) {
            $toi = "<li class='text'>Tới</li>";
        }
        // TO ENABLE THE END BUTTON
        if ($last_btn && $id < $tongtrang) {
            $cuoi = "<li  class=''><a href='" . site_url($url . $tongtrang) . "'> Cuối</a></li>";
        } else if ($last_btn) {
            $cuoi = "<li class='text'>Cuối</li>";
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
            
			" . $dau . $lui . $num . $toi . $cuoi . "
			
		</ul>
			";
        else
            $link = '';

        return $link;
    }

}
