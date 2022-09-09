<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addmanufacturer extends MX_Controller {

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
		
		#print_r($_POST);exit;
		$this->load->library('form_validation');
		$this->load->model('company_master'); 
        $this->load->model('branch_master'); 
        $this->load->model('user_master');
        $this->load->model('Department_master');
        $this->load->model('Call_master');
        $this->load->helper('form');

        #$result = $this->company_master->getRows();

		if (@$_POST) {
			//print_r($_POST);exit;
			$_POST['user_id'] = @$_SESSION['userId']; 
        	$dt = date('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;
        	$_POST['user_comp_id'] = @$_SESSION['comp_id']; 
        	$_POST['user_branch_id'] = @$_SESSION['branch_id'];

        	#print_r($this->input->post());exit;
        	$resultdata = $this->Call_master->Addmanufacturer($this->input->post());

        	########################### Log Activity ######################################
            $this->load->model('Activity_master');
            $params['module'] = 'addsubtypeitemmaster';
            $params['date_time'] = $dt;
            $params['action'] = 'Create';
            $params['user_activity_id'] = $_SESSION['userId'];
            $params['ip_address'] = $_SERVER['REMOTE_ADDR'];

            $activity = $this->Activity_master->addActivitylog($params);

            ##################################################################

        	if ($resultdata) {  
 				$data['title'] = 'RCAinet Tech - Addmanufacturer';
 				$data['success'] = "Your data is inserted successfully!!!";
				#$this->data['company_data'] = $result;
				$data['layout_body']='addmanufacturer';

 				$this->load->view('admin/layout/main_app_call', $data);

				#$this->load->view('file_register_new');
 
            }

		} else { 

			$engineers_data = $this->Call_master->getAllEngineerdata();
        	//print_r($engineers_data);exit;

			$data['title'] = 'RCAinet Tech - Addmanufacturer';
			$data['engineers_data'] = $engineers_data;
			$data['layout_body']='Addmanufacturer';
 	

 			$this->load->view('admin/layout/main_app_call', $data);

			#$this->load->view('file_register_new');

		}	
		
	}
}
