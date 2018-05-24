<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Yoga4All";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['send'])){
$n=$_POST['name'];
$em=$_POST['email'];
$m=$_POST['message'];
$sql = "INSERT INTO getintouch (name, email, message) VALUES ('$n', '$em', '$m')";
if (mysqli_query($conn, $sql)) {
    header("Location: index.html");
}
}
mysqli_close($conn);

?>