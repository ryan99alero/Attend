-- 
-- Editor SQL for DB table Employees
-- Created by http://editor.datatables.net/generator
-- 

CREATE TABLE IF NOT EXISTS `Employees` (
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
);