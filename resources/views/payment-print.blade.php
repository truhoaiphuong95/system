<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DELI | In phiếu chi</title>
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
              <i class="fa fa-globe"></i>&nbsp;&nbsp;<b style="font-size:30pt">PHIẾU CHI</b>
              <small class="float-right"><b>SỐ PHIẾU #{{$payment->id }}</b></small>
            </h2>
          </div>
          <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-6 invoice-col">
            {{$solien}}
            <address>
              <strong>CÔNG TY TNHH THIẾT KẾ DELI</strong><br>
              Số H9B, đường Đinh Công Tráng<br>
              P. Xuân Khánh, Q. Ninh Kiều, TP. Cần Thơ<br>
              <b>Số điện thoại:</b> 097-151-7074 hoặc  094-294-7074<br>
              <b>Email:</b> deli4ne1@gmail.com<br>
              <b>Website:</b> deli4ne1.com
            </address>
          </div>
          <!-- /.col -->
          <div class="col-sm-5 invoice-col">
            <u>THÔNG TIN KHÁCH HÀNG:</u>
            <address>
              <strong class="text-uppercase">{{ $payment->client->name }}</strong><br>
              <b>Số điện thoại:</b> {{ PhoneFormat($payment->client->phone) }}<br>
              <b>Ngày sinh:</b> {{ date("d/m/Y", strtotime($payment->client->birthday)) }}<br>
              <b>Mã khách hàng:</b> KH{{ $payment->client->id }}<br>
              <b>Ngày nhận:</b> {{ $payment->created_at->timezone('Asia/Ho_Chi_Minh')->format("d/m/Y - H:i") }}<br>
              <b>Nhân viên nhận:</b> {{ $payment->staff->name }}
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
                  <td class="text-uppercase">{{ $payment->content }}</td>
                  <td class="text-uppercase">{{ number_format($payment->amount,0,",",".") }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <i>(Phiếu này chỉ có giá trị tạm thời trong 7 ngày, xin liên hệ nhân viên để nhận lai gốc) </i>
        <div class="row">
          <div class="col-md-3 offset-md-9">
            <h4 class=""><b>Tổng cộng:</b> {{ number_format($payment->amount,0,",",".") }} VNĐ</h4>
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