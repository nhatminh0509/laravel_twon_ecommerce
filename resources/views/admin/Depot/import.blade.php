@extends('admin.layout')

@section('title')
Nhập Hàng
@endsection

@section('content')
<div class="outer-w3-agile col-xl mt-3">
    <h4 class="tittle-w3-agileits mb-4" style="font-family: 'Times New Roman', Times, serif;">Tạo Phiếu Nhập Hàng</h4>
    <div class="row">
        <div class="col-sm-12">
            <form action="{{route('post-bill-import-depot')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
                <input type="hidden" name="user_id" class="form-control" value="{{Auth::user()->id}}">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Nhà Cùng Câp</label>
                    <select class="form-control" id="supplier_id" onchange="change();" name="supplier_id" >
                        @foreach($list_supplier ?? '' as $supplier)
                        <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1" >Email Nhà Cung Cấp</label>
                    <div  id="name" >
                        <input type="text" readonly class="form-control" value="{{$list_supplier[0]->email}}">
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="form-control btn btn-primary">Lập Phiếu Nhập Hàng</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script type='text/javascript'>
    function change() {
        var giatri = document.getElementById("supplier_id").value;
        @foreach($list_supplier ?? '' as $supplier)
        if(giatri == {{$supplier->id}}) {
            document.getElementById("name").innerHTML = '<input type="text" readonly class="form-control" value="{{$supplier->email}}">';
        }
        @endforeach
    } 
</script>
@endsection