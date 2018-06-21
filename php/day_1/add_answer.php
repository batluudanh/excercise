<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Answer</title>
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
    header('location: index.php');
}

$id_question = $_GET['id'];
$sql_show_quest = "SELECT * FROM qna__questions WHERE id = ".$id_question." ";
$query_show_quest = mysqli_query($con,$sql_show_quest);

?>
<div class="wrapper">
    <header>
        <nav class="navbar bg-dark navbar-dark justify-content-between">
            <a class="navbar-brand" href="index.php">Question & Answer</a>
            <a href="logout.php"><button class="btn btn-dark my-2 my-sm-0">Đăng xuất</button></a>
        </nav>
        <h1 class="page-title">Trả lời câu hỏi</h1>
    </header>
    <div class="container-fluid">
        <div class="content-add">
            <form id="form_question" method="post">
                <div>
                    <label><strong>Câu hỏi: </strong></label>
                    <div id="question">
                        <p>
                            <?php
                            foreach ($query_show_quest as $key => $value){
                                echo $value['question'];
                            }
                            ?>
                        </p>
                    </div>
                </div>
                <div>
                    <label>Trả lời: </label>
                    <textarea class="input-area" type="text" id="add_answer" name="add_answer"></textarea>
                </div>
                <div class="messenger-addans">
                    <?php
                    if (isset($_POST['submit'])){
                        if (!isset($_POST['add_answer']) || $_POST['add_answer'] == ""){
                            echo "Bạn chưa nhập một cái gì cả";
                        }else{
                            $answer = $_POST['add_answer'];
                            $sql_add_answer = "INSERT INTO qna__answers(answer,user_id,question_id) VALUES ('$answer','$user_id','$id_question')";
                            mysqli_query($con,$sql_add_answer) or die("Không thể thêm câu trả lời");
                            echo "Thêm thành công";
                        }

                    }

                    ?>
                </div>
                <button class="btn btn-success" type="submit" name="submit">Thêm</button>
            </form>
        </div>

    </div>
</div>


</body>
</html>