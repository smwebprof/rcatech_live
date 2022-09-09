
			
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Branch Master
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
								Form Stuff
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								Form Layouts
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
									 Form Actions
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
								<div class="portlet box red">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-reorder"></i>Branch Master Form
										</div>
										<div class="actions">
								<a href="<?php echo BASE_PATH; ?>viewbranchmaster" class="btn default yellow-stripe">
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
										 View Branches
									</span>
								</a>
								<?php /*<div class="btn-group">
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
												 Import Excel
											</a>
										</li>
										<li>
											<a href="#">
												 Import CSV
											</a>
										</li>
										<!--<li>
											<a href="#">
												 Export to XML
											</a>
										</li>
										<!--<li class="divider">
										</li>
										<li>
											<a href="#">
												 Print Invoices
											</a>
										</li>-->
									</ul>
								</div>*/ ?>
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
										<form action="" method="post" class="form-horizontal branchmaster-form">
											<?php
												   #print_r($data);
												   echo validation_errors();
												   if (isset($data['success']))
												   	echo '<p>'.@$data['success'].'</p>';
												   else 
												   	echo '<p>'.@$data['errors'].'</p>';	
											?>
											<div class="form-body">
												<h3 class="form-section">Branch Details</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Company Name*</label>
															<div class="col-md-9">
																<select class="form-control" name="company_name" id="company_name">
																<option value="">Select Company</option>	
																	<?php
													                $rows = $data['company_data'];

													                foreach($rows as $company_data){ 
													                	echo '<option value='.$company_data["id"].'>'.$company_data["name"].'</option>';

													                }	
																	?>
																</select>
																<span for="company_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Branch Name*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="branch_name" id="branch_name">
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
															<label class="control-label col-md-3">Branch Email*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="branch_email" id="branch_email">
																<span for="branch_email" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Branch Type*</label>
															<div class="col-md-9">
																<select class="form-control" name="branch_type" id="branch_type">
																	<option value="">Please Select</option>
																	<option value="Operating">Operating</option>
																	<option value="Non Operating">Non Operating</option>
																</select>
																<span for="branch_type" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Certificate Prefix*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="branch_cp" id="branch_cp">
																<span for="branch_cp" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Address*</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="branch_address" id="branch_address"></textarea>
																<span for="branch_address" class="help-block"></span>
															</div> 
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Bank Name*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="bank_name" id="bank_name">
																<span for="bank_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Bank Branch Name*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="bank_branch" id="bank_branch">
																<span for="bank_branch" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Bank Address*</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="bank_address" id="bank_address"></textarea>
																<span for="bank_address" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Bank Account No*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="bank_acct" id="bank_acct">
																<span for="bank_acct" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Ifsc Code*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="bank_ifsc" id="bank_ifsc">
																<span for="bank_ifsc" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Primary Email</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="primary_email" id="primary_email">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Secondary Email</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="secondary_email" id="secondary_email">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Invoice InCharge*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="invoice_incharge" id="invoice_incharge">
																<span for="invoice_incharge" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">GST_no</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="gst_no" id="gst_no">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">VAT_no</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="vat_no" id="vat_no">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Telephone No</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="bank_telno" id="bank_telno">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Mobile No</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="bank_mobile" id="bank_mobile">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Fax No</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder=""  name="bank_faxno" id="bank_faxno">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Tax Email</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder=""  name="bank_taxmail" id="bank_taxmail">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Tax Tech Email</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder=""   name="bank_techmail" id="bank_techmail">
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												
											</div>
											<div class="form-actions fluid">
												<div class="row">
													<div class="col-md-6">
														<div class="col-md-offset-9 col-md-9">
															<button type="submit" class="btn green">Submit</button>
															<a href="<?php echo BASE_PATH;?>viewbranchmaster"><button type="button" class="btn default">Cancel</button></a>
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

