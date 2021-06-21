<?php
	session_start();
	
	if(isset($_SESSION['uid']))
	{}
	else
		header('location: ../login.php');
?>
<?php include('header.php');?>
<?php include('tittlehead.php');?>
<form action="dltstu.php" method="post">
	<table align="center">
		<tr>
			<th><label>Enter standard</label></th>
			<td><input type="number" name="standard" placeholder=" standard" required /><br></td>
		</tr>
		<tr>
			<th><label>Enter full name</label></th>
			<td><input type="text" name="stuname" placeholder="student name" required /><br></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="submit" value="Search"/></td>
		</tr>
	</table>
</form>


<table align="center" border="1" width="80%">
	<tr>
		<th>No</th>
		<th>image</th>
		<th>Name</th>
		<th>Roll no</th>
		<th>Edit</th>
	</tr>
	<?php
	if(isset($_POST['submit']))
	{
		include('../dbcon.php');
		
		$standard = $_POST['standard'];
		$name = $_POST['stuname'];
		
		$qry= "SELECT * FROM `student1` WHERE `standard` = '$standard' AND `name` LIKE '%$name%'";
		
		$run=mysqli_query($con,$qry);
		
		if(mysqli_num_rows($run)<1)
		{
			echo "<tr><td colspan='5' align='center'> No record Found</td></tr>";
		}
		else
		{
			$count=0;
			while($data=mysqli_fetch_assoc($run))
			{
	?>
			<tr>
				<th><?php echo $count+1 ;?></th>
				<th><img src="../dataimg/<?php echo $data['image'];?>" style="max-width:100px;" /></th>
				<th><?php echo $data['name'] ?> </th>
				<th><?php echo $data['rollno'] ?></th>
				<th><a href="delete.php?sid=<?php echo $data['id']; ?> ">Delete Record</a></th>
				
			</tr>
		<?php
			}
		}
	}
?>
</table>
</body>
</html>
