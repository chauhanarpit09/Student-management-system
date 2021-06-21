<html>
<head>
	<title>Student Management System</title>
	<style>
		.admin{
				float:right;
				margin-right:10%;
		}
	</style>
</head>
<body>
<a href="login.php" ><button class="admin">Admin Login</button></a>
<form method="post" class="box" action="index.php" >
	<h1 style="margin-top:70px; margin-left:40%;" > Student Login</h1>
	<table align="center"style="width:40%;" border="1">
		<tr>
			<td><label>Roll No.</label></td>
			<td><input type="text" name="roll"  placeholder="Roll No"/></td>
		</tr>
		<tr>
			<td><label>Select Standard</label></td>
			<td>
			<select class="select" name="std" required />
			<option value="">--select standard--</option>
			<option value="1">1st</option>
			<option value="2">2nd</option>
			<option value="3">3rd</option>
			<option value="4">4th</option>
			<option value="5">5th</option>
			<option value="6">6th</option>
			<option value="7">7th</option>
			<option value="8">8th</option>
			<option value="9">9th</option>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="show" value="show info"/></td>
		</tr>
		</table>

</form>

<?php

	if(isset($_POST['show'])){
	include('dbcon.php');
	$s=$_POST['std'];
	$r=$_POST['roll'];
	
	$q="SELECT * FROM `student1` WHERE `rollno`='$r' AND `standard` ='$s'";
	$run=mysqli_query($con,$q);
	
	if($run==true)
	{
		$data = mysqli_fetch_assoc($run);
?>

	<table align="center"  width="80%" border="1" >
		<tr>
			<th>Roll no.</th>
			<th>Full Name</th>
			<th>City</th>
			<th>Contact</th>
			<th>Standard</th>
			<th>Image</th>
			
		</tr>
		<tr align="center">
			<td><?php echo $data['name']; ?></td>
			<td><?php echo $data['rollno'] ;?></td>
			<td><?php echo $data['city'] ;?></td>
			<td><?php echo $data['contact']; ?></td>
			<td><?php echo  $data['standard']; ?></td>
			<td><img src="dataimg/<?php echo $data['image'];?>" style="max-width:200px;" /></td>
		</tr>

	</table>
<?php	
	
	}
	else
	{
?>
		<script>
		alert('Data not found ');
	</script>
<?php
	}
	}
?>
</body>
</html>
