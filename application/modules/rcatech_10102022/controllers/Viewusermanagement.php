<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewusermanagement extends MX_Controller {

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


		$this->load->model('User_master');
		
		$status = isset($_GET['a']) ? $_GET['a'] : '1';

		$data['title'] = 'RCA - Viewusermanagement';
		#$this -> load -> model('campaign_model');
		
		$data['layout_body']='viewusermanagement';

		$result = $this->User_master->getAllrows();
		//print_r($result);exit;
     
 		$data['user_data'] = $result;

 		$this->load->view('admin/layout/main_app_view', $data);

		#$this->load->view('viewcompanymaster');
	}
}
