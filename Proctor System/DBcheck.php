<?php
$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "blueberry";
$dbName = "myDB";
// Database Name
session_start();
$conn = new mysqli($serverName, $dbUsername, $dbPassword, $dbName);
// Connnection
if ($conn -> connect_error)
  die("Connection failed: " . $conn -> connect_error);

$sql1 = "DROP TABLE proctors";

$sql2 = "DROP TABLE students";

$sql3 = "CREATE TABLE proctors (
    id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name1 VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    phoneno VARCHAR(10),
    pass VARCHAR(50)
    )" ;

$sql4 = "CREATE TABLE students (
    USN VARCHAR(10) PRIMARY KEY,
    name1 VARCHAR(30),
    email VARCHAR(50),
    proctorname VARCHAR(30),
    phoneno VARCHAR(10),
    pass VARCHAR(50)
    )";

$sql5 = "CREATE TABLE students2 (
    name1 VARCHAR(50) PRIMARY KEY,
    proctorname VARCHAR(30),
    dob DATE,
    blood VARCHAR(5),
    phoneno VARCHAR(10),
    email VARCHAR(50),
    fname VARCHAR(50),
    focc VARCHAR(50),
    fno VARCHAR(10),
    femail VARCHAR(50),
    fadd VARCHAR(300),
    mname VARCHAR(50),
    mocc VARCHAR(50),
    mno VARCHAR(10),
    memail VARCHAR(50),
    madd VARCHAR(300),
    acc VARCHAR(12)
    )";


if ($conn->query($sql5) === TRUE) {
    echo "Table  3 created\n";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>