<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Callgenerationregister extends MX_Controller {

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
	 *  Author : Shivaji M Dalvi
	 *
	 */ 
	public function index()
	{
		
		error_reporting (E_ALL ^ E_NOTICE);
		//print_r($_SESSION);exit;
		if (!isset($_SESSION['userId'])) {
			$login = BASE_PATH."login/";
			redirect($login);
		}

		$this->load->model('Client_master');
		$this->load->model('Call_master');
		$this->load->model('File_master');
		$this->load->model('User_master');
		$this->load->model('company_master');
		$this->load->model('General_master');
		$this->load->model('Branch_master');

		
		if ($_POST) {
			//print_r($_POST);exit;
			//print_r($_FILES);exit;
			$_POST['user_id'] = @$_SESSION['userId']; 
        	$dt = date('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;
        	$_POST['user_comp_id'] = @$_SESSION['comp_id']; 
        	$_POST['user_branch_id'] = @$_SESSION['branch_id'];

        	if (!empty(@$_POST['call_nabcb_flag'])) { @$_POST['call_nabcb_flag'] == 0; } else { @$_POST['call_nabcb_flag'] == 1; }
			
			$params['client_id'] = $_POST['clients_name'];
			$params['file_no'] = $_POST['file_no'];

			// For manufacturer
			if (isset($_POST['call_manufacturer'])) {
				$getManufacturerDetails = $this->Call_master->getManufacturerDetails($_POST);
				//print_r($getManufacturerDetails);exit;
				$_POST['manufacturer_id'] = @$getManufacturerDetails['id'];	
				if (empty(@$getManufacturerDetails['manufacturer_name'])) {
					$addManufacturerDetails = $this->Call_master->addManufacturerDetails($_POST);
					$_POST['manufacturer_id'] = @$addManufacturerDetails;
				}
			}
			//print_r($_POST['manufacturer_id']);exit;

			// For vendor
			if (isset($_POST['call_vendor'])) {
				$getVendorDetails = $this->Call_master->getVendorDetails($_POST);
				//print_r($getVendorDetails);exit;	
				$_POST['vendor_id'] = @$getManufacturerDetails['id'];
				if (empty(@$getVendorDetails['vendor_name'])) {
					$addVendorDetails = $this->Call_master->addVendorDetails($_POST);
					$_POST['vendor_id'] = @$addVendorDetails;
				}
			}


			$getFileDetails = $this->File_master->getFiledataById($_POST['file_no']);
			//print_r($getFileDetails);exit;

			$file_no = $getFileDetails[0]['file_no'];

			$getCallDetails = $this->Call_master->getCallGenerationById($params);
            //print_r($getCallDetails);exit;

         if (isset($getCallDetails) && !empty($getCallDetails)) {
            $CallId = @$getCallDetails[0]['call_id']+1;
            $Call_Id = $CallId;
            $CallId = str_pad($CallId, 3, '0', STR_PAD_LEFT);
            //$_POST['call_id'] = $Call_Id;
          } else { 
             $CallId = 1;
             $Call_Id = $CallId;
             $CallId = str_pad($CallId, 3, '0', STR_PAD_LEFT);
             //$_POST['call_id'] = $Call_Id;
          }
          //echo $CallId;exit;
          $_POST['call_no'] = $file_no."/".$CallId;
          $_POST['call_id'] = $Call_Id;
          //$updateinvoiceno['invoice_id'] = $invoiceId;
          //print_r($updatecallno);exit;
          //print_r($_POST);exit;          			 			

			$file_no_upl = str_replace('/','',$file_no);
			$folder_upl_path = @mkdir('./files/techdocs/'.$file_no_upl.'/'.$Call_Id.'/', 0777, true);

			$upload_path = APP_UPLOAD_PATH.'files/techdocs/'.$file_no_upl.'/'.$Call_Id.'/';
			$config['upload_path'] = './files/techdocs/'.$file_no_upl.'/'.$Call_Id;
        	$config['allowed_types'] = '*'; //xls|pdf|doc //*
        	$config['max_size'] = 512000;

        	$this->load->library('upload', $config);
        	$this->upload->initialize($config);

        	$upl_call_docs = array();
        	if (!$this->upload->do_upload('upl_call_rate_confirmation')) {
            $error = array('error' => $this->upload->display_errors());
            #print_r($error);exit;
       	} else {
            $data = array('upl_call_rate_confirmation_path' => $this->upload->data());
            $upl_call_docs[1]['document_info'] = $upload_path.$data['upl_call_rate_confirmation_path']['file_name'];
            $upl_call_docs[1]['document_info'] = $upload_path.$data['upl_call_rate_confirmation_path']['file_name'];
            	$upl_call_docs[1]['document_name'] =  $_POST['upl_call_letter_title'][0];
            	//$upl_call_docs[1]['document_number'] =  @$_POST['upl_call_letter_text'][0];
            $_POST['upl_call_rate_confirmation_path'] = $data['upl_call_rate_confirmation_path']['file_name'];
            if (!$_POST['upl_call_rate_confirmation_path']) { $_POST['upl_call_rate_confirmation_path'] = '';}
        	}

        	if (!$this->upload->do_upload('upl_call_letter')) {
            $error = array('error' => $this->upload->display_errors());
            #print_r($error);exit;
       	} else {
            $data = array('upl_call_letter_path' => $this->upload->data());
            $upl_call_docs[2]['document_info'] = $upload_path.$data['upl_call_letter_path']['file_name'];
            $upl_call_docs[2]['document_info'] = $upload_path.$data['upl_call_letter_path']['file_name'];
            	$upl_call_docs[2]['document_name'] =  $_POST['upl_call_letter_title'][1];
            	//$upl_call_docs[2]['document_number'] =  $_POST['upl_call_letter_text'][1];
            $_POST['upl_call_letter_path'] = $data['upl_call_letter_path']['file_name'];
            if (!$_POST['upl_call_letter_path']) { $_POST['upl_call_letter_path'] = '';}
        	}

        	if (!$this->upload->do_upload('upl_call_quality_assr')) {
            $error = array('error' => $this->upload->display_errors());
            #print_r($error);exit;
       	} else {
            $data = array('upl_call_quality_assr_path' => $this->upload->data());
            $upl_call_docs[3]['document_info'] = $upload_path.$data['upl_call_quality_assr_path']['file_name'];
            $upl_call_docs[3]['document_info'] = $upload_path.$data['upl_call_quality_assr_path']['file_name'];
            	$upl_call_docs[3]['document_name'] =  $_POST['upl_call_letter_title'][2];
            	//$upl_call_docs[3]['document_number'] =  $_POST['upl_call_letter_text'][2];
            $_POST['upl_call_quality_assr_path'] = $data['upl_call_quality_assr_path']['file_name'];
            if (!$_POST['upl_call_quality_assr_path']) { $_POST['upl_call_quality_assr_path'] = '';}
        	}

        	if (!$this->upload->do_upload('upl_call_drawings')) {
            $error = array('error' => $this->upload->display_errors());
            #print_r($error);exit;
       	} else {
            $data = array('upl_call_drawings_path' => $this->upload->data());
            $upl_call_docs[4]['document_info'] = $upload_path.$data['upl_call_drawings_path']['file_name'];
            $upl_call_docs[4]['document_info'] = $upload_path.$data['upl_call_drawings_path']['file_name'];
            	$upl_call_docs[4]['document_name'] =  $_POST['upl_call_letter_title'][3];
            	//$upl_call_docs[4]['document_number'] =  $_POST['upl_call_letter_text'][3];
            $_POST['upl_call_drawings_path'] = $data['upl_call_drawings_path']['file_name'];
            if (!$_POST['upl_call_drawings_path']) { $_POST['upl_call_drawings_path'] = '';}
        	}

        	if (!$this->upload->do_upload('upl_call_purchase_order')) {
            $error = array('error' => $this->upload->display_errors());
            #print_r($error);exit;
       	} else {
            $data = array('upl_call_purchase_order_path' => $this->upload->data());
            $upl_call_docs[5]['document_info'] = $upload_path.$data['upl_call_purchase_order_path']['file_name'];
            $upl_call_docs[5]['document_info'] = $upload_path.$data['upl_call_purchase_order_path']['file_name'];
            	$upl_call_docs[5]['document_name'] =  $_POST['upl_call_letter_title'][4];
            	//$upl_call_docs[5]['document_number'] =  $_POST['upl_call_letter_text'][4];
            $_POST['upl_call_purchase_order_path'] = $data['upl_call_purchase_order_path']['file_name'];
            if (!$_POST['upl_call_purchase_order_path']) { $_POST['upl_call_purchase_order_path'] = '';}
        	}

        	if (!$this->upload->do_upload('upl_call_request_inspection')) {
            $error = array('error' => $this->upload->display_errors());
            #print_r($error);exit;
       	} else {
            $data = array('upl_call_request_inspection_path' => $this->upload->data());
            $upl_call_docs[6]['document_info'] = $upload_path.$data['upl_call_request_inspection_path']['file_name'];
            $upl_call_docs[6]['document_info'] = $upload_path.$data['upl_call_request_inspection_path']['file_name'];
            	$upl_call_docs[6]['document_name'] =  $_POST['upl_call_letter_title'][5];
            	//$upl_call_docs[6]['document_number'] =  $_POST['upl_call_letter_text'][5];
            $_POST['upl_call_request_inspection_path'] = $data['upl_call_request_inspection_path']['file_name'];
            if (!$_POST['upl_call_request_inspection_path']) { $_POST['upl_call_request_inspection_path'] = '';}
        	}

        	if (!$this->upload->do_upload('upl_call_request_techdocs')) {
            $error = array('error' => $this->upload->display_errors());
            #print_r($error);exit;
       	} else {
            $data = array('upl_call_request_techdocs_path' => $this->upload->data());
            $upl_call_docs[7]['document_info'] = $upload_path.$data['upl_call_request_techdocs_path']['file_name'];
            $upl_call_docs[7]['document_info'] = $upload_path.$data['upl_call_request_techdocs_path']['file_name'];
            	$upl_call_docs[7]['document_name'] =  $_POST['upl_call_letter_title'][6];
            	//$upl_call_docs[7]['document_number'] =  $_POST['upl_call_letter_text'][6];
            $_POST['upl_call_request_techdocs_path'] = $data['upl_call_request_techdocs_path']['file_name'];
            if (!$_POST['upl_call_request_techdocs_path']) { $_POST['upl_call_request_techdocs_path'] = '';}
        	}


         $resultdata = $this->Call_master->addCallDetails($_POST);
         //print_r($resultdata);exit;
         //$resultdata = 111;

            if ($resultdata) { 
            	$_POST['call_id'] = $resultdata;
            	$itemdetailsdata = $this->Call_master->addCallItemDetails($_POST);


            	$calldocsdetailsdata = $this->Call_master->addCallDocumentDetails($_POST,$upl_call_docs);


            	if ($resultdata) { 
            		$call_details = $this->Call_master->getCallGenerationByCallId($resultdata,$_POST['file_no']);
						//print_r($call_details);exit;

						$item_details = $this->Call_master->getFCallItemDetailsById($resultdata);
				      //print_r($item_details);exit;

				      $calldoc_details = $this->Call_master->getCallDocDetailsById($resultdata);
		    		   //print_r($calldoc_details);exit;

					   //$path_parts = pathinfo($calldoc_details[0]['document_path']);
					   $doc_path = BASE_PATH."Callscheduleregister?id=".base64_encode($resultdata)."&fid=".base64_encode($_POST['file_no']);
					   //print_r($path_parts);exit;

						$this->load->library('email');
				      $this->email->set_newline("\r\n");


				      //////// send email notification ///////////////
				      $email_call_id = $call_details[0]['call_no'];
				      $email_call_no = "<a href='".$doc_path."'>".$call_details[0]['call_no']."</a>";
				      $email_call_date = date('d-m-Y',strtotime($call_details[0]['call_date']));
				      $email_file_no = $call_details[0]['file_no'];
				      $email_call_client = $call_details[0]['client_name'];
				      $email_call_location = $call_details[0]['inspection_location'];
				      $email_call_manufacturer = $call_details[0]['manufacturer'];
				      $email_call_enduser = $call_details[0]['end_user'];
				      $email_call_inspdate = $call_details[0]['inspection_schedule_date'];
				      $email_call_inspdays = $call_details[0]['call_days'];
				      //$email_call_empname = $call_details[0]['first_name'].' '.$call_details[0]['first_name'];
				      $email_call_by = $call_details[0]['emp_code'];
				      $email_call_city = $call_details[0]['city_name'];
				      $email_assigned_to_branch = $call_details[0]['assigned_to_branch'];
				      $email_call_client_loc = $call_details[0]['client_location'];
				      $email_call_enduser_loc = $call_details[0]['end_user_location'];

					   $config['protocol'] = 'smtp';
    	               $config['smtp_host'] = 'mail.rcahrd.in';
    	               $config['smtp_port'] = '587';
    	               $config['smtp_user'] = 'admin@rcahrd.in';
    	               $config['smtp_from_name'] = 'RCAINDIA Tech (Do_Not_Reply)';
    	               $config['smtp_pass'] = 'U$FY[488AAS1';
    	               $config['wordwrap'] = TRUE;
    	               $config['newline'] = "\r\n";
    	               $config['mailtype'] = 'html';

					   $subject = '[Testmail] NEW CALL GENERATION ALERT - '.$email_call_id;

						$call_email_report = 'Dear User,<br><br>';
						$call_email_report .= 'A New Call has been generated – please find the details below :<br><br>';			

						/*$call_email_report .= '<table width="100%" cellpadding="0" border="1">
						          		 <tr><td align="center"><b>Call No</b></td><td align="center"><b>Call Date</b></td><td align="center"><b>Client Name</b></td><td align="center"><b>File No</b></td><td align="center"><b>Inspection Location</b></td><td align="center"><b>Manufacturer Name</b></td></tr>
						          		 <tr><td align="center">'.$email_call_no.'</td><td align="center">'.$email_call_date.'</td><td align="center">'.$email_call_client.'</td><td align="center">'.$email_file_no.'</td><td align="center">'.$email_call_location.'</td><td align="center">'.$email_call_manufacturer.'</td>
						          		 </tr></table>';*/

						$call_email_report .= '<table width="30%" cellpadding="0" border="1">
			    			<tr><td align="left"><b>Call No</b></td><td align="left">'.$email_call_no.'</td></tr>
			    			<tr><td align="left"><b>Client Name</b></td><td align="left">'.$email_call_client.','.$email_call_client_loc.'</td></tr>
			    			<tr><td align="left"><b>End User</b></td><td align="left">'.$email_call_enduser.','.$email_call_enduser_loc.'</td></tr>
			    			<tr><td align="left"><b>Manufactuer</b></td><td align="left">'.$email_call_manufacturer.'</td></tr>
			    			<tr><td align="left"><b>Inspection Location</b></td><td align="left">'.$email_call_location.', '.$email_call_city.' </td></tr>
			    			<tr><td align="left"><b>Inspection Date</b></td><td align="left">'.$email_call_inspdate.' ('.$email_call_inspdays.' days)</td></tr>
			    			<tr><td align="left"><b>Call Generated By</b></td><td align="left">'.$email_call_by.'</td></tr>
			    			</table>';  


						$call_email_report .= '<br><br><b>Item Details :</b><br><br>';
				      /**$call_email_report .= '<table width="100%" cellpadding="0" border="1">'; 
				      $call_email_report .= '<tr><td align="center"><b>Item Name</b></td><td align="center"><b>Item Subtype</b></td><td align="center"><b>Inspection Date</b></td><td align="center"><b>Unit</b></td></tr>';
				      foreach ($item_details as $k=>$v) {
				        	 		 
						    	$call_email_report .= '<tr><td align="center">'.$v["item_name"].'</td><td align="center">'.$v["subitem_name"].'</td><td align="center">'.$v["item_schedule_date"].'</td><td align="center">'.$v["unit_name"].'</td>
						          		 </tr>';
						 }
						 $call_email_report .= '</table>';***/  	

						foreach ($item_details as $k=>$v) {
							 $call_email_report .= '<table width="30%" cellpadding="0" border="1">
				    			<tr><td align="left"><b>Item Name</b></td><td align="left">'.$v["item_name"].'</td></tr>
				    			<tr><td align="left"><b>Item Subtype</b></td><td align="left">'.$v["subitem_name"].'</td></tr>
				    			<tr><td align="left"><b>Quantity</b></td><td align="left">'.$v["item_quantity"].'</td></tr>
				    			<tr><td align="left"><b>Unit</b></td><td align="left">'.$v["unit_name"].'</td></tr>
				    			</table>'; 
			    		}	
			    			
						/***$call_email_report .= '<br><br><b>Call Documents :</b><br><br>';
						$call_email_report .= '<table width="100%" cellpadding="0" border="1">'; 
				      $call_email_report .= '<tr><td align="center"><b>Document Name</b></td><td align="center"><b>Document Path</b></td></tr>';
				      foreach ($calldoc_details as $k=>$v) {
				        	   $email_call_doc_path = "<a href='".$v["document_path"]."'>".$v["document_path"]."</a>";		 
						    	$call_email_report .= '<tr><td align="center">'.$v["document_name"].'</td><td align="center">'.$email_call_doc_path.'</td></tr>';
						 }
						 $call_email_report .= '</table>';***/  		 

						 $call_email_report .= '<br><br>From,<br>'; 
						 $call_email_report .= '<br>RCAinet Tech Admin<br><br>'; 

						 $call_email_report .= '<br><b>NOTE: This is a system generated mail. Please do not reply</b><br><br>'; 


				       //echo $call_email_report;exit;
				       		           
			          #######  To cc email
			           $call_lead_emails_cc = $this->Call_master->getEmailidsCallGenerate($_SESSION['branch_id']);
						  //print_r($call_lead_emails_cc);exit;

						foreach ($call_lead_emails_cc as $rows) {
			        		$email_cc[] = $rows['office_email'];
			            }

				       $this->email->initialize($config);

					    $this->email->from($config['smtp_user'], $config['smtp_from_name']);
					    //$this->email->to($call_lead_emails_to);  

					    ####### To email address
					    $call_lead_emails_to = $this->Call_master->getEmailidsCallGenerate($email_assigned_to_branch);
		   			 //print_r($call_lead_emails_to);exit;	

						$this->email->to($_SESSION['user_email']);
						
						$this->email->cc($email_cc);
						
						$this->email->bcc('shivaji.dalvi@rcaindia.com');

			        	$this->email->subject($subject);

					    $this->email->message($call_email_report);

					    if($this->email->send()) { 
					       $redirecturl = BASE_PATH."Viewcallgeneration?msg=1";
			               redirect($redirecturl);      
					    } else { 
					       //$redirecturl = BASE_PATH."Callgenerationregister";
			               //redirect($redirecturl);
					    	show_error($this->email->print_debugger());
					    }
            	}

            	$redirecturl = BASE_PATH."Viewcallgeneration?msg=1";
	            redirect($redirecturl); 	
            }	
		} else {
			$clients = $this->Client_master->getClientdataByBranchid($_SESSION['branch_id']);
			//print_r($clients);exit;

			$branches = $this->Branch_master->getBranchAlldata();
			//print_r($branches);exit;

			$call_items = $this->Call_master->getCallItemmaster();
			//print_r($call_items);exit;

			$units = $this->Call_master->getUnitmaster();
			//print_r($units);exit;

			$manufacturer_data = $this->General_master->getManufacturerdata();
			//print_r($manufacturer_data);exit;

			$vendor_data = $this->General_master->getVendordata();
			//print_r($vendor_data);exit;

			$countries = $this->company_master->getCountries();
         //print_r($countries);exit;

			$data['clients_data'] = $clients;
			$data['branches_data'] = $branches;
			$data['call_items'] = $call_items;
			$data['units_data'] = $units;
			$data['manufacturer_data'] = $manufacturer_data;
			$data['vendor_data'] = $vendor_data;
			$data['countries'] = $countries;
			$data['title'] = 'RCAinet Tech - Login';
			$data['layout_body']='callgenerationregister';
	 		$this->load->view('admin/layout/main_app_call', $data);
		}


	}

	public function fetch_filebyclientid()
	{
		$this->load->model('File_master'); 
		
		echo $this ->File_master->fetch_filebyclientid($this->input->post('id'));

	}

	public function fetch_clientdetails()
	{
		$this->load->model('File_master'); 
		
		echo $this ->File_master->fetch_clientdetails($this->input->post('id'));

	}

	public function fetch_itemsubtype()
	{
		$this->load->model('Call_master'); 
		
		echo $this ->Call_master->fetch_itemsubtype($this->input->post('id'));

	}

	public function fetch_getitems()
	{
		$this->load->model('Call_master'); 
		
		echo $this ->Call_master->fetch_getitems($this->input->post('id'));

	}
	
}
