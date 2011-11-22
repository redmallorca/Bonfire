<?php 
	Assets::add_js(array(
			'jquery-1.6.4.min.js',
			'plugins.js'
		), 
		'external',
		true
	);
?>
<?php echo theme_view('_header'); ?>

<div class="main">
	<div class="container">
		<?php echo Template::message(); ?>	

		<?php echo Template::yield(); ?>
	</div>
</div>
	
<?php echo theme_view('_footer'); ?>