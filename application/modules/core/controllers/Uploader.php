<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Uploader
 *
 * @author https://www.anintoyodha.com
 */
class Uploader extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

	public function multiple($foldername,$foldercode)
	{
		$storeFolder = 'assets/'.$foldername.'/'.$foldercode;
		if(!file_exists($storeFolder) && !is_dir($storeFolder)) {
		    mkdir($storeFolder);
		}
		if (!empty($_FILES)) {
		    foreach($_FILES['file']['tmp_name'] as $key => $value) {
		        $tempFile = $_FILES['file']['tmp_name'][$key];
		        $targetFile =  $storeFolder. $_FILES['file']['name'][$key];
		        move_uploaded_file($tempFile,$targetFile);
		    }
		}
/*		$filename = $this->input->post('filename');
		$path = 'assets/'.$foldername.'/'.$foldercode;
		if(!is_dir($path.'/temp'))
		{
			mkdir($path.'/temp',0755,TRUE);
			mkdir($path.'/crop',0755,TRUE);
			mkdir($path.'/thumb',0755,TRUE);
			$file = 'assets/index.html';
			copy($file,$path.'/index.html');
			copy($file,$path.'/temp/index.html');
			copy($file,$path.'/crop/index.html');
			copy($file,$path.'/thumb/index.html');
		}
		$config['file_name'] = $filename.'.'.pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
		$config['upload_path'] = $path.'/temp';
		$config['allowed_types'] = 'jpg|jpeg|application/x-jpg|application/jpg|png|pdf|doc|docx|msword|vnd.openxmlformats-officedocument.wordprocessingml.document';
		$config['overwrite'] = FALSE;
		$this->load->library('upload', $config);
		if(!$this->upload->do_upload('file'))
		{
		    header('HTTP/1.1 500 Internal Server Error');
		    header('Content-type: text/plain');
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			header('Content-Type: application/json');
			$response = array(
				'filename' => $filename,
				'fileserver' => $filename.'.'.pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION)
			);
			echo json_encode($response);
		}*/
	}

    public function single($foldername,$foldercode) {
		$path = 'assets/'.$foldername.'/'.$foldercode;
		if(!is_dir($path.'/temp'))
		{
			mkdir($path.'/temp',0755,TRUE);
			mkdir($path.'/crop',0755,TRUE);
			mkdir($path.'/thumb',0755,TRUE);
			$file = 'assets/index.html';
			copy($file,$path.'/index.html');
			copy($file,$path.'/temp/index.html');
			copy($file,$path.'/crop/index.html');
			copy($file,$path.'/thumb/index.html');
		}
		$config['file_name'] = date('dmy').'-'.strtolower(random_string('alnum',3)).'.'.pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $config['upload_path'] = $path.'/temp';
        $config['allowed_types'] = 'jpg|png';

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('file'))
        {
            $status = "error";
            $msg = $this->upload->display_errors();
        }
        else
        {
            $dataupload = $this->upload->data();
            $status = 'success';
            $response = $dataupload['file_name'];
        }
        $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'response'=>$response)));
    }

	public function remove()
	{
		unlink('assets/'.$this->input->post('type').'/'.$this->input->post('foldercode').'/temp/'.$this->input->post('file'));
		unlink('assets/'.$this->input->post('type').'/'.$this->input->post('foldercode').'/crop/'.$this->input->post('file'));
		unlink('assets/'.$this->input->post('type').'/'.$this->input->post('foldercode').'/thumb/'.$this->input->post('file'));
		/*$this->model_image->image_remove('product',$this->input->post('file'));*/
	}
}

/* End of file Uploader.php */
/* Location: ./application/modules/core/models/Uploader.php */