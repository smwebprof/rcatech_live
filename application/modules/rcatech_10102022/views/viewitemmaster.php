<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Item Master
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
							<a href="#">
								Masters
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								View Item Master
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
					
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>View Item Master
							</div>
							<div class="actions">
								<?php #if ($data['access_right']['add_rights'] == 1) { ?>
								<a href="<?php echo BASE_PATH; ?>additemmaster" class="btn blue">
									<i class="fa fa-pencil"></i> Add New
								</a>
								<?php #} ?>
								<a href="<?php echo BASE_PATH; ?>Viewitemmaster?a=1" class="btn yellow">
									<i class="fa fa-pencil"></i> Display NBCB Items
								</a>
								<a href="<?php echo BASE_PATH; ?>Viewitemmaster?a=0" class="btn red">
									<i class="fa fa-pencil"></i> Display NON NBCB Items
								</a>
								<!-- <div class="btn-group">
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
								</div> -->
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="sample_2">
							<thead>
							<tr>
								<th>
									 Sr. No
								</th>
								<th>
									 Item Name
								</th>
								<th>
									 Departments Name
								</th>
								<th>
									 NABCB flag
								</th>
								<?php #if ($data['access_right']['edit_rights'] == 1) { ?>
								<th>
									 Edit
								</th>
								<?php #} ?>
								<?php #if ($data['access_right']['delete_rights'] == 1) { ?>
								<th>
									 Delete
								</th>
								<?php #} ?>
							</tr>
							</thead>
							<tbody>
							<?php	
							$rows = $item_data;
							$i = 1;
							foreach($rows as $item_data){
							?>
						    <tr class="odd gradeX">
						    	<td>
									 <?php echo $i; ?>
								</td>
								<td>
									 <?php echo $item_data['item_name']; ?>
								</td>
								<td>
									 <?php echo $item_data['name']; ?>
								</td>
								<td>
									 <?php 
									 if ($item_data['nabcb_flag']==1) { echo 'Yes'; } else { echo 'No';}
									 ?>
								</td>
								<?php if ($access_right['edit_rights'] == 1) { ?>
								<td>
									<span class="label label-sm label-success">
										 <a href="<?php echo BASE_PATH; ?>edititemmaster?id=<?php echo base64_encode($item_data['id']); ?>"  style="color:#fff">Edit</a>
									</span>
								</td>
								<?php } ?>
								<?php if ($access_right['delete_rights'] == 1) { ?>
								<td>
									<span class="label label-sm label-danger">
										 <a href="<?php echo BASE_PATH; ?>deleteitemmaster?id=<?php echo base64_encode($item_data['id']); ?>"  style="color:#fff">Delete</a>
									</span>
								</td>
								<?php } ?>
							</tr>	

							<?php
							$i++;
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
