<?php
  session_start();
  include '../includes/dbconnection.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Curfew Pass Management System | Search Pass</title>
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

  <div id="side">
  <div class="ui stackable grid">
      <div class="four wide column"></div>

      <div class="ten wide column">

        <div class="ui raised segment">
         
          <form class="ui form" method="post">
              <div class="ui field">
                  <label>Search by Pass Number/Mobile Number</label>
                  <input type="text" name="searchdata" required>
              </div>
              <div class="ui field">
                  <button class="ui blue button" type="submit" name="search">Search</button>
              </div>
          </form>

        </div>

      </div>

      <div class="row">
          <div class="four wide column"></div>

          <div class="ten wide column">
              <div class="table-responsive">
                <?php
                      if(isset($_POST['search']))
                      { 

                      $sdata=$_POST['searchdata'];
                        ?>
                        <h4 align="center">Result against "<?php echo $sdata;?>" keyword </h4>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            
                  <?php
                      $sql="select * from pass where Passnumber like '%$sdata%'|| Phone like '%$sdata%'";

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
                                  <td>
                                    <a href='view-pass.php?viewid=".$row['ID']."'>View</a> || <a href='edit-pass.php?editid=".$row['ID']."'>Edit</a>
                                  </td>
                              </tr>

                              ";
                          }
                      }
                      else {
                        echo "
                            <div class='ui red raised segment centered header'>
                              No matches found
                            </div>
                        ";
                      } 
                                       
                    }?>              
                 </tbody>
              </table>
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