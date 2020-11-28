@extends('admin.layout')
@section('content')
<div class="outer-w3-agile col-xl mt-3">
    <h4 class="tittle-w3-agileits mb-4" style="font-family: 'Times New Roman', Times, serif;">Danh sách nhân viên</h4>
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
        span.fa.fa-eye {
            font-size: 20px;
            color: green;
        }
        span.fa.fa-eye-slash {
            font-size: 20px;
            color: red;
        }
    </style>
    <form action="{{route('get-search-admin')}}" method="get" style="float:left;">
        <lable for="search" class="text-secondary"><b>Tìm kiếm:</b></lable>
        <input type="text" name="search" id="search" class="text-secondary"/>
        <input type="submit" value="Tìm" class="btn btn-outline-secondary">
    </form>
    <form action="{{route('post-list-admin')}}" method="post" style="float:right;">
    {{csrf_field()}}
        <lable for="view">Hiển Thị:</lable>
        <select id="view" name="view" onchange="change_click(event)">
            <?php $view = Session::get('view'); ?>
            <option value="5" <?php if($view && $view == 5){?> selected <?php } ?>>5 hiển thị 1 trang</option>
            
            <option value="10" <?php if($view && $view == 10){?> selected <?php } ?>>10 hiển thị 1 trang</option>
            
            <option value="20" <?php if($view && $view == 20){?> selected <?php } ?>>20 hiển thị 1 trang</option>
            
            <option value="50" <?php if($view && $view == 50){?> selected <?php } ?>>50 hiển thị 1 trang</option>
            
            <option value="100" <?php if($view && $view == 100){?> selected <?php } ?>>100 hiển thị 1 trang</option>
        </select>
        <input type="submit" id="submit_form" style="display:none;">
    </form>
    <form action="{{route('process-all-admin')}}" method="post">
    {{csrf_field()}}
    <table class="table table-hover">
        <thead style="background-color:lightgrey;">
            <th><input type="checkbox" id="checkAll" onClick="toggle(this)"></th>
            <th>#</th>
            
            <th style="width:50%;">Tên Nhân Viên</th>
            
            
            <th>Trạng Thái</th>
            <th ></th>
        </thead>
        <tbody>
            @foreach($list_user as $user)
            <tr>
                <td><input type="checkbox" name="adminID[]" value="{{$user->id}}"></td>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>
                <?php                      
                    if($user->status ==0) { ?>
                        <a href="{{route('active-admin',$user->id)}}"><span class="fa fa-eye-slash"></span></a>
                    <?php }else{ ?>
                        <a href="{{route('unactive-admin',$user->id)}}"><span class="fa fa-eye"></span></a>
                    <?php } 
                ?>
                </td>
                <td>
                    <a href="{{route('get-edit-admin',$user->id)}}" ><label class="fa fa-edit">Sửa</label></a> |
                    <a href="{{route('get-detail-admin',$user->id)}}" ><label class="fa fa-info-circle">Chi Tiết</label></a> |
                    <a href="{{route('get-delete-admin',$user->id)}}" onclick="return confirm('Bạn có chắc muốn xóa nhân viên tên {{$user->name}} ??');" ><label class="fa fa-trash">Xóa</label></a> |
                </td>
            </tr>
           @endforeach
        </tbody>
    </table>
        <hr>
        <button type="submit" name="action" value="delete" class="btn btn-outline-secondary" onclick="return confirm('Bạn có chắc muốn xóa những nhân viên đang chọn ??');">Delete</button>
        <button type="submit" name="action" value="active" class="btn btn-outline-secondary">Active</button>
        <button type="submit" name="action" value="unactive" class="btn btn-outline-secondary" onclick="return confirm('Cẩn Thận !! Nếu bao gồm bạn, bạn sẽ không thể đăng nhập trở lại ??');">Unactive</button>
        
        <hr>
        <center style="margin-bottom:20px;"><span><?php try{ ?>{{ $list_user->render('paginate') }}<?php } catch(Exception $e) {} ?></span></center>
    
    </form>
    
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
    <script language="JavaScript">
    function toggle(source) 
    {
        checkboxes = document.getElementsByName('adminID[]');
        for(var i=0, n=checkboxes.length;i<n;i++) {
        checkboxes[i].checked = source.checked;
        }
    }
    </script>

    <script type='text/javascript'>//hàm click khi thay doi gia tri
    function change_click(event) 
    {
      var submit_form = document.getElementById('submit_form');
      submit_form.click();
    }
</script>
</div>
@endsection

@section('title')
Danh Sách Nhân Viên
@endsection