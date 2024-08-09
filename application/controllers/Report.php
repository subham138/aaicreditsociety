<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('report_model');
        
        if (!is_array($this->session->userdata['user'])) {
            redirect('login');
        }
	}

    function index(){
        $member_id = $_SESSION['user']['member_id'];
        $demand_data = array();
        $frm_dt = isset($_POST['frm_dt']) ? $_POST['frm_dt'] : date('Y-m-d');
        $to_dt = isset($_POST['to_dt']) ? $_POST['to_dt'] : date('Y-m-d');
        if(isset($_REQUEST['search'])){
            $demand_data = $this->report_model->get_dmd_data($member_id, $frm_dt, $to_dt);
        }
        $data = array(
            'dmd_data' => json_encode($demand_data),
			'title' => 'All Statement',
            'frm_dt' => $frm_dt,
            'to_dt' => $to_dt
        );
        $this->load->view('template/header', $data);
		$this->load->view('report/view', $data);
		$this->load->view('template/footer');
    }

}
?>