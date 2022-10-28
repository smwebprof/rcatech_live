<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of signin
 *
 * @author https://www.roytuts.com
 */
class Rcatech extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

    function index() {
        $data['title'] = 'ACI - Main Page';
            
        $data['layout_body']='home';
        $this->load->view('admin/layout/main', $data); 

        //$this->load->view('home');
    }

}

/* End of file signin.php */
/* Location: ./application/modules/signin/controllers/signin.php */