<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adduseremployeedetails extends MX_Controller {

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
	 * Author : Shivaji Dalvi
	 * Date : 15.01.2020
	 */
	public function index()
	{
		
		if (!isset($_SESSION['userId'])) {
			$login = BASE_PATH."login/";
			redirect($login);
		}
		
		#print_r($_POST);exit;
		#$this->load->library('form_validation');
		$this->load->model('Company_master'); 
        $this->load->model('Branch_master'); 
        $this->load->model('User_master');
        //$this->load->model('Designation_master');
        $this->load->helper('form');
        $this->load->library ('common');

        //$result = $this->User_master->getUsers();
        $companies = $this->Company_master->getRows();
        print_r($companies);exit;
        $countries = $this->Company_master->getCountries();
        $departments = $this->user_master->getDepartments();
        $qualifications = $this->user_master->getQualificationtype();
        $designations = $this->Designation_master->getDesignationdata();

 
		if (@$this->input->post('addusers')=='addusers') { 
			//print_r($_POST);exit;
			$_POST['user_id'] = @$_SESSION['userId']; 
        	$dt = gmdate('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;

        	$_POST['user_pass'] = @$this->common->encrypt_decrypt('encrypt',$_POST['user_pass']);

        	#print_r($this->input->post());exit;
        	$resultdata = $this->user_master->addUsers($this->input->post());

        	if ($resultdata) {  
 				// give branch access
        		$_POST['emp_id'] = $resultdata;
 				$branch_access = $this->user_master->addUserBranchAcess($this->input->post());
 
            }

			########################### Log Activity ######################################
            $this->load->model('Activity_master');
            $params['module'] = 'Adduseremployeedetails';
            $params['date_time'] = $dt;
            $params['action'] = 'Create';
            $params['user_activity_id'] = $_SESSION['userId'];
            $params['ip_address'] = $_SERVER['REMOTE_ADDR'];

            $activity = $this->Activity_master->addActivitylog($params);

            ##################################################################        	

            $userfile = BASE_PATH."Viewusermanagement";
            redirect($userfile);

        } elseif (@$this->input->post('adduserdetails')=='adduserdetails') { 
        	#print_r($_POST);exit;
        	$_POST['user_id'] = @$_SESSION['userId']; 
        	$dt = gmdate('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;
        	#print_r($this->input->post());exit;
        	$resultdata = $this->user_master->addUserdetails($this->input->post());

            ########################### Log Activity ######################################
            $this->load->model('Activity_master');
            $params['module'] = 'Adduseremployeedetails';
            $params['date_time'] = $dt;
            $params['action'] = 'Create';
            $params['user_activity_id'] = $_SESSION['userId'];
            $params['ip_address'] = $_SERVER['REMOTE_ADDR'];

            $activity = $this->Activity_master->addActivitylog($params);

            ##################################################################        	

        	/*if ($resultdata) {  
 				$this->data['title'] = 'User Employee Master Form - ACI';
 				$this->data['success'] = "Your data is inserted successfully!!!";
				$this->data['user_data'] = $result;
				$this->data['layout_body']='adduseremployeedetails';

 				$this->load->view('admin/layout/main_app', $this->data);

 			}*/
 			 $userfile = BASE_PATH."Viewusermanagement";
             redirect($userfile);	
		} else {

			if ($this->input->post('branch_name')) { $this->data['error_branch_name'] = 'has-error'; }

			$this->data['title'] = 'User Employee Master Form - ACI';
			$this->data['user_data'] = $result;
			$this->data['company_data'] = $companies;
			$this->data['country_data'] = $countries;
			$this->data['departments_data'] = $departments;
			$this->data['qualifications_data'] = $qualifications;
			$this->data['designation_data'] = $designations;
			$this->data['layout_body']='adduseremployeedetails';
 	

 			$this->load->view('admin/layout/main_app', $this->data);

			#$this->load->view('file_register_new');

		}	
		
	}
}
