<?php
  session_start();
  include '../includes/dbconnection.php';
  if(isset($_POST['submit']))
  {
      $aname=$_POST['adname'];
      $phno=$_POST['phno'];
      $email=$_POST['email'];

      $sql="update users set UserName='".$aname."', MobileNumber='".$phno."',  Email='".$email."' where ID='".$_SESSION['user']."'";

      if($con->query($sql)==TRUE)
      {
          echo "

          <script>
            alert('User Profile Updated successfully');
          </script>

          ";
      }
      else
      {
          echo "

          <script>
            alert('Failed to update User Profile');
          </script>

          ";
      }
  }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Curfew Pass Management System | User Profile</title>
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

          <div class="ui blue raised segment">
          <form class="ui form" method="post" enctype="multipart/form-data">
            <div class="ui blue header">User Profile</div>
            <hr>

            <?php
                $sql="select * from users where ID='".$_SESSION['user']."'";
                $result=$con->query($sql);
                if($result->num_rows==1)
                {
                    while($row=$result->fetch_assoc())
                    {
            ?>

            <div class="ui field">
              <label>Admin Name</label>
              <input type="text" name="adname" required='true' value="<?php echo $row['UserName']?>">
            </div>
            <div class="ui field">
              <label>User Name</label>
              <input type="text" name="uname" value="<?php echo $row['UserName']?>" readonly="" disable>
            </div>
            <div class="ui field">
              <label>Contact Number</label>
              <input type="text" name="phno" required='true' maxlength="10" value="<?php echo $row['MobileNumber']?>">
            </div>
            <div class="ui field">
              <label>Email Address</label>
              <input type="email" name="email" required='true' value="<?php echo $row['Email']?>">
            </div>
            <div class="ui field">
              <label>Admin Registration Date</label>
              <input type="text" name="regdate" value="<?php echo $row['AdminRegdate']?>" readonly="" disable>
            </div>
            <center><button class="ui blue button" type="update" name="submit">Update</button></center>
          </form>
        </div>

        <?php
             }
          }
        ?>

      </div>
  </div>


    <script src="./assets/metisMenu/jquery.metisMenu.js"></script>
    <script src="./assets/pace/pace.js"></script>
    <script src="./assets/scripts/siminta.js"></script>

    <script src="./assets/dataTables/jquery.dataTables.js"></script>
    <script src="./assets/dataTables/dataTables.bootstrap.js"></script>
</body>

</html>