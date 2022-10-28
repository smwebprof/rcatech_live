<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addrfiregister extends MX_Controller {

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

		$this->load->model('Client_master');
		$this->load->model('Call_master');
		$this->load->model('User_master');

		if ($_POST) {
			//print_r($_POST);exit;
			$_POST['user_id'] = @$_SESSION['userId']; 
        	$dt = date('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;
        	$_POST['user_comp_id'] = @$_SESSION['comp_id']; 
        	$_POST['user_branch_id'] = @$_SESSION['branch_id'];

        	$_POST['rfi_sent_date'] = date('Y-m-d H:i:s',strtotime($_POST['rfi_sent_date']));

        	$upload_path = APP_UPLOAD_PATH.'docs/';
        	$config['upload_path'] = './docs/';
        	$config['allowed_types'] = 'xls|pdf|doc|xlsx|docx'; //xls|pdf|doc //*
        	$config['max_size'] = 512000;

        	$this->load->library('upload', $config);
        	$this->upload->initialize($config);

        	if (!$this->upload->do_upload('upl_document_type')) {
            	$error = array('error' => $this->upload->display_errors());
       		} else {
            	$data = array('upl_document_type_path' => $this->upload->data());

            	$_POST['upl_document_type_path'] = $upload_path.$data['upl_document_type_path']['file_name'];
            	if (!$_POST['upl_document_type_path']) { $_POST['upl_document_type_path'] = '';}
            }

            $RFIdocsdetails = $this->Call_master->getRFIdocsdetails($_POST);
            //print_r($RFIdocsdetails);exit;

            if (isset($RFIdocsdetails) && !empty($RFIdocsdetails)) {
               $RfiId = @$RFIdocsdetails[0]['rfi_id']+1;
               $Rfi_Id = $RfiId;
               $RfiId = str_pad($RfiId, 3, '0', STR_PAD_LEFT);
               //$_POST['call_id'] = $Call_Id;
            } else { 
               $RfiId = 1;
               $Rfi_Id = $RfiId;
               $RfiId = str_pad($RfiId, 3, '0', STR_PAD_LEFT);
               //$_POST['call_id'] = $Call_Id;
            }
            //echo $RfiId;exit;
            $_POST['rfi_no'] = "RFI/".$_SESSION['branch_prefix']."/".$_SESSION['operatingyear']."/".$RfiId;
            $_POST['rfi_id'] = $Rfi_Id;

            $AddRFIdocsdetails = $this->Call_master->addRFIdocsdetails($_POST);
            //print_r($AddRFIdocsdetails);exit;
            if ($AddRFIdocsdetails) { 
            	$redirecturl = BASE_PATH."Addrfiregister?msg=1";
	            redirect($redirecturl); 	
            }

		} else {
			$clients = $this->Client_master->getClientdataByBranchid($_SESSION['branch_id']);
			//print_r($clients);exit;

			$user_data = $this->User_master->getEmailidsCallCoordinator();
			//print_r($user_data);exit;
				
			$data['clients_data'] = $clients;
			$data['user_data'] = $user_data;
			$data['title'] = 'ACI - Login';
			$data['layout_body']='addrfiregister';
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
