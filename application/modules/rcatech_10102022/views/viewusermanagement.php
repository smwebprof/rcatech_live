
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>View User Management
							</div>
							<div class="actions">
								<a href="<?php echo BASE_PATH; ?>Adduseremployeedetails" class="btn blue">
									<i class="fa fa-pencil"></i> Add New User
								</a>
								
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
							<table class="table table-striped table-bordered table-hover" id="sample_2">
							<thead>
							<tr>
								<th>
									 Sr.No.
								</th>
								<th>
									 Name
								</th>
								<th>
									 Emp Code
								</th>
								<th>
									 Office Email 
								</th>
								<th>
									 Personal Email
								</th>
								<th>
									 User Role
								</th>
								<th style="width:150px;">
									 
								</th>
							</tr>
							</thead>
							<tbody>
							<?php	
							$rows = $user_data;
							$i=1;
							foreach($rows as $user_data){
							?>
						    <tr class="odd gradeX">
						    	<td>
									 <?php echo $i; ?>
								</td>
								<td>
									 <a href="<?php echo BASE_PATH; ?>fullviewusermanagement?id=<?php echo base64_encode($user_data['id']); ?>"><?php echo $user_data['first_name']; ?></a>
								</td>
								<td>
									<a href="<?php echo BASE_PATH; ?>fullviewusermanagement?id=<?php echo base64_encode($user_data['id']); ?>"><?php echo $user_data['emp_code']; ?></a>
								</td>
								<td>
     								<?php echo $user_data['office_email']; ?>
								</td>
								<td>
									<?php echo $user_data['personal_email']; ?>
								</td>
								<td class="center">
     								<?php echo $user_data['employee_staff']; ?>
								</td>
								<td>
									<span class="label label-sm label-success">
										 <a href="<?php echo BASE_PATH; ?>edituserinfo?id=<?php echo base64_encode($user_data['id']); ?>"  style="color:#fff">Edit Info</a>
									</span>	 
									&nbsp;/&nbsp;
									<span class="label label-sm label-danger">
										 <a href="<?php echo BASE_PATH; ?>Delusermanagement?id=<?php echo base64_encode($user_data['id']); ?>"  style="color:#fff">Delete</a>
									</span>	 
								</td>
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
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
