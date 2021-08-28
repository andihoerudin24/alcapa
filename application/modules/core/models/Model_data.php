<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Model_data
 *
 * @author https://www.anintoyodha.com
 */
class Model_data extends CI_Model {

    public function data_list($param) {
        if(!empty($param['col'])){
            $this->db->select($param['col']);
        }
        $this->db->from($param['table']);
        if(!empty($param['cond'])){
            foreach($param['cond'] as $key => $values){
                $this->db->where($key, $values);
            }
        }
        if(!empty($param['like'])){
            foreach($param['like'] as $key => $values){
                $this->db->like($key, $values);
            }
        }
        if(!empty($param['join'])){
            $this->db->join($param['join']['join_table'],$param['join']['join_value'].' = '.$param['join']['join_value2'], 'left');
        }
        if(!empty($param['in'])){
            foreach($param['in'] as $key => $values){
                $this->db->where_in($key, $values);
            }
        }
        if(!empty($param['group'])){
            $this->db->group_by($param['group']);
        }
        if(!empty($param['order'])){
            foreach($param['order'] as $key => $values){
                $this->db->order_by($key, $values);
            }
        }
        if(!empty($param['limit'])){
            if(empty($param['start'])) {
                $this->db->limit($param['limit']);    
            }
            else{
                $this->db->limit($param['limit'],$param['start']);
            }
        }
        $query = $this->db->get();
        if($param['res'] == 'detail'){
            return $query->row();
        }
        else if($param['res'] == 'count'){
            return $query->num_rows();
        }
        else{
            return $query->result();
        }
    }

    public function data_create($data,$table,$result = null) {
        $data_final = $this->data_check($data,$table);
        $this->db->insert($table,$data_final);
        if($result != null){
            return $this->db->insert_id();
        }
    }

    public function data_update($data,$table,$field = NULL) {
        $data_final = $this->data_check($data,$table);
        if(!empty($field)){
            foreach($field as $key => $values){
                $this->db->where($key, $values);
            }
        }
        $this->db->update($table,$data_final);
    }

    public function data_delete($table,$field = NULL) {
        if(!empty($field)){
            foreach($field as $key => $values){
                $this->db->where($key, $values);
            }
        }
        $this->db->delete($table);
    }

    private function data_check($data,$table) {
        $field = $this->db->field_data($table);
        $field_final = array_column($field, 'name');

        foreach ($data as $key => $value) {
            $item_separate = explode('_',$key);
            $item_last = end($item_separate);
            $param = array_slice($item_separate,0, -1);
            $param_final = implode('_',$param);
            if($item_last == 'hash') {
                $data[$param_final] = password_hash($value,PASSWORD_BCRYPT);
                unset($data[$key]);
            }
            else if($item_last == 'num'){
                $data[$param_final] = strip_tags(str_replace(".", "",$value));
                unset($data[$key]);
            }
            else if(!in_array($key,$field_final)) {
                unset($data[$key]);
            }
        }
        return $data;
    }
}

/* End of file Model_data.php */
/* Location: ./application/modules/core/models/Model_data.php */