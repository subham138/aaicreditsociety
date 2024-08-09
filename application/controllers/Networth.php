<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Networth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('networth_model');
    }

    function index()
    {
        // $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::CURRENCY);
        // echo $fmt->format(10000000000.1234)."\n"; 
        // exit;
        $fund_data = $this->networth_model->get_fund_data();
        $loan_data = $this->networth_model->get_loan_data();

        $data = array(
            'fund_data' => json_encode($fund_data),
            'loan_data' => json_encode($loan_data),
            'title' => 'Networth Statement',
            'controller' => $this
        );
        $this->load->view('template/header', $data);
        $this->load->view('networth/view', $data);
        $this->load->view('template/footer');
    }

    function entry()
    {
        $data = array('title' => 'Upload Networth CSV');
        $this->load->view('template/header', $data);
        $this->load->view('networth/entry', $data);
        $this->load->view('template/footer');
    }

    function save()
    {
        $file = $_FILES['userfile']['tmp_name'];
        $handel = fopen($file, 'r');
		set_time_limit(0);
        $c = 0;
        $header = '';
        $data = $this->input->post();
        while (($filepos = fgetcsv($handel, 1000, ',')) != false) {
            //echo '<pre>';
            //var_dump($data);
            // if($c == 0){
            //     $header = $filepos;
            // }
            if ($c > 0) {
                $this->networth_model->save($filepos, $data);
            }
            $c++;
        }
        //exit;
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Insert Successfully</div>');
        // return true;

        redirect('upload_csv');
    }

    function convert_number($number)
    {
        $no = floor($number);
        $point = round($number - $no, 2) * 100;
        $hundred = null;
        $digits_1 = strlen($no);
        $i = 0;
        $str = array();
        $words = array(
            '0' => '',
            '1' => 'One',
            '2' => 'Two',
            '3' => 'Three',
            '4' => 'Four',
            '5' => 'Five',
            '6' => 'Six',
            '7' => 'Seven',
            '8' => 'Eight',
            '9' => 'Nine',
            '10' => 'Ten',
            '11' => 'Eleven',
            '12' => 'Twelve',
            '13' => 'Thirteen',
            '14' => 'Fourteen',
            '15' => 'Fifteen',
            '16' => 'Sixteen',
            '17' => 'Seventeen',
            '18' => 'Eighteen',
            '19' => 'Nineteen',
            '20' => 'Twenty',
            '30' => 'Thirty',
            '40' => 'Forty',
            '50' => 'Fifty',
            '60' => 'Sixty',
            '70' => 'Seventy',
            '80' => 'Eighty',
            '90' => 'Ninety'
        );
        $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
        while ($i < $digits_1) {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += ($divider == 10) ? 1 : 2;
            if ($number) {
                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $str[] = ($number < 21) ? $words[$number] . " " . $digits[$counter] . $plural . " " . $hundred
                    : $words[floor($number / 10) * 10] . " " . $words[$number % 10] . " " . $digits[$counter] . $plural . " " . $hundred;
            } else $str[] = null;
        }
        $str = array_reverse($str);
        $result = implode('', $str);
        $points = ($point) ? "." . $words[$point / 10] . " " . $words[$point = $point % 10] . " Paise" : '';
        echo $result . "Rupees  " . $points . ' Only';
    }
}
