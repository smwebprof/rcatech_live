<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_api extends CI_Model{ 
    function __construct() { 
        // Set table name 
        $this->table = 'rcatech_user_master'; 
    } 

    function getRows(){ 

        $querystring = "SELECT * FROM rcatech_employee_users_master";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    
}
