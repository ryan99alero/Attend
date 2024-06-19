<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Time and Attendance</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/datatables.css">
</head>
<body>
<table id="attendance" class="display" style="width:100%">
    <thead>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Shift</th>
        <th>Clock In</th>
        <th>Clock Out</th>
        <th>Status</th>
    </tr>
    </thead>
</table>

<script type="text/javascript" charset="utf8" src="../assets/js/datatables.js"></script>
<script>
    $(document).ready(function() {
        var editor = new $.fn.dataTable.Editor({
            ajax: "editor.php",
            table: "#attendance",
            fields: [
                { label: "First Name", name: "Employees.first_name" },
                { label: "Last Name", name: "Employees.last_name" },
                { label: "Shift", name: "Shifts.shift_name" },
                { label: "Clock In", name: "TimeEntries.clock_in_time", type: "datetime" },
                { label: "Clock Out", name: "TimeEntries.clock_out_time", type: "datetime" },
                { label: "Status", name: "TimeEntries.status" }
            ]
        });

        $('#attendance').DataTable({
            dom: "Bfrtip",
            ajax: "editor.php",
            columns: [
                { data: "TimeEntries.time_entry_id" },
                { data: "Employees.first_name" },
                { data: "Employees.last_name" },
                { data: "Shifts.shift_name" },
                { data: "TimeEntries.clock_in_time" },
                { data: "TimeEntries.clock_out_time" },
                { data: "TimeEntries.status" }
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