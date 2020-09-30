<?php

class mysql{
    private $conn;
    
    function __construct(){
        require_once($_SERVER['DOCUMENT_ROOT'].'/info.php');
        $this->conn = new mysqli($host, $user, $password, $database_name);
    }

    //injection chk
    public function mysqli_chk($value){
        
        if(is_array($value)) {
            $arr = array();
            foreach($value as $key => $val){
                $arr[$key] = mysqli_real_escape_string($this->conn,$val);
            }
            return $arr;
        }else {
            $value = mysqli_real_escape_string($this->conn, $value);
            return $value;
        }
    }

    public function query($query){
        require_once($_SERVER['DOCUMENT_ROOT'].'/config.php');

        $result = mysqli_query($this->conn,$query);

        if ($result) {
            if(gettype($result) == 'boolean') {
                $id = mysqli_insert_id($this->conn);
                if(!$id) $id = true;
                return $id;
            }else {
                return $result;
            }
        }  else {
            echo "Error message: %s\n", mysqli_error($this->conn); 
        }
    }
}

?>