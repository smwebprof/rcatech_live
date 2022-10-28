
			
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Full View Client Master
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
								Full View Client Master
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
									 Full View Client Master
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
								<!-- Start PORTLET-->
								<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>Client Details
							</div>
							<!--<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
							</div>-->
							<div class="actions">
								<a href="<?php echo BASE_PATH; ?>viewclientmaster" class="btn default yellow-stripe">
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
										 View Clients
									</span>
								</a>
								<!--<a href="#" class="btn red">
									<i class="fa fa-pencil"></i> Print To PDF 
								</a>-->
								<!--<div class="btn-group">
									<a class="btn green" href="#" data-toggle="dropdown">
										<i class="fa fa-cogs"></i> Tools <i class="fa fa-angle-down"></i>
									</a>
									<ul class="dropdown-menu pull-right">
										<li>
											<a href="#">
												<i class="fa fa-pencil"></i> Edit
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-trash-o"></i> Delete
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-ban"></i> Ban
											</a>
										</li>
										<li class="divider">
										</li>
										<li>
											<a href="#">
												<i class="i"></i> Make admin
											</a>
										</li>
									</ul>
								</div>-->
							</div>
						</div>
						<?php $rows = $client_data;
											
						foreach($rows as $client_data){
						?>
						<div class="portlet-body">
							<table class="table table-hover table-striped table-bordered">
							<tr>
								<td width="50%">
									 <strong>For Company</strong>
								</td>
								<td>
									<select class="form-control" name="user_company" id="user_company">
									<?php
									$rows = $company_data;

									foreach($rows as $company_data){ 
										if ($client_data['comp_id']==$company_data["id"]) {
											echo '<option value='.$company_data["id"].' selected>'.$company_data["name"].'</option>';
										} 
									}	
									?>
									</select>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Branch Name</strong>
								</td>
								<td>
									<select class="form-control input-large select2me" data-placeholder="Select..." name="branch_name" id="branch_name">
											<?php
											$rows = $branchs_data;

											foreach($rows as $branchs_data){ 
											if ($client_data['branch_id']==$branchs_data["id"]) {
												echo '<option value='.$branchs_data["id"].' selected>'.$branchs_data["branch_name"].'</option>';
												} 

											}	
											?>


									</select>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Client Name</strong>
								</td>
								<td>
									&nbsp;&nbsp;<?php echo $client_data['client_name']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Client Location</strong>
								</td>
								<td>
									&nbsp;&nbsp;<?php echo $client_data['client_location']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Client Type</strong>
								</td>
								<td>
									&nbsp;&nbsp;<?php echo $client_data['client_type']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Address</strong>
								</td>
								<td>
									&nbsp;&nbsp;<?php echo $client_data['address']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Country</strong>
								</td>
								<td>
									<select class="form-control" name="company_country" id="company_country">
																	<?php
													                $rows = $countries;
													                //print_r($rows);
													                foreach($rows as $countries){ 
													                    if ($client_data['country_id']==$countries["id"]) {
													                    	echo '<option value='.$countries["id"].' selected>'.$countries["name"].'</option>';
													                    } 

													                }	
																	?>
																</select>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>State</strong>
								</td>
								<td>
									<select class="form-control" name="company_state" id="company_state">
																<?php
													                $rows = $states;

													                foreach($rows as $states){ 
													                    if ($client_data['state_id']==$states["id"]) {
													                    	echo '<option value='.$states["id"].' selected>'.$states["name"].'</option>';
													                    } 

													                }	
																?>
																</select>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>City</strong>
								</td>
								<td>
									<select class="form-control" name="company_city" id="company_city">
																<?php
													                $rows = $cities;

													                foreach($rows as $cities){ 
													                    if ($client_data['city_id']==$cities["id"]) {
													                    	echo '<option value='.$cities["id"].' selected>'.$cities["name"].'</option>';
													                    } 

													                }	
																?>
																</select>
								</td>
							</tr>

							<tr>
								<td>
									 <strong>Postal Code</strong>
								</td>
								<td>
									&nbsp;&nbsp;<?php echo $client_data['zip_pin_code']; ?>
								</td>
							</tr>

							<tr>
								<td>
									 <strong>Telephone No</strong>
								</td>
								<td>
									&nbsp;&nbsp;<?php echo $client_data['country_code']; ?> <?php echo $client_data['tel_no']; ?>
								</td>
							</tr>

							<tr>
								<td>
									 <strong>Email Address</strong>
								</td>
								<td>
									&nbsp;&nbsp;<?php echo $client_data['email_address']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>GST No</strong>
								</td>
								<td>
									&nbsp;&nbsp;<?php echo $client_data['gst_no']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>GST Certificate</strong>
								</td>
								<td>
									&nbsp;&nbsp;<a href="<?php echo $client_data['upl_gst_type']; ?>" target="_blank"><?php echo $client_data['upl_gst_type']; ?></a>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>VAT No</strong>
								</td>
								<td>
									&nbsp;&nbsp;<?php echo $client_data['vat_no']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>PAN No</strong>
								</td>
								<td>
									&nbsp;&nbsp;<?php echo $client_data['pan']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>TAN No</strong>
								</td>
								<td>
									&nbsp;&nbsp;<?php echo $client_data['tan_no']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Mobile No</strong>
								</td>
								<td>
									&nbsp;&nbsp;<?php echo $client_data['country_code']; ?> <?php echo $client_data['mobile_no']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Firm Type</strong>
								</td>
								<td>
									&nbsp;&nbsp;<?php echo $client_data['firm_type']; ?>
								</td>
							</tr>
							</table>
						</div>
					</div>
					<!-- END PORTLET-->

					
					<?php
				    }
				    ?>

				    <h3 class="form-section alert alert-info">Client Details</h3>

											<div class="row">
													<div class="col-md-12">
														<div class="portlet-body">
														<div class="table-responsive">
															<div id="field_parameter_div">
															<table class="table table-bordered table-hover">
															<thead>
															<tr>
																<th>
																	 Prefix
																</th>
																<th>
																	 Client Name
																</th>
																<th>
																	 Mobile No
																</th>
																<th>
																	 Email
																</th>
																<th>
																	 Type
																</th>
															</tr>
															</thead>
															<tbody>
																<?php foreach($client_details as $rows) {  ?>
																<tr class="active">
																<td>
																	 <?php echo $rows['prefix']; ?>
																</td>
																<td>
																	 <?php echo $rows['contact_person_name']; ?>
																</td>
																<td>
																	<?php echo $rows['mobile_no']; ?> 
																</td>
																<td>
																	<?php echo $rows['email_address']; ?> 
																</td>
																<td>
																	<?php echo $rows['type']; ?> 
																</td>
																</tr>
															<?php } ?>
															</tbody>
															</table>
														</div>
														</div>
											</div>
											</div>
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

