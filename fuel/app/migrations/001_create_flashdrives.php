<?php

namespace Fuel\Migrations;

class Create_flashdrives {

	function up()
	{
		\DBUtil::create_table('flashdrives', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'brand' => array('constraint' => 255, 'type' => 'varchar'),
			'capacity' => array('constraint' => 255, 'type' => 'varchar'),
			'price' => array('type' => 'float'),
			'description' => array('type' => 'text'),

		), array('id'));
	}

	function down()
	{
		\DBUtil::drop_table('flashdrives');
	}
}