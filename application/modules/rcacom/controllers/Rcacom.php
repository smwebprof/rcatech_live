<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Description of site
 *
 * @author https://www.roytuts.com
 */
class Rcacom extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {

        echo "<h1>Welcome To RCAinet - Commodity Division</h1>";exit;

        $data['title'] = 'ACI - Main Page';
            
        $data['layout_body']='home';
        $this->load->view('admin/layout/main', $data); 

        //$this->load->view('home');
    }

}

/* End of file Site.php */
/* Location: ./application/modules/site/controllers/site.php */