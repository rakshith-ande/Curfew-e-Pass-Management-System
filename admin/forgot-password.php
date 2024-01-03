<?php
    session_start();
    include '../includes/dbconnection.php';
    if(isset($_POST['submit']))
    {
        $email=$_POST['email'];
        $phone=$_POST['phno'];
        $pwd=$_POST['cpwd'];

        $sql="select email from users where Email='".$email."' and MobileNumber='".$phone."'";
        if($con->query($sql)==TRUE)
        {
            $sql1="update users set Password='".$pwd."' where Email='".$email."' and MobileNumber='".$phone."'";
            if($con->query($sql1)==TRUE)
            {
                echo "
                <div class='ui tiny modal'>
                    <i class='green circle close icon'></i>
                    <div class='content'><b>Your password updated successfully</b></div>
                </div>
                ";
            }
            else
            {
                echo "
                <div class='ui tiny modal'>
                    <i class='red circle close icon'></i>
                    <div class='content'><b>Failed to update your password</b></div>
                </div>
                ";
            }
        }
        else
        {
            echo "
            <div class='ui tiny modal'>
                <i class='red circle close icon'></i>
                <div class='content'><b>Failed to update your password</b></div>
            </div>
            ";
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
 
    <title>Curfew Pass Management System | Forgot Password Page</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/icon.min.css">
    
<script>
    function valid()
    {
        if(document.chngpwd.pwd.value!= document.chngpwd.cpwd.value)
        {
            alert("New Password and Confirm Password Field do not match  !!");
            document.chngpwd.cpwd.focus();
            return false;
        }
        return true;
    }
</script>

</head>

<body style="background-color: #84b899;">

    <div class="container">
       
       <div class="ui stackable grid">
           <div class="five wide column"></div>
           <div class="six wide column">
                <h4 align="center" style="color: white;font-size: 25px;margin-top: 25%;">Curfew e-Pass Management System</h4>
                <div class="ui raised segment">
                   <h3 align="center">Reset Your Password</h3>
                   <form class="ui form" method="post" name="chngpwd" onSubmit="return valid();">
                       <div class="ui Field">
                           <input type="email" name="email" placeholder="Email" required>
                       </div><br>
                       <div class="ui Field">
                           <input type="text" name="phno" placeholder="Mobile number" maxlength="10" required>
                       </div><br>
                       <div class="ui Field">
                           <input type="password" name="pwd" placeholder="New Password" required>
                       </div><br>
                       <div class="ui Field">
                           <input type="password" name="cpwd" placeholder="Confirm Password" required>
                       </div><br>
                       <div class="ui Field">
                           <a href="./index.php">Alreay have an account?</a>
                       </div><br>
                       <div class="ui Field">
                          <button type="submit" name="submit" class="ui green button">Submit</button>
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