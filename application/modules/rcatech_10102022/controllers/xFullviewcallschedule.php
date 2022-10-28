<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fullviewcallschedule extends MX_Controller {

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
	 *  Author : Shivaji M Dalvi
	 *
	 */ 
	public function index()
	{
		
		//print_r($_SESSION);exit;
		if (empty(@$_SESSION['fname'])) {
			$login = BASE_PATH."login/";
			redirect($login);
		}
		
		
		$this->load->helper('url');
		$this->load->model('General_master');
		$this->load->model('Client_master');
		$this->load->model('Branch_master'); 
		$this->load->model('Call_master');
		$this->load->model('Activity_master');
		$this->load->model('User_master');

        $dt = date('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];
        $id = base64_decode($_GET['id']);


        #print_r($_SESSION);exit;
		$data['title'] = 'ACI - Fileregister';

		$result = $this->Call_master->getCallScheduleAllDataByCallid($id);
		print_r($result);exit;

		$item_details = $this->Call_master->getItemDetailsByCallId($id);
		//print_r($item_details);exit;

		$data['file_data']=$result;
		$data['item_details']=$item_details;
		$data['layout_body']='fullviewcallschedule';
		
	 	$this->load->view('admin/layout/main_app_editfile', $data);

	
	}

	public function fetch_cargo()
	{
		$this->load->model('File_master'); 
		
		echo $this ->File_master->fetch_cargo($this->input->post('cargo_group'));

	}
}
