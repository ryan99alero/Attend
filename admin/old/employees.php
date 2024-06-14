<?php
// Include the DataTables PHP library and database connection
require '../vendor/autoload.php';
require '../assets/config/db.php';

use DataTables\Editor;
use DataTables\Editor\Field;
use DataTables\Editor\Format;
use DataTables\Editor\Mjoin;
use DataTables\Editor\Options;
use DataTables\Editor\Upload;
use DataTables\Editor\Validate;
use DataTables\Editor\ValidateOptions;

// Build the Editor instance and process the data coming from _POST
Editor::inst($pdo, 'employees', 'id')
    ->fields(
        Field::inst('employee_id'),
        Field::inst('firstname'),
        Field::inst('lastname'),
        Field::inst('address'),
        Field::inst('birthdate')
            ->validator(Validate::dateFormat('Y-m-d'))
            ->getFormatter(Format::dateSqlToFormat('Y-m-d'))
            ->setFormatter(Format::dateFormatToSql('Y-m-d')),
        Field::inst('contact_info'),
        Field::inst('position_id'),
        Field::inst('schedule_id'),
        Field::inst('photo'),
        Field::inst('created_on')
            ->validator(Validate::dateFormat('Y-m-d'))
            ->getFormatter(Format::dateSqlToFormat('Y-m-d'))
            ->setFormatter(Format::dateFormatToSql('Y-m-d'))
    )
    ->process($_POST)
    ->json();
?>

<!DOCTYPE html>
<html lang="">
<head>
    <title>Employees</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/datatables.min.css"/>
<!--    <link rel="stylesheet" type="text/css" href="../assets/css/editor.dataTables.min.css"/>-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/datatables.css"/>
    <script src="../../vendor/components/jquery/jquery.min.js"></script>
<!--    <script src="../assets/js/jquery.min.js"></script>-->
<!--    <script src="../assets/js/datatables.min.js"></script>-->
<!--    <script src="../assets/js/dataTables.editor.min.js"></script>-->
    <script src="../../assets/js/datatables.min.js"></script>
    <script src="../../assets/js/datatables.js"></script>
</head>
<body>
    <table id="employees" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Employee ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>Birthdate</th>
                <th>Contact Info</th>
                <th>Position ID</th>
                <th>Schedule ID</th>
                <th>Photo</th>
                <th>Created On</th>
            </tr>
        </thead>
    </table>

    <script>
        $(document).ready(function() {
            var editor = new $.fn.dataTable.Editor({
                ajax: "http://192.168.29.54/admin/employees.php",
                table: "#employees",
                fields: [
                    { label: "Employee ID", name: "employee_id" },
                    { label: "First Name", name: "firstname" },
                    { label: "Last Name", name: "lastname" },
                    { label: "Address", name: "address" },
                    { label: "Birthdate", name: "birthdate", type: "datetime" },
                    { label: "Contact Info", name: "contact_info" },
                    { label: "Position ID", name: "position_id" },
                    { label: "Schedule ID", name: "schedule_id" },
                    { label: "Photo", name: "photo" },
                    { label: "Created On", name: "created_on", type: "datetime" }
                ]
            });

            $('#employees').DataTable({
                dom: "Bfrtip",
                ajax: "http://192.168.29.54/admin/employees.php",
                columns: [
                    { data: "employee_id" },
                    { data: "firstname" },
                    { data: "lastname" },
                    { data: "address" },
                    { data: "birthdate" },
                    { data: "contact_info" },
                    { data: "position_id" },
                    { data: "schedule_id" },
                    { data: "photo" },
                    { data: "created_on" }
                ],
                select: true,
                buttons: [
                    { extend: "create", editor: editor },
                    { extend: "edit", editor: editor },
                    { extend: "remove", editor: editor }
                ]
            });
        });
    </script>
</body>
</html>
