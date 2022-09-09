<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewcallreschedule extends MX_Controller {

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
		
		$this->load->model('Client_master');
		#$this->load->model('User_master');
		$this->load->model('Call_master');
		$this->load->model('User_master');
		$this->load->model('Branch_master');


		//print_r($_SESSION);exit;
		

		if (@$_POST['submit']=='excel') {
			$redirecturl = BASE_PATH."Viewexcelfileregister?file_from_date=".@$_POST['file_from_date']."&file_To_date=".@$_POST['file_To_date']."&file_no_type=".@$_POST['file_no_type']."&status=".@$_POST['status']."&clients_name=".@$_POST['clients_name']."&file_nos=".@$_POST['file_nos'];
	        redirect($redirecturl);
		}

		if (@$_POST['viewfileregister']) {
			#print_r($_POST);exit;
			//print_r($_SESSION);exit;
			$mainmodule_id = 2;
			$submodule_id = 1;
			
			$status = isset($_GET['a']) ? $_GET['a'] : '1';

			$data['title'] = 'RCAinet Tech - Fileregister';
			#$this -> load -> model('campaign_model');
			
			$data['layout_body']='viewfileregister';

			$result = $this->File_master->getAllFiledataSearch($_POST);
			#print_r($result);exit;
			$clients = $this->Client_master->getClientdataByBranchid($_SESSION['branch_id']);
			//print_r($clients);exit;
			$work_types = $this->File_master->getFileNosByWorkType();
			//print_r($work_types);exit;

			//$file_no_type = 'Single';
			$file_nos = $this->File_master->getFileNosByBranchId($_SESSION['branch_id']);
			//print_r($file_nos);exit;

			
			$params['main_menus'] = $mainmodule_id;
	        $params['sub_menus'] = $submodule_id;
	        $params['user_access_id'] = $_SESSION['userId'];

			$rights = $this->User_master->getAccessforUserId($params);
	     
	 		$data['file_data'] = $result;
	 		$data['access_right'] = $rights;
	 		$data['file_from_date']=@$_POST['file_from_date'];
	 		$data['file_To_date']=@$_POST['file_To_date'];
	 		$data['status']= @$_POST['status'];
	 		$data['file_nos']=@$file_nos;
	 		$data['clients_data']=$clients;

	 		$this->load->view('admin/layout/main_app_view', $data);
		} else {
		
			$mainmodule_id = 2;
			$submodule_id = 1;
			
			$status = isset($_GET['a']) ? $_GET['a'] : '1';

			$data['title'] = 'RCAinet - ViewCallReschedule';
			#$this -> load -> model('campaign_model');
			
			$data['layout_body']='Viewcallreschedule';

			$result = $this->Call_master->getCallScheduleAllData();
	    	//print_r($result);exit;

			$params['main_menus'] = $mainmodule_id;
	        $params['sub_menus'] = $submodule_id;
	        $params['user_access_id'] = $_SESSION['userId'];

			$rights = $this->User_master->getAccessforUserId($params);
			//print_r($rights);exit;
	     
	 		$data['call_data'] = $result;
	 		$data['access_right'] = $rights;

	 		$this->load->view('admin/layout/main_app_view', $data);
 		}
		#$this->load->view('viewcompanymaster');
	}
}
