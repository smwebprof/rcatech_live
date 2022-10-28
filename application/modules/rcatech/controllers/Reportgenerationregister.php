<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportgenerationregister extends MX_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 *  Author : Shivaji M Dalvi
	 *
	 */ 
	public function index()
	{
		
		//print_r($_SESSION);exit;
		if (!isset($_SESSION['userId'])) {
			$login = BASE_PATH."login/";
			redirect($login);
		}

		$this->load->model('File_master');
		$this->load->model('Call_master');
		$this->load->model('User_master');

		if ($_POST) {
			//print_r($_POST);exit;
			$_POST['user_id'] = @$_SESSION['userId']; 
        	$dt = date('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;
        	$_POST['user_comp_id'] = @$_SESSION['comp_id']; 
        	$_POST['user_branch_id'] = @$_SESSION['branch_id'];
        	$_POST['report_date'] = $dt;

        	if ($_POST['report_gen']==1) {
        		$_POST['status'] = 'Report Assigned';
        	} else {
        		$_POST['status'] = 'Pending';
        	}

        	$currYear=date('y', strtotime('+0 year', strtotime($_SESSION['operatingyear'])) );
			$futureYear=date('y', strtotime('+1 year', strtotime($_SESSION['operatingyear'])) );
			//echo $currYear.$futureYear;exit;

        	$getCallDetails = $this->Call_master->getReportNoByBranch();
            //print_r($getCallDetails);exit;

         	if (isset($getCallDetails) && !empty($getCallDetails)) {
	            $CallId = @$getCallDetails[0]['report_id']+1;
	            $Call_Id = $CallId;
	            $CallId = str_pad($CallId, 5, '0', STR_PAD_LEFT);
	            $fileId = str_pad($_POST['file_id'], 3, '0', STR_PAD_LEFT);
	            //$_POST['call_id'] = $Call_Id;
          	} else { 
	             $CallId = 1;
	             $Call_Id = $CallId;
	             $CallId = str_pad($CallId, 5, '0', STR_PAD_LEFT);
	             $fileId = str_pad($_POST['file_id'], 3, '0', STR_PAD_LEFT);
	             //$_POST['call_id'] = $Call_Id;
          	}
          	//echo $Call_Id;exit;
          	//echo $fileId;exit;

          	$_POST['report_no'] = "DACPL/".$_SESSION['branch_prefix']."/".$fileId."/".$_POST['file_class']."/".$currYear.$futureYear."/".$Call_Id;
          	$_POST['report_id'] = $Call_Id;

            $resultdata = $this->Call_master->addReportNo($_POST);

        	if ($resultdata) {

					  $update_status = $this->Call_master->updateCallScheduleByReprot($_POST['call_id'],$_POST['status'],$_POST['file_id']);
					  //print_r($call_details);exit;

					  $call_details = $this->Call_master->getCallScheduleAllDataByCallid($_POST['call_id'],$_POST['file_id']);
					  //print_r($call_details);exit;

					  $item_details = $this->Call_master->getFCallItemDetailsById($_POST['call_id']);
				      //print_r($item_details);exit;

					  $this->load->library('email');
				      $this->email->set_newline("\r\n");

				      foreach ($call_details as $rows) {
				      	  //////// send email notification ///////////////
				      	  $email_call_id = $call_details[0]['call_no'];
					      $email_call_no = $rows['call_no'];
					      $email_file_no = $rows['file_no'];
					      $email_call_client = $rows['client_name'];
					      $email_call_location = $rows['inspection_location'];
					      $email_call_manufacturer = $rows['manufacturer_info'];
					      $email_call_enduser = $rows['end_user_info'];
					      $email_call_inspdate_from = $rows['call_from_date'];
					      $email_call_inspdate_to = $rows['call_to_date'];
					      $email_call_firstname = $rows['first_name'];
					      $email_call_lastname = $rows['last_name'];
					      $email_call_to = $rows['email'];
					      $email_call_city = $rows['city_name'];
					      $email_call_client_loc = $call_details[0]['client_location'];
				     	  $email_call_enduser_loc = $call_details[0]['end_user_location'];

					      $config['protocol'] = 'smtp';
						  $config['smtp_host'] = 'mail.rcahrd.in';
						  $config['smtp_port'] = '587';
						  $config['smtp_user'] = 'admin@rcahrd.in';
						  $config['smtp_from_name'] = 'RCAINDIA Tech (Do_Not_Reply)';
						  $config['smtp_pass'] = 'U$FY[488AAS1';
						  $config['wordwrap'] = TRUE;
						  $config['newline'] = "\r\n";
						  $config['mailtype'] = 'html';

						  $subject = '[Testmail] REPORT GENERATION ALERT - '.$email_call_id;

						  $call_email_report = 'Dear '.$email_call_firstname.' '.$email_call_lastname.',<br><br>';
						  $call_email_report .= 'Your Report No for Report Generation – please find the details below :<br><br>';	

					      $call_email_report .= '<table width="30%" cellpadding="0" border="1">
			    			<tr><td align="left"><b>Report No</b></td><td align="left">'.$_POST['report_no'].'</td></tr>
			    			<tr><td align="left"><b>Call No</b></td><td align="left">'.$email_call_no.'</td></tr>
			    			<tr><td align="left"><b>Client Name</b></td><td align="left">'.$email_call_client.','.$email_call_client_loc.'</td></tr>
			    			<tr><td align="left"><b>End User</b></td><td align="left">'.$email_call_enduser.','.$email_call_enduser_loc.'</td></tr>
			    			<tr><td align="left"><b>Manufactuer</b></td><td align="left">'.$email_call_manufacturer.'</td></tr>
			    			<tr><td align="left"><b>Inspection Location</b></td><td align="left">'.$email_call_location.', '.$email_call_city.' </td></tr>
			    			<tr><td align="left"><b>Inspection From Date</b></td><td align="left">'.$email_call_inspdate_from.'</td></tr>
			    			<tr><td align="left"><b>Inspection To Date</b></td><td align="left">'.$email_call_inspdate_to.'</td></tr>
			    			</table>';

			    			$call_email_report .= '<br><br><b>Item Details :</b><br><br>';

			    			foreach ($item_details as $k=>$v) {
							 $call_email_report .= '<table width="30%" cellpadding="0" border="1">
				    			<tr><td align="left"><b>Item Name</b></td><td align="left">'.$v["item_name"].'</td></tr>
				    			<tr><td align="left"><b>Item Subtype</b></td><td align="left">'.$v["subitem_name"].'</td></tr>
				    			<tr><td align="left"><b>Quantity</b></td><td align="left">'.$v["item_quantity"].'</td></tr>
				    			<tr><td align="left"><b>Unit</b></td><td align="left">'.$v["unit_name"].'</td></tr>
				    			</table>'; 
			    			}


			    			$call_email_report .= '<br><br>From,<br>'; 
						    $call_email_report .= '<br>RCAinet Tech Admin<br><br>'; 

						    $call_email_report .= '<br><b>NOTE: This is a system generated mail. Please do not reply</b><br><br>';   

			    			//echo $call_email_report;exit;

			    			$this->email->initialize($config);

						    $this->email->from($config['smtp_user'], $config['smtp_from_name']);
						    $this->email->to($email_call_to);  

						    $call_lead_emails_cc = $this->Call_master->getEmailidsCallEmails($email_call_to);
							//print_r($call_lead_emails_cc);exit;

			        		foreach ($call_lead_emails_cc as $rows) {
			        			$email_cc[] = $rows['office_email'];
			        		}
				        	$this->email->cc($email_cc);
				        	
				        	$this->email->bcc('shivaji.dalvi@rcaindia.com');

				        	$this->email->subject($subject);

						    $this->email->message($call_email_report);

						    //$this->email->send();

						    if($this->email->send()) { 
					      		$redirecturl = BASE_PATH."Viewreportgenerationlist?msg=1";
			               		redirect($redirecturl);      
					    	} else { 
					       		//$redirecturl = BASE_PATH."Reportgenerationregister";
			               		//redirect($redirecturl);
			               		show_error($this->email->print_debugger());
					    	}
				      }

				      //print_r($call_email_report);exit;
				      
        		$redirecturl = BASE_PATH."Viewcallreschedule?msg=1";
			    redirect($redirecturl);  
        	}
		} else {
			$id = base64_decode($_GET['id']);
			$fid = base64_decode($_GET['fid']);
			#echo $id."===".$fid;exit;				

			$result = $this->Call_master->getCallGenerationByCallId($id,$fid);
        	//print_r($result);exit;
        	if ($result[0]['id']) {
				$emp_status = array('SURVEYOR HEAD','EMPLOYEE');
				if (!in_array($_SESSION['employee_staff'], $emp_status)) {
				//if ($_SESSION['employee_staff']!='SURVEYOR HEAD') { 
				$call_docsdata = $this->Call_master->getAllCallDocDetailsById($result[0]['id']);
				} else { 
				$call_docsdata = $this->Call_master->getAllCallDocDetailsById2($result[0]['id']);
				}
			}
			//print_r($call_docsdata);exit;
			$schedule_data = $this->Call_master->getCallScheduleAllDataByCallid($id,$fid);
        	//print_r($schedule_data);exit;

        	$item_details = $this->Call_master->getFCallItemDetailsById($id);
		    //print_r($item_details);exit;

        	$call_days = $result[0]['call_days']-1;
        	if ($schedule_data[0]['call_from_date']) {
        		$inspection_schedule_date = date('d-m-Y',strtotime($schedule_data[0]['call_from_date']));
        		$inspection_schedule_next = date('d-m-Y', strtotime('+'.$call_days.' day', strtotime($inspection_schedule_date)));
        	} else {
        		$inspection_schedule_date = $result[0]['inspection_schedule_date'];
        		$inspection_schedule_next = date('d-m-Y', strtotime('+'.$call_days.' day', strtotime($inspection_schedule_date)));
        	}

        	if ($result[0]['nabcb_flag']==1) {        		
        		$engineers_data = $this->Call_master->getEngineerdataByFlag($result[0]['nabcb_flag']);
        	} else {
        		$engineers_data = $this->Call_master->getEngineerdataByNoFlag();
        	}
       		//print_r($engineers_data);exit;

			$data['call_id'] = $id;
			$data['file_id'] = $fid;
			$data['file_data'] = $result;
			$data['call_docsdata'] = $call_docsdata;
			$data['item_details'] = $item_details;
			$data['schedule_data'] = $schedule_data;
			$data['inspection_schedule_date'] = $inspection_schedule_date;
			$data['inspection_schedule_next'] = $inspection_schedule_next;
			$data['engineers_data'] = $engineers_data;
			$data['title'] = 'ACI - Login';
			$data['layout_body']='reportgenerationregister';
	 		$this->load->view('admin/layout/main_app_call', $data);

		} 	

	}

	public function fetch_cargo()
	{
		$this->load->model('File_master'); 
		
		echo $this ->File_master->fetch_cargo($this->input->post('cargo_group'));

	}

	public function fetch_packing()
	{
		$this->load->model('Packing_master'); 
		
		echo $this ->Packing_master->fetch_packing();

	}

	public function fetch_unit()
	{
		$this->load->model('Unit_master'); 
		
		echo $this ->Unit_master->fetch_unit();

	}

	public function fetch_field_parameters()
	{
		$this->load->model('File_master'); 
		
		echo $this ->File_master->fetch_field_parameters($this->input->post('cargo_id'));

	}

	public function fetch_lab_parameters()
	{
		$this->load->model('File_master'); 
		
		echo $this ->File_master->fetch_lab_parameters($this->input->post('cargo_id'));

	}

	public function fetch_labparameters()
	{
		$this->load->model('File_master'); 
		
		echo $this ->File_master->fetch_labparameters($this->input->post('params'));

	}

	public function fetch_labmethods()
	{
		$this->load->model('File_master'); 
		
		echo $this ->File_master->fetch_labmethods($this->input->post('method_params'));

	}

	
}
