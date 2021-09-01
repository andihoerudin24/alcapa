<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Model_validation
 *
 * @author https://www.anintoyodha.com
 */
class Model_validation extends CI_Model {

	public function is_unique_check($param){
		if($param != '')
		{
			$item = explode('_',$param);
			$this->db->select($param);
			$this->db->from($item[0]);
			$this->db->where($param,$this->input->post('value'));
			$query = $this->db->get();
			if($query->num_rows() == 0) {
				return TRUE;
			}
		}
		else
		{
			return FALSE;
		}
	}

	public function is_exist_check($param){
		if($param != '')
		{
			$item = implode('_',$param);
			$this->db->select($item);
			$this->db->from($param[0]);
			$this->db->where($item,$this->input->post('value'));
			$query = $this->db->get();
			if($query->num_rows() > 0) {
				return TRUE;
			}
		}
		else
		{
			return FALSE;
		}
	}
}

/* End of file Model_validation.php */
/* Location: ./application/modules/core/models/Model_validation.php */