<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delmanufacturer extends MX_Controller {

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
	 * Author : Shivaji M Dalvi | Date : 15/10/2019
	 */
	public function index()
	{
		
		if (!isset($_SESSION['userId'])) {
			$login = BASE_PATH."login/";
			redirect($login);
		}

		
		$this->load->model('General_master');
		
		$id = base64_decode($_GET['id']);
		$params['user_id'] = @$_SESSION['userId']; 
        $dt = date('Y-m-d H:i:s');
        $params['dt'] = $dt;
        $params['user_comp_id'] = @$_SESSION['comp_id']; 
        $params['user_branch_id'] = @$_SESSION['branch_id'];
        $params['id'] = $id;

		$data['title'] = 'ACI - Manufacturer Master';
		#$this -> load -> model('campaign_model');
		
		$data['layout_body']='delmanufacturer';

		$result = $this->General_master->delmanufacturer($params);

		########################### Log Activity ######################################
            $this->load->model('Activity_master');
            $params['module'] = 'delmanufacturer';
            $params['date_time'] = $dt;
            $params['action'] = 'Delete';
            $params['user_activity_id'] = $_SESSION['userId'];
            $params['ip_address'] = $_SERVER['REMOTE_ADDR'];

            $activity = $this->Activity_master->addActivitylog($params);

        ##################################################################
     
 		$viewinteractions = BASE_PATH."Viewmanufacturer";
        redirect($viewinteractions);
		#$this->load->view('viewcompanymaster');
	}
}
