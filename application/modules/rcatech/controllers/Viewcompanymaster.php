<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewcompanymaster extends MX_Controller {

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

		$this->load->model('company_master');
		$this->load->model('User_master');
		
		$mainmodule_id = 9;
		$submodule_id = 44;
		
		$data['title'] = 'ACI - Companymaster';
		#$this -> load -> model('campaign_model');
		
		$data['layout_body']='viewcompanymaster';

		$result = $this->company_master->getCompanydata();

		$params['main_menus'] = $mainmodule_id;
        $params['sub_menus'] = $submodule_id;
        $params['user_access_id'] = $_SESSION['userId'];

		$rights = $this->User_master->getAccessforUserId($params);

		$country = $this->company_master->fetchCountryById($result[0]['countryid']);
		$state = $this->company_master->fetchStateById($result[0]['stateid']);
		$city = $this->company_master->fetchCityById($result[0]['cityid']);
        
		$result[0]['countryid']	= $country[0]['name'];
		$result[0]['stateid']	= $country[0]['name'];
		$result[0]['cityid']	= $country[0]['name'];

		
 		$data['company_data'] = $result;
 		$data['access_right'] = $rights;

 		$this->load->view('admin/layout/main_app', $data);

		#$this->load->view('viewcompanymaster');
	}
}
