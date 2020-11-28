@extends('admin.layout')

@section('title')
Chi Tiết Hóa Đơn Nhập
@endsection

@section('content')
<div class="outer-w3-agile col-xl mt-3">
    <h4 class="tittle-w3-agileits mb-4" style="font-family: 'Times New Roman', Times, serif;">Phiếu Nhập Hàng</h4>
    <div class="row">
        <div class="col-sm-6" style="border-right: solid #000;">
            <div class="">
                <label >Nhà Cùng Cấp</label>
                <input type="text" readonly class="form-control" value="{{$bill_import->supplier->name ?? ''}}">                    
            </div>
            <div class="">
                <label >Email Nhà Cung Cấp</label>
                <input type="text" readonly class="form-control" value="{{$bill_import->supplier->email ?? ''}}">                    
            </div>
        </div>
        
        <div class="col-sm-6">
            <div class="">
                <label >Nhân Viên Lập</label>
                <input type="text" readonly class="form-control" value="{{$bill_import->user->name ?? ''}}">                    
            </div>
            <div class="">
                <label >Email Nhân Viên Lập</label>
                <input type="text" readonly class="form-control" value="{{$bill_import->user->email ?? ''}}">                    
            </div>
        </div>
        <div class="col-sm-12">
            <div class="">
                <label >Ngày Nhập</label>
                <input type="text" readonly class="form-control" value="{{$bill_import->created_at}}">                    
            </div>
        </div>
        <div class="col-sm-12">
            <div class="">
                <label >Tổng Tiền</label>
                <input type="text" readonly class="form-control" value="<?php echo number_format($bill_import->total_Price);  ?>">                    
            </div>
        </div>
    </div>
</div>

<div class="outer-w3-agile col-xl mt-3">

<h4 class="tittle-w3-agileits mb-4" style="font-family: 'Times New Roman', Times, serif;">Chi Tiết Phiếu Nhập Hàng</h4>
    <table class="table table-hover">
        <thead style="background-color:lightgrey;">
            <th></th>
            <th style="width:50%;">Sản Phẩm</th>
            <th>Số lượng</th>
            <th>Giá Nhập</th>
        </thead>
        <tbody>
            @foreach($bill_import->detail_bill_import ?? '' as $detail_bill)
            <tr>
                <td></td>
                <td>{{$detail_bill->product->name}}</td>
                <td>{{$detail_bill->quantity}}</td>
                <td>{{$detail_bill->price}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a class="btn btn-secondary btn-block"  href="{{route('get-list-bill-depot')}}">Trở về</a>
</div>

@endsection
