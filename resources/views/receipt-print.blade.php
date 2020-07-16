<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>KING | In phiếu thu</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 4 -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{secure_asset('dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  </head>
  <body>
    <div class="wrapper">
      @foreach(array("Liên 2: Giao khách") as $solien)
      <!-- Main content -->
      <section class="invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-8 offset-md-4">
            <h2 class="page-header">
              <i class="fa fa-globe"></i>&nbsp;&nbsp;<b style="font-size:30pt">PHIẾU THU (TẠM THỜI)</b>
              <small class="float-right"><b>SỐ PHIẾU #{{ $phieuthu -> solai }}</b></small>
            </h2>
          </div>
          <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-6 invoice-col">
            {{$solien}}
            <address>
              <strong>Trung tâm Đôrêmon Cần Thơ</strong><br>
              C132/10A hẻm 132, đường 3 Tháng 2<br>
              P. Hưng Lợi, Q. Ninh Kiều, TP. Cần Thơ<br>
              <b>Số điện thoại:</b> 0888-141811 hoặc 096-1020-096<br>
              <b>Email:</b> hotro@trungtamdoremon.com<br>
              <b>Website:</b> trungtamdoremon.com / cuahangdoremon.com
            </address>
          </div>
          <!-- /.col -->
          <div class="col-sm-6 invoice-col">
            <u>Thông tin khách hàng:</u>
            <address>
              <strong class="text-uppercase">{{ $phieuthu->rlsClient -> ten }}</strong><br>
              <b>Số điện thoại:</b> {{ PhoneFormat($phieuthu->rlsClient->sdt) }}<br>
              <b>Ngày sinh:</b> {{ date("d/m/Y", strtotime($phieuthu->rlsClient -> ngaysinh)) }}<br>
              <b>Mã khách hàng:</b> {{ $phieuthu->rlsClient -> id }}<br>
              <b>Ngày lập phiếu:</b> {{ $phieuthu->created_at->timezone('Asia/Ho_Chi_Minh')->format("d/m/Y - H:i") }}<br>
              <b>Nhân viên:</b> {{ $phieuthu->rlsStaff->ten }}
            </address>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- Table row -->
        <div class="row">
          <div class="col-12">
            <address>
              <h5 class="text-uppercase">
                  <b>DANH SÁCH DỊCH VỤ</b>
              </h5>
            </address>
          </div>
        </div>
        <!-- /.row -->
        <!-- Table row -->
        <div class="row">
          <div class="col-12 table-responsive">
            <table class="table table-striped table table-bordered">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Dịch vụ</th>
                  <th>Thành tiền</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-uppercase">1</td>
                  <td class="text-uppercase">{{ $phieuthu -> noidung }}</td>
                  <td class="text-uppercase">{{ number_format($phieuthu -> sotien,0,",",".") }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <i>(Phiếu này chỉ có giá trị tạm thời trong 7 ngày, xin liên hệ nhân viên để nhận lai gốc) </i>
        <div class="row">
          <div class="col-md-3 offset-md-9">
            <h4 class=""><b>Tổng cộng:</b> {{ number_format($phieuthu -> sotien,0,",",".") }} VNĐ</h4>
          </div>
        </div>
        <!-- /.row -->
        <div class="row">
          <!-- accepted payments column -->
          <div class="col-md-4 offset-md-2">
            <p class="lead">NHÂN VIÊN</p>
          </div>
          <!-- /.col -->
          <div class="col-md-4 offset-md-2">
            <p class="lead">KHÁCH HÀNG</p>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
      @endforeach
    </div>
    <!-- ./wrapper -->
  </body>
  <script type="text/javascript">
    // window.onload = function() {
    //   window.print()
    // };
  </script>
</html>