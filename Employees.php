<?php
// Database configuration
$servername = "localhost";
$username = "phpmyadmin";
$password = "KnzudGNfJoiQgKv3nUNY37";
$dbname = "time_attendance_system";

// DataTables PHP library
include("vendor/Editor/lib/DataTables.php");

// Alias Editor classes so they are easy to use
use DataTables\Editor;
use DataTables\Editor\Field;
use DataTables\Editor\Format;
use DataTables\Editor\Mjoin;
use DataTables\Editor\Options;
use DataTables\Editor\Upload;
use DataTables\Editor\Validate;
use DataTables\Editor\ValidateOptions;

// Database connection
$db = new \DataTables\Database([
    "type" => "Mysql",
    "user" => $username,
    "pass" => $password,
    "host" => $servername,
    "port" => "3306",
    "db"   => $dbname
]);

// Build our Editor instance and process the data coming from _POST
Editor::inst($db, 'employees')
    ->fields(
        Field::inst('employee_id'),
        Field::inst('first_name')
            ->validator(Validate::notEmpty(ValidateOptions::inst()
                ->message('A first name is required')
            )),
        Field::inst('last_name')
            ->validator(Validate::notEmpty(ValidateOptions::inst()
                ->message('A last name is required')
            )),
        Field::inst('email')
            ->validator(Validate::email(ValidateOptions::inst()
                ->message('Please enter a valid e-mail address')
            )),
        Field::inst('department_id'),
        Field::inst('manager_id'),
        Field::inst('role_id'),
        Field::inst('password_hash'),
        Field::inst('rfid_card_id'),
        Field::inst('external_id'),
        Field::inst('adp_employee_id'),
        Field::inst('employment_type'),
        Field::inst('temp_agency_id'),
        Field::inst('active'),
        Field::inst('created_at')
            ->validator(Validate::dateFormat('Y-m-d H:i:s'))
            ->getFormatter(Format::dateSqlToFormat('Y-m-d H:i:s'))
            ->setFormatter(Format::dateFormatToSql('Y-m-d H:i:s')),
        Field::inst('created_by'),
        Field::inst('updated_at')
            ->validator(Validate::dateFormat('Y-m-d H:i:s'))
            ->getFormatter(Format::dateSqlToFormat('Y-m-d H:i:s'))
            ->setFormatter(Format::dateFormatToSql('Y-m-d H:i:s')),
        Field::inst('updated_by')
    )
    ->debug(true)
    ->process($_POST)
    ->json();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employees DataTable</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/searchbuilder/1.1.0/css/searchBuilder.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.0.3/css/dataTables.dateTime.min.css">
    <link rel="stylesheet" type="text/css" href="https://editor.datatables.net/extensions/Editor/css/editor.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/searchbuilder/1.1.0/js/dataTables.searchBuilder.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.0.3/js/dataTables.dateTime.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
    <script src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js"></script>
    <style>
        th {
            background-color: #f2f2f2;
            font-size: 1.2em;
        }
    </style>
</head>
<body>
<h1>Employees DataTable</h1>
<table id="employeeTable" class="display" style="width:100%">
    <thead>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Department ID</th>
        <th>Manager ID</th>
        <th>Role ID</th>
        <th>Password Hash</th>
        <th>RFID Card ID</th>
        <th>External ID</th>
        <th>ADP Employee ID</th>
        <th>Employment Type</th>
        <th>Temp Agency ID</th>
        <th>Active</th>
        <th>Created At</th>
        <th>Created By</th>
        <th>Updated At</th>
        <th>Updated By</th>
    </tr>
    </thead>
</table>

<script>
    $(document).ready(function() {
        var editor = new $.fn.dataTable.Editor({
            ajax: "",
            table: "#employeeTable",
            fields: [
                { label: "ID", name: "employee_id" },
                { label: "First Name", name: "first_name" },
                { label: "Last Name", name: "last_name" },
                { label: "Email", name: "email" },
                { label: "Department ID", name: "department_id" },
                { label: "Manager ID", name: "manager_id" },
                { label: "Role ID", name: "role_id" },
                { label: "Password Hash", name: "password_hash" },
                { label: "RFID Card ID", name: "rfid_card_id" },
                { label: "External ID", name: "external_id" },
                { label: "ADP Employee ID", name: "adp_employee_id" },
                { label: "Employment Type", name: "employment_type" },
                { label: "Temp Agency ID", name: "temp_agency_id" },
                { label: "Active", name: "active" },
                { label: "Created At", name: "created_at" },
                { label: "Created By", name: "created_by" },
                { label: "Updated At", name: "updated_at" },
                { label: "Updated By", name: "updated_by" }
            ]
        });

        $('#employeeTable').DataTable({
            dom: 'Bfrtip',
            ajax: "",
            columns: [
                { data: "employee_id" },
                { data: "first_name" },
                { data: "last_name" },
                { data: "email" },
                { data: "department_id" },
                { data: "manager_id" },
                { data: "role_id" },
                { data: "password_hash" },
                { data: "rfid_card_id" },
                { data: "external_id" },
                { data: "adp_employee_id" },
                { data: "employment_type" },
                { data: "temp_agency_id" },
                { data: "active" },
                { data: "created_at" },
                { data: "created_by" },
                { data: "updated_at" },
                { data: "updated_by" }
            ],
            select: true,
            buttons: [
                { extend: "create", editor: editor },
                { extend: "edit",   editor: editor },
                { extend: "remove", editor: editor },
                'searchBuilder'
            ]
        });
    });
</script>
</body>
</html>