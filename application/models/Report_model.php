<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model{

    function get_dmd_data($member_id, $frm_dt, $to_dt){
        $this->db->where(array(
            'member_id' => $member_id,
			"CONCAT(year,'-',IF(month >= 10, month, CONCAT(0,month)),'-01') >=" => $frm_dt,
			"CONCAT(year,'-',IF(month >= 10, month, CONCAT(0,month)),'-01') <=" => $to_dt
            //'month >=' => date('m', strtotime($frm_dt)),
            //'month <=' => date('m', strtotime($to_dt)),
            //'year >=' => date('Y', strtotime($frm_dt)),
            //'year <=' => date('Y', strtotime($to_dt))
            // 'EXTRACT(MONTH FROM a.demand_dt)=' => date('m')
        ));
		$this->db->order_by('year,month');
        // $this->db->join('md_ac_type b', 'a.acc_type_cd=b.ac_type');
        $query = $this->db->get('td_demand');
        // echo $this->db->last_query();
        // exit;
        return $query->result();
    }
}
?>