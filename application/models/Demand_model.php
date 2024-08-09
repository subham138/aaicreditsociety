<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demand_model extends CI_Model{

    function get_dmd_data($member_id){
		// GET MAX YEAR //
		$this->db->select('max(year) as year');
		$this->db->where(array(
			'member_id' => $member_id
		));
		$year_query = $this->db->get('td_demand');
		$year = $year_query->row();
		
		// GET MAX MONTH //
		$this->db->select('max(month) as month');
		$this->db->where(array(
			'member_id' => $member_id,
			'year' => $year->year
		));
		$month_query = $this->db->get('td_demand');
		$month = $month_query->row();
		
        //$this->db->where(array(
        //    'member_id' => $member_id,
        //    'month' => date('m')-1
        //));
		$this->db->where(array(
            'member_id' => $member_id,
            'month' => $month->month,
			'year' => $year->year
        ));
        // $this->db->join('md_ac_type b', 'a.acc_type_cd=b.ac_type');
        $query = $this->db->get('td_demand');
		//echo $this->db->last_query();exit;
        return $query->result();
    }
}
?>