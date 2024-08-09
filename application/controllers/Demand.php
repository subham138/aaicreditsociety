<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demand extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('demand_model');
        
        if (!is_array($this->session->userdata['user'])) {
            redirect('login');
        }
	}

    function index(){
        $member_id = $_SESSION['user']['member_id'];
        $demand_data = $this->demand_model->get_dmd_data($member_id);
        $data = array(
            'dmd_data' => json_encode($demand_data),
			'title' => 'Statement'
        );
        $this->load->view('template/header', $data);
		$this->load->view('demand/view', $data);
		$this->load->view('template/footer');
    }

}
?>