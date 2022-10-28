<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department_master extends CI_Model{ 
    function __construct() { 
        // Set table name 
        $this->table = 'rcatech_department_master'; 
    } 

    public function addActivitylog($data){
    if(empty($data))
      return FALSE;

    $result = array('user_id'=>$data['user_activity_id'],'action'=>$data['action'],'module'=>$data['module'],'date_time'=>$data['date_time'],'ip_address'=>$data['ip_address']);
    //print_r($result);exit;
    $this->db->insert('rcatech_activity_log',$result);
    return $this->db->insert_id();

   }

    function getDepartmentdata(){ 

        $querystring = "SELECT * FROM rcatech_department_master";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }


}
