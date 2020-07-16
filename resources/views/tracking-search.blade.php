@extends('tracking-master')
@section('main')
<div class="row">
  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">THEO DÕI TÌNH TRẠNG MÁY</h3>
      </div>
      <div class="card-body">
        <div class="col-md-12">
          <form action="/search" method="post">
            {{csrf_field()}}
            <div class="input-group">
              <input name="inputKeyword" type="text" class="form-control" placeholder="Nhập vào SỐ ĐIỆN THOẠI" required>
              <span class="input-group-append">
              <button type="submit" class="btn btn-info btn-flat">Tìm kiếm</button>
              </span>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fa fa-magic"></i>&nbsp; 
          Hướng dẫn sử dụng
        </h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <dl class="dl-horizontal">
          <dt>• Hệ thống theo dõi tình trạng máy</dt>
          <dd>Vì hiểu được nỗi trăn trở của khách hàng khi gửi sửa chữa máy, hệ thống theo dõi luôn cập nhật thường xuyên và liên tục tình trạng sửa chữa để khách hàng theo dõi tình trạng máy của mình.</dd>
          <dt>• Tìm theo số điện thoại</dt>
          <dd>Quý khách hàng có thể nhập số điện thoại của bạn vào ô tìm kiếm ở trên để xem tất cả các biên nhận sửa chữa máy.</dd>
          <dt>• Tìm theo số phiếu biên nhận</dt>
          <dd>Số phiếu là số nằm trên góc phải của phiếu biên nhận, khách hàng có thể nhập số phiếu vào ô tìm kiếm ở trên để xem tình trạng máy.</dd>
          <dt>• Liên hệ phục vụ</dt>
          <dd>Trong quá trình sửa chữa, nếu quý khách có bất kỳ câu hỏi hay yêu cầu, hãy gọi cho số điện thoại chăm sóc khách hàng <a href="tel:0855406949">085.540.6949</a> hoặc <a href="//fb.com/techkingservice" target="_blank">Fanpage TechKING</a> để được hỗ trợ tốt nhất.</dd>
          <dt style="color: #a00">• Ý kiến phản ánh</dt>
          <dd style="color: #a00">Những ý kiến đóng góp hay phản ánh về dịch vụ hoặc thái độ phục vụ của nhân viên, xin vui lòng gọi điện trực tiếp cho số điện thoại <a href="tel:0961020096">096.1020.096</a>.</dd>
          <dt style="text-align: center">***<br />Một lần nữa, trung tâm xin cảm ơn quý khách hàng đã tin tưởng sử dụng dịch vụ của Đôrêmon. Kính chúc quý khách có những trải nghiệm tuyệt vời nhất!</dt>
        </dl>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>
@stop