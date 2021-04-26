<?php
    session_start();

 

    include('connect.php');

 


    

 

    $uname = $password= "";
    $unameErr = $passwordErr= "";

 

    if($_SERVER['REQUEST_METHOD']== "POST")
    {

 

        
        $uname = $_POST['uname'];
        $password = $_POST['pass'];

 


          if (empty($_POST['uname'])) 
          {
            $unameErr = "Username is required";
          }

 

          if (empty($_POST['pass'])) 
          {
            $passwordErr = "Password is required";
          } 
          if($unameErr&& $passwordErr == "")
        {
            $pass = base64_encode($password);
            $selectQuery = "SELECT * from userinfo WHERE Username = '$uname' AND Password = '$pass' limit 1";

 

            $result = mysqli_query($conn, $selectQuery);

 

            if(mysqli_num_rows($result) > 0) 
            {
                echo "User found";
                $_SESSION['is_login'] = true;
                $_SESSION['uname'] = $uname;
                 
                header("location: index.php");
                #die;
            }
            else
            {
                echo "User not found";
            }
            
        }

 

    }

 

    
?>
<!DOCTYPE html>
<html>
<head>

    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="w3-container w3-aqua">
        <h2>Login</h2>
        
    </div>

 

    <form method="POST" action="login.php">

 

        
            <fieldset>
                <div class="input">
                    <label>Username:</label>
                    <input type="text" name="uname">
                    <span>* <?php echo $unameErr;?></span>
                </div>
                <br>
                <div class="input">
                    <label>Password:</label>
                    <input type="Password" name="pass">
                    <span>* <?php echo $passwordErr;?></span>
                </div>
                <br>
            </fieldset>    
            <br>

 

        <div class="input">
            <button type="submit" name="Login" class="btn">Login</button>
        </div>
        <div class="w3-container w3-green">
            <p>
                Not a member?<a href="Signup.php">Sign-up</a>
            </p>
            </div>
            <button>
   <a href="webproject.php"> HOME</a>
    </button>


    </form>

 

</body>