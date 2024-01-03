<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="./js/jquery.min.js"></script>
	<script type="text/javascript" src="./js/semantic.min.js"></script>
	<link rel="stylesheet" type="text/css" href="./css/semantic.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/icon.min.css">
	<style>
		@media screen and (max-width: 768px)
		{
		
			#piechart_3d
			{
				width: 400px;
				height: 200px;
			}
		}
		@media screen and (min-width: 769px)
		{
			#piechart_3d
			{
				width: 900px;
				height: 500px; 
			}
		}
		#item:hover
		{
			border-left: 3px solid white;
			font-family: verdana;
		}
	</style>
</head>
<body>

	<div class="pusher">
	
		<br><br>
		<!--side menu-->
		<?php

			if(isset($_SESSION['user'])==true)
			{
				echo '

				<div class="ui sidebar left vertical inverted menu" style="background-color: #5a5d63;">
		            <a href="./" class="item" id="item"><b>HOME&nbsp;<i class="home icon"></i></b></a>
		            <a href="./precautions.php" class="item" id="item"><b>PRECAUTIONS&nbsp;<i class="warning sign icon"></i></b></a>
		            <a href="./quiz.php" class="item" id="item"><b>QUIZ&nbsp;<i class="edit icon"></i></b></a>
		            <a href="../" class="item" id="item"><b>CURFIEW-EPASS&nbsp;<i class="folder icon"></i></b></a>
		            <a href="./logout.php" class="item" id="item"><b>LOGOUT&nbsp;<i class="user circle icon"></i></b></a>
		        </div>

				';
			}
			else
			{
				echo '

				<div class="ui sidebar left vertical inverted menu" style="background-color: #5a5d63;">
		            <a href="./" class="item" id="item"><b>HOME&nbsp;<i class="home icon"></i></b></a>
		            <a href="./precautions.php" class="item" id="item"><b>PRECAUTIONS&nbsp;<i class="warning sign icon"></i></b></a>
		            <a href="./quiz.php" class="item" id="item"><b>QUIZ&nbsp;<i class="edit icon"></i></b></a>
		            <a href="../" class="item" id="item"><b>CURFIEW-EPASS&nbsp;<i class="folder icon"></i></b></a>
		            <a href="./login.php" class="item" id="item"><b>LOGIN&nbsp;<i class="user icon"></i></b></a>
		        </div>

				';
			}

		?>

        <div class="ui basic icon top fixed stackable menu" id="sidemenu">
            <div id="toggle" class="item">
                <i class="sidebar icon"></i>&nbsp;
                Menu
            </div>
        </div>
        <!--//side menu-->
        <script>
	
			$("#toggle").click(function(){
		        $(".ui.sidebar").sidebar("toggle");
		    })

		</script>

</body>
</html>