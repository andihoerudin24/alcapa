<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Logout
 *
 * @author https://www.anintoyodha.com
 */
class Logout extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->session->unset_userdata('klick_admin');
        redirect('login');
    }

}

/* End of file Logout.php */
/* Location: ./application/modules/login/controllers/Logout.php */