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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
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
                                <div class="card mt-4 p-4">
                                    <h5 class="f-20 mb-3 f-w-600">LOGIN YOUR ACCOUNT</h5>
                                    <form class="theme-form" action="../api/api_user.php?ac=login" method="POST" id="form_login">
                                        <div class="form-group">
                                            <label class="col-form-label">อีเมล</label>
                                            <input class="form-control" type="text" name="email" require>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">รหัสผ่าน</label>
                                            <input class="form-control" type="password" name="password" require>
                                        </div>
                                        <div class="checkbox p-0">
                                            <input type="checkbox" id="remember"  name="remember">
                                            <label for="remember">Remember me</label>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <div class="col-md-10">
                                                <button class="btn btn-primary" type="submit">LOGIN</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="pl-10 mt-4 mb-4"><a class="btn-link text-danger" href="forget_password.php">ลืมรหัสผ่านของคุณ ?</a></div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="d-flex justify-content-end mt-4 mb-4"><a class="btn-link text-success" href="create_account.php">สมัครสมาชิก</a></div>
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
        $(document).on("submit", "#form_login", function(e) {
            e.preventDefault();
            // console.log('in');
            var url = $(this).attr("action");
            var data = new FormData(this);
            // console.log("result data : am in ");
            console.log(url);
            // console.log(data);
            $.ajax({
                url: url,
                type: $(this).attr("method"),
                dataType: "JSON",
                data: data,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    // $("#btn_send_form").attr('data-kt-indicator', 'on');
                },
                success: function(data, status) {
                    // console.log("data API");
                    console.log(data);
                    if (data['status'] == true) {
                        // $("#btn_send_form").attr('data-kt-indicator', 'off');
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: data['msg'],
                            showConfirmButton: false,
                            timer: 1500
                        })
                        setTimeout(() => {
                            location.replace(data['path'])
                        }, 1500);
                    } else {
                        $("#btn_send_form").attr('data-kt-indicator', 'off');
                        Swal.fire({
                            text: data['msg'],
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "ตกลง",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    }
                }
            });

        });
    </script>
</body>

</html>