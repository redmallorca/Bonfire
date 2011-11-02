<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_banning_users extends Migration {
	
	public function up() 
	{	
		$prefix = $this->db->dbprefix;
		
		$sql = "ALTER TABLE  `{$prefix}users` ADD  `banned` TINYINT( 1 ) NOT NULL DEFAULT  '0' AFTER  `deleted`, ADD  `ban_message` VARCHAR( 255 ) NULL DEFAULT NULL AFTER  `banned`";
		$this->db->query($sql);
	}
	
	//--------------------------------------------------------------------
	
	public function down() 
	{
		$prefix = $this->db->dbprefix;
		
		$sql = "ALTER TABLE `{$prefix}users` DROP `banned`,  DROP `ban_message`;"
	}
	
	//--------------------------------------------------------------------
	
}