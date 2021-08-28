<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Login
 *
 * @author https://www.anintoyodha.com
 */
class Login extends MX_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('core/model_data');
        $this->load->model('login/model_login');
    }

    /**
     * Render View Page
     *
     */
    public function index()
    {
        if(!isset($this->session->userdata['klick_admin'])) {
            $this->load->view('frame/header');
            $this->load->view('login/login-page');
            $this->load->view('frame/footer');
        }
        else {
            redirect('promo');
        }
    }

    /**
     * CRUD data
     *
     */
    public function member(){
        $result = $this->model_login->admin_check();
        if($result){
            $session_user = array();
            $session_user = array(
                'user_id' => $result->user_id,
            );
            $this->session->set_userdata('klick_admin', $session_user);
            $this->session->set_flashdata('success','Welcome Admin Alacapa');
            redirect('transaction');
        }
        else{
            $this->session->set_flashdata('failed','Email atau password tidak ditemukan');
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
}

/* End of file Login.php */
/* Location: ./application/login/controllers/Login.php */