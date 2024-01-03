<?php
	session_start();
	include 'includes/dbconnection.php';
?>
<!DOCTYPE html>
<html>
<head>
  
  <title>Curfew e-Pass Management System - Home</title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="./css/semantic.min.css">
  <link rel="stylesheet" href="./css/style.css">
  	<style>
		tr:nth-child(even){background-color: #d4e2f6};
	</style>
</head>
<body>

  <!--header-->
 <?php 
 	include 'includes/header.php'
 ;?>
  <!--//header-->


  <!--banner-->
  <section class="hero-banner text-center">
    <div class="container">
      <h1>Curfew e-Pass Management System</h1>
 
    </div>
  </section>
  <!--//banner-->


	<!--search-->
	<section class="bg-gray domain-search">
	    <div class="container">
	      <div class="row no-gutters">
	        <div class="col-md-5 col-lg-2 text-center text-md-left mb-3 mb-md-0">
	          <h3>Search Your Pass!</h3>
	        </div>
	        <div class="col-md-7 col-lg-10 pl-2 pl-xl-5">
	          <form class="form-inline flex-nowrap form-domainSearch" method="post">
	            <div class="form-group">
	              <label for="staticDomainSearch" class="sr-only">Search</label>
	              <input id="searchdata" type="text" name="searchdata" required="true" class="form-control" placeholder="Enter Your Pass ID"> 
	            </div>
	            <button type="submit" class="button rounded-0" name="search" id="submit">Search</button>
	          </form>
	    <?php
	   	if(isset($_POST['search']))
		{ 
			$searchdata=$_POST['searchdata'];
	  ?>
	  <h4 align="center">Result against "<?php echo $searchdata;?>" keyword </h4>

	<div class="ui blue raised segment">
	    <table class="ui table">
	 	<?php
			$sql="select * from pass where PassNumber like '%$searchdata%' and type=1";
			$result = $con->query($sql);
			if($result->num_rows==1)
			{
				echo "
				<div class='ui raised segment' style='color: black;font-weight: bold;letter-spacing: 1.5px;'>Pass ID: "; echo $searchdata;"</div>
				";
				while($row=$result->fetch_assoc())
				{
					echo "
						<tr>
							<th>Fullname</th>
							<th>Aadhar no.</th>
							<th>Mobile no.</th>
							<th>From</th>
							<th>To(Valid Till)</th>
							<th>Pass creation Date</th>
						</tr>
				  		<tr>
				  			<td>".$row['Fullname']."</td>
				  			<td>".$row['AadharCardno']."</td>
				  			<td>".$row['Phone']."</td>
				  			<td>".$row['FromDate']."</td>
				  			<td>".$row['ToDate']."</td>
				  			<td>".$row['PasscreationDate']."</td>
				  		</tr>
					";
				}
			}
			else
			{
				echo "

				<div class='ui red raised segment centered header'>
					No matches found
				</div>

				";
			}
			echo "</div>";
		}
		?> 
	     </table>

	        </div>
	      </div>
	    </div>
	</section>
	<!--//search-->


  	<!--footer-->
   	<?php 
   		include 'includes/footer.php';
   	?>
  	<!--//footer-->

  <script src="./js/jquery-3.2.1.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
  <script src="./js/main.js"></script>
</body>
</html>