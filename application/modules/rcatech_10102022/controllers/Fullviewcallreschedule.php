<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fullviewcallreschedule extends MX_Controller {

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
		if (!isset($_SESSION['userId'])) {
			$login = BASE_PATH."login/";
			redirect($login);
		}

		$this->load->model('File_master');
		$this->load->model('Call_master');
		$this->load->model('User_master');


		if (isset($_GET['cl'])) {
			$id = base64_decode($_GET['cl']);
			$st = base64_decode($_GET['st']);
			if ($st==1) { $st = 'Inspection Started'; }
			if ($st==2) { $st = 'Completed'; }
			//$st = 'Inspection Started';
			$fid = base64_decode($_GET['fid']);

			$schedule_data = $this->Call_master->updateCallScheduleComp($id,$st,$fid);
			if ($schedule_data) {
				echo "<h3>Your Call Status is ".$st." ,From RCAtech Admin</h3>";exit;
				//$redirecturl = BASE_PATH."Viewcallschedule?msg=1";
			    //redirect($redirecturl); 
			}
	        //print_r($schedule_data);exit;
		}	


			$id = base64_decode($_GET['id']);
			$fid = base64_decode($_GET['fid']);
			#echo $id."===".$fid;exit;

			$call_data = $this->Call_master->getCallGenerationByCallId($id,$fid);
			//print_r($call_data);exit;
			#echo $call_data[0]['id'];exit;
			if ($call_data[0]['id']) {
				$emp_status = array('SURVEYOR HEAD','EMPLOYEE');
				if (!in_array($_SESSION['employee_staff'], $emp_status)) {
				//if ($_SESSION['employee_staff']!='SURVEYOR HEAD') { 
				$call_docsdata = $this->Call_master->getAllCallDocDetailsById($call_data[0]['id']);
				} else { 
				$call_docsdata = $this->Call_master->getAllCallDocDetailsById2($call_data[0]['id']);
				}
			}
			//print_r($call_docsdata);exit;	

			$result = $this->Call_master->getCallGenerationByCallId($id,$fid);
        	//print_r($result);exit;

        	$item_details = $this->Call_master->getFCallItemDetailsById($id);
		    //print_r($item_details);exit;

		    $schedule_data = $this->Call_master->getCallScheduleAllDataByCallid($id,$fid);
        	//print_r($schedule_data);exit;

        	$call_days = $result[0]['call_days']-1;
        	$inspection_schedule_date = $result[0]['inspection_schedule_date'];
        	$inspection_schedule_next = date('d-m-Y', strtotime('+'.$call_days.' day', strtotime($inspection_schedule_date)));

        	if ($result[0]['nabcb_flag']==1) {        		
        		$engineers_data = $this->Call_master->getEngineerdataByFlag($result[0]['nabcb_flag']);
        	} else {
        		$engineers_data = $this->Call_master->getEngineerdataByNoFlag();
        	}

        	//$engineers_data = $this->Call_master->getEngineerdataByFlag();
        	//print_r($engineers_data);exit;
			
			$data['call_id'] = $id;
			$data['file_id'] = $fid;
			$data['call_data'] = $call_data;
			$data['file_data'] = $result;
			$data['item_details'] = $item_details;
			$data['call_docsdata'] = $call_docsdata;
			$data['schedule_data'] = $schedule_data;
			$data['inspection_schedule_date'] = $inspection_schedule_date;
			$data['inspection_schedule_next'] = $inspection_schedule_next;
			$data['engineers_data'] = $engineers_data;
			$data['title'] = 'ACI - Login';
			$data['layout_body']='fullviewcallreschedule';
	 		$this->load->view('admin/layout/main_app_call', $data);

	}

	public function fetch_calldetailsbyfileno()
	{
		$this->load->model('Call_master'); 
		
		echo $this ->Call_master->getCallDeatilsByFileNo($this->input->post('id'));

	}

	public function fetch_nabcbcalldetailsbyfileno()
	{
		$this->load->model('Call_master'); 
		
		echo $this ->Call_master->getNabcbCallDeatilsByFileNo($this->input->post('id'),$this->input->post('file_id'));

	}

	public function fetch_cargo()
	{
		$this->load->model('File_master'); 
		
		echo $this ->File_master->fetch_cargo($this->input->post('cargo_group'));

	}

	public function fetch_packing()
	{
		$this->load->model('Packing_master'); 
		
		echo $this ->Packing_master->fetch_packing();

	}

	public function fetch_unit()
	{
		$this->load->model('Unit_master'); 
		
		echo $this ->Unit_master->fetch_unit();

	}

	public function fetch_field_parameters()
	{
		$this->load->model('File_master'); 
		
		echo $this ->File_master->fetch_field_parameters($this->input->post('cargo_id'));

	}

	public function fetch_lab_parameters()
	{
		$this->load->model('File_master'); 
		
		echo $this ->File_master->fetch_lab_parameters($this->input->post('cargo_id'));

	}

	public function fetch_labparameters()
	{
		$this->load->model('File_master'); 
		
		echo $this ->File_master->fetch_labparameters($this->input->post('params'));

	}

	public function fetch_labmethods()
	{
		$this->load->model('File_master'); 
		
		echo $this ->File_master->fetch_labmethods($this->input->post('method_params'));

	}

	
}
