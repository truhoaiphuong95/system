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
        <div class="col-md-6">
          <!-- Main content -->
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <h4>
                  <i class="fa fa-wrench"></i> <b>BIÊN NHẬN SỬA CHỮA MÁY</b>
                  <small class="float-right"><b>SỐ PHIẾU #{{ $ticket -> id }}</b></small>
                </h4>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-md-8 invoice-col">
                <u>Thông tin khách hàng:</u>
                <address>
                  <strong class="text-uppercase">{!! $ticket->client->linkName() !!}</strong><br>
                  <b>Số điện thoại:</b> {!! ($ticket->client->linkPhone()) !!}<br>
                  <b>Ngày sinh:</b> {{ date("d/m/Y", strtotime($ticket->client->birthday)) }}<br>
                  <b>Mã khách hàng:</b> KH{{ $ticket->client->id }}<br>
                  <b>Ngày nhận máy:</b> {{ $ticket->created_at->timezone('Asia/Ho_Chi_Minh')->format("d/m/Y - H:i") }}<br>
                  <b>Nhân viên nhận:</b> {{ $ticket->staff->name }}
                </address>
              </div>
              <!-- /.col -->
              <div class="col-md-4">
                <div class="btn-group" style="width: 100%">
                  <div class="btn btn-{{$ticket->ticketStatus->class}}" style="width: 100%">{{$ticket->ticketStatus->name}}</div>
                  <button type="button" class="btn btn-{{$ticket->ticketStatus->class}} dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <div class="dropdown-menu" role="menu">
                    @foreach ($ticket_statuses as $data)
                    @if($data->id == 3) 
                    <a class="dropdown-item" onclick="checkDone()">{{$data->name}}</a>
                    @else
                    <a class="dropdown-item" href="{{route('staff.ticket.changestatus.get', ['ticket_id'=>$ticket->id, 'status_id'=>$data->id])}}">{{$data->name}}</a>
                    @endif
                    @endforeach
                  </div>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- Table row -->
            <div class="row">
              <div class="col-12">
                <address>
                  <h5 class="text-uppercase"><b>Yêu cầu khách hàng:</b> 
                  @foreach($ticket->services as $service)
                  {{$service->name}}, 
                  @endforeach
                  {{ $ticket->requestment }}</h5>
                </address>
              </div>
            </div>
            <!-- /.row -->
            <!-- Table row -->
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped table table-bordered">
                  <tbody>
                    <tr>
                      <td class="text-uppercase" style="width: 200px"><b>Dòng máy</b></h5>
                      </td>
                      <td class="text-uppercase">{{ $ticket -> model }}</h5>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-uppercase" style="width: 200px"><b>CPU</b></h5>
                      </td>
                      <td class="text-uppercase">{{ $ticket -> cpu }}</h5>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-uppercase" style="width: 200px"><b>Dung lượng RAM</b></h5>
                      </td>
                      <td class="text-uppercase">{{ $ticket -> ram }}</h5>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-uppercase" style="width: 200px"><b>Dung lượng ổ cứng</b></h5>
                      </td>
                      <td class="text-uppercase">{{ $ticket -> storage }}</h5>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-12 table-responsive">
                <table class="table table-striped table table-bordered">
                  <tbody>
                    <tr>
                      <td class="text-uppercase" style="width: 200px"><b>Phụ kiện kèm theo</b></h5>
                      </td>
                      <td class="text-uppercase">{{ $ticket -> other }}</h5>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-uppercase" style="width: 200px"><b>Tình trạng máy</b></h5>
                      </td>
                      <td class="text-uppercase">{{ $ticket -> note }}</h5>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <div class="row no-print">
              <div class="col-12">
                <a href="{{ route('staff.client.edit.get', ['client_id' => $ticket->client->id]) }}" class="btn btn-default">Sửa khách hàng</a>
                <a href="{{ route('staff.ticket.edit.get', ['ticket_id' => $ticket->id]) }}" class="btn btn-default">Sửa biên nhận</a>

                <div class="btn-group float-right">
                  <a href="{{ route('staff.ticket.printpos.get', ['ticket_id' => $ticket->id]) }}" target="_blank" class="btn btn-primary" id="btnIn"><i class="fa fa-print"></i>&nbsp;&nbsp;IN MÁY POS</a>
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <div class="dropdown-menu" role="menu">
                    <a class="dropdown-item" href="{{ route('staff.ticket.print.get', ['ticket_id' => $ticket->id]) }}" target="_blank">In biên nhận</a>
                  </div>
                </div>
                
                <a href="{{ route('staff.ticket.printinternal.get', ['ticket_id' => $ticket->id]) }}" target="_blank" class="btn btn float-right"><i class="fa fa-print"></i>&nbsp;&nbsp;IN PHIẾU DÁN</a>
              </div>
            </div>
          </div>
          <!-- /.invoice -->
        </div>
        <div class="col-md-6">
          @if ($ticket->price != NULL)
          <div class="row">
            <div class="col-md-12">
              <div class="alert bg-maroon alert-primary">
                <h5><i class="icon fa fa-money"></i>TỔNG CỘNG: <span style="font-size:1.5rem;font-weight: bold;">@if($ticket->price==0) MIỄN PHÍ @else {{ MoneyFormat($ticket->price) }} VNĐ @endif</span> </h5>
              </div>
            </div>
          </div>
          @endif
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Thêm nhật ký</h3>
            </div>
            <div class="card-body">
              <div class="col-md-12">
                <form action="{{route('staff.ticketlog.add.post')}}" method="post">
                  {{csrf_field()}}
                  <div class="input-group">
                    <input name="content" type="text" class="form-control" placeholder="Nhập nội dung..." required>
                    <input name="ticket_id" type="hidden" value="{{$ticket->id}}" />
                    <input name="staff_id" type="hidden" value="{{UserInfo()->id}}" />
                  </div>
                  <div class="row my-2">
                    <div class="col-md-8">
                      <div class="checkbox icheck">
                        <label>
                          <input name="is_public" type="hidden" value="0">
                          <input name="is_public" type="checkbox" value="1"> Công khai cho khách hàng
                        </label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <button type="submit" class="btn btn-info btn-flat float-right">Thêm!</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Nhật ký sửa chữa</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Thời gian</th>
                    <th>Nội dung</th>
                    <th>Nhân viên</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($ticket->ticketLogs as $data)
                  <tr>
                    <td>{{ $data->created_at->timezone('Asia/Ho_Chi_Minh')->format("d/m/Y - H:i") }}</td>
                    <td>
                      @if($data->is_public)
                      <a style="color: #0a0" href="{{route('staff.ticketlog.setpublic.get', ['ticketlog_id' => $data->id])}}" alt="Đang công khai, ấn để thay đổi">
                        <i class="fa fa-globe"></i>
                      </a>&nbsp;
                      @else
                      <a style="color: #a00" href="{{route('staff.ticketlog.setpublic.get', ['ticketlog_id' => $data->id])}}">
                        <i class="fa fa-times"></i>
                      </a>&nbsp;
                      @endif {{ $data->content }}
                    </td>
                    <td>{{$data->staff->name}}</td>
                  </tr>
                  @endforeach
                  </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
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
    if (input == null ) {
      return;
    } else {
      price = input;
    }
    window.location.href = "{{route('staff.ticket.changestatus.get', ['ticket_id'=>$ticket->id, 'status_id'=>3])}}/"+price;
  }
</script>
@stop