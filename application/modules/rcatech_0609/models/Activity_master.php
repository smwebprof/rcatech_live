<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity_master extends CI_Model{ 
    function __construct() { 
        // Set table name 
        $this->table = 'agrimin_activity_log'; 
    } 

    public function addActivitylog($data){
    if(empty($data))
      return FALSE;

    $result = array('user_id'=>$data['user_activity_id'],'action'=>$data['action'],'module'=>$data['module'],'date_time'=>$data['date_time'],'ip_address'=>$data['ip_address']);
    //print_r($result);exit;
    $this->db->insert('rcatech_activity_log',$result);
    return $this->db->insert_id();

   }

    function getUnitdata(){ 

        $querystring = "SELECT unit_name,description FROM agrimin_unit_master";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }


}
