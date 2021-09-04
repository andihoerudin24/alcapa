<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('core/model_table');
        $this->load->model('core/model_data');
        $this->load->model('notification/model_notification');
    }

    /**
     * Render View Page
     *
     */
    public function index()
    {
        $data['datas'] = $this->model_data->list_product();
        $data['status'] = 'sales marketing';
        $data['title']         = 'Report';
        $data['total_data'] = 5;
        $this->load->view('frame/header');
        $this->load->view('frame/menu', $data);
        $this->load->view('frame/breadcrumb');
        $this->load->view('report/report-page', $data);
        $this->load->view('frame/footer');
    }

    public function print()
    {
        $data['datas'] = $this->model_data->list_product();
        $this->load->view('report/report',$data);
    }

    
}

/* End of file Promo.php */
/* Location: ./application/promo/controllers/Promo.php */