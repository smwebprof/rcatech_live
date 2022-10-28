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


    function getEmpetails($params){  

          $querystring = "SELECT * FROM rcatech_employee_users_master Where emp_code = '".$params[0]."'";

          $queryforpubid = $this->db->query($querystring);

          $result = $queryforpubid->result_array();
          //print_r($result);exit;
          $resultmax = 0;
          if (empty($result[0]['id'])) {
             //echo $resultmax = $params[0];exit;
            $result = array('emp_code'=>$params[0],'company_id'=>$params[1],'branch_id'=>$params[2],'first_name'=>$params[3],'middle_name'=>$params[4],'last_name'=>$params[5],'current_address'=>$params[6],'permanent_address'=>$params[7],'birth_date'=>$params[8],'office_email'=>'rcainetdocs@gmail.com','personal_email'=>$params[10],'password'=>'NTc5ZmQxNTc0MWJlMjU1MGE0NGFlODQ2ZDNlMWFlNGU=','gender'=>$params[12],'moblie_no'=>$params[13],'pan_no_tax_id'=>$params[14],'uidaino_aadhar_card'=>$params[15],'emp_designation_id'=>$params[16],'entry_user_id'=>$params[17],'modify_user_id'=>$params[18],'entry_date'=>'2022-10-12 00:00:00','modify_date'=>'2022-10-12 00:00:00','is_active'=>'1','employee_staff'=>$params[22],'city_id'=>$params[23],'state_id'=>$params[24],'country_id'=>$params[25],'country_code'=>$params[26]);
             //print_r($result);exit;

             $this->db->insert('rcatech_employee_users_master',$result);
             $resultmax = $this->db->insert_id();
          } 
          
          return $resultmax;
    }

    function getEnggdetails($params){  

          $querystring = "SELECT * FROM  rcatech_engineerlist_master Where emp_code = '".$params[1]."'";

          $queryforpubid = $this->db->query($querystring);

          $result = $queryforpubid->result_array();
          //print_r($result);exit;
          $resultmax = 0;
          if (empty($result[0]['id'])) {
             //echo $resultmax = $params[0];exit;
            $result = array('branch_id'=>$params[0],'emp_code'=>$params[1],'first_name'=>$params[2],'middle_name'=>$params[3],'last_name'=>$params[4],'mother_name'=>$params[5],'short_name'=>$params[6],'birth_date'=>$params[7],'sch_retirement_date'=>$params[8],'retirement_date'=>$params[9],'address'=>$params[10],'phone'=>$params[11],'mobile'=>$params[12],'email'=>'rcainetdocs@gmail.com','secondary_email'=>$params[14],'category_name'=>$params[15],'nabcb_flag'=>'0','role'=>'Inspector','entry_user_id'=>'1','modify_user_id'=>'1','entry_date'=>'2022-10-12 00:00:00','modify_date'=>'2022-10-12 00:00:00','is_active'=>'1','user_comp_id'=>'1','user_branch_id'=>'1','op_year'=>'1');
             //print_r($result);exit;

             $this->db->insert('rcatech_engineerlist_master',$result);
             $resultmax = $this->db->insert_id();
          } 
          
          return $resultmax;
    }


    function getManufacturerdata(){ 

        $querystring = "SELECT rmm.*,rim.item_name,rism.subitem_name FROM  rcatech_manufacturer_master rmm
        left join rcatech_item_master rim on rim.id=rmm.item_id
        left join rcatech_item_subtype_master rism on rism.id=rmm.item_subtype_id
        ";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getVendordata(){ 

        $querystring = "SELECT rvm.*,rim.item_name,rism.subitem_name FROM  rcatech_vendor_master rvm left join rcatech_item_master rim on rim.id=rvm.item_id
        left join rcatech_item_subtype_master rism on rism.id=rvm.item_subtype_id
        ";
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
