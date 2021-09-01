<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Check customer session
 *
 */
function admin_login(){
	$CI = get_instance();
	if(isset($CI->session->userdata['klick_admin'])){
		$CI = get_instance();
        $CI->load->model('model_data');
        $user = $CI->model_data->data_list(
        array(
            'table' => 'user',
            'col'   => '*',
            'cond'  => array('user_id' => $CI->session->userdata['klick_admin']['user_id']),
            'res'   => 'detail'
        ));
	    return $user;
	}
	else {
		return false;
	}
}