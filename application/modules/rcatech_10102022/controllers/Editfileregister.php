<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editfileregister extends MX_Controller {

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

		$user = $_SESSION['fname']." ".$_SESSION['lname'];
        $id = base64_decode($_GET['id']);

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

        	
        	$resultdata = $this->File_master->updateFileData($this->input->post());
        	//echo $resultdata;exit;

	       	########################### Log Activity ######################################
            $this->load->model('Activity_master');
            $params['module'] = 'Addfileregister';
            $params['date_time'] = $dt;
            $params['action'] = 'Modify';
            $params['user_activity_id'] = $_SESSION['userId'];
            $params['ip_address'] = $_SERVER['REMOTE_ADDR'];

            $activity = $this->Activity_master->addActivitylog($params);
            ################################################################################
            //echo $resultdata;exit;

            $redirecturl = BASE_PATH."Viewfileregister?msg=1";
	        redirect($redirecturl);


		} else {

		$result = $this->File_master->getFiledataById($id);	
		//print_r($result);exit;

		$file_source_data = $this->General_master->getFileSourceData();
		$currency_data = $this->General_master->getCurrencyData();
		$work_type_data = $this->General_master->getWorkTypeData();
		$category_data = $this->General_master->getCatgoryData();
		$clients_data = $this->Client_master->getClientdataByBranchid($_SESSION['branch_id']);
		//print_r($clients_data);exit;
		$countries = $this->company_master->getCountries();
        //print_r($countries);exit;
			
		$data['file_data'] = $result;
		$data['file_source_data'] = $file_source_data;
		$data['currency_data'] = $currency_data;
		$data['work_type_data'] = $work_type_data;
		$data['category_data'] = $category_data;
		$data['clients_data'] = $clients_data;
		$data['countries'] = $countries;
		$data['title'] = 'ACI - Login';
		$data['layout_body']='editfileregister';
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
