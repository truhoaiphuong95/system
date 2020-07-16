@extends('master')
@section('head')
<title>KING | Xem phiếu chi #{{$payment->number}}</title>
<link rel="stylesheet" href="{{secure_asset('plugins/datatables/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{secure_asset('plugins/iCheck/square/blue.css')}}">
@stop
@section('main')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active">Xem phiếu chi</li>
          </ol>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-5 mx-auto">
          <!-- Main content -->
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <h4>
                  <i class="fa fa-globe"></i>  <b>PHIẾU CHI</b>
                  <small class="float-right"><b>SỐ PHIẾU #{{ $payment -> number }}</b></small>
                </h4>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-md-6 invoice-col">
                <u>Thông tin phiếu chi:</u>
                <address>
                  <strong class="text-uppercase"><a href="/xemkhachhang/{{$payment->client->id}}">{{$payment->client->name}}</a></strong><br>
                  <b>Số điện thoại: </b><a href="tel:{{$payment->client->sdt}}">{{PhoneFormat($payment->client->phone)}}</a><br>
                  <b>Ngày sinh:</b> {{ date("d/m/Y", strtotime($payment->client -> birthday)) }}<br>
                  <b>Mã khách hàng:</b> {{ $payment->client -> id }}<br>
                  <b>Ngày lập phiếu:</b> {{ $payment->created_at->timezone('Asia/Ho_Chi_Minh')->format("d/m/Y") }}<br>
                  <b>Nhân viên lập:</b> {{ $payment->staff->name }}
                </address>
              </div>
              <!-- /.col -->
              <div class="col-md-6 invoice-col">
                <div class="btn btn-danger float-right">{{$payment->field->name}}</div>
              </div>
              <!-- /.col -->
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
                      <td class="text-uppercase">{{ $payment -> content }}</td>
                      <td class="text-uppercase">{{ number_format($payment -> amount,0,",",".") }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="card card-footer">
            <div class="col-12">
              <a href="{{ route('staff.payment.edit.get', ['payment_id' => $payment->id]) }}" class="btn btn-default">Sửa phiếu chi</a>
              <a href="{{ route('staff.payment.destroy.get', ['payment_id' => $payment->id]) }}" class="text-danger ml-2">Xoá</a>
            </div>
          </div>
        </div>
        <!-- /.invoice -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@stop
@section('script')
<script src="{{secure_asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{secure_asset('plugins/datatables/dataTables.bootstrap4.js')}}"></script>
<!-- iCheck -->
<script src="{{secure_asset('plugins/iCheck/icheck.min.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
        "paging": false,
        "lengthChange": false,
        "searching": false,
        "ordering": false,
        "info": false,
        "autoWidth": true,
    });
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass   : 'iradio_square-blue',
      increaseArea : '20%' // optional
    })
  });
window.onkeydown = function(evt) {
    if (evt.keyCode == 80) //P
        document.getElementById("btnIn").click();
};
</script>
@stop