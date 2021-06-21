<?php
	include('../dbcon.php');
	
	$rollno =  $_POST['rollno'];
	$name = $_POST['name'];
	$city =  $_POST['city'];
	$contact =  $_POST['contact'];
	$standard = $_POST['standard'];
	$id=$_POST['sid'];
	
	$imagename=$_FILES['img']['name'];
	$temp=$_FILES['img']['tmp_name'];
	
	move_uploaded_file($temp,"../dataimg/$imagename");
	
	$query=" UPDATE `student1` SET `rollno`='$rollno',`name`='$name',`city`='$city',`contact`='$contact',`standard`='$standard',`image`='$imagename' WHERE  `id`=$id;";
	$run= mysqli_query($con,$query);
	
	if($run == true)
	{
?>
	<script>
		alert('Data updated sucessfully');
	</script>
<?php
	header('location:updatestu.php');
	}
?>