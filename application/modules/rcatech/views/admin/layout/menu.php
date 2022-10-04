<?php
#print_r($_SESSION);exit;
#if ($_SESSION['userId']=='' || $_SESSION['fname']=='') {
#if (@$_SESSION['fname']=='') {
if (!isset($_SESSION['fname'])) {
$login = BASE_PATH."login/";
redirect($login);
}

$this->load->model('user_master');
$this->load->model('Company_master');

$op_year = $this->Company_master->get_op_year(@$_SESSION['comp_id']);
$curr_year = date('Y');
//print_r($op_year);exit;

$menus_user = $this->user_master->getMainusermenus(@$_SESSION['userId']);
$submenus_user = $this->user_master->getSubusermenus(@$_SESSION['userId']);
$user_branch_access = $this->user_master->getBranchAccessByUserid(@$_SESSION['userId']);
//print_r($user_branch_access);exit;
$arr= array();
$arr1= array();
$arr2= array();
$i=0;
foreach ($submenus_user as $key=>$value)
{  
	$arr[$value['menu_master_id']][$i] = $value['submenu_name'];
	$arr1[$value['menu_master_id']][$i] = $value['url'];
	$i++;
}
$submenus_data = $arr;
$urlmenus_data = $arr1;

###### For masters
$master_menu_users = $this->user_master->getMainusermenusParent();
?>
<!-- BEGIN HEADER -->
<div class="header navbar navbar-fixed-top mega-menu">
	<!-- BEGIN TOP NAVIGATION BAR -->
	<div class="header-inner">
		<!-- BEGIN LOGO -->
		<?php if ($_SESSION['employee_staff']!='Guest') { ?>
		<a class="navbar-brand" href="<?php echo BASE_PATH; ?>dashboard" style="margin-top:-25px;">
		<?php } else { ?>
		<a class="navbar-brand" href="#" style="margin-top:-25px;">
		<?php } ?>	
			<img src="<?php echo ASSETS_PATH; ?>img/rca_fav.png" alt="logo" class="img-responsive"/>
		</a>
		<!-- END LOGO -->
		<!-- BEGIN HORIZANTAL MENU -->
		<div class="hor-menu hidden-sm hidden-xs">
			<ul class="nav navbar-nav">
				<?php 
				#$menus = $this->data['menus'];
				#$submenus = $this->data['submenus'];
				#$urlmenus = $this->data['urlmenus'];


				$menus = $menus_user;
				$submenus = $submenus_data;
				$urlmenus = $urlmenus_data;
				#print_r($submenus);
				foreach ($menus as $key_main_menu=>$each_main_menu)
				{  
				?>	
				<li classic-menu-dropdown active>
					<?php 
					if ($each_main_menu['url'] == '') {
					?>	
					<a data-toggle="dropdown" data-hover="dropdown" data-close-others="true" href="<?php echo BASE_PATH.$each_main_menu['url']; ?>">
						 <?php echo $each_main_menu['menu_name']; ?>
					</a>
					<?php
				    } else {
				    ?>
				    <?php if ($_SESSION['employee_staff']!='Guest') { ?>	
				    <a href="<?php echo BASE_PATH.$each_main_menu['url']; ?>">
						 <?php echo $each_main_menu['menu_name']; ?>
					</a>
                    <?php
                	}
				    }
					?>
					<ul class="dropdown-menu pull-right">
						<?php
						foreach ($submenus as $key=>$value) {
							if ($key==$each_main_menu['id']) {
							foreach ($value as $k=>$v) {
						?>	
						<li>
							<a href="<?php echo BASE_PATH.$urlmenus[$key][$k]; ?>" style="color:#fff">
								 <?php echo $v; ?>
							</a>
						</li>
						<?php
						} }	}
						?>
					</ul>	
				</li>

				<?php 
			    }
				?>
				<?php if ($_SESSION['employee_staff']=='TECHNICAL ADMIN') { ?>
				<li class="mega-menu-dropdown">
					<a href="#" data-hover="dropdown" data-close-others="true" href="" class="dropdown-toggle">
						 Masters <i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li>
							<!-- Content container to add padding -->
							<div class="mega-menu-content">
								<div class="row">
									<?php foreach ($master_menu_users as $p=>$q) { ?>
									<ul class="col-md-4 mega-menu-submenu">
										<li>
											<h3><?php echo $q['menu_name']; ?></h3>
										</li>
										<?php
										$submenu_master_users = $this->user_master->getSubusermenusParent($q['id']);
										foreach ($submenu_master_users as $k=>$v) { ?>
											<li>
												<a href="<?php echo BASE_PATH.$v['url']; ?>" style="color:#fff"><i class="fa fa-angle-right"></i><?php echo $v['submenu_name']; ?></a>
											</li>
										<?php	
										}	
										?>
									</ul>
									<?php } ?>	
								</div>
							</div>
						</li>
					</ul>				
				</li>
			    <?php } ?>
				<!--<li>
					<a href="">
						 Link
					</a>
				</li>-->
				<!--<li>
					<span class="hor-menu-search-form-toggler">
						 &nbsp;
					</span>
					<div class="search-form">
						<form class="form-search">
							<div class="input-group">
								<input type="text" placeholder="Search..." class="form-control">
								<div class="input-group-btn">
									<button type="button" class="btn"></button>
								</div>
							</div>
						</form>
					</div>
				</li>-->
			</ul>
		</div>
		<!-- END HORIZANTAL MENU -->


		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<img src="<?php echo ASSETS_PATH; ?>img/menu-toggler.png" alt=""/>
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<ul class="nav navbar-nav pull-right">
			<!-- BEGIN NOTIFICATION DROPDOWN -->
			<!--<li class="dropdown" id="header_notification_bar">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<i class="fa fa-warning"></i>
					<span class="badge">
						 6
					</span>
				</a>
				<ul class="dropdown-menu extended notification">
					<li>
						<p>
							 You have 14 new notifications
						</p>
					</li>
					<li>
						<ul class="dropdown-menu-list scroller" style="height: 250px;">
							<li>
								<a href="#">
									<span class="label label-icon label-success">
										<i class="fa fa-plus"></i>
									</span>
									 New user registered.
									<span class="time">
										 Just now
									</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="label label-icon label-danger">
										<i class="fa fa-bolt"></i>
									</span>
									 Server #12 overloaded.
									<span class="time">
										 15 mins
									</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="label label-icon label-warning">
										<i class="fa fa-bell-o"></i>
									</span>
									 Server #2 not responding.
									<span class="time">
										 22 mins
									</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="label label-icon label-info">
										<i class="fa fa-bullhorn"></i>
									</span>
									 Application error.
									<span class="time">
										 40 mins
									</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="label label-icon label-danger">
										<i class="fa fa-bolt"></i>
									</span>
									 Database overloaded 68%.
									<span class="time">
										 2 hrs
									</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="label label-icon label-danger">
										<i class="fa fa-bolt"></i>
									</span>
									 2 user IP blocked.
									<span class="time">
										 5 hrs
									</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="label label-icon label-warning">
										<i class="fa fa-bell-o"></i>
									</span>
									 Storage Server #4 not responding.
									<span class="time">
										 45 mins
									</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="label label-icon label-info">
										<i class="fa fa-bullhorn"></i>
									</span>
									 System Error.
									<span class="time">
										 55 mins
									</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="label label-icon label-danger">
										<i class="fa fa-bolt"></i>
									</span>
									 Database overloaded 68%.
									<span class="time">
										 2 hrs
									</span>
								</a>
							</li>
						</ul>
					</li>
					<li class="external">
						<a href="#">
							 See all notifications <i class="m-icon-swapright"></i>
						</a>
					</li>
				</ul>
			</li>-->
			<!-- END NOTIFICATION DROPDOWN -->
			<!-- BEGIN INBOX DROPDOWN -->
			<!--<li class="dropdown" id="header_inbox_bar">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<i class="fa fa-envelope"></i>
					<span class="badge">
						 5
					</span>
				</a>
				<ul class="dropdown-menu extended inbox">
					<li>
						<p>
							 You have 12 new messages
						</p>
					</li>
					<li>
						<ul class="dropdown-menu-list scroller" style="height: 250px;">
							<li>
								<a href="inbox.html?a=view">
									<span class="photo">
										<img src="./<?php echo ASSETS_PATH; ?>img/avatar2.jpg" alt=""/>
									</span>
									<span class="subject">
										<span class="from">
											 Lisa Wong
										</span>
										<span class="time">
											 Just Now
										</span>
									</span>
									<span class="message">
										 Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh...
									</span>
								</a>
							</li>
							<li>
								<a href="inbox.html?a=view">
									<span class="photo">
										<img src="./<?php echo ASSETS_PATH; ?>img/avatar3.jpg" alt=""/>
									</span>
									<span class="subject">
										<span class="from">
											 Richard Doe
										</span>
										<span class="time">
											 16 mins
										</span>
									</span>
									<span class="message">
										 Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh...
									</span>
								</a>
							</li>
							<li>
								<a href="inbox.html?a=view">
									<span class="photo">
										<img src="./<?php echo ASSETS_PATH; ?>img/avatar1.jpg" alt=""/>
									</span>
									<span class="subject">
										<span class="from">
											 Bob Nilson
										</span>
										<span class="time">
											 2 hrs
										</span>
									</span>
									<span class="message">
										 Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh...
									</span>
								</a>
							</li>
							<li>
								<a href="inbox.html?a=view">
									<span class="photo">
										<img src="./<?php echo ASSETS_PATH; ?>img/avatar2.jpg" alt=""/>
									</span>
									<span class="subject">
										<span class="from">
											 Lisa Wong
										</span>
										<span class="time">
											 40 mins
										</span>
									</span>
									<span class="message">
										 Vivamus sed auctor 40% nibh congue nibh...
									</span>
								</a>
							</li>
							<li>
								<a href="inbox.html?a=view">
									<span class="photo">
										<img src="./<?php echo ASSETS_PATH; ?>img/avatar3.jpg" alt=""/>
									</span>
									<span class="subject">
										<span class="from">
											 Richard Doe
										</span>
										<span class="time">
											 46 mins
										</span>
									</span>
									<span class="message">
										 Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh...
									</span>
								</a>
							</li>
						</ul>
					</li>
					<li class="external">
						<a href="inbox.html">
							 See all messages <i class="m-icon-swapright"></i>
						</a>
					</li>
				</ul>
			</li>-->
			<!-- END INBOX DROPDOWN -->
			<!-- BEGIN TODO DROPDOWN -->
			<!--<li class="dropdown" id="header_task_bar">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<i class="fa fa-tasks"></i>
					<span class="badge">
						 5
					</span>
				</a>
				<ul class="dropdown-menu extended tasks">
					<li>
						<p>
							 You have 12 pending tasks
						</p>
					</li>
					<li>
						<ul class="dropdown-menu-list scroller" style="height: 250px;">
							<li>
								<a href="#">
									<span class="task">
										<span class="desc">
											 New release v1.2
										</span>
										<span class="percent">
											 30%
										</span>
									</span>
									<span class="progress">
										<span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
											<span class="sr-only">
												 40% Complete
											</span>
										</span>
									</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="task">
										<span class="desc">
											 Application deployment
										</span>
										<span class="percent">
											 65%
										</span>
									</span>
									<span class="progress progress-striped">
										<span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
											<span class="sr-only">
												 65% Complete
											</span>
										</span>
									</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="task">
										<span class="desc">
											 Mobile app release
										</span>
										<span class="percent">
											 98%
										</span>
									</span>
									<span class="progress">
										<span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">
											<span class="sr-only">
												 98% Complete
											</span>
										</span>
									</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="task">
										<span class="desc">
											 Database migration
										</span>
										<span class="percent">
											 10%
										</span>
									</span>
									<span class="progress progress-striped">
										<span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
											<span class="sr-only">
												 10% Complete
											</span>
										</span>
									</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="task">
										<span class="desc">
											 Web server upgrade
										</span>
										<span class="percent">
											 58%
										</span>
									</span>
									<span class="progress progress-striped">
										<span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">
											<span class="sr-only">
												 58% Complete
											</span>
										</span>
									</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="task">
										<span class="desc">
											 Mobile development
										</span>
										<span class="percent">
											 85%
										</span>
									</span>
									<span class="progress progress-striped">
										<span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
											<span class="sr-only">
												 85% Complete
											</span>
										</span>
									</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="task">
										<span class="desc">
											 New UI release
										</span>
										<span class="percent">
											 18%
										</span>
									</span>
									<span class="progress progress-striped">
										<span style="width: 18%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">
											<span class="sr-only">
												 18% Complete
											</span>
										</span>
									</span>
								</a>
							</li>
						</ul>
					</li>
					<li class="external">
						<a href="#">
							 See all tasks <i class="m-icon-swapright"></i>
						</a>
					</li>
				</ul>
			</li>-->
			<!-- END TODO DROPDOWN -->
			<!-- BEGIN USER LOGIN DROPDOWN -->
			<li class="dropdown" id="header_task_bar" style="margin-top: 12px; padding-right: 10px;color:#fff"><strong>Financial Year</strong>
			<?php if ($_SESSION['employee_staff']!='Guest') { ?>
			<li class="dropdown" id="header_task_bar">
				<?php /*<form action="<?php echo BASE_PATH; ?>dashboard" method="POST">*/ ?>
				<input type="hidden" name="current_finmonth_form" id="current_finmonth_form" value="current_finmonth_form">	
				<select name="current_finmonth" id="current_finmonth" style="margin-top:10px;" disabled>
					<?php /*<span class="username"><?php echo @$_SESSION['branch_name']; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;*/ 
					#echo '<option value="">Financial Year</option>';
					foreach ($op_year as $p => $q)  { ?>
						<?php if (@$_SESSION['operatingyear']==$q['year']) { ?>
							<option value="<?php echo $q['year']; ?>" selected><?php echo $q['year']; ?></option>
						<?php } else { ?>
							<option value="<?php echo $q['year']; ?>"><?php echo$q['year']; ?></option>	
						<?php } ?>
					<?php
					}
					?>
					</select>	
				<?php /*</form>*/ ?>	
			</li>
			<?php
			}
			?>
			<li class="dropdown" id="header_task_bar" style="margin-top: 12px; padding-right: 10px;color:#fff"><strong>Branch</strong>
			<?php if ($_SESSION['employee_staff']!='Guest') { ?>
				
			<li class="dropdown" id="header_task_bar">
				<form action="<?php echo BASE_PATH; ?>dashboard" method="POST">
				<input type="hidden" name="current_branch_form" id="current_branch_form" value="current_branch_form">	
				<select name="current_branch" id="current_branch" onchange="this.form.submit()" style="margin-top:10px;">
					<?php /*<span class="username"><?php echo @$_SESSION['branch_name']; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;*/ 
					#echo '<option value="">Select</option>';
					foreach ($user_branch_access as $u => $v)  { ?>
						<?php if (@$_POST['current_branch']==$v['branch_id']) { ?>
							<option value="<?php echo $v['branch_id']; ?>" selected><?php echo $v['branch_name']; ?></option>
						<?php } else { ?>
							<?php if ($_SESSION['branch_id']==$v['branch_id']) { ?>
								<option value="<?php echo $v['branch_id']; ?>" selected><?php echo $v['branch_name']; ?></option>
							<?php } else { ?>
								<option value="<?php echo $v['branch_id']; ?>"><?php echo $v['branch_name']; ?></option>
							<?php } ?>	
						<?php } ?>
					<?php
					}
					?>
					</select>	
				</form>	
			</li></li>
			<?php
			}
			?>
			<?php
			    #print_r($_POST);
				#if (@$_POST['current_branch_form']) {
					#$_SESSION['branch_id'] = $_POST['current_branch'];
					#$this->load->library('session');
					#$this->session->set_userdata('branch_id', $_POST['current_branch']);
				#}
			?>	
			<li class="dropdown user">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					
					<!--<button type="submit" class="btn green" style="height:20px;">Submit</button>-->
					<!--<img alt="" src="<?php echo ASSETS_PATH; ?>img/avatar1_small.jpg"/>-->
					<!--<span class="username hidden-1024">-->
						<span class="username" style="color:#fff">
						 <?php
						 if (@$_SESSION['fname'] != '') {
						 	echo @$_SESSION['fname']." ".@$_SESSION['lname'];
						 } else {
						 	echo "Welcome";
						 }
						 ?>
						</span>
					<i class="fa fa-angle-down"></i>
				</a>
		
				<ul class="dropdown-menu">
					<?php if (isset($_SESSION['userId'])) { ?>
					<li>
						<a href="<?php echo BASE_PATH; ?>fullviewusermanagement?id=<?php echo base64_encode($_SESSION['userId']); ?>">
							<i class="fa fa-user"></i> My Profile
						</a>
					</li>
				<?php } ?>
					<!--<li>
						<a href="page_calendar.html">
							<i class="fa fa-calendar"></i> My Calendar
						</a>
					</li>
					<li>
						<a href="inbox.html">
							<i class="fa fa-envelope"></i> My Inbox
							<span class="badge badge-danger">
								 3
							</span>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="fa fa-tasks"></i> My Tasks
							<span class="badge badge-success">
								 7
							</span>
						</a>
					</li>
					<li class="divider">
					</li>
					<li>
						<a href="javascript:;" id="trigger_fullscreen">
							<i class="fa fa-arrows"></i> Full Screen
						</a>
					</li>
					<li>
						<a href="extra_lock.html">
							<i class="fa fa-lock"></i> Lock Screen
						</a>
					</li>-->
					<?php if ($_SESSION['employee_staff']!='Guest') { ?>
					<?php if (@$_SESSION['userId']!='11') { ?>
					<li>
						<a href="<?php echo BASE_PATH; ?>Addpasswordmaster">
							<i class="fa fa-lock"></i> Change Password
						</a>
					</li>
					<?php } ?>
					<?php } ?>
					<?php /*if ($_SESSION['employee_staff']!='Guest') { ?>
					<li>
						<a href="<?php echo BASE_PATH.'uploads/agrimin_user_manual_version_I.pdf'; ?>" target="_blank">
							<i class="fa fa-book"></i> User Manual
						</a>
					</li>
					<?php }*/ ?>
					<li>
						<a href="<?php echo BASE_PATH; ?>login/logout">
							<i class="fa fa-key"></i> Log Out
						</a>
					</li>
				</ul>
			</li>
			<!-- END USER LOGIN DROPDOWN -->
		</ul>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN EMPTY PAGE SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
				<li>
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<form class="sidebar-search" action="extra_search.html" method="POST">
						<div class="form-container">
							<div class="input-box">
								<a href="javascript:;" class="remove">
								</a>
								<input type="text" placeholder="Search..."/>
								<input type="button" class="submit" value=" "/>
							</div>
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				<?php
				foreach ($menus as $key_main_menu1=>$each_main_menu1)
				{  
				?>	
				<li>
					<a href="index.html">
						 <?php echo $each_main_menu1['menu_name']; ?>
						 <span class="arrow">
						 </span>
					</a>
					<ul class="sub-menu">

						<?php
						foreach ($submenus as $key1=>$value1) {
							if ($key1==$each_main_menu1['id']) {
							foreach ($value1 as $k1=>$v1) {
						?>	
						<li>
							<a href="<?php echo BASE_PATH.$urlmenus[$key1][$k1]; ?>">
								 <?php echo $v1; ?>
							</a>
						</li>
						<?php
						} }	}
						?>
					</ul>		
				</li>
				<?php
				}
				?>
				
		</div>
	</div>

	<!-- END EMPTY PAGE SIDEBAR -->
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

