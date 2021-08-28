<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Model_notification
 *
 * @author https://www.anintoyodha.com
 */
class Model_notification extends CI_Model {

    public function email_send($notification,$param_email)
    {
        $recipient = [];
        $data = json_encode(array(
            "sender"  => array(
                "email"     => $param_email['sender_email'],
                "name"      => $param_email['sender_name']
            ),
            "to" => [array(
                "email"     => $param_email['receiver_email'],
                "name"      => $param_email['receiver_name']
            )],
            "subject"       => $param_email['subject'],
            "htmlContent"   => $param_email['template']
        ));

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,'https://api.sendinblue.com/v3/smtp/email/');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Accept: application/json',
            'Content-Type: application/json',
            'Api-key: '.json_decode($notification->third_party_value)->key
        ));
        $output = curl_exec($ch); 
        curl_close($ch);
    }
}

/* End of file Model_notification.php */
/* Location: ./application/modules/notification/models/Model_notification.php */