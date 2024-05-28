<?php
// Include the DataTables PHP library and database connection
require '../vendor/autoload.php';
require '../assets/config/conn.php';

use DataTables\Editor;
use DataTables\Editor\Field;
use DataTables\Editor\Format;
use DataTables\Editor\Mjoin;
use DataTables\Editor\Options;
use DataTables\Editor\Upload;
use DataTables\Editor\Validate;
use DataTables\Editor\ValidateOptions;

try {
    // Build the Editor instance and process the data coming from _POST
    Editor::inst($pdo, 'employees', 'id')
        ->fields(
            Field::inst('employee_id')
                ->validator(Validate::notEmpty(ValidateOptions::inst()
                    ->message('Employee ID is required'))),
            Field::inst('firstname')
                ->validator(Validate::notEmpty(ValidateOptions::inst()
                    ->message('First name is required'))),
            Field::inst('lastname')
                ->validator(Validate::notEmpty(ValidateOptions::inst()
                    ->message('Last name is required'))),
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
        ->debug(true) // Add debugging
        ->process($_POST)
        ->json();
} catch (\Exception $e) {
    throw $e;
}
?>