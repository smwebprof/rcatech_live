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


		/*if (isset($_GET['cl'])) {
			$id = base64_decode($_GET['cl']);
			$st = 'Completed';
			$fid = base64_decode($_GET['fid']);

			$schedule_data = $this->Call_master->updateCallScheduleComp($id,$st,$fid);
			if ($schedule_data) {
				echo "<h3>Your Call is Completed. From RCAtech Admin</h3>";exit;
				//$redirecturl = BASE_PATH."Viewcallschedule?msg=1";
			    //redirect($redirecturl); 
			}
	        //print_r($schedule_data);exit;
		}*/	


		if ($_POST) {
			//print_r($_POST);exit;
			$_POST['user_id'] = @$_SESSION['userId']; 
        	$dt = date('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;
        	$_POST['user_comp_id'] = @$_SESSION['comp_id']; 
        	$_POST['user_branch_id'] = @$_SESSION['branch_id'];

			$_POST['call_from_date'] = date('Y-m-d H:i:s',strtotime($_POST['call_from_date']));
			$_POST['call_to_date'] = date('Y-m-d H:i:s',strtotime($_POST['call_to_date']));

			if (empty($_POST['engineer_data'])) {
				$redirecturl = BASE_PATH."Callscheduleregister?id=".base64_encode($_POST['call_id'])."&fid=MQ==".base64_encode($_POST['file_id'])."&msg=2";
			    redirect($redirecturl);	
			}

			$schedule_data = $this->Call_master->addCallScheduleData($_POST);
			//$schedule_data = 1;
        	//print_r($schedule_data);exit;
        	if ($schedule_data) {

					  $st = 'Scheduled';
					  $update_status = $this->Call_master->updateCallScheduleComp($_POST['call_id'],$st,$_POST['file_id']);
					  //print_r($call_details);exit;

					  $call_details = $this->Call_master->getCallScheduleAllDataByCallid($_POST['call_id'],$_POST['file_id']);
					  //print_r($call_details);exit;

					  $item_details = $this->Call_master->getFCallItemDetailsById($_POST['call_id']);
				      //print_r($item_details);exit;

				      $calldoc_details = $this->Call_master->getCallDocDetailsById($_POST['call_id']);
		    		   //print_r($calldoc_details);exit;

					   //$path_parts = pathinfo($calldoc_details[0]['document_path']);
					   $doc_path = BASE_PATH."Callscheduleregister?id=".base64_encode($_POST['call_id'])."&fid=MQ==".base64_encode($_POST['file_id']);
					   //print_r($path_parts);exit;

					  $this->load->library('email');
				      $this->email->set_newline("\r\n");

				      foreach ($call_details as $rows) {
				      	  //////// send email notification ///////////////
					      $email_call_no = "<a href='".$doc_path."'>".$rows['call_no']."</a>";
					      $email_file_no = $rows['file_no'];
					      $email_call_client = $rows['client_name'];
					      $email_call_location = $rows['inspection_location'];
					      $email_call_manufacturer = $rows['manufacturer_info'];
					      $email_call_enduser = $rows['end_user_info'];
					      $email_call_inspdate_from = $rows['call_from_date'];
					      $email_call_inspdate_to = $rows['call_to_date'];
					      $email_call_firstname = $rows['first_name'];
					      $email_call_lastname = $rows['last_name'];

					      $config['protocol'] = 'smtp';
						  $config['smtp_host'] = 'rcahrd.in';
						  $config['smtp_port'] = '587';
						  $config['smtp_user'] = 'admin@rcahrd.in';
						  $config['smtp_from_name'] = 'RCAINDIA Tech (Do_Not_Reply)';
						  $config['smtp_pass'] = 'U$FY[488AAS1';
						  $config['wordwrap'] = TRUE;
						  $config['newline'] = "\r\n";
						  $config['mailtype'] = 'html';

						  $subject = '[Testmail] NEW CALL RESCHEDULE ALERT - '.$email_call_no;

						  $call_email_report = 'Dear '.$email_call_firstname.' '.$email_call_lastname.',<br><br>';
						  $call_email_report .= 'A New Call has been rescheduled – please find the details below :<br><br>';	

					      $call_email_report .= '<table width="30%" cellpadding="0" border="1">
			    			<tr><td align="left"><b>Call No</b></td><td align="left">'.$email_call_no.'</td></tr>
			    			<tr><td align="left"><b>Client Name</b></td><td align="left">'.$email_call_client.'</td></tr>
			    			<tr><td align="left"><b>End User</b></td><td align="left">'.$email_call_enduser.'</td></tr>
			    			<tr><td align="left"><b>Manufactuer</b></td><td align="left">'.$email_call_manufacturer.'</td></tr>
			    			<tr><td align="left"><b>Inspection Location</b></td><td align="left">'.$email_call_location.'</td></tr>
			    			<tr><td align="left"><b>Inspection From Date</b></td><td align="left">'.$email_call_inspdate_from.'</td></tr>
			    			<tr><td align="left"><b>Inspection To Date</b></td><td align="left">'.$email_call_inspdate_to.'</td></tr>
			    			</table>';

			    			$call_email_report .= '<br><br><b>Item Details :</b><br><br>';

			    			foreach ($item_details as $k=>$v) {
							 $call_email_report .= '<table width="30%" cellpadding="0" border="1">
				    			<tr><td align="left"><b>Item Name</b></td><td align="left">'.$v["item_name"].'</td></tr>
				    			<tr><td align="left"><b>Item Subtype</b></td><td align="left">'.$v["subitem_name"].'</td></tr>
				    			<tr><td align="left"><b>Unit</b></td><td align="left">'.$v["unit_name"].'</td></tr>
				    			</table>'; 
			    			}

			    			$call_email_report .= '<br><br>From,<br>'; 
						    $call_email_report .= '<br>RCAinet Tech Admin<br><br>'; 

						    $call_email_report .= '<br><b>NOTE: This is a system generated mail. Please do not reply</b><br><br>';   

			    			//echo $call_email_report;exit;

			    			$this->email->initialize($config);

						    $this->email->from($config['smtp_user'], $config['smtp_from_name']);
						    $this->email->to($_SESSION['user_email']);  

						    $getEmailIds = $this->User_master->getEmailidsFile();

				        	foreach ($getEmailIds as $rows) {
				        		$email_cc[] = $rows['office_email'];
				        	}
				        	$this->email->cc($email_cc);

				        	$this->email->subject($subject);

						    $this->email->message($call_email_report);

						    //$this->email->send();

						    /*if($this->email->send()) { 
					      		$redirecturl = BASE_PATH."Viewcallreschedule?msg=1";
			               		redirect($redirecturl);      
					    	} else { 
					       		$redirecturl = BASE_PATH."Callrescheduleregister";
			               		redirect($redirecturl);
					    	}*/
				      }

				      print_r($call_email_report);exit;


        		$redirecturl = BASE_PATH."Viewcallschedule?msg=1";
			    redirect($redirecturl);  
        	}
		} else {

			$id = base64_decode($_GET['id']);
			$fid = base64_decode($_GET['fid']);
			#echo $id."===".$fid;exit;

			$call_data = $this->Call_master->getCallGenerationByCallId($id,$fid);
			#echo $call_data[0]['id'];exit;
			if ($call_data[0]['id']) {
				$call_docsdata = $this->Call_master->getAllCallDocDetailsById($call_data[0]['id']);
			}	

			$result = $this->Call_master->getCallGenerationByCallId($id,$fid);
        	//print_r($result);exit;

        	$call_days = $result[0]['call_days']-1;
        	$inspection_schedule_date = $result[0]['inspection_schedule_date'];
        	$inspection_schedule_next = date('d-m-Y', strtotime('+'.$call_days.' day', strtotime($inspection_schedule_date)));

        	$engineers_data = $this->Call_master->getEngineerdataByFlag($result[0]['nabcb_flag']);
        	//print_r($engineers_data);exit;
			
			$data['call_id'] = $id;
			$data['file_id'] = $fid;
			$data['file_data'] = $result;
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
