<?php
	session_start();
	
	if(isset($_SESSION['uid']))
	{}
	else
		header('location: ../login.php');
?>
<?php include('header.php');?>
<div align="center">
<h1>Admin Dashboard</h1>
<a href="logout.php" ><button style="float:right; margin-right:7%;">Log out</button></a>

<div>
	<table align="center">
		<tr>
			<td>1.</td>
			<td><a href="addstu.php"><label>Insert Student</label></a></td>
		</tr>
		<tr>
			<td>2.</td>
			<td><a href="updatestu.php"><label>Update student</label></a></td>
		</tr>
		<tr>
			<td>3.</td>
			<td><a href="dltstu.php"></label>Delete Student</label></a></td>
		</tr>
	</table>
</div>
</body>
</html>