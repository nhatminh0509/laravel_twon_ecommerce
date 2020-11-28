@extends('admin.layout')

@section('title')
Nhập Hàng
@endsection

@section('content')
<div class="outer-w3-agile col-xl mt-3">
    <h4 class="tittle-w3-agileits mb-4" style="font-family: 'Times New Roman', Times, serif;">Phiếu Nhập Hàng</h4>
    <div class="row">
        <div class="col-sm-6" style="border-right: solid #000;">
            <div class="">
                <label >Nhà Cùng Cấp</label>
                <input type="text" readonly class="form-control" value="{{$bill_import->supplier->name ?? ''}}">                    
            </div>
            <div class="">
                <label >Email Nhà Cung Cấp</label>
                <input type="text" readonly class="form-control" value="{{$bill_import->supplier->email ?? ''}}">                    
            </div>
        </div>
        
        <div class="col-sm-6">
            <div class="">
                <label >Nhân Viên Lập</label>
                <input type="text" readonly class="form-control" value="{{$bill_import->user->name ?? ''}}">                    
            </div>
            <div class="">
                <label >Email Nhân Viên Lập</label>
                <input type="text" readonly class="form-control" value="{{$bill_import->user->email ?? ''}}">                    
            </div>
        </div>
        <div class="col-sm-12">
            <div class="">
                <label >Ngày Nhập</label>
                <input type="text" readonly class="form-control" value="{{$bill_import->created_at}}">                    
            </div>
        </div>
        <div class="col-sm-12">
            <div class="">
                <label >Tổng Tiền</label>
                <input type="text" readonly class="form-control" value="<?php echo number_format($bill_import->total_Price);  ?>">                    
            </div>
        </div>
        <div class="col-sm-6"><a class="btn btn-primary" href="{{route('cancel-depot',$bill_import->id)}}" style="margin-top: 20px;width:100%;">Hủy</a></div>
        <div class="col-sm-6"><a class="btn btn-primary" href="{{route('payment-depot',$bill_import->id)}}" style="margin-top: 20px;width:100%;">Thanh Toán</a></div>
    </div>
</div>

<div class="outer-w3-agile col-xl mt-3">
    <h4 class="tittle-w3-agileits mb-4" style="font-family: 'Times New Roman', Times, serif;">Chi Tiết Phiếu Nhập Hàng</h4>
    <div class="btn btn-outline-secondary" style="margin-bottom:10px;" data-toggle="modal" data-target="#import_product">Nhập Sản Phẩm</div>
    <table class="table table-hover">
        <thead style="background-color:lightgrey;">
            <th></th>
            <th style="width:50%;">Sản Phẩm</th>
            <th>Số lượng</th>
            <th>Giá Nhập</th>
            <th></th>
        </thead>
        <tbody>
            @foreach($bill_import->detail_bill_import ?? '' as $detail_bill)
            <tr>
                <td></td>
                <td>{{$detail_bill->product->name}}</td>
                <td>{{$detail_bill->quantity}}</td>
                <td>{{$detail_bill->price}}</td>
                <td>
               
                <a href="" onclick="return confirm('Bạn có chắc muốn ');" ><label class="fa fa-trash">Xóa</label></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="modal fade" id="import_product" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Nhập Sản Phẩm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('post-detail-bill-import-depot')}}" method="post">
      {{csrf_field()}}
        <div class="modal-body">
            <input type="hidden" name="id_bill_import" value="{{$bill_import->id}}">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Sản Phẩm</label>
                <select class="form-control" id="exampleFormControlSelect1" name="product_id" >
                    @foreach($list_product as $product)
                        <option value="{{$product->id}}">{{$product->name}}</option>  
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1" >Số lượng nhập</label>
                <input type="number" name="quantity" class="form-control" id="exampleFormControlInput1" placeholder="" required="" >
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1" >Giá nhập</label>
                <input type="number" name="price" class="form-control" id="exampleFormControlInput1" placeholder="" required="" >
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            <button type="submit" class="btn btn-primary">Nhập</button>
        </div>
      </from>
    </div>
  </div>
</div>
@endsection
