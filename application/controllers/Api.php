<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct() {

        parent::__construct();

		$this->load->library('session');
		$this->load->helper('url');
    }

    function check_session(){
        // var_dump();exit;
        if(array_key_exists('user', $_SESSION)){
            if(is_array($_SESSION['user'])){
                if(array_key_exists('user_id', $_SESSION['user'])){
                    echo '1';
                }else{
                    echo '2';
                }
            }else{
                echo '0';
            }
        }else{
            echo '0';
        }
    }

    function uncheck_session(){
        // var_dump($_SESSION);
        if(array_key_exists('user', $_SESSION)){
            if(is_array($_SESSION['user'])){
                $this->session->set_userdata('user', '');
                echo '1';
            }else{
                echo '0';
            }
        }else{
            echo '0';
        }
    }
	
	function get_server_details(){
		$server_details = json_encode($_SERVER);
		echo $server_details;
	}


}
?>