@extends('admin.layout')

@section('title')
Thêm Nhà Cung Cấp
@endsection

@section('content')
<div class="outer-w3-agile col-xl mt-3">
    <h4 class="tittle-w3-agileits mb-4" style="font-family: 'Times New Roman', Times, serif;">Thêm Nhà Cung Cấp</h4>
    <form action="{{route('post-add-supplier')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleFormControlInput1">Tên Nhà Cung Cấp</label>
            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="" required="">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Email: </label>
            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="" required="">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Số Điện Thoại</label>
            <input type="text" name="phone" class="form-control" id="exampleFormControlInput1" placeholder="" required="">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Địa Chỉ</label>
            <textarea class="form-control" name="address" id="ck" rows="3" required="" style="resize: none;"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Trạng Thái</label>
            <select class="form-control" id="exampleFormControlSelect1" name="status">
                <option value="1">Kích Hoạt</option>
                <option value="0">Không Kích Hoạt</option>
            </select>
        </div>
        <div class="form-group">
                <button type="submit" name="add_category" class="form-control btn btn-primary">Thêm Nhà Cung Cấp</button>
        </div>
    </form>
</div>
@endsection