@extends('admin.layout')

@section('title')
Thêm Sản Phẩm
@endsection

@section('content')
<div class="outer-w3-agile col-xl mt-3">
    <h4 class="tittle-w3-agileits mb-4" style="font-family: 'Times New Roman', Times, serif;">Thêm sản phẩm</h4>
    <div class="row">
        <div class="col-sm-9">
            <form action="{{route('post-add-product')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
                <div class="form-group">
                    <label for="exampleFormControlInput1" >Tên Sản Phẩm</label>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="" required="" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Hình Ảnh 1</label>
                    <div class="custom-file">
                        <input type="file" name="image_1" class="custom-file-input" id="exampleFormControlInput1" onchange="preview_image(event,'output_image1')" />
                        <label class="custom-file-label" for="exampleFormControlInput1" >Chọn Ảnh</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Hình Ảnh 2</label>
                    <div class="custom-file">
                        <input type="file" name="image_2" class="custom-file-input" id="exampleFormControlInput1" onchange="preview_image(event,'output_image2')" />
                        <label class="custom-file-label" for="exampleFormControlInput1" >Chọn Ảnh</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1" >Giá</label>
                    <input type="number" name="out_price" class="form-control" id="exampleFormControlInput1" placeholder="" required="" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1" >Mô Tả</label>
                    <textarea class="form-control" name="desc" id="ck" rows="3" required="" style="resize: none;"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Danh Mục</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="category_id" >
                        @foreach($list_category as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>  
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Thương Hiệu</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="brand_id" >
                        @foreach($list_brand as $brand)
                            <option value="{{$brand->id}}">{{$brand->name}}</option>  
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Trạng Thái</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="status" >
                        <option value="1">Kích Hoạt</option>
                        <option value="0">Không Kích Hoạt</option>
                    </select>
                </div>
                <div class="form-group">
                        <button type="submit" class="form-control btn btn-primary">Thêm Sản Phẩm</button>
                </div>
            </form>
        </div>
        <div class="col-sm-3">
            <label for="output_image1" >Hình 1</label>
            <img id="output_image1" src="{!! asset('admin-asset/images/2Nlogo.jpg')!!}" class="img-thumbnail" style="width: 250px;"/>
            <label for="output_image2" >Hình 2</label>
            <img id="output_image2" src="{!! asset('admin-asset/images/2Nlogo.jpg')!!}" class="img-thumbnail" style="width: 250px;"/>
        </div>
    </div>
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