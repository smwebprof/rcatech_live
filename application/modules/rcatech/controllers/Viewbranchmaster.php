<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewbranchmaster extends MX_Controller {

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


		$this->load->model('branch_master');
		#$this->load->model('User_master');
		
		$mainmodule_id = 6;
		$submodule_id = 31;
		
		$data['title'] = 'ACI - BranchMaster';
		#$this -> load -> model('campaign_model');
		
		$data['layout_body']='viewbranchmaster';

		$result = $this->branch_master->getBranchdata();
		//print_r($result);exit;

		$params['main_menus'] = $mainmodule_id;
        $params['sub_menus'] = $submodule_id;
        $params['user_access_id'] = $_SESSION['userId'];

		#$rights = $this->User_master->getAccessforUserId($params);
     
 		$data['branch_data'] = $result;
 		#$data['access_right'] = $rights;

 		$this->load->view('admin/layout/main_app_view', $data);

		#$this->load->view('viewcompanymaster');
	}
}
