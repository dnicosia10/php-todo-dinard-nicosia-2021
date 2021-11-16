<?php
class sql_que extends validate_item
{
    public $col_data;
    public $one;
    public $todo_status;
    public $number;
    public $row;
    public $item_pp;

    public function tbl_write($data1, $data2, $status)
    {
        if ($status == 1) {
            debug_console("$this->col_data inserted in database $this->tbl_col");
            $mysql = sprintf(
                "INSERT INTO $this->tbl_name ($this->tbl_col) VALUES ('%s','%s')",
                $this->db->real_escape_string($data1),
                $this->db->real_escape_string($data2)
            );
            $this->db->query($mysql);
        }
    }

    public function tbl_display($status)
    {
        if ($status == 0) {
            $result = $this->db->query("SELECT * FROM $this->tbl_name WHERE todo_status=$status ORDER BY todo_date DESC LIMIT 0, $_SESSION[item_pp]");
            $resultArr = [] ;
                foreach ($result as $row) {
                    $resultArr[] = $row;
                }

                return $resultArr;

        } else {
            $result = $this->db->query("SELECT * FROM $this->tbl_name WHERE todo_status=1 ORDER BY todo_date DESC LIMIT 0, 10");
            foreach ($result as $row) {

                printf(
                    " <li class='list-group-item'>%s</li>
                ",
                    //display item
                    htmlspecialchars($row['todo_title'], ENT_QUOTES),
                );
            }
        }
    }
    public function mysql_no()
    {
        $result = $this->db->query("SELECT * FROM $this->tbl_name WHERE todo_status=1 ");
        $this->row = mysqli_num_rows($result);
        printf("$this->row");
    }

    public function tbl_update($id)
    {
        $mysql = sprintf(
            "UPDATE $this->tbl_name SET todo_status= '1'  WHERE todo_id='%s' ",
            $this->db->real_escape_string($id),
        );
        $this->db->query($mysql);
    }
    function tbl_delete($id)
    {
        echo $id;
        $mysql = sprintf(
            "DELETE FROM $this->table_name WHERE todo_id='%s' ",
            $this->db->real_escape_string($id)
        );
        $this->db->query($mysql);
    }
}

$sql_que = new sql_que();
?>