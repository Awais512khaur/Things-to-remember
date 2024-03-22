<?php
// Sample nested array with student data
$students = array(
    array("name" => "Awais", "regno" => "123", "class" => "10th", "address" => "Khaur"),
    array("name" => "Ali", "regno" => "123", "class" => "12th", "address" => "Khaur"),
    array("name" => "Tahir", "regno" => "123", "class" => "11th", "address" => "Khaur")
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Data</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Student Data</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Registration Number</th>
            <th>Class</th>
            <th>Address</th>
        </tr>
        <?php foreach ($students as $student): ?>
            <tr>
                <td><?php echo $student['name']; ?></td>
                <td><?php echo $student['regno']; ?></td>
                <td><?php echo $student['class']; ?></td>
                <td><?php echo $student['address']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
