<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adduseraccessmaster extends MX_Controller {

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
		
        $this->load->library('form_validation');
        $this->load->model('company_master'); 
        $this->load->model('user_master');
        $this->load->model('client_master');
        $this->load->helper('form');

    	$main_menus = $this->user_master->getMainmenus();
    	

        if (@$_POST) {
        	//print_r($_POST);exit;
        	$_POST['user_id'] = @$_SESSION['userId']; 
        	$dt = gmdate('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;
        	#print_r($this->input->post());exit;

        	/*if (!@$_POST['submenu_master_id']) {
        		$viewitem = $_POST['main_menus'];
            	$user_access_data[$viewitem]['user_id'] = $_POST['user_name'];
            	$user_access_data[$viewitem]['menu_master_id'] = $_POST['main_menus'];
            	$user_access_data[$viewitem]['submenu_master_id'] = 0;

            	#$result = $this->user_master->addUseraccessmaster($user_access_data);
        	}*/

            $check_action = false;
            //$access_arr = array;
            if (isset($_POST['viewcheckbox'])) {
                foreach(@$_POST['viewcheckbox'] as $viewitem) {
            		#echo $viewitem;
            		#$user_access_data['view_rights'] = 1;
            		#$user_access_data['submenu_master_id'] = $viewitem;
            		$viewcheckbox[$viewitem] = 1;
            		$user_access_data[$viewitem]['view_rights'] = $viewcheckbox[$viewitem];
            		$user_access_data[$viewitem]['user_id'] = $_POST['user_name'];
            		$user_access_data[$viewitem]['menu_master_id'] = $_POST['main_menus'];
            		$user_access_data[$viewitem]['submenu_master_id'] = $viewitem;
                }
            }

            if (isset($_POST['addcheckbox'])) {
            	foreach(@$_POST['addcheckbox'] as $additem) {
            		#echo $additem;
            		#$user_access_data['view_rights'] = 1;
            		#$user_access_data['submenu_master_id'] = $additem;
            		$addcheckbox[$additem] = 1;
            		$user_access_data[$additem]['add_rights'] = $addcheckbox[$additem];
            		$user_access_data[$additem]['user_id'] = $_POST['user_name'];
            		$user_access_data[$additem]['menu_master_id'] = $_POST['main_menus'];
            		$user_access_data[$additem]['submenu_master_id'] = $additem;
            	}
        	}

        	if (isset($_POST['editcheckbox'])) {
            	foreach(@$_POST['editcheckbox'] as $edititem) {
            		#echo $edititem;
            		#$user_access_data['view_rights'] = 1;
            		#$user_access_data['submenu_master_id'] = $edititem;
            		$editcheckbox[$edititem] = 1;
            		$user_access_data[$edititem]['edit_rights'] = $editcheckbox[$edititem];
            		$user_access_data[$edititem]['user_id'] = $_POST['user_name'];
            		$user_access_data[$edititem]['menu_master_id'] = $_POST['main_menus'];
            		$user_access_data[$edititem]['submenu_master_id'] = $edititem;
            	}
            }	

            if (isset($_POST['deletecheckbox'])) {
            	foreach(@$_POST['deletecheckbox'] as $deleteitem) {
            		#echo $deleteitem;
            		#$user_access_data['view_rights'] = 1;
            		#$user_access_data['submenu_master_id'] = $deleteitem;
            		$deletecheckbox[$deleteitem] = 1;
            		$user_access_data[$deleteitem]['delete_rights'] = $deletecheckbox[$deleteitem];
            		$user_access_data[$deleteitem]['user_id'] = $_POST['user_name'];
            		$user_access_data[$deleteitem]['menu_master_id'] = $_POST['main_menus'];
            		$user_access_data[$deleteitem]['submenu_master_id'] = $deleteitem;
            	}
            }

            #print_r($user_access_data);exit;
            if (isset($user_access_data)) {
                foreach ($user_access_data as $key=>$value) {
                	$result = $this->user_master->addUseraccessmaster($value);
                }	
            }

            ########################### Log Activity ######################################
            $this->load->model('Activity_master');    
            $params['module'] = 'adduseraccessmaster';
            $params['date_time'] = $dt;
            $params['action'] = 'Create';
            $params['user_activity_id'] = $_SESSION['userId'];
            $params['ip_address'] = $_SERVER['REMOTE_ADDR'];

            $activity = $this->Activity_master->addActivitylog($params);

            ##################################################################

            $data['title'] = 'ACI - User Access Master';
			
			$data['layout_body']='adduseraccessmaster';
			$data['main_menus'] = $main_menus;
			$data['success'] = 'Changes are Updated Successfully';

			
 			$this->load->view('admin/layout/main_app', $data);
        } else {
   			$data['title'] = 'ACI - User Access Master';
			
			$data['layout_body']='adduseraccessmaster';
			$data['main_menus'] = $main_menus;
			
 			$this->load->view('admin/layout/main_app', $data);     	
        }       




		#$this->load->view('file_register_new');
	}


	public function fetch_states()
	{
		$this->load->model('company_master'); 
		
		echo $this ->company_master->fetch_states($this->input->post('country_id'));

	}

	public function fetch_city()
	{
		$this->load->model('company_master'); 
		
		echo $this ->company_master->fetch_city($this->input->post('state_id'));

	}


	public function fetch_users()
	{
		$this->load->model('user_master'); 
		
		echo $this ->user_master->fetch_users($this->input->post('user_type'));

	}

	public function fetch_submenus()
	{
		$this->load->model('user_master'); 
		
		echo $this ->user_master->getSubmenusbyId($this->input->post('main_menus'));

	}

}
