@extends('master')
@section('head')
<title>DELI | Danh sách biên nhận</title>
<link rel="stylesheet" href="{{secure_asset('plugins/datatables/dataTables.bootstrap4.css')}}">
<style>
  .pagination li {
    padding: 10px; 
  }
  .pagination {
    float: right;
  }
</style>
@stop
@section('main')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DANH SÁCH BIÊN NHẬN THIẾT KẾ</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Danh sách biên nhận thiết kế</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DANH SÁCH BIÊN NHẬN THIẾT KẾ</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr class="text-center">
                  <th>SỐ PHIẾU</th>
                  <th>TÊN KHÁCH HÀNG</th>
                  <th>DỊCH VỤ</th>
                  <th>NGÀY NHẬN</th>
                  <th>NGÀY GIAO</th>
                  <th>TIẾN ĐỘ</th>
                  <th>BÁO GIÁ</th>
                  <th>HÀNH ĐỘNG</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tickets as $ticket)
                <tr>
                  <td><a href="{{route('staff.ticket.view.get', ['ticket_id' => $ticket->id])}}">#{{$ticket->id}}</a></td>
                  <td>{{$ticket->client->name}}</td>
                  <td>
                    @foreach($ticket->services as $service)
                      {{$service->name}},
                    @endforeach
                    {{$ticket->requestment}}
                  </td>
                  <td>{{date("Y/m/d", strtotime($ticket->created_at))}}</td>
                  <td>{{$ticket->storage}}</td>
                  <td>
                    <span class="badge bg-{{$ticket->ticketStatus->class}}"><span style="display: none;">{{$ticket->ticketStatus->id}}</span>{{$ticket->ticketStatus->name}}</span>
                  </td>
                  <td>@if(isset($ticket->price)) @if($ticket->price==0) MIỄN PHÍ @else {{MoneyFormat($ticket->price)}} VNĐ @endif @endif</td>
                  <td>
                    <div class="btn-group">
                      <a href="{{route('staff.ticket.view.get', ['ticket_id' => $ticket->id])}}" class="btn btn-primary">Xem</a>
                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" href="{{route('staff.ticket.printpos.get', ['ticket_id' => $ticket->id])}}" target="_blank">In máy POS</a>
                        <a class="dropdown-item" href="{{route('staff.ticket.printinternal.get', ['ticket_id' => $ticket->id])}}" target="_blank">In phiếu dán</a>
                        <a class="dropdown-item" href="{{route('staff.ticket.print.get', ['ticket_id' => $ticket->id])}}" target="_blank">In biên nhận</a>
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@stop

@section('script')
<script src="{{secure_asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{secure_asset('plugins/datatables/dataTables.bootstrap4.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
        // "order": false,
        "order": [[ 3, "asc" ]],
        "lengthMenu": [ 500 ],
        "bPaginate": false,
        "language": {
        	"sProcessing":   "Đang xử lý...",
        	"sLengthMenu":   "Xem _MENU_ mục",
        	"sZeroRecords":  "Không tìm thấy dòng nào phù hợp",
        	"sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
        	"sInfoEmpty":    "Đang xem 0 đến 0 trong tổng số 0 mục",
        	"sInfoFiltered": "(được lọc từ _MAX_ mục)",
        	"sInfoPostFix":  "",
        	"sSearch":       "Tìm:",
        	"sUrl":          "",
        	"oPaginate": {
        		"sFirst":    "Đầu",
        		"sPrevious": "Trước",
        		"sNext":     "Tiếp",
        		"sLast":     "Cuối"
        	}
        }
    });
  });

</script>
@stop