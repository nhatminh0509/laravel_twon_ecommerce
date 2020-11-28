@extends('admin.layout')

@section('title')
Chi Tiết Nhà Cung Cấp
@endsection

@section('content')
<div class="outer-w3-agile col-xl mt-3">
    <h4 class="tittle-w3-agileits mb-4" style="font-family: 'Times New Roman', Times, serif;">Chi Tiết Nhà Cung Cấp</h4>
    <hr>
    
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
            <b>ID:</b>
        </div>
        <div class="col-sm-7">
            <p>{{$supplier->id}}</p>
        </div>
        <br><br>
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
            <b>Tên Nhà Cung Cấp:</b>
        </div>
        <div class="col-sm-7">
            <p>{{$supplier->name}}</p>
        </div>
        <br><br>
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
            <b>Email:</b>
        </div>
        <div class="col-sm-7">
            <p>{{$supplier->email}}</p>
        </div>
        <br><br>
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
            <b>Số Điện Thoại:</b>
        </div>
        <div class="col-sm-7">
            <p>{{$supplier->phone}}</p>
        </div>
        <br><br>
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
            <b>Địa Chỉ:</b>
        </div>
        <div class="col-sm-7">
            <p><?php echo $supplier->address; ?></p>
        </div>
        <br><br>
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
            <b>Trạng Thái:</b>
        </div>
        <div class="col-sm-7">
            <?php
            if($supplier->status == 0)
            {
                echo '<p>Không Kích Hoạt</p>';
            }
            else
            {
                echo '<p>Kích Hoạt</p>';
            }
            ?>
        </div>  
    </div>
   
    <br>
    <center>
    <div class="btn-group">
        <a href="{{route('get-list-supplier')}}" class="btn btn-outline-danger" style="width:250px;">Quay Lại</a>
        <a href="{{route('get-edit-supplier',$supplier->id)" class="btn btn-primary" style="width:250px;">Sửa</a>
    </div>
    </center>
    
</div>
@endsection