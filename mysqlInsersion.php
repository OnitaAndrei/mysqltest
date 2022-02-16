<?php
$employees = include 'employees.php';
$servername = 'localhost';
$username = 'root';
$password = '2009';
$dbname = 'test';
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// foreach ($employees as $employee) {
//     if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",
//      $employee['date'])) {
//         $sql = "INSERT INTO `employee`(`name`, `salary`, `date`) VALUES ('" .
//         $employee['name'] . "','" . $employee['salary'] . "','" . $employee['date']."')";
//     } else {
//         $sql = "INSERT INTO `employee`(`name`) VALUES ('test')";
//     }
//     if ($conn->query($sql) === TRUE) {
//         echo "New record created successfully<br>";
//     } else {
//         echo "Error: " . $sql . "<br>" . $conn->error;
//     }    
// }
function bestPaidEmp($conn)
{
    $sql = "SELECT * FROM employee WHERE salary>50";
    $result=$conn->query($sql);
    if ($conn->error==FALSE) {
        echo "bestPaidEmp method ran successfully<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    var_dump($result->fetch_array());
}
function mostRecentEmp($conn)
{
    $sql = "SELECT * FROM employee WHERE date BETWEEN '2018-01-01 00:00:00' AND '2021-01-01 00:00:00'";
    $result=$conn->query($sql);
    if ($conn->error==FALSE) {
        echo "mostRecentEmp method ran successfully<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    var_dump($result->fetch_array());

}
function salaryList($conn)
{
    $sql = "SELECT distinct salary FROM employee;";
    $result=$conn->query($sql);
    if ($conn->error==FALSE) {
        echo "salaryList method ran successfully<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    var_dump($result->fetch_array());

}
function salaryRaise($conn)
{
    $sql = "UPDATE employee SET salary=salary+0.25*salary";
    if ($conn->query($sql) === TRUE) {
        echo "salaryRaise method ran successfully<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
bestPaidEmp($conn);
mostRecentEmp($conn);
salaryList($conn);
salaryRaise($conn);
$conn->close();
