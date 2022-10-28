<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_master extends CI_Model{ 
    function __construct() { 
        // Set table name 
        $this->table = 'rcatech_client_master'; 
        $this->load->model('company_master');
    } 

    public function addClientmaster($data){
    if(empty($data))
      return FALSE;

    #$data['company_country'] = $this->fetchCountryById($data['company_country']);
    #$data['company_state'] = $this->fetchStateById($data['company_state']);
    #$data['company_city'] = $this->fetchCityById($data['company_city']);

    $result = array('comp_id'=>$data['user_company'],'branch_id'=>'1','client_type'=>$data['client_type'],'client_name'=>$data['client_name'],'client_shortname'=>$data['client_shortname'],'client_location'=>$data['city_name'],'address'=>$data['client_address'],'country_id'=>$data['company_country'],'state_id'=>$data['company_state'],' city_id'=>$data['company_city'],'country_code'=>$data['client_tel_prefix'],'zip_pin_code'=>$data['postal_code'],'tel_no'=>$data['client_tel'],'email_address'=>$data['client_email'],'gst_no'=>@$data['client_gst'],'client_gst_legal'=>@$data['client_gst_legal'],'client_gst_pay'=>@$data['client_gst_pay'],'client_gst_options'=>@$data['client_gst_options'],'gst_email_date'=>@$data['gst_email_date'],'client_gst_type'=>@$data['client_gst_type'],'upl_gst_type'=>@$data['upl_gst_type_path'],'pan'=>@$data['client_pan'],'vat_no'=>@$data['client_vat'],'tan_no'=>@$data['client_tan'],'mobile_no'=>$data['client_mobile'],' firm_type'=>$data['client_firm'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1,'user_comp_id'=>$data['user_company'],'user_branch_id'=>'1'); // $data['branch_name']
    //print_r($result);exit;
    $this->db->insert('rcatech_client_master',$result);
    return $this->db->insert_id();

   }

    public function addClientDetails($data){
        for ($x = 0; $x <= count($data['div_contact_name']); $x++) {
            
          if (!empty($data['div_contact_name'][$x])) {
            $result = array('client_id'=>$data['client_id'],'contact_person_name'=>$data['div_contact_name'][$x],'prefix'=>$data['div_contact_prefix'][$x],'country_code'=>$data['client_tel_prefix'],'mobile_no'=>$data['div_contact_mobile'][$x],'email_address'=>$data['div_contact_email'][$x],'type'=>$data['div_contact_type'][$x]);
            #print_r($result);exit;
            $this->db->insert('rcatech_client_details',$result);
          }   
        }

        return @$result;

    }  

    function getClientAttentiondetails($params){  

          $querystring = "SELECT contact_person_name FROM rcatech_client_details where client_id ='".$params."' and type = 'primary'";

          $queryforpubid = $this->db->query($querystring);

          $result = $queryforpubid->result_array();

          return @$result[0];
    } 

    function getAllClientdetails($params){  

          $querystring = "SELECT * FROM rcatech_client_details where client_id ='".$params."'";

          $queryforpubid = $this->db->query($querystring);

          $result = $queryforpubid->result_array();

          return @$result;
    } 

    function getClientdata(){  //$id

        $querystring = "SELECT id,client_name,address,city_id,state_id,country_id FROM rcatech_client_master where (client_type = 'Client' or client_type is null or client_type = 'Foreign') order by client_name";

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

     function getClientdataByBranchid(){ //$params
        
        $querystring = "SELECT rcm.id,rcm.client_name,rcm.client_location,rcm.address,rcm.city_id,rcm.state_id,rcm.country_id,rct.name city FROM rcatech_client_master rcm left join rcatech_cities rct on rcm.city_id=rct.id  where rcm.is_active = 1 order by rcm.client_name";

        //$querystring = "SELECT rcm.id,rcm.client_name,rcm.address,rcm.city_id,rcm.state_id,rcm.country_id,rct.name city FROM rcatech_client_master rcm left join rcatech_cities rct on rcm.city_id=rct.id  where (rcm.client_type = 'Client' or rcm.client_type is null or rcm.client_type = 'Foreign') and rcm.branch_id =".$params." and rcm.is_active = 1 order by rcm.client_name";
        #echo $querystring;exit;

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;
     } 

    function getClientdataById($params){  //$id

        $querystring = "SELECT * FROM rcatech_client_master Where id =".$params." order by client_name";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }


    function getAllClientdata($id){  //$id

        #$querystring = "SELECT id,client_name,address,city_id,state_id,country_id FROM rcatech_client_master where is_active = $id";
        $querystring = "SELECT acm.*,acnt.name country,ast.name state,act.name city FROM rcatech_client_master acm 
                            left join rcatech_countries acnt ON acnt.id=acm.country_id
                            left join rcatech_states ast ON ast.id=acm.state_id
                            left join rcatech_cities act ON act.id=acm.city_id
                            where is_active = $id and comp_id = '1' and branch_id = '1' order by acm.client_name asc"; // $_SESSION['comp_id']   $_SESSION['branch_id']
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    public function updateClientData($data)
      {

      $result = array('comp_id'=>$data['user_company'],'branch_id'=>$data['branch_name'],'client_type'=>$data['client_type'],'client_name'=>$data['client_name'],'client_shortname'=>$data['client_shortname'],'address'=>$data['client_address'],'country_id'=>$data['company_country'],'state_id'=>$data['company_state'],' city_id'=>$data['company_city'],'country_code'=>$data['client_tel_prefix'],'zip_pin_code'=>$data['postal_code'],'tel_no'=>$data['client_tel'],'email_address'=>$data['client_email'],'gst_no'=>@$data['client_gst'],'client_gst_legal'=>@$data['client_gst_legal'],'client_gst_pay'=>@$data['client_gst_pay'],'client_gst_options'=>@$data['client_gst_options'],'gst_email_date'=>@$data['gst_email_date'],'client_gst_type'=>@$data['client_gst_type'],'upl_gst_type'=>@$data['upl_gst_type'],'pan_no'=>@$data['client_pan'],'vat_no'=>@$data['client_vat'],'tan_no'=>@$data['client_tan'],'mobile_no'=>$data['client_mobile'],' firm_type'=>$data['client_firm'],'modify_user_id'=>$data['user_id'],'modify_date'=>$data['dt'],'is_active'=>1,'user_comp_id'=>$data['user_company'],'user_branch_id'=>$data['branch_name']);
      
      //print_r($result);exit;
      $this->db->where('id', $data['id']);
      $this->db->limit(1);
      $this->db->update('rcatech_client_master',$result);
      //print_r($this->db->last_query());exit;  
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

    }

    public function delclientmaster($id)
      {

      #$querystring = "DELETE FROM rcatech_client_master where id = $id";
      #$queryforpubid = $this->db->query($querystring);

      $result = array('is_active'=>0);  
      $this->db->where('id', $id);
      $this->db->limit(1);
      $this->db->update('rcatech_client_master',$result);

      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

      /*if ($queryforpubid) {
        return TRUE;
      }
      return FALSE;*/

    }


    public function fetchCountryById($params){ 
        
        $querystring = "SELECT name FROM rcatech_countries where id =".$params;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
       
        return $result[0]['name'];

    }

    public function fetchStateById($params){ 

        
        $querystring = "SELECT name FROM rcatech_states where id =".$params;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        
        return $result[0]['name'];

    }

    public function fetchCityById($params){ 

        $querystring = "SELECT name FROM rcatech_cities where id =".$params;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        
        return $result[0]['name'];

    }

}
