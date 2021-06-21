<?php
	include('../dbcon.php');

	$id=$_GET['sid'];
	
	$query="DELETE FROM `student1` WHERE `id`=$id;";
	$run= mysqli_query($con,$query);
	
	if($run == true)
	{
?>
	<script>
		alert('Data deleted sucessfully');
	</script>
<?php
	header('location:dltstu.php');
	}
?>