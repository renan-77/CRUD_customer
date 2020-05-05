<!DOCTYPE html>
<html lang="en">
<head>
	<title>CRUD Customer</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
            <?php
                //Starting session.
                session_start();

                //Checking login.
                if($_SESSION['auth'] == false){
                    echo "Please login to access this page!";
                    header('Location: index.php');
                }
                
                //Back button action.
                if(isset($_POST['back'])){
                    header("Location: main.php");
                }
            ?>
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						C.R.U.D Customer System Search.
					</span>
				</div>

                <p><?php
                    function getUserData(){

                        $dbuser = "root";
                        $dbaddress = "localhost";
                        $dbpass = "renan000";
                        $dbname = "customerSystem";
                        $conn = new mysqli($dbaddress, $dbuser, $dbpass, $dbname);

                        //Query for retrieving user data from username
                        if(isset($_POST['usr'])){
                            $usrname = $_POST['usr'];
                            $query = "SELECT * FROM customers WHERE CustName = '$usrname'";
                            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                            while($row = mysqli_fetch_array($result)) {
                                // echo "Customer ID: $row[0] ";
                                // echo "Customer NAME: $row[1] ";
                                // echo "Customer EMAIL: $row[2] ";
                                // echo "Customer PHONE: $row[3] ";
                                // echo "Customer ADDRESS: $row[4] ";
                                return $row;
                            }
                        //Query for retrieving user data from userid
                        }if(isset($_POST['usrid'])){
                            $usrid = $_POST['usrid'];
                            $query = "SELECT CustID,CustName,CustEmail,CustPhone,CustAddress FROM customers WHERE CustID = $usrid";
                            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                            while($row = mysqli_fetch_array($result)) {
                                // echo "Customer ID: $row[0] ";
                                // echo "Customer NAME: $row[1] ";
                                // echo "Customer EMAIL: $row[2] ";
                                // echo "Customer PHONE: $row[3] ";
                                // echo "Customer ADDRESS: $row[4] ";
                                return $row;
                            }
                        } 
                    }
                ?></p>

                <p class="align">PLEASE INSERT EITHER ID OR USERNAME FOR SEARCH</p>

				<form class="login101-form validate-form" method="post">
						<p>USER ID</p>
						<input class="input101" type="text" name="usrid" placeholder="Enter USER ID">
						<span class="focus-input100"></span>

						<p>USERNAME</p>
						<input class="input101" type="text" name="usr" placeholder="Enter USERNAME">
						<span class="focus-input100"></span>
                    
                            <input class="login100-form-btn" type="submit" name="back" value="BACK">
                            <input class="login100-form-btn" type="submit" name="search" value="SEARCH"> 
                </form>
                <p class="align">QUERY RESULTS:</p>
                <form id="searchResults" class="login101-form">
                    <p>ID</p>
                    <input class="input101" type="text" readonly name="usrid" value=<?php echo getUserData()[0]; ?>>
                    <span class="focus-input100"></span>

                    <p>NAME</p>
                    <input class="input101" type="text" readonly name="usrname" value=<?php echo getUserData()[1]; ?>>
                    <span class="focus-input100"></span>
                    
                    <p>EMAIL</p>
                    <input class="input101" type="text" readonly name="usremail" value=<?php echo getUserData()[2]; ?>>
                    <span class="focus-input100"></span>

                    <p>PHONE</p>
                    <input class="input101" type="text" readonly name="usrphone" value=<?php echo getUserData()[3]; ?>>
                    <span class="focus-input100"></span>
                    
                    <p>ADDRESS</p>
                    <input class="input101" type="text" readonly name="usraddress" value=<?php echo getUserData()[4]; ?>>
                    <span class="focus-input100"></span>
                </form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>