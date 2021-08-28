<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Model_table
 *
 * @author https://www.anintoyodha.com
 */
class Model_table extends CI_Model {

    
    var $order = array('catalog_title' => 'asc');

    public function get_datatables($param,$column_order,$column_search,$order){
        $this->list_catalog_api($param,$column_order,$column_search,$order);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered($param,$column_order,$column_search,$order){
        $this->list_catalog_api($param,$column_order,$column_search,$order);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all($param,$column_order,$column_search,$order){
        $this->data_list($param);
        return $this->db->count_all_results();
    }

    private function list_catalog_api($param,$column_order,$column_search,$order){
        $this->data_list($param);
        $i = 0;

        $filter_where = $this->input->post('filter_where');
        if($filter_where != ''){
            $filter_where_array = explode("&",$filter_where);
            foreach($filter_where_array as $arr){
                $item = explode("=",$arr);
                if($item[1] != ''){
                    $this->db->where($item[0],$item[1]);
                }
            }
        }
        $filter_like = $this->input->post('filter_like');
        if($filter_like != ''){
            $filter_like_array = explode("&",$filter_like);
            foreach($filter_like_array as $arr){
                $item = explode("=",$arr);
                if($item[1] != ''){
                    $this->db->like($item[0],$item[1],'both');
                }
            }
        }
        $filter_count = $this->input->post('filter_count');
        if($filter_count != ''){
            $filter_count_array = explode("&",$filter_count);
            foreach($filter_count_array as $arr){
                $item = explode("=",$arr);
                if($item[1] != '' && $item[1] == 1){
                    $this->db->where($item[0].' >=',$item[1]);
                }
                elseif($item[1] != '' && $item[1] == 0){
                    $this->db->where($item[0],$item[1]);
                }
            }
        }

        foreach ($column_search as $item){
            if($_POST['search']['value']){
                if($i === 0){
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                }
                else{
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i)
                $this->db->group_end();
            }
            $i++;
        }
        if(isset($_POST['order'])){
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        $this->db->order_by(key($order), $order[key($order)]);
    }

    private function data_list($param) {
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
            $this->db->join($param['join_table'],$param['join_value'].' = '.$param['join'], 'left');
        }
        if(!empty($param['in'])){
            foreach($param['in'] as $key => $values){
                $this->db->where_in($key, $values);
            }
        }
        if(!empty($param['group'])){
            $this->db->group_by($param['group']);
        }
        if(!empty($param['limit'])){
            if(empty($param['start'])) {
                $this->db->limit($param['limit']);    
            }
            else{
                $this->db->limit($param['limit'],$param['start']);
            }
        }
        return;
    }
}

/* End of file Model_table.php */
/* Location: ./application/modules/core/models/Model_table.php */