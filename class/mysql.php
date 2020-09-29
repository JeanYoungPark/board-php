<?php

class mysql{
    private $conn;
    
    function __construct(){
        require_once($_SERVER['DOCUMENT_ROOT'].'/info.php');
        $this->conn = new mysqli($host, $user, $password, $database_name);
    }

    public function query($query){
        require_once($_SERVER['DOCUMENT_ROOT'].'/config.php');

        // if(!empty($values)) {
        //     if(count($values) == substr_count($query,'?')) {
        //         for($i = 0;$i < count($values);$i++){
        //             if(gettype($values[$i]) == "string") {
        //                 $values[$i] = '"'.strip_tags($values[$i]).'"';
        //             }
        //             $query = preg_replace('/\?/',$values[$i],$query,1);  
        //             var_dump($query);
        //             echo('<br><br>'); 
        //         }
        //         $query = str_replace('\n','\\\n',$query);
        //         exit;
        //     }
        // }

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