@extends('client.layout')

@section('breadcrumb')
Giới Thiệu
@endsection

@section('title')
Giới Thiệu
@endsection

@section('content')
<section class="w3l-wecome-content-6">

    <div class="ab-content-6-mian py-5">
        <div class="container py-lg-5">
            <div class="welcome-grids row">
                    <div class="col-lg-6 mb-lg-0 mb-5">
                        <h3 class="hny-title">Giới thiệu về Two<span>N </span>Gear</h3>
                        <p class="my-4">Xuất thân từ cửa hàng kinh doanh máy tính được thành lập từ năm 2000, Phong Vũ được biết đến là đơn vị bán lẻ lâu đời và uy tín tại Việt Nam. Twon Gear chuyên kinh doanh các sản phẩm công nghệ thông tin, thiết bị giải trí game, thiết bị văn phòng và thiết bị hi-tech của nhiều nhãn hàng lớn như Dell, Asus, HP, MSI, Lenovo…</p>
                        <p class="mb-4">Sau gần 20 năm phát triển không ngừng, Twon Gear hướng đến mục tiêu không chỉ là nơi kinh doanh máy tính mà còn là nơi khách hàng có thể tìm thấy mọi tiện ích công nghệ hiện đại và dịch vụ chất lượng cao.</p>
                    </div>
                    <div class="col-lg-6 welcome-image">
                        <img src="{!! asset('client-asset/images/bg_about.png')!!}" class="img-fluid" alt="" />
                    </div>	
                </div>	
            
            </div>
        </div>
</section>

<section class="features-4">
	<div class="features4-block py-5">
		<div class="container py-lg-5">
			<h6>Chúng tôi là tốt nhất</h6>
			<h3 class="hny-title text-center">Trãi nghiệm dịch vụ<span> Tốt Nhất</span></h3>
			
			<div class="features4-grids text-center row mt-5">
				<div class="col-lg-3 col-md-6 features4-grid">
					<div class="features4-grid-inn">
						<span class="fa fa-bullhorn icon-fea4" aria-hidden="true"></span>
						<h5><a href="#URL">Tư Vấn 24/7</a></h5>
                    <p>Tư vấn đặt hàng 24/7 qua fanpage và hotline.</p>
                    <br><br>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 features4-grid sec-features4-grid">
                <div class="features4-grid-inn">
                    <span class="fa fa-truck icon-fea4" aria-hidden="true"></span>
                    <h5><a href="#URL">Miễn Phí Vận Chuyển</a></h5>
                    <p>Miễn phí vận chuyển hàng trên toàn quốc.</p>
                    <br><br>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 features4-grid">
                <div class="features4-grid-inn">
                    <span class="fa fa-recycle icon-fea4" aria-hidden="true"></span>
                    <h5><a href="#URL">Chính Sách Đổi Trả</a></h5>
                    <p>Đổi trả miễn phí trong vòng 3 ngày. Hổ trợ chuyển hoàn sản phẩm cho những khách hàng online.</p>
                </div>
                </div>
                <div class="col-lg-3 col-md-6 features4-grid">
                    <div class="features4-grid-inn">
                        <span class="fa fa-money icon-fea4" aria-hidden="true"></span>
                        <h5><a href="#URL">Thanh Toán Dễ Dàng</a></h5>
                        <p>Hổ trợ thanh toán trực tuyến thông qua các ví điện tử MoMo, PayPal,Master Card,Visa,...</p>

                    </div>
                </div>
			</div>
		</div>
	</div>
</section>

<section class="w3l-team-main">
    <div class="team py-5">
        <div class="container py-lg-5">
            <h3 class="hny-title text-center">
                Đội Ngũ<span> Twon Gear</span></h3>
            <div class="row team-row mt-5">
                <div class="col-lg-4 col-sm-6 mb-lg-0 mb-4 team-wrapper position-relative">
                    <a href="#"><img src="{!! asset('client-asset/images/team1.jpg')!!}" class="team_member img-fluid" alt="Team Member"></a>
                    <div class="team_info mt-3 position-absolute">
                        <h3><a href="#" class="team_name">Độ Mixi</a></h3>
                        <span class="team_role">Founder & CEO</span>
                        <ul class="team-social mt-3">
                            <li><a href="#"><span class="fa fa-facebook icon_facebook"></span></a></li>
                            <li><a href="#"><span class="fa fa-twitter icon_twitter"></span></a></li>
                            <li><a href="#"><span class="fa fa-linkedin icon_linkedin"></span></a></li>
                            <li><a href="#"><span class="fa fa-google-plus icon_google-plus"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-lg-0 mb-4 team-wrapper position-relative">
                    <a href="#"><img src="{!! asset('client-asset/images/team2.jpg')!!}" class="team_member img-fluid" alt="Team Member"></a>
                    <div class="team_info mt-3 position-absolute">
                        <h3><a href="#" class="team_name">Jennie</a></h3>
                        <span class="team_role">Designer & Maketing</span>
                        <ul class="team-social mt-3">
                            <li><a href="#"><span class="fa fa-facebook icon_facebook"></span></a></li>
                            <li><a href="#"><span class="fa fa-twitter icon_twitter"></span></a></li>
                            <li><a href="#"><span class="fa fa-linkedin icon_linkedin"></span></a></li>
                            <li><a href="#"><span class="fa fa-google-plus icon_google-plus"></span></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 team-wrapper position-relative">
                    <a href="#"><img src="{!! asset('client-asset/images/team3.jpg')!!}" class="team_member img-fluid" alt="Team Member"></a>
                    <div class="team_info mt-3 position-absolute">
                        <h3><a href="#" class="team_name">Minh Nhật</a></h3>
                        <span class="team_role">Coder & Designer</span>
                        <ul class="team-social mt-3">
                            <li><a href="#"><span class="fa fa-facebook icon_facebook"></span></a></li>
                            <li><a href="#"><span class="fa fa-twitter icon_twitter"></span></a></li>
                            <li><a href="#"><span class="fa fa-linkedin icon_linkedin"></span></a></li>
                            <li><a href="#"><span class="fa fa-google-plus icon_google-plus"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection