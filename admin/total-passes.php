<?php
	session_start();
	include '../includes/dbconnection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Curfiew E-Pass Management System | Total passes</title>
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
            	Total Passes
            </div>

          <div class="ui raised segment">
            <div class="ui stackable grid">
              <div class="row">
              
                <div class="twelve wide column">
                  <div class="num_rows">
                    <div class="form-group">  <!--    Show Numbers Of Rows    -->
                      <select class  ="form-control" name="state" id="maxRows" style="width: 50px;margin-left: 5px;">
                         <option value="5">5</option>
                         <option value="10">10</option>
                         <option value="15">15</option>
                         <option value="20">20</option>
                        <option value="5000">Show ALL Rows</option>
                        </select>
                      </div>
                  </div>
                </div>
                <div class="four wide column">
                  
                  <div class="tb_search">
                    <input type="text" id="search_input_all" onkeyup="FilterkeyWord_all_table()" placeholder="Search" class="form-control">
                  </div>

                </div>
              </div>

              <div class="table-responsive" id="table-id">
                <?php

                echo '

                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                ';

                 $sql="select * from pass order by PasscreationDate desc";

                $result=$con->query($sql);

	            if($result->num_rows>0)
	            {
                      echo "

                        <thead>
                            <tr>
                                <th>Pass Number</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Phone no.</th>
                                <th>Creation Date</th>
                                <th>Valid Till</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                      ";
                      while($row=$result->fetch_assoc())
                      {
                          echo "

                          <tr>
                              <td>".$row['Passnumber']."</td>
                              <td>".$row['Fullname']."</td>
                              <td>".$row['Email']."</td>
                              <td>".$row['Phone']."</td>
                              <td>".$row['PasscreationDate']."</td>
                              <td>".$row['ToDate']."</td>
                              <td>";
                                  $type=$row['type'];
                                  if($type==0)
                                  {
                                    echo "<button class='ui orange circular button'>Pending</button>";
                                  }
                                  else if($type==-1)
                                  {
                                    echo "<button class='ui red circular button'>Rejected</button>";
                                  }
                                  else
                                  {
                                    echo "<button class='ui green circular button'>Accepted</button>";
                                  }
                                  echo "
                              </td>
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


        <!--    Start Pagination -->
        <div class='pagination-container'>
          <nav>
            <ul class="pagination">
              <!-- Here the JS Function Will Add the Rows -->
            </ul>
          </nav>
        </div>
        <div class="rows_count">Showing 11 to 20 of 91 entries</div>

      </div>
    </div>
    </div>
  </div>

		</div>

	</div>


	  <script src="./assets/metisMenu/jquery.metisMenu.js"></script>
    <script src="./assets/pace/pace.js"></script>
    <script src="./assets/scripts/siminta.js"></script>

    <script src="./assets/dataTables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="./assets/dataTables/table_search.js"></script>
    <script type="text/javascript" src="./assets/dataTables/pagination.js"></script>
</body>
</html>
<script>
    
  function deny(id)
  {
    location.href="deny.php?deny_id="+id;
  }

</script>