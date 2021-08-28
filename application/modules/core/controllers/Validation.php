<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Validation
 *
 * @author https://www.anintoyodha.com
 */
class Validation extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('core/model_validation','model_validation');
    }

    /**
     * Get Action
     */
    public function required() {
        $this->form_validation->set_rules('value','required','required');
        if($this->form_validation->run() == TRUE) {
            echo'success';
        }
    }

    public function value_unique() {
        if($this->input->post('value') != '' || $this->input->post('param') != '') {
            if($this->input->post('additional') == ''){
                $additional = 'required';
            }
            else{
                $additional = 'required|'.$this->input->post('additional');
            }
            $this->form_validation->set_rules('value','required',$additional);
            if($this->form_validation->run() == TRUE && $this->is_unique_check($this->input->post('param'))){
                echo 'success';
            }
        }
    }

    public function value_exist() {
        if($this->input->post('value') != '' || $this->input->post('param') != '') {        
            $this->form_validation->set_rules('value','required','required');
            if($this->form_validation->run() == TRUE && $this->is_exist_check()){
                echo'success';
            }
        }
    }

    private function is_unique_check($param){
        if($this->model_validation->is_unique_check($param)) {
            return TRUE;
        }
    }

    private function is_exist_check(){
        $param = explode('|',$this->input->post('param'));
        $code = $this->input->post('code');
        if($this->model_validation->is_exist_check($param,$code)) {
            return TRUE;
        }
    }

}

/* End of file Validation.php */
/* Location: ./application/modules/core/controllers/Validation.php */