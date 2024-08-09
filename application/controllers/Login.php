<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('captcha');
        $this->load->model('login_model');
    }

    function index()
    {
        $view = 'login/view';
        $header = 'Member Login';
        $flag = 0;
        if (empty($_POST)) {
            $image = '';
            $this->captcha_setting($view, $header, $flag);
        } else {
            if (isset($_SESSION['captcha']) && $_SESSION['captcha'] == $_POST['captcha']) {
                $this->login_process();
            } else {
                $email = $this->input->post('email');
                $action = 'Invalid Captcha';
                session_logs($email, $action);
                echo "<script type='text/javascript'> alert('Invalid Captcha'); </script>";
                $this->captcha_setting($view, $header, $flag);
            }
        }
    }

    public function admin()
    {
        $view = 'login/view';
        $header = 'Admin Login';
        $flag = 1;
        if (empty($_POST)) {
            $image = '';
            $this->captcha_setting($view, $header, $flag);
        } else {
            if (isset($_SESSION['captcha']) && $_SESSION['captcha'] == $_POST['captcha']) {
                $this->login_process();
            } else {
                $email = $this->input->post('email');
                $action = 'Invalid Captcha';
                session_logs($email, $action);
                echo "<script type='text/javascript'> alert('Invalid Captcha'); </script>";
                $this->captcha_setting($view, $header, $flag);
            }
        }
        // $data = array(
        //     'header' => 'Admin Login',
        //     'flag' => 1,
        //     'title' => 'Admin Login'
        // );
        // $this->load->view('template/header', $data);
        // $this->load->view('login/view', $data);
        // $this->load->view('template/footer');
    }

    function captcha_setting($view, $header, $flag)
    {
        // $word = $this->getRandomString(6);
        $word = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $original_string = range(0, 9);
        $original_string2 = implode("", $original_string);
        $captcha = substr(str_shuffle($original_string2), 0, 2);
        $number = explode(" ", $captcha);
        $original_string3 = $word;
        $captcha2 = substr(str_shuffle($original_string3), 0, 4);
        // var_dump($captcha2);
        // exit;
        // $character = explode(" ", $captcha2);
        // $captcha3 = array_merge($number, $character);
        // $captcha4 = implode("", $captcha3);
        // $captcha5 = substr(str_shuffle($captcha4), 0, 6);

        $vals = array(
            'word'          => $captcha2,
            'img_path'      => './captcha/',
            'img_url'       => base_url() . 'captcha/',
            'font_path'     => FCPATH . 'system/fonts/texb.ttf',
            'img_width'     => '250',
            'img_height'    => 50,
            'expiration'    => 7200,
            'word_length'   => 4,
            'font_size'     => 20,
            'colors'        => array(
                'background' => array(255, 255, 255),
                'border'      => array(255, 255, 255),
                'text'          => array(0, 0, 0),
                'grid'          => array(255, 190, 190)
            )
        );

        $cap = create_captcha($vals);
        $this->session->set_userdata(array('captcha' => $captcha2, 'image' => $cap['time'] . '.jpg'));
        // var_dump($cap);
        // exit;
        $data = array(
            'image' => $cap['image'],
            'captcha' => $captcha2,
            'header' => $header,
            'flag' => $flag,
            'title' => $header,
            'path' => $flag > 0 ? 'login/admin' : 'login'
        );
        $this->load->view('template/header', $data);
        $this->load->view($view, $data);
        $this->load->view('template/footer');
    }

    function captcha_refresh()
    {
        $word = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $original_string = range(0, 9);
        $original_string2 = implode("", $original_string);
        $captcha = substr(str_shuffle($original_string2), 0, 2);
        $number = explode(" ", $captcha);
        $original_string3 = $word;
        $captcha2 = substr(str_shuffle($original_string3), 0, 4);
        // $character = explode(" ", $captcha2);
        // $captcha3 = array_merge($number, $character);
        // $captcha4 = implode("", $captcha3);
        // $captcha5 = substr(str_shuffle($captcha4), 0, 6);

        $vals = array(
            'word'          => $captcha2,
            'img_path'      => './captcha/',
            'img_url'       => base_url() . 'captcha/',
            'font_path'     => FCPATH . 'system/fonts/texb.ttf',
            'img_width'     => '250',
            'img_height'    => 50,
            'expiration'    => 7200,
            'word_length'   => 4,
            'font_size'     => 20,
            'colors'        => array(
                'background' => array(255, 255, 255),
                'border'      => array(255, 255, 255),
                'text'          => array(0, 0, 0),
                'grid'          => array(255, 190, 190)
            )
        );

        $cap = create_captcha($vals);
        $this->session->set_userdata(array('captcha' => $captcha2, 'image' => $cap['time'] . '.jpg'));
        $cap_details = array('image' => $cap['image'], 'captcha' => $captcha2);
        echo $cap['image'];
        // echo json_encode($cap_details);
    }

    // function login_process()
    // {
    //     $data = $this->input->post();
    //     // var_dump($data);exit;
    //     if ($user_data = $this->login_model->login($data)) {
    //         $this->session->set_userdata('user', $user_data);
    //         $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Welcome</div>');
    //         redirect('profile');
    //     } else {
    //         $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Please Check Your UserId or Password</div>');
    //         redirect('login');
    //     }
    // }

    // public function index()
    // {
    //     $data = array(
    //         'header' => 'Member Login',
    //         'flag' => 0,
    //         'title' => 'Member Login'
    //     );
    //     $this->load->view('template/header', $data);
    //     $this->load->view('login/view', $data);
    //     $this->load->view('template/footer');
    // }

    function login_process()
    {
        $data = $this->input->post();
        switch ($data['flag']) {
            case 0:
                $this->member_login($data);
                break;
            case 1:
                $this->admin_login($data);
                break;
            default:
                break;
        }
    }

    function member_login($data)
    {
        // var_dump($data);
        if ($user_data = $this->login_model->member_login($data)) {
            $sess_data = array(
                'member_id' => $user_data->member_id,
                'emp_cd' => $user_data->emp_code,
                'member_name' => $user_data->member_name,
                'month' => $user_data->month,
                'year' => $user_data->year,
                'unit_code' => $user_data->unit_code

            );
            $this->session->set_userdata('user', $sess_data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Welcome</div>');
            redirect('demand');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Please Check Your User ID Or Password</div>');
            redirect('login');
        }
    }

    function admin_login($data)
    {
        if ($user_data = $this->login_model->admin_login($data)) {
            $sess_data = array(
                'user_id' => $user_data[0]->user_id
            );
            $this->session->set_userdata('user', $sess_data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Welcome</div>');
            redirect('upload_csv');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Please Check Your User ID Or Password</div>');
            redirect('login/admin');
        }
    }

    function logout()
    {
        $this->session->set_userdata('user', '');
        header("Location: https://rpfcoop2.com/");
        exit();
    }
}
