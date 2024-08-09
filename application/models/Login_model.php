<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model{

    function member_login($data){
        $this->db->where(array(
            'member_id' => $data['user_id']
        ));
        $query = $this->db->get('td_demand');
        if($query->num_rows() > 0){
            $this->db->select('member_id, emp_code, member_name, password, month, year, unit_code');
            $this->db->where(array('member_id' => $data['user_id']));
            $this->db->order_by('year DESC, month DESC');
            $this->db->limit(1,0);
            $ck_query = $this->db->get('td_demand')->row();
			// echo $this->db->last_query();exit;
            // echo $this->db->last_query();
            // exit;
            if($ck_query->password == $data['password']){
                return $ck_query;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    function admin_login($data){
        $this->db->where(array(
            'user_id ' => $data['user_id']
        ));
        $query = $this->db->get('md_users');
        if($query->num_rows() > 0){
            $row = $query->row();
            if(password_verify($data['password'], $row->password)){
                return $query->result();
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}
?>