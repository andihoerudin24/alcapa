<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('core/model_table');
        $this->load->model('core/model_data');
        $this->load->model('notification/model_notification');
    }

    /**
     * Render View Page
     *
     */
    public function index() {
        $data['status'] = 'sales marketing';
		$data['title'] 		= 'Transaction';
		$data['total_data'] = 5;
		$this->load->view('frame/header');
		$this->load->view('frame/menu',$data);
		$this->load->view('frame/breadcrumb');
		$this->load->view('transaction/transaction-page',$data);
		$this->load->view('frame/footer');
    }

    public function export() {
        $data['list'] = $this->orders_list();
        $this->load->view('transaction/transaction-export',$data);
    }

    public function detail($transaction_code) {
        $data['status'] = 'sales marketing';
        $data['title'] = 'Data Transaction';
        $data['url'] = 'transaction';
        $data['orders_detail'] = $this->orders_detail('orders_transaction_code',$transaction_code);
        if($data['orders_detail']->orders_payment_method == 'direct_transfer'){
            $data['confirm_detail'] = $this->orders_confirmation($data['orders_detail']->orders_invoice_code);
        }
        $data['orders_item_list'] = $this->orders_item_list($data['orders_detail']->orders_id);
        $this->load->view('frame/header');
        $this->load->view('frame/menu',$data);
        $this->load->view('frame/breadcrumb');
        $this->load->view('transaction/transaction-detail-page',$data);
        $this->load->view('frame/footer');
    }

    /**
     * Get Data Tables
     *
     */
    public function data(){
        $param = array(
	        'table' => 'orders',
	        'col'   => '*'
        );
        $column_order = array(null,null);
        $column_search = array('orders_transaction_code');
        $order = array('orders_updated_date' => 'DESC');

        $list = $this->model_table->get_datatables($param,$column_order,$column_search,$order);
        $all_data = array();
        $no = $_POST['start'];
        foreach($list as $data)
        {
            switch ($data->orders_payment_method) {
                case "bank_transfer":
                $payment_method = 'Virtual Account';
                break;
                case "direct_transfer":
                $payment_method = 'Direct Transfer';
                break;
                case "gopay":
                $payment_method = 'Go-Pay';
                break;
                default:
                $payment_method = 'Paypal';
                break;
            }

            switch ($data->orders_status) {
                case "pending":
                $order_status = '<span class="text-danger">Waiting Payment</span>';
                break;
                case "confirmation":
                $order_status = '<span class="text-danger">Waiting Confirmation</span>';
                break;
                case "paid":
                $order_status = '<span class="text-success">Paid</span>';
                break;
            }

            if($data->orders_status == 'paid') {
                if($data->orders_resi){
                    $shipping_status = '<span class="text-success">On Shipping</span>';
                }
                else{
                    $shipping_status = '<span class="text-danger">Waiting Resi</span>';
                }
            }
            else{
                $shipping_status = '-';
            }

            if(rate_detail($data->orders_currency)->rate_code == 'Rp'){
                $purchasing = number_format($data->orders_grand_total_price,0,'','.');
            }
            else{
                $purchasing = number_format($data->orders_grand_total_price,2,'.','.');
            }

            $no++;
            $row = array();
            $row[] = $data->orders_id;
            $row[] = '#'.$data->orders_invoice_code.'<span class="dt-index d-none">'.base_url().'orders/detail/'.$data->orders_invoice_code.'<span>';
            $row[] = $data->orders_receiver_name;
            $row[] = rate_detail($data->orders_currency)->rate_code.'
             '.$purchasing.'<br>'.$payment_method;
            $row[] = '<div class="row p-0" style="background: none !important; color: #000;">
                <div class="col-3">
                    <img src="'.base_url().'assets/courier/'.$data->orders_shipping_code.'.png" width="50" style="position: relative; top: 5px;">
                </div>
            </div>';
            $row[] = $order_status;
            $row[] = $shipping_status;
            $row[] = dmy($data->orders_created_date).' '.date('H:i', strtotime($data->orders_created_date)).' WIB';
            $row[] = '<a href="'.site_url().'transaction/detail/'.$data->orders_transaction_code.'" class="text-dark text-decoration-none table-link text-center">
                <div class="w-100">
                    <i class="os-icon os-icon-chevron-right hover" style="font-size: 2em;"></i>
                </div>
            </a>';
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
    public function resi(){
        if($this->input->post('orders_resi') != ''){            
            $value['orders_resi'] = $this->input->post('orders_resi');
            $this->model_data->data_update($value,'orders',array('orders_invoice_code'=>$this->input->post('orders_invoice_code')));
            $notification = $this->model_data->data_list(
            array(
                'table' => 'third_party',
                'col'   => 'third_party_value',
                'cond'  => array(
                    'third_party_type' => 'email',
                    'third_party_name' => 'sendinblue'
                ),
                'res'   => 'detail'
            ));

            $customer = $this->customer_detail($this->input->post('customer_id'));
            $resi['customer_name']      = $customer->customer_name;
            $resi['shipping_method']    = $this->input->post('orders_shipping_method');
            $resi['orders_resi']        = $this->input->post('orders_resi');
            $param_email = array(
                'sender_name'       => json_decode($notification->third_party_value)->name,
                'sender_email'      => json_decode($notification->third_party_value)->domain,
                'receiver_name'     => $customer->customer_name,
                'receiver_email'    => $customer->customer_email,
                'subject'           => 'Shipping Information',
                'template'          => $this->load->view('notification/template/shipping-confirmation',$resi,TRUE)
            );
            $this->model_notification->email_send($notification,$param_email);
        }
        redirect('transaction/detail/'.$this->input->post('orders_invoice_code'));
    }

    /**
     * Get Collection data
     *
     */
    private function orders_list() {
        $data = $this->model_data->data_list(
        array(
            'table' => 'orders',
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

    private function orders_confirmation($orders_invoice_code) {
        $data = $this->model_data->data_list(
        array(
            'table' => 'orders_confirmation',
            'col'   => '*',
            'cond'  => array('orders_invoice_code' => $orders_invoice_code),
            'res'   => 'data'
        ));
        return $data; 
    }

    private function customer_detail($customer_id) {
        $data = $this->model_data->data_list(
        array(
            'table' => 'customer',
            'col'   => '*',
            'cond'  => array('customer_id' => $customer_id),
            'res'   => 'detail'
        ));
        return $data; 
    }
}

/* End of file Promo.php */
/* Location: ./application/promo/controllers/Promo.php */