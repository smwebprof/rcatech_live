<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edititemsubtypemaster extends MX_Controller {

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

        $id = base64_decode($_GET['id']);

        #$result = $this->company_master->getRows();

		if (@$_POST) {
			//print_r($_POST);exit;
			$_POST['user_id'] = @$_SESSION['userId']; 
        	$dt = date('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;
        	#print_r($this->input->post());exit;
        	$resultdata = $this->Item_master->updateItemSubType($this->input->post());

        	########################### Log Activity ######################################
            $this->load->model('Activity_master');
            $params['module'] = 'edititemsubtypemaster';
            $params['date_time'] = $dt;
            $params['action'] = 'Create';
            $params['user_activity_id'] = $_SESSION['userId'];
            $params['ip_address'] = $_SERVER['REMOTE_ADDR'];

            $activity = $this->Activity_master->addActivitylog($params);

            ##################################################################

        	if ($resultdata) {  
 				$redirecturl = BASE_PATH."Viewitemsubtypemaster?msg=1";
                redirect($redirecturl); 
            }

		} else { 

			$result = $this->Item_master->getItemSubTypedata($id);
			//print_r($result);exit;

			$itemdata = $this->Item_master->getItemdata();
			//print_r($departmentdata);exit;

			$data['title'] = 'RCAinet Tech - Item Master';
			$data['item_subtype_data'] = $result;
			$data['itemdata'] = $itemdata;
			$data['layout_body']='edititemsubtypemaster';
 	

 			$this->load->view('admin/layout/main_app', $data);

			#$this->load->view('file_register_new');

		}	
		
	}
}
