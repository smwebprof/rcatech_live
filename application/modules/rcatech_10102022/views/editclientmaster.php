
			
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Client Master
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<!--<li class="btn-group">
							<button type="button" class="btn blue dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
							<span>
								Actions
							</span>
							<i class="fa fa-angle-down"></i>
							</button>
							<ul class="dropdown-menu pull-right" role="menu">
								<li>
									<a href="#">
										Action
									</a>
								</li>
								<li>
									<a href="#">
										Another action
									</a>
								</li>
								<li>
									<a href="#">
										Something else here
									</a>
								</li>
								<li class="divider">
								</li>
								<li>
									<a href="#">
										Separated link
									</a>
								</li>
							</ul>
						</li>-->
						<li>
							<i class="fa fa-home"></i>
							<a href="<?php echo BASE_PATH; ?>dashboard">
								Home
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="<?php echo BASE_PATH; ?>viewclientmaster">
								Client Master
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								Addclientmaster
							</a>
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<div class="tabbable tabbable-custom boxless tabbable-reversed">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#tab_0" data-toggle="tab">
									 Add Clients
								</a>
							</li>
							<!--<li>
								<a href="#tab_1" data-toggle="tab">
									 2 Columns
								</a>
							</li>
							<li>
								<a href="#tab_2" data-toggle="tab">
									 2 Columns Horizontal
								</a>
							</li>
							<li>
								<a href="#tab_3" data-toggle="tab">
									 2 Columns View Only
								</a>
							</li>
							<li>
								<a href="#tab_4" data-toggle="tab">
									 Row Seperated
								</a>
							</li>
							<li>
								<a href="#tab_5" data-toggle="tab">
									 Bordered
								</a>
							</li>
							<li>
								<a href="#tab_6" data-toggle="tab">
									 Row Stripped
								</a>
							</li>
							<li>
								<a href="#tab_7" data-toggle="tab">
									 Label Stripped
								</a>
							</li>-->
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_0">
								<div class="portlet box blue">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-reorder"></i>Client Master Form
										</div>
										<div class="actions">
								<a href="<?php echo BASE_PATH; ?>viewclientmaster" class="btn default yellow-stripe">
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
										 View Clients
									</span>
								</a>
								<!--<div class="btn-group">
									<a class="btn default yellow-stripe" href="#" data-toggle="dropdown">
										<i class="fa fa-share"></i>
										<span class="hidden-480">
											 Tools
										</span>
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="dropdown-menu pull-right">
										<li>
											<a href="#">
												 Export to Excel
											</a>
										</li>
										<li>
											<a href="#">
												 Export to CSV
											</a>
										</li>
										<li>
											<a href="#">
												 Export to XML
											</a>
										</li>
										<li class="divider">
										</li>
										<li>
											<a href="#">
												 Print Invoices
											</a>
										</li>
									</ul>
								</div>-->
							</div>
										<!--<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
											<a href="#portlet-config" data-toggle="modal" class="config">
											</a>
											<a href="javascript:;" class="reload">
											</a>
											<a href="javascript:;" class="remove">
											</a>
										</div>-->
									</div>

									<div class="portlet-body form">
										<!-- BEGIN FORM-->

										<form action="" method="post" class="form-horizontal clientmaster-form">
											<?php
												   #print_r($data);
												   echo validation_errors();
												   if (isset($success))
												   	echo '<p>'.@$success.'</p>';
												   else 
												   	echo '<p>'.@$errors.'</p>';	
											?>
											<div class="form-body">
												<h3 class="form-section">Client Details</h3>
												<?php $rows = $client_data;
											
												foreach($rows as $client_data){
												?>
												<input type="hidden" name="id" id="id" value="<?php echo $client_data['id']; ?>">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"> For Company*</label>
															<div class="col-md-9">
																<select class="form-control" name="user_company" id="user_company">
																<option value="">Select Company</option>
																	<?php
													                $rows = $company_data;

													                foreach($rows as $company_data){ 
													                if ($company_data["id"]==$client_data['comp_id']) {	
													                	echo '<option value='.$company_data["id"].' selected>'.$company_data["name"].'</option>';
													                }	

													                }	
																	?>
																</select>
																<span for="user_company" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Branch Name*</label>
															<div class="col-md-9">
																<select class="form-control" name="branch_name" id="branch_name">
																<option value="">Select Branch Name</option>
																	<?php
													                $rows = $branchs_data;

													                foreach($rows as $branchs_data){ 
													                if ($branchs_data["id"]==$client_data['branch_id']) {	
													                	echo '<option value='.$branchs_data["id"].' selected>'.$branchs_data["branch_name"].'</option>';
													                } else {
													                	echo '<option value='.$branchs_data["id"].'>'.$branchs_data["branch_name"].'</option>';
													                }	

													                }	
																	?>
																</select>
																<span for="branch_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													
													
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Client Name*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="client_name" id="client_name" value="<?php echo $client_data['client_name']; ?>">
																<span for="client_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Client Type*</label>
															<div class="col-md-9">
																<select class="form-control" name="client_type" id="client_type">
																	<option value="">Please Select</option>
																	<option value="Client" <?php if ($client_data['client_type']=='Client') { echo 'selected'; } ?>>Client</option>
																	<option value="Creditor" <?php if ($client_data['client_type']=='Creditor') { echo 'selected'; } ?>>Creditor</option>
																	<option value="Foreign" <?php if ($client_data['client_type']=='Foreign') { echo 'selected'; } ?>>Foreign</option>
																</select>
																<span for="client_type" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Client ShortName</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="client_shortname" id="client_shortname" value="<?php echo $client_data['client_shortname']; ?>">
																<span for="client_shortname" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Address*</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="client_address" id="client_address"><?php echo $client_data['address']; ?></textarea>
																<span for="client_address" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Country*</label>
															<div class="col-md-9">
																<select class="form-control" name="company_country" id="company_country">
																<option value="">Select Country</option>	
																	<?php
													                $rows = $countries;

													                foreach($rows as $countries){ 
													                if ($countries["id"]==$client_data['country_id']) {		
													                	echo '<option value='.$countries["id"].' selected>'.$countries["name"].'</option>';
													                	} else {
													                		echo '<option value='.$countries["id"].'>'.$countries["name"].'</option>';	
													                	}
													                }	
																	?>
																</select>
																<span for="company_country" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">State*</label>
															<div class="col-md-9">
																<select class="form-control" name="company_state" id="company_state">
																<option value="">Select State</option>
																<?php
													                $rows = $states;

													                foreach($rows as $states){ 
													                if ($states["id"]==$client_data['state_id']) {		
													                	echo '<option value='.$states["id"].' selected>'.$states["name"].'</option>';
													                	} else {
													                		echo '<option value='.$states["id"].'>'.$states["name"].'</option>';	
													                	}
													                }	
																	?>
																</select>
																<span for="company_state" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">City/Location*</label>
															<div class="col-md-9">
																<select class="form-control" name="company_city" id="company_city">
																<option value="">Select City</option>
																<?php
													                $rows = $cities;

													                foreach($rows as $cities){ 
													                if ($cities["id"]==$client_data['city_id']) {		
													                	echo '<option value='.$cities["id"].' selected>'.$cities["name"].'</option>';
													                	} else {
													                		echo '<option value='.$cities["id"].'>'.$cities["name"].'</option>';	
													                	}
													                }	
																	?>
																</select>
																<span for="company_city" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Postal Code*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="postal_code" id="postal_code" value="<?php echo $client_data['zip_pin_code']; ?>">
																<span for="postal_code" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->

												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Telephone No*</label>
															<div class="col-md-9">
																<label class="checkbox-inline">
																	<input type="number" class="form-control" id="client_tel_prefix" name="client_tel_prefix" value="<?php echo $client_data['country_code']; ?>" placeholder="Country Code" style="width:70px;" readonly></label>
																	<label class="checkbox-inline">
																	<input type="text" class="form-control" name="client_tel" id="client_tel" value="<?php echo $client_data['tel_no']; ?>" placeholder="Telephone No">
																	</label>
																<span for="client_tel" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Mobile No</label>
															<div class="col-md-9">
																<label class="checkbox-inline">
																	<input type="number" class="form-control" id="client_mobile_prefix" name="client_mobile_prefix" value="<?php echo $client_data['country_code']; ?>" placeholder="Country Code" style="width:70px;" readonly></label>
																	<label class="checkbox-inline">
																	<input type="text" class="form-control" name="client_mobile" id="client_mobile" value="<?php echo $client_data['mobile_no']; ?>" placeholder="Telephone No" maxlength="10">
																	</label>
																<span for="client_mobile" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Email Address*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="client_email" id="client_email" value="<?php echo $client_data['email_address']; ?>">
																<span for="client_email" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">GST No*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="client_gst" id="client_gst" value="<?php echo $client_data['gst_no']; ?>">
																<span for="client_gst" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">GST Legal Name</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="client_gst_legal" id="client_gst_legal" value="<?php echo $client_data['client_gst_legal']; ?>">
																<span for="client_gst_legal" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">GST Payable</label>
															<div class="col-md-9">
																<select class="form-control" name="client_gst_pay" id="client_gst_pay">
																	<option value="">Please Select</option>
																	<option value="Monthly" <?php if ($client_data['client_gst_pay']=='Monthly') { echo 'selected'; } ?>>Monthly</option>
																	<option value="Quartely" <?php if ($client_data['client_gst_pay']=='Quartely') { echo 'selected'; } ?>>Quartely</option>
																	<option value="Yearly" <?php if ($client_data['client_gst_pay']=='Yearly') { echo 'selected'; } ?>>Yearly</option>
																	<option value="Composite" <?php if ($client_data['client_gst_pay']=='Composite') { echo 'selected'; } ?>>Composite</option>
																 </select>	
																<span for="client_gst_pay" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">GST Options</label>
															<div class="col-md-9">
																<select class="form-control" name="client_gst_options" id="client_gst_options">
																	<option value="">Please Select</option>
																	<option value="Registered" <?php if ($client_data['client_gst_options']=='Registered') { echo 'selected'; } ?>>Registered</option>
																	<option value="Unregistered" <?php if ($client_data['client_gst_options']=='Unregistered') { echo 'selected'; } ?>>Unregistered</option>
																 </select>	
																<span for="client_gst_options" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Date of Email</label>
															<div class="col-md-9">
																<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="-6m" data-date-end-date="0d">
																<input type="text" class="form-control" name="gst_email_date" id="gst_email_date" value="<?php echo date('d-m-Y'); ?>" readonly>
																<span for="gst_email_date" class="help-block"></span>
																<span class="input-group-btn">
																<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																</span>

																</div>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">GSTREGTYPE</label>
															<div class="col-md-9">
																<select class="form-control" name="client_gst_type" id="client_gst_type">
																	<option value="">Please Select</option>
																	<option value="Regular" <?php if ($client_data['client_gst_type']=='Regular') { echo 'selected'; } ?>>Regular</option>
																	<option value="Tax Deductor" <?php if ($client_data['client_gst_type']=='Tax Deductor') { echo 'selected'; } ?>>Tax Deductor</option>
																	<option value="SEZ Supplies with Payment" <?php if ($client_data['client_gst_type']=='SEZ Supplies with Payment') { echo 'selected'; } ?>>SEZ Supplies with Payment</option>
																	<option value="SEZ Supplies without Payment" <?php if ($client_data['client_gst_type']=='SEZ Supplies without Payment') { echo 'selected'; } ?>>SEZ Supplies without Payment</option>
																	<option value="Composition" <?php if ($client_data['client_gst_type']=='Composition') { echo 'selected'; } ?>>Composition</option>
																 </select>	
																<span for="client_gst_type" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Upload GSTReg.Cert</label>
															<div class="col-md-9">
																<input type="file" id='upl_gst_type' name="upl_gst_type">
																	 <span>*Only pdf,doc,xls accepted</span>
																<span for="upl_gst_type" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">PAN No*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="client_pan" id="client_pan" value="<?php echo $client_data['pan_no']; ?>">
																<span for="client_pan" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">VAT No</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="client_vat" id="client_vat" value="<?php echo $client_data['vat_no']; ?>">
																<span for="client_vat" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">TAN No*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="client_tan" id="client_tan" value="<?php echo $client_data['tan_no']; ?>">
																<span for="client_tan" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Firm Type*</label>
															<div class="col-md-9">
																
																<select class="form-control" name="client_firm" id="client_firm">
																	<option value="">Please Select</option>
																	<option value="Proprietor" <?php if ($client_data['firm_type']=='Proprietor') { echo 'selected';} ?>>Proprietor</option>
																	<option value="Private" <?php if ($client_data['firm_type']=='Private') { echo 'selected';} ?>>Private</option>
																	<option value="Public" <?php if ($client_data['firm_type']=='Public') { echo 'selected';} ?>>Public</option>
																	<option value="PrivateIndividual" <?php if ($client_data['firm_type']=='PrivateIndividual') { echo 'selected';} ?>>PrivateIndividual</option>
																	<option value="LLP" <?php if ($client_data['firm_type']=='LLP') { echo 'selected';} ?>>LLP</option>
																	<option value="Enterprises" <?php if ($client_data['firm_type']=='Enterprises') { echo 'selected';} ?>>Enterprises</option>
																	<option value="Government" <?php if ($client_data['firm_type']=='Government') { echo 'selected';} ?>>Government</option>
																	<option value="Trust" <?php if ($client_data['firm_type']=='Trust') { echo 'selected';} ?>>Trust</option>
																	<option value="Partnership" <?php if ($client_data['firm_type']=='Partnership') { echo 'selected';} ?>>Partnership</option>
																	<option value="Statutory Body" <?php if ($client_data['firm_type']=='Statutory Body') { echo 'selected';} ?>>Statutory Body</option>
																	<option value="Banking and Financial Services" <?php if ($client_data['firm_type']=='Banking and Financial Services') { echo 'selected';} ?>>Banking and Financial Services</option>
																	<option value="Hindu Undivided Family" <?php if ($client_data['firm_type']=='Hindu Undivided Family') { echo 'selected';} ?>>Hindu Undivided Family</option>
																	<option value="Co-operative Society" <?php if ($client_data['firm_type']=='Co-operative Society') { echo 'selected';} ?>>Co-operative Society</option>
																	<option value="Joint Ventures" <?php if ($client_data['firm_type']=='Joint Ventures') { echo 'selected';} ?>>Joint Ventures</option>
																	<option value="Others" <?php if ($client_data['firm_type']=='Others') { echo 'selected';} ?>>Others</option>
																</select>
																<span for="client_firm" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->

												<?php /*<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Mobile No</label>
															<div class="col-md-9">
																<label class="checkbox-inline">
																	<input type="number" class="form-control" id="client_mobile_prefix" name="client_mobile_prefix" placeholder="Country Code" style="width:70px;" readonly></label>
																	<label class="checkbox-inline">
																	<input type="text" class="form-control" name="client_mobile" id="client_mobile" placeholder="Telephone No" maxlength="10">
																	</label>
																<span for="client_mobile" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Firm Type*</label>
															<div class="col-md-9">
																
																<select class="form-control" name="client_firm" id="client_firm">
																	<option value="">Please Select</option>
																	<option value="Proprietor">Proprietor</option>
																	<option value="Private">Private</option>
																	<option value="Public">Public</option>
																	<option value="PrivateIndividual">PrivateIndividual</option>
																	<option value="LLP">LLP</option>
																	<option value="Enterprises">Enterprises</option>
																	<option value="Government">Government</option>
																	<option value="Trust">Trust</option>
																	<option value="Partnership">Partnership</option>
																	<option value="Statutory Body">Statutory Body</option>
																	<option value="Banking and Financial Services">Banking and Financial Services</option>
																	<!--<option value="Hindu Undivided Family">Hindu Undivided Family</option>-->
																	<option value="Co-operative Society">Co-operative Society</option>
																	<option value="Joint Ventures">Joint Ventures</option>
																	<option value="Others">Others</option>
																</select>
																<span for="client_firm" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->*/ ?>

											</div>

											<h3 class="form-section alert alert-info">Contact Details</h3>

												<!--/row-->
												<div class="row">
													<div class="col-md-12">
														<div class="portlet-body">
													
														<div class="table-scrollable">
															<div id="field_parameter_div">
															<table class="table table-bordered table-hover">
															<thead>
															<tr>
																<th>
																	 Prefix
																</th>
																<th>
																	 Contact Person Name
																</th>	
																<th>
																	 Mobile No
																</th>
																<th>
																	 Email Address
																</th>
																<th>
																	 Primary/Secondary
																</th>
															</tr>
															</thead>
															<tbody>
															<tr class="active">
																<td>
																	 <select class="form-control" name="div_contact_prefix[]" id="div1_contact_prefix">
																	 <option value="">Please Select</option>
																	 <option value="Mr">Mr</option>
																	 <option value="Miss">Miss</option>
																	 </select>
																</td>
																<td>
																	<input type="text" class="form-control input-medium" id="div1_contact_name" name="div_contact_name[]" value="">
																</td>		
																<td>
																	<input type="text" class="form-control input-medium" id="div1_contact_mobile" name="div_contact_mobile[]" value="">
																	<label class="checkbox-inline">
																</td>	
																<td>
																	 <input type="text" class="form-control input-medium" placeholder="" name="div_contact_email[]" id="div1_contact_email" value="" >
																</td>
																<td>
																	 <select class="form-control" name="div_contact_type[]" id="div1_contact_type">
																	 <option value="">Please Select</option>
																	 <option value="Primary">Primary</option>
																	 <option value="Secondary">Secondary</option>
																	 </select>
																</td>
															</tr>
															<tr class="active">
																<td>
																	 <select class="form-control" name="div_contact_prefix[]" id="div2_contact_prefix">
																	 <option value="">Please Select</option>
																	 <option value="Mr">Mr</option>
																	 <option value="Miss">Miss</option>
																	 </select>
																</td>
																<td>
																	<input type="text" class="form-control input-medium" id="div2_contact_name" name="div_contact_name[]" value="">
																</td>		
																<td>

																	<input type="text" class="form-control input-medium" id="div2_contact_mobile" name="div_contact_mobile[]" value="">
																</td>	
																<td>
																	 <input type="text" class="form-control input-medium" placeholder="" name="div_contact_email[]" id="div2_contact_email" value="" >
																</td>
																<td>
																	 <select class="form-control" name="div_contact_type[]" id="div2_contact_type">
																	 <option value="">Please Select</option>
																	 <option value="Primary">Primary</option>
																	 <option value="Secondary">Secondary</option>
																	 </select>
																</td>
															</tr>
															<tr class="active">
																<td>
																	 <select class="form-control" name="div_contact_prefix[]" id="div3_contact_prefix">
																	 <option value="">Please Select</option>
																	 <option value="Mr">Mr</option>
																	 <option value="Miss">Miss</option>
																	 </select>
																</td>
																<td>
																	<input type="text" class="form-control input-medium" id="div3_contact_name" name="div_contact_name[]" value="">
																</td>	
																<td>
																	<input type="text" class="form-control input-medium" id="div3_contact_mobile" name="div_contact_mobile[]" value="">
																</td>	
																<td>
																	 <input type="text" class="form-control input-medium" placeholder="" name="div_contact_email[]" id="div3_contact_email" value="" >
																</td>
																<td>
																	 <select class="form-control" name="div_contact_type[]" id="div3_contact_type">
																	 <option value="">Please Select</option>
																	 <option value="Primary">Primary</option>
																	 <option value="Secondary">Secondary</option>
																	 </select>
																</td>
															</tr>
															
															
															</tbody>
															</table>
															</div>
														</div>
													</div>
																				</div>
																			</div>
											<?php
											}
											?>

											<div class="form-actions fluid">
												<div class="row">
													<div class="col-md-6">
														<div class="col-md-offset-9 col-md-9">
															<button type="submit" class="btn green">Submit</button>
															<a href="<?php echo BASE_PATH;?>viewclientmaster"><button type="button" class="btn default">Cancel</button></a>
														</div>
													</div>
													<div class="col-md-6">
													</div>
												</div>
											</div>
										</form>
										<!-- END FORM-->
									</div>
								</div>
								
								
								
									
								</div>
							</div>
							
							
							
							
						</div>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT-->
			</div>
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

