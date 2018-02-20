<?php
	session_start();

	if(isset($_SESSION['logged_in']) && $_SESSION['Type']=="Admin"){
		require_once 'GetUserInformation.php';
		$getAdminInfo = GetUserInformation2P("Admin",$_SESSION['EmailID']);
	}else{
		if ($_SESSION['Type']=="User") {
			header("location: UserDash.php");
		}else{
			header("location: Login.php");
		}
	}

	if($_SERVER['REQUEST_METHOD']=="POST"){
		if(isset($_POST['logOut'])){
			session_unset();
			session_destroy();
			header("location: Login.php");
		}else if(isset($_POST['update'])){
			//
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin | Blood Donors Network</title>
	<meta charset="utf-8">
	<style type="text/css">
		.MainContent{
			text-align: center;
			font-family: Harrington;
		}
	</style>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body class="MainContent">
	<h1 style="color: blue;">Welcome to Blood Donors Network</h1>
	<label>Go to <a href="/Blood Donors Network/Home.php"><p><i class="material-icons w3-spin w3-jumbo">home</i></p></a></label>
		<p>Hi, <?php echo $getAdminInfo['FirstName']?> </p>

			<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
				
				<div class="inputbox">
					<lable>First Name : </label> 
					<input type="text" name="firstname" value='<?php echo $getAdminInfo['FirstName']; ?>' required="">
					<br /><br />
				</div>

				<div class="inputbox">
					<label>Last Name : </label>
					<input type="text" name="lastname" value="<?php echo $getAdminInfo['LastName']; ?>" required="">
					<br /><br />
				</div>

				<div class="inputbox">
					<lable>Email ID : </lable>
					<input type="email" name="email" value="<?php echo $getAdminInfo['EmailID']; ?>" disabled>
					<br /><br />
				</div>

				<div class="inputbox">
					<lable>Password : </lable>
					<input type="password" name="password" value="<?php echo $getAdminInfo['Password']; ?>" required="">
					<br /><br />
			    </div>

				<div class="inputbox">
					<lable>Phone Number :</lable>
					<input type="text" name="phone" value="<?php echo $getAdminInfo['PhoneNumber']; ?>" required="">
					<br /><br />
				</div>

				<div class="inputbox">
					<label>Birth Date : </label>
					<input type="Date" name="birthDate" value="<?php echo $getAdminInfo['BirthDate']; ?>">
					<br><br>
			    </div>

			    <label>Gender : <?php echo $getAdminInfo['Gender']; ?></label>
			    <br /><br />

			    <label>Blood Group : <?php echo $getAdminInfo['BloodGroup']; ?></label>
			    <br /><br />

			    <div class="inputbox">
					<lable>Division :</lable>
					<input type="text" name="phone" value="<?php echo $getAdminInfo['Division']; ?>" required="">
					<br /><br />
				</div>

				<div class="inputbox">
					<lable>District :</lable>
					<input type="text" name="phone" value="<?php echo $getAdminInfo['District']; ?>" required="">
					<br /><br />
				</div>

				<div class="inputbox">
					<lable>Area :</lable>
					<input type="text" name="phone" value="<?php echo $getAdminInfo['Area']; ?>" required="">
					<br /><br />
				</div>
				
				<input type="submit" name="update" value="Update">
				<input type="submit" name="logOut" value="Log out">
			</form>
</body>
</html>