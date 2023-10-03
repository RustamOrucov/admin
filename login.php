<?php 
    require_once './config/functions.php';

  if(isset($_SESSION['user']['id'])){
    header("Location:./index.php");
    die;
  }

 if(isset($_POST)){
    login($_POST);
 }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V1</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="./login/assets/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./login/assets/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./login/assets/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./login/assets/css/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./login/assets/css/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./login/assets/css/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./login/assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="./login/assets/css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">

            <div class="wrap-login100">

                <div class="login100-pic js-tilt" data-tilt>
                    <img src="./login/assets/images/img-01.png" alt="IMG">
                </div>


                <form action="login.php" method="post" class="login100-form validate-form">
                    <span class="login100-form-title">
                        Login
                    </span>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-12 d-none">
                        <span class="txt1">
                            Forgot
                        </span>
                        <a class="txt2" href="#">
                            Username / Password?
                        </a>
                    </div>

                    <div class="text-center p-t-136">
                        <a class="txt2" href="#">

                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="./login/assets/js/jquery-3.2.1.min.js"></script>
    <script src="./login/assets/js/popper.js"></script>
    <script src="./login/assets/js/bootstrap.min.js"></script>
    <script src="./login/assets/js/select2.min.js"></script>
    <script src="./login/assets/js/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="./login/assets/js/main.js"></script>

</body>

</html>