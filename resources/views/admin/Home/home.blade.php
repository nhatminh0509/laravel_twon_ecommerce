@extends('admin.layout')

@section('title')
Tổng Quan
@endsection

@section('content')

<div class="container-fluid">
                <div class="row"style="font-family: 'Times New Roman', Times, serif;">
                   
                    <div class="outer-w3-agile col-xl" >
                        <div class="stat-grid p-3 d-flex align-items-center justify-content-between" style="background:deepskyblue;">
                            <div class="s-l">
                                <h5>Nhân Viên</h5>
                                
                            </div>
                            <div class="s-r">
                                <h6>{{$count['admin'] ??''}}
                                    <i class="fa fa-users"></i>
                                </h6>
                            </div>
                        </div>
                        <div class="stat-grid p-3 mt-3 d-flex align-items-center justify-content-between" style="background:dodgerblue;">
                            <div class="s-l">
                                <h5>Khách Hàng</h5>
                                
                            </div>
                            <div class="s-r">
                                <h6>{{$count['customer']??''}}
                                    <i class="fa fa-users"></i>
                                </h6>
                            </div>
                        </div>

                        <div class="stat-grid p-3 mt-3 d-flex align-items-center justify-content-between"style="background:deepskyblue;">
                            <div class="s-l">
                                <h5>Nhà Cung Cấp</h5>
                                
                            </div>
                            <div class="s-r">
                                <h6>{{$count['supplier']??''}}
                                    <i class="fas fa-users"></i>
                                </h6>
                            </div>
                        </div>
                        <div class="stat-grid p-3 mt-3 d-flex align-items-center justify-content-between"style="background:dodgerblue;">
                            <div class="s-l">
                                <h5>Danh Mục Sản Phẩm</h5>
                                
                            </div>
                            <div class="s-r">
                                <h6>{{$count['category']??''}}
                                    <i class="far fa-list-alt"></i>
                                </h6>
                            </div>
                        </div>
                        <div class="stat-grid p-3 mt-3 d-flex align-items-center justify-content-between"style="background:deepskyblue;">
                            <div class="s-l">
                                <h5>Thương Hiệu</h5>
                               
                            </div>
                            <div class="s-r">
                                <h6>{{$count['brand']??''}}
                                    <i class="far fa-list-alt"></i>
                                </h6>
                            </div>
                        </div>
                        <div class="stat-grid p-3 mt-3 d-flex align-items-center justify-content-between"style="background:dodgerblue;">
                            <div class="s-l">
                                <h5>Sản Phẩm</h5>
                                
                            </div>
                            <div class="s-r">
                                <h6>{{$count['product']??''}}
                                    <i class="fas fa-list-alt"></i>
                                </h6>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

@endsection