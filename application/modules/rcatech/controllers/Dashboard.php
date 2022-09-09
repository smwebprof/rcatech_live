<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {

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
	 *
	 * Author : Shivaji M Dalvi
	 * Date : 15/01/2020
	 *
	 */
	public function index()
	{
		
		if (!isset($_SESSION['userId'])) {
			$login = BASE_PATH."login/";
			redirect($login);
		}

		$this->load->model('Branch_master'); 
		$this->load->model('User_master');
		$this->load->model('Dashboard_master');
		$this->load->model('Invoice_master');
		$this->load->model('Company_master');
		$this->load->model('Vendor_master');
		
	    //print_r($_SESSION);exit;
	    //print_r($_POST);exit;
		
		if (@$_POST['current_branch_form']=='current_branch_form') {

			#$this->session->unset_userdata('logged_in');
    		#$this->session->sess_destroy();

			$checkBranch = $this->Branch_master->getBranchdataById($_POST['current_branch']);
			//print_r($checkBranch);exit;
			$checkLogin = $this->User_master->getUserbyId($_SESSION['userId']);

			$checkOpYear = $this->User_master->fetch_op_year($checkBranch['comp_id']);
			#print_r($checkOpYear);exit;
    		
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
	        $this->session->set_userdata('comp_id', $checkBranch['comp_id']);
	        $this->session->set_userdata('branch_id', $checkBranch['id']);
	        $this->session->set_userdata('default_branch_id', $checkBranch['id']);
	        $this->session->set_userdata('operatingyear', $checkOpYear[0]['year']);  

		}


		$op_year = $this->Dashboard_master->select_op_year(@$_SESSION['comp_id']);
		//print_r($op_year);exit;
		if (@$_POST['select_finyr']) {
			$operatingyear = $_POST['select_finyr'];
		} else {
			$operatingyear = $_SESSION['operatingyear'];
			$_POST['select_finyr'] = $_SESSION['operatingyear'];
		}
				
		

		//print_r($ledger_details);exit;
		
		$data['title'] = 'Login';
		/*$this->data['fileCount'] = $fileCount[0]['filecount'];
		$this->data['invoiceCount'] = $invoiceCount[0]['invoicecount'];
		$this->data['invoice_amt'] = $tot_inv_amt;
		$this->data['invoice_rec_amt'] = $tot_inv_rec_amt;
		$this->data['clientCount'] = $clientCount[0]['clientcount'];
		$this->data['cargos'] = $cargos;
		$this->data['ledgerdata'] = $ledger_details;
		$this->data['fileCompleteCount'] = $fileCompleteCount[0]['filecount'];
		$this->data['filePendingCount'] = $filePendingCount[0]['filecount'];
		$this->data['fileInvoicedCount'] = $fileInvoicedCount[0]['filecount'];
		$this->data['fileCancelledCount'] = $fileCancelledCount[0]['filecount'];
		$this->data['fileRunningCount'] = $fileRunningCount[0]['filecount'];
		$this->data['VendorCount'] = $vendor_info[0]['vendors'];
		$this->data['CargoCount'] = $cargo_details[0]['cargos'];
		$this->data['ClientInteractionCount'] = $client_interactions[0]['interactions'];
		$this->data['recent_files'] = $recent_files;
		$this->data['recent_invoices'] = $recent_invoices;*/
		$data['op_year'] = $op_year;

		
		$data['layout_body']='dashboard';
 	

 		$this->load->view('admin/layout/main_dashboard', $data);

		#$this->load->view('file_register_new');
	}
}
