@extends('master')
@section('head')
<title>KING | Tổng kết tài chính</title>
<link rel="stylesheet" href="{{secure_asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@stop
@section('main')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        @if (session('success'))
        <div class="row"><div class="col-md-12">
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fa fa-check"></i> Thành công!</h5> {{ session('success') }}
          </div>
        </div></div>
        @endif
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>TỔNG KẾT TÀI CHÍNH</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Tổng kết tài chính</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
          <div class="col-lg-3 col-sm-6 col-12">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h4>DOANH THU</h4>

                <h5>{{MoneyFormat($tongthu-$tongchi)}} VNĐ</h5>
              </div>
              <div class="icon">
                <i class="fa fa-shopping-cart"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-sm-6 col-12">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h4>TỔNG THU</h4>

                <h5>{{MoneyFormat($tongthu)}} VNĐ</h5>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-sm-6 col-12">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h4>TỔNG CHI</h4>

                <h5>{{MoneyFormat($tongchi)}} VNĐ</h5>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-sm-6 col-12">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h4>CÔNG NỢ</h4>

                <h5>8.000.000 VNĐ</h5>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
        </div>
      <div class="row">
        <div class="col-md-6">
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">PHIẾU THU</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Số phiếu</th>
                  <th>Số tiền</th>
                  <th>Nội dung</th>
                  <th>Danh mục</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($phieuthus as $data)
                <tr>
                  <td>#{{$data->id}}</td>
                  <td>{{MoneyFormat($data->sotien)}} ₫</td>
                  <td><a href="/xemphieuthu/{{$data->id}}">{{$data->noidung}}</a></td>
                  <td>{{$data->rlsPhieuthuDanhmuc->ten}}</td>
                  <td>
                    <a href="/xemphieuthu/{{$data->id}}" class="btn btn-primary">Xem</a>
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
        <div class="col-md-6">
          <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">PHIẾU CHI</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Số phiếu</th>
                  <th>Số tiền</th>
                  <th>Nội dung</th>
                  <th>Danh mục</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($phieuchis as $data)
                <tr>
                  <td>#{{$data->id}}</td>
                  <td>{{MoneyFormat($data->sotien)}} ₫</td>
                  <td><a href="/xemphieuchi/{{$data->id}}">{{$data->noidung}}</a></td>
                  <td>{{$data->rlsDanhmuc->ten}}</td>
                  <td>
                    <a href="/xemphieuchi/{{$data->id}}" class="btn btn-primary">Xem</a>
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
        "order": [[ 0, "desc" ]],
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
    $("#example2").DataTable({
        "order": [[ 0, "desc" ]],
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