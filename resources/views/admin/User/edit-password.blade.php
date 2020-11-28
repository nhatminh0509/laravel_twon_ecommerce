@extends('admin.layout')

@section('title')
Thêm Nhân Viên
@endsection

@section('content')
<div class="outer-w3-agile col-xl mt-3">
    <h4 class="tittle-w3-agileits mb-4" style="font-family: 'Times New Roman', Times, serif;">Sửa Mật Khẩu</h4>
    <form action="{{route('post-edit-password-admin')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$user->id}}">
        <div class="form-group">
            <label for="exampleFormControlInput1" >Mật Khẩu Cũ</label>
            <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="" required="" >
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1" >Mật Khẩu Mới</label>
            <input type="password" name="new_password" class="form-control" id="new_password" placeholder="" required="" >
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1" >Nhập Lại Mật Khẩu Mới</label>
            <input type="password" name="confirm_new_password" class="form-control" id="confirm_new_password" placeholder="" required="" onchange="confirmpass()">
            <div id="aleft_confirm_new_pass"></div>   
        </div>
        <div class="form-group">
                <button type="submit" name="add_admin" id="btn_submit"class="form-control btn btn-primary" disabled >Sửa</button>
        </div>
    </form>
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

    <script type='text/javascript'>
    function confirmpass() {
        var newpass = document.getElementById("new_password").value;
        var confirmnewpass = document.getElementById("confirm_new_password").value;
        var btnSubmit = document.getElementById("btn_submit");
        if (newpass!=confirmnewpass) {
            document.getElementById('aleft_confirm_new_pass').innerHTML = "<span style='color:red;'>Mật khẩu mới chưa khớp</span>";
            btnSubmit.disabled=true;
        } else if(newpass==confirmnewpass)
        {
            btnSubmit.disabled=false;
            document.getElementById('aleft_confirm_new_pass').innerHTML = "";
        }
    }
    </script>
    
</div>

@endsection