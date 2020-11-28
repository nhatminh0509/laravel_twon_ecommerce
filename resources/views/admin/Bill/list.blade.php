@extends('admin.layout')
@section('content')
<div class="outer-w3-agile col-xl mt-3">
    <h4 class="tittle-w3-agileits mb-4" style="font-family: 'Times New Roman', Times, serif;">Danh Sách Hóa Đơn <?php if(isset($name))echo $name; ?></h4>
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
    <form action="<?php if(!isset($name)) echo route('post-list-bill'); else if($name == 'Đã Xác Nhận') echo route('post-list-billConfirm'); else if($name == 'Đã Hủy') echo route('post-list-billCancle'); else if ($name == 'Đã Thành Công') echo route('post-list-billSuccess'); else if ($name == 'Chưa Xác Nhận') echo route('post-list-billNotConfirm'); ?>" method="post" style="float:right;">
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
    <table class="table table-hover">
        <thead style="background-color:lightgrey;">
            <th>#</th>
            
            <th >Tên Khách Hàng</th>
            
            <th >Thành Tiền</th>
            
            <th>Trạng Thái</th>
            <th ></th>
        </thead>
        <tbody>
        @foreach($list_bill as $bill)
            <tr style="background-color:<?php if($bill->status == 1)echo '#eab82a;';else if($bill->status == 2)echo '#2aea4a;';else if($bill->status ==3)echo '#2a6eea;';else if($bill->status==-1)echo 'red;'; ?>">
                <td>{{$bill->id}}</td>
                <td>{{$bill->customer->name}}</td>
                <td><?php echo number_format($bill->price_Checkout).'đ'; ?></td>
                <td>
                <?php 
                if($bill->status == 1)
                {
                    echo 'Chưa Xác Nhận';
                }
                else if($bill->status == 2)
                {
                    echo 'Đã Xác Nhận';
                }
                else if($bill->status == 3)
                {
                    echo 'Thành Công';
                }
                else if($bill->status == -1)
                {
                    echo 'Đã Hủy';
                }
                ?>
                </td>
                <td><a href="{{route('get-detail-bill',$bill->id)}}" ><label class="fa fa-info-circle">Chi Tiết</label></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <center style="margin-bottom:20px;"><span><?php try{ ?>{{ $list_bill->render('paginate') }}<?php } catch(Exception $e) {} ?></span></center>
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
Danh Sách Hóa Đơn
@endsection

