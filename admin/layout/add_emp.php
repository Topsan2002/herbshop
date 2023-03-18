<?php 
    if (isset($_REQUEST['emp_id'])) {
        $query = $conn->query("SELECT * FROM tb_employee WHERE emp_id = '".$_REQUEST['emp_id']."' ");
        $fet = $query->fetch_object();
        $api = "api/api_emp.php?ac=edit&emp_id=".$_REQUEST['emp_id'];

    }else{
        $api = "api/api_emp.php?ac=add";
    }


 ?>


<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-6">
                    <h3> Employee</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Apps</li>
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
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <?php 


                         ?>
                        <form method="POST" action="<?php echo $api ?>" id="form_emp" enctype="multipart/form-data" >
                        <div class="form theme-form">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>ประเภผู้ใช้</label>
                                        <select class="form-control digits" name="role_id" required>
                                             <?php 
                                        $query_role = $conn->query("SELECT * FROM user_role WHERE role_id != '2' ");
                                        while($fet_role = $query_role->fetch_object()){ ?>
                                             <option
                                             <?php 
                                                if (isset($_REQUEST['emp_id'])) {
                                                    if ($fet->role_id == $fet_role->role_id) {
                                                        echo "selected";
                                                    }
                                                }
                                              ?>
                                              value="<?php echo $fet_role->role_id ?>"><?php echo $fet_role->role_name; ?></option> 
                                        <?php   }
                                         ?>
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>ชื่อ</label>
                                        <input class="form-control" type="text" value="<?php if(isset($_REQUEST['emp_id'])){ echo $fet->fname; } ?>" placeholder="ชื่อ" name="fname" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>นามสกุล</label>
                                        <input class="form-control" type="text" value="<?php if(isset($_REQUEST['emp_id'])){ echo $fet->lname; } ?>" placeholder="นามสกุล" name="lname" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>email</label>
                                        <input class="form-control" type="email" value="<?php if(isset($_REQUEST['emp_id'])){ echo $fet->email; } ?>" placeholder="email" name="email" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>เบอร์โทร</label>
                                        <input class="form-control" type="text" value="<?php if(isset($_REQUEST['emp_id'])){  echo $fet->phone; } ?>" placeholder="เบอร์โทร" name="phone" required>
                                    </div>
                                </div>
                            </div>
                          
                             
                            <div class="row">
                                <div class="col">
                                    <div class="form-group mb-0">
                                        <!-- <a class="btn btn-success mr-3" href="#">Edit</a> -->
                                        <button class="btn btn-success mr-3" type="submit">บันทึก</button>
                                        <a class="btn btn-danger" href="index.php?p=list_employee">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>


<script>
$(document).on("submit", "#form_emp", function(e) {
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
                
               Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: data['msg'],
                        showConfirmButton: false,
                        timer: 1500
                    })
                    setTimeout(() => {
                        location.replace('index.php?p=list_employee')
                    }, 1500);
            } else {
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