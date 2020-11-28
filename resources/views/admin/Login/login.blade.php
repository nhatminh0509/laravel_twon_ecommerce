<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>TwoN Gear</title>
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Modernize Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta Tags -->

    <!-- Style-sheets -->
    <!-- Bootstrap Css -->
    <link href="{!! asset('admin-asset/css/bootstrap.css')!!}" rel="stylesheet" type="text/css" media="all" />
    <!-- Bootstrap Css -->
    <!-- Common Css -->
    <link href="{!! asset('admin-asset/css/style.css')!!}" rel="stylesheet" type="text/css" media="all" />
    <!--// Common Css -->
    <!-- Fontawesome Css -->
    <link href="{!! asset('admin-asset/css/fontawesome-all.css')!!}" rel="stylesheet">
    <!--// Fontawesome Css -->
    <!--// Style-sheets -->

    <!--web-fonts-->
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!--//web-fonts-->
</head>

<body>
    <div class="bg-page py-5">
        <div class="container">
            <!-- main-heading -->
            <style>
                .closebtn {
                margin-left: 15px;
                color: white;
                font-weight: bold;
                float: right;
                font-size: 22px;
                line-height: 20px;
                cursor: pointer;
                transition: 0.3s;
                }

                .closebtn:hover {
                color: black;
                }
            </style>
                   
            <script>//Hàm 2 giây đóng
                setTimeout(function() {
                    var btn = document.getElementById('close');
                    btn.click();
            }, 2000);
            </script>
            <h2 class="main-title-w3layouts mb-2 text-center text-white">Đăng Nhập</h2>
            <!--// main-heading -->
            <div class="form-body-w3-agile text-center w-lg-50 w-sm-75 w-100 mx-auto mt-5">
                <?php
                    if(isset($status))
                    {
                        echo '<div class="alert alert-danger">
                        <span id ="close"class="closebtn" onclick="this.parentElement.style.display='."'none'".';">&times;</span>'.$status.'</div>';
                    }
                ?> 
                <form action="{{route('post-admin-login')}}" method="post">{{csrf_field()}}
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" value="admin@123" name="txtEmail" placeholder="Email của bạn" required="">
                    </div>
                    <div class="form-group">
                        <label>Mật Khẩu</label>
                        <input type="password" class="form-control" value="12345" name="txtPassword" placeholder="Password" required="">
                    </div>
                    <div class="d-sm-flex justify-content-between">
                        <!-- <div class="form-check col-md-6 text-sm-left text-center">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Nhớ Mật Khẩu</label>
                        </div> -->
                        <!-- <div class="forgot col-md-6 text-sm-right text-center">
                            <a href="forgot.html">Quên Mật Khẩu?</a>
                        </div> -->
                    </div>
                    <button type="submit" class="btn btn-primary error-w3l-btn mt-sm-5 mt-3 px-4">Đăng Nhập</button>
                </form>
            </div>
        </div>
    </div>


    <!-- Required common Js -->
    <script src="{!! asset('admin-asset/js/jquery-2.2.3.min.js')!!}"></script>
    <!-- //Required common Js -->

    <!-- Js for bootstrap working-->
    <script src="{!! asset('admin-asset/js/bootstrap.min.js')!!}"></script>
    <!-- //Js for bootstrap working -->

</body>

</html>