<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DELI | In biên nhận</title>
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
              <i class="fa fa-wrench"></i>  <b>BIÊN NHẬN THIẾT KẾ</b>
              <small class="float-right"><b>SỐ PHIẾU #{{ $ticket->id }}</b></small>
            </h2>
          </div>
          <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-5 invoice-col">
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
              <strong class="text-uppercase">{{ $ticket->client->name }}</strong><br>
              <b>Số điện thoại:</b> {{ PhoneFormat($ticket->client->phone) }}<br>
              <b>Ngày sinh:</b> {{ date("d/m/Y", strtotime($ticket->client->birthday)) }}<br>
              <b>Mã khách hàng:</b> KH{{ $ticket->client->id }}<br>
              <b>Ngày nhận:</b> {{ $ticket->created_at->timezone('Asia/Ho_Chi_Minh')->format("d/m/Y - H:i") }}<br>
              <b>Nhân viên nhận:</b> {{ $ticket->staff->name }}
            </address>
          </div>
          <!-- /.col -->
          <div class="col-sm-2 invoice-col">
            <div class="float-right"><img src="/images/QUET.png" /></div>
            <div class="float-right">{!! QrCode::size(170)->margin(0)->generate('http://sys.eduking.edu.vn/tracking/'.$ticket->id) !!}</div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- Table row -->
        <div class="row">
          <div class="col-10">
            <address>
              <h5 class="text-uppercase">
                  <b>YÊU CẦU CỦA KHÁCH HÀNG:</b> {{ $ticket->requestment }}
              </h5>
            </address>
          </div>
          <div class="col-2">
            <div class="float-right"></div>
          </div>
        </div>
        <!-- /.row -->
        <!-- Table row -->
        <div class="row">
          <div class="col-6 table-responsive">
            <table class="table table-striped table table-bordered">
              <tbody>
                <tr>
                  <td class="text-uppercase" style="width: 200px"><b>Tên thương hiệu:</b></h5></td>
                  <td class="text-uppercase">{{ $ticket->model }}</h5></td>
                </tr>
                <tr>
                  <td class="text-uppercase" style="width: 200px"><b>Màu sắc:</b></h5></td>
                  <td class="text-uppercase">{{ $ticket->cpu }}</h5></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-6 table-responsive">
            <table class="table table-striped table table-bordered">
              <tbody>
                <tr>
                  <td class="text-uppercase" style="width: 200px"><b>Mô tả yêu cầu:</b></h5></td>
                  <td class="text-uppercase">{{ $ticket->ram }}</h5></td>
                </tr>
                <tr>
                  <td class="text-uppercase" style="width: 200px"><b>Phong cách thiết kế:</b></h5></td>
                  <td class="text-uppercase">{{ $ticket->storage }}</h5></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-12 table-responsive">
            <table class="table table-striped table table-bordered">
              <tbody>
                <tr>
                  <td class="text-uppercase" style="width: 200px"><b>Bố cục thiết kế:</b></h5></td>
                  <td class="text-uppercase">{{ $ticket->note }}</h5></td>
                </tr>
                <tr>
                  <td class="text-uppercase" style="width: 200px"><b>Đặt in ấn:</b></h5></td>
                  <td class="text-uppercase">{{ $ticket->other }}</h5></td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        
        <div class="row">
          <div class="col-md-12"><h5><b>* XIN CHÂN THÀNH CÁM ƠN QUÝ KHÁCH HÀNG!
          <br/>** Quý khách hàng có thể kiểm tra tiến độ thiết kế của mình tại http://sys.deli4ne1.com/tracking/{{$ticket->id}}.
          </b></h5></div>
        </div>
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