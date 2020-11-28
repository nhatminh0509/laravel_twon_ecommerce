@extends('client.layout')

@section('breadcrumb')
Giỏ Hàng
@endsection

@section('title')
Giỏ Hàng
@endsection
@section('content')
<style>
.alert {
padding: 15px;
background-color: red;
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
</style>


<script>
    setTimeout(function() {
        var btn = document.getElementById('close');
        btn.click();
}, 4000);
</script>
<div class="container">
<?php
    $message = Session::get('message');
    if($message)
    {
        echo '<div class="alert">
        <span id ="close"class="closebtn" onclick="this.parentElement.style.display='."'none'".';">&times;</span>'.$message.'</div>';
        Session::put('message',null);
    }
?>
	<div class="row">
		<div class="col-sm-6 col-xs-12">
            <form action="{{route('updateQuantity')}}" method="POST">
            {{csrf_field()}}
                <input type="hidden" name="id_bill" value="{{$bill->id}}">
                <h1 class="title-box-login" style="margin-bottom: 10px;">
                    Giỏ Hàng(2 sản phẩm)
                </h1>
                <input type="hidden" name="tong_soluong_sp" value="2"/>
                <hr>
                @foreach($bill->detail_bill as $detail_bill)
                    <span>
                        <div class="row">
                            <div class="col-sm-2"><img src="{{ asset('uploads/product') }}/{{$detail_bill->product->image_1}}?{{Rand(1,1000)}}" style="max-width: 90px;"/></div>
                            <div class="col-sm-6">
                                <input type="hidden" name="id_sp_1" value="1"/>
                                <input type="hidden" name="size_sp_1" value="S"/>
                                <p id="ten_sp_gio_hang">{{$detail_bill->product->name}}</p>
                                <p id="soluong_sp_gio_hang"><b>Số Lượng: </b><input type="number" value="{{$detail_bill->quantity}}" max="{{$detail_bill->product->quantity}}" min="0" name="quantity_{{$detail_bill->product->id}}"/></p>                    
                            </div>
                            <div class="col-sm-4">
                                <p id="gia_sp_gio_hang">Giá: {{$detail_bill->price}}</p>
                            </div>
                        </div>
                        <hr>
                    </span>
                @endforeach
                <span>
                    <button type="submit" class="btn btn-outline-secondary btn-block">Cập Nhật Giỏ Hàng</button>
                </span>
            </form>
            <br>
            <div style="padding:10px;border:1px solid;text-align:center;border-radius:10px;">
                <form action="{{route('updateVoucher')}}" method="post">
                {{csrf_field()}}
                    <h3 class="text-secondary">Mã Giảm Giá</h3>
                    <div class="form-group">
                        <input type="hidden" name ="bill_id" value="{{$bill->id}}">
                        <input class="form-control" name="voucher">
                    </div>
                    <button type="submit" class="btn btn-outline-secondary btn-block">Nhập Mã Giảm Giá</button>
                </form>
            </div>
		</div>
		<div class="col-sm-6 col-xs-12">
            <form action="{{route('checkout')}}" method="post">
            {{csrf_field()}}
                <h1 class="title-box-login">
                    Thông Tin Đặt Hàng
                </h1>
                <div class="content-cus-form">
                    <div style="display: block;">	
                        <input type="hidden" name="bill_id" value="{{$bill->id}}">
                        <div class="col_full">
                            <span class="not-null">*</span>
                            <span class="fa fa-user-o" style="    width: 22px;
                            height: 22px;
                            display: inline-block;
                            position: absolute;
                            top: 12px;
                            left: 12px;"></span>
                            <input required="" value="{{$bill->name}}" type="text" name="name" class="form-control" placeholder="Tên"  size="30">
                        </div>
                        <div class="col_full">
                            <span class="not-null">*</span>
                            <span class="fa fa-address-card-o" style="    width: 22px;
                            height: 22px;
                            display: inline-block;
                            position: absolute;
                            top: 12px;
                            left: 12px;"></span>
                            <input required="" type="text" value="{{$bill->address}}" name="address" placeholder="Địa Chỉ" class="text" size="30">
                        </div>
                        <div class="col_full">
                            <span class="not-null">*</span>
                            <span class="fa fa-phone" style="    width: 22px;
                            height: 22px;
                            display: inline-block;
                            position: absolute;
                            top: 12px;
                            left: 12px;"></span>
                            <input type="text" value="{{$bill->phone}}" title="Điện thoại" name="phone"  placeholder="Số điện thoại" class="text" size="30">
                        </div>
                        <div class="col_full">
                            <div class="md-form">
                                <textarea id="ghichu" class="md-textarea form-control" rows="3" placeholder="Ghi Chú" name="desc">{{$bill->desc}}</textarea>
                            </div>
                        </div> 
                    </div>
                    </div>
                    <span>
                        <hr>
                        <div class="row">
                            <div class="col"><b>Tổng Tiền:</b> <?php echo number_format($bill->total_Price).'đ' ?></div>
                        </div>
                        
                        <div class="row">
                            <div class="col"><b>Mã Giảm Giá:</b> <?php echo $bill->voucher->code ??'Không có';
                            echo ' <b>(';
                            echo $bill->voucher->value ?? 0;
                            echo '%)</b>'; ?></div>
                        </div>
                        
                        <div class="row">
                            <div class="col"><b>Thành Tiền:</b><?php echo number_format($bill->price_Checkout).'đ' ?> </div>
                        </div>
                        <hr>
                    </span>
                    <span>
                        <div class="row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-outline-secondary btn-block">Đặt Hàng</button>
                            </div>
                        </div>
                    </span>
                </div>
	        </form>
	</div>
	<br>
</div>

@endsection