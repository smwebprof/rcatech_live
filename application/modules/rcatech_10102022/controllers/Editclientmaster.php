<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editclientmaster extends MX_Controller {

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
	 */
	public function index()
	{
		if (!isset($_SESSION['userId'])) {
			$login = BASE_PATH."login/";
			redirect($login);
		}
		
        $this->load->library('form_validation');
        $this->load->model('company_master'); 
        //$this->load->model('user_master');
        $this->load->model('client_master');
        $this->load->model('Branch_master');
       	$this->load->helper(array('form', 'url'));
        $id = base64_decode($_GET['id']);
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];

    	$companies = $this->company_master->getRows();
    	//print_r($companies);exit;
    	$branchs = $this->Branch_master->getBranchdata();
    	//print_r($branchs);exit;
        $countries = $this->company_master->getCountries();
        //print_r($countries);exit;
        $result = $this->client_master->getClientdataById($id);
        //print_r($result);exit;

        if (@$_POST) {
        	//print_r($_POST);exit;
        	$_POST['user_id'] = @$_SESSION['userId']; 
        	$dt = gmdate('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;
        	//print_r($this->input->post());exit;
        	$resultdata = $this->client_master->updateClientData($this->input->post());

        	$_POST['client_id'] = $_POST['id'];
        	$clientdata = $this->client_master->addClientDetails($this->input->post());

            ########################### Log Activity ######################################
            $this->load->model('Activity_master');
            $params['module'] = 'Editclientmaster';
            $params['date_time'] = $dt;
            $params['action'] = 'Update';
            $params['user_activity_id'] = $_SESSION['userId'];
            $params['ip_address'] = $_SERVER['REMOTE_ADDR'];

            $activity = $this->Activity_master->addActivitylog($params);

            ##################################################################        	

        	if ($resultdata) {
        		/*$data['title'] = 'Login';
				#$this -> load -> model('campaign_model');
				$data['success'] = "Your data is inserted successfully!!!";
				$data['layout_body']='addclientmaster';
				$data['countries'] = $result;
 	

 				$this->load->view('admin/layout/main_app', $data); */

 				$module = BASE_PATH."viewclientmaster/";
                redirect($module);
        	}

        } else {
        	$states = $this->company_master->getStates($result[0]['country_id']);
            $cities = $this->company_master->getCities($result[0]['state_id']);
            $branchs = $this->Branch_master->getBranchByCompanyId($result[0]['comp_id']);
            //print_r($result);exit;

   			$data['title'] = 'ACI - Editclientmaster';
			#$this -> load -> model('campaign_model');
			
			$data['layout_body']='editclientmaster';
			//$data['countries'] = $result;
			$data['company_data'] = $companies;
			$data['client_data'] = $result;
			$data['countries'] = $countries;
            $data['states'] = $states;
            $data['cities'] = $cities;
            $data['branchs_data']=$branchs;

 			$this->load->view('admin/layout/main_app', $data);     	
        }       




		#$this->load->view('file_register_new');
	}


	public function fetch_states()
	{
		$this->load->model('company_master'); 
		
		echo $this ->company_master->fetch_states($this->input->post('country_id'));

	}

	public function fetch_city()
	{
		$this->load->model('company_master'); 
		
		echo $this ->company_master->fetch_city($this->input->post('state_id'));

	}
}
