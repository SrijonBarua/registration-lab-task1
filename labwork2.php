<?php 
    $usernameV = $emailV = $passV = $cpassV = "";
    $generalError = "";
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_REQUEST["username"];
        $email = $_REQUEST["email"];
        $password = $_REQUEST["password"];
        $cpassword = $_REQUEST["cpassword"];

        if(empty($username) || empty($email) || empty($password) || empty($cpassword)) {
            $generalError = "Please fill up all the fields";
        } else {
            if(!preg_match("/[a-zA-Z0-9._]+/", $username)) {
                $usernameV = "Username only have alphanumeric characters/period/underscore";
            }
            if(strlen($username) < 5) {
                $usernameV .= "Username must contain atleast 5 characters";
            }

            if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,6})$/i", $email)) {
                $emailV = "Please enter a valid email";
            }

            if(!preg_match("/(?=.*[@#$%^&+=]).*$/", $password)) {
                $passV = "Password atleast contain 1 special character";
            } 
            if(strlen($password) < 6) {
                $passV .= "Password must contain atleast 6 characters";
            }
            if($password != $cpassword) {
                $cpassV = "password have to match";
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1 align="center"> registration</h1>
    <body>
        <form align="center">
            name:
            <input type="text" name="name"><br><br>
            email:
            <input type="text" name="email"><br><br>
            username:
            <input type="text" name="username"><br><br>
            Password:
            <input type="number" name="password"><br><br>
            confirm pasword:
            <input type="text" name="confirm password"><br><br>
            Gender: <br>
            <input type="radio" name="gender" value="male"> Male
            <input type="radio" name="gender" value="female">Female<br><br>
            <input type="radio" name="gender" value="other">other<br><br>
            Date of Birth:
            <input type="text" name="Date "><br><br>
            
            
        
            <input type="submit" value="submit">
            <input type="reset" value="reset">
    </form>
</body>
</html>