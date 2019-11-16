<?php
	session_start();
if(isset($_POST['login'])){
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		
		
		if(empty($email) == true || empty($pass) == true){
			echo "fill all!";
		}
		else{
           
			$conn=mysqli_connect('localhost','root','','fwa');
			$sql="select * from info where email='{$email}' and pass='{$pass}'";
			$get=mysqli_query($conn,$sql);
			$user=mysqli_fetch_assoc($get);

		if(	count($user) >0){

				if($user["utype"]=='Admin'){
					setcookie("uname", $user["uname"], time()+3600, "/");
			$_SESSION['uname']=$user["uname"];
			header('location: AdminHome.php');

		}
		

		elseif($user["utype"]=='User'){
					setcookie("uname", $user["uname"], time()+3600, "/");
			$_SESSION['uname']=$user["uname"];
			header('location: UserHome.php');

		}
		
		}	

	}	
	
	}
	
	
			
		


?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center>
	<form method="POST" action="signin.php">
			
			<legend><b>LOG IN</b><br><hr width="70"></legend>
			<table cellpadding="5px">
			<tr>
				<td>
			Email:<br><input type="email" name="email" value="">
			</td>
			</tr>
			<tr>
				<td>
			Password <br><input type="password" name="pass" value="">
			</td>
			</tr>
			
			
			<td style="border-top:1px solid #888;">
			<input type="submit" name="login" value="Login"/><br>
			Haven't registered yet?<a href="Registration.php">Register</a>
			</td>
			</tr>
			
			</table>

		


	</form>

</center>
</body>
</html>