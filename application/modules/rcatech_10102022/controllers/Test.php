<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends MX_Controller {

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
		 
		$text = 'rci#1234';
		$text2 = md5(md5($text));
		//$text2 = md5($text);
		echo $text3 = base64_encode($text2);
        
	}    
}
