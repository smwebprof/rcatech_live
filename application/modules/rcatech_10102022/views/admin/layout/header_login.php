<?php function getUri($uri,$muri){
	$pos = strrpos($uri,'admin')+6;
	$present = strrpos($uri,'admin/');
	if($muri =='home' && !$present)
	return true;
	return (strrpos(substr($uri,$pos),$muri)===false ? false:true);
}?>
<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>ACI - Login</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<link rel="shortcut icon" href="<?php echo ASSETS_PATH; ?>img/favicon_agrimin.png">
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?php echo ASSETS_PATH; ?>plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ASSETS_PATH; ?>/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ASSETS_PATH; ?>plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_PATH; ?>plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_PATH; ?>plugins/select2/select2-metronic.css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="<?php echo ASSETS_PATH; ?>css/style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ASSETS_PATH; ?>css/style.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ASSETS_PATH; ?>css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ASSETS_PATH; ?>css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ASSETS_PATH; ?>css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?php echo ASSETS_PATH; ?>css/pages/login.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ASSETS_PATH; ?>css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
	<a href="./">
		<img src="<?php echo ASSETS_PATH; ?>img/logo-big.png" alt=""/>
	</a>
</div>
<!-- END LOGO -->
