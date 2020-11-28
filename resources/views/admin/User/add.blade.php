@extends('admin.layout')

@section('title')
Thêm Nhân Viên
@endsection

@section('content')
<div class="outer-w3-agile col-xl mt-3">
    <h4 class="tittle-w3-agileits mb-4" style="font-family: 'Times New Roman', Times, serif;">Thêm Nhân Viên</h4>
    <form action="{{route('post-add-admin')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleFormControlInput1" style="width: 75%;">Tên Nhân Viên</label>
            <div class="custom-file">
                <img id="output_image" src="{!! asset('admin-asset/images/2Nlogo.jpg')!!}" class="img-thumbnail" style="width: 250px;float: right;"/>
                <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="" required="" style="width: 75%;">
            </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1" style="width: 75%;">CMND: </label>
            <input type="text" name="cmnd" class="form-control" id="exampleFormControlInput1" placeholder="" required="" style="width: 75%;">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1" style="width: 75%;">Email Nhân Viên</label>
            <input type="text" name="email" class="form-control" id="exampleFormControlInput1" placeholder="" required="" style="width: 75%;">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1" style="width: 75%;">Mật Khẩu</label>
            <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="" required="" style="width: 75%;">
        </div>

        <input type="hidden" name="status" value="1">
        <div class="form-group">
            <label for="exampleFormControlInput1" style="width: 75%;">Số Điện Thoại</label>
            <input type="text" name="phone" class="form-control" id="exampleFormControlInput1" placeholder="" required="" style="width: 75%;">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Hình Ảnh</label>
            <div class="custom-file">
                <input type="file" name="avatar" class="custom-file-input" id="exampleFormControlInput1" onchange="preview_image(event,'output_image')" style="width: 75%;"/>
                <label class="custom-file-label" for="exampleFormControlInput1" style="width: 75%;">Chọn Ảnh</label>
            </div>
        </div>
        
        <div class="form-group">
                <button type="submit" name="add_admin" class="form-control btn btn-primary" style="width: 75%;">Thêm Nhân Viên</button>
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