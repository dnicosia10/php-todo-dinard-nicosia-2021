<?php
session_start();
if(!isset($_SESSION['item_pp'])){
    $_SESSION['item_pp'] = 5;
}

$status = "";
$item_pp = 1;
    if(isset($_POST['todo_bttn'])){
        debug_console("1");
        $valid->item_two($_POST['todo_input'],date("Y-m-d H:i:s"));
        $sql_que->tbl_write($valid->one,$valid->two,$valid->status);

    }
    if(isset($_POST['status_bttn'])){
        //echo $_POST['todo_id'];
        $sql_que->tbl_update($_POST['todo_id']);
    }
    if(isset($_POST['remove_bttn'])){
            $sql_que->tbl_update($_POST['todo_id']);
    }
    if(isset($_POST['save_bttn'])){

        $_SESSION['item_pp'] = $_POST['item_pp'];
        debug_console("session  : ". $_SESSION['item_pp']);
    }
?>