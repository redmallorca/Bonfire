<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	
	<title><?php echo config_item('site.title'); ?></title>
	
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('views/screen.css'); ?>" />
</head>
<body>

	<div class="page">
	
		<!-- Header -->
		<div class="head text-right">
			<h1>Bonfire</h1>
		</div>

		<div class="main">
		
			<?php if (isset($error)) :?>
			<div class="notificatin error">
				<p><?php echo $error; ?></p>
			</div>
			<?php endif; ?>
			
			<?php if (isset($attention)) :?>
			<div class="notificatin attention">
				<p><?php echo $attention; ?></p>
			</div>
			<?php endif; ?>
			
			<?php if (isset($success)) :?>
			<div class="notificatin success">
				<p><?php echo $success; ?></p>
			</div>
			<?php endif; ?>