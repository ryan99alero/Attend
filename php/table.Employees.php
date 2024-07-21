<?php

/*
 * Editor server script for DB table Employees
 * Created by http://editor.datatables.net/generator
 */

// Include your database connection
include('../assets/config/db.php');

// DataTables PHP library and database connection
include("lib/DataTables.php");

// Alias Editor classes so they are easy to use
use DataTables\Editor;
use DataTables\Editor\Field;
use DataTables\Editor\Format;
use DataTables\Editor\Mjoin;
use DataTables\Editor\Options;
use DataTables\Editor\Upload;
use DataTables\Editor\Validate;
use DataTables\Editor\ValidateOptions;

// Convert mysqli connection to PDO for DataTables Editor
$pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);

// Ensure exceptions are thrown on database errors
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Build our Editor instance and process the data coming from _POST
Editor::inst($pdo, 'Employees', 'employee_id')
    ->fields(
        Field::inst('first_name'),
        Field::inst('last_name'),
        Field::inst('email'),
        Field::inst('department_id'),
        Field::inst('manager_id'),
        Field::inst('role_id'),
        Field::inst('rfid_card_id'),
        Field::inst('external_id'),
        Field::inst('adp_employee_id'),
        Field::inst('employment_type'),
        Field::inst('temp_agency_id'),
        Field::inst('active'),
        Field::inst('created_at')
            ->validator(Validate::dateFormat('Y-m-d H:i:s'))
            ->getFormatter(Format::datetime('Y-m-d H:i:s', 'Y-m-d H:i:s'))
            ->setFormatter(Format::datetime('Y-m-d H:i:s', 'Y-m-d H:i:s')),
        Field::inst('created_by'),
        Field::inst('updated_at')
            ->validator(Validate::dateFormat('Y-m-d H:i:s'))
            ->getFormatter(Format::datetime('Y-m-d H:i:s', 'Y-m-d H:i:s'))
            ->setFormatter(Format::datetime('Y-m-d H:i:s', 'Y-m-d H:i:s')),
        Field::inst('updated_by')
    )
    ->process($_POST)
    ->json();