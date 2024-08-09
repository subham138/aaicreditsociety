<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Networth_model extends CI_Model
{

    function get_fund_data()
    {
        $emp_code = $_SESSION['user']['member_id'];
        //var_dump($_SESSION);
        //echo $emp_code; exit;
		
		// GET MAX YEAR //
		$this->db->select('max(year) as year');
		$this->db->where(array(
			'member_id' => $emp_code
		));
		$year_query = $this->db->get('td_networth');
		$year = $year_query->row();
		
		// GET MAX MONTH //
		$this->db->select('max(month) as month');
		$this->db->where(array(
			'member_id' => $emp_code,
			'year' => $year->year
		));
		$month_query = $this->db->get('td_networth');
		$month = $month_query->row();
		
        $where_in = array('8', '9', '10');
        $this->db->select('a.*, b.name');
        $this->db->where(array(
            'a.month' => $month->month,
            'a.year' => $year->year,
            'a.member_id' => $emp_code
        ));
        $this->db->where_in('a.ac_type_id', $where_in);
        $this->db->join('md_ac_type b', 'a.ac_type_id=b.id');
        $this->db->order_by('a.ac_type_id ASC');
        $query = $this->db->get('td_networth a');
        // echo $this->db->last_query();exit;
        return $query->result();
    }

    function get_loan_data()
    {
        $emp_code = $_SESSION['user']['member_id'];
		
		// GET MAX YEAR //
		$this->db->select('max(year) as year');
		$this->db->where(array(
			'member_id' => $emp_code
		));
		$year_query = $this->db->get('td_networth');
		$year = $year_query->row();
		
		// GET MAX MONTH //
		$this->db->select('max(month) as month');
		$this->db->where(array(
			'member_id' => $emp_code,
			'year' => $year->year
		));
		$month_query = $this->db->get('td_networth');
		$month = $month_query->row();
		
        $where_in = array('23101', '23102', '23103');
        $this->db->select('a.*, b.name');
        $this->db->where(array(
            'a.month' => $month->month,
            'a.year' => $year->year,
            'a.member_id' => $emp_code
        ));
        $this->db->where_in('a.ac_type_id', $where_in);
        $this->db->join('md_ac_type b', 'a.ac_type_id=b.id');
        $this->db->order_by('a.ac_type_id ASC');
        $query = $this->db->get('td_networth a');
        // echo $this->db->last_query();exit;
        return $query->result();
    }

    function save($csv_data, $data)
    {
        // echo '<pre>';
        $input = array(
            'month' => $data['month'],
            'year' => $data['year'],
            'ac_type_id' => $csv_data[0],
            'member_id' => $csv_data[2],
            'member_name' => $csv_data[3],
            'dep_loan_flag' => $csv_data[4],
            'prn_amt' => $csv_data[5],
            'intt_amt' => $csv_data[6],
            'intt_rt' => $csv_data[7]
        );
        // var_dump($input);exit;
        if ($this->check_data($input)) {
            // $sql = '("emp_code", "member_id", "member_name", "dob", "month", "year", "tf_clr_bal", "gl_outstanding", "cl_outstanding", "gl_id", "cl_id", "tf_prn", "gl_tot", "gl_run", "gl_principal", "gl_interest", "cl_tot", "cl_run", "cl_principal", "cl_interest", "total_demand", "password")';
            $this->db->insert('td_networth', $input);
        } else {
            $this->db->where(array(
                'month' => $data['month'],
                'year' => $data['year'],
                'ac_type_id' => $csv_data[0],
                'member_id' => $csv_data[2]
            ));
            $this->db->update('td_networth', $input);
        }
    }

    function check_data($data)
    {
        $this->db->where(array(
            'month' => $data['month'],
            'year' => $data['year'],
            'ac_type_id' => $data['ac_type_id'],
            'member_id' => $data['member_id']
        ));
        $query = $this->db->get('td_networth');
        if ($query->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }
}
