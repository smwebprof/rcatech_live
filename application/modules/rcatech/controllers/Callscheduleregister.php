<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Callscheduleregister extends MX_Controller {

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
		$this->load->model('Branch_master');

		/*if ($_SESSION['employee_staff']=='EMPLOYEE') {
			$redirecturl = BASE_PATH."fullviewcallschedule?id=".$_GET['id']."&fid=".$_GET['fid'];
			redirect($redirecturl);
		}*/

		if (isset($_GET['cl'])) {
			$id = base64_decode($_GET['cl']);
			$st = base64_decode($_GET['st']);
			if ($st==1) { $st = 'Inspection Started'; }
			if ($st==2) { $st = 'Report Pending'; }
			//$st = 'Inspection Started';
			$fid = base64_decode($_GET['fid']);

			$get_schedule_data = $this->Call_master->getCallScheduleComp($id,$st,$fid);
			//print_r($get_schedule_data);exit;

			if (!empty(@$get_schedule_data)) {
				echo "<h3>Your Call Status Already Submitted , From RCAtech Admin</h3>";exit;
			} else {
				if ($st=='Inspection Started') {
					$schedule_data = $this->Call_master->updateCallScheduleComp($id,$st,$fid);
					echo "<h3>Your Call Status is ".$st." , From RCAtech Admin</h3>";exit;
				} else {
				echo "<h3>Your Call Status is ".$st." , From RCAtech Admin</h3>";//exit;		
				$schedule_data = $this->Call_master->updateCallScheduleComp($id,$st,$fid);
				if ($schedule_data) {
				$call_details = $this->Call_master->getCallScheduleAllDataByCallid($id,$fid);
				//print_r($call_details);exit;

				$doc_path = BASE_PATH."Reportgenerationregister?id=".base64_encode($id)."&fid=".base64_encode($fid);

				$this->load->library('email');
				$this->email->set_newline("\r\n");

				foreach ($call_details as $rows) {
				    	  //$email_call_no = $rows['call_no'];
					      if ($rows['employee_staff']!='EMPLOYEE') {
						  $email_call_no = "<a href='".$doc_path."'>".$rows['call_no']."</a>";
						  }	else {
						  $email_call_no = $rows['call_no'];	
						  }
						  $email_call_id = $rows['call_no'];	
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
					      $email_call_by = $rows['emp_code'];
					      $email_call_city = $rows['city_name'];

					      $config['protocol'] = 'smtp';
						  $config['smtp_host'] = 'mail.rcahrd.in';
						  $config['smtp_port'] = '587';
						  $config['smtp_user'] = 'admin@rcahrd.in';
						  $config['smtp_from_name'] = 'RCAINDIA Tech (Do_Not_Reply)';
						  $config['smtp_pass'] = 'U$FY[488AAS1';
						  $config['wordwrap'] = TRUE;
						  $config['newline'] = "\r\n";
						  $config['mailtype'] = 'html';

					      $subject = '[Testmail] Your Call Status is Report Pending for Report Generation ALERT - '.$email_call_id;

						  $call_email_report = 'Dear '.$email_call_firstname.' '.$email_call_lastname.',<br><br>';
						  $call_email_report .= 'Your Call Status is Report Pending for Report Generation – please find the details below :<br><br>';	

					      $call_email_report .= '<table width="30%" cellpadding="0" border="1">
			    			<tr><td align="left"><b>Call No</b></td><td align="left">'.$email_call_no.'</td></tr>
			    			<tr><td align="left"><b>Client Name</b></td><td align="left">'.$email_call_client.'</td></tr>
			    			<tr><td align="left"><b>End User</b></td><td align="left">'.$email_call_enduser.'</td></tr>
			    			<tr><td align="left"><b>Manufactuer</b></td><td align="left">'.$email_call_manufacturer.'</td></tr>
			    			<tr><td align="left"><b>Inspection Location</b></td><td align="left">'.$email_call_location.', '.$email_call_city.' </td></tr>
			    			<tr><td align="left"><b>Inspection From Date</b></td><td align="left">'.$email_call_inspdate_from.'</td></tr>
			    			<tr><td align="left"><b>Inspection To Date</b></td><td align="left">'.$email_call_inspdate_to.'</td></tr>
			    			<tr><td align="left"><b>Call Generated By</b></td><td align="left">'.$email_call_by.'</td></tr>
			    			</table>';			    			

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

						    $this->email->send();

				    }
				    exit;
				//$redirecturl = BASE_PATH."Viewcallschedule?msg=1";
			    //redirect($redirecturl); 
			}					
				}
	        //print_r($schedule_data);exit;
			}

			
		}	


		if ($_POST) {
			//print_r($_POST);exit;
			$_POST['user_id'] = @$_SESSION['userId']; 
        	$dt = date('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;
        	$_POST['user_comp_id'] = @$_SESSION['comp_id']; 
        	$_POST['user_branch_id'] = @$_SESSION['branch_id'];

			$_POST['call_from_date'] = date('Y-m-d H:i:s',strtotime($_POST['call_from_date']));
			$_POST['call_to_date'] = date('Y-m-d H:i:s',strtotime($_POST['call_to_date']));

			if ($_POST['assigned_to_branch']==$_SESSION['branch_id']) { 
				if (empty($_POST['engineer_data'])) {
					$redirecturl = BASE_PATH."Callscheduleregister?id=".base64_encode($_POST['call_id'])."&fid=MQ==".base64_encode($_POST['file_id'])."&msg=2";
				    redirect($redirecturl);	
				}
			}
			
			if ($_POST['assigned_to_branch']!=$_SESSION['branch_id']) { 
				$_POST['status'] = 'Assigned';
				$assinged_branch = $this->Call_master->updateCallScheduleByBranch($_POST);
				//print_r($assinged_branch);exit;
				//$assinged_branch = 1;
				if ($assinged_branch) {
					$call_details = $this->Call_master->getCallGenerationByCallId($_POST['call_id'],$_POST['file_id']);
					//print_r($call_details);exit;

					$item_details = $this->Call_master->getFCallItemDetailsById($_POST['call_id']);
				    //print_r($item_details);exit;

				    $calldoc_details = $this->Call_master->getCallDocDetailsById($_POST['call_id']);
		    		 //print_r($calldoc_details);exit;

					 //$path_parts = pathinfo($calldoc_details[0]['document_path']);
					 $doc_path = BASE_PATH."Callscheduleregister?id=".base64_encode($_POST['call_id'])."&fid=".base64_encode($_POST['file_id']);
					 //print_r($path_parts);exit;
					 $this->load->library('email');
				      $this->email->set_newline("\r\n");


				      //////// send email notification ///////////////
				      $email_call_id = $call_details[0]['call_no'];
				      $email_call_no = "<a href='".$doc_path."'>".$call_details[0]['call_no']."</a>";
				      $email_call_date = date('d-m-Y',strtotime($call_details[0]['call_date']));
				      $email_file_no = $call_details[0]['file_no'];
				      $email_call_client = $call_details[0]['client_name'];
				      $email_call_location = $call_details[0]['inspection_location'];
				      $email_call_manufacturer = $call_details[0]['manufacturer'];
				      $email_call_enduser = $call_details[0]['end_user'];
				      $email_call_inspdate = $call_details[0]['inspection_schedule_date'];
				      $email_call_inspdays = $call_details[0]['call_days'];
				      //$email_call_empname = $call_details[0]['first_name'].' '.$call_details[0]['first_name'];
				      $email_call_by = $call_details[0]['emp_code'];
				      $email_call_city = $call_details[0]['city_name'];
				      $email_assigned_to_branch = $call_details[0]['assigned_to_branch'];
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

					   $subject = '[Testmail] NEW CALL ASSIGNED ALERT - '.$email_call_id;

						$call_email_report = 'Dear User,<br><br>';
						$call_email_report .= 'A New Call has been assigned – please find the details below :<br><br>';			

						/*$call_email_report .= '<table width="100%" cellpadding="0" border="1">
						          		 <tr><td align="center"><b>Call No</b></td><td align="center"><b>Call Date</b></td><td align="center"><b>Client Name</b></td><td align="center"><b>File No</b></td><td align="center"><b>Inspection Location</b></td><td align="center"><b>Manufacturer Name</b></td></tr>
						          		 <tr><td align="center">'.$email_call_no.'</td><td align="center">'.$email_call_date.'</td><td align="center">'.$email_call_client.'</td><td align="center">'.$email_file_no.'</td><td align="center">'.$email_call_location.'</td><td align="center">'.$email_call_manufacturer.'</td>
						          		 </tr></table>';*/

						$call_email_report .= '<table width="30%" cellpadding="0" border="1">
			    			<tr><td align="left"><b>Call No</b></td><td align="left">'.$email_call_no.'</td></tr>
			    			<tr><td align="left"><b>Client Name</b></td><td align="left">'.$email_call_client.','.$email_call_client_loc.'</td></tr>
			    			<tr><td align="left"><b>End User</b></td><td align="left">'.$email_call_enduser.','.$email_call_enduser_loc.'</td></tr>
			    			<tr><td align="left"><b>Manufactuer</b></td><td align="left">'.$email_call_manufacturer.'</td></tr>
			    			<tr><td align="left"><b>Inspection Location</b></td><td align="left">'.$email_call_location.', '.$email_call_city.' </td></tr>
			    			<tr><td align="left"><b>Inspection Date</b></td><td align="left">'.$email_call_inspdate.' ('.$email_call_inspdays.' days)</td></tr>
			    			<tr><td align="left"><b>Call Generated By</b></td><td align="left">'.$email_call_by.'</td></tr>
			    			</table>';  


						$call_email_report .= '<br><br><b>Item Details :</b><br><br>';
				      /**$call_email_report .= '<table width="100%" cellpadding="0" border="1">'; 
				      $call_email_report .= '<tr><td align="center"><b>Item Name</b></td><td align="center"><b>Item Subtype</b></td><td align="center"><b>Inspection Date</b></td><td align="center"><b>Unit</b></td></tr>';
				      foreach ($item_details as $k=>$v) {
				        	 		 
						    	$call_email_report .= '<tr><td align="center">'.$v["item_name"].'</td><td align="center">'.$v["subitem_name"].'</td><td align="center">'.$v["item_schedule_date"].'</td><td align="center">'.$v["unit_name"].'</td>
						          		 </tr>';
						 }
						 $call_email_report .= '</table>';***/  	

						foreach ($item_details as $k=>$v) {
							 $call_email_report .= '<table width="30%" cellpadding="0" border="1">
				    			<tr><td align="left"><b>Item Name</b></td><td align="left">'.$v["item_name"].'</td></tr>
				    			<tr><td align="left"><b>Item Subtype</b></td><td align="left">'.$v["subitem_name"].'</td></tr>
				    			<tr><td align="left"><b>Quantity</b></td><td align="left">'.$v["item_quantity"].'</td></tr>
				    			<tr><td align="left"><b>Unit</b></td><td align="left">'.$v["unit_name"].'</td></tr>
				    			</table>'; 
			    		}

			    			
			    			
						/***$call_email_report .= '<br><br><b>Call Documents :</b><br><br>';
						$call_email_report .= '<table width="100%" cellpadding="0" border="1">'; 
				      $call_email_report .= '<tr><td align="center"><b>Document Name</b></td><td align="center"><b>Document Path</b></td></tr>';
				      foreach ($calldoc_details as $k=>$v) {
				        	   $email_call_doc_path = "<a href='".$v["document_path"]."'>".$v["document_path"]."</a>";		 
						    	$call_email_report .= '<tr><td align="center">'.$v["document_name"].'</td><td align="center">'.$email_call_doc_path.'</td></tr>';
						 }
						 $call_email_report .= '</table>';***/  		 

						 $call_email_report .= '<br><br>From,<br>'; 
						 $call_email_report .= '<br>RCAinet Tech Admin<br><br>'; 

						 $call_email_report .= '<br><b>NOTE: This is a system generated mail. Please do not reply</b><br><br>'; 


				       //echo $call_email_report;exit;
				       $this->email->initialize($config);

					    $this->email->from($config['smtp_user'], $config['smtp_from_name']);
					    //$this->email->to($call_lead_emails_to);  

					    ####### To email address
					    $call_lead_emails_to = $this->Call_master->getEmailidsCallGenerate($email_assigned_to_branch);
		   			 //print_r($call_lead_emails_to);exit;	

			        	 foreach ($call_lead_emails_to as $rows) {
			        		$email_to[] = $rows['office_email'];
			        	 }
			        	 $this->email->to($email_to);  

					    ######## CC email address

					    if ($_SESSION['branch_id']!=$email_assigned_to_branch) { 
		   				$call_lead_emails_cc = $this->Call_master->getEmailidsCallGenerate($_SESSION['branch_id']);
							//print_r($call_lead_emails_cc);exit;

							foreach ($call_lead_emails_cc as $rows) {
			        			$email_cc[] = $rows['office_email'];
			        		}
			        		$this->email->cc($email_cc);
						}
						
						$this->email->bcc('shivaji.dalvi@rcaindia.com');

						######## CC email address

					    /*if ($_SESSION['branch_id']!=$email_assigned_to_branch) { 
		   				$call_lead_emails_cc = $this->Call_master->getEmailidsCallEmails();
							//print_r($call_lead_emails_cc);exit;

							foreach ($call_lead_emails_cc as $rows) {
			        			$email_cc[] = $rows['office_email'];
			        		}
			        		$this->email->cc($email_cc);
						}*/

			        	$this->email->subject($subject);

					    $this->email->message($call_email_report);

					    if($this->email->send()) { 
					       $redirecturl = BASE_PATH."Viewcallgeneration?msg=1";
			               redirect($redirecturl);      
					    } else { 
					       //print_r($call_email_report);exit;
					       	
					       //$redirecturl = BASE_PATH."Callgenerationregister";
			               //redirect($redirecturl);
			               show_error($this->email->print_debugger());
					    }
				}
			} else { 
				$schedule_data = $this->Call_master->addCallScheduleData($_POST);
				//$schedule_data = 1;
	        	//print_r($schedule_data);exit;
	        	if ($schedule_data) {
	        		  $st = 'Scheduled';
					  $update_status = $this->Call_master->updateCallScheduleComp($_POST['call_id'],$st,$_POST['file_id']);
					  //print_r($update_status);exit;

					  $call_details = $this->Call_master->getCallScheduleAllDataByCallid($_POST['call_id'],$_POST['file_id']);
					  //print_r($call_details);exit;

					  $item_details = $this->Call_master->getFCallItemDetailsById($_POST['call_id']);
				      //print_r($item_details);exit;

				      $calldoc_details = $this->Call_master->getCallDocDetailsById($_POST['call_id']);
		    		   //print_r($calldoc_details);exit;

					   //$path_parts = pathinfo($calldoc_details[0]['document_path']);
					   $doc_path = BASE_PATH."Callscheduleregister?id=".base64_encode($_POST['call_id'])."&fid=".base64_encode($_POST['file_id']);
					   //print_r($path_parts);exit;
					   $this->load->library('email');
				       $this->email->set_newline("\r\n");

				       foreach ($call_details as $rows) {
				      	  //////// send email notification ///////////////
				       	  $email_call_id = $call_details[0]['call_no'];
					      $email_call_no = "<a href='".$doc_path."'>".$rows['call_no']."</a>";
					      //$email_call_no = $rows['call_no'];
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
					      $email_call_by = $rows['emp_code'];
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

						  $subject = '[Testmail] NEW CALL SCHEDULE ALERT - '.$email_call_id;

						  $call_email_report = 'Dear '.$email_call_firstname.' '.$email_call_lastname.',<br><br>';
						  $call_email_report .= 'A New Call has been scheduled – please find the details below :<br><br>';	

					      $call_email_report .= '<table width="30%" cellpadding="0" border="1">
			    			<tr><td align="left"><b>Call No</b></td><td align="left">'.$email_call_no.'</td></tr>
			    			<tr><td align="left"><b>Client Name</b></td><td align="left">'.$email_call_client.','.$email_call_client_loc.'</td></tr>
			    			<tr><td align="left"><b>End User</b></td><td align="left">'.$email_call_enduser.','.$email_call_enduser_loc.'</td></tr>
			    			<tr><td align="left"><b>Manufactuer</b></td><td align="left">'.$email_call_manufacturer.'</td></tr>
			    			<tr><td align="left"><b>Inspection Location</b></td><td align="left">'.$email_call_location.', '.$email_call_city.' </td></tr>
			    			<tr><td align="left"><b>Inspection From Date</b></td><td align="left">'.$email_call_inspdate_from.'</td></tr>
			    			<tr><td align="left"><b>Inspection To Date</b></td><td align="left">'.$email_call_inspdate_to.'</td></tr>
			    			<tr><td align="left"><b>Call Generated By</b></td><td align="left">'.$email_call_by.'</td></tr>
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

			    			$call_email_report .= '<br><br>Click To Start inspection<br>';
			    			$call_email_report .= '<a href="'.BASE_PATH."Callscheduleregister?cl=".base64_encode($_POST['call_id'])."&fid=".base64_encode($_POST['file_id'])."&st=".base64_encode('1').'">Start Inspection</a>';

			    			$call_email_report .= '<br><br>Click To Complete inspection<br>';
			    			$call_email_report .= '<a href="'.BASE_PATH."Callscheduleregister?cl=".base64_encode($_POST['call_id'])."&fid=".base64_encode($_POST['file_id'])."&st=".base64_encode('2').'">Complete Inspection</a>';

			    			$call_email_report .= '<br><br>From,<br>'; 
						    $call_email_report .= '<br>RCAinet Tech Admin<br><br>'; 

						    $call_email_report .= '<br><b>NOTE: This is a system generated mail. Please do not reply</b><br><br>';   

			    			//echo $call_email_report;exit;

			    			$this->email->initialize($config);

						    $this->email->from($config['smtp_user'], $config['smtp_from_name']); 
						    $this->email->to($email_call_to); //$_SESSION['user_email']  

						    $call_lead_emails_cc = $this->Call_master->getEmailidsCallGenerate($_SESSION['branch_id']);
							//print_r($call_lead_emails_cc);exit;

			        		foreach ($call_lead_emails_cc as $rows) {
			        			$email_cc[] = $rows['office_email'];
			        		}
				        	$this->email->cc($email_cc);

				        	$this->email->bcc('shivaji.dalvi@rcaindia.com');

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

				       $redirecturl = BASE_PATH."Viewcallschedule?msg=1";
			    	   redirect($redirecturl);  
	        	}	
        	}
		} else {

			$id = base64_decode($_GET['id']);
			$fid = base64_decode($_GET['fid']);
			//echo $id."===".$fid;exit;

			$branches = $this->Branch_master->getBranchAlldata();
			//print_r($branches);exit;

			$call_data = $this->Call_master->getCallGenerationByCallId($id,$fid);
			//print_r($call_data);exit;
			
			$call_status = array('Scheduled','Rescheduled','Completed','Cancelled','Inspection Started','Report Pending','Report Assinged'); // ,'Assigned'
			if (in_array($call_data[0]['status'], $call_status)) {
				echo "<h3>Your Call Status Already Submitted , From RCAtech Admin</h3>";exit;
			}


			#echo $call_data[0]['id'];exit;
			if ($call_data[0]['id']) {
				$emp_status = array('SURVEYOR HEAD','EMPLOYEE');
				if (!in_array($_SESSION['employee_staff'], $emp_status)) {
				//if ($_SESSION['employee_staff']!='SURVEYOR HEAD') { 
				$call_docsdata = $this->Call_master->getAllCallDocDetailsById($call_data[0]['id']);
				} else { 
				$call_docsdata = $this->Call_master->getAllCallDocDetailsById2($call_data[0]['id']);
				}
			}
			//print_r($call_docsdata);exit;		

			$result = $this->Call_master->getCallGenerationByCallId($id,$fid);
        	//print_r($result);exit;

        	$item_details = $this->Call_master->getFCallItemDetailsById($id);
		    //print_r($item_details);exit;

        	$call_days = $result[0]['call_days']-1;
        	$inspection_schedule_date = $result[0]['inspection_schedule_date'];
        	$inspection_schedule_next = date('d-m-Y', strtotime('+'.$call_days.' day', strtotime($inspection_schedule_date)));

        	if ($result[0]['nabcb_flag']==1) {        		
        		$engineers_data = $this->Call_master->getEngineerdataByFlag($result[0]['nabcb_flag']);
        	} else {
        		$engineers_data = $this->Call_master->getEngineerdataByNoFlag();
        	}

        	//$engineers_data = $this->Call_master->getEngineerdataByFlag();
        	//print_r($engineers_data);exit;
			
			$data['call_id'] = $id;
			$data['file_id'] = $fid;
			$data['call_data'] = $call_data;
			$data['file_data'] = $result;
			$data['branches_data'] = $branches;
			$data['item_details'] = $item_details;
			$data['call_docsdata'] = $call_docsdata;
			$data['inspection_schedule_date'] = $inspection_schedule_date;
			$data['inspection_schedule_next'] = $inspection_schedule_next;
			$data['engineers_data'] = $engineers_data;
			$data['title'] = 'ACI - Login';
			$data['layout_body']='callscheduleregister';
	 		$this->load->view('admin/layout/main_app_call', $data);
		}

	}

	public function fetch_calldetailsbyfileno()
	{
		$this->load->model('Call_master'); 
		
		echo $this ->Call_master->getCallDeatilsByFileNo($this->input->post('id'));

	}

	public function fetch_nabcbcalldetailsbyfileno()
	{
		$this->load->model('Call_master'); 
		
		echo $this ->Call_master->getNabcbCallDeatilsByFileNo($this->input->post('id'),$this->input->post('file_id'));

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
