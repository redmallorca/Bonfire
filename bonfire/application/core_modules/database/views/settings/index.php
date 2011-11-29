		<!-- List -->
	<div class="view">
	<?php  empty ($settings['development']) ? $settings['development'] =array_shift(read_db_config('development','default')) :'';?>
	<?php  empty ($settings['testing']) ? $settings['testing'] =array_shift(read_db_config('testing','default')) :'';?>
	<?php  empty ($settings['production']) ? $settings['production'] =array_shift(read_db_config('production','default')) :'';?>

		<h2 class="panel-title"><?php echo lang('db_servers'); ?></h2>
	</div>


	<!-- Editor -->
	<div id="content" class="view">
		<div class="scrollable" id="ajax-content">

				<div class="notification attention">
					<p class="text-center"><?php echo lang('db_running_on_1'); ?> <b><?php echo ENVIRONMENT ?></b> <?php echo lang('db_running_on_2'); ?></p>
				</div>

				<div class="row">
					<div class="column size1of3">
						<h3><?php echo lang('bf_env_dev'); ?></h3>

						<table>
							<tr>
								<td><?php echo lang('db_hostname'); ?></td>
								<td><b><?php echo $settings['development']['default']['hostname'] ?></b></td>
							</tr>
							<tr>
								<td><?php echo lang('db_database'); ?></td>
								<td><b><?php echo $settings['development']['default']['database'] ?></b></td>
							</tr>
							<tr>
								<td><?php echo lang('bf_user'); ?></td>
								<td><b><?php echo $settings['development']['default']['username'] ?></b></td>
							</tr>
							<tr>
								<td><?php echo lang('db_driver'); ?></td>
								<td><b><?php echo $settings['development']['default']['dbdriver'] ?></b></td>
							</tr>
							<tr>
								<td><?php echo lang('db_prefix'); ?></td>
								<td><b><?php echo $settings['development']['default']['dbprefix'] ?></b></td>
							</tr>
							<tr>
								<td><?php echo lang('db_debug_on'); ?>?</td>
								<td><b><?php echo $settings['development']['default']['db_debug'] = 1 ? lang('bf_yes') : lang('bf_yes') ?></b></td>
							</tr>
							<tr>
								<td><?php echo lang('db_persistant'); ?>?</td>
								<td><b><?php echo $settings['development']['default']['pconnect'] == 1 ? lang('bf_yes') : lang('bf_yes') ?></b></td>
							</tr>
							<tr>
								<td><?php echo lang('db_strict_mode'); ?>?</td>
								<td><b><?php echo $settings['development']['default']['stricton'] = 1 ? lang('bf_yes') : lang('bf_yes') ?></b></td>
							</tr>
						</table>
					</div>

					<div class="column size1of3">
						<h3><?php echo lang('bf_env_test'); ?></h3>

						<table>
							<tr>
								<td><?php echo lang('db_hostname'); ?></td>
								<td><b><?php echo $settings['testing']['default']['hostname'] ?></b></td>
							</tr>
							<tr>
								<td><?php echo lang('db_database'); ?></td>
								<td><b><?php echo $settings['testing']['default']['database'] ?></b></td>
							</tr>
							<tr>
								<td><?php echo lang('bf_user'); ?></td>
								<td><b><?php echo $settings['testing']['default']['username'] ?></b></td>
							</tr>
							<tr>
								<td><?php echo lang('db_driver'); ?></td>
								<td><b><?php echo $settings['testing']['default']['dbdriver'] ?></b></td>
							</tr>
							<tr>
								<td><?php echo lang('db_prefix'); ?></td>
								<td><b><?php echo $settings['testing']['default']['dbprefix'] ?></b></td>
							</tr>
							<tr>
								<td><?php echo lang('db_debug_on'); ?>?</td>
								<td><b><?php echo $settings['testing']['default']['db_debug'] = 1 ? lang('bf_yes') : lang('bf_yes') ?></b></td>
							</tr>
							<tr>
								<td><?php echo lang('db_persistant'); ?>?</td>
								<td><b><?php echo $settings['testing']['default']['pconnect'] == 1 ? lang('bf_yes') : lang('bf_yes') ?></b></td>
							</tr>
							<tr>
								<td><?php echo lang('db_strict_mode'); ?>?</td>
								<td><b><?php echo $settings['testing']['default']['stricton'] = 1 ? lang('bf_yes') : lang('bf_yes') ?></b></td>
							</tr>
						</table>
					</div>

					<div class="column size1of3">
						<h3><?php echo lang('bf_env_prod'); ?></h3>

						<table>
							<tr>
								<td><?php echo lang('db_hostname'); ?></td>
								<td><b><?php echo $settings['production']['default']['hostname'] ?></b></td>
							</tr>
							<tr>
								<td><?php echo lang('db_database'); ?></td>
								<td><b><?php echo $settings['production']['default']['database'] ?></b></td>
							</tr>
							<tr>
								<td><?php echo lang('bf_user'); ?></td>
								<td><b><?php echo $settings['production']['default']['username'] ?></b></td>
							</tr>
							<tr>
								<td><?php echo lang('db_driver'); ?></td>
								<td><b><?php echo $settings['production']['default']['dbdriver'] ?></b></td>
							</tr>
							<tr>
								<td><?php echo lang('db_prefix'); ?></td>
								<td><b><?php echo $settings['production']['default']['dbprefix'] ?></b></td>
							</tr>
							<tr>
								<td>Debug On?</td>
								<td><b><?php echo $settings['production']['default']['db_debug'] = 1 ? lang('bf_yes') : lang('bf_yes') ?></b></td>
							</tr>
							<tr>
								<td><?php echo lang('db_persistant'); ?>?</td>
								<td><b><?php echo $settings['production']['default']['pconnect'] == 1 ? lang('bf_yes') : lang('bf_yes') ?></b></td>
							</tr>
							<tr>
								<td><?php echo lang('db_strict_mode'); ?>?</td>
								<td><b><?php echo $settings['production']['default']['stricton'] = 1 ? lang('bf_yes') : lang('bf_yes') ?></b></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
