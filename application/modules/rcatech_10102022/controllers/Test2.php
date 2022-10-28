<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test2 extends MX_Controller {

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
	 * Author : Shivaji M Dalvi 
	 * Date : 09.08.2021
	 */
	public function index()
	{
		 
		$this->load->model('General_master');

		//$result = $this->General_master->getCities();
		//print_r($result);exit;

		$result2 = $this->General_master->getCitiesmaster();
		//print_r($result2);exit;

		$i = 0;
		$file = fopen("test.csv","a");
		foreach ($result2 as $city_name) { 
			//echo $city_name['city'];exit;	
			$result = $this->General_master->getCitiesdetails($city_name['city']);
			fwrite($file,$result."\n");
			//print_r($result);exit;
			/*if ($i==50) {
				break;
			}*/
			$i++;	
		}
		fclose($file);
        //print_r($result);exit;
	} 


	public function subtype()
	{
		$this->load->model('General_master');
		$file = fopen("st2.csv","r");
		$row = 0;
		while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
			//echo $data[0] . "<br />\n";
			$result = $this->General_master->addSubtypeData($data);
			$row++;
			/*if ($row==5) {
				break;
			}*/
		}	
		fclose($file);
	} 


	public function empcode()
	{
		$this->load->model('General_master');
		$file = fopen("st.csv","r");
		$row = 0;
		while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
			//echo $data[0] . "<br />\n";
			$result = $this->General_master->getBranchdetails($data[0]);
			$row++;
			/*if ($row==5) {
				break;
			}*/
		}	
		fclose($file);
	}  
}
