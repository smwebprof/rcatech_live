<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General_master extends CI_Model{ 
    function __construct() { 
        // Set table name 
        $this->table = 'rcatech_branch_master'; 
    } 

    function getFileSourceData(){  

          $querystring = "SELECT * FROM rcatech_file_source_master order by id";

          $queryforpubid = $this->db->query($querystring);

          $result = $queryforpubid->result_array();

          return $result;
    } 

    function getCurrencyData(){  

          $querystring = "SELECT * FROM rcatech_currency_master order by id";

          $queryforpubid = $this->db->query($querystring);

          $result = $queryforpubid->result_array();

          return $result;
    } 

    function getWorkTypeData(){  

          $querystring = "SELECT * FROM rcatech_work_type_master order by id";

          $queryforpubid = $this->db->query($querystring);

          $result = $queryforpubid->result_array();

          return $result;
    } 


    function getCatgoryData(){  

          $querystring = "SELECT * FROM  rcatech_category_master order by id";

          $queryforpubid = $this->db->query($querystring);

          $result = $queryforpubid->result_array();

          return $result;
    }



}
