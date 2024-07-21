<?php
require '../vendor/autoload.php';

use DataTables\Editor;

try {
    $editor = new Editor();
    echo "DataTables Editor class instantiated successfully.";
} catch (Exception $e) {
    echo "Failed to instantiate DataTables Editor class: " . $e->getMessage();
}
?>
