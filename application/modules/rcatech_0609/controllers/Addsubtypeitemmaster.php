<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addsubtypeitemmaster extends MX_Controller {

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
        $this->load->model('Item_master');
        $this->load->helper('form');

        #$result = $this->company_master->getRows();

		if (@$_POST) {
			//print_r($_POST);exit;
			$_POST['user_id'] = @$_SESSION['userId']; 
        	$dt = date('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;
        	#print_r($this->input->post());exit;
        	$resultdata = $this->Item_master->addItemSubType($this->input->post());

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
 				$data['title'] = 'RCAinet Tech - Item SubType Master';
 				$data['success'] = "Your data is inserted successfully!!!";
				#$this->data['company_data'] = $result;
				$data['layout_body']='addsubtypeitemmaster';

 				$this->load->view('admin/layout/main_app_call', $data);

				#$this->load->view('file_register_new');
 
            }

		} else { 

			$item_data = $this->Item_master->getItemdata();
			//print_r($item_data);exit;

			$data['title'] = 'RCAinet Tech - Item Master';
			$data['item_data'] = $item_data;
			$data['layout_body']='addsubtypeitemmaster';
 	

 			$this->load->view('admin/layout/main_app_call', $data);

			#$this->load->view('file_register_new');

		}	
		
	}
}
