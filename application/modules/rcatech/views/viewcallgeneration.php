
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Call Generation Register
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
							<a href="<?php echo BASE_PATH; ?>Viewfileregister">
								Call
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								View Call Generation Register
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
					<?php if (@$_GET['msg']==1) { echo '<font size="3" color="red">Data Saved Successfully!!!</font>'; } ?>
					<?php if (@$_GET['msg']==2) { echo '<font size="3" color="red">File Cannot Be Cancelled As Invoice is in Draft Mode!!!</font>'; } ?>
				</div>
			</div>
			<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
			<input type="hidden" name="viewfileregister" id="viewfileregister" value="viewfileregister">
			<input type="hidden" name="file_no_type" id="file_no_type" value="Single">	
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>View Call Generation Register
							</div>
							<div class="actions">
								<?php #if ($access_right['add_rights'] == 1) { ?>
								<?php 	
								$emp_status = array('SURVEYOR HEAD','EMPLOYEE'); 
								if (!in_array($_SESSION['employee_staff'], $emp_status)) { ?>
								<a href="<?php echo BASE_PATH; ?>Callgenerationregister" class="btn blue">
									<i class="fa fa-pencil"></i> New Call Generation 
								</a>
								<?php } ?>
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

						<div class="portlet-body">
							
							<?php /*<div class="table-toolbar">
								<div class="btn-group">
									<table>
										<tr>
											<td><label class="control-label col-md-6">Clients Name</label>
											</td>	
											<td>
											<select class="form-control input-large select2me" data-placeholder="Select..." name="clients_name" id="clients_name">
												<option value ="">Select Client Name</option>
												<?php	
												$rows = $clients_data;
												foreach($rows as $clients){
													echo '<option value="'.$clients["id"].'">'.$clients["client_name"].'</option>';
												}	
												?>	
											</select>
											</td>
										</tr>

									</table>
								</div>
								<div class="btn-group">
									<table>
										<tr>
											<td><label class="control-label col-md-6">File nos</label>
											</td>	
											<td><select class="form-control input-large select2me" data-placeholder="Select..." name="file_nos" id="file_nos">
																	<option value=""></option>
																	<?php
													                $rows = $file_nos;

													                foreach($rows as $file_nos){ 

													                	echo '<option value='.$file_nos["file_no"].'>'.$file_nos["file_no"].'</option>';

													                	
							
													                }	
																	?>
																</select>
											</td>
										</tr>

									</table>
								</div>								
								<div class="btn-group">
									<button type="submit" class="btn green">Submit</button>
								</div>
								<div class="btn-group">
									<button type="submit" class="btn yellow" name="submit" value="excel">View Excel Report</button>
								</div>
							</div>*/ ?>

							<table class="table table-striped table-bordered table-hover" id="sample_2">
				              <thead>
				              <tr>
				                <th>
				                   Sr.No.
				                </th>
				                <th>
				                   Call No.
				                </th>
				                <th>
				                   File No.
				                </th>
				                <th>
				                   Call Date
				                </th>
				                <th>
				                   Client Name
				                </th>
				                <th>
				                   Client Location
				                </th>
				                <th>
				                   Manufacturer Name
				                </th>
				                <th>
				                   End CLient Name
				                </th>
				                <th>
				                  NABCB Flag
				                </th>
				                <th>
				                   Status
				                </th>
				                <?php if ($access_right['edit_rights'] == 1) { ?>
				                <th>
				                   Call Schedule
				                </th>
				                <?php } ?>
				                <?php if ($access_right['edit_rights'] == 1) { ?>
				                <th>
				                   Call ReSchedule
				                </th>
				                <?php } ?>
				                <?php if ($access_right['edit_rights'] == 1) { ?>
				                <th>
				                   Call Cancel
				                </th>
				                <?php } ?>
				                <?php if ($access_right['edit_rights'] == 1) { ?>
				                <th>
				                   Add Inspector To Call
				                </th>
				                <?php } ?>
				                <?php /*if ($this->data['access_right']['delete_rights'] == 1) { ?>
				                <th>
				                   Delete
				                </th>
				                <?php } */ ?>
				                <?php /* if ($_SESSION['country_code']=='SG') { ?>
				                <th>
				                   Reports/Forms
				                </th>
				                <?php } */ ?>
				              </tr>  
				             </thead>
              				 <tbody> 
              					<?php 
					              $rows = $call_data;
					              $i=1;
					              foreach($rows as $call_data){
					              ?>
					                <tr class="odd gradeX">
					                  <td>
					                   <?php #echo $interaction_data['id']; ?>
					                   <?php echo $i; ?>
					                </td>
					                <td>
					                  <a href="<?php echo BASE_PATH; ?>fullviewfileregister?id=<?php echo base64_encode($call_data['id']); ?>"><?php echo $call_data['call_no']; ?></a>
					                </td>
					                <td>
					                   <a href="<?php echo BASE_PATH; ?>fullviewfileregister?id=<?php echo base64_encode($call_data['id']); ?>"><?php echo $call_data['file_no']; ?></a>
					                </td>					                
					                <td>
					                  <?php echo date("d-m-Y", strtotime($call_data['call_date'])); ?>
					                </td>
					                <td>
					                  <?php echo $call_data['client_name']; ?>
					                </td>
					                <td>
					                  <?php echo $call_data['city_id']; ?>
					                </td>
					                <td>
					                  <?php echo $call_data['manufacturer_info']; ?>
					                </td>
					                <td>
					                  <?php echo $call_data['end_client_info']; ?>
					                </td>
					                <td>
					                  <?php if ($call_data['nabcb_flag']==1) { echo 'Yes';} else { echo 'No';} ; ?>
					                </td>
					                <td class="center">
					                    <?php echo $call_data['status']; ?>
					                </td>
					                <?php if ($access_right['edit_rights'] == 1) { ?>
					                <td>
					                  <?php  $file_status = array('Scheduled','Completed','Cancelled','Inspection Started','Report Pending'); ?>
					                  <?php  if (!in_array($call_data['status'], $file_status)) { ?>
					                  <span class="label label-sm label-success">
					                     <a href="<?php echo BASE_PATH; ?>Callscheduleregister?id=<?php echo base64_encode($call_data['id']); ?>&fid=<?php echo base64_encode($call_data['file_id']); ?>"  style="color:#fff">Call Schedule</a>
					                  </span><br/><br/>
					                  <?php } ?>
					                </td>
					                <?php } ?>
					                <?php if ($access_right['edit_rights'] == 1) { ?>
					                <td>
					                  <?php  $file_status = array('Pending','Invoiced','Completed','Cancelled','Inspection Started','Report Pending'); ?>
					                  <?php  if (!in_array($call_data['status'], $file_status)) { ?>
					                  <span class="label label-sm label-info">
					                     <a href="<?php echo BASE_PATH; ?>Callrescheduleregister?id=<?php echo base64_encode($call_data['id']); ?>&fid=<?php echo base64_encode($call_data['file_id']); ?>"  style="color:#fff">Call ReSchedule<</a>
					                  </span><br/><br/>
					                  <?php } ?>
					                </td>
					                <?php } ?>
					                <?php if ($access_right['edit_rights'] == 1) { ?>
					                <td>
					                  <?php  $file_status = array('Pending','Invoiced','Completed','Cancelled','Inspection Started','Report Pending'); ?>
					                  <?php  if (!in_array($call_data['status'], $file_status)) { ?>
					                  <span class="label label-sm label-danger">
					                     <a href="<?php echo BASE_PATH; ?>Callcancelregister?id=<?php echo base64_encode($call_data['id']); ?>&fid=<?php echo base64_encode($call_data['file_id']); ?>"  style="color:#fff">Call Cancel</a>
					                  </span><br/><br/>
					                  <?php } ?>
					                </td>
					                <?php } ?>
					                <?php if ($access_right['edit_rights'] == 1) { ?>
					                <td>
					                  <?php  $file_status = array('Pending','Invoiced','Completed','Cancelled','Inspection Started','Report Pending'); ?>
					                  <?php  if (!in_array($call_data['status'], $file_status)) { ?>
					                  <span class="label label-sm label-info">
					                     <a href="<?php echo BASE_PATH; ?>Addinspectortocallregister?id=<?php echo base64_encode($call_data['id']); ?>&fid=<?php echo base64_encode($call_data['file_id']); ?>"  style="color:#fff">Add Inspector</a>
					                  </span><br/><br/>
					                  <?php } ?>
					                </td>
					                <?php } ?>
					                <?php /* if ($this->data['access_right']['delete_rights'] == 1) { ?>
					                <td>
					                  <?php  $file_status = array('Invoiced','Completed'); ?>
					                  <?php  if (!in_array($file_data['status'], $file_status)) { ?>
					                  <span class="label label-sm label-danger">
					                     <a href="<?php echo BASE_PATH; ?>delfileregister?id=<?php echo base64_encode($file_data['id']); ?>"  style="color:#fff">Delete</a>
					                  </span>
					                  <?php } ?>
					                </td>
					                <?php } */ ?>
					                <?php /* if ($_SESSION['country_code']=='SG') { ?>
					                <td class="center">
					                    <span class="label label-sm label-success">
					                     <a href="<?php echo BASE_PATH; ?>Viewreportformats?id=<?php echo base64_encode($file_data['id']); ?>"  style="color:#fff">Download/Upload Forms</a>
					                  </span>
					                </td>
					                <?php } */ ?>
					              </tr> 

					              <?php
					              $i=$i+1;
					                }
					              ?>
					              
					              </tbody>
              				</table>
						</div>
					</div>
			
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
				<div class="col-md-6 col-sm-12">
					
				</div>
			</div>
		</form>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
