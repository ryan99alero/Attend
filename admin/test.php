<?php
require '../assets/config/conn.php';
try {
    // Begin the transaction
    $pdo->beginTransaction();

    // Insert a new employee record
    $stmt1 = $pdo->prepare("INSERT INTO employees (employee_id, firstname, lastname, address, birthdate, contact_info, position_id, schedule_id, photo, created_on) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, CURDATE())");
    $stmt1->execute(['E12345', 'John', 'Doe', '123 Elm Street', '1985-06-15', '555-1234', 1, 1, 'john_doe.jpg']);

    // Update an existing employee record
    $stmt2 = $pdo->prepare("UPDATE employees SET lastname = ? WHERE employee_id = ?");
    $stmt2->execute(['Smith', 'E67890']);

    // Commit the transaction
    $pdo->commit();
    echo "Transaction completed successfully.";
} catch (Exception $e) {
    // Rollback the transaction if something failed
    $pdo->rollBack();
    echo "Failed to complete transaction: " . $e->getMessage();
}
?>
