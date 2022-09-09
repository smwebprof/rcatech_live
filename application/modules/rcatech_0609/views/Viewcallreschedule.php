
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Call ReSchedule Register
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
								View Call ReSchedule Register
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
								<i class="fa fa-user"></i>View Call ReSchedule Register
							</div>
							<div class="actions">
								<?php if ($access_right['add_rights'] == 1) { ?>
								<a href="<?php echo BASE_PATH; ?>Callrescheduleregister" class="btn blue">
									<i class="fa fa-pencil"></i> New Call ReSchedule 
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
							<div class="table-toolbar">
								<div class="btn-group">
									<label class="control-label col-md-3">From Date</label>
									<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="-6m">
									<input type="text" class="form-control" name="file_from_date" id="file_from_date" value="<?php if (@$file_from_date) { echo $file_from_date; } /* else { echo date('d-m-Y'); }*/ ?>"readonly>
									<span for="file_date" class="help-block"></span>
									<span class="input-group-btn">
									<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
									</span>
									</div>
								</div>
								<div class="btn-group">
									<label class="control-label col-md-3">To Date</label>
									<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="-6m">
									<input type="text" class="form-control" name="file_To_date" id="file_To_date" value="<?php if (@$file_To_date) { echo $file_To_date; } /* else { echo date('d-m-Y'); } */ ?>"readonly>
									<span for="file_date" class="help-block"></span>
									<span class="input-group-btn">
									<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
									</span>
									</div>
								</div>
								<div class="btn-group">
									<label class="control-label col-md-6">Status</label>
									<div class="input-group">
									<select class="form-control" id="status" name="status">
										<option value ="">Select</option>
										<option value ="Pending" <?php if (@$status == 'Pending') { echo 'selected'; } ?>>Pending</option>
										<option value ="Running" <?php if (@$status == 'Running') { echo 'selected'; } ?>>Running</option>
										<option value ="Invoiced" <?php if (@$status == 'Invoiced') { echo 'selected'; } ?>>Invoiced</option>
										<option value ="Completed" <?php if (@$status == 'Completed') { echo 'selected'; } ?>>Completed</option>
										<option value ="Cancelled" <?php if (@$status == 'Cancelled') { echo 'selected'; } ?>>Cancel</option>
									</select>
									</div>							
								</div>&nbsp;&nbsp;&nbsp;
								<div class="btn-group">
									<?php /*<label class="control-label col-md-6">Vessel Name</label>*/ ?>
									<div class="input-group">
									<select class="form-control input-medium select2me" data-placeholder="Select..." name="vessel_name" id="vessel_name">
										<option value ="">Select Work Order</option>
										<?php	
										$rows = $work_types;
										foreach($rows as $types){
											echo '<option value="'.$types["work_name"].'">'.$types["work_name"].'</option>';
										}	
										?>
									</select>
									</div>							
								</div>
								<!--<div class="btn-group">
									<button type="submit" class="btn green">Submit</button>
								</div>-->
							</div>
							<div class="table-toolbar">
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
							</div>

							<table class="table table-striped table-bordered table-hover" id="sample_2">
				              <thead>
				              <tr>
				                <th>
				                   Sr.No.
				                </th>
				                <th>
				                   File No.
				                </th>
				                <th>
				                   Call No.
				                </th>
				                <th>
				                   Call Creation Date.
				                </th>
				                <th>
				                   Schedule From Date
				                </th>
				                <th>
				                   Schedule To Date
				                </th>
				                <th>
				                   Engineer Name
				                </th>
				                <th>
				                   Status
				                </th>
				                <?php if ($access_right['edit_rights'] == 1) { ?>
				                <th>
				                   Edit
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
					                   <a href="<?php echo BASE_PATH; ?>fullviewfileregister?id=<?php echo base64_encode($call_data['id']); ?>"><?php echo $call_data['file_no']; ?></a>
					                </td>
					                <td>
					                  <?php echo $call_data['call_no']; ?>
					                </td>
					                <td>
					                  <?php echo date("d-m-Y", strtotime($call_data['entry_date'])); ?>
					                </td>
					                <td>
					                  <?php echo $call_data['call_from_date']; ?>
					                </td>
					                <td>
					                  <?php echo $call_data['call_to_date']; ?>
					                </td>
					                <td>
					                  <?php echo $call_data['first_name']." ".$call_data['last_name']; ?>
					                </td>					               
					                <td class="center">
					                    <?php echo $call_data['status']; ?>
					                </td>
					                <?php if ($access_right['edit_rights'] == 1) { ?>
					                <td>
					                  <?php  $file_status = array('Invoiced','Completed','Cancelled'); ?>
					                  <?php  if (!in_array($call_data['status'], $file_status)) { ?>
					                  <span class="label label-sm label-success">
					                     <a href="<?php echo BASE_PATH; ?>editfileregister?id=<?php echo base64_encode($call_data['id']); ?>"  style="color:#fff">Edit</a>
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
