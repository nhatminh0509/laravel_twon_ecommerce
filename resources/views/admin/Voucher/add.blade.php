@extends('admin.layout')

@section('title')
Thêm Mã Giảm Giá
@endsection

@section('content')
<div class="outer-w3-agile col-xl mt-3">
    <h4 class="tittle-w3-agileits mb-4" style="font-family: 'Times New Roman', Times, serif;">Thêm mã giảm giá</h4>
    <div class="row">
        <div class="col-sm-12">
            <form action="{{route('post-add-voucher')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
                <div class="form-group">
                    <label for="exampleFormControlInput1" >Mã Giảm Giá</label>
                    <input type="text" name="code" class="form-control" id="exampleFormControlInput1" placeholder="" required="" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1" >Giá Trị(%):</label>
                    <input type="number" name="value" class="form-control" id="exampleFormControlInput1" placeholder="" required="" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1" >Số Lượng:</label>
                    <input type="number" name="quantity" class="form-control" id="exampleFormControlInput1" placeholder="" required="" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1" >Ngày Bắt Đầu:</label>
                    <input type="date" name="date_start" class="form-control" id="exampleFormControlInput1" placeholder="" required="" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1" >Ngày Kết Thúc:</label>
                    <input type="date" name="date_end" class="form-control" id="exampleFormControlInput1" placeholder="" required="" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Trạng Thái</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="status" >
                        <option value="1">Kích Hoạt</option>
                        <option value="0">Không Kích Hoạt</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="form-control btn btn-primary">Thêm Mã Giảm Giá</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection