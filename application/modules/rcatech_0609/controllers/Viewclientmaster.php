<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewclientmaster extends MX_Controller {

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
		
		$this->load->model('client_master');
		$this->load->model('Branch_master');
		$this->load->model('User_master');

		#print_r($_SESSION);exit;
		
		if ($_SESSION['employee_staff']=='Admin') {
			$mainmodule_id = 6;
			$submodule_id = 32;
		} else {
			$mainmodule_id = 12;
			$submodule_id = 55;
		}
		
		$status = isset($_GET['a']) ? $_GET['a'] : '1';

		$data['title'] = 'viewclientmaster - ACI';
		#$this -> load -> model('campaign_model');
		
		$data['layout_body']='viewclientmaster';

		$result = $this->client_master->getAllClientdata($status);

		$params['main_menus'] = $mainmodule_id;
        $params['sub_menus'] = $submodule_id;
        $params['user_access_id'] = $_SESSION['userId'];

		$rights = $this->User_master->getAccessforUserId($params);
		
     
 		$data['client_data'] = $result;
 		$data['access_right'] = $rights;

 		$this->load->view('admin/layout/main_app_view', $data);

		#$this->load->view('viewcompanymaster');
	}
}
