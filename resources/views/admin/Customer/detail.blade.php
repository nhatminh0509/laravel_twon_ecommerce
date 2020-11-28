@extends('admin.layout')
@section('title')
Chi Tiết Khách Hàng
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
    <b style="float:left;">Tên: </b><p style="float:right;">{{$customer->name ?? ''}}</p>
    </div>
    <div class="col-sm-3"></div>

    
    <div class="col-sm-3"></div>
    <div class="col-sm-6" style="font-size:20px;">
    <b style="float:left;">Email: </b><p style="float:right;"><a href="mailto:{{$customer->email ?? ''}}">{{$customer->email ?? ''}}</a></p>
    </div>
    <div class="col-sm-3"></div>

    
    <div class="col-sm-3"></div>
    <div class="col-sm-6" style="font-size:20px;">
    <b style="float:left;">Số Điện Thoại: </b><p style="float:right;">{{$customer->phone ?? ''}}</p>
    </div>
    <div class="col-sm-3"></div>

    <div class="col-sm-3"></div>
    <div class="col-sm-6" style="font-size:20px;">
    <b style="float:left;">Địa Chỉ: </b><p style="float:right;">{{$customer->address ?? ''}}</p>
    </div>
    <div class="col-sm-3"></div>

    <div class="col-sm-3"></div>
    <div class="col-sm-6" style="font-size:20px;">
    <b style="float:left;">Tổng Chi Tiêu: </b><p style="float:right;">{{$customer->total_Amount ?? ''}}</p>
    </div>
    <div class="col-sm-3"></div>
    </div>
</div>
</div>
@endsection