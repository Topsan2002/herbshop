<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../../assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../../assets/images/favicon.png" type="image/x-icon">
    <title>Cuba - Premium Admin Template</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/fontawesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/feather-icon.css">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
    <link id="color" rel="stylesheet" href="../../../../assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/responsive.css">
</head>

<body>

    <?php
        include("../../connect.php");
        if(isset($_GET['token'])){
            $token = $_GET['token'];
            $query = $conn->query("SELECT * FROM tb_forget WHERE token = '$token'");
            if($query->num_rows > 0) {
                $row = $query->fetch_array();
                $email = $row['email'];
            }
        }
    ?>
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper">
        <div class="container-fluid">
            <!-- Reset Password page start-->
            <div class="authentication-main mt-0">
                <div class="row">
                    <div class="col-md-12 p-0">
                        <div class="auth-innerright auth-minibox">
                            <div class="authentication-box auth-minibox1">
                                <div class="text-center"><img src="../../assets/images/other-images/cuba-logo1.png" alt=""></div>
                                <div class="card mt-10 p-10">
                                    <h5 class="f-20 mb-3 f-w-600">Reset password</h5>
                                    <form class="theme-form" action="../api/api_mail.php" method="POST" id="form_reset">
                                        <div class="form-group">
                                            <label class="col-form-label">Password</label>
                                            <input id="password" class="form-control" type="password" name="password">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Confirm Password</label>
                                            <input id="Confirmpassword" class="form-control" type="password" name="confirmpassword">
                                        </div>
                                        <div class="form-group row mb-0">
                                            <div class="col-md-10">
                                                <button class="btn btn-primary" type="submit">ตกลง</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Reset Password page end-->
        </div>
    </div>
    <!-- page-wrapper Ends-->
    <!-- latest jquery-->
    <script src="../../assets/js/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap js-->
    <script src="../../assets/js/bootstrap/popper.min.js"></script>
    <script src="../../assets/js/bootstrap/bootstrap.js"></script>
    <!-- feather icon js-->
    <script src="../../assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="../../assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- Sidebar jquery-->
    <script src="../../assets/js/sidebar-menu.js"></script>
    <script src="../../assets/js/config.js"></script>
    <!-- Plugins JS start-->
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="../../assets/js/script.js"></script>
    <!-- login js-->
    <!-- Plugin used-->
    <script>
        $(document).ready(function() {
            $("#form_reset").on('submit', function(e){
                e,preventDefault();

                // var email = $("#email").val();
                var password = $("#password").val();
                var confirmpassword = $("#confirmpassword").val();

                $.ajax({
                    type:"POST",
                    url:"reset_password.php",
                    data:{email:email,password:password,confirmpassword:confirmpassword},

                    success:function(data){
                        $(".card mt-10 p-10").css("display","block");
                        $(".card mt-10 p-10").html(data);
                    }
                });
            });
        });
    </script>
</body>

</html>