<?php
    session_start();
    include '../includes/dbconnection.php';
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
            $sql = "select * from users where UserName='".$name."' and Password='".$pwd."' and type='admin'";
            $result = $con->query($sql);
            if($result->num_rows==1)
            {
                while($row = $result->fetch_assoc())
                {
                    $user=$row['ID'];
                }
                $_SESSION['user']=$user;
                header("Location: dashboard.php");
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
    <title>Curfew Pass Management System | Login Page</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/icon.min.css">
</head>

<body style="background-color: #84b899;">

    <div class="container">
        
        <div class="ui stackable grid">
           <div class="five wide column"></div>
           <div class="six wide column">
                <h4 align="center" style="color: white;font-size: 25px;margin-top: 25%;">Curfew e-Pass Management System</h4>
                <div class="ui raised segment">
                    <h3 align="center">ADMIN LOGIN</h3>
                    <form class="ui form" method="post">
                        <div class="ui Field">
                            <label style="font-weight: bold;">Username</label>
                            <input type="text" name="uname" placeholder="Username" required>
                        </div><br>
                        <div class="ui Field">
                            <label style="font-weight: bold;">Password</label>
                            <input type="password" name="pwd" placeholder="Password" required>
                        </div><br>
                        <div class="ui Field">
                           <a href="./forgot-password.php">Lost password?</a>
                        </div><br>
                        <div class="ui Field">
                           <center><button type="submit" name="submit" class="ui green button">Login</button></center>
                        </div>
                    </form>
               </div>
           </div>
       </div>

    </div>

    <!-- Core Scripts - Include with every page -->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/semantic.min.js"></script>

</body>

</html>
<script>
    $('.tiny.modal').modal('show');
</script>