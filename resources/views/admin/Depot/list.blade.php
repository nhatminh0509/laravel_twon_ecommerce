@extends('admin.layout')

@section('title')
Kho hàng
@endsection

@section('content')
<div class="outer-w3-agile col-xl mt-3">
    <h4 class="tittle-w3-agileits mb-4" style="font-family: 'Times New Roman', Times, serif;">Kho hàng</h4>
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
    <form action="{{route('get-search-depot')}}" method="get" style="float:left;">
        <lable for="search" class="text-secondary"><b>Tìm kiếm:</b></lable>
        <input type="text" name="search" id="search" class="text-secondary"/>
        <input type="submit" value="Tìm" class="btn btn-outline-secondary">
    </form>
    <form action="{{route('post-list-depot')}}" method="post" style="float:right;">
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
    <script type='text/javascript'>//hàm click khi thay doi gia tri
    function change_click(event) 
    {
      var submit_form = document.getElementById('submit_form');
      submit_form.click();
    }
    </script>
    <table class="table table-hover">
        <thead style="background-color:lightgrey;">
            <th>#</th>
            
            <th style="width:25%;">Tên</th>
           
            <th>Giá Nhập</th>

            
            <th>Giá Bán</th>
            
            <th>Số lượng tồn</th>

        </thead>
        <tbody>
            @foreach($list_product as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->in_price}}</td>
                <td>{{$product->out_price}}</td>
                <td>{{$product->quantity}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
        <hr>
        <center style="margin-bottom:20px;"><span><?php try{ ?>{{ $list_product->render('paginate') }}<?php } catch(Exception $e) {} ?></span></center>
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
</div>
@endsection