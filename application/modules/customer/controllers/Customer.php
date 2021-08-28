<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('core/model_table');
        $this->load->model('core/model_data');
    }

    /**
     * Render View Page
     *
     */
    public function index() {
        $data['status'] = 'sales marketing';
		$data['title'] 		= 'Customer';
		$data['total_data'] = 5;
		$this->load->view('frame/header');
		$this->load->view('frame/menu',$data);
		$this->load->view('frame/breadcrumb');
		$this->load->view('customer/customer-page',$data);
		$this->load->view('frame/footer');
    }

    public function export() {
        $data['list'] = $this->customer_list();
        $this->load->view('customer/customer-export',$data);
    }

    public function detail($customer_code) {
        $data['status'] = 'sales marketing';
        $data['title'] = 'Data Customer';
        $data['url'] = 'customer';
        $data['orders_detail'] = $this->orders_detail('orders_customer_code',$customer_code);
        if($data['orders_detail']->orders_payment_method == 'direct_transfer') {
            $data['confirm_detail'] = $this->confirm_detail($data['orders_detail']->orders_invoice_code);
        }
        $data['orders_item_list'] = $this->orders_item_list($data['orders_detail']->orders_id);
        $this->load->view('frame/header');
        $this->load->view('frame/menu',$data);
        $this->load->view('frame/breadcrumb');
        $this->load->view('customer/customer-detail-page',$data);
        $this->load->view('frame/footer');
    }

    /**
     * Get Data Tables
     *
     */
    public function data(){
        $param = array(
	        'table' => 'customer',
	        'col'   => '*',
            'cond'  => array('customer_activation'=>1)
        );
        $column_order = array(null,null);
        $column_search = array('customer_name','customer_email');
        $order = array('customer_created_date' => 'DESC');

        $list = $this->model_table->get_datatables($param,$column_order,$column_search,$order);
        $all_data = array();
        $no = $_POST['start'];
        foreach($list as $data)
        {
            $no++;
            $row = array();
            $row[] = $data->customer_id;
            $row[] = $data->customer_name;
            $row[] = $data->customer_email;
            $row[] = $data->customer_phone;
            $row[] = dmy($data->customer_created_date);
            $all_data[] = $row;
        }

        $output = array(
            "draw"              => $_POST['draw'],
            "recordsTotal"      => $this->model_table->count_all($param,$column_order,$column_search,$order),
            "recordsFiltered"   => $this->model_table->count_filtered($param,$column_order,$column_search,$order),
            "data"              => $all_data,
        );
        echo json_encode($output);
    }

    /**
     * CRUD Action
     *
     */
    public function action($type){
        switch ($type){
            case "create":
            $data = $this->input->post(null,TRUE);
            if($data['promo_type'] == 'PCT'){
                $data['promo_percent'] = $data['promo_disc'];
            }
            else{
                $data['promo_amount'] = $data['promo_disc'];
            }
            $this->model_data->data_create($data,'promo');
            $this->session->set_flashdata('success','Data berhasil ditambahkan');
            break;

            case "update":
            $data = $this->input->post(null,TRUE);
            if($data['promo_type'] == 'PCT'){
                $data['promo_percent'] = $data['promo_disc'];
            }
            else{
                $data['promo_amount'] = $data['promo_disc'];
            }
            $this->model_data->data_update($data,'promo',array('promo_id' => $data['promo_id']));
            $this->session->set_flashdata('success','Data berhasil diupdate');
            break;

            case "delete":
            $array_id = explode(',',$this->input->post('array_id'));
            foreach($array_id as $item){
                $this->model_data->data_delete('promo',array('promo_id' => $item));
            }
            $this->session->set_flashdata('success','Data berhasil dihapus');
            break;
        }
        redirect('promo');
    }

    /**
     * Get Collection data
     *
     */
    private function customer_list() {
        $data = $this->model_data->data_list(
        array(
            'table' => 'customer',
            'col'   => '*',
            'res'   => 'list'
        ));
        return $data; 
    }

    private function orders_detail($key,$value) {
        $data = $this->model_data->data_list(
        array(
            'table' => 'orders',
            'col'   => '*',
            'cond'  => array($key => $value),
            'res'   => 'detail'
        ));
        return $data; 
    }

    private function orders_item_list($orders_id) {
        $data = $this->model_data->data_list(
        array(
            'table' => 'order_item',
            'col'   => '*',
            'cond'  => array('orders_id' => $orders_id),
            'res'   => 'list'
        ));
        return $data; 
    }
}

/* End of file Promo.php */
/* Location: ./application/promo/controllers/Promo.php */