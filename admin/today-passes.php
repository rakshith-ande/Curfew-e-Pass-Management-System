<?php
	session_start();
	include '../includes/dbconnection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Curfiew E-Pass Management System | Manage passes</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/icon.min.css">
    <link href="./assets/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>

	<!--header and sidebar-->
	<?php
		include './includes/sidebar.php';
	?>
	<!--//header and sidebar-->

	<div class="ui stackable grid">
		
		<div class="four wide column"></div>
		<div class="eleven wide column">

            <div id="side">
            <div class="ui blue raised segment centered header">
            	Today Created Passes
            </div>

              <div class="table-responsive">
                <?php

                echo '

                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                ';

                 $sql="select * from pass where date(PasscreationDate)=CURDATE()";

                $result=$con->query($sql);

              if($result->num_rows>0)
              {
                      echo "

                        <thead>
                            <tr>
                                <th>Sl No.</th>
                                <th>Pass Number</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Phone no.</th>
                                <th>Creation Date</th>
                            </tr>
                        </thead>
                        <tbody>

                      ";
                      $c=1;
                      while($row=$result->fetch_assoc())
                      {
                          echo "

                          <tr>
                              <td>".$c++."</td>
                              <td>".$row['Passnumber']."</td>
                              <td>".$row['Fullname']."</td>
                              <td>".$row['Email']."</td>
                              <td>".$row['Phone']."</td>
                              <td>".$row['PasscreationDate']."</td>
                          </tr>

                          ";
                      }
                  }
                  else {
                    echo "
                        <div class='ui red raised segment centered header'>
                          No Passes found
                        </div>
                    ";
                  } 
                                   
                ?>              
             </tbody>
          </table>
      </div>
  </div>

		</div>

	</div>


	<script src="./assets/metisMenu/jquery.metisMenu.js"></script>
    <script src="./assets/pace/pace.js"></script>
    <script src="./assets/scripts/siminta.js"></script>

    <script src="./assets/dataTables/jquery.dataTables.js"></script>
    <script src="./assets/dataTables/dataTables.bootstrap.js"></script>
</body>
</html>