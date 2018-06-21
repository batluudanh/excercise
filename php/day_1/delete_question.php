<?php
session_start();
include "database.php";
include "role.php";
if ($role != 1){
    header('location: home_view.php');
    die();
}

$question_id = $_GET['id'];
$sql_delete_quest = "DELETE FROM qna__questions WHERE id = '$question_id' ";
echo $sql_delete_quest;
mysqli_query($con,$sql_delete_quest) or die("Không thể xóa được");
header("location: home_view.php");