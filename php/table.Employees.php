<?php

/*
 * Editor server script for DB table Employees
 * Created by http://editor.datatables.net/generator
 */

// DataTables PHP library and database connection
include( "lib/DataTables.php" );

// Alias Editor classes so they are easy to use
use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Mjoin,
	DataTables\Editor\Options,
	DataTables\Editor\Upload,
	DataTables\Editor\Validate,
	DataTables\Editor\ValidateOptions;

// The following statement can be removed after the first run (i.e. the database
// table has been created). It is a good idea to do this to help improve
// performance.
$db->sql( "CREATE TABLE IF NOT EXISTS `Employees` (
	`employee_id` int(10) NOT NULL auto_increment,
	`first_name` varchar(255),
	`last_name` varchar(255),
	`email` varchar(255),
	`department_id` numeric(9,2),
	`manager_id` numeric(9,2),
	`role_id` numeric(9,2),
	`rfid_card_id` numeric(9,2),
	`external_id` numeric(9,2),
	`adp_employee_id` numeric(9,2),
	`employment_type` varchar(255),
	`temp_agency_id` numeric(9,2),
	`active` varchar(255),
	`created_at` datetime,
	`created_by` varchar(255),
	`updated_at` datetime,
	`updated_by` varchar(255),
	PRIMARY KEY( `employee_id` )
);" );

// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'Employees', 'employee_id' )
	->fields(
		Field::inst( 'first_name' ),
		Field::inst( 'last_name' ),
		Field::inst( 'email' ),
		Field::inst( 'department_id' ),
		Field::inst( 'manager_id' ),
		Field::inst( 'role_id' ),
		Field::inst( 'rfid_card_id' ),
		Field::inst( 'external_id' ),
		Field::inst( 'adp_employee_id' ),
		Field::inst( 'employment_type' ),
		Field::inst( 'temp_agency_id' ),
		Field::inst( 'active' ),
		Field::inst( 'created_at' )
			->validator( Validate::dateFormat( 'Y-m-d H:i:s' ) )
			->getFormatter( Format::datetime( 'Y-m-d H:i:s', 'Y-m-d H:i:s' ) )
			->setFormatter( Format::datetime( 'Y-m-d H:i:s', 'Y-m-d H:i:s' ) ),
		Field::inst( 'created_by' ),
		Field::inst( 'updated_at' )
			->validator( Validate::dateFormat( 'Y-m-d H:i:s' ) )
			->getFormatter( Format::datetime( 'Y-m-d H:i:s', 'Y-m-d H:i:s' ) )
			->setFormatter( Format::datetime( 'Y-m-d H:i:s', 'Y-m-d H:i:s' ) ),
		Field::inst( 'updated_by' )
	)
	->process( $_POST )
	->json();
