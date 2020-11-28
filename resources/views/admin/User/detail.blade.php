@extends('admin.layout')
@section('title')
Chi Tiết Nhân Viên
@endsection

@section('content')
<style>
        .alert {
        padding: 15px;
        background-color: #4CAF50;
        color: white;
        }

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
        th,td{
            text-align:center;
        }
        
    </style>
<div class="container-fluid">
<div class="outer-w3-agile col-xl mt-3 mx-xl-3 p-xl-0 px-md-5">
    <div class="header">
        <div class="text">
            <img src="{!!asset('uploads/avatar_admin')!!}/{{$user->avatar}}?{{rand(1,1000)}}" class="img-fluid rounded-circle" alt="Responsive image" style="width:15%;">
            <br><br><br>
        </div>
    </div>
    <div class="container-flud">
        <div class="followers row">
            <div class="f-left col" id="f-left-edit">
                <a href="{{route('get-edit-password-admin',$user->id)}}">
                    <i class="fas fa-edit"> Sửa Mật Khẩu</i>
                </a>
            </div>
            <div class="f-left col border-left border-right" id="f-left-edit">
                <a href="{{route('get-edit-admin',$user->id)}}">
                    <i class="fas fa-edit"> Sửa Thông Tin</i>
                </a>
            </div>
        </div>
    </div>
    <?php
        $message = Session::get('message');
        if($message)
        {
            echo '<div class="alert">
            <span id ="close"class="closebtn" onclick="this.parentElement.style.display='."'none'".';">&times;</span>'.$message.'</div>';
            Session::put('message',null);
        }

    ?>
    <script>//Hàm 2 giây đóng
        setTimeout(function() {
            var btn = document.getElementById('close');
            btn.click();
    }, 2000);
    </script>
    <br>
    <div class="row" style="min-height:400px;color:#335a72;">
    <div class="col-sm-3"></div>
    <div class="col-sm-6" style="font-size:20px;">
    <b style="float:left;">Tên: </b><p style="float:right;">{{$user->name ?? ''}}</p>
    </div>
    <div class="col-sm-3"></div>

    
    <div class="col-sm-3"></div>
    <div class="col-sm-6" style="font-size:20px;">
    <b style="float:left;">Email: </b><p style="float:right;"><a href="mailto:{{$user->email ?? ''}}">{{$user->email ?? ''}}</a></p>
    </div>
    <div class="col-sm-3"></div>

    
    <div class="col-sm-3"></div>
    <div class="col-sm-6" style="font-size:20px;">
    <b style="float:left;">Số Điện Thoại: </b><p style="float:right;">{{$user->phone ?? ''}}</p>
    </div>
    <div class="col-sm-3"></div>

    <div class="col-sm-3"></div>
    <div class="col-sm-6" style="font-size:20px;">
    <b style="float:left;">CMND: </b><p style="float:right;">{{$user->cmnd ?? ''}}</p>
    </div>
    <div class="col-sm-3"></div>
    </div>
</div>
</div>
@endsection