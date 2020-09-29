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
                    if(gettype($values[$i]) == "string") {
                        $values[$i] = "'".strip_tags($values[$i])."'";
                    }
                    $query = preg_replace('/\?/',$values[$i],$query,1);   
                }
                $query = str_replace('\n','\\\n',$query);   
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