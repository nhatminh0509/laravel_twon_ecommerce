@extends('client.layout')

@section('breadcrumb')
Sản Phẩm
@endsection

@section('title')
Chi Tiết Sản Phẩm
@endsection
@section('content')
<style type="text/css">
    #gia
    {
    color: #3a3535;
        font-size: 20px;
        /* font-weight: bold; */
        font-family: 'Lato', sans-serif;
    }
    #kichco
    {
    color: #3a3535;
        font-size: 20px;
        font-weight: bold;
        font-family: 'Lato', sans-serif;
    }
    body {  
    font-family:Arial, Helvetica, sans-serif;   
    overflow-x: hidden;
    }
    
    img {   
    max-width: 100%;
    }
    
    .preview {  
    display: -webkit-box;   
    display: -webkit-flex;  
    display: -ms-flexbox;   
    display: flex;  
    -webkit-box-orient: vertical;   
    -webkit-box-direction: normal;  
    -webkit-flex-direction: column; 
    -ms-flex-direction: column; 
    flex-direction: column;
    } 
    
    @media screen and (max-width: 996px) { 
    .preview { 
    margin-bottom: 20px;
    }
    }
    
    .preview-pic {  
    -webkit-box-flex: 1;    
    -webkit-flex-grow: 1;   
    -ms-flex-positive: 1;   
    flex-grow: 1;
    }
    
    .preview-thumbnail.nav-tabs {   
    border: none;   
    margin-top: 15px;
    }
    
    .preview-thumbnail.nav-tabs li {    
    width: 18%; 
    margin-right: 2.5%;
    }
    
    .preview-thumbnail.nav-tabs li img {    
    max-width: 100%;    
    display: block;
    }
    
    .preview-thumbnail.nav-tabs li a {  
    padding: 0; 
    margin: 0;  
    cursor:pointer;
    }
    
    .preview-thumbnail.nav-tabs li:last-of-type {   
    margin-right: 0;
    }
    
    .tab-content {  
    overflow: hidden;
    }
    
    .tab-content img {  
    width: 100%;    
    -webkit-animation-name: opacity;    
    animation-name: opacity; 
    -webkit-animation-duration: .3s; 
    animation-duration: .3s;
    }
    
    .card { 
    margin-top: 0px;    
    background: white;   
    /* padding: 3em;      */
    line-height: 1.5em;
    } 
    
    @media screen and (min-width: 997px) { 
    .wrapper { 
    display: -webkit-box; 
    display: -webkit-flex; 
    display: -ms-flexbox; 
    display: flex;
    }
    }
    
    .details {  
    display: -webkit-box;
        display: -webkit-flex;  
    display: -ms-flexbox;   
    display: flex;  
    -webkit-box-orient: vertical;   
    -webkit-box-direction: normal;  
    -webkit-flex-direction: column; 
    -ms-flex-direction: column; 
    flex-direction: column;
    }
    
    .colors {   
    -webkit-box-flex: 1;    
    -webkit-flex-grow: 1;   
    -ms-flex-positive: 1;   
    flex-grow: 1;
    }
    
    .product-title, .price, .sizes, .colors {   
    text-transform: UPPERCASE;  
    font-weight: bold;
    }
    
    .checked, .price span { 
    color: #ff9f1a;
    }
    
    .product-title, .rating, .product-description, .price, .vote, .sizes {  
    margin-bottom: 15px;
    }
    
    .product-title {    
    margin-top: 0;
    }
    
    .size {
        margin-right: 10px;
    }
    
    .size:first-of-type {   
    margin-left: 40px;
    }
    
    .color {    
    display: inline-block;  
    vertical-align: middle; 
    margin-right: 10px; 
    height: 2em;    
    width: 2em; 
    border-radius: 2px;
    }
    
    .color:first-of-type {  
    margin-left: 20px;
    }
    
    .add-to-cart, .like {   
    background: #ff9f1a;    
    padding: 1.2em 1.5em;   
    border: none;   
    text-transform: UPPERCASE;  
    font-weight: bold;  
    color: #fff;    
    text-decoration:none; 
    -webkit-transition: background .3s ease; 
    transition: background .3s ease;
    }
    
    .add-to-cart:hover, .like:hover {   
    background: #b36800;    
    color: #fff;    
    text-decoration:none;
    }
    
    .not-available {    
    text-align: center; 
    line-height: 2em;
    }
    
    .not-available:before { 
    font-family: fontawesome;   
    content: "\f00d";   
    color: #fff;
    }
    
    .orange {   
    background: #ff9f1a;
    }
    
    .green {    
    background: #85ad00;
    }
    
    .blue { 
    background: #0076ad;
    }
    
    .tooltip-inner {    
    padding: 1.3em;
    } 
    
    @-webkit-keyframes opacity { 
    0% { opacity: 0; -webkit-transform: scale(3); transform: scale(3);} 
    100% { opacity: 1; -webkit-transform: scale(1); transform: scale(1);}
    } 
    
    @keyframes opacity { 
    0% { opacity: 0; -webkit-transform: scale(3); transform: scale(3);} 
    100% { opacity: 1; -webkit-transform: scale(1); transform: scale(1);}
    }
</style>
<div class="container"> 
    <div class="card"> 
    <div class="container-fliud"> 
        <div class="wrapper row"> 
            <div class="preview col-md-6"> 
                <div class="preview-pic tab-content"> 
                <div class="tab-pane active" id="pic-1" ><img src="{{asset('uploads/product')}}/{{$product->image_1}}?{{Rand(1,1000)}}" alt=""></div> 
                <div class="tab-pane" id="pic-2"><img src="{{asset('uploads/product')}}/{{$product->image_2}}?{{Rand(1,1000)}}"></div> 
            </div> 
            <ul class="preview-thumbnail nav nav-tabs" >
                <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="{{asset('uploads/product')}}/{{$product->image_1}}?{{Rand(1,1000)}}" style="border: 1px solid;"></a></li> 
                <li><a data-target="#pic-2" data-toggle="tab"><img src="{{asset('uploads/product')}}/{{$product->image_2}}?{{Rand(1,1000)}}" style="border: 1px solid;"></a></li> 
            </ul> 
        </div> 
        <div class="details col-md-6">
            <br><br><br><br> 
            <h3 class="product-title">{{$product->name}}</h3> 
        
            <p class="product-description">Chi tiết sản phẩm: <?php echo $product->desc;   ?> </p> 
            <h4 class="price" id="gia">Giá bán: {{$product->out_price}} <!--<del style="color: #6b778d;font-weight: 400;margin-right: 6px;">490.000₫</del> --> </h4>
            <div class="transmitv single-item">
                <form action="#" method="GET">
                    <!-- <label id="sale">Sale</label> -->
                    <input type="hidden" name="cmd" value="_cart">
                    <input type="hidden" name="add" value="1">
                    <input type="hidden" name="transmitv_item" value="{{$product->name}}">
                    <input type="hidden" name="amount" value="{{$product->out_price}}">
                    <!-- <input type="hidden" name="discount" value="99000"> -->
                    <input type="hidden" name="href" value="{{route('get-client-productDetail',$product->id)}}">
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <button type="submit" class="transmitv-cart ptransmitv-cart add-to-cart">Thêm vào giỏ hàng</button>
                </form>
            </div>
        </div> 
    </div> 
</div>
</div>
</div>
<br/>
@endsection