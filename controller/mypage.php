<?php
class mypage{
    private $mysql;

    function __construct($mysql){
        $this->mysql = $mysql;
    }

    public function menu(){ //common menu
        $dir = $_SERVER["DOCUMENT_ROOT"].'/mypage';
        $dir_handle=opendir($dir);
        $list = array();

        while (false !== ($filename = readdir($dir_handle)) ){
            if(is_file($dir.'/'.$filename)){
                $list[$filename] = '';
            }
        }

        if(preg_match("/\/mypage\/(.*).php/",$_SERVER['PHP_SELF'],$match)) {
            $list[$match[1]] = "on";
        }

        return $list;
    }
    
    public function article(){ //my article list;
        $num = 1;
        $list = '';

        $result = $this->mysql->query("SELECT * FROM board_table WHERE writer_id='{$GLOBALS['user']['id']}' ORDER BY date DESC");

        while($row = mysqli_fetch_array($result)){
            $row['title'] = htmlspecialchars($row['title']);
            $list .= "
                <tr>
                    <td>{$num}</td>
                    <td><a href='/topic/article.php?id={$row['id']}'>{$row['title']}</a></td>
                    <td>{$row['date']}</td>
                </tr>
            ";
            $num++;
        }

        return $list;
    }
}

?>