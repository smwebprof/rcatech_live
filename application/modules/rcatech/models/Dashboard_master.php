<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_master extends CI_Model{ 
    function __construct() { 
        // Set table name 
        $this->table = 'rcatech_fileregister_transactionr'; 
    } 

    function getAllFiledata($operatingyear){ 

        $querystring = 'SELECT count(*) filecount FROM rcatech_fileregister_transaction aft Where aft.user_comp_id = "'.$_SESSION['comp_id'].'" and aft.user_branch_id = "'.$_SESSION['branch_id'].'" and aft.op_year = "'.$operatingyear.'"';
        //echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAllFileCompletedata($operatingyear){ 

        $querystring = 'SELECT count(*) filecount FROM rcatech_fileregister_transaction aft Where aft.user_comp_id = "'.$_SESSION['comp_id'].'" and aft.user_branch_id = "'.$_SESSION['branch_id'].'" and aft.op_year = "'.$operatingyear.'" and aft.status = "Completed"';
        //echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAllFilePendingdata($operatingyear){ 

        $querystring = 'SELECT count(*) filecount FROM rcatech_fileregister_transaction aft Where aft.user_comp_id = "'.$_SESSION['comp_id'].'" and aft.user_branch_id = "'.$_SESSION['branch_id'].'" and aft.op_year = "'.$operatingyear.'" and aft.status = "Pending"';
        //echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAllFileInvoiceddata($operatingyear){ 

        $querystring = 'SELECT count(*) filecount FROM rcatech_fileregister_transaction aft Where aft.user_comp_id = "'.$_SESSION['comp_id'].'" and aft.user_branch_id = "'.$_SESSION['branch_id'].'" and aft.op_year = "'.$operatingyear.'" and aft.status = "Invoiced"';
        //echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAllFileCancelledddata($operatingyear){ 

        $querystring = 'SELECT count(*) filecount FROM rcatech_fileregister_transaction aft Where aft.user_comp_id = "'.$_SESSION['comp_id'].'" and aft.user_branch_id = "'.$_SESSION['branch_id'].'" and aft.op_year = "'.$operatingyear.'" and aft.status = "Cancelled"';
        //echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAllFileRunningdata($operatingyear){ 

        $querystring = 'SELECT count(*) filecount FROM rcatech_fileregister_transaction aft Where aft.user_comp_id = "'.$_SESSION['comp_id'].'" and aft.user_branch_id = "'.$_SESSION['branch_id'].'" and aft.op_year = "'.$operatingyear.'" and aft.status = "Running"';
        //echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAllInvoicedata($operatingyear){ 

        //$querystring = 'SELECT count(*) invoicecount FROM rcatech_invoice_master aim Where aim.user_comp_id = "'.$_SESSION['comp_id'].'" and aim.user_branch_id = "'.$_SESSION['branch_id'].'" and aim.op_year = "'.$_SESSION['operatingyear'].'"';
        $querystring = 'SELECT count(*) invoicecount FROM rcatech_invoice_master aim Where aim.user_comp_id = "'.$_SESSION['comp_id'].'" and aim.op_year = "'.$operatingyear.'" and aim.user_branch_id = "'.$_SESSION['branch_id'].'"';
        //echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAllInvoicePaymentdataByStatus($operatingyear){ 

        $querystring =  "SELECT aim.*,apim.id payment_id,apim.invoice_no payment_invoice_no,apim.payment_date,apim.invoice_rec_amt,apim.invoice_balane_amt FROM rcatech_invoice_master aim left join rcatech_payment_invoice_master apim on aim.id=apim.invoice_no WHERE aim.user_comp_id =  '".$_SESSION['comp_id']."' and aim.user_branch_id = '".$_SESSION['branch_id']."' and aim.op_year = '".$operatingyear."' and aim.is_active = 1 and aim.invoice_type='Final'  order by apim.id desc";

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }


    function getAllClientdata(){ 

        $querystring = 'SELECT count(*) clientcount FROM rcatech_client_master acm Where acm.user_comp_id = "'.$_SESSION['comp_id'].'" and acm.user_branch_id = "'.$_SESSION['branch_id'].'" and is_active = 1';
        //echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getCargoClientReportdata(){ 

        $querystring = "select acm.commodity_name,acgm.name cargo_group_name,ac.client_name,aftcd.approx_qty,aum.unit_name,aftcd.load_port,aftcd.discharge_port,aft.id file_id from rcatech_fileregister_transaction_cargo_details aftcd left join rcatech_fileregister_transaction aft on aftcd.fileregister_transaction_id=aft.id left join rcatech_cargo_master acm on aftcd.cargo_id=acm.id left join  rcatech_cargo_group_master acgm on aftcd.cargo_group_id=acgm.id left join rcatech_client_master ac on aft.client_id=ac.id left join rcatech_unit_master aum on aftcd.approx_unit=aum.id Where aft.is_active = 1 and aft.user_comp_id = '".$_SESSION['comp_id']."' and aft.user_branch_id = '".$_SESSION['branch_id']."' limit 5";
        //echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAllAccountledger($data){ 

        $querystring = 'SELECT aal.*,avm.id vendor_id,avm.vendor_name vendor FROM rcatech_account_ledger aal left join rcatech_vendor_master avm ON aal.vendor_name=avm.id Where aal.is_active = 1 and date(aal.vendor_date) >= "'.date('Y-m-d',strtotime($data['fin_from_date'])).'" and date(aal.vendor_date) <= "'.date('Y-m-d',strtotime($data['fin_to_date'])).'" and aal.user_comp_id = "'.$_SESSION['comp_id'].'" and aal.user_branch_id = "'.$_SESSION['branch_id'].'" Order by aal.id desc'; //aal.id

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getVendorDetails(){  //$id

        $querystring = 'SELECT count(*) vendors FROM rcatech_vendor_master Where is_active = 1 and user_comp_id = "'.$_SESSION['comp_id'].'" and user_branch_id = "'.$_SESSION['branch_id'].'"';
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getCargoDetails(){  //$id

        $querystring = "SELECT count(*) cargos FROM rcatech_cargo_master Where is_active = 1";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getClientInteractions(){  //$id

        $querystring = 'SELECT count(*) interactions FROM rcatech_client_interaction_report Where is_active = 1 and user_comp_id = "'.$_SESSION['comp_id'].'" and user_branch_id = "'.$_SESSION['branch_id'].'"';
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAllFileRecentPendingdata(){ 

        $querystring = 'SELECT aft.file_no,aeum.first_name,aeum.last_name,aft.entry_date FROM rcatech_fileregister_transaction aft,rcatech_employee_users_master aeum Where aft.status = "Pending" and aft.entry_user_id=aeum.id and aft.op_year = "'.$_SESSION['operatingyear'].'" order by aft.entry_date desc limit 5'; // aft.user_comp_id = "'.$_SESSION['comp_id'].'" and aft.user_branch_id = "'.$_SESSION['branch_id'].'" and aft.op_year = "'.$_SESSION['operatingyear'].'" 
        //echo $querystring;exit; 
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAllFileRecentUserPendingdata(){ 

        $querystring = 'SELECT aft.id,aft.file_no,aeum.first_name,aeum.last_name,aft.entry_date,aft.file_creation_date FROM rcatech_fileregister_transaction aft,rcatech_employee_users_master aeum Where aft.user_comp_id = "'.$_SESSION['comp_id'].'" and aft.user_branch_id = "'.$_SESSION['branch_id'].'" and aft.op_year = "'.$_SESSION['operatingyear'].'" and aft.status = "Pending" and aft.entry_user_id=aeum.id order by aft.entry_date desc limit 5';
        //echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAllInvoiceRecentPendingdata(){ 

        $querystring = 'SELECT aim.invoice_no,aeum.first_name,aeum.last_name,aim.file_creation_date FROM rcatech_invoice_master aim,rcatech_employee_users_master aeum Where aim.status = "Open" and aim.entry_user_id=aeum.id  and aim.op_year = "'.$_SESSION['operatingyear'].'" order by aim.entry_date desc limit 5'; // aim.user_comp_id = "'.$_SESSION['comp_id'].'" and aim.user_branch_id = "'.$_SESSION['branch_id'].'" and aim.op_year = "'.$_SESSION['operatingyear'].'" 
        //echo $querystring;exit; 
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAllInvoiceRecentUserPendingdata(){ 

        $querystring = 'SELECT aim.id,aim.invoice_no,aim.invoice_info,aeum.first_name,aeum.last_name,aim.invoice_date FROM rcatech_invoice_master aim,rcatech_employee_users_master aeum Where aim.status = "Open" and aim.entry_user_id=aeum.id and aim.user_comp_id = "'.$_SESSION['comp_id'].'" and aim.user_branch_id = "'.$_SESSION['branch_id'].'" and aim.op_year = "'.$_SESSION['operatingyear'].'" order by aim.entry_date desc limit 5'; // aim.user_comp_id = "'.$_SESSION['comp_id'].'" and aim.user_branch_id = "'.$_SESSION['branch_id'].'" and aim.op_year = "'.$_SESSION['operatingyear'].'" 
        //echo $querystring;exit; 
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function select_op_year($comp_id)
    {
  
      $querystring = "SELECT * FROM rcatech_operation_year WHERE comp_id = '".$comp_id."' order by id";
      $queryforpubid = $this->db->query($querystring);

      $result = $queryforpubid->result_array();
      return $result;

    }


}
