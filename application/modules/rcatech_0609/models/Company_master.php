<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company_master extends CI_Model{ 
    function __construct() { 
        // Set table name 
        $this->table = 'rcatech_company_master'; 
    } 

    function getRows($params = array()){ 

        $querystring = "SELECT * FROM rcatech_company_master WHERE is_active = 1";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getCompanydata(){ 

        #$querystring = "SELECT * FROM rcatech_company_master WHERE is_active = 1 order by id desc";
        $querystring = "SELECT acm.*,acnt.name country,ast.name state,act.name city FROM rcatech_company_master acm left join rcatech_countries acnt ON acnt.id=acm.countryid left join rcatech_states ast ON ast.id=acm.stateid left join rcatech_cities act ON act.id=acm.cityid Where acm.is_active = 1";

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getCompanydatabyid($params){ 

        $query_getCompanydatabyid = "SELECT * FROM rcatech_company_master WHERE is_active = 1 and id= '".$params."'";
        $queryforpubid_getCompanydatabyid = $this->db->query($query_getCompanydatabyid);

        $result_getCompanydatabyid = $queryforpubid_getCompanydatabyid->result_array();

        return $result_getCompanydatabyid;

    }

    function fetch_branch($comp_id)
    {
  
      echo $querystring = "SELECT * FROM rcatech_branch_master WHERE comp_id = '".$comp_id."' and is_active = 1";exit;
      $queryforpubid = $this->db->query($querystring);

      $result = $queryforpubid->result_array();
      $output = '<option value="">Select Country</option>';
      foreach($result as $row)
      {
         $output .= '<option value="'.$row['id'].'">'.$row['branch_name'].'</option>';
      };

   	  return $output;

    }    

    function fetch_op_year($comp_id)
    {
  
      $querystring = "SELECT * FROM rcatech_operation_year WHERE comp_id = '".$comp_id."' and is_active = 1 order by id desc";
      $queryforpubid = $this->db->query($querystring);

      $result = $queryforpubid->result_array();
      $output = '<option value="">Select Financial Year</option>';
      foreach($result as $row)
      {
         #$output .= '<option value="'.$row['id'].'">'.$row['year'].'</option>';
        $output .= '<option value="'.$row['year'].'">'.$row['year'].'</option>';
      };

   	  return $output;

    } 

    function fetch_fin_year($comp_id)
    {
  
      $querystring = "SELECT * FROM rcatech_fin_yr WHERE comp_id = '".$comp_id."'";
      $queryforpubid = $this->db->query($querystring);

      $result = $queryforpubid->result_array();
      $output = '<option value="">Select Financial Period</option>';
      foreach($result as $row)
      {
         $output .= '<option value="'.$row['id'].'">'.$row['year'].'</option>';
      };

   	  return $output;

    }   

    function getCountries($params = array()){ 

        $querystring = "SELECT * FROM rcatech_countries order by id";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getStates($country_id){ 

        $querystring = "SELECT * FROM rcatech_states where country_id = '".$country_id."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getCities($state_id){ 

        $querystring = "SELECT * FROM rcatech_cities WHERE state_id = '".$state_id."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }


    function fetch_states($country_id)
    {
  
      $querystring = "SELECT * FROM rcatech_states WHERE country_id = '".$country_id."'";
      $queryforpubid = $this->db->query($querystring);

      $result = $queryforpubid->result_array();
      $output = '<option value="">Select State</option>';
      foreach($result as $row)
      {
         $output .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
      };

      return $output;

    }

    function fetch_city($state_id)
    {
  
      $querystring = "SELECT * FROM rcatech_cities WHERE state_id = '".$state_id."'";
      $queryforpubid = $this->db->query($querystring);

      $result = $queryforpubid->result_array();

      $output = '<option value="">Select City</option>';
      foreach($result as $row)
      {
         $output .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
      };
      
      return $output;

    }  

    function fetch_countrycode($country_id){ 

        $querystring = "SELECT phonecode FROM rcatech_countries where id = '".$country_id."'";
        $queryforpubid = $this->db->query($querystring);
        $output = '';
        $result = $queryforpubid->result_array();
        foreach($result as $row)
        {
          $output .= '<option value="'.$row['phonecode'].'">'.$row['phonecode'].'</option>';
        };
        return $output;

        #return $result[0]['phonecode'];

    }

    function fetch_phonecode($country_id){ 

        $querystring = "SELECT phonecode FROM rcatech_countries where id = '".$country_id."'";
        $queryforpubid = $this->db->query($querystring);
        $output = '';
        $result = $queryforpubid->result_array();

        return $result[0]['phonecode'];

    }


    public function addCompanymaster($data){
    if(empty($data))
      return FALSE;

    /*$result = array('name'=>$data['company_name'],'address'=>$data['company_address'],'cityid'=>$data['company_city'],'stateid'=>$data['company_state'],'countryid'=>$data['company_country'],'pincode'=>$data['company_pincode'],'telno'=>$data['company_telno'],'faxno'=>$data['company_faxno'],'gst_no'=>$data['company_gstno'],'vat_no'=>$data['company_vatno'],'panno'=>$data['company_panno'],'cin'=>$data['company_cinno'],'bank_account_name'=>$data['bank_account_name'],'bank_account_no'=>$data['bank_account_number'],'bank_address'=>$data['bank_account_address'],'iban'=>$data['bank_iban'],'bic'=>$data['bank_bic'],'bank_cleaing_no'=>$data['bank_cleaing_no'],'bank_beneficiary'=>$data['bank_beneficiary'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1);*/

    $result = array('name'=>$data['company_name'],'address'=>$data['company_address'],'cityid'=>$data['company_city'],'stateid'=>$data['company_state'],'countryid'=>$data['company_country'],'country_code'=>$data['client_tel_prefix'],'pincode'=>$data['company_pincode'],'telno'=>$data['company_telno'],'faxno'=>$data['company_faxno'],'gst_no'=>$data['company_gstno'],'vat_no'=>$data['company_vatno'],'panno'=>$data['company_panno'],'cin'=>$data['company_cinno'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1);


    //print_r($result);exit;
    $this->db->insert('rcatech_company_master',$result);
    return $this->db->insert_id();

   }

   public function updateCompanymaster($data){
      
      #$result = array('name'=>$data['company_name'],'address'=>$data['company_address'],'cityid'=>$data['company_city'],'stateid'=>$data['company_state'],'countryid'=>$data['company_country'],'pincode'=>$data['company_pincode'],'telno'=>$data['company_telno'],'faxno'=>$data['company_faxno'],'gst_no'=>$data['company_gstno'],'vat_no'=>$data['company_vatno'],'panno'=>$data['company_panno'],'cin'=>$data['company_cinno'],'bank_account_name'=>$data['bank_account_name'],'bank_account_no'=>$data['bank_account_number'],'bank_address'=>$data['bank_account_address'],'iban'=>$data['bank_iban'],'bic'=>$data['bank_bic'],'bank_cleaing_no'=>$data['bank_cleaing_no'],'bank_beneficiary'=>$data['bank_beneficiary']);

      $result = array('name'=>$data['company_name'],'address'=>$data['company_address'],'cityid'=>$data['company_city'],'stateid'=>$data['company_state'],'countryid'=>$data['company_country'],'country_code'=>$data['client_tel_prefix'],'pincode'=>$data['company_pincode'],'telno'=>$data['company_telno'],'faxno'=>$data['company_faxno'],'gst_no'=>$data['company_gstno'],'vat_no'=>$data['company_vatno'],'panno'=>$data['company_panno'],'cin'=>$data['company_cinno'],'modify_user_id'=>$data['user_id'],'modify_date'=>$data['dt']);


      //print_r($result);exit;
      $this->db->where('id', $data['company_id']);
      $this->db->limit(1);
      $this->db->update('rcatech_company_master',$result);
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

   }

   function fetchCountryById($params){ 
        
        $querystring = "SELECT * FROM rcatech_countries where id =".$params;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();

        return $result;

    }

    function fetchStateById($params){ 

        
        $querystring = "SELECT * FROM rcatech_states where id =".$params;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        
        return $result;

    }

    function fetchCityById($params){ 

        $querystring = "SELECT * FROM rcatech_cities where id =".$params;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        
        return $result;

    }

     public function delcompanymaster($id)
      {

      $result = array('is_active'=>0);
      
      $this->db->where('id', $id);
      $this->db->limit(1);
      $this->db->update('rcatech_company_master',$result);
      #echo $this->db->last_query();exit;
      return $rows = (($this->db->affected_rows() > 0)?TRUE:FALSE);
    
     }

    function get_op_year($comp_id)
    {
  
      $querystring = "SELECT * FROM rcatech_operation_year WHERE comp_id = '".$comp_id."' and is_active = 1 order by id";
      $queryforpubid = $this->db->query($querystring);

      $result = $queryforpubid->result_array();
      return $result;

    } 

    function get_fin_year($comp_id)
    {
  
      $querystring = "SELECT * FROM rcatech_fin_yr WHERE comp_id = '".$comp_id."'";
      $queryforpubid = $this->db->query($querystring);

      $result = $queryforpubid->result_array();
      return $result[0];

    }     

}
