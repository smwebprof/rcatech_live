<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of signin
 *
 * @author https://www.roytuts.com
 */
class loginapi extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

    function index() {
        $this->load->model('Login_api');
        $result = $this->Login_api->getRows();
        print_r($result);
    }

}

/* End of file signin.php */
/* Location: ./application/modules/signin/controllers/signin.php */