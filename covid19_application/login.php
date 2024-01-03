<?php
	include 'menu.php';

	$con = new mysqli("localhost","root","","covid19");
	if(isset($_POST['submit']))
	{
		$name=$_POST['uname'];
		$pwd=$_POST['pwd'];

		if(empty($name)&&empty($pwd))
		{
			echo "

			<div class='ui tiny modal'>
				<i class='red circle close icon'></i>
				<div class='content'>
					<b>Fields should not be empty</b>
				</div>
			  </div>

			";
		}
		else if(!empty($name)&&!empty($pwd))
		{
			$user="";
			$sql = "select * from admin where username='".$name."' and password='".$pwd."'";
			$result = $con->query($sql);
			if($result->num_rows==1)
			{
				while($row = $result->fetch_assoc())
				{
					$user=$row['username'];
				}
				$_SESSION['user']=$user;
				header("Location: ./");
			}
			else
			{
				echo "<div class='ui tiny modal'>
						<i class='red circle close icon'></i>
						<div class='content'><b>username or password is invalid</b></div>
					  </div>";
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./css/semantic.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/icon.min.css">
</head>
<body>


	<div class="ui teal raised centered header segment" style="margin-top: 0px;">
		LOGIN
	</div>
	<div class="ui stackable grid">
		<div class="three wide column"></div>
		<div class="ten wide column">
			<div class="ui teal raised segment">
				<form class="ui form" method="post">
					<div class="ui field">
						<label class="ui label">Username</label>
						<input type="text" name="uname" placeholder="Enter Username">
					</div>
					<div class="ui field">
						<label class="ui label">Password</label>
						<input type="password" name="pwd" placeholder="Enter Password">
					</div>
					<div class="ui field">
						<button class="ui blue button" type="submit" name="submit">LOGIN</button>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>
<script>
	$('.tiny.modal').modal('show');
</script>