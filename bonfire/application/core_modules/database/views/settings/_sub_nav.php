<div id="sub-nav" class="button-group">
	<a href="<?php echo site_url(SITE_AREA .'/settings/database') ?>" <?php echo $this->uri->segment(5) == '' ? 'class="current"' : '' ?> ><?php echo lang('bf_home'); ?></a>
	<a href="<?php echo site_url(SITE_AREA .'/settings/database/edit/development') ?>" <?php echo $this->uri->segment(5) == 'development' ? 'class="current"' : '' ?> ><?php echo lang('db_serv_dev'); ?></a>
	<a href="<?php echo site_url(SITE_AREA .'/settings/database/edit/testing') ?>" <?php echo $this->uri->segment(5) == 'testing' ? 'class="current"' : '' ?> ><?php echo lang('db_serv_test') ?></a>
	<a href="<?php echo site_url(SITE_AREA .'/settings/database/edit/production') ?>" <?php echo $this->uri->segment(5) == 'production' ? 'class="current"' : '' ?> ><?php echo lang('db_serv_prod') ?></a>
</div>
