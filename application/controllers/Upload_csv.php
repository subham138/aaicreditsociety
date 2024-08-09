<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_csv extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('upload_csv_model');
	}

    function index(){
        $demand_data = $this->upload_csv_model->get_dmd_data();
        $data = array(
            'dmd_data' => json_encode($demand_data),
			'title' => 'Upload CSV'
        );
        $this->load->view('template/header', $data);
		$this->load->view('upload_csv/view', $data);
		$this->load->view('template/footer');
    }

    function entry(){
        $data = array('title' => 'Upload CSV');
        $this->load->view('template/header', $data);
		$this->load->view('upload_csv/entry', $data);
		$this->load->view('template/footer');
    }

    function save(){
        $file = $_FILES['userfile']['tmp_name'];
        $handel = fopen($file, 'r');
        $c = 0;
        $header = '';
        $data = $this->input->post();
        while(($filepos = fgetcsv($handel, 1000, ',')) != false){
             //echo '<pre>';
             //var_dump($filepos);
            // if($c == 0){
            //     $header = $filepos;
            // }
            if($c > 0){
                $this->upload_csv_model->save($filepos, $data);
            }
            $c++;
        }
        // exit;
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Insert Successfully</div>');
        return true;
        
        // redirect('upload_csv');
    }
}
?>