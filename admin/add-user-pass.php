<?php
  session_start();
  include '../includes/dbconnection.php';
  if(isset($_POST['submit']))
  {
      $name=$_POST['fullname'];
      $phno=$_POST['phno'];
      $anum=$_POST['anum'];
      $email=$_POST['email'];
      $cat=$_POST['category'];
      $fdate=$_POST['fromdate'];
      $tdate=$_POST['todate'];
      $passnum=mt_rand(100000000, 999999999);

     $sql="insert into pass(Passnumber,Fullname,Phone,Email,AadharCardno,Category,FromDate,ToDate,type,userid,PasscreationDate) values('$passnum','$name','$phno','$email','$anum','$cat','$fdate','$tdate',0,'".$_SESSION['user']."',CURRENT_TIMESTAMP())";

      if($con->query($sql)==TRUE)
      {
          echo "

          <script>
            alert('Pass Added successfully');
          </script>

          ";
      }
      else
      {
          echo "

          <script>
            alert('Failed to add Pass');
          </script>

          ";
      }
  }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Curfew Pass Management System | Add Pass</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/icon.min.css">
    <link href="./assets/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>

<body>

  <!--header and sidebar-->
  <?php
      include './includes/header.php';
  ?>
  <!--//header and sidebar-->

  <div id="side">
  <div class="ui stackable grid">
      <div class="three wide column"></div>

      <div class="ten wide column">

        <div class="ui blue raised segment">
        <form class="ui form" method="post" enctype="multipart/form-data">
          <div class="ui blue header">Add Pass</div>
          <hr>

          <?php
            $sql="select UserName from users where ID='".$_SESSION['user']."'";
            $result=$con->query($sql);
            if($result->num_rows==1)
            {
              while($row=$result->fetch_assoc())
              {
                echo '
                  <div class="ui field">
                    <label>Full Name</label>
                    <input type="text" name="fullname" value="'.$row['UserName'].'" readonly>
                  </div>
                ';
              }
            } 
          ?>

          <div class="ui field">
            <label>Contact Number</label>
            <input type="text" name="phno" required='true' maxlength="10">
          </div>

          <div class="ui field">
            <label>Email Address</label>
            <input type="email" name="email" required='true'>
          </div>

          
          <div class="ui field">
            <label>Identity Card No</label>
            <input  type="text" name="anum" required='true'>
          </div>

          <div class="ui field">
            <label>Category</label>
            <select class="ui search dropdown" name="category" required='true'>
            	<option>Select Category</option>
            <?php
                $sql="select * from category";
                $result=$con->query($sql);
                if($result->num_rows>0)
                {
                    while($row=$result->fetch_assoc())
                    {
                      echo "
                      <option value='".$row['CategoryName']."'>".$row['CategoryName']."</option>";

                    }
                }
            ?>

            </select>  
          </div>

          <div class="ui field">
            <label>From Date</label>
            <div class="ui calendar">
              <div class="ui input left icon">
                <i class="calendar icon"></i>
                <input type="date" name="fromdate" required='true'>
              </div>
            </div>
          </div>

          <div class="ui field">
            <label>To Date</label>
            <div class="ui calendar">
              <div class="ui input left icon">
                <i class="calendar icon"></i>
                <input type="date" name="todate" required='true'>
              </div>
            </div>
          </div>
          
          <center><button class="ui blue button" type="add" name="submit">Add</button></center>
        </form>
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