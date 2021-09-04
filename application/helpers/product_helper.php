<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Check customer session
 *
 */
function cmb_dinamis($name, $table, $field, $pk, $selected = NULL, $extra = NULL) {
    $ci = &get_instance();
    $cmb = "<select name='$name' class='form-control' $extra>";
    $data = $ci->db->get($table)->result();
    foreach ($data as $row){
        $cmb .= "<option value='" . $row->$pk . "'";
        $cmb .= $selected == $row->$pk ? 'selected' : '';
        $cmb .= ">" . $row->$field . "</option>";
    }
    $cmb .= "</select>";
    return $cmb;
}

function rate_detail($exchange_rate) {
    $CI = get_instance();
    $CI->load->model('model_data');
    if($exchange_rate){
	    $rate = $CI->model_data->data_list(
	    array(
	        'table' => 'exchange_rate',
	        'col'   => '*',
	        'cond'  => array('rate_id' => $exchange_rate),
	        'res'   => 'detail'
	    ));
	}
    return $rate;
}