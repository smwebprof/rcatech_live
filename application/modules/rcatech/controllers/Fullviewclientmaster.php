<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fullviewclientmaster extends MX_Controller {

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
        
        $this->load->library('form_validation');
        $this->load->model('company_master'); 
        //$this->load->model('user_master');
        $this->load->model('client_master');
        $this->load->model('Branch_master');
        $this->load->helper(array('form', 'url'));
        $id = base64_decode($_GET['id']);
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];

        $companies = $this->company_master->getRows();
        //$branchs = $this->Branch_master->getBranchdata();
        $countries = $this->company_master->getCountries();
        $result = $this->client_master->getClientdataById($id);
        //print_r($result);exit;

        $client_details = $this->client_master->getAllClientdetails($id);
        //print_r($client_details);exit;

        $states = $this->company_master->getStates($result[0]['country_id']);
        $cities = $this->company_master->getCities($result[0]['state_id']);
        $branchs = $this->Branch_master->getBranchByCompanyId($result[0]['comp_id']);
        //print_r($result);exit;

        $data['title'] = 'ACI - fullviewclientmaster';
        #$this -> load -> model('campaign_model');
            
        $data['layout_body']='fullviewclientmaster';
        //$data['countries'] = $result;
        $data['company_data'] = $companies;
        $data['client_data'] = $result;
        $data['client_details'] = $client_details;
        $data['countries'] = $countries;
        $data['states'] = $states;
        $data['cities'] = $cities;
        $data['branchs_data']=$branchs;
    

        $this->load->view('admin/layout/main_app', $data);         


    
    }

}
