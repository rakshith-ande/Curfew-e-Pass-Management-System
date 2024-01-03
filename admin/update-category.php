<?php
  session_start();
  include '../includes/dbconnection.php';
  $id=$_GET['editid'];
  if(isset($_POST['submit']))
  {
      $name=$_POST['cname'];

      $sql="update category set CategoryName='".$name."' where ID='".$id."'";
      if($con->query($sql)==TRUE)
      {
         echo "

          <script>
            alert('Successfully updated');
          </script>

         ";
      }
      else
      {
          echo "

          <script>
            alert('Failed to update');
          </script>

         ";
      }
  }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Curfew Pass Management System | Update Category</title>
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

        <div class="ui blue raised header segment">
            Update Category
        </div>
        <?php
            $sql="select CategoryName from category where ID=$id";
            $result=$con->query($sql);
            if($result->num_rows==1)
            {
                while($row=$result->fetch_assoc())
                {
        ?>

        <div class="ui raised segment">
         
          <form class="ui form" method="post">
              <div class="ui field">
                  <label>Category Name</label>
                  <input type="text" name="cname" value="<?php echo $row['CategoryName']?>" required>
              </div>
              <div class="ui field">
                  <button class="ui blue button" type="submit" name="submit">Update</button>
              </div>
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