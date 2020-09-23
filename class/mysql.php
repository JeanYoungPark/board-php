<?php

class mysql{
    public function query($query){
        require_once($_SERVER["DOCUMENT_ROOT"].'/config.php');
        $conn = new mysqli($host, $user, $password, $database_name);
        $result = mysqli_query($conn,$query);
        
        if ($result) {
            return $result;
        }  else {
            echo "Error:".$query."mesage:".mysqli_error($conn); 
        }
    }
}

?>