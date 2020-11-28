@extends('admin.layout')

@section('title')
Sửa Nhà Cung Cấp
@endsection

@section('content')
<div class="outer-w3-agile col-xl mt-3">
    <h4 class="tittle-w3-agileits mb-4" style="font-family: 'Times New Roman', Times, serif;">Sửa Nhà Cung Cấp</h4>
    <form action="{{route('post-edit-supplier')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$supplier->id}}">
        <div class="form-group">
            <label for="exampleFormControlInput1">Tên Nhà Cung Cấp</label>
            <input type="text" name="name" value="{{$supplier->name}}"class="form-control" id="exampleFormControlInput1" placeholder="" required="">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Email: </label>
            <input type="email" name="email" value="{{$supplier->email}}" class="form-control" id="exampleFormControlInput1" placeholder="" required="">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Số Điện Thoại</label>
            <input type="text" name="phone" value="{{$supplier->phone}}" class="form-control" id="exampleFormControlInput1" placeholder="" required="">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Địa Chỉ</label>
            <textarea class="form-control" name="address" id="ck" rows="3" required="" style="resize: none;">{{$supplier->address}}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" name="" class="form-control btn btn-primary">Sửa Nhà Cung Cấp</button>
        </div>
    </form>
</div>
@endsection