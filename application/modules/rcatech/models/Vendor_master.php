<?php
/* Author : Shivaji Dalvi */
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor_master extends CI_Model{ 
    function __construct() { 
        // Set table name 
        $this->table = 'rcatech_vendor_master'; 
    } 

    public function addVendormaster($data){
    if(empty($data))
      return FALSE;

    $result = array('vendor_type'=>$data['vendor_type'],'vendor_name'=>$data['vendor_name'],'address'=>$data['vendor_address'],'country_id'=>$data['company_country'],'state_id'=>$data['company_state'],' city_id'=>$data['company_city'],'country_code'=>$data['client_tel_prefix'],'zip_pin_code'=>$data['postal_code'],'tel_no'=>$data['client_tel'],'email_address'=>$data['vendor_email'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1,'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id'],'op_year'=>@$_SESSION['operatingyear']);
    //print_r($result);exit;
    $this->db->insert('rcatech_vendor_master',$result);
    return $this->db->insert_id();

   }

    function getVendortype(){ 

        $querystring = "SELECT * FROM rcatech_vendor_type Where is_active = 1 order by id asc";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAllVendordata(){ 

        #$querystring = "SELECT * FROM rcatech_company_master WHERE is_active = 1 order by id desc";
        $querystring = "SELECT avm.*,avt.vendor_type vendor_info,acnt.name country,ast.name state,act.name city FROM rcatech_vendor_master avm left join rcatech_countries acnt ON acnt.id=avm.country_id left join rcatech_states ast ON ast.id=avm.state_id left join rcatech_cities act ON act.id=avm.city_id left join rcatech_vendor_type avt ON avt.id=avm.vendor_type Where avm.is_active = 1 and avm.user_comp_id = '".$_SESSION['comp_id']."' and avm.user_branch_id = '".$_SESSION['branch_id']."'";

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getVendorById($params){  //$id

        $querystring = "SELECT * FROM rcatech_vendor_master Where id =".$params." order by id";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getVendorByName($params){  //$id

        $querystring = "SELECT * FROM rcatech_vendor_master Where   vendor_name = '".$params."' order by id";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    public function updateVendorData($data)
      {
      
      $result = array('address'=>$data['vendor_address'],'vendor_type'=>$data['vendor_type'],'vendor_name'=>$data['vendor_name'],'country_id'=>$data['company_country'],'state_id'=>$data['company_state'],'city_id'=>$data['company_city'],'zip_pin_code'=>$data['postal_code'],'tel_no'=>$data['vendor_tel'],'email_address'=>$data['vendor_email'],'gst_no'=>@$data['vendor_gst'],'vat_no'=>@$data['vendor_vat'],'tan_no'=>@$data['vendor_tan'],'mobile_no'=>$data['vendor_mobile'],'firm_type'=>$data['vendor_firm'],'is_active'=>1,'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id'],'modify_user_id'=>$data['user_id'],'modify_date'=>$data['dt']);
      
      //print_r($result);exit;
      $this->db->where('id', $data['id']);
      $this->db->limit(1);
      $this->db->update('rcatech_vendor_master',$result);
      //print_r($this->db->last_query());exit;  
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

    }

    public function delvendormaster($id)
      {

      #$querystring = "DELETE FROM rcatech_client_master where id = $id";
      #$queryforpubid = $this->db->query($querystring);

      $result = array('is_active'=>0);  
      $this->db->where('id', $id);
      $this->db->limit(1);
      $this->db->update('rcatech_vendor_master',$result);

      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

      /*if ($queryforpubid) {
        return TRUE;
      }
      return FALSE;*/

    }

    public function addAccountledger($data){
    if(empty($data))
      return FALSE;

    $result = array('vendor_name'=>$data['vendor_name'],'vendor_date'=>$data['ledger_date'],'narration'=>$data['ledger_narration'],'ledger_number'=>@$data['ledger_number'],'ledger_type'=>$data['ledger_type'],' ledger_amount'=>$data['ledger_amount'],' credit_amount'=>@$data['credit_amount'],' debit_amount'=>@$data['debit_amount'],' balance_amount'=>@$data['balance_amount'],' invoice_no'=>@$data['invoice_no'],' invoice_amt'=>@$data['invoice_amt'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1,'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id'],'op_year'=>@$_SESSION['operatingyear']);
    //print_r($result);exit;
    $this->db->insert('rcatech_account_ledger',$result);
    return $this->db->insert_id();

   }

   public function addAccountledgerfileno($data){
    if(empty($data))
      return FALSE;

    $result = array('vendor_name'=>$data['vendor_name'],'vendor_date'=>$data['ledger_date'],'narration'=>$data['ledger_narration'],'ledger_number'=>@$data['ledger_number'],'ledger_type'=>$data['ledger_type'],'ledger_amount'=>$data['ledger_amount'],'credit_amount'=>@$data['credit_amount'],'debit_amount'=>@$data['debit_amount'],' balance_amount'=>@$data['balance_amount'],'file_no'=>@$data['file_no'],'invoice_no'=>@$data['invoice_no'],'invoice_amt'=>@$data['invoice_amt'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1,'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id'],'op_year'=>@$_SESSION['operatingyear']);
    //print_r($result);exit;
    $this->db->insert('rcatech_account_ledger',$result);
    return $this->db->insert_id();

   }

   function getAccountledgerById($params){  //$id

        $querystring = "SELECT * FROM rcatech_account_ledger Where vendor_name =".$params." order by id";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAccountledgerByIdType($id,$t){  //$id

        $querystring = "SELECT * FROM rcatech_account_ledger Where vendor_name =".$id." and ledger_type = '".$t."' order by id desc limit 1";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAccountledgerByIdLast($params){  //$id

        $querystring = "SELECT * FROM rcatech_account_ledger Where vendor_name =".$params." order by id desc limit 1";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAccountledgerByCreditLast($params){  //$id

        $querystring = "SELECT * FROM rcatech_account_ledger Where vendor_name =".$params." and ledger_type = 'Credit' order by id desc limit 1";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAccountledgerByCredit($params){  //$id

        $querystring = "SELECT * FROM rcatech_account_ledger Where vendor_name =".$params." and ledger_type = 'Credit' order by id";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAccountledgerByDebit($params){  //$id

        $querystring = "SELECT * FROM rcatech_account_ledger Where vendor_name =".$params." and ledger_type = 'Debit' order by id";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAccountledgerByClosingBal($params){  //$id

        $querystring = "SELECT * FROM rcatech_account_ledger Where vendor_name =".$params." and ledger_type = 'Closing Balance' order by id";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }


   function getAllAccountledger($data){ 

        $querystring = 'SELECT aal.*,avm.id vendor_id,avm.vendor_name vendor FROM rcatech_account_ledger aal left join rcatech_vendor_master avm ON aal.vendor_name=avm.id Where aal.is_active = 1 and date(aal.vendor_date) >= "'.date('Y-m-d',strtotime($data['fin_from_date'])).'" and date(aal.vendor_date) <= "'.date('Y-m-d',strtotime($data['fin_to_date'])).'" and aal.user_comp_id = "'.$_SESSION['comp_id'].'" and aal.user_branch_id = "'.$_SESSION['branch_id'].'" Order by aal.id desc'; //aal.id
        //echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAllAccountledgerSearch($data){ 

        $search = '';
        if ($data['ledger_from_date'] || $data['ledger_to_date']) {
          $search .= ' and date(aal.vendor_date) >= "'.date('Y-m-d',strtotime($data['ledger_from_date'])).'" and date(aal.vendor_date) <= "'.date('Y-m-d',strtotime($data['ledger_to_date'])).'"';
        }

        if ($data['vendor_name']) {
          $search .= ' and aal.vendor_name = "'.$data['vendor_name'].'"';
        }

        $querystring = "SELECT aal.*,avm.id vendor_id,avm.vendor_name vendor FROM rcatech_account_ledger aal left join rcatech_vendor_master avm ON aal.vendor_name=avm.id Where aal.is_active = 1 $search Order by aal.id desc"; //aal.id
        //echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }


    public function delaccountledger($id)
      {

      $result = array('is_active'=>0);  
      $this->db->where('id', $id);
      $this->db->limit(1);
      $this->db->update('rcatech_account_ledger',$result);

      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

    }

    public function delledgerclosingbl($id)
      {

      $querystring = "DELETE FROM rcatech_account_ledger where id = '".$id."'";
      $queryforpubid = $this->db->query($querystring);
  
    }

    public function updateLedgerData($data)
      {
      
      $result = array('vendor_date'=>$data['ledger_date'],'narration'=>$data['ledger_narration'],'ledger_number'=>$data['ledger_number'],'ledger_type'=>$data['ledger_type'],'ledger_amount'=>$data['ledger_amount'],'modify_user_id'=>$data['user_id'],'is_active'=>1); // ,'description'=>$data['description']
      
      //print_r($result);exit;
      $this->db->where('id', $data['ledger_id']);
      $this->db->limit(1);
      $this->db->update('rcatech_account_ledger',$result);
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

    }

    public function updateLedgerDataStatus($data)
      {
      //echo $data;exit;  
      $result = array('status'=>'Closed'); 

      //print_r($result);exit;
      $this->db->where('vendor_name',$data);
      //$this->db->limit(1);
      $this->db->update('rcatech_account_ledger',$result);
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

    }

    function getAllledgerreport(){ 

        $querystring = "SELECT avm.vendor_name, sum(aal.credit_amount) totalCredit, sum(aal.debit_amount) totaldebit, (sum(aal.credit_amount) - sum(aal.debit_amount)) BalanceAmount FROM rcatech_account_ledger aal left join rcatech_vendor_master avm on aal.vendor_name = avm.id GROUP BY vendor_name";

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAllledgerreportSearch($data){ 

        $search = '';
        if ($data['ledger_from_date'] || $data['ledger_to_date']) {
          $search .= ' and date(aal.entry_date) >= "'.date('Y-m-d',strtotime($data['ledger_from_date'])).'" and date(aal.entry_date) <= "'.date('Y-m-d',strtotime($data['ledger_to_date'])).'"';
        }

        //$querystring = "SELECT avm.vendor_name, sum(aal.credit_amount) totalCredit, sum(aal.debit_amount) totaldebit, (sum(aal.credit_amount) - sum(aal.debit_amount)) BalanceAmount FROM rcatech_account_ledger aal left join rcatech_vendor_master avm on aal.vendor_name = avm.id $search GROUP BY vendor_name";

        $querystring = "SELECT aal.*,avm.id vendor_id,avm.vendor_name FROM rcatech_account_ledger aal left join rcatech_vendor_master avm ON aal.vendor_name=avm.id Where aal.is_active = 1  $search Order by aal.id";

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAllledgerreportCount(){
        $querystring = "SELECT vendor_name,count(vendor_name) count from rcatech_account_ledger GROUP BY vendor_name";

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }  

    function getAllFiledata(){ 

        $querystring = 'SELECT aft.file_no,aft.id file_id FROM rcatech_fileregister_transaction aft Where aft.user_comp_id = "'.$_SESSION['comp_id'].'" and aft.user_branch_id = "'.$_SESSION['branch_id'].'" and aft.op_year = "'.$_SESSION['operatingyear'].'" and aft.file_no !=""';
        //$querystring = 'SELECT aft.file_no,aft.id file_id FROM rcatech_fileregister_transaction aft Where aft.user_comp_id = "'.$_SESSION['comp_id'].'" and aft.user_branch_id = "'.$_SESSION['branch_id'].'" and aft.file_no !=""';
        //echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function fetch_inv_byfileno($file_id)
    {
  
      $querystring = 'SELECT aim.* FROM rcatech_invoice_master aim,rcatech_fileregister_transaction aft WHERE aft.id=aim.file_no and aft.file_no= "'.$file_id.'"';
      $queryforpubid = $this->db->query($querystring);

      $result = $queryforpubid->result_array();
      $output = '<option value="">Select Invoice</option>';
      foreach($result as $row)
      {
         $output .= '<option value="'.$row['invoice_no'].'">'.$row['invoice_no'].'</option>';
      };

      return $output;

    }

    public function getInvoiceDetailsByInvno($params){  //$id

        $querystring =  "SELECT invoice_amt from rcatech_invoice_master Where invoice_no = '".$params."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        //print_r($result);exit;
        return $result[0]['invoice_amt'];

    }

    function getFileDetailsByFileNo($params){  //$id

        $querystring = "SELECT * FROM rcatech_fileregister_transaction aft Where aft.file_no ='".$params."' and aft.user_comp_id = '".$_SESSION['comp_id']."' and aft.user_branch_id = '".$_SESSION['branch_id']."' and aft.file_no !=''";
        //echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    public function getInvoiceByInvno($params){  //$id

        $querystring =  "SELECT invoice_amt from rcatech_invoice_master Where invoice_no = '".$params."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        //print_r($result);exit;
        return $result[0]['invoice_amt'];

    }   

}
