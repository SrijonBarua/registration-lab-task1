<?php 

 

require_once 'database.php';

 

 

function adduser($data){
    $conn = db_conn();
    $selectQuery = "INSERT INTO userinfo (FirstName, LastName ,Email, Password ,) VALUES (:firstname, :lastname, :email,:password,)";

 

    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
                     ':firstname'               =>     $data['firstname'],   
                     ':lastname'               =>     $data['lastname'],  
                     ':email'          =>     $data["email"], 
                     ':password'          =>     $data["password"],
                     

        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}