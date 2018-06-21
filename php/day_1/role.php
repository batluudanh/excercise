<?php
// Kiểm tra quyền user
if (!isset($_SESSION['user_id'])){
    header('location: login.php');
    die();
}else{
    $user_id = $_SESSION['user_id'];
    $sql_check_role = "SELECT * FROM role_users WHERE user_id = '$user_id'";
    $query_check_role = mysqli_query($con,$sql_check_role) or die("Không check được role");
    foreach ($query_check_role as $key => $value){
        $role = $value['role_id'];
    }
}