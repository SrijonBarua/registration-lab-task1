<?php

 

    $DBhostname='localhost';
    $DBusername='user';
    $DBpassword='123';
    $DBname= 'web';
    $conn= mysqli_connect($DBhostname,$DBusername,$DBpassword,$DBname);

 


    if ($conn->connect_error) 
    {
       die('Database error:'. $conn->connect_error);
    }
    
        
?>