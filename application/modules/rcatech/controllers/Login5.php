<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login5 extends MX_Controller {

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
		#print_r($_POST);exit;


        $this->load->library('form_validation');
        $this->load->model('Company_master'); 
        $this->load->model('user_master');
        $this->load->model('branch_master');
        $this->load->helper('form');
        $this->load->library ('common');



        #echo "<h3>This system is under maintainance...</h3>";exit;

        $result = $this->Company_master->getRows();
        //print_r($result);exit;

        if (@$this->input->post('userfileno') != '') { 

	    	$this->form_validation->set_rules('userfileno', 'File No', 'required');
	    	$this->form_validation->set_rules('filepassword', 'Password', 'required|min_length[6]|max_length[15]');
        }

        $_POST['useremail'] = 'admin@agrimincontrol.com';
        $_POST['password'] = 'aci#1234';
        $_POST['companyname'] = 23;
        $_POST['branchname'] = 1;
        $_POST['operatingyear'] = 2022;
        $_POST['financialyear'] = 2;

        if (@$this->input->post('useremail') != '') { 
        	#$this->form_validation->set_rules('useremail', 'Email', 'required|valid_email|callback_check_customer');
        	$this->form_validation->set_rules('useremail', 'Email', 'trim|required|valid_email');
	    	$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[15]');
	    	$this->form_validation->set_rules('companyname', 'Company Name', 'required');
	    	$this->form_validation->set_rules('branchname', 'Branch Name', 'required');
	    	$this->form_validation->set_rules('operatingyear', 'Operating Year', 'required');
	    	$this->form_validation->set_rules('financialyear', 'Financial Year', 'required');
        }


	    if ($this->form_validation->run() == FALSE) { 
            #$this->load->view('reg_form');
            $data['title'] = 'ACI - Login';
			#$this -> load -> model('campaign_model');

			$data['company_data'] = $result;
			
			$data['layout_body']='login5';
	 		$this->load->view('admin/layout/main_login', $data); 

         } else {


         	if (@$this->input->post('userfileno') != '') { 
         		#$this->session->set_userdata('isUserLoggedIn', TRUE); 
                #$this->session->set_userdata('userId', $checkLogin[0]['id']); 
                #$this->session->set_userdata('fname', $checkLogin[0]['first_name']);
                #$this->session->set_userdata('lname', $checkLogin[0]['last_name']);

         		$checkLogin = $this->user_master->getFilePass($_POST);
         		#print_r($checkLogin);exit;
                if($checkLogin){ 
                	$id = base64_encode($checkLogin[0]['id']);	


                    $this->session->set_userdata('isUserLoggedIn', TRUE); 
                    #$this->session->set_userdata('userId', $checkLogin[0]['id']); 
                    $this->session->set_userdata('fname', 'Guest');
                    $this->session->set_userdata('lname', 'User');
                    $this->session->set_userdata('employee_staff', 'Guest');
                    #$this->session->set_userdata('employee_staff', $checkLogin[0]['employee_staff']);
                    #redirect('http://localhost/agrimin/filenew/'); 

                    $filenew = BASE_PATH."fullviewfileregister?id=".$id;
                    redirect($filenew);

                }else{ 
                    $this->data['errors'] = 'Wrong fileno or password, please try again.'; 

                    $this->data['title'] = 'ACI - Login';
					#$this -> load -> model('campaign_model');

					$this->data['company_data'] = $result;
			
					$this->data['layout_body']='login5';
	 				$this->load->view('admin/layout/main_login', $this->data); 
                } 

         	}	

         	if (@$this->input->post('useremail') != '') { 
         		
         		//print_r($_POST);exit;
         		$checkBranch = $this->branch_master->getBranchdataById($_POST['branchname']); 
         		//print_r($checkBranch);exit;

         		$userPass = $this->common->encrypt_decrypt('encrypt',$_POST['password']);
         		$_POST['password'] = $userPass;
                $checkLogin = $this->user_master->getRows($_POST); 
                //print_r($checkLogin);exit;

                if($checkLogin){ 

                    $dt = strtotime(gmdate('Y-m-d'));
                    #$dt = strtotime(gmdate('2021-01-16'));
                	#$dt = strtotime(gmdate($_POST['operatingyear'].'-m-d'));
                	$comp_period = @$this->Company_master->get_fin_year($_POST['companyname']);
					//print_r($comp_period);exit;

					$fin_period = explode("|",$this->common->calculateFiscalYearForDate($comp_period['fin_month'],$_POST['operatingyear']));
					//print_r($fin_period);exit;
					#echo $fin_period_from = date('Y-m-d',$fin_period[0]));exit;
					$fin_period_from = $fin_period[0];
					$fin_period_to = $fin_period[1];

					if ($dt >= $fin_period_from && $dt <= $fin_period_to) {
						$checkCompLogin = $this->user_master->getRowsByComp($_POST); 

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
		                    $this->session->set_userdata('country_code', $checkBranch['sortname']);
		                    $this->session->set_userdata('currency', $checkBranch['currency']);
		                    $this->session->set_userdata('comp_id', $_POST['companyname']);
		                    $this->session->set_userdata('branch_id', $_POST['branchname']);
		                    $this->session->set_userdata('default_branch_id', $_POST['branchname']);
		                    $this->session->set_userdata('operatingyear', $_POST['operatingyear']);
		                    #redirect('http://localhost/agrimin/filenew/');

		                    // Begin Insert Login History == Shivaji
		                    //echo $_SESSION['__ci_last_regenerate'];exit;
		                    $data['session_id'] = $_SESSION['__ci_last_regenerate'];
		                    $data['userId'] = $checkLogin[0]['id'];
		                    $data['comp_id'] = $_POST['companyname'];
		                    $data['branch_id'] = $_POST['branchname'];
		                    $insertLoginDetails = $this->user_master->insertLoginDetails($data);
		                    // End Insert Login History == Shivaji 

		                    $dashboard = BASE_PATH."dashboard/";
		                    redirect($dashboard);
		                    //$filenew = BASE_PATH."filenew/";
		                    //redirect($filenew);

	                	} else { 
	                		$this->data['errors'] = 'Please select correct Company/Branch!!!'; 

	                    	$this->data['title'] = 'ACI - Login';
							#$this -> load -> model('campaign_model');

							$this->data['company_data'] = $result;
				
							$this->data['layout_body']='login5';
		 					$this->load->view('admin/layout/main_login', $this->data);
		                   
	                	}
					} else {  
							$this->data['errors'] = 'Login Failed.Incorrect Finanacial Year Selected.'; 

                    		$this->data['title'] = 'ACI - Login';
							#$this -> load -> model('campaign_model');

							$this->data['company_data'] = $result;
			
							$this->data['layout_body']='login5';
	 						$this->load->view('admin/layout/main_login', $this->data);
					}	
                }else{  
                    $this->data['errors'] = 'Wrong email or password, please try again.'; 

                    $this->data['title'] = 'ACI - Login';
					#$this -> load -> model('campaign_model');

					$this->data['company_data'] = $result;
			
					$this->data['layout_body']='login5';
	 				$this->load->view('admin/layout/main_login', $this->data); 
                } 

            }

 	   }

		#$this->load->view('user_login');
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
