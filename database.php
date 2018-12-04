<?php
/* Database connection settings */
$host = 'mysql.comp.polyu.edu.hk';
$username = '16086542d';
$password = 'bkgqihss';
$database = '16086542d';
$conn = new mysqli($host, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
