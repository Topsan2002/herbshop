<?php
    // session_destroy();
    $query = $conn->query("SELECT * FROM tb_employee WHERE emp_id = '" . $_SESSION['user_id'] . "' ");
    $fet = $query->fetch_object();
?>

<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-6">
                    <h3>Edit Profile</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Users</li>
                    </ol>
                </div>
                <div class="col-6">
                    <!-- Bookmark Start-->
                    <div class="bookmark pull-right">
                        <ul>
                            <li><a href="#" data-container="body" data-toggle="popover" data-placement="top" title="" data-original-title="Chat"><i data-feather="message-square"></i></a></li>
                            <li><a href="#" data-container="body" data-toggle="popover" data-placement="top" title="" data-original-title="Icons"><i data-feather="command"></i></a></li>
                            <li><a href="#" data-container="body" data-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i data-feather="layers"></i></a></li>
                            <li><a href="#"><i class="bookmark-search" data-feather="star"></i></a>
                                <form class="form-inline search-form" action="#" method="get">
                                    <div class="form-group form-control-search">
                                        <div class="Typeahead Typeahead--twitterUsers">
                                            <div class="u-posRelative">
                                                <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search.." name="q" title="" autofocus>
                                                <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div>
                                            </div>
                                            <div class="Typeahead-menu"></div>
                                            <script id="result-template" type="text/x-handlebars-template">
                                                <div class="ProfileCard u-cf">                        
                                <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
                                <div class="ProfileCard-details">
                                <div class="ProfileCard-realName">{{name}}</div>
                                </div>
                                </div>
                              </script>
                                            <script id="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
                                        </div>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <!-- Bookmark Ends-->
                </div>
            </div>
        </div>
    </div>

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="edit-profile">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">My Profile</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row mb-2">
                                    <div class="col-auto"><img class="img-70 rounded-circle" alt="" src="assets/images/user/7.jpg"></div>
                                    <div class="col">
                                        <h4 class="mb-1">สวัสดี, <?php echo $_SESSION['user_id'] . " " . $_SESSION['lname'] ?></h4>
                                        <p class="mb-4"><?php echo $_SESSION['role_name'] ?></p>
                                    </div>
                                </div>
                                <!-- <div class="form-group mb-3">
                                    <h6 class="form-label">Bio</h6>
                                    <textarea class="form-control" rows="5">On the other hand, we denounce with righteous indignation</textarea>
                                </div> -->
                                <div class="form-group mb-3">
                                    <label class="form-label">อีเมล</label>
                                    <input class="form-control" readonly="readonly" placeholder="<?php echo $_SESSION['email'] ?>">
                                </div>
                                <div class="row">
                                    <div class="form-group mb-3 col-md-12">
                                        <label class="form-label">เบอร์มือถือ</label>
                                        <input class="form-control" type="text" readonly="readonly" placeholder="<?php echo $_SESSION['phone'] ?>">
                                    </div>
                                    
                                </div>
                                
                                <!-- <div class="form-footer">
                                    <button class="btn btn-primary btn-block">Save</button>
                                </div> -->
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <form class="card" method="POST" action="api/api_emp.php?ac=edit&emp_id=<?php echo $_SESSION['user_id']?>" id="form_profile" enctype="multipart/form-data">
                        <div class="card-header">
                            <h4 class="card-title mb-0">แก้ไขข้อมูลสมาชิก</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-5">
                                    <div class="form-group mb-3">
                                        <label class="form-label">ชื่อ</label>
                                        <input class="form-control" type="text" name="fname" value="<?php echo $fet->fname; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-5">
                                    <div class="form-group mb-3">
                                        <label class="form-label">นามสกุล</label>
                                        <input class="form-control" type="text" name="lname" value="<?php echo $fet->lname; ?>">
                                    </div>
                                </div>
                               
                                <div class="col-sm-6 col-md-10">
                                    <div class="form-group mb-3">
                                        <label class="form-label">เบอร์มือถือ</label>
                                        <input class="form-control" type="text" name="phone" value="<?php echo $fet->phone; ?>">
                                    </div>
                                </div>
                                 <div class="col-sm-6 col-md-10">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Email</label>
                                        <input class="form-control" type="email" name="email" value="<?php echo $fet->email; ?>">
                                    </div>
                                </div>
                                <input class="form-control d-none" type="text" name="role_id" value="<?php echo $fet->role_id; ?>">

                                
                                
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary" type="submit">บันทึก</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>

<script>
    $(document).on("submit", "#form_profile", function(e) {
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
                console.log("data API");
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
                        location.replace('index.php?p=edit_profile')
                    }, 1500);
                } else {
                    // $("#btn_send_form").attr('data-kt-indicator', 'off');
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