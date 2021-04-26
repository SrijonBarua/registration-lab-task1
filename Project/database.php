<?php 
function db_conn()
{
    $servername = "localhost";
    $username = "";
    $password = "";
    $dbname = "web";

 
    $conn= mysqli_connect($servername,$username,$password,$dbname);

 


    if ($conn->connect_error) 
    {
       die('Database error:'. $conn->connect_error);
    }
    
    
}