<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_csv_model extends CI_Model{

    function get_dmd_data(){
        $this->db->select('a.*, "" as ac');
        $this->db->where(array(
            'month' => date('m')
        ));
        $query = $this->db->get('td_demand a');
        return $query->result();
    }

    function save($csv_data, $data){
         //echo '<pre>';
         //var_dump($csv_data);exit;
        $input = array(
            'member_id' => $csv_data[0],
            'emp_code' => $csv_data[1],
            'unit_code' => $csv_data[2],
            'member_name' => $csv_data[3],
            'password' => substr($csv_data[3],0,4).date('mY', strtotime($csv_data[4])),
            'dob' => $csv_data[4],
            'month' => $data['month'],
            'year' => $data['year'],
            'tf_clr_bal' => $csv_data[7],
            'gl_outstanding' => $csv_data[9],
            'gl_loan_amt' => $csv_data[8],
            'cl_outstanding' => $csv_data[11],
            'cl_loan_amt' => $csv_data[10],
            'tf_prn' => $csv_data[14],
            'gl_tot' => $csv_data[15],
            'gl_run' => $csv_data[16],
            'gl_principal' => $csv_data[17],
            'gl_interest' => $csv_data[18],
            'cl_tot' => $csv_data[19],
            'cl_run' => $csv_data[20],
            'cl_principal' => $csv_data[21],
            'cl_interest' => $csv_data[22],
            'total_demand' => $csv_data[23],
            'ltc_id' => $csv_data[24],
            'ltc_sanc_amt' => $csv_data[25],
            'ltc_curr_prn' => $csv_data[26],
            'ltc_tot_instl' => $csv_data[27],
            'ltc_curent_instl' => $csv_data[28],
            'ltc_prn' => $csv_data[29],
            'ltc_intt' => $csv_data[30],

            'l4_id' => $csv_data[31],
            'l4_sanc_amt' => $csv_data[32],
            'l4_curr_prn' => $csv_data[33],
            'l4_tot_instl' => $csv_data[34],
            'l4_curent_instl' => $csv_data[35],
            'l4_prn' => $csv_data[36],
            'l4_intt' => $csv_data[37],

            'l5_id' => $csv_data[38],
            'l5_sanc_amt' => $csv_data[39],
            'l5_curr_prn' => $csv_data[40],
            'l5_tot_instl' => $csv_data[41],
            'l5_curent_instl' => $csv_data[42],
            'l5_prn' => $csv_data[43],
            'l5_intt' => $csv_data[44],

            'l6_id' => $csv_data[45],
            'l6_sanc_amt' => $csv_data[46],
            'l6_curr_prn' => $csv_data[47],
            'l6_tot_instl' => $csv_data[48],
            'l6_curent_instl' => $csv_data[49],
            'l6_prn' => $csv_data[50],
            'l6_intt' => $csv_data[51],
        );
		//var_dump($input);exit;
        // $utf = array();
        // for($i = 0; $i < count($header); $i++){
        //     if($header[$i] != '' && $data[$i] != ''){
        //         // Match Emoticons
        //         $regexEmoticons = '/[\x00-\x1F\x80-\xFF]/';
        //         $utf = preg_replace($regexEmoticons, '', $header[$i]);

        //         $table_header = strtolower(str_replace(' ', '_', $utf));
        //         // if($i == 0){
        //         //     $input['emp_code'] = $data[$i];    
        //         // }else{
        //             $input[$table_header] = $data[$i];
        //         // }
        //     }
        // }

        // var_dump($utf);exit;
        //$input['password'] = substr($input["member_name"],0,4).date('mY', strtotime($input['dob']));
        if($this->check_data($input) > 0){
            $this->db->where(array(
                'member_id' => $input['member_id'],
                'month' => $input['month'],
                'year' => $input['year']
            ));
            $this->db->update('td_demand', $input);
            // $sql = '("emp_code", "member_id", "member_name", "dob", "month", "year", "tf_clr_bal", "gl_outstanding", "cl_outstanding", "gl_id", "cl_id", "tf_prn", "gl_tot", "gl_run", "gl_principal", "gl_interest", "cl_tot", "cl_run", "cl_principal", "cl_interest", "total_demand", "password")';
        }else{
            $this->db->insert('td_demand', $input);
        }
    }

    function check_data($data){
        $this->db->where(array(
            'member_id' => $data['member_id'],
            'month' => $data['month'],
            'year' => $data['year']
        ));
        $query = $this->db->get('td_demand');
        if($query->num_rows() > 0){
            return 1;
        }else{
            return 0;
        }
    }
}
?>