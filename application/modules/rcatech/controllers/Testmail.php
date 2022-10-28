<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testmail extends MX_Controller {

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
		 
		$this->load->library('email');


		  $this->email->set_newline("\r\n");

          $config['protocol'] = 'smtp';
          $config['smtp_host'] = 'sh200.bigrock.tempwebhost.net';
          $config['smtp_port'] = '587';
          $config['smtp_user'] = 'admin@rcahrd.in';
          $config['smtp_from_name'] = 'RCAINDIA (Do_Not_Reply)';
          $config['smtp_pass'] = 'U$FY[488AAS1';
          $config['wordwrap'] = TRUE;
          $config['newline'] = "\r\n";
          $config['mailtype'] = 'html';

          $to_email= 'shivaji.dalvi@rcaindia.com';
          $subject = 'Meeting Scheduled By ';
          $email_message = 'Test';

          $this->email->initialize($config);

          $this->email->from($config['smtp_user'], $config['smtp_from_name']);

          $this->email->to($to_email);

          $this->email->subject($subject);

          $this->email->message($email_message);

          if($this->email->send()) { 
            echo 'Mail sent';exit;         
          } else {
            echo 'There is some problem with Mail!!!. Please contact System Administrator';exit;
          }    

        
	}
	
	public function tmail()
	{
	    $_SESSION['branch_id'] = 21;
	    $this->load->model('Call_master');
	    
                $this->load->library('email');
        		$this->email->set_newline("\r\n");

	            $config['protocol'] = 'smtp';
	            $config['smtp_host'] = 'sh200.bigrock.tempwebhost.net';
	            $config['smtp_port'] = '587';
	            $config['smtp_user'] = 'admin@rcahrd.in';
	            $config['smtp_from_name'] = 'RCAINDIA Tech (Do_Not_Reply)';
	            $config['smtp_pass'] = 'U$FY[488AAS1';
	            $config['wordwrap'] = TRUE;
	            $config['newline'] = "\r\n";
	            $config['mailtype'] = 'html';
	            
	    $email_file_no = 'Testmail';
	    $subject = '[Testmail] NEW FILE ALERT - '.$email_file_no;

	            $file_email_report = 'Dear User,<br><br>';
				$file_email_report .= 'A new file has been generated – please find the details below :<br><br>';         
	    
	    //echo $file_email_report;exit;
	    $to_email = 'tbackup@rcaindia.net';

			    $this->email->initialize($config);

			    $this->email->from($config['smtp_user'], $config['smtp_from_name']);
			    $this->email->to('tbackup@rcaindia.net');
	    
	    
	    $call_lead_emails_cc = $this->Call_master->getEmailidsCallEmails($to_email);
		print_r($call_lead_emails_cc);exit;
		
		foreach ($call_lead_emails_cc as $rows) {
			        $email_cc[] = $rows['office_email'];
			    }
			    
		//print_r($email_cc);exit;
		
	        	$this->email->cc($email_cc);

	        	$this->email->subject($subject);

			    $this->email->message($file_email_report);

			    if($this->email->send()) { 
			      echo 'mail sent';exit;    
			    } else { 
			       //$redirecturl = BASE_PATH."Addfileregister";
	               //redirect($redirecturl);
	               show_error($this->email->print_debugger());
			    }
	    
	}    
}
