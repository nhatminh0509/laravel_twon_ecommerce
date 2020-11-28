@extends('admin.layout')

@section('title')
Chi Tiết Danh Mục Sản Phẩm
@endsection

@section('content')
<div class="outer-w3-agile col-xl mt-3">
    <h4 class="tittle-w3-agileits mb-4" style="font-family: 'Times New Roman', Times, serif;">Chi Tiết Danh Mục</h4>
    <hr>
    
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
            <b>ID:</b>
        </div>
        <div class="col-sm-7">
            <p>{{$category->id}}</p>
        </div>
        <br><br>
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
            <b>Tên Danh Mục:</b>
        </div>
        <div class="col-sm-7">
            <p>{{$category->name}}</p>
        </div>
        <br><br>
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
            <b>Hình Ảnh:</b>
        </div>
        <div class="col-sm-7" style="padding-bottom:10px;">
            <img src="{!! asset('uploads/category') !!}/{{$category->image}}?{{rand(1,1000)}}" style="max-width:250px;" class="img-thumbnail"/>
        </div>
        <br><br>
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
            <b>Mô Tả:</b>
        </div>
        <div class="col-sm-7">
            <p><?php echo $category->desc;  ?></p>
        </div>
        <br><br>
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
            <b>Trạng Thái:</b>
        </div>
        <div class="col-sm-7">
            <?php
            if($category->status == 0)
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
        <a href="{{route('get-list-category')}}" class="btn btn-outline-danger" style="width:250px;">Quay Lại</a>
        <a href="{{URL::to('/admin/category/edit')}}/{{$category->id}}" class="btn btn-primary" style="width:250px;">Sửa</a>
    </div>
    </center>
    
</div>
@endsection