<?php
	session_start();
	if(isset($_SESSION['uid']))
	{
		header('location:admin/dash.php');
	}
?>
<html>
<head>
 <meta charset="utf-8">
 <title>Admin Login </title>

</head>
<body>
<form action="login.php" method="post">
	<h1 style="margin-top:70px; margin-left:40%;" > Admin Login</h1>
   <table align="center"style="width:30%;">
		<tr>
			<td><label>Username</label></td>
			<td> <input type="text" name="uname" placeholder="Username"/></td>
		</tr>
		<tr>
			<td><label>Password</label></td>
			<td><input type="password" name="pass" placeholder="Password"></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="login" value="Login"></td>
		</tr>
		</table>
</form>


  </body>
</html>
<?php
	include('dbcon.php');
	if(isset($_POST['login']))
	{
		$username = $_POST['uname'];
		$password = $_POST['pass'];
		
		$query = "SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = '$password'";
		$run = mysqli_query($con,$query);
		$row = mysqli_num_rows($run);
		if($row <1)
		{
?>
			<script> alert('username or password not match')
			window.open('login.php','_self')
			</script>
<?php
		
		}
		else
		{
			$data = mysqli_fetch_assoc($run);
			$id = $data['id'];
			$_SESSION['uid']=$id;
			header('location:admin/dash.php');
		}
	}
		
	
?>