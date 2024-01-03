<?php
    session_start();
    include '../includes/dbconnection.php';
    if(isset($_POST['submit']))
    {
        $name=$_POST['uname'];
        $email=$_POST['email'];
        $phno=$_POST['phno'];
        $pwd=$_POST['cpwd'];


	    $sql = "insert into users(UserName,MobileNumber,Email,Password,Type,AdminRegdate) values('$name','$phno','$email','$pwd','normal user',CURRENT_TIMESTAMP())";
	    if($con->query($sql)==TRUE)
	    {
	        echo "<div class='ui tiny modal'>
	                <i class='green circle close icon'></i>
	                <div class='content'><b>Registered Successfully</b>
	                <button class='ui green button' onclick='log()''>
						Login
						<i class='hand point right icon'></i>
					</button>
	                </div>
	              </div>";
	    }
	    else
	    {
	        echo "<div class='ui tiny modal'>
	                <i class='red circle close icon'></i>
	                <div class='content'><b>Registration Failed</b></div>
	              </div>";
	    }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Curfew Pass Management System | User Registration</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/icon.min.css">
</head>

<script>
    function valid()
    {
        if(document.chngpwd.pwd.value!= document.chngpwd.cpwd.value)
        {
            alert("Password and Confirm Password Field do not match..!!");
            document.chngpwd.cpwd.focus();
            return false;
        }
        return true;
    }
</script>

<body style="background-color: #84b899;">

    <div class="container">
        
        <div class="ui stackable grid">
           <div class="five wide column"></div>
           <div class="six wide column">
                <h4 align="center" style="color: white;font-size: 25px;margin-top: 5%;">Curfew e-Pass Management System</h4>
                <div class="ui raised segment">
                    <h3 align="center">USER REGISTRATION</h3>
                    <form class="ui form" method="post" name="chngpwd" onSubmit="return valid();">
                        <div class="ui Field">
                            <label style="font-weight: bold;">Full Name</label>
                            <input type="text" name="uname" placeholder="Username" required>
                        </div><br>
                        <div class="ui Field">
                            <label style="font-weight: bold;">Email</label>
                            <input type="email" name="email" placeholder="Email" required>
                        </div><br>
                        <div class="ui Field">
                            <label style="font-weight: bold;">Mobile Number</label>
                            <input type="text" name="phno" placeholder="Mobile Number" required>
                        </div><br>
                        <div class="ui Field">
                            <label style="font-weight: bold;">Password</label>
                            <input type="password" name="pwd" placeholder="Password" required>
                        </div><br>
                        <div class="ui Field">
                            <label style="font-weight: bold;">Confirm Password</label>
                            <input type="password" name="cpwd" placeholder="Confirm Password" required>
                        </div><br>
                        <div class="ui Field">
                           <center><button type="submit" name="submit" class="ui green button">Register</button></center>
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

    function log()
    {
    	location.href="./user-login.php";
    }
</script>