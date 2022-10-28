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


    function getCities(){  

          $querystring = "SELECT * FROM  rcatech_cities order by id";

          $queryforpubid = $this->db->query($querystring);

          $result = $queryforpubid->result_array();

          //print_r($result);exit;
          //return $result;

          $city_arr = array();

          foreach ($result as $city) {
            $city_arr[$city['name']] = $city;
          }
          //print_r($city_arr);exit;

          return $city_arr;
    }


    function getCitiesmaster(){  

          $querystring = "SELECT * FROM rcatech_city_master";

          $queryforpubid = $this->db->query($querystring);

          $result = $queryforpubid->result_array();

          return $result;
    }

    function getCitiesdetails($params){  

          $querystring = "SELECT id FROM rcatech_cities Where name = '".$params."'";

          $queryforpubid = $this->db->query($querystring);

          $result = $queryforpubid->result_array();
          //print_r($result);exit;
          $resultmax = 0;
          if (!empty($result[0]['id'])) {
             $resultmax = $result[0]['id'];
          } else {
             //$resultmax = $resultmax;
             $result = array('name'=>$params,'state_id'=>4131);
             $this->db->insert('rcatech_cities',$result);
             $resultmax = $this->db->insert_id();;
          }

          return $resultmax;
    }

    function addSubtypeData($params){

          $querystring = "SELECT id FROM rcatech_item_master Where item_name = '".$params[2]."'";
          $queryforpubid = $this->db->query($querystring);
          $result = $queryforpubid->result_array();
          //print_r($result);exit;

          $result = array('id'=>$params[0],'subitem_name'=>$params[1],'item_id'=>$result[0]['id'],'entry_user_id'=>1,'modify_user_id'=>1,'entry_date'=>'2022-09-07 00:00:00','modify_date'=>'2022-09-07 00:00:00','is_active'=>1);
          //print_r($result);exit;
          $this->db->insert('rcatech_item_subtype_master',$result);
    }


    function getUserdetails($params){  

          $querystring = "SELECT id FROM rcatech_employee_users_master Where emp_code = '".$params."'";

          $queryforpubid = $this->db->query($querystring);

          $result = $queryforpubid->result_array();
          //print_r($result);exit;
          $resultmax = 0;
          if (!empty($result[0]['id'])) {
             echo $resultmax = $result[0]['id'];exit;
          } else {
             //$resultmax = $resultmax;
             $result = array('unit_name'=>$params);
             $this->db->insert('rcatech_city_master',$result);
             $resultmax = $this->db->insert_id();;
          }

          return $resultmax;
    }


    function getBranchdetails($params){  

          $querystring = "SELECT id FROM rcatech_branch_master Where branch_name = '".$params."'";

          $queryforpubid = $this->db->query($querystring);

          $result = $queryforpubid->result_array();
          //print_r($result);exit;
          $resultmax = 0;
          if (!empty($result[0]['id'])) {
             //echo $resultmax = $result[0]['id'];
             $result = array('unit_name'=>$result[0]['id']);
             $this->db->insert('rcatech_city_master',$result);
             $resultmax = $this->db->insert_id();
          } else {
             //$resultmax = $resultmax;
             $result = array('unit_name'=>'0');
             $this->db->insert('rcatech_city_master',$result);
             $resultmax = $this->db->insert_id();
          }

          return $resultmax;
    }


    function getManufacturerdata(){ 

        $querystring = "SELECT * FROM  rcatech_manufacturer_master";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getVendordata(){ 

        $querystring = "SELECT * FROM  rcatech_vendor_master";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    public function Addmanufacturer($data){
    if(empty($data))
      return FALSE;

    $result = array('manufacturer_name'=>$data['manufacturer_name'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1,'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id'],'op_year'=>@$_SESSION['operatingyear']);
    //print_r($result);exit;
    $this->db->insert('rcatech_manufacturer_master',$result);
    $call_id = $this->db->insert_id();

    return $call_id;

   }

   public function Addvendor($data){
    if(empty($data))
      return FALSE;

    $result = array('vendor_name'=>$data['vendor_name'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1,'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id'],'op_year'=>@$_SESSION['operatingyear']);
    //print_r($result);exit;
    $this->db->insert('rcatech_vendor_master',$result);
    $call_id = $this->db->insert_id();

    return $call_id;

   }


   function getVendordataById($params){  

          $querystring = "SELECT * FROM  rcatech_vendor_master Where id = '".$params."'";

          $queryforpubid = $this->db->query($querystring);

          $result = $queryforpubid->result_array();
          //print_r($result);exit;
          return $result;
    }

    function Updatevendordata($data){ 
        //print_r($data);exit;
        $result = array('vendor_name'=>$data['vendor_name'],'is_active'=>$data['is_active'],'modify_user_id'=>$data['user_id'],'modify_date'=>$data['dt'],'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id']);

        //print_r($result);exit;
        $this->db->where('id', $data['id']);
        $this->db->limit(1);
        $this->db->update('rcatech_vendor_master',$result);

        return $result;    
    } 

     public function delvendor($data)
      {

        //print_r($data);exit;
        $result = array('is_active'=>0,'modify_user_id'=>$data['user_id'],'modify_date'=>$data['dt'],'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id']);

        //print_r($result);exit;
        $this->db->where('id', $data['id']);
        $this->db->limit(1);
        $this->db->update('rcatech_vendor_master',$result);

        return $result; 

    }


    function getManufacturerById($params){  

          $querystring = "SELECT * FROM  rcatech_manufacturer_master Where id = '".$params."'";

          $queryforpubid = $this->db->query($querystring);

          $result = $queryforpubid->result_array();
          //print_r($result);exit;
          return $result;
    }


    function Updatemanufacturerdata($data){ 
        //print_r($data);exit;
        $result = array('manufacturer_name'=>$data['manufacturer_name'],'is_active'=>$data['is_active'],'modify_user_id'=>$data['user_id'],'modify_date'=>$data['dt'],'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id']);

        //print_r($result);exit;
        $this->db->where('id', $data['id']);
        $this->db->limit(1);
        $this->db->update('rcatech_manufacturer_master',$result);

        return $result;    
    }

    public function delmanufacturer($data)
      {

        //print_r($data);exit;
        $result = array('is_active'=>0,'modify_user_id'=>$data['user_id'],'modify_date'=>$data['dt'],'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id']);

        //print_r($result);exit;
        $this->db->where('id', $data['id']);
        $this->db->limit(1);
        $this->db->update('rcatech_manufacturer_master',$result);

        return $result; 

    }


}
