<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of signin
 *
 * @author https://www.roytuts.com
 */
class Posttech extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

    function index() {
        
        echo '<h1>API Interface : Please provide Required Parameters to fetch data from RCAinet system</h1>';exit;
        
        $data['title'] = 'Signin';

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('signin', $data);
        } else {
            redirect();
        }
    }

}

/* End of file signin.php */
/* Location: ./application/modules/signin/controllers/signin.php */