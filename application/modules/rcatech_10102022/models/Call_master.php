<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Call_master extends CI_Model{ 
    function __construct() { 
        // Set table name 
        $this->table = 'rcatech_callgeneration_transaction'; 
    }    

    function getCallGenerationAllData(){ 

        $querystring = "SELECT rcgt.*,rft.file_no,rcm.client_name,rcm.city_id,rmm.manufacturer_name manufacturer_info,rcm1.client_name end_client_info FROM rcatech_callgeneration_transaction rcgt
        left join rcatech_fileregister_transaction rft On rcgt.file_id = rft.id
        left join rcatech_client_master rcm On rcgt.client_id = rcm.id
        left join rcatech_manufacturer_master rmm On rcgt.manufacturer_name = rmm.id
        left join rcatech_client_master rcm1 On rcgt.end_client_name = rcm1.id
        WHERE rcgt.user_comp_id = '".$_SESSION['comp_id']."' and rcgt.user_branch_id = '".$_SESSION['branch_id']."' and rcgt.op_year = '".$_SESSION['operatingyear']."' OR find_in_set('".$_SESSION['branch_id']."',rcgt.assigned_to_branch)";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getCallGenerationAllDataByReport(){ 

        $querystring = "SELECT rcgt.*,rft.file_no,rcm.client_name,rcm.city_id,rmm.manufacturer_name manufacturer_info,rcm1.client_name end_client_info,rrr.report_no FROM rcatech_callgeneration_transaction rcgt
        left join rcatech_fileregister_transaction rft On rcgt.file_id = rft.id
        left join rcatech_client_master rcm On rcgt.client_id = rcm.id
        left join rcatech_manufacturer_master rmm On rcgt.manufacturer_name = rmm.id
        left join rcatech_client_master rcm1 On rcgt.end_client_name = rcm1.id
        left join rcatech_reportgeneration_register rrr On rcgt.id = rrr.call_id
        WHERE rcgt.status = 'Report Pending' and rcgt.user_comp_id = '".$_SESSION['comp_id']."' and rcgt.user_branch_id = '".$_SESSION['branch_id']."' and rcgt.op_year = '".$_SESSION['operatingyear']."' OR find_in_set('".$_SESSION['branch_id']."',rcgt.assigned_to_branch)";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }   


    function getCallGenerationById($params){ 

        $querystring = "SELECT * FROM rcatech_callgeneration_transaction WHERE client_id = '".$params['client_id']."' and file_id = '".$params['file_no']."' Order By call_id desc limit 1";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getCallGenerationByCallId($call_id,$file_no){ 

        $querystring = "SELECT rct.*,rcm.client_name,rcm.client_location,rft.file_no,rmm.manufacturer_name manufacturer,rcm1.client_name end_user,rcm1.client_location end_user_location,reum.emp_code,reum.first_name,reum.last_name,rc.name city_name  FROM rcatech_callgeneration_transaction rct 
        left join rcatech_client_master rcm on rcm.id = rct.client_id
        left join rcatech_fileregister_transaction rft on rft.id = rct.file_id
        left join rcatech_manufacturer_master rmm on rmm.id = rct.manufacturer_name
        left join rcatech_client_master rcm1 on rcm1.id = rct.end_client_name
        left join rcatech_employee_users_master reum on reum.id = rct.entry_user_id
        left join rcatech_cities rc on rc.id = rct.inspection_city
        WHERE rct.id = '".$call_id."' and rct.file_id = '".$file_no."' Order By rct.call_id desc limit 1";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getCallDeatilsByFileNo($params){ 

        $querystring = "SELECT * FROM rcatech_callgeneration_transaction WHERE file_id = '".$params."' and status not in ('Completed','Assigned','Cancelled')";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        $output = '<option value="">Select</option>';
        foreach($result as $row)
        {
          $output .= '<option value="'.$row['id'].'">'.$row['call_no'].'</option>';
        };

        return $output;

    }

    function getNabcbCallDeatilsByFileNo($id,$file_id){ 

        $querystring = "SELECT nabcb_flag FROM rcatech_callgeneration_transaction WHERE file_id = '".$file_id."' and call_id = '".$id."'";
        $queryforpubid = $this->db->query($querystring);
        $result = $queryforpubid->result_array();
        $nabcb_flag = $result[0]['nabcb_flag'];

        // Get Engineers Name    
        $querystring2 = "SELECT reum.id,reum.first_name,reum.last_name FROM rcatech_engineerlist_master rem left join rcatech_employee_users_master reum On rem.user_id = reum.id WHERE nabcb_flag = '".$nabcb_flag."'";
        $queryforpubid2 = $this->db->query($querystring2);
        $result2 = $queryforpubid2->result_array();
        $output = '<option value="">Select</option>';
        foreach($result2 as $row)
        {
          $output .= '<option value="'.$row['id'].'">'.$row['first_name'].'</option>';
        };

        return $output;
    }    

    public function addCallDetails($data){
    if(empty($data))
      return FALSE;

    $result = array('client_id'=>$data['clients_name'],'file_id'=>$data['file_no'],'file_classification'=>$data['file_class'],'call_id'=>$data['call_id'],'call_no'=>@$data['call_no'],'call_date'=>@$data['call_date'],'call_days'=>$data['call_days'],'assigned_to_branch'=>$data['assigned_to_branch'],'country_id'=>$data['company_country'],'state_id'=>$data['company_state'],'inspection_city'=>$data['company_city'],'inspection_location'=>$data['inspection_location'],'manufacturer_name'=>$data['call_manufacturer'],'vendor_name'=>$data['call_vendor'],'end_client_name'=>$data['call_end_client'],'nabcb_flag'=>@$data['call_nabcb_flag'],'rate_type'=>$data['call_rate_type'],'call_rate'=>$data['call_rate'],'call_budget'=>$data['call_budget'],'po_status'=>$data['call_po_type'],'inspection_schedule_date'=>$data['inspection_schedule_date'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1,'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id'],'op_year'=>@$_SESSION['operatingyear']); //'inspection_schedule_time'=>$data['inspection_schedule_time']
    //print_r($result);exit;
    //'call_rfidays'=>$data['rfi_date'],'call_rfino'=>$data['rfi_no'],
    $this->db->insert('rcatech_callgeneration_transaction',$result);
    $call_id = $this->db->insert_id();

    return $call_id;

   }

   function getCallItemmaster(){ 

        $querystring = "SELECT * FROM rcatech_item_master WHERE nabcb_flag = 0";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getFCallItemDetailsById($id){ 

        $querystring = "SELECT rim.item_name,rism.subitem_name,rcd.item_quantity,rcd.item_schedule_date,rum.unit_name FROM rcatech_callitem_details rcd
        left join rcatech_item_master rim on rim.id = rcd.item_id
        left join rcatech_item_subtype_master rism on rism.id = rcd.item_subtype_id
        left join rcatech_unit_master rum on rum.id = rcd.item_unit
        WHERE rcd.call_id = '".$id."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getCallDocDetailsById($id){ 

        $querystring = "SELECT * FROM rcatech_callgeneration_docs       
        WHERE call_id = '".$id."' order by id limit 1";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAllCallDocDetailsById($id){ 

        $querystring = "SELECT * FROM rcatech_callgeneration_docs       
        WHERE call_id = '".$id."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAllCallDocDetailsById2($id){ 

        $querystring = "SELECT * FROM rcatech_callgeneration_docs       
        WHERE call_id = '".$id."' and document_name != 'RATE CONFIRMATION'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }



    function getUnitmaster(){ 

        $querystring = "SELECT * FROM rcatech_unit_master WHERE is_active = 1";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function fetch_getitems($params)
    {
  
      $querystring = "SELECT * FROM rcatech_item_master WHERE nabcb_flag = '".$params."' AND is_active = 1";
      $queryforpubid = $this->db->query($querystring);

      $result = $queryforpubid->result_array();
      $output = '<option value="">Select</option>';
      foreach($result as $row)
      {
         $output .= '<option value="'.$row['id'].'">'.$row['item_name'].'</option>';
      };

      return $output;

    }

    function fetch_itemsubtype($params)
    {
  
      $querystring = "SELECT * FROM rcatech_item_subtype_master WHERE item_id = '".$params."' AND is_active = 1";
      $queryforpubid = $this->db->query($querystring);

      $result = $queryforpubid->result_array();
      $output = '<option value="">Select</option>';
      foreach($result as $row)
      {
         $output .= '<option value="'.$row['id'].'">'.$row['subitem_name'].'</option>';
      };

      return $output;

    }


    public function addCallItemDetails($data){

        for ($x = 0; $x <= count($data['itemmaster']); $x++) {
            if (!empty($data['itemmaster'][$x])) {
                $result = array('call_id'=>$data['call_id'],'item_id'=>$data['itemmaster'][$x],'item_subtype_id'=>$data['itemsubtype'][$x],'item_quantity'=>$data['itemquantity'][$x],'item_unit'=>$data['itemunit'][$x],'item_size'=>$data['itemsize'][$x],'item_total_value'=>$data['itemtotalvalue'][$x],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1,'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id']);
                //print_r($result);exit;
                $this->db->insert('rcatech_callitem_details',$result);
            }    
        }
        //print_r($result);exit;

    } 


    public function addCallDocumentDetails($data,$upl_call_docs){
        //print_r($upl_call_docs);exit;
        for ($x = 1; $x <= 15; $x++) {
            //echo $data['docs'][$x-1];exit;
            /*$result = array('call_id'=>$data['call_id'],'document_name'=>$data['upl_call_letter_title'][$data['docs'][$x-1]-1],'document_number'=>$data['upl_call_letter_text'][$data['docs'][$x-1]-1],'document_path'=>$upl_call_docs[$data['docs'][$x-1]],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1,'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id']);*/
            if (@$upl_call_docs[$x]['document_info']!='') {
            $result = array('call_id'=>$data['call_id'],'document_name'=>$upl_call_docs[$x]['document_name'],'document_path'=>$upl_call_docs[$x]['document_info'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1,'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id']);  // ,'document_number'=>$upl_call_docs[$x]['document_number']
            
            //print_r($result);exit;
            $this->db->insert('rcatech_callgeneration_docs',$result);
            }
        }
        //echo '<pre>';print_r($result);exit;echo '</pre>';
        return $result;


    }  


    function getAllEngineerdata(){ 

        $querystring = "SELECT * FROM rcatech_employee_users_master reum 
        left join rcatech_email_master rem On reum.id = rem.user_id Where rem.user_role = 'inspector'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    } 


    function getEngineerdataById($params){ 

        $querystring = "SELECT * FROM rcatech_employee_users_master reum 
        left join rcatech_email_master rem On reum.id = rem.user_id Where rem.user_role = 'inspector' and reum.id = '".$params."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getEngineerdataByFlag($params){ //$params
        /*$querystring2 = "SELECT reum.id,reum.first_name,reum.last_name FROM rcatech_engineerlist_master rem left join rcatech_employee_users_master reum On rem.user_id = reum.id WHERE nabcb_flag = '".$params."'";*/

        $querystring2 = "SELECT * from rcatech_engineerlist_master WHERE nabcb_flag = '".$params."' Order By first_name asc";
        $queryforpubid2 = $this->db->query($querystring2);
        $result2 = $queryforpubid2->result_array();
        return $result2;
    } 

    function getEngineerdataByNoFlag(){ //$params
        $querystring2 = "SELECT * from rcatech_engineerlist_master WHERE is_active = '1' Order By first_name asc";
        $queryforpubid2 = $this->db->query($querystring2);
        $result2 = $queryforpubid2->result_array();
        return $result2;
    }

    function getEngineerdataByFlagNew($params){
        $querystring2 = "SELECT reum.id,reum.first_name,reum.last_name FROM rcatech_engineerlist_master rem left join rcatech_employee_users_master reum On rem.user_id = reum.id WHERE nabcb_flag = '".$params."'";
        $queryforpubid2 = $this->db->query($querystring2);
        $result2 = $queryforpubid2->result_array();
        //print_r($result2);exit;

        foreach ($result2 as $engg_data) {
            $engg_data_new[$engg_data['id']] = $engg_data; 
        }
        //print_r($engg_data_new);exit;

        //return $engg_data_new;
        return $result2;
    }    

    public function addCallScheduleData($data){
        //print_r($data);exit;
        for ($x = 0; $x < count($data['engineer_data']); $x++) {
            $result = array('file_id'=>$data['file_id'],'call_id'=>$data['call_id'],'call_from_date'=>$data['call_from_date'],'call_to_date'=>$data['call_to_date'],'call_start_time'=>$data['dt'],'call_end_time'=>$data['dt'],'engineer_id'=>$data['engineer_data'][$x],'status'=>'Scheduled','entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1,'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id'],'op_year'=>@$_SESSION['operatingyear']);

            //print_r($result);exit;
            $this->db->insert('rcatech_call_schedule',$result);
        }
        return $result;
    }

    function getCallScheduledata($data){ 
        //print_r($data);exit;
        for ($x = 0; $x < count($data['engineer_data']); $x++) {
            $result = array('status'=>$data['status'],'remarks'=>$data['remarks'],'modify_user_id'=>$data['user_id'],'modify_date'=>$data['dt'],'is_active'=>1,'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id']);

            //print_r($result);exit;
            $this->db->where('file_id', $data['call_file_no']);
            $this->db->where('call_id', $data['call_no']);
            $this->db->where('engineer_id', $data['engineer_data'][$x]);
            $this->db->limit(1);
            $this->db->update('rcatech_call_schedule',$result);
        }

        return $result;    
    } 

    function updateCallScheduledata($data){ 

        for ($x = 0; $x < count($data['engineer_data']); $x++) {

            $querystring = "DELETE FROM rcatech_call_schedule where call_id = '".$data['call_id']."'";
            $queryforpubid = $this->db->query($querystring);

            for ($x = 0; $x < count($data['engineer_data']); $x++) {
                $result = array('call_id'=>$data['call_id'],'file_id'=>$data['file_id'],'status'=>$data['status'],'remarks'=>$data['remarks'],'call_from_date'=>$data['call_from_date'],'call_to_date'=>$data['call_to_date'],'engineer_id'=>$data['engineer_data'][$x],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'modify_user_id'=>$data['user_id'],'modify_date'=>$data['dt'],'is_active'=>1,'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id']);
                //print_r($result);exit;
                $this->db->insert('rcatech_call_schedule',$result);

            }   
        }

        return $result;    
    } 


    function updateCallScheduleAddInsp($data){ 

        for ($x = 0; $x < count($data['engineer_data']); $x++) {

            //$querystring = "DELETE FROM rcatech_call_schedule where call_id = '".$data['call_id']."'";
            //$queryforpubid = $this->db->query($querystring);

            for ($x = 0; $x < count($data['engineer_data']); $x++) {
                $result = array('call_id'=>$data['call_id'],'file_id'=>$data['file_id'],'status'=>$data['status'],'remarks'=>$data['remarks'],'call_from_date'=>$data['call_from_date'],'call_to_date'=>$data['call_to_date'],'engineer_id'=>$data['engineer_data'][$x],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'modify_user_id'=>$data['user_id'],'modify_date'=>$data['dt'],'is_active'=>1,'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id']);
                //print_r($result);exit;
                $this->db->insert('rcatech_call_schedule',$result);

            }   
        }

        return $result;    
    }


    function updateCallScheduleByReprot($id,$st,$fid){ 
            //echo $id."==".$st."==".$fid;exit;
            $dt = date('Y-m-d H:i:s');
            $result = array('status'=> $st);

            //print_r($result);exit;
            $this->db->where('call_id', $id);
            $this->db->where('file_id', $fid);
            //$this->db->limit(1);
            $this->db->update('rcatech_call_schedule',$result);

            if ($result) {
                $result2 = array('status'=> $st);

                //print_r($result);exit;
                $this->db->where('id', $id);
                $this->db->where('file_id', $fid);
                //$this->db->limit(1);
                $this->db->update('rcatech_callgeneration_transaction',$result2);
            }
 
            return $result;    
    }

    function updateCallScheduleComp($id,$st,$fid){ 
            //echo $id."==".$st."==".$fid;exit;
            $dt = date('Y-m-d H:i:s');
            if ($st=='Inspection Started') {
            $result = array('status'=> $st,'call_start_time'=> $dt);
            }

            if ($st=='Report Pending') {
            $result = array('status'=> $st,'call_end_time'=> $dt);
            }

            if ($st=='Scheduled') {
            $result = array('status'=> $st,'call_start_time'=> $dt);
            }

            if ($st=='Rescheduled') {
            $result = array('status'=> $st,'call_start_time'=> $dt);
            }

            if ($st=='Cancelled') {
            $result = array('status'=> $st,'call_start_time'=> $dt);
            }

            //print_r($result);exit;
            $this->db->where('call_id', $id);
            //$this->db->limit(1);
            $this->db->update('rcatech_call_schedule',$result);

            if ($result) {
                $result2 = array('status'=> $st);

                //print_r($result);exit;
                $this->db->where('id', $id);
                $this->db->where('file_id', $fid);
                //$this->db->limit(1);
                $this->db->update('rcatech_callgeneration_transaction',$result2);
            }
 
            return $result;    
    } 


    function getCallScheduleAllData(){ 

        $querystring = "SELECT rcs.*,rft.file_no,rcgt.call_no,reum.first_name,reum.last_name FROM  rcatech_call_schedule rcs
        left join rcatech_fileregister_transaction rft On rcs.file_id = rft.id
        left join rcatech_callgeneration_transaction rcgt On rcgt.id = rcs.call_id
        left join rcatech_employee_users_master reum On reum.id = rcs.engineer_id
        WHERE rcgt.user_comp_id = '".$_SESSION['comp_id']."' and rcgt.user_branch_id = '".$_SESSION['branch_id']."' and rcgt.op_year = '".$_SESSION['operatingyear']."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getCallScheduleAllDataByCallid($id,$fid){ 

        $querystring = "SELECT rcs.*,rft.file_no,rcgt.call_no,rem.first_name,rem.last_name,rem.email,rcm.client_name,rcm.client_location,rcgt.inspection_location,rmm.manufacturer_name manufacturer_info,rcm1.client_name end_user_info,rcm1.client_location end_user_location,reum.emp_code,rc.name city_name  FROM  rcatech_call_schedule rcs
        left join rcatech_fileregister_transaction rft On rcs.file_id = rft.id
        left join rcatech_callgeneration_transaction rcgt On rcgt.id = rcs.call_id
        left join rcatech_engineerlist_master rem On rem.id = rcs.engineer_id
        left join rcatech_client_master rcm On rcgt.client_id = rcm.id
        left join rcatech_manufacturer_master rmm On rcgt.manufacturer_name = rmm.id
        left join rcatech_client_master rcm1 On rcgt.end_client_name = rcm1.id
        left join rcatech_employee_users_master reum on reum.id = rcs.entry_user_id
        left join rcatech_cities rc on rc.id = rcgt.inspection_city
        WHERE rcs.call_id = '".$id."' and rcs.file_id = '".$fid."' and rcs.user_comp_id = '".$_SESSION['comp_id']."' and rcs.user_branch_id = '".$_SESSION['branch_id']."' and rcs.op_year = '".$_SESSION['operatingyear']."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getItemDetailsByCallId($params){  

        $querystring = "SELECT rcd.*,rim.item_name,rism.subitem_name,rum.unit_name  FROM  rcatech_callitem_details rcd
        left join rcatech_item_master rim On rcd.item_id = rim.id
        left join rcatech_item_subtype_master rism On rcd.item_subtype_id = rim.id
        left join rcatech_item_subtype_master rism1 On rism1.item_id = rim.id
        left join rcatech_unit_master rum On rcd.item_unit = rum.id
        WHERE rcd.call_id = '".$params."' limit 1";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }


    public function addRFIdocsdetails($data){
    if(empty($data))
      return FALSE;

    $result = array('client_id'=>$data['clients_name'],'rfi_id'=>$data['rfi_id'],'rfi_no'=>$data['rfi_no'],'rfi_sent_date'=>$data['rfi_sent_date'],'document_path'=>$data['upl_document_type_path'],'user_id'=>$data['user_id'],'remarks'=>@$data['rate_remarks'],'status'=>@$data['status'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1,'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id'],'op_year'=>@$_SESSION['operatingyear']);
    //print_r($result);exit;
    $this->db->insert('rcatech_rfidocs_master',$result);
    $rfi_id = $this->db->insert_id();

    return $rfi_id;

   }

   function getRFIdocsdetails($params){ 

        $querystring = "SELECT * FROM rcatech_rfidocs_master Order By rfi_id desc limit 1";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }


    function getRFIAllData(){ 

        $querystring = "SELECT rrfm.*,reum.first_name,reum.last_name FROM  rcatech_rfidocs_master rrfm
        left join rcatech_employee_users_master reum on rrfm.user_id = reum.id
        WHERE rrfm.user_comp_id = '".$_SESSION['comp_id']."' and rrfm.user_branch_id = '".$_SESSION['branch_id']."' and rrfm.op_year = '".$_SESSION['operatingyear']."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }


    public function Addengineeertolist($data){
    if(empty($data))
      return FALSE;

    $result = array('user_id'=>$data['call_engineer'],'nabcb_flag'=>$data['is_nabcb'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1,'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id'],'op_year'=>@$_SESSION['operatingyear']);
    //print_r($result);exit;
    $this->db->insert(' rcatech_engineerlist_master',$result);
    $call_id = $this->db->insert_id();

    return $call_id;

   }

   function getEngineerListdata(){ 

        /*$querystring = "SELECT rem.*,reum.first_name,reum.last_name FROM  rcatech_engineerlist_master rem left join
        rcatech_employee_users_master reum on reum.id = rem.user_id
        WHERE rem.is_active = '1'";*/
        $querystring = "SELECT rem.* FROM rcatech_engineerlist_master rem WHERE rem.is_active = '1'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getEmailidsCallGenerate($branch_id){ 
       $querystring = "SELECT reum.office_email email,reum.first_name FROM  rcatech_employee_users_master reum WHERE reum.employee_staff in ('TECHNICAL HEAD','TECHNICAL ADMIN','TECHNICAL USER','SURVEYOR HEAD') and reum.branch_id = '".$branch_id."' and reum.is_active = 1"; // ".$_SESSION['branch_id']."     

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;
    }


    function getEmailidsCallEmails(){ 
       $querystring = "SELECT reum.office_email,reum.first_name FROM  rcatech_employee_users_master reum WHERE reum.employee_staff in ('TECHNICAL HEAD','TECHNICAL ADMIN','TECHNICAL USER') and reum.branch_id = '".$_SESSION['branch_id']."' and reum.is_active = 1"; // ".$_SESSION['branch_id']."     

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;
    }


    function getCallScheduleComp($call_id,$st,$file_id){ 
       $querystring = "SELECT * FROM  rcatech_call_schedule WHERE call_id = '".$call_id."' and file_id = '".$file_id."' and status = '".$st."'"; // ".$_SESSION['branch_id']."     

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return @$result[0];
    }


    function getReportNoByBranch() { 

        $querystring = 'SELECT report_id FROM rcatech_reportgeneration_register arr Where arr.user_comp_id = "'.$_SESSION['comp_id'].'" and arr.user_branch_id = "'.$_SESSION['branch_id'].'" and arr.op_year = "'.$_SESSION['operatingyear'].'" Order By report_id desc limit 1';

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    public function addReportNo($data){
    if(empty($data))
      return FALSE;

    $result = array('client_id'=>$data['client_id'],'file_id'=>$data['file_id'],'file_classification'=>$data['file_class'],'call_id'=>$data['call_id'],'report_id'=>@$data['report_id'],'report_no'=>@$data['report_no'],'report_date'=>$data['report_date'],'status'=>$data['status'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1,'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id'],'op_year'=>@$_SESSION['operatingyear']); 

    //print_r($result);exit;
    //'call_rfidays'=>$data['rfi_date'],'call_rfino'=>$data['rfi_no'],
    $this->db->insert(' rcatech_reportgeneration_register',$result);
    $report_id = $this->db->insert_id();

    return $report_id;

   }



 

}
