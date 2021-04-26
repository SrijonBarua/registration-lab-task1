<?php 
    session_start();

 

    include('connect.php');

 


    if($_SESSION['is_login'])
    {
        $username = $_SESSION['uname'];
    }
    else
    {
        header("Location: login.php");
        die;
    }

 

?>

 

<!DOCTYPE html>
<html>
<head>
    <title>Homepage</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="alert">
        You are now logged in!
    </div>

 

    <p>Welcome, <?php echo $username; ?> </p>

 

    <a href="logout.php">Logout</a>

 

</body>
</html>