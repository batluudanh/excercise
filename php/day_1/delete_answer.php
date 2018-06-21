<?php
session_start();
include "database.php";
include "role.php";
if ($role != 1){
    header('location: home_view.php');
    die();
}
$answer_id = $_GET['id'];
$sql_delete_ans = "Delete from qna__answers WHERE id = '$answer_id' ";
mysqli_query($con,$sql_delete_ans) or die("Không thể xóa câu trả lời");
header('location: home_view.php');