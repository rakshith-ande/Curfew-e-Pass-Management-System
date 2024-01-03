<?php
	
	session_start();
	include '../includes/dbconnection.php';

	$id=$_GET['grant_id'];
	
	$sql="update pass set type=1 where ID='$id'";
	if($con->query($sql)==TRUE)
	{
		header("location: ./grant-pass.php");
	}
	else
	{
		echo "
		<script>
			alert('failed to grant permission');
		</script>
		";
	}

?>