<?php
class article{
    private $mysql;

    function __construct($mysql){
        $this->mysql = $mysql;
    }

    public function list(){ //page list
        $num = 1;
        $list = '';
        $result = $this->mysql->query("SELECT * FROM board_table ORDER BY date DESC");

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

    public function btn(){ //show btn
      $btn = '';

      if(isset($GLOBALS['user'])) {
          $btn = '<a type="button" class="btn btn-default" href="topic/write.php">글쓰기</a>';
      }

      return $btn;
    }

    public function content($getId){ //content
      $getId = $this->mysql->mysqli_chk($getId);
      $result = $this->mysql->query("SELECT * FROM board_table WHERE id={$getId}");
      $row = mysqli_fetch_assoc($result);

      $row['title'] = nl2br(htmlspecialchars($row['title']));
      $row['content'] = nl2br(htmlspecialchars($row['content']));

      return $row;
    }

    public function prevNext($id, $date){ //next,prev btn
      $prevNext = array();

      $prev_query = "SELECT id FROM board_table
                        WHERE id < {$id}
                          AND date <= '{$date}'
                     ORDER BY id DESC LIMIT 1";
      $next_query = "SELECT id FROM board_table
                            WHERE id > {$id}
                              AND date >= '{$date}'
                            LIMIT 1";

      $result = $this->mysql->query($prev_query);
      $prevNext['prev'] = mysqli_fetch_assoc($result);

      $result = $this->mysql->query($next_query);
      $prevNext['next'] = mysqli_fetch_assoc($result);

      return $prevNext;
    }
}

?>