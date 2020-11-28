@extends('admin.layout')
@section('content')
<div class="outer-w3-agile col-xl mt-3">
    <h4 class="tittle-w3-agileits mb-4" style="font-family: 'Times New Roman', Times, serif;">Chi Tiết Sản Phẩm</h4>
    <hr>
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
            <b>ID:</b>
        </div>
        <div class="col-sm-7">
            <p>{{$voucher->id}}</p>
        </div>
        <br><br>
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
            <b>Mã Giảm Giá:</b>
        </div>
        <div class="col-sm-7">
            <p>{{$voucher->code}}</p>
        </div>
        <br><br>
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
            <b>Giá Trị:</b>
        </div>
        <div class="col-sm-7">
            <p>{{$voucher->value}}%</p>
        </div>
        <br><br>
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
            <b>Số lượng:</b>
        </div>
        <div class="col-sm-7">
            <p>{{$voucher->quantity}}</p>
        </div>
        <br><br>
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
            <b>Ngày Bắt Đầu:</b>
        </div>
        <div class="col-sm-7">
            <p>{{$voucher->date_start}}</p>
        </div>
        <br><br>
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
            <b>Ngày Kết Thúc:</b>
        </div>
        <div class="col-sm-7">
            <p>{{$voucher->date_end}}</p>
        </div>
        <br><br>
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
            <b>Trạng Thái:</b>
        </div>
        <div class="col-sm-7">
            <p>
            <?php
            if($voucher->status == 0)
            {
                echo 'Không Kích Hoạt';
            }
            else
            {
                echo 'Kích Hoạt';
            }
            ?>
            </p>    
        </div>  
    </div>
    <br>
    <center>
    <div class="btn-group">
        <a href="{{route('get-list-voucher')}}" class="btn btn-outline-danger" style="width:250px;">Quay Lại</a>
        <a href="{{route('get-edit-voucher',$voucher->id)}}" class="btn btn-primary" style="width:250px;">Sửa</a>
    </div>
    </center>
    
</div>
@endsection

@section('title')
Chi Tiết Mã Giảm Giá
@endsection

