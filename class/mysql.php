<?php

class mysql{
    private $conn;
    
    function __construct(){
        require_once($_SERVER['DOCUMENT_ROOT'].'/info.php');
        $this->conn = new mysqli($host, $user, $password, $database_name);
    }

    public function query($query ,$values=[]){
        require_once($_SERVER['DOCUMENT_ROOT'].'/config.php');

        if(!empty($values)) {
            if(count($values) == substr_count($query,'?')) {
                for($i = 0;$i < count($values);$i++){
                    $values[$i] = mysqli_real_escape_string($this->conn,$values[$i]);
                    $query = preg_replace('/\?/',"'".$values[$i]."'",$query,1);
                }
            }
        }

        $result = mysqli_query($this->conn,$query);
        if ($result) {
            if(gettype($result) == 'boolean') {
                $id = mysqli_insert_id($this->conn);
                return $id;
            }else {
                return $result;
            }
        }  else {
            echo "Error:".$query."mesage:".mysqli_error($this->$conn); 
        }
    }
}

?>