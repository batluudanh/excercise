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
                    <textarea class="input-area" type="text" id="add_question" name="add_question"></textarea>
                </div>
                <button class="btn btn-success" type="submit" value="Thêm" name="submit">Thêm</button>
            </form>
        </div>

    </div>
</div>

<?php
session_start();
include "database.php";

if (isset($_POST['submit'])){
    if (!isset($_POST['add_question']) || $_POST['add_question'] == ""){
        echo "Bạn chưa nhập một cái gì cả";
    }else{
        $new_question = $_POST['add_question'];
        $sql_add = "insert into qna__questions(question) VALUES ('$new_question') ";
        mysqli_query($con,$sql_add);
        echo "Thêm thành công";
    }

}


?>

</body>
</html>