@extends('master')
@section('head')
<title>KING | Xem biên nhân #{{$ticket->id}}</title>
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
          <h1>XEM BIÊN NHẬN</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active">Xem biên nhận</li>
          </ol>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      @if (session('success'))
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fa fa-check"></i> Thành công!</h5>
            {{ session('success') }}
          </div>
        </div>
      </div>
      @endif
      @if (session('error'))
      <div class="row"><div class="col-md-12">
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fa fa-ban"></i> Thất bại!</h5> 
          {{ session('error') }}
        </div>
      </div></div>
      @endif
      <div class="row">
        <div class="col-md-12">
          <!-- Main content -->
          <div class="card card-primary">
            <form action="{{route('staff.ticket.rate.post', ['ticket_id' => $ticket->id])}}" method="POST">
            {{csrf_field()}}
            <input type="hidden" name="redirectTo" value="staff.ticket.list.get"></input>
            <div class="card-header">
              <h3 class="card-title">Đánh giá của khách hàng</h3>
            </div>
            <div class="card-body">
              <textarea class="form-control" rows="3" placeholder="Nhập vào phản hồi của khách hàng" name="content"></textarea>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Đánh giá</button>
            </div>
            </form>
          </div>
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
  $(function() {
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
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    })
  });
  window.onkeydown = function(evt) {
    if (evt.keyCode == 119) //F8
      document.getElementById("btnIn").click();
  };
  function checkDone() {
    var price;
    var input = prompt("Nhập vào phí dịch vụ:");
    if (input == null || input == "") {
      price = 0;
    } else {
      price = input;
    }
    window.location.href = "{{route('staff.ticket.changestatus.get', ['case_id'=>$ticket->id, 'status_id'=>3])}}/"+price;
  }
</script>
@stop