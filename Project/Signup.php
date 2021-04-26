<?php
    session_start();

 

    

 

 

    $name = $sex = $dob = $bloodgroup = $uname = $email = $pass1 = $pass2 = $password= "";
    $nameErr = $sexErr = $dobErr = $bloodgroupErr = $unameErr = $emailErr = $pass1Err = $pass2Err = $passwordErr= "";

 

    if($_SERVER['REQUEST_METHOD']== "POST")
    {

 
        include('connect.php');

        $name = $_POST['name'];
        $sex = @$_POST['sex'];
        $dob = $_POST['DOB'];
        $bloodgroup = $_POST['bloodgroup'];
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $pass1 = $_POST['pass'];
        $pass2 = $_POST['cpass'];

 

        if (empty($_POST["name"])) 
          {
            $nameErr = "Name is required";
          } 

 

           if (!isset($_POST["sex"])) 
           {
               $sexErr = "Sex is required";

 

           }

 

           if (empty($_POST["DOB"])) 
           {
            $dobErr = "Date of birth is required";
          } 

 

          if (!isset($_POST["bloodgroup"])) 
          {
            $bloodgroupErr = "Blood Group is required";
          } 

 

          if (empty($_POST["uname"])) 
          {
            $unameErr = "Username is required";
          }
          else 
          { 
              if (!preg_match("/^[a-zA-Z-' _]*$/",$uname)) 
             {
                $unameErr = "Only letters and white space allowed";
              }
          } 

 

          if (empty($_POST["email"])) 
          {
            $emailErr = "Email is required";
          } 
          else 
          {
            if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $email))
            {
                  $emailErr = "Invalid email format";
            }
          }

 

          if (empty($_POST["pass"])) 
          {
            $pass1Err = "Password is required";
          } 

 

          if (empty($_POST["cpass"])) 
          {
            $pass2Err = "Please confirm password";
          } 

 

          if ($pass1 !== $pass2) 
        {
            $passwordErr=  "Password doesn't match.";
        }

 

        if ($nameErr && $sexErr && $dobErr && $bloodgroupErr && $unameErr && $emailErr && $pass1Err && $pass2Err && $passwordErr == "")
        {
            $password = base64_encode($pass1);
            $insertQuery = "INSERT into userinfo (Name, Sex, DOB, BloodGroup, Username, Email, Password) values ('$name', '$sex', '$dob', '$bloodgroup', '$uname', '$email', '$password')";

 


            $Result= mysqli_query($conn, $insertQuery);
            if ($Result)
            {
                header("Location: login.php");
                die();
            }

            
        }
         
        
        
    }

 

?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign-up</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="header">
        <h1>Sign-Up</h1>
        
    </div>

 

    <form method="POST" action="Signup.php">
        <p><span class="error" style="color:red;" >* required field</span></p>
        <fieldset>
            <legend><b>Basic Information</b></legend>
            <div class="input">
                <label>Name:</label>
                <input type="text" name="name">
                <span>* <?php echo $nameErr;?></span>
            </div>
            
            <br>

 

            <div class="input">
                <label>Sex:</label>
                <input type="radio" name="sex" value="female">Female
                <input type="radio" name="sex" value="male">Male
                <input type="radio" name="sex" value="other">Other
                <span>* <?php echo $sexErr;?></span>
            </div>
            
            <br>

 

            <div class="input">
                <label>Date of Birth:</label>
                <input type="date" name="DOB">
                <span>* <?php echo $dobErr;?></span>
            </div>
            
            <br>
            <div class="input">
                <label>Blood Group:</label>
                <select name="bloodgroup">
                    <option value="NULL">---Select---</option>
                    <option value="A Positive">A Positive</option>
                    <option value="A Negative">A Negative</option>
                    <option value="B Positive">B Positive</option>
                    <option value="B Negative">B Negative</option>
                    <option value="AB Positive">AB Positive</option>
                    <option value="AB Negative">AB Negative</option>
                    <option value="O Positive">O Positive</option>
                    <option value="O Negative">O Negative</option>
                </select>
                <span>* <?php 
                if(isset($bloodgroupErr))
                {
                    echo $bloodgroupErr;
                }
                ?></span>
            </div>
            
            <br>
        </fieldset>
        <br>

 

        <fieldset>
            <legend><b>User Information</b></legend>
            <div class="input">
                <label>Username:</label>
                <input type="text" name="uname">
                <span>* <?php echo $unameErr;?></span>
            </div>
            <br>
            <div class="input">
                <label>E-mail:</label>
                <input type="text" name="email">
                <span>* <?php echo $emailErr;?></span>
            </div>
            <br>
            <div class="input">
                <label>Password:</label>
                <input type="Password" name="pass">
                <span>* <?php echo $pass1Err;?></span>
            </div>
            <br>
            <div class="input">
                <label>Confirm Password:</label>
                <input type="Password" name="cpass">
                <span>* <?php echo $pass2Err;?></span>
            </div>
            <br>
            <?php echo $passwordErr; ?>    
        </fieldset>
        <br>

 

        <div class="input">
            <button type="submit" name="Sign-Up" class="btn">Register</button>
        </div>
            <p>
                Already registered?<a href="login.php">Login</a>
            </p>
    </form>

 

</body>
</html>