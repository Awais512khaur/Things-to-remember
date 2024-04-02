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
<?php
class news 
{

}
?>

OOP
Symfony 

<!-- OOP in PHP -->

<?php

class Database {
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'news';
    private $conn;

    public function __construct() {
        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function getStudents() {
        $students = array(
            array("name" => "Awais", "regno" => "123", "class" => "10th", "address" => "Khaur"),
            array("name" => "Ali", "regno" => "123", "class" => "12th", "address" => "Khaur"),
            array("name" => "Tahir", "regno" => "123", "class" => "11th", "address" => "Khaur")
        );
        return $students;
    }

    public function getRegistrations() {
        $query = mysqli_query($this->conn, "SELECT * FROM registration");
        if (!$query) {
            die("Error fetching data: " . mysqli_error($this->conn));
        }

        $registrations = array();
        while ($row = mysqli_fetch_assoc($query)) {
            $registrations[] = $row;
        }
        return $registrations;
    }
}

class StudentData {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function displayStudents() {
        $students = $this->db->getStudents();
        echo "<h2>Student Data</h2>";
        echo "<table>";
        echo "<tr><th>Name</th><th>Registration Number</th><th>Class</th><th>Address</th></tr>";
        foreach ($students as $student) {
            echo "<tr>";
            echo "<td>{$student['name']}</td><td>{$student['regno']}</td><td>{$student['class']}</td><td>{$student['address']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    public function displayRegistrations() {
        $registrations = $this->db->getRegistrations();
        echo "<h2>Registration Data</h2>";
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Password</th></tr>";
        foreach ($registrations as $row) {
            echo "<tr>";
            echo "<td>{$row['ID']}</td><td>{$row['Name']}</td><td>{$row['Email']}</td><td>{$row['Password']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}

$db = new Database();
$studentData = new StudentData($db);
$studentData->displayStudents();
$studentData->displayRegistrations();

?>
