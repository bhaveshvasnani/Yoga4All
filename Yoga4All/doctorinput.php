<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title>Yoga4All</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <meta name="keywords" content="Yoga, WorkPlace Yoga, Health, Online Yoga Lessons, Learn Yoga Positions, Yoga Tutorial, Meditation, Stress management, Fitness"/>
        <meta name="description" content="The perfect Yoga guide for anyone with time restriction providing accurate yoga exercises by a variety of yoga teachers."/>
		<link rel="stylesheet" href="assets/css/main.css" />
        <link rel="icon" href="images/icon.png">
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
			<section id="main">
				<div class="inner">
					<header class="major special">
						<h1>Add more solutions</h1>
					</header>

					<section>
							<form method="post" action="doctorinput.php">
								<div class="row uniform 50%">
                                    <div class="12u$">
										<div class="select-wrapper">
											<select name="problem" id="problem">
                                                <option value="">Select Problem</option>
												<option value="eye">Eye Problem</option>
												<option value="back">Back Problem</option>
                                                <option value="hair">Hair Problem</option>
												<option value="knee">Knee Problem</option>
                                                <option value="stomach">Stomach Problem</option>
											</select>
										</div>
									</div>
                                    <div id="add" class="add">
                                    <blockquote>
									<div class="4u$ 12u$(xsmall)">
										<input type="text" id="yoga" name="yoga" value="" placeholder="Add Yoga" style="width: 250px"/>
									</div>
                                    <div class="4u$ 12u$(xsmall)">
										<input type="text" id="desc" name="desc" value="" placeholder="Add Description" style="width: 250px"/>
									</div>
                                    </blockquote>
                                    </div>
									<div class="12u$">
										<ul class="actions">
											<div id="cont">
                                            <li><button class="button special" onclick="add_fields();" id="button">Add More</button></li><br><br></div>
                                            <li><input type="submit" value="Submit" name="addyoga" class="special" /></li>
											<li><input type="reset" value="Reset" /></li>
										</ul>
									</div>
								</div>
							</form>
						</section>
                </div>
                </section>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
            <script>
            var id = 0;
            function add_fields() {
                var divadd = document.getElementById('add');
                divadd.innerHTML+='<blockquote><div class="4u$ 12u$(xsmall)"><input type="text" id="yoga' + id.toString() + '" name="yoga" value="" placeholder="Add Yoga" style="width: 250px"/></div><div class="4u$ 12u$(xsmall)"><input type="text" id="desc' + id.toString() + '" name="desc" value="" placeholder="Add Description" style="width: 250px"/></div></blockquote>';
                id++;
                /*var objTo = document.getElementById('add')
                var divtest = document.createElement("div");
                divtest.innerHTML = "<div class='4u$ 12u$(xsmall)'>		<input type='text' id='yoga+.id.+' name='yoga' value='' placeholder='Add Yoga' style='width: 250px'/></div>        <div class='4u$ 12u$(xsmall)'><input type='text' id='desc' name='desc' value='' placeholder='Add Description' style='width: 250px'/></div>";

                objTo.appendChild(divtest)*/
                /*$(document).ready(function(){
                    $("#cont").on("click",".button",function() {
                        $("#add").append('<blockquote><div class="4u$ 12u$(xsmall)"><input type="text" id="yoga' + id.toString() + '" name="yoga" value="" placeholder="Add Yoga" style="width: 250px"/></div><div class="4u$ 12u$(xsmall)"><input type="text" id="desc' + id.toString() + '" name="desc" value="" placeholder="Add Description" style="width: 250px"/></div></blockquote>');
                        });
                    id++;
                });*/
            }
            </script>

	</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Yoga4All";
session_start();
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['addyoga'])){
$n=$_POST['problem'];
$y=$_POST['yoga'];
$m=$_POST['desc'];
$em=$_SESSION["email"];
$sql = "INSERT INTO yoga_desc (email, yoga, descr, problem) VALUES ('$em', '$y', '$m', '$n')";
if (mysqli_query($conn, $sql)) {
    echo "<header><h3><pre>    Thanks for your contribution.</pre></h3></header>";
    //header("Location: doctorinput.php");
}
}
mysqli_close($conn);
?>