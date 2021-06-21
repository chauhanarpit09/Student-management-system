<?php
	session_start();
	
	if(isset($_SESSION['uid']))
	{}
	else
		header('location: ../login.php');
?>
<?php   include('header.php');
		include('tittlehead.php');
		include('../dbcon.php');
		
		$sid =  $_GET['sid'];
		$sql="SELECT * FROM `student1` WHERE `id` ='$sid'";
		$run=mysqli_query($con,$sql);
		
		$data= mysqli_fetch_assoc($run);
	  
?>


<form method="post" action="updatedata.php" enctype="multipart/form-data">
	<table align="center"  width="30%" >
		<tr>
			<td>Roll no.</td>
			<td><input type="text" name="rollno"  value="<?php echo $data['rollno'] ?>" required /></td>
		</tr>
			<td>Full Name</td>
			<td><input type="text" name="name"  value="<?php echo $data['name'] ?>" required /></td>
		<tr>
			<td>City</td>
			<td><input type="text" name="city" value="<?php echo $data['city'] ?>"  required /></td>
		</tr>
		<tr>
			<td>Contact</td>
			<td><input type="text" name="contact" value="<?php echo $data['contact'] ?>" required /></td>
		</tr>
		<tr>
			<td>Standard</td>
			<td><input type="number" name="standard"  value="<?php echo  $data['standard'] ?>" required /></td>
		</tr>
		<tr>
			<td><input type="file" name="img"  required /></td>
		</tr>
		<tr>
			<input type="hidden" name="sid" value="<?php echo $data['id']?>"/>
			<td colspan="2" align="center"><input type="submit" value="Submit" name="submit"/></td>
		</tr>
	</table>
	</form>
</body>
</html>
