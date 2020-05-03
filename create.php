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
                session_start();

                if($_SESSION['auth'] == false){
                    echo "Please login to access this page!";
                    header('Location: index.php');
                }
                
                if(isset($_POST['back'])){
                    header("Location: main.php");
                }
            ?>
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						C.R.U.D Customer System Create.
					</span>
				</div>

                <p><?php
                    function getUserData(){

                        $dbuser = "root";
                        $dbaddress = "localhost";
                        $dbpass = "renan000";
                        $dbname = "customerSystem";
                        $conn = new mysqli($dbaddress, $dbuser, $dbpass, $dbname);

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
                        }if(isset($_POST['usrid'])){
                            $usrid = $_POST['usrid'];
                            $query = "SELECT * FROM customers WHERE CustID = $usrid";
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

                <p class="align">PLEASE INSERT DATA FOR NEW USER</p>
                <?php
                    if(isset($_POST['create'])) {  
                        if(isset($_POST['usrname']) and isset($_POST['usremail']) and isset($_POST['usrphone']) and isset($_POST['usraddress'])){
                            echo '<p style="text-align: center; color: blue">Successfuly inserted</p>';
                        }else{
                            echo '<p style="text-align: center; color: red">Please insert data in all fields</p>';
                        }
                    }
                ?>
                <form class="login101-form" method="post">
                    <p>NAME</p>
                    <input class="input101" type="text" name="usrname" placeholder="PLEASE INSERT NAME">
                    <span class="focus-input100"></span>
                    
                    <p>EMAIL</p>
                    <input class="input101" type="text" name="usremail" placeholder="PLEASE INSERT EMAIL">
                    <span class="focus-input100"></span>

                    <p>PHONE</p>
                    <input class="input101" type="text" name="usrphone" placeholder="PLEASE INSERT PHONE">
                    <span class="focus-input100"></span>
                    
                    <p>ADDRESS</p>
                    <input class="input101" type="text" name="usraddress" placeholder="PLEASE INSERT ADDRESS">
                    <span class="focus-input100"></span>
                                        
                    <input class="login100-form-btn" type="submit" name="back" value="BACK">
                    <input class="login100-form-btn" type="submit" name="create" value="CREATE"> 
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