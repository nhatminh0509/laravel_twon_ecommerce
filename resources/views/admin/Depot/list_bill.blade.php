@extends('admin.layout')

@section('title')
Danh Sách Hóa Đơn Nhập
@endsection

@section('content')
<div class="outer-w3-agile col-xl mt-3">

<div class="container">
  <ul class="nav nav-tabs btn-group " style="margin-bottom: 20px;">
  <li class="nav-item"><a data-toggle="tab" class="nav-link active" href="#dathanhtoan" STYLE="COLOr:green;">Đã Thanh Toán</a></li>
  <li class="nav-item"><a data-toggle="tab"  class="nav-link" href="#chuathanhtoan" STYLE="COLOr:orange;">Chưa Thanh Toán</a></li>
  <li class="nav-item "><a data-toggle="tab" class="nav-link" href="#dahuy" STYLE="COLOr:red;">Đã Hủy</a></li>
  </ul>
  
  <div class="tab-content">
    <div id="dathanhtoan" class="tab-pane active">
      <h3>Đã Thanh Toán</h3>
      <table class="table table-hover">
        <thead style="background-color:lightgrey;">
            <th>#</th>
            
            <th style="width:25%;">Nhân Viên Nhập</th>
           
            <th>Nhà Cung Cấp</th>

            
            <th>Tổng Tiền</th>
            
            <th>Trạng Thái</th>

            <th></th>

        </thead>
        <tbody>
			@foreach($dathanhtoan ?? '' as $bill)
            <tr>
                <td>{{$bill->id}}</td>
                <td>{{$bill->user->name}}</td>
                <td>{{$bill->supplier->name}}</td>
                <td>{{$bill->total_Price}}</td>
                <td>Đã Thanh Toán</td>
                <td><a href="{{route('get-detail-bill-depot',$bill->id)}}"><lable class="fa fa-info-circle"> Xem Chi Tiết</lable></a></td>
            </tr>
			@endforeach
		</tbody>
		 
    </table>
	<center style="margin-bottom:20px;"><span><?php try{ ?>{{ $dathanhtoan->render('paginate') }}<?php } catch(Exception $e) {} ?></span></center>
    </div>
    <div id="chuathanhtoan" class="tab-pane fade">
      <h3>Chưa Thanh Toán</h3>
      <table class="table table-hover">
        <thead style="background-color:lightgrey;">
            <th>#</th>
            
            <th style="width:25%;">Nhân Viên Nhập</th>
           
            <th>Nhà Cung Cấp</th>

            
            <th>Tổng Tiền</th>
            
            <th>Trạng Thái</th>

            <th></th>

        </thead>
        <tbody>
			@foreach($chuathanhtoan ?? '' as $bill)
            <tr>
                <td>{{$bill->id}}</td>
                <td>{{$bill->user->name}}</td>
                <td>{{$bill->supplier->name}}</td>
                <td>{{$bill->total_Price}}</td>
                <td>Chưa Thanh Toán</td>
                <td><a href="{{route('get-detail-bill-depot',$bill->id)}}"><lable class="fa fa-info-circle"> Xem Chi Tiết</lable></a></td>
            </tr>
			@endforeach
		</tbody>
		 
    </table>
	<center style="margin-bottom:20px;"><span><?php try{ ?>{{ $chuathanhtoan->render('paginate') }}<?php } catch(Exception $e) {} ?></span></center>
    </div>
    <div id="dahuy" class="tab-pane fade">
      <h3>Đã Hủy</h3>
      
		<table class="table table-hover">
			<thead style="background-color:lightgrey;">
				<th>#</th>
				
				<th style="width:25%;">Nhân Viên Nhập</th>
			
				<th>Nhà Cung Cấp</th>

				
				<th>Tổng Tiền</th>
				
				<th>Trạng Thái</th>

				<th></th>

			</thead>
			<tbody>
				@foreach($dahuy ?? '' as $bill)
				<tr>
					<td>{{$bill->id}}</td>
					<td>{{$bill->user->name}}</td>
					<td>{{$bill->supplier->name}}</td>
					<td>{{$bill->total_Price}}</td>
					<td>Đã Hủy</td>
					<td><a href="{{route('get-detail-bill-depot',$bill->id)}}"><lable class="fa fa-info-circle"> Xem Chi Tiết</lable></a></td>
				</tr>
				@endforeach
			</tbody>
			
		</table>
		<center style="margin-bottom:20px;"><span><?php try{ ?>{{ $dahuy->render('paginate') }}<?php } catch(Exception $e) {} ?></span></center>
		</div>
  </div>
</div>
</div>

@endsection