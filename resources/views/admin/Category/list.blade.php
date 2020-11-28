@extends('admin.layout')
@section('content')
<div class="outer-w3-agile col-xl mt-3">
    <h4 class="tittle-w3-agileits mb-4" style="font-family: 'Times New Roman', Times, serif;">Danh sách danh mục sản phẩm</h4>
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
        span.fa.fa-unlock-alt {
            font-size: 20px;
            color: green;
        }
        span.fa.fa-lock {
            font-size: 20px;
            color: red;
        }
        lable.fa.fa-eye {
            border:1px solid;
            padding: 5px;
            border-radius:50%;
        }
        lable.fa.fa-eye:hover {
            background-color: green; 
            color: white;
        }
    </style>
    <form action="{{route('get-search-category')}}" method="get" style="float:left;">
        <lable for="search" class="text-secondary"><b>Tìm kiếm:</b></lable>
        <input type="text" name="search" id="search" class="text-secondary"/>
        <input type="submit" value="Tìm" class="btn btn-outline-secondary">
    </form>
    <form action="{{route('post-list-category')}}" method="post" style="float:right;">
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
    <form action="{{route('process-all-category')}}" method="post">
    {{csrf_field()}}
    <table class="table table-hover">
        <thead style="background-color:lightgrey;">
            <th><input type="checkbox" id="checkAll" onClick="toggle(this)"></th>
            <th>#</th>
            
            <th style="width:50%;">Tên Danh Mục</th>
            
            
            <th>Trạng Thái</th>
            <th>Xem Sản Phẩm<th>
            <th ></th>
        </thead>
        <tbody>
            @foreach($list_category as $category)
            <tr>
                <td><input type="checkbox" name="categoryID[]" value="{{$category->id}}"></td>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>
                <?php
                if($category->status ==0) { ?>
                    <a href="{{URL::to('/admin/category/active')}}/{{$category->id}}"><span class="fa fa-lock"></span></a>
                <?php }else{ ?>
                    <a href="{{URL::to('/admin/category/unactive')}}/{{$category->id}}"><span class="fa fa-unlock-alt"></span></a>
                <?php } ?>
                </td>
                <td>
                    <a href="{{route('view-product-category',$category->id)}}"><lable class="fa fa-eye" ></lable></a>
                </td>
                <td>
                    <a href="{{URL::to('/admin/category/edit')}}/{{$category->id}}" ><label class="fa fa-edit">Sửa</label></a> |
                    <a href="{{URL::to('/admin/category/detail')}}/{{$category->id}}" ><label class="fa fa-info-circle">Chi Tiết</label></a> |
                    <a href="{{URL::to('/admin/category/delete')}}/{{$category->id}}" onclick="return confirm('Bạn có chắc muốn xóa danh mục {{$category->name}} ??');" ><label class="fa fa-trash">Xóa</label></a> |
                </td>
            </tr>
           @endforeach
        </tbody>
    </table>
        <hr>
        <button type="submit" name="action" value="delete" class="btn btn-outline-secondary" onclick="return confirm('Bạn có chắc muốn xóa những danh mục đang chọn ??');">Delete</button>
        <button type="submit" name="action" value="active" class="btn btn-outline-secondary">Active</button>
        <button type="submit" name="action" value="unactive" class="btn btn-outline-secondary">Unactive</button>
        <a href="{{route('export-category')}}" class="btn btn-outline-secondary">Xuất file excel</a>
        <hr>
        <center style="margin-bottom:20px;"><span><?php try{ ?>{{ $list_category->render('paginate') }}<?php } catch(Exception $e) {} ?></span></center>
    
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
        checkboxes = document.getElementsByName('categoryID[]');
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
Danh Sách Danh Mục Sản Phẩm
@endsection

