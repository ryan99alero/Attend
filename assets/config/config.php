<?php

// ensure DataTables.php was included
// this file must not be included when installed using composer
if (!defined('DATATABLES')) {
    exit(1);
}

// Enable error reporting for debugging (remove for production)
error_reporting(\E_ALL);
ini_set('display_errors', '1');

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Database user / pass
 */
$sql_details = [
    'type' => 'Mysql',     // Database type: "Mysql", "Postgres", "Sqlserver", "Sqlite" or "Oracle"
    'user' => 'phpmyadmin',          // Database user name
    'pass' => 'KnzudGNfJoiQgKv3nUNY37',          // Database password
    'host' => '127.0.0.1', // Database host
    'port' => '3306',          // Database connection port (can be left empty for default)
    'db' => 'apsystem',          // Database name
    'dsn' => 'charset=utf8mb4',          // PHP DSN extra information. Set as `charset=utf8mb4` if you are using MySQL
    'pdoAttr' => array( PDO::ATTR_STRINGIFY_FETCHES => true ),   // PHP PDO attributes array. See the PHP documentation for all options
];

// This is included for the development and deploy environment used on the DataTables
// server. You can delete this block - it just includes my own user/pass without making
// them public!
if (is_file($_SERVER['DOCUMENT_ROOT'] . '/datatables/pdo.php')) {
    include $_SERVER['DOCUMENT_ROOT'] . '/datatables/pdo.php';
}
// /End development include