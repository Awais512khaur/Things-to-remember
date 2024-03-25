<?php
$students = array(
    array("name" => "Awais", "regno" => "123", "class" => "10th", "address" => "Khaur"),
    array("name" => "Ali", "regno" => "123", "class" => "12th", "address" => "Khaur"),
    array("name" => "Tahir", "regno" => "123", "class" => "11th", "address" => "Khaur")
);
$host = 'localhost'; 
$username = 'root'; 
$password = ''; 
$database = 'news';
$conn = mysqli_connect($host, $username, $password, $database);
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
    <h2>Student Data</h2>
  <?php  $query = mysqli_query($conn, "SELECT * FROM registration");
if (!$query) {
    die("Error fetching data: " . mysqli_error($conn));
}

$dataArray = array();
while ($row = mysqli_fetch_assoc($query)) {
    $dataArray[] = $row; 
 } ?>
 <table >
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Passowrd</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dataArray as $row): ?>
            <tr>
                <td><?php echo $row['ID']; ?></td>
                <td><?php echo $row['Name']; ?></td>
                <td><?php echo $row['Email']; ?></td>
                <td><?php echo $row['Password']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php
while ($row = mysqli_fetch_assoc($query)) {
    $dataArray[] = $row; 
}
?>
<table>
<h2>Student Data</h2>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Passowrd</th>
        </tr>
    </thead>
<?php for($i = 0; $i < count($dataArray); $i++) { ?>
    
    <tr>
        <td><?php echo $dataArray[$i]['Name']; ?></td>
        <td><?php echo $dataArray[$i]['Email']; ?></td>
        <td><?php echo $dataArray[$i]['Password']; ?></td>
    </tr>
    
<?php } ?>
</table>
</body>
</html>
<!-- In this I have a main array in that array some more array  -->