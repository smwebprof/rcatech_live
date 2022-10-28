<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class editcompanymaster extends MX_Controller {

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
        $this->load->model('user_master');
        $this->load->helper('form');
        $id = base64_decode($_GET['id']);
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];


        if (@$_POST['form_action']=='update') {
        	$_POST['user_id'] = @$_SESSION['userId']; 
        	$dt = date('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;

        	$companyids_update = $this->company_master->updateCompanymaster($_POST);


			########################### Log Activity ######################################
            $this->load->model('Activity_master');
            $params['module'] = 'editcompanymaster';
            $params['date_time'] = $dt;
            $params['action'] = 'Update';
            $params['user_activity_id'] = $_SESSION['userId'];
            $params['ip_address'] = $_SERVER['REMOTE_ADDR'];

            $activity = $this->Activity_master->addActivitylog($params);

            ##################################################################        	


        	$result = $this->company_master->getCountries();
        
	        $companyids = $this->company_master->getCompanydatabyid($id);

	        $redirecturl = BASE_PATH."viewcompanymaster?msg=1";
            redirect($redirecturl);

	        /*$data['title'] = 'ACI - Company Master';
			#$this -> load -> model('campaign_model');
			$data['success'] = "Your data is updated successfully!!!";
				
			$data['layout_body']='editcompanymaster';

			$data['countries'] = $result;

			$data['company_data'] = $companyids;
	 	

	 		$this->load->view('admin/layout/main_app', $data);*/

        } else {


        	$result = $this->company_master->getCountries();
        	
	        $companyids = $this->company_master->getCompanydatabyid($id);
	        #print_r($companyids);exit; 
	        $states = $this->company_master->getStates($companyids[0]['countryid']);  
	        #print_r($states);exit; 
            $cities = $this->company_master->getCities($companyids[0]['stateid']);

	        $data['title'] = 'ACI - Company Master';
			#$this -> load -> model('campaign_model');
				
			$data['layout_body']='editcompanymaster';
			$data['countries'] = $result;
			$data['company_data'] = $companyids;
			$data['states'] = $states;
            $data['cities'] = $cities;
	 	

	 		$this->load->view('admin/layout/main_app', $data);
        }

	}


}
