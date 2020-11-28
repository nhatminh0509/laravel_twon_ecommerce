@extends('admin.layout')

@section('title')
Sửa Nhân Viên
@endsection

@section('content')
<div class="outer-w3-agile col-xl mt-3">
    <h4 class="tittle-w3-agileits mb-4" style="font-family: 'Times New Roman', Times, serif;">Sửa Thông Tin Nhân Viên</h4>
    <form action="{{route('post-edit-admin')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$admin->id}}">
        <div class="form-group">
            <label for="exampleFormControlInput1" style="width: 75%;">Tên Nhân Viên</label>
            <div class="custom-file">
                <img id="output_image" src="{!! asset('uploads/avatar_admin')!!}/{{$admin->avatar}}?{{rand(1,1000)}}" class="img-thumbnail" style="width: 250px;float: right;"/>
                <input type="text" name="name" value="{{$admin->name}}" class="form-control" id="exampleFormControlInput1" placeholder="" required="" style="width: 75%;">
            </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1" style="width: 75%;">CMND: </label>
            <input type="text" name="cmnd" value="{{$admin->cmnd}}" class="form-control" id="exampleFormControlInput1" placeholder="" required="" style="width: 75%;">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1" style="width: 75%;">Số Điện Thoại</label>
            <input type="text" name="phone" value="{{$admin->phone}}" class="form-control" id="exampleFormControlInput1" placeholder="" required="" style="width: 75%;">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Hình Ảnh</label>
            <div class="custom-file">
                <input type="file" name="avatar" value="{{$admin->avatar}}" class="custom-file-input" id="exampleFormControlInput1" onchange="preview_image(event,'output_image')" style="width: 75%;"/>
                <label class="custom-file-label" for="exampleFormControlInput1" style="width: 75%;">Chọn Ảnh</label>
            </div>
        </div>
        
        <div class="form-group">
                <button type="submit" name="add_admin" class="form-control btn btn-primary" style="width: 75%;">Sửa Nhân Viên</button>
        </div>
    </form>
    
</div>
<script type='text/javascript'>
    function preview_image(event,$id) 
    {
     var reader = new FileReader();
     reader.onload = function()
     {
      var output = document.getElementById($id);
      output.src = reader.result;
     }
     reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection