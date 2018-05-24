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
        <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"/>
        <link rel="stylesheet" href="assets/css/style1.css"/>
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="index.html" class="logo">Yoga4All</a>
					<nav id="nav">
						<a href="login.php">Login/Sign Up</a>
						<a href="about.html">About Us</a>
						<a href="contact.html">Contact Us</a>
					</nav>
				</div>
			</header>
			<a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>

		<!-- Main -->
			<section id="main">
				<div class="inner">
					<header class="major special">
						<h1>Log In/ Sign Up</h1>
					</header>

					<div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Sign Up for Free</h1>
          
          <form action="login.php" method="post">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" style="height:50px" name="fname"/>
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off" style="height:50px" name="lname"/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" style="height:50px" name="email"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" style="height:50px" name="pass"/>
          </div>
              
          <div class="field-wrap">
            <select name="usertype" style="height:50px" required>
                <option value=""><label style="color: white">
              Select User Type<span class="req">*</span>
            </label></option>  
                <option value="admin"><label>
              Doctor
            </label></option>
                <option value="user"><label>
              Patient
            </label></option>
            </select>
          </div>
          
          <input type="submit" class="button button-block" value="GET STARTED" name="signup" style="height: auto">
          
          </form>

        </div>
        
        <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form action="login.php" method="post">
          
            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" style="height:50px" name="email1"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" style="height:50px"  name="pass1"/>
          </div>
          
          <input type="submit" class="button button-block" value="Log In" style="height: auto" name="login">
          
          </form>

        </div>
        
      </div>
      
</div> 
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="assets/js/index.js"></script>
						
                </div>
                </section>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>

<?php

/*$user=$_POST['usertype'];
echo $user;
switch($user){
    case 'admin':
        header("Location: about.html");
        break;
    case 'user':
        header("Location: contact.html");
        break;
}*/

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Yoga4All";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['signup'])){
$fn=$_POST['fname'];
$ln=$_POST['lname'];
$em=$_POST['email'];
$p=$_POST['pass'];
$user=$_POST['usertype'];
$p=md5($p);
$sql = "INSERT INTO user_details (firstname, lastname, email, password, usertype) VALUES ('$fn', '$ln', '$em', '$p', '$user')";

if (mysqli_query($conn, $sql)) {
    $_SESSION["email"]=$em;
    if ($user=='admin')
        header("Location: doctorinput.php");
    else
        header("Location: userinput.html");
}
else{
    echo "Insert error. Try again!";
}
}
elseif(isset($_POST['login'])){
$em=$_POST['email1'];
$p=$_POST['pass1'];
$p=md5($p);
$sql = "SELECT usertype from user_details where email='$em' and password='$p'";
$result = mysqli_query($conn, $sql);
if (!$result || mysqli_num_rows($result)>0){
    $_SESSION["email"]=$em;
    while($row = mysqli_fetch_assoc($result)) {
        if ($row['usertype']=='admin'){
            header("Location: doctorinput.php");
            break;
        }
        else{
            header("Location: userinput.html");
            break;
        }
    }
    
}
else{
    echo "User doesn't exist. Try again!";
}
}

mysqli_close($conn);

?>