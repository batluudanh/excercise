<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link type="text/css" rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="../../fontawesome/css/fontawesome-all.min.css">
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

?>

    <div class="wrapper">
        <header>
            <nav class="navbar bg-dark navbar-dark justify-content-between">
                <a class="navbar-brand" href="home_view.php">Question & Answer</a>
                <a href="logout.php"><button class="btn btn-dark my-2 my-sm-0">Đăng xuất</button></a>
            </nav>
            <h1 class="page-title">Trang chủ</h1>
        </header>
        <div class="container-fluid">
            <div class="content">
                <a href="add_question.php"><input type="button" value="Thêm câu hỏi"></a>
                <?php
                $sql_show_quest = "SELECT * FROM qna__questions";
                $query_show_quest = mysqli_query($con,$sql_show_quest);

                foreach ($query_show_quest as $key => $value){
                    $question_id = $value['id'];
                    echo '<div class="block-question col-md-9">';
                    echo '<div class="question"><strong>Câu hỏi: </strong>
                        '.$value['question'].'
                    </div><hr>';


                    $sql_show_ans = "SELECT * FROM qna__answers WHERE question_id = '.$question_id.'";
                    $query_show_ans = mysqli_query($con,$sql_show_ans);
                    foreach ($query_show_ans as $k => $v){
                        echo '<div class="answer row">';
                        echo '<div class="answer-detail col-md-10">Trả lời: ';
                        echo $v['answer'];
                        echo '</div>';
                        if ($role == 1 ){
                            echo '<div class="col-md-2">';
                            echo '<a href="update_answer.php?quest_id='.$question_id.'&ans_id='.$v['id'].' "><button class="btn btn-dark answer-action action-edit"><i class="fas fa-edit"></i></button></a>';
                            echo '<a href="delete_answer.php?id='.$v['id'].' "><button class="btn btn-dark answer-action action-delete"><i class="fas fa-trash-alt"></i></button></a>';
                            echo '</div>';
                        }
                        echo '</div>';
                        echo '<hr>';
                    }

                    if ($role == 1){
                        echo '<a href="add_answer.php?id='.$value['id'].' "><button>Thêm trả lời</button></a>
                              <a href="update_question.php?id='.$question_id.' "><button>Sửa câu hỏi</button></a>
                              <a href="delete_question.php?id='.$question_id.'"><button>Xóa câu hỏi</button></a>';

                    }
                    echo '</div>';

                }


                ?>


            </div>

        </div>
    </div>


</body>
</html>