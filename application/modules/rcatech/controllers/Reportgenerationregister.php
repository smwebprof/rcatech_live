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

        	$currYear=date('y', strtotime('+0 year', strtotime($_SESSION['operatingyear'])) );
			$futureYear=date('y', strtotime('+1 year', strtotime($_SESSION['operatingyear'])) );
			//echo $currYear.$futureYear;exit;

        	$getCallDetails = $this->Call_master->getReportNoByBranch();
            //print_r($getCallDetails);exit;

         	if (isset($getCallDetails) && !empty($getCallDetails)) {
	            $CallId = @$getCallDetails[0]['report_id']+1;
	            $Call_Id = $CallId;
	            $CallId = str_pad($CallId, 4, '0', STR_PAD_LEFT);
	            //$_POST['call_id'] = $Call_Id;
          	} else { 
	             $CallId = 1;
	             $Call_Id = $CallId;
	             $CallId = str_pad($CallId, 4, '0', STR_PAD_LEFT);
	             //$_POST['call_id'] = $Call_Id;
          	}
          	//echo $Call_Id;exit;

          	$updatefileno['report_no'] = "DACPL/".$_SESSION['branch_prefix']."/".$_POST['file_id']."/".$_POST['file_class']."/".$currYear.$futureYear."/".$Call_Id;
        	//$updatefileno['id'] = $resultdata;
            print_r($updatefileno);exit;
            //$updateFileNoData = $this->File_master->updateFileNo($updatefileno);

			$schedule_data = $this->Call_master->updateCallScheduleComp($_POST['call_id'],$_POST['status'],$_POST['file_id']);
			//print_r($schedule_data);exit;	

        	if ($schedule_data) {

					  $call_details = $this->Call_master->getCallScheduleAllDataByCallid($_POST['call_id'],$_POST['file_id']);
					  //print_r($call_details);exit;

					  $item_details = $this->Call_master->getFCallItemDetailsById($_POST['call_id']);
				      //print_r($item_details);exit;

				      $calldoc_details = $this->Call_master->getCallDocDetailsById($_POST['call_id']);
		    		   //print_r($calldoc_details);exit;

					   //$path_parts = pathinfo($calldoc_details[0]['document_path']);
					   $doc_path = BASE_PATH."Callrescheduleregister?id=".base64_encode($_POST['call_id'])."&fid=MQ==".base64_encode($_POST['file_id']);
					   //print_r($path_parts);exit;

					  $this->load->library('email');
				      $this->email->set_newline("\r\n");

				      foreach ($call_details as $rows) {
				      	  //////// send email notification ///////////////
					      //$email_call_no = "<a href='".$doc_path."'>".$rows['call_no']."</a>";
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

					      $config['protocol'] = 'smtp';
						  $config['smtp_host'] = 'rcahrd.in';
						  $config['smtp_port'] = '587';
						  $config['smtp_user'] = 'admin@rcahrd.in';
						  $config['smtp_from_name'] = 'RCAINDIA Tech (Do_Not_Reply)';
						  $config['smtp_pass'] = 'U$FY[488AAS1';
						  $config['wordwrap'] = TRUE;
						  $config['newline'] = "\r\n";
						  $config['mailtype'] = 'html';

						  $subject = '[Testmail] NEW CALL CANCEL ALERT - '.$email_call_no;

						  $call_email_report = 'Dear '.$email_call_firstname.' '.$email_call_lastname.',<br><br>';
						  $call_email_report .= 'A New Call has been cancelled – Kindly note :<br><br>';

			    			$call_email_report .= '<br><br>From,<br>'; 
						    $call_email_report .= '<br>RCAinet Tech Admin<br><br>'; 

						    $call_email_report .= '<br><b>NOTE: This is a system generated mail. Please do not reply</b><br><br>';   

			    			echo $call_email_report;exit;

			    			$this->email->initialize($config);

						    $this->email->from($config['smtp_user'], $config['smtp_from_name']);
						    $this->email->to($email_call_to);  

						    $call_lead_emails_cc = $this->Call_master->getEmailidsCallEmails();
							//print_r($call_lead_emails_cc);exit;

			        		foreach ($call_lead_emails_cc as $rows) {
			        			$email_cc[] = $rows['office_email'];
			        		}
				        	$this->email->cc($email_cc);

				        	$this->email->subject($subject);

						    $this->email->message($call_email_report);

						    $this->email->send();

						    /*if($this->email->send()) { 
					      		$redirecturl = BASE_PATH."Viewcallreschedule?msg=1";
			               		redirect($redirecturl);      
					    	} else { 
					       		$redirecturl = BASE_PATH."Callrescheduleregister";
			               		redirect($redirecturl);
					    	}*/
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
