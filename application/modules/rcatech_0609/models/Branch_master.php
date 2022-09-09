<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branch_master extends CI_Model{ 
    function __construct() { 
        // Set table name 
        $this->table = 'rcatech_branch_master'; 
    } 

    public function addBranchmaster($data){
    if(empty($data))
      return FALSE;

    $result = array('comp_id'=>$data['branch_company_name'],'branch_name'=>$data['branch_name'],'branch_email'=>$data['branch_email'],'branch_type'=>$data['branch_type'],'certificate_prefix'=>$data['branch_cp'],'address'=>$data['branch_address'],'countryid'=>$data['company_country'],'stateid'=>$data['company_state'],' cityid'=>$data['company_city'],'country_code'=>$data['client_tel_prefix'],'bank_name'=>$data['bank_name'],'bank_branch_name'=>$data['bank_branch'],'bank_address'=>$data['bank_address'],'bank_account_no'=>$data['bank_acct'],'ifsc_code'=>$data['bank_ifsc'],'primary_email_id'=>$data['primary_email'],'secondary_email_id'=>$data['secondary_email'],'invoice_incharge'=>$data['invoice_incharge'],'gst_no'=>@$data['gst_no'],'vat_no'=>@$data['vat_no'],'tel_no'=>$data['bank_telno'],'mobile_no'=>$data['bank_mobile'],'fax_no'=>$data['bank_faxno'],'iban'=>$data['bank_iban'],'bic'=>$data['bank_bic'],'bank_cleaing_no'=>$data['bank_clearing_no'],'bank_beneficiary'=>$data['bank_beneficiary'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1);
    #print_r($result);exit;
    $this->db->insert('rcatech_branch_master',$result);
    return $this->db->insert_id();

   }

    function getBranchdata(){ 

        $querystring = "SELECT id,branch_name,branch_email,address,bank_name,bank_branch_name FROM rcatech_branch_master order by id desc";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getBranchdataByStatus(){ 

        $querystring = "SELECT id,branch_name,branch_email,address,bank_name,bank_branch_name FROM rcatech_branch_master where is_active = 1 order by id desc";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getBranchdataById($params){ 

        #$querystring = "SELECT id,branch_name,branch_email,address,bank_name,bank_branch_name FROM rcatech_branch_master WHERE id = '".$params."'";

        $querystring = "SELECT abm.*,ac.sortname,ac.currency FROM rcatech_branch_master abm left join rcatech_countries ac ON abm.countryid=ac.id WHERE abm.id = '".$params."'";

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result[0];

    }

    function getBranchById($params){ 

        $querystring = "SELECT * FROM rcatech_branch_master WHERE id = '".$params."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getBranchByCompanyId($params){ 

        $querystring = "SELECT * FROM rcatech_branch_master WHERE comp_id = '".$params."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

     function getBranchInvoicesdata(){ 

        $querystring = "SELECT * FROM rcatech_branch_master WHERE create_invoice = '1'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function fetch_branch($comp_id)
    {
  
      $querystring = "SELECT * FROM rcatech_branch_master WHERE comp_id = '".$comp_id."'";
      $queryforpubid = $this->db->query($querystring);

      $result = $queryforpubid->result_array();
      $output = '<option value="">Select Branch Name</option>';
      foreach($result as $row)
      {
         $output .= '<option value="'.$row['id'].'">'.$row['branch_name'].'</option>';
      };

      return $output;

    } 

    public function updateBranchData($data)
      {
      
      $result = array('comp_id'=>$data['branch_company_name'],'branch_name'=>$data['branch_name'],'branch_email'=>$data['branch_email'],'branch_type'=>$data['branch_type'],'certificate_prefix'=>$data['branch_cp'],'address'=>$data['branch_address'],'countryid'=>$data['company_country'],'stateid'=>$data['company_state'],'cityid'=>$data['company_city'],'country_code'=>$data['client_tel_prefix'],'bank_name'=>$data['bank_name'],'bank_branch_name'=>$data['bank_branch'],'bank_account_no'=>$data['bank_acct'],'ifsc_code'=>$data['bank_ifsc'],'primary_email_id'=>@$data['primary_email'],'secondary_email_id'=>@$data['secondary_email'],'invoice_incharge'=>@$data['invoice_incharge'],'gst_no'=>@$data['gst_no'],'  vat_no'=>@$data['vat_no'],'tel_no'=>$data['bank_telno'],'mobile_no'=>$data['bank_mobile'],'fax_no'=>$data['bank_faxno'],'iban'=>$data['bank_iban'],'bic'=>$data['bank_bic'],'bank_cleaing_no'=>$data['bank_clearing_no'],'bank_beneficiary'=>$data['bank_beneficiary'],'modify_user_id'=>$data['user_id'],'is_active'=>1);
      
      //print_r($result);exit;
      $this->db->where('id', $data['id']);
      $this->db->limit(1);
      $this->db->update('rcatech_branch_master',$result);
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

    }

    public function delbranchmaster($id)
      {

      $querystring = "DELETE FROM rcatech_branch_master where id = $id";
      $queryforpubid = $this->db->query($querystring);

      if ($queryforpubid) {
        return TRUE;
      }
      return FALSE;

    }

    function getBranchdataByUser($id)
    {
  
      $querystring = "SELECT rbm.id,rbm.branch_name FROM rcatech_user_branch_access ruba left join rcatech_branch_master rbm on rbm.id=ruba.branch_id
          left join rcatech_employee_users_master reum on reum.id=ruba.user_id
      WHERE reum.emp_code = '".$id."'";
      $queryforpubid = $this->db->query($querystring);

      $result = $queryforpubid->result_array();
      $output = '<option value="">Select Branch Name</option>';
      foreach($result as $row)
      {
         $output .= '<option value="'.$row['id'].'">'.$row['branch_name'].'</option>';
      };

      return $output;

    }



}
