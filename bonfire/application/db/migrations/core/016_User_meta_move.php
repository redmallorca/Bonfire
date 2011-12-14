<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_User_meta_move extends Migration {
	
	private $core_user_fields = array(
		'id',
		'role_id',
		'email',
		'username',
		'password_hash',
		'reset_hash',
		'salt',
		'last_login',
		'last_ip',
		'created_on',
		'deleted',
		'banned',
		'ban_message',
		'reset_by'
	);
	private $default_fields = array(
		'first_name'	=> array(
			'field_label'	=> 'First Name',
			'field_type'	=> 'text',
			'field_validators'	=> 'trim|strip_tags|xss_clean',
			'field_order'	=> 1	
		),
		'last_name'	=> array(
			'field_label'	=> 'Last Name',
			'field_type'	=> 'text',
			'field_validators'	=> 'trim|strip_tags|xss_clean',
			'field_order'	=> 2
		),
		'street_1'	=> array(
			'field_label'	=> 'Address 1',
			'field_type'	=> 'text',
			'field_validators'	=> 'trim|strip_tags|xss_clean',
			'field_order'	=> 3
		),
		'street_2' => array(
			'field_label'	=> 'Address 2',
			'field_type'	=> 'text',
			'field_validators'	=> 'trim|strip_tags|xss_clean',
			'field_order'	=> 4
		),
		'city'	=> array(
			'field_label'	=> 'City',
			'field_type'	=> 'text',
			'field_validators'	=> 'trim|strip_tags|xss_clean',
			'field_order'	=> 5
		),
		'zipcode'	=> array(
			'field_label'	=> 'Postal Code',
			'field_type'	=> 'text',
			'field_validators'	=> 'trim|strip_tags|xss_clean',
			'field_order'	=> 7
		),
		'state_code'	=> array(
			'field_label'	=> 'State',
			'field_type'	=> 'state',
			'field_validators'	=> '',
			'field_order'	=> 6
		),
		'country_iso'	=> array(
			'field_label'	=> 'Country',
			'field_type'	=> 'country',
			'field_validators'	=> 'trim|strip_tags|xss_clean',
			'field_order'	=> 8
		)
	);
	
	//--------------------------------------------------------------------
	
	/*
		Adding the table for user_meta and moving all current meta fields
		over to the new table.
	*/
	public function up() 
	{
		$this->load->dbforge();
		
		$this->load->model('meta/meta_model');
		
		$this->meta_model->setup_module_meta('User');
		
		/*
			Backup our users table
		*/
		$this->load->dbutil();
		
		$filename = APPPATH .'db/backups/backup_meta_users_table.txt';
		
		$prefs = array(
			'tables'		=> $this->db->dbprefix .'users',
			'format'		=> 'txt',
			'filename'		=> $filename,
			'add_drop'		=> true,
			'add_insert'	=> true
		);
		$backup =& $this->dbutil->backup($prefs);
		
		$this->load->helper('file');
		write_file($filename, $backup);
		
		if (file_exists($filename))
		{
			log_message('info', 'Backup file successfully saved. It can be found at <a href="/'. $filename .'">'. $filename . '</a>.');
		}
		else
		{
			log_message('error', 'There was a problem saving the backup file.');
			die('There was a problem saving the backup file.');
		}
		
		/*
			Create our custom fields for the user.
		*/
		$field_ids = array();
		
		foreach ($this->default_fields as $field => $vals)
		{
			$vals['field_name']	= $field;
		
			$field_ids[$field] = $this->meta_model->insert_custom_field($vals, 'user');
		}
		
		/*
			Move User data to meta table
		*/
	
		// If there are users, loop through them and create meta entries
		// then remove all 'non-core' columns as they will now be in the meta table.
		if ($this->db->count_all_results('users'))
		{
			$query = $this->db->get('users');
			$rows = $query->result();

			foreach ($rows as $row)
			{
				foreach ($this->default_fields as $field => $vals)
				{
					// We don't want to store the field if it doesn't exist in the user profile.
					if (!empty($row->$field))
					{
						$this->meta_model->insert($field, $row->$field, 'user', $row->id, $field_ids[$field]);
					}
				}
			}
		}
		
		/*
			Drop existing columns from users table.
		*/
		$fields = $this->db->list_fields('users');

		foreach($fields as $field)
		{
			if(!in_array($field, $this->core_user_fields)) {
				$this->dbforge->drop_column('users', $field);
			}
		}
	}
	
	//--------------------------------------------------------------------
	
	public function down() 
	{
		$this->load->dbforge();
		
		// Copy the information back over to the users table.
		
		
		
		$this->load->model('meta/meta_model');
		
		$this->meta_model->remove_module_meta('User');
	}
	
	//--------------------------------------------------------------------
	
}