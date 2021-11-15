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
            foreach ($result as $row) {
                printf(
                    "<form method='POST' action='index.php'>
                <li class='list-group-item'>
                        %s
                <button type='button'  class='btn btn-light fa fa-trash-o float-right ml-1' data-toggle='modal' data-target='#deleteConfirmModal'></button>
                <button type='submit' name='status_bttn' class='btn btn-light fa fa-check float-right'></button>
                <input type='hidden' name='todo_id' value='%s'>
                </li>
                <section>
        <div class='modal' id='deleteConfirmModal' tabindex='-1' data-backdrop='static'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title'>Delete Task?</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                    <div class='modal-body'>
                        <p>Are you sure you want to delete this task?</p>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-light' data-dismiss='modal'>Cancel</button>
                        <button type='submit' name='remove_bttn'  class='btn btn-primary'>Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
                </form>
            ",
                    //display item
                    htmlspecialchars($row['todo_title'], ENT_QUOTES),
                    htmlspecialchars($row['todo_id'], ENT_QUOTES)
                );
            }
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