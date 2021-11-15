<?php
//add function
class db_con
{
    public $db;
    public $tbl_name;
    public $tbl_col;
    public function __construct()
    {
        $this->db = new mysqli(HOST, USER, PASSWORD, DB);
        $this->tbl_name = "todo_tbl";
        $this->tbl_col = "todo_title, todo_date";
    }
}

class validate_item extends db_con
{
    public $one;
    public $two;
    public $three;
    public $four;
    public $five;
    public $six;
    public $status;
    public $col_data;
    public $row;
    public function item_one($one)
    {
        if ($one) {
            debug_console("valid");
            $this->one = $one;
            echo $this->one;
            $this->status = 1;
        }
    }
    public function item_two($one, $two)
    {
        if ($one && $two) {
            debug_console("valid");
            $this->one = $one;
            $this->two = $two;
            //$this->col_data = $this->one;
            $this->status = 1;
        }
    }
    public function item_three($one, $two, $three)
    {
        if ($one && $two && $three) {
            debug_console("valid");
            $this->one = $one;
            $this->two = $two;
            $this->three = $three;
            $this->status = 1;
        }
    }
}
$valid = new validate_item();
?>