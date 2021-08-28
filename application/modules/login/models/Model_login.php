<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {

    /**
     * Check access login
     *
     */
    public function admin_check()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_email',$this->input->post('user_email'));
        $query = $this->db->get();
        $result = $query->row();
        if($query->num_rows() > 0 && password_verify($this->input->post('user_password'),$result->user_password)){
            return $query->row();
        }
    }
}

/* End of file Model_login.php */
/* Location: ./application/login/models/Model_login.php */