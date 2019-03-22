<?php
$servername = "localhost";
$username = "root";
$password = "";

// Checking connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Create database
$sql = "CREATE DATABASE Assignment3";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}
mysqli_close($conn);


$conn = new mysqli($servername, $username, $password, "Assignment3");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql code to create table
$sql = "CREATE TABLE eBook_MetaData (
        id Serial  PRIMARY KEY, 
        creator VARCHAR(150) NOT NULL,
        title VARCHAR(150) NOT NULL,
        type VARCHAR(150),
	identifier VARCHAR(150),
	date Date,
	language VARCHAR(150),
	description TEXT
        )";

if (mysqli_query($conn, $sql)) {
    echo "Table eBooks_MetaData created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);
?>

