<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Callcancelregister extends MX_Controller {

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


        	$id = $_POST['call_no'];
			$st = 'Cancelled';
			$_POST['status'] = 'Cancelled';
			$fid = $_POST['file_id'];

			$call_data = $this->Call_master->updateCallScheduleComp($id,$st,$fid);

			$schedule_data = $this->Call_master->getCallScheduledata($_POST);
	        //print_r($schedule_data);exit;
	        if ($schedule_data) {

					$call_details = $this->Call_master->getCallGenerationByCallId($_POST['call_no'],$_POST['file_id']);
					//print_r($call_details);exit;

					$item_details = $this->Call_master->getFCallItemDetailsById($_POST['call_no']);
		    		//print_r($item_details);exit;

					$this->load->library('email');
				    $this->email->set_newline("\r\n");


				      //////// send email notification ///////////////
				      $email_call_no = $call_details[0]['call_no'];
				      $email_file_no = $call_details[0]['file_no'];
				      $email_call_client = $call_details[0]['client_name'];
				      $email_call_location = $call_details[0]['inspection_location'];
				      $email_call_manufacturer = $call_details[0]['manufacturer'];

					   $config['protocol'] = 'smtp';
					   $config['smtp_host'] = 'rcahrd.in';
					   $config['smtp_port'] = '587';
					   $config['smtp_user'] = 'admin@rcahrd.in';
					   $config['smtp_from_name'] = 'RCAINDIA Tech (Do_Not_Reply)';
					   $config['smtp_pass'] = 'U$FY[488AAS1';
					   $config['wordwrap'] = TRUE;
					   $config['newline'] = "\r\n";
					   $config['mailtype'] = 'html';

					   $subject = '[Testmail] CALL CANCELLED ALERT - '.$email_call_no;

						$call_email_report = 'Dear User,<br><br>';
						$call_email_report .= 'A New Call has been cancelled – please find the details below :<br><br>';

						$call_email_report .= '<table width="100%" cellpadding="0" border="1">
						          		 <tr><td align="center"><b>Call No</b></td><td align="center"><b>Schedule From Date</b></td><td align="center"><b>Schedule To Date</b></td><td align="center"><b>Client Name</b></td><td align="center"><b>Inspection Location</b></td><td align="center"><b>Manufacturer Name</b></td></tr>
						          		 <tr><td align="center">'.$email_call_no.'</td><td align="center">'.$email_call_client.'</td><td align="center">'.$email_call_location.'</td><td align="center">'.$email_call_manufacturer.'</td>
						          		 </tr></table>';

						$call_email_report .= '<br><br><b>Item Details :</b><br><br>';
				      $call_email_report .= '<table width="100%" cellpadding="0" border="1">'; 
				      $call_email_report .= '<tr><td align="center"><b>Item Name</b></td><td align="center"><b>Item Subtype</b></td><td align="center"><b>Inspection Date</b></td><td align="center"><b>Unit</b></td></tr>';
				      foreach ($item_details as $k=>$v) {
				        	 		 
						    	$call_email_report .= '<tr><td align="center">'.$v["item_name"].'</td><td align="center">'.$v["subitem_name"].'</td><td align="center">'.$v["item_schedule_date"].'</td><td align="center">'.$v["unit_name"].'</td>
						          		 </tr>';
						 }
						 $call_email_report .= '</table>';  		 

						 $call_email_report .= '<br><br>From,<br>'; 
						 $call_email_report .= '<br>RCAinet Tech Admin<br><br>'; 

						 $call_email_report .= '<br><b>NOTE: This is a system generated mail. Please do not reply</b><br><br>';       		 
				       echo $call_email_report;exit;

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

					    if($this->email->send()) { 
					       $redirecturl = BASE_PATH."Viewcallcancelled?msg=1";
			               redirect($redirecturl);      
					    } else { 
					       $redirecturl = BASE_PATH."Callcancelregister";
			               redirect($redirecturl);
					    }


        		//$redirecturl = BASE_PATH."Callcancelregister?msg=1";
	            //redirect($redirecturl); 
        	}
		} else {
			$result = $this->File_master->getAllFiledata();
	        //print_r($result);exit;

	        $engineers_data = $this->Call_master->getAllEngineerdata();
	        //print_r($engineers_data);exit;
				
			$data['file_data'] = $result;
			$data['engineers_data'] = $engineers_data;
			$data['title'] = 'ACI - Login';
			$data['layout_body']='callcancelregister';
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
