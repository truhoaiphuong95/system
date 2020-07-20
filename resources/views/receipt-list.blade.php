@extends('master')
@section('head')
<title>DELI | Danh sách phiếu thu @if(isset($danhmuc)): {{$danhmuc->ten}} @endif</title>
<link rel="stylesheet" href="{{secure_asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@stop
@section('main')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DANH SÁCH PHIẾU THU @if(isset($danhmuc)): {{$danhmuc->ten}} @endif</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Danh sách phiếu thu</li>
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
              <h3 class="card-title">DANH SÁCH PHIẾU THU</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr class="text-center">
                  <th>NGÀY NHẬN</th>
                  <th>DANH MỤC</th>
                  <th>SỐ LAI</th>
                  <th>KHÁCH HÀNG</th>
                  <th>NỘI DUNG THU</th>
                  <th>SỐ TIỀN</th>
                  <th>NGƯỜI NHẬN</th>
                  <th>HÀNH ĐỘNG</th>
                </tr>
                </thead>
                <tbody>
                @foreach($receipts->reverse() as $data)
                <tr>
                  <!--<td>{{date("Y/m/d h:m:i", strtotime($data->created_at))}}</td>-->
                  <td class="text-center">{{date("Y/m/d", strtotime($data->created_at))}}</td>
                  <td><span class="badge bg-info">{{$data->branch->name}}</span> | <span class="badge bg-danger">{{$data->field->name}}</span></td>
                  <td class="text-center">{{$data->number}}</td>
                  <td>{{$data->client->name}}</td>
                  <td>{{$data->content}}</td>
                  <td class="text-right">{{number_format($data->amount,0,",",".")}} ₫</td>
                  <td>{{$data->staff->name}}</td>
                  <!--<td class="text-center"><a href="{{route('staff.receipt.view.get', ['receipt_id' => $data->id])}}" class="btn btn-primary">Xem</a></td>-->
                  <td>
                    <div class="btn-group">
                      <a href="{{route('staff.receipt.view.get', ['receipt_id' => $receipt->id])}}" class="btn btn-primary">Xem</a>
                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <div class="dropdown-menu" role="menu">
                        <!--<a class="dropdown-item" href="{{route('staff.receipt.printpos.get', ['receipt_id' => $receipt->id])}}" target="_blank">In máy POS</a>
                        <a class="dropdown-item" href="{{route('staff.receipt.printinternal.get', ['receipt_id' => $receipt->id])}}" target="_blank">In phiếu dán</a>-->
                        <a class="dropdown-item" href="{{route('staff.receipt.print.get', ['receipt_id' => $receipt->id])}}" target="_blank">In biên nhận</a>
                      </div>
                    </div>
                  </td>
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
        "ordering": false,
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