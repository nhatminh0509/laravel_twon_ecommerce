@extends('admin.layout')

@section('title')
Chi Tiết Hóa Đơn
@endsection

@section('content')
<div class="outer-w3-agile col-xl mt-3">
    <h4 class="tittle-w3-agileits mb-4" style="font-family: 'Times New Roman', Times, serif;">Chi Tiết Hóa Đơn</h4>
    <hr>
    
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
            <b>ID:</b>
        </div>
        <div class="col-sm-7">
            <p>{{$bill->id}}</p>
        </div>
        <br><br>
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
            <b>Tên Khách Hàng:</b>
        </div>
        <div class="col-sm-7">
            <p>{{$bill->customer->name}}</p>
        </div>
        <br><br>
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
            <b>Tổng Tiền:</b>
        </div>
        <div class="col-sm-7">
            <p><?php echo number_format($bill->total_Price);  ?></p>
        </div>
        <br><br>
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
            <b>Voucher:</b>
        </div>
        <div class="col-sm-7">
            <p><?php echo $bill->voucher->code??'Không có ';
            echo '<b> (';
            echo $bill->voucher->value ?? 0;
            echo '%)</b>';  ?></p>
        </div>
        <br><br>
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
            <b>Thành Tiền:</b>
        </div>
        <div class="col-sm-7">
            <p><?php echo number_format($bill->price_Checkout);  ?></p>
        </div>
        <br><br>
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
            <b>Trạng Thái:</b>
        </div>
        <div class="col-sm-7">
            <?php
            if($bill->status == 1)
            { ?>
                Chưa Xác Nhận 
                <a href='{{route("cancle-bill",$bill->id)}}' class='btn btn-danger'>Hủy Đơn Hàng</a>
                <a href='{{route("confirm-bill",$bill->id)}}' class='btn btn-success'>Xác Nhận Đơn Hàng</a>
            <?php }
            else if($bill->status == 2)
            {
            ?>
                Đã Xác Nhận 
                <a href='{{route("cancle-bill",$bill->id)}}' class='btn btn-danger'>Hủy Đơn Hàng</a>
                <a href='{{route("success-bill",$bill->id)}}' class='btn text-white'style='background-color:blue;'>Thành Công</a>
            <?php }
            else if($bill->status == 3)
            {
                echo 'Thành Công';
            }
            else if($bill->status == -1)
            {
                echo 'Đã Hủy';
            }
            ?>
        </div>  
    </div>
    <br><br>
    <div class="container">
        <table class="table table-hover">
            <thead style="background-color:lightgrey;">
                <th></th>
                <th >Tên Sản Phẩm</th>
                
                <th >Số Lượng</th>

                <th >Giá</th>
                <th ></th>
            </thead>
            <tbody>
            @foreach($bill->detail_bill as $detail_bill)
                <tr >
                    <td></td>
                    <td>{{$detail_bill->product->name}}</td>
                    <td>{{$detail_bill->quantity}}</td>
                    <td><?php echo number_format($detail_bill->price).'đ'; ?></td>
                    <td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{route('get-list-bill')}}" class="btn btn-outline-secondary btn-block">Trở Về</a>
    </div>
</div>
@endsection