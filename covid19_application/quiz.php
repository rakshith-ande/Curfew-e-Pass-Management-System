<?php
	include 'menu.php';
	$one="";
	$two="";
	$three="";
	$four="";
	$five="";
	if(isset($_POST['submit']))
	{
		$one=$_POST['one'];
		$two=$_POST['two'];
		$three=$_POST['three'];
		$four=$_POST['four'];
		$five=$_POST['five'];
		if(empty($one)&&empty($two)&&empty($three)&&empty($four)&&empty($five))
		{
			echo "
					<div class='ui tiny modal'>
						<i class='red circle close icon'></i>
						<div class='content'><b>Fields should not be empty</b></div>
					</div>";
		}
		else
		{
			$result=$one+$two+$three+$four+$five;
			if($result<3)
			{
				echo "
					<div class='ui tiny modal'>
						<i class='red circle close icon'></i>
						<div class='content'><b>your symptoms are far away</b></div>
					</div>";
			}
			if($result==3)
			{
				echo "
					<div class='ui tiny modal'>
						<i class='red circle close icon'></i>
						<div class='content'><b>your symptoms are moderately matching</b></div>
					</div>";
			}
			if($result>=4)
			{
				echo "
					<div class='ui tiny modal'>
						<i class='red circle close icon'></i>
						<div class='content'><b>your symptoms are very closely matching</b></div>
					</div>";
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Quiz</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
</head>
<body>

	<!--header-->
	<div class="pusher" style="background-image: url('./covid_bg.jpg');">
	<div class="ui teal raised centered header segment" style="margin-top: 0px;">
		QUIZ
	</div>
	<!--//header-->

	<div class="ui stackable grid container">
		<div class="sixteen wide column">
			<div class="ui teal raised segment">
				<form class="ui form" method="post">
					<div class="ui raised segment">
						1) Are you facing dyspnea(breathing problem)?<br><br>
						<input type="radio" name="one" value="1" required>&nbsp;YES<br>
						<input type="radio" name="one" value="0" required>&nbsp;NO<br>
					</div>
					<div class="ui raised segment">
						2) Are you experencing dry cough or fever or sore throat?<br><br>
						<input type="radio" name="two" value="1" required>&nbsp;YES<br>
						<input type="radio" name="two" value="0" required>&nbsp;NO<br>
					</div>
					<div class="ui raised segment">
						3) Is your nose is congested(blocked or runny nose)?<br><br>
						<input type="radio" name="three" value="1" required>&nbsp;YES<br>
						<input type="radio" name="three" value="0" required>&nbsp;NO<br>
					</div>
					<div class="ui raised segment">
						4) Are you getting taste of food items?<br><br>
						<input type="radio" name="four" value="0" required>&nbsp;YES<br>
						<input type="radio" name="four" value="1" required>&nbsp;NO<br>
					</div>
					<div class="ui raised segment">
						5) Are you suffering from fatigue(extreme tiredness)?<br><br>
						<input type="radio" name="five" value="1" required>&nbsp;YES<br>
						<input type="radio" name="five" value="0" required>&nbsp;NO<br>
					</div>
					<button class="ui blue button" name="submit" type="submit">Check</button>
				</form>
			</div>
		</div>
	</div><br><br>

</body>
</html>
<script>
	$('.tiny.modal').modal('show');
</script>