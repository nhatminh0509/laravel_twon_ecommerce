@extends('admin.layout')
@section('content')
<div class="outer-w3-agile col-xl mt-3">
    <h4 class="tittle-w3-agileits mb-4" style="font-family: 'Times New Roman', Times, serif;">Chi Tiết Sản Phẩm</h4>
    <hr>
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
            <b>ID:</b>
        </div>
        <div class="col-sm-7">
            <p>{{$product->id}}</p>
        </div>
        <br><br>
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
            <b>Hình Ảnh:</b>
        </div>
        <div class="col-sm-7" style="padding-bottom:10px;">
            <img src="{!! asset('uploads/product') !!}/{{$product->image_1}}" style="max-width:250px;" class="img-thumbnail"/>
            <img src="{!! asset('uploads/product') !!}/{{$product->image_2}}" style="max-width:250px;" class="img-thumbnail"/>
        </div>
        <br><br>
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
            <b>Giá Bán:</b>
        </div>
        <div class="col-sm-7">
            <p><?php echo number_format($product->out_price); ?></p>
        </div>
        <br><br>
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
            <b>Giá Nhập:</b>
        </div>
        <div class="col-sm-7">
            <p><?php echo number_format($product->in_price); ?></p>
        </div>
        <br><br>
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
            <b>Số lượng tồn:</b>
        </div>
        <div class="col-sm-7">
            <p>{{$product->quantity}}</p>
        </div>
        <br><br>
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
            <b>Mô Tả:</b>
        </div>
        <div class="col-sm-7">
            <p><?php echo $product->desc;  ?></p>
        </div>
        <br><br>
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
            <b>Danh Mục:</b>
        </div>
        <div class="col-sm-7">
            <?php
            foreach($all_category as $category)
            {
                if($product->category_id == $category->id)
                {
                    echo $category->name;
                    break;
                }
            }
            ?>
        </div>
        <br><br>
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
            <b>Thương Hiệu:</b>
        </div>
        <div class="col-sm-7">
            <?php
            foreach($all_brand as $brand)
            {
                if($product->brand_id == $brand->id)
                {
                    echo $brand->name;
                    break;
                }
            }
            ?>
        </div>
        <br><br>
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
            <b>Trạng Thái:</b>
        </div>
        <div class="col-sm-7">
            <p>
            <?php
            if($product->status == 0)
            {
                echo '<p>Không Kích Hoạt</p>';
            }
            else
            {
                echo '<p>Kích Hoạt</p>';
            }
            ?>
            </p>    
        </div>  
    </div>
    <br>
    <center>
    <div class="btn-group">
        <a href="{{route('get-list-product')}}" class="btn btn-outline-danger" style="width:250px;">Quay Lại</a>
        <a href="{{route('get-edit-product',$product->id)}}" class="btn btn-primary" style="width:250px;">Sửa</a>
    </div>
    </center>
    
</div>
@endsection

@section('title')
Chi Tiết Sản Phẩm
@endsection

