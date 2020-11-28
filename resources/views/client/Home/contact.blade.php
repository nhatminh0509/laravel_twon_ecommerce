@extends('client.layout')

@section('breadcrumb')
Liên Hệ
@endsection

@section('title')
Liên Hệ
@endsection
@section('content')
<section class="w3l-contacts-8">
    <div class="contacts-9 section-gap py-5">
      <div class="container py-lg-5">
        <div class="row top-map">
          <div class="col-lg-6 partners">
            <div class="cont-details">
              <h3 class="hny-title mb-0">Liên <span>Lạc</span></h5>
              <p class="mb-5">Chất lượng dịch vụ hàng đầu cùng TwoN Gear.</p>
              <p class="margin-top"><span class="texthny">Gọi cho chúng tôi : </span> <a href="tel:+84704917152">+84704917152</a></p>
              <p> <span class="texthny">Email : </span> <a href="mailto:leminhnhat1133@gmail.com">
                  leminhnhat1133@gmail.com</a></p>
              <p class="margin-top">Hệ thống cửa hàng:</p>
              <li style="color: grey;"> Chi Nhánh Hồ Chí Minh:</li>
						  <li style="color: grey; margin-left: 15px;font-size: 12px;">  730/39 Huỳnh Tấn Phát, Quận 7, TPHCM</li>
						  <li style="color: grey; margin-left: 15px;font-size: 12px;">  26 Lý Tự Trọng, Phường Bến Nghé, Quận 1, TPHCM</li>
						  <li style="color: grey; margin-left: 15px;font-size: 12px;">  7 Huỳnh Khương Ninh, Phường Đakao, Quận 1, TP. Hồ Chí Minh</li>
						  <li style="color: grey;">Chi Nhánh Hà Nội:</li>
						  <li style="color: grey; margin-left: 15px;font-size: 12px;"> 49-51 Hồ Đắc Di, Nam Đồng, Đống Đa, Hà Nội.</li>
						  <li style="color: grey; margin-left: 15px;font-size: 12px;"> Tầng 7 Vincom Bà Triệu, Hai Bà Trưng, Hà Nội</li>
						
            </div>
            <div class="hours">
              <h3 class="hny-title">Giờ <span>Làm Việc</span></h5>
              <p>T2 : 8:00 - 20:00</p>
              <p>T3 : 8:00 - 20:00</p>
              <p>T4 : 8:00 - 20:00</p>
              <p>T5 : 8:00 - 20:00</p>
              <p>T6 : 8:00 - 20:00</p>
              <p>T7 : 7:00 - 22:00</p>
              <p>CN : 7:00 - 22:00</p>
            </div>
          </div>
          <div class="col-lg-6 map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.5178266417506!2d106.6991629146141!3d10.771594992324788!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f40a3b49e59%3A0xa1bd14e483a602db!2sCao%20Thang%20Technical%20College!5e0!3m2!1sen!2s!4v1604386664139!5m2!1sen!2s" width="800" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
          </div>
        </div>
      </div>
    </div>
    <div class="map-content-9 form-bg-img">
      <div class="layer section-gap py-5">
        <div class="container py-lg-5">
          <div class="form">
            <h3 class="hny-title two text-center">Góp ý.</h3>
            <form action="https://sendmail.w3layouts.com/submitForm"class="mt-md-5 mt-4" method="post">
              <div class="input-grids">
                <input type="text" name="w3lName" id="w3lName" placeholder="Tên">
                <input type="email" name="w3lSender" id="w3lSender" placeholder="Email" required="" />
                <input type="subject" name="w3lSubject" id="w3lSubject" placeholder="Chủ Đề" required="">
              </div>
              <div class="input-textarea">
                <textarea name="w3lMessage" id="w3lMessage" placeholder="Nội dung" required=""></textarea>
              </div>
              <button type="submit" class="btn">Gửi</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection