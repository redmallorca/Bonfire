<p class="small"><?php echo lang('bf_required_note'); ?></p>

<?php if (isset($user) && $user->role_name == 'Banned') : ?>
<div class="notification attention">
	<p><?php echo lang('us_banned_admin_note'); ?></p>
</div>
<?php endif; ?>

<div class="row">
	
	<div class="column size3of4">

		<?php echo form_open($this->uri->uri_string(), 'class="constrained ajax-form"'); ?>
		
			<fieldset>
				<div class="clearfix <?php echo form_has_error('first_name') ? 'error' : ''; ?>">
					<label for="first_name"><?php echo lang('us_first_name'); ?></label>
					<div class="input">
						<input type="text" name="first_name" value="<?php echo isset($user) ? $user->first_name : set_value('first_name') ?>" />
						<span class="help-inline"><?php echo form_error('first_name'); ?></span>
					</div>
				</div>
			
				<div class="clearfix <?php echo form_has_error('last_name') ? 'error' : ''; ?>">
					<label for="last_name"><?php echo lang('us_last_name'); ?></label>
					<div class="input">
						<input type="text" name="last_name" value="<?php echo isset($user) ? $user->last_name : set_value('last_name') ?>" />
						<span class="help-inline"><?php echo form_error('last_name'); ?></span>
					</div>
				</div>
				
				<div class="clearfix required <?php echo form_has_error('email') ? 'error' : ''; ?>">
					<label for="email"><?php echo lang('bf_email'); ?></label>
					<div class="input">
						<input type="text" name="email" class="medium" value="<?php echo isset($user) ? $user->email : set_value('email') ?>" />
						<span class="help-inline"><?php echo form_error('email'); ?></span>
					</div>
				</div>
				
				<?php if ( $this->settings_lib->item('auth.login_type') !== 'email' OR $this->settings_lib->item('auth.use_usernames')) : ?>
				<div class="clearfix <?php echo form_has_error('username') ? 'error' : ''; ?>">
					<label for="username"><?php echo lang('bf_username'); ?></label>
					<div class="input">
						<input type="text" name="username" id="username" class="medium" value="<?php echo isset($user) ? $user->username : set_value('username') ?>" />
						<span class="help-inline"><?php echo form_error('username'); ?></span>
					</div>
				</div>
				<?php endif; ?>
			
				<br />	
				<div class="clearfix required <?php echo form_has_error('password') ? 'error' : ''; ?>">
					<label for="password"><?php echo lang('bf_password'); ?></label>
					<div class="input">
						<input type="password" id="password" name="password" value="" />
						<span class="help-inline"><?php echo form_error('password'); ?></span>
					</div>
				</div>
				<div class="clearfix required <?php echo form_has_error('pass_confirm') ? 'error' : ''; ?>">
					<label for="pass_confirm"><?php echo lang('bf_password_confirm'); ?></label>
					<div class="input">
						<input type="password" id="pass_confirm" name="pass_confirm" value="" />
						<span class="help-inline"><?php echo form_error('pass_confirm'); ?></span>
					</div>
				</div>
			
			</fieldset>
			
			<?php if (has_permission('Bonfire.Roles.Manage')) :?>
			<fieldset>
				<legend><?php echo lang('us_role'); ?></legend>
				
				<div class="clearfix">
					<label for="role_id"><?php echo lang('us_role'); ?></label>
					<div class="input">
						<select name="role_id">
						<?php if (isset($roles) && is_array($roles) && count($roles)) : ?>
							<?php foreach ($roles as $role) : ?>
								<?php if (has_permission('Permissions.'.$role->role_name.'.Manage')) : ?>
							<option value="<?php echo $role->role_id ?>" <?php echo isset($user) && $user->role_id == $role->role_id ? 'selected="selected"' : '' ?> <?php echo !isset($user) && $role->default == 1 ? 'selected="selected"' : ''; ?>>
								<?php echo $role->role_name ?>
							</option>
								<?php endif; ?>
							<?php endforeach; ?>
						<?php endif; ?>
						</select>
					</div>
				</div>
			</fieldset>
			<?php endif; ?>
		
			<?php  if ( ! $this->settings_lib->item('auth.use_extended_profile')) :?>
			<fieldset>
				<legend><?php echo lang('us_address'); ?></legend>
				
				<div class="clearfix <?php echo form_has_error('street_1') ? 'error' : ''; ?>">
					<label for="street_1"><?php echo lang('us_street_1'); ?></label>
					<div class="input">
						<input type="text" name="street_1" class="medium" value="<?php echo isset($user) ? $user->street_1 : set_value('street_1') ?>" />
						<span class="help-inline"><?php echo form_error('street_1'); ?></span>
					</div>
				</div>
				<div class="clearfix <?php echo form_has_error('street_2') ? 'error' : ''; ?>">
					<label for="street_2"><?php echo lang('us_street_2'); ?></label>
					<div class="input">
						<input type="text" name="street_2" class="medium" value="<?php echo isset($user) ? $user->street_2 : set_value('street_2') ?>" />
						<span class="help-inline"><?php echo form_error('street_2'); ?></span>
					</div>
				</div>
				<div class="clearfix <?php echo form_has_error('city') ? 'error' : ''; ?>">
					<label for="city"><?php echo lang('us_city'); ?></label>
					<div class="input">
						<input type="text" name="city" value="<?php echo isset($user) ? $user->city : set_value('city') ?>" />
						<span class="help-inline"><?php echo form_error('city'); ?></span>
					</div>
				</div>
				<div class="clearfix <?php echo form_has_error('country') ? 'error' : ''; ?>">
					<label for="iso"><?php echo lang('us_country') ?></label>
					<div class="input">
						<?php echo country_select(isset($user) && !empty($user->country_iso) ? $user->country_iso : 'US', 'US'); ?>
					</div>
				</div>
				<div class="clearfix <?php echo form_has_error('state') ? 'error' : ''; ?>">
					<label for="state_code"><?php echo lang('us_state'); ?></label>
					<div class="input">
						<?php echo state_select(isset($user) ? $user->state_code : '', 'MO', isset($user) && !empty($user->country_iso) ? $user->country_iso : 'US'); ?>
					</div>
				</div>
				<div class="clearfix <?php echo form_has_error('zipcode') ? 'error' : ''; ?>">
					<label for="zipcode"><?php echo lang('us_zipcode'); ?></label>
					<div class="input">
						<input type="text" name="zipcode" size="7" maxlength="7" style="width: 6em; display: inline;" value="<?php echo isset($user) ? $user->zipcode : set_value('zipcode', ' ') ?>"  /> 
						<span class="help-inline"><?php echo form_error('zipcode'); ?></span>
					</div>
				</div>
		
			</fieldset>
			<?php endif; ?>
			
			<div class="actions">
				<input type="submit" name="submit" class="btn primary" value="<?php echo lang('bf_action_save') ?> " /> <?php echo lang('bf_or') ?> <?php echo anchor(SITE_AREA .'/settings/users', lang('bf_action_cancel')); ?>
			</div>
		</div> <!-- column -->
		
		<div class="column size1of4">
			
			<?php if (isset($user) && has_permission('Permissions.'.$user->role_name.'.Manage') && $user->id != $this->auth->user_id()) : ?>
			<div class="box delete rounded">
				<a class="button" id="delete-me" href="<?php echo site_url(SITE_AREA .'/settings/users/delete/'. $user->id); ?>" onclick="return confirm('<?php echo lang('us_delete_account_confirm'); ?>')"><?php echo lang('us_delete_account'); ?></a>
				
				<?php echo lang('us_delete_account_note'); ?>
			</div>
			<?php endif; ?>
			
		</div>
	</div>

<?php echo form_close(); ?>