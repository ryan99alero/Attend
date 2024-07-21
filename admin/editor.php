<?php
include '../assets/config/db.php';
require '../vendor/datatables.net/editor-php/DataTables.php';

use DataTables\Editor;
use DataTables\Editor\Field;
use DataTables\Editor\Mjoin;
use DataTables\Editor\Options;
use DataTables\Editor\Validate;
use DataTables\Editor\ValidateOptions;

// Build the Editor instance and process the data coming from _POST

Editor::inst($db, 'TimeEntries', 'time_entry_id')
    ->fields(
        Field::inst('TimeEntries.time_entry_id'),
        Field::inst('Employees.first_name'),
        Field::inst('Employees.last_name'),
        Field::inst('Shifts.shift_name'),
        Field::inst('TimeEntries.clock_in_time')
            ->validator(Validate::datetime(ValidateOptions::inst()->format('Y-m-d H:i:s'))),
        Field::inst('TimeEntries.clock_out_time')
            ->validator(Validate::datetime(ValidateOptions::inst()->format('Y-m-d H:i:s'))),
        Field::inst('TimeEntries.status')
    )
    ->leftJoin('Employees', 'Employees.employee_id', '=', 'TimeEntries.employee_id')
    ->leftJoin('Shifts', 'Shifts.shift_id', '=', 'TimeEntries.shift_id')
    ->process($_POST)
    ->json();
?>
