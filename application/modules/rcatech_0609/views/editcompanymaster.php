
			
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Company Master
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
							<a href="index.html">
								Home
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								Masters
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								Edit Company Master
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
									 Company Master
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
											<i class="fa fa-reorder"></i>Company Master Form
										</div>
										<div class="actions">
								<a href="<?php echo BASE_PATH; ?>viewcompanymaster" class="btn default yellow-stripe">
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
										 View Companies
									</span>
								</a>
								<div class="btn-group">
									<!--<a class="btn default yellow-stripe" href="#" data-toggle="dropdown">
										<i class="fa fa-share"></i>
										<span class="hidden-480">
											 Tools
										</span>
										<i class="fa fa-angle-down"></i>
									</a>-->
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
								</div>
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
									<?php
									$rows = $company_data;
                                   	
									foreach($rows as $company_data){
								    ?>	
									<div class="portlet-body form">
										<!-- BEGIN FORM-->

										<form action="" method="post" class="form-horizontal companymaster-form">
									    <input type="hidden" class="form-control" name="form_action" value="update">
									    <input type="hidden" class="form-control" name="company_id" value="<?php echo $company_data['id']; ?>">
											<?php
												   #print_r($data);
												   echo validation_errors();
												   if (isset($data['success']))
												   	echo '<p>'.@$data['success'].'</p>';
												   else 
												   	echo '<p>'.@$data['errors'].'</p>';	
											?>
											<div class="form-body">
												<h3 class="form-section">Company Details</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Company Name*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="company_name" value="<?php echo $company_data['name']; ?>">
																<span for="company_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Address*</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="company_address"><?php echo $company_data['address']; ?></textarea>
																<span for="Address" class="help-block"></span>
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

													                	if ($countries["id"]==$company_data['countryid']) {
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
													                $rows = $data['states'];

													                foreach($rows as $states){ 
													                    if ($company_data['stateid']==$states["id"]) {
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
															<label class="control-label col-md-3">City*</label>
															<div class="col-md-9">
																<select class="form-control" name="company_city" id="company_city">
																<option value="">Select City</option>
																<?php
													                $rows = $data['cities'];

													                foreach($rows as $cities){ 
													                    if ($company_data['cityid']==$cities["id"]) {
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
															<label class="control-label col-md-3">Pincode*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="company_pincode" value="<?php echo $company_data['pincode']; ?>">
																<span for="company_pincode" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Telephone No*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="company_telno" value="<?php echo $company_data['telno']; ?>">
																<span for="company_telno" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Fax No</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="company_faxno" value="<?php echo $company_data['faxno']; ?>">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">GST no</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="company_gstno" value="<?php echo $company_data['gst_no']; ?>">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">VAT No</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="company_vatno" value="<?php echo $company_data['vat_no']; ?>">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">PAN no*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="company_panno" value="<?php echo $company_data['panno']; ?>">
																<span for="company_panno" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Cin</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="company_cinno" value="<?php echo $company_data['cin']; ?>">
															</div>
														</div>
													</div>
													<!--/span-->
												</div>

												<h3 class="form-section alert alert-info">Bank Details</h3>

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Bank Account Name</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="bank_account_name" id="bank_account_name" value="<?php echo $company_data['bank_account_name']; ?>">
																<span for="bank_account_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Bank Account Number</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="bank_account_number" id="bank_account_number" value="<?php echo $company_data['bank_account_no']; ?>">
																<span for="bank_account_number" class="help-block"></span>
															</div>
														</div>
													</div>
													
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Bank Address</label>
															<div class="col-md-9">
																<textarea class="form-control" placeholder="" name="bank_account_address" id="bank_account_address"><?php echo $company_data['bank_address']; ?></textarea>
																<span for="bank_address" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">iban</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="bank_iban" id="bank_iban" value="<?php echo $company_data['iban']; ?>">
																<span for="bank_iban" class="help-block"></span>
															</div>
														</div>
													</div>
													
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Bic</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="bank_bic" id="bank_bic" value="<?php echo $company_data['bic']; ?>">
																<span for="bank_bic" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Bank Cearing No</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="bank_cleaing_no" id="bank_cleaing_no" value="<?php echo $company_data['bank_cleaing_no']; ?>">
																<span for="bank_cleaing_no" class="help-block"></span>
															</div>
														</div>
													</div>
													
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Bank Beneficiary</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="bank_beneficiary" id="bank_beneficiary" value="<?php echo $company_data['bank_beneficiary']; ?>">
																<span for="bank_beneficiary" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<?php /*<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Bank Cearing No</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="bank_cleaing_no" id="bank_cleaing_no">
																<span for="bank_cleaing_no" class="help-block"></span>
															</div>
														</div>
													</div>*/ ?>
													
												</div>
												<!--/row-->
											<?php } ?>	
											</div>
											<div class="form-actions fluid">
												<div class="row">
													<div class="col-md-6">
														<div class="col-md-offset-9 col-md-9">
															<button type="submit" class="btn green">Submit</button>
															<a href="<?php echo BASE_PATH;?>viewcompanymaster"><button type="button" class="btn default">Cancel</button></a>
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

