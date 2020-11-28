@extends('admin.layout')

@section('title')
Sửa Sản Phẩm
@endsection

@section('content')
<div class="outer-w3-agile col-xl mt-3">
    <h4 class="tittle-w3-agileits mb-4" style="font-family: 'Times New Roman', Times, serif;">Sửa sản phẩm</h4>
    <div class="row">
        <div class="col-sm-9">
            <form action="{{route('post-edit-voucher')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$voucher->id}}"/>
                <div class="form-group">
                    <label for="exampleFormControlInput1" >Mã Giảm Giá</label>
                    <input type="text" name="code" value="{{$voucher->code}}" readonly class="form-control" id="exampleFormControlInput1" placeholder="" required="" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1" >Giá Trị(%):</label>
                    <input type="number" name="value" value="{{$voucher->value}}" class="form-control" id="exampleFormControlInput1" placeholder="" required="" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1" >Số lượng:</label>
                    <input type="number" name="quantity" value="{{$voucher->quantity}}" class="form-control" id="exampleFormControlInput1" placeholder="" required="" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1" >Ngày Bắt Đầu:</label>
                    <input type="date" name="date_start" class="form-control" value="{{$voucher->date_start}}" id="exampleFormControlInput1" placeholder="" required="" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1" >Ngày Kết Thúc:</label>
                    <input type="date" name="date_end" class="form-control" value="{{$voucher->date_end}}" id="exampleFormControlInput1" placeholder="" required="" >
                </div>
                <div class="form-group">
                    <button type="submit" class="form-control btn btn-primary">Sửa Mã Giảm Giá</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection