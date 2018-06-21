<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link type="text/css" rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="css/mystyle.css">
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="vendor/bootstrap/js/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<?php
session_start();
include "database.php";
include "role.php";
if ($role != 1){
    header('location: home_view.php');
}

$id = $_GET['id'];
?>

<div class="wrapper">
    <header>
        <nav class="navbar bg-dark navbar-dark justify-content-between">
            <a class="navbar-brand" href="home_view.php">Question & Answer</a>
            <a href="logout.php"><button class="btn btn-dark my-2 my-sm-0">Đăng xuất</button></a>
        </nav>
        <h1 class="page-title">Thêm câu hỏi</h1>
    </header>
    <div class="container-fluid">
        <div class="content-add">
            <form id="form_question" method="post">
                <div>
                    <label>Câu hỏi: </label>
                    <textarea class="input-area" type="text" id="add_question" name="add_question">
                        <?php
                            $sql_show_quest = "Select * from qna__questions WHERE id = '$id'";
                            $show_quest = mysqli_query($con,$sql_show_quest) or die('Không show được');
                            foreach ($show_quest as $key => $value){
                                echo $value['question'];
                            }
                        ?>
                    </textarea>
                </div>
                <button class="btn btn-success" type="submit" name="submit">Sửa</button>
            </form>
        </div>

    </div>
</div>

<?php

if (isset($_POST['submit'])){
    if (!isset($_POST['add_question']) || $_POST['add_question'] == ""){
        echo "Bạn chưa nhập một cái gì cả";
    }else{
        $new_question = $_POST['add_question'];
        $sql_update = "update qna__questions set question = '$new_question' WHERE id = '$id'";
        mysqli_query($con,$sql_update);
        echo "Sửa thành công";
        header("location:home_view.php");
    }

}


?>

</body>
</html>