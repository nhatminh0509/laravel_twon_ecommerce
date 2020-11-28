@extends('client.layout')

@section('breadcrumb')
Tài Khoản
@endsection

@section('title')
Tài Khoản
@endsection
@section('content')
<style>
        .alert {
        padding: 15px;
        background-color: #4CAF50;
        color: white;
        }

        .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
        }

        .closebtn:hover {
        color: black;
        }
		#danger{
			background-color: red;
		}
    </style>
<section id="new-login" class="min600 pdbt50 ">
	<div class="fv-login">
		<div class="container">
			<div class="box-login-two">
				<div class="row">
					<div class="col-sm-6 col-xs-12">
						<h1 class="title-box-login">
							Đăng nhập
						</h1>
						<div class="content-cus-form cus-login">
							<div id="login" style="display: block;">
								<form accept-charset="utf-8" action="{{route('post-client-login')}}" id="customer_login" method="post">
									{{csrf_field()}}
								<div class="col_full">
									<span class="not-null">*</span>
									<span class="icon_checkout ico-email"></span>
									<input required="" type="email" title="email" name="email" id="email" placeholder="Email của bạn" value="" class="form-control">
								</div>

								<div class="col_full">
									<span class="not-null">*</span>
									<span class="icon_checkout ico-pass"></span>
									<input required="" type="password" title="Mật khẩu" name="password" id="pass" placeholder="Nhập mật khẩu" value="" class="form-control">
								</div>

								<div class="col_full nobottommargin action">
									<button class="button button-3d button-black nomargin" id="login-form-submit" type="submit" value="login">Đăng nhập</button>
									<center><a href="#" onclick="showRecoverPasswordForm();return false;" class="">Quên mật khẩu?</a></center>
								</div>

								<!--</form>-->
								<input name="returnUrl" type="hidden" value="/account"></form>
							</div>
							<div id="recover-password" style="display: none;" class="userbox">
								<div class="acctitle"><i class="fa fa-refresh"></i>Quên mật khẩu</div>
								<div class="">
									<form accept-charset="utf-8" action="/account/recover" id="recover_customer_password" method="post">
										<input name="FormType" type="hidden" value="recover_customer_password">
										<input name="utf8" type="hidden" value="true">
									     
									<div class="col_full">
										<span class="not-null">*</span>
										<span class="icon_checkout ico-email"></span>
										<input required="" type="text" title="email" name="email" placeholder="Nhập email của bạn" id="recover-email" value="" class="form-control">
									</div>

									<div class="col_full nobottommargin text-center">
										<button class="button button-3d button-black nomargin" type="submit">Gửi</button>
										<button class="button button-3d button-red nomargin cancel" onclick="hideRecoverPasswordForm(); return false;" name="">Hủy</button>
									</div>
									<input name="returnUrl" type="hidden" value="/account"></form>
								</div>   
							</div>
							<br>
							<?php
								$message = Session::get('message');
								if($message)
								{
									echo '<div class="alert">
									<span id ="close"class="closebtn" onclick="this.parentElement.style.display='."'none'".';">&times;</span>'.$message.'</div>';
									Session::put('message',null);
								}
							?>
							<?php
								if(isset($status))
								{
									echo '<div class="alert alert-danger" id="danger">
									<span id ="close"class="closebtn" onclick="this.parentElement.style.display='."'none'".';">&times;</span>'.$status.'</div>';
								}
							?>
						</div>
					</div>
					<div class="col-sm-6 col-xs-12">
						<h1 class="title-box-login">
							Đăng ký thành viên mới
						</h1>
						<div class="content-cus-form cus-reg">
							<form accept-charset="utf-8" action="{{route('post-add-customer')}}" method="post">
							{{csrf_field()}}
             				<div class="col_full">
								<span class="not-null">*</span>
								<span class="icon_checkout ico-name"></span>
								<input required="" type="text" name="name" title="Tên" class="input-text " placeholder="Tên" id="firstname" size="30">
							</div>
							

							<div class="col_full">
								<span class="not-null">*</span>
								<span class="icon_checkout ico-email"></span>
								<input required="" type="email" value="" title="Email" name="email" id="email" placeholder="Email" class="text" size="30">
							</div>
							
							<div class="col_full">
								<span class="not-null">*</span>
								<span class="icon_checkout ico-phone"></span>
								<input required="" type="text" value="" title="Điện thoại" name="phone" id="phone" placeholder="Số điện thoại" class="text" size="30">
              				</div>
              
							<div class="col_full">
								<span class="not-null">*</span>
								<span class="fa fa-address-card-o" style="width: 22px;height: 22px;display: inline-block;position: absolute;top: 12px;left: 12px;"></span>
								<input required="" type="text" value="" title="Địa Chỉ" name="address" placeholder="Địa Chỉ" class="text" size="30">
							</div>

							<div class="col_full">
								<span class="not-null">*</span>
								<span class="icon_checkout ico-pass"></span>
								<input required="" type="password" value="" name="password" id="pass_reg" placeholder="Mật khẩu" class="password text" size="30" aria-autocomplete="list">
							</div>
							<div class="col_full nobottommargin action">
								<button class="button button-3d button-black nomargin" id="register-form-submit" name="register-form-submit" type="submit">Đăng ký</button>
							</div>
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script>//Hàm 2 giây đóng
	setTimeout(function() {
		var btn = document.getElementById('close');
		btn.click();
}, 2000);
</script>
<script>
	function showRecoverPasswordForm() {
		document.getElementById('recover-password').style.display = 'block';
		document.getElementById('login').style.display='none';
	}

	function hideRecoverPasswordForm() {
		document.getElementById('recover-password').style.display = 'none';
		document.getElementById('login').style.display = 'block';
	}
</script>
@endsection