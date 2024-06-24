<?php
// Database configuration
$servername = "localhost";
$username = "phpmyadmin";
$password = "KnzudGNfJoiQgKv3nUNY37";
$dbname = "time_attendance_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling server-side processing for DataTables
if (isset($_GET['draw'])) {
    $draw = $_GET['draw'];
    $start = $_GET['start'];
    $length = $_GET['length'];
    $searchValue = $_GET['search']['value'];

    $query = "SELECT * FROM employees WHERE 1=1";

    if (!empty($searchValue)) {
        $query .= " AND (first_name LIKE '%$searchValue%' OR last_name LIKE '%$searchValue%' OR email LIKE '%$searchValue%' OR employment_type LIKE '%$searchValue%')";
    }

    $totalQuery = "SELECT COUNT(*) as total FROM employees";
    $resultTotal = $conn->query($totalQuery);
    $totalData = $resultTotal->fetch_assoc()['total'];

    $query .= " LIMIT $start, $length";
    $result = $conn->query($query);

    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            $row['employee_id'],
            $row['first_name'],
            $row['last_name'],
            $row['email'],
            $row['department_id'],
            $row['manager_id'],
            $row['role_id'],
            $row['password_hash'],
            $row['rfid_card_id'],
            $row['external_id'],
            $row['adp_employee_id'],
            $row['employment_type'],
            $row['temp_agency_id'],
            $row['active'],
            $row['created_at'],
            $row['created_by'],
            $row['updated_at'],
            $row['updated_by']
        ];
    }

    $response = [
        "draw" => intval($draw),
        "recordsTotal" => intval($totalData),
        "recordsFiltered" => intval($totalData),
        "data" => $data
    ];

    echo json_encode($response);
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employees DataTable</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/searchbuilder/1.1.0/css/searchBuilder.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/searchbuilder/1.1.0/js/dataTables.searchBuilder.min.js"></script>
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
        $('#employeeTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "",
            "dom": 'Qfrtip',
            "searchBuilder": true,
            "columns": [
                { "data": 0 },
                { "data": 1 },
                { "data": 2 },
                { "data": 3 },
                { "data": 4 },
                { "data": 5 },
                { "data": 6 },
                { "data": 7 },
                { "data": 8 },
                { "data": 9 },
                { "data": 10 },
                { "data": 11 },
                { "data": 12 },
                { "data": 13 },
                { "data": 14 },
                { "data": 15 },
                { "data": 16 },
                { "data": 17 }
            ]
        });
    });
</script>
</body>
</html>