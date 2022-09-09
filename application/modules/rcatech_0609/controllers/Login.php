<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {

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

	
		$this->load->library('form_validation');
        $this->load->model('Company_master'); 
        $this->load->model('user_master');
        $this->load->model('branch_master');
        $this->load->helper('form');
        $this->load->library ('common');


		if ($_POST) {
			//print_r($_POST);exit;

			/*$_POST['useremail'] = 'admin@agrimincontrol.com';
	        $_POST['password'] = 'aci#1234';
	        $_POST['companyname'] = 23;
	        $_POST['branchname'] = 1;
	        $_POST['operatingyear'] = 2022;
	        $_POST['financialyear'] = 2;*/

			$checkBranch = $this->branch_master->getBranchdataById($_POST['branchname']); 
         	//print_r($checkBranch);exit;

         	$userPass = $this->common->encrypt_decrypt('encrypt',$_POST['password']);
         	$_POST['password'] = $userPass;
            $checkLogin = $this->user_master->getRowsNew($_POST); 
            //print_r($checkLogin);exit;

            if($checkLogin){ 
            	$dt = strtotime(gmdate('Y-m-d'));
                #$dt = strtotime(gmdate('2021-01-16'));
                #$dt = strtotime(gmdate($_POST['operatingyear'].'-m-d'));
                $comp_fin_period = @$this->Company_master->get_fin_year($_POST['compid']);
                $comp_op_period = @$this->Company_master->get_op_year($_POST['compid']);
				//print_r($comp_period);exit;

				$fin_period = explode("|",$this->common->calculateFiscalYearForDate($comp_fin_period['fin_month'],$_POST['operatingyear']));
				//print_r($fin_period);exit;
				#echo $fin_period_from = date('Y-m-d',$fin_period[0]));exit;
				$fin_period_from = $fin_period[0];
				$fin_period_to = $fin_period[1];

				if ($dt >= $fin_period_from && $dt <= $fin_period_to) { 
					$checkCompLogin = $this->user_master->getRowsByCompNew($_POST); 
					//print_r($checkCompLogin);exit;

	                if ($checkCompLogin) {
	                		$this->session->set_userdata('isUserLoggedIn', TRUE); 
		                    $this->session->set_userdata('userId', $checkLogin[0]['id']); 
		                    $this->session->set_userdata('fname', $checkLogin[0]['first_name']);
		                    $this->session->set_userdata('lname', $checkLogin[0]['last_name']);
		                    $this->session->set_userdata('user_email', $checkLogin[0]['office_email']);
		                    $this->session->set_userdata('primary_email', $checkBranch['primary_email_id']);
		                    $this->session->set_userdata('secondary_email', $checkBranch['secondary_email_id']);
		                    $this->session->set_userdata('employee_staff', $checkLogin[0]['employee_staff']);
		                    $this->session->set_userdata('branch_name', $checkBranch['branch_name']);
		                    $this->session->set_userdata('branch_prefix', $checkBranch['certificate_prefix']);
		                    $this->session->set_userdata('country_code', $checkBranch['sortname']);
		                    $this->session->set_userdata('currency', $checkBranch['currency']);
		                    $this->session->set_userdata('comp_id', $_POST['compid']);
		                    $this->session->set_userdata('branch_id', $_POST['branchname']);
		                    $this->session->set_userdata('default_branch_id', $_POST['branchname']);
		                    $this->session->set_userdata('operatingyear', $_POST['operatingyear']);
		                    #redirect('http://localhost/agrimin/filenew/');

		                    // Begin Insert Login History == Shivaji
		                    //echo $_SESSION['__ci_last_regenerate'];exit;
		                    $data['session_id'] = $_SESSION['__ci_last_regenerate'];
		                    $data['userId'] = $checkLogin[0]['id'];
		                    $data['comp_id'] = $_POST['compid'];
		                    $data['branch_id'] = $_POST['branchname'];
		                    $insertLoginDetails = $this->user_master->insertLoginDetails($data);
		                    // End Insert Login History == Shivaji 

		                    $dashboard = BASE_PATH."dashboard/";
		                    redirect($dashboard);

	                }	
				}	

            }	


		}

		$getCompanydata = $this->Company_master->getRows();
		//print_r($getCompanydata);exit;
		
		$data['title'] = 'ACI - Login';
		$data['layout_body']='login';
		$data['getCompanydata'] = $getCompanydata;		
	 	$this->load->view('admin/layout/main_login3', $data);
	 	//$this->load->view('login3');

	}

	public function fetch_branch_user()
	{
		$this->load->model('branch_master'); 
		
		echo $this -> branch_master -> getBranchdataByUser($this->input->post('id'));

	}

	public function fetch_branch()
	{
		$this->load->model('company_master'); 
		
		echo $this -> company_master -> fetch_branch($this->input->post('id'));

	}

	public function fetch_op_year()
	{
		$this->load->model('company_master'); 
		
		echo $this -> company_master -> fetch_op_year($this->input->post('id'));

	}	

	public function fetch_fin_year()
	{
		$this->load->model('company_master'); 
		
		echo $this -> company_master -> fetch_fin_year($this->input->post('id'));

	}	

	public function logout()
	{
		// Begin Update Login History == Shivaji
		$this->load->model('user_master');
		$data['session_id'] = $_SESSION['__ci_last_regenerate'];
		$updateLoginDetails = $this->user_master->updateLoginDetails($data);
		// End Update Login History == Shivaji
		sleep(3);
    	$this->session->unset_userdata('logged_in');

   		// session_destroy();
    	$this->session->sess_destroy();

    	$login = BASE_PATH."login/";
        redirect($login); 

	}
	
}
