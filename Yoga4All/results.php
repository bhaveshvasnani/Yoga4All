<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title>Yoga4All</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <meta name="keywords" content="Yoga, WorkPlace Yoga, Health, Online Yoga Lessons, Learn Yoga Positions, Yoga Tutorial, Meditation, Stress management, Fitness"/>
        <meta name="description" content="The perfect Yoga guide for anyone with time restriction providing accurate yoga exercises by a variety of yoga teachers."/>
        <link rel="icon" href="images/icon.png">
		<link rel="stylesheet" href="assets/css/main.css" />
        <link rel="stylesheet" ref="https://www.w3schools.com/w3css/4/w3.css">
        <style>

.card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 30%;
    margin: 20px;
}

.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
            
.container {
    padding: 2px 16px;
}
.box {
  width: 100%;
  margin: 0px;
  background: rgba(255,255,255,0.2);
  padding: 5px;
  border: 2px solid #fff;
  border-radius: 20px/50px;
  background-clip: padding-box;
  text-align: center;
}

.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
}

.popup {
  margin: 70px auto;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width: 30%;
  position: relative;
  transition: all 5s ease-in-out;
}

.popup .close {
  position: absolute;
  top: 20px;
  right: 30px;
  transition: all 200ms;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
}
.popup .close:hover {
  color: #06D85F;
}
.popup .content {
  max-height: 30%;
  overflow: auto;
}

@media screen and (max-width: 700px){
  .box{
    width: 70%;
  }
  .popup{
    width: 70%;
  }
}
        </style>
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="index.html" class="logo">Yoga4All</a>
					<nav id="nav">
						<a href="logout.php">Log Out</a>
					</nav>
				</div>
			</header>
			<a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>

		<!-- Main -->
			<section id="main"><div class="inner"><center><header class="major special"><h1>Results</h1></header></center></div></section>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Yoga4All";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$p=$_POST['problem'];

$sql = "select firstname,lastname,email from user_details where email=(SELECT distinct email from yoga_desc where problem='$p')";
$result = mysqli_query($conn, $sql);
if (!$result || mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)) {
        $em1=$row['email'];
        $sql1="select yoga,descr from yoga_desc where email='$em1' and problem='$p'";
        $result1 = mysqli_query($conn, $sql1);
        if (!$result1 || mysqli_num_rows($result1)>0){
            while($row1 = mysqli_fetch_assoc($result1)) {
                echo '<div class="card"> 
                      <center><h2>'.$row['firstname'].' '.$row['lastname'].'</h2></center>
                    <img src="images/avatar.png" style="width:100%" alt="avatar">
                    <center><div class="box"><center>
	<a id="km" class="button" href="#popup1">Know More</a>
</center></div></center></div>
<div id="popup1" class="overlay">
	<div class="popup">
		<h2>'.$row1['yoga'].'</h2>
		<a class="close" href="#">&times;</a>
		<div class="content">
			'.$row1['descr'].'
		</div>
	</div>
</div>';
            }
        }
    }
}
mysqli_close($conn);

?>