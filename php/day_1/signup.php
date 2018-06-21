<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
</head>
<body>
<?php
include "database.php";

?>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="post" action="#">
					<span class="login100-form-title">
						Sign Up
					</span>

                <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
                    <input class="input100" type="text" name="username" placeholder="Username">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Please enter password">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input signup-input" data-validate = "Please enter re-password">
                    <input class="input100" type="password" name="re-password" placeholder="Confirm Password">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input signup-input" data-validate = "Please enter firstname">
                    <input class="input100" type="text" name="firstname" placeholder="First Name">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input signup-input" data-validate = "Please enter lastname">
                    <input class="input100" type="text" name="lastname" placeholder="Last Name">
                    <span class="focus-input100"></span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit" name="submit">
                        Sign Up
                    </button>
                </div>

                <div class="container-login100-form-btn">
                    <a href="login.php">
                        Sign In
                    </a>
                </div>

                <div class="messenger-login">
                    <?php
                    include 'database.php';

                    if (isset($_POST['submit'])){
                        $username = "";
                        $password = "";
                        $re_pass = "";
                        $first_name = "";
                        $last_name = "";


                        if (!isset($_POST['username']) || $_POST['username'] == null){
                            echo "Bạn chưa nhập tên người dùng! "."<br />";
                        }else{
                            $username = $_POST['username'];
                        }

                        if (!isset($_POST['password']) || $_POST['password'] == null){
                            echo "Bạn chưa nhập password"."<br />";
                        }else{
                            $password = $_POST['password'];
                        }

                        if (!isset($_POST['re-password']) || $_POST['re-password'] == null){
                            echo "Bạn chưa nhập confirm password"."<br />";
                        }else{
                            $re_pass = $_POST['re-password'];
                        }

                        if ($_POST['firstname'] != null && $_POST['firstname'] != ""){
                            $first_name = $_POST['firstname'];
                        }

                        if ($_POST['lastname'] != null && $_POST['lastname'] != ""){
                            $last_name = $_POST['lastname'];
                        }

                        if ($username != "" && $password != "" && $re_pass!="" && $password == $re_pass){
                            $sql_select_user = "SELECT * FROM users WHERE email = '$username' ";
                            $query_select_user = mysqli_query($con,$sql_select_user) or die("Không thể truy cập");
                            if (mysqli_num_rows($query_select_user) > 0){
                                echo "Tên đăng nhập đã được sử dụng!";
                            }else{
                                $sql_add_user = "INSERT INTO users(email,password,first_name,last_name)VALUES ('$username','$password','$first_name','$last_name')";
                                $query_add_user = mysqli_query($con,$sql_add_user);
                                echo "Thêm tài khoản thành công!";

                                // add role
                                if ($query_add_user){
                                    $last_id = mysqli_insert_id($con);
                                    $sql_add_role = "INSERT INTO role_users(user_id,role_id) VALUES ('$last_id',2)";
                                    mysqli_query($con,$sql_add_role);
                                }

                            }
                        }


                    }

                    ?>
                </div>

            </form>
        </div>
    </div>
</div>




<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<!--<script src="js/main.js"></script>-->

</body>
</html>