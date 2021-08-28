<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Check customer session
 *
 */
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