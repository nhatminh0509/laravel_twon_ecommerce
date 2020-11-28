@extends('admin.layout')
@section('title')
Sửa Thương Hiệu
@endsection
@section('content')
    <div class="outer-w3-agile col-xl mt-3">
        <h4 class="tittle-w3-agileits mb-4" style="font-family: 'Times New Roman', Times, serif;">Sửa thương hiệu sản phẩm</h4>
        <div class="row">
        <div class="col-9">
        <form action="{{route('post-edit-brand')}}" method="post"enctype="multipart/form-data">
        {{csrf_field()}}
            <div class="form-group">
                <label for="exampleFormControlInput1" >Tên Thương Hiệu</label>
                <div class="custom-file">
                   
                    <input type="text" name="name" value="{{$brand->name}}" class="form-control" id="exampleFormControlInput1" placeholder="" required="" >
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Hình Ảnh</label>
                <div class="custom-file">
                    <input type="file" name="image" value="{{$brand->image}}" class="custom-file-input" id="exampleFormControlInput1" onchange="preview_image(event,'output_image')" />
                    <label class="custom-file-label" for="exampleFormControlInput1" >Chọn Ảnh</label>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1" >Mô Tả</label>
                <textarea class="form-control" name="desc" id="ck" rows="3" required="" style=" resize: none;">{{$brand->desc}}</textarea>
            </div>
            <input type="hidden" name="id" value="{{$brand->id}}"/>
            <input type="hidden" name="status" value="{{$brand->status}}"/>
            <div class="form-group">
                    <button type="submit" class="form-control btn btn-primary" >Sửa Thương Hiệu</button>
            </div>
        </form>
        </div>
        <div class="col-3"> <img id="output_image" src="{!! asset('uploads/brand')!!}/{{$brand->image}}?{{rand(1,1000)}}" class="img-thumbnail" style="width: 250px;float: right;"/></div>
        <div>

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