<?php
	session_start();
	
	if(isset($_SESSION['uid']))
	{;}
	else
		header('location: ../login.php');
?>
<?php include('header.php');?>
<?php include('tittlehead.php');?>

<form method="post" action="addstu.php" enctype="multipart/form-data">
	<table align="center"  width="30%" >
		<tr>
			<td>Roll no.</td>
			<td><input type="text" name="rollno" placeholder="Roll No." required /></td>
		</tr>
			<td>Full Name</td>
			<td><input type="text" name="name" placeholder="Name"required /></td>
		<tr>
			<td>City</td>
			<td><input type="text" name="city" placeholder="city" required /></td>
		</tr>
		<tr>
			<td>Contact</td>
			<td><input type="text" name="contact" placeholder="Contact No." required /></td>
		</tr>
		<tr>
			<td>Standard</td>
			<td><input type="number" name="standard" placeholder="Standard" required /></td>
		</tr>
		<tr>
			<td><input type="file" name="img"  required /></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" value="Submit" name="submit"/></td>
		</tr>
	</table>
	</form>
</body>
</html>

<?php

if(isset($_POST['submit']))
{
	
	include('../dbcon.php');
	
	$rollno =  $_POST['rollno'];
	$name = $_POST['name'];
	$city =  $_POST['city'];
	$contact =  $_POST['contact'];
	$standard = $_POST['standard'];
	
	$imagename=$_FILES['img']['name'];
	$temp=$_FILES['img']['tmp_name'];
	
	move_uploaded_file($temp,"../dataimg/$imagename");
	
	$query= "INSERT INTO `student1`(`rollno`, `name`, `city`, `contact`, `standard`,`image`) VALUES ('$rollno','$name','$city','$contact','$standard','$imagename')";
	
	$run= mysqli_query($con,$query);
	
	if($run == true)
	{
?>
	<script>
		alert('Data enter successfully');
	</script>
<?php
	}
	
}

		 
		
?>