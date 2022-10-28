<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addfileregister extends MX_Controller {

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

		$this->load->model('General_master');
		$this->load->model('Client_master');
		$this->load->model('File_master');
		$this->load->model('Activity_master');
		$this->load->model('User_master');
		$this->load->model('company_master');
		$this->load->model('Call_master');

		$user = $_SESSION['fname']." ".$_SESSION['lname'];

		if ($_POST) {
			//print_r($_POST);exit;
			$_POST['user_id'] = @$_SESSION['userId']; 
        	$dt = date('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;
        	$_POST['user_comp_id'] = @$_SESSION['comp_id']; 
        	$_POST['user_branch_id'] = @$_SESSION['branch_id'];
        	$_POST['file_date'] = date('Y-m-d H:i:s',strtotime($_POST['file_date']));
        	//$_POST['sap_date'] = date('Y-m-d H:i:s',strtotime($_POST['sap_date']));
        	//print_r($_POST);exit;

        	##### logic for seeting incrementing File Number
        	$getFileId = $this->File_master->getFileIdByBranch();
        	//print_r($getFileId);exit;
        	if (isset($getFileId) && !empty($getFileId)) {
        		$fileId = @$getFileId[0]['file_id']+1;
        		$fileId = str_pad($fileId, 3, '0', STR_PAD_LEFT);
        		$_POST['file_id'] = $fileId;
        	} else { 
        		$fileId = 1;
				$fileId = str_pad($fileId, 3, '0', STR_PAD_LEFT);
        		$_POST['file_id'] = $fileId;
        	}

        	$resultdata = $this->File_master->addFilemaster($this->input->post());
        	//echo $resultdata;exit;

	       	########################### Log Activity ######################################
            $this->load->model('Activity_master');
            $params['module'] = 'Addfileregister';
            $params['date_time'] = $dt;
            $params['action'] = 'Create';
            $params['user_activity_id'] = $_SESSION['userId'];
            $params['ip_address'] = $_SERVER['REMOTE_ADDR'];

            $activity = $this->Activity_master->addActivitylog($params);
            ################################################################################
            //echo $resultdata;exit;


            $updatefileno['file_no'] = "TS/".$_SESSION['branch_prefix']."/".$_SESSION['operatingyear']."/".$fileId;
        	$updatefileno['id'] = $resultdata;
            //print_r($updatefileno);exit;
            $updateFileNoData = $this->File_master->updateFileNo($updatefileno);


            if ($resultdata) {

            	$file_details = $this->File_master->getFiledataById($resultdata);

            	//////// send email notification ///////////////
        		$email_file_no = $updatefileno['file_no'];
        		$email_file_date = date('d-m-Y',strtotime($_POST['file_date']));
        		$email_file_user = $user;
        		$email_client_name = $file_details[0]['client_name'];
        		$email_client_location = $file_details[0]['client_location'];
        		$email_filesource = $file_details[0]['source_info'];
        		$email_worktype = $file_details[0]['work_name'];



            	$this->load->library('email');
        		$this->email->set_newline("\r\n");

	            $config['protocol'] = 'smtp';
	            $config['smtp_host'] = 'rcahrd.in';
	            $config['smtp_port'] = '587';
	            $config['smtp_user'] = 'admin@rcahrd.in';
	            $config['smtp_from_name'] = 'RCAINDIA Tech (Do_Not_Reply)';
	            $config['smtp_pass'] = 'U$FY[488AAS1';
	            $config['wordwrap'] = TRUE;
	            $config['newline'] = "\r\n";
	            $config['mailtype'] = 'html';

	            $subject = '[Testmail] NEW FILE ALERT - '.$email_file_no;

	            $file_email_report = 'Dear User,<br><br>';
				$file_email_report .= 'A new file has been generated – please find the details below :<br><br>';

				/*$file_email_report .= '<table width="100%" cellpadding="0" border="1">
			          	<tr><td align="center"><b>FILE NO</b></td><td align="center"><b>CREATED ON</b></td><td align="center"><b>CREATED BY</b></td><td align="center"><b>CLIENT NAME</b></td><td align="center"><b>FILE SOURCE</b></td><td align="center"><b>WORK TYPE</b></td></tr>
			          		 <tr><td align="center">'.$email_file_no.'</td><td align="center">'.$email_file_date.'</td><td align="center">'.$email_file_user.'</td><td align="center">'.$email_client_name.'</td><td align="center">'.$email_filesource.'</td><td align="center">'.$email_worktype.'</td>
			          		 </tr></table>';*/

			    $file_email_report .= '<table width="30%" cellpadding="0" border="1">
			    			<tr><td align="left"><b>FILE NO</b></td><td align="left">'.$email_file_no.'</td></tr>
			    			<tr><td align="left"><b>CREATED ON</b></td><td align="left">'.$email_file_date.'</td></tr>
			    			<tr><td align="left"><b>CREATED BY</b></td><td align="left">'.$email_file_user.'</td></tr>
			    			<tr><td align="left"><b>CLIENT NAME</b></td><td align="left">'.$email_client_name.', '.$email_client_location.'</td></tr>
			    			<tr><td align="left"><b>FILE SOURCE</b></td><td align="left">'.$email_filesource.'</td></tr>
			    			<tr><td align="left"><b>WORK TYPE</b></td><td align="left">'.$email_worktype.'</td></tr>
			    			</table>';      		 

			    $file_email_report .= '<br><br>From,<br>'; 
			    $file_email_report .= '<br>RCAinet Tech Admin<br><br>'; 

			    $file_email_report .= '<br><b>NOTE: This is a system generated mail. Please do not reply</b><br><br>';

			    //echo $file_email_report;exit;

			    $this->email->initialize($config);

			    $this->email->from($config['smtp_user'], $config['smtp_from_name']);
			    $this->email->to($_SESSION['user_email']);  

			    $call_lead_emails_cc = $this->Call_master->getEmailidsCallEmails();
						//print_r($call_lead_emails_cc);exit;

			    foreach ($call_lead_emails_cc as $rows) {
			        $email_cc[] = $rows['office_email'];
			    }
	        	$this->email->cc($email_cc);

	        	$this->email->subject($subject);

			    $this->email->message($file_email_report);

			    if($this->email->send()) { 
			       $redirecturl = BASE_PATH."Viewfileregister?msg=1";
	               redirect($redirecturl);      
			    } else { 
			       $redirecturl = BASE_PATH."Addfileregister";
	               redirect($redirecturl);
			    }

			    //$redirecturl = BASE_PATH."Viewfileregister?msg=1";
	            //redirect($redirecturl);

            }	
        	


		} else {

		$file_source_data = $this->General_master->getFileSourceData();
		$currency_data = $this->General_master->getCurrencyData();
		$work_type_data = $this->General_master->getWorkTypeData();
		$category_data = $this->General_master->getCatgoryData();
		$clients_data = $this->Client_master->getClientdataByBranchid(); //$_SESSION['branch_id']
		//print_r($clients_data);exit;
		$countries = $this->company_master->getCountries();
        //print_r($countries);exit;
			
		$data['file_source_data'] = $file_source_data;
		$data['currency_data'] = $currency_data;
		$data['work_type_data'] = $work_type_data;
		$data['category_data'] = $category_data;
		$data['clients_data'] = $clients_data;
		$data['countries'] = $countries;
		$data['title'] = 'ACI - Login';
		$data['layout_body']='addfileregister';
	 	$this->load->view('admin/layout/main_app_file', $data);


		}	
		

	}

	public function fetch_clientfile()
	{
		$this->load->model('File_master'); 
		
		echo $this ->File_master->fetch_clientfile($this->input->post('id'));

	}

	public function fetch_clientdetails()
	{
		$this->load->model('File_master'); 
		
		echo $this ->File_master->fetch_clientdetails($this->input->post('id'));

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
