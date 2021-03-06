@extends('master')
@section('head')
<title>DELI | Danh sách tổng hợp tài liệu</title>
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
            <h1>DANH SÁCH TỔNG HỢP TÀI LIỆU</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Danh sách tổng hợp tài liệu</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    @if (session('success'))
    <div class="row"><div class="col-md-12">
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fa fa-check"></i> Thành công!</h5> {{ session('success') }}
      </div>
    </div></div>
    @endif
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DANH SÁCH TỔNG HỢP TÀI LIỆU</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr class="text-center">
                        <th>STT</th>
                        <th>TÊN SẢN PHẨM</th>
                        <th>MÔ TẢ</th>
                        <th>HÌNH ẢNH</th>
                        <th style="width: 10%">HÀNH ĐỘNG</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $i=1 @endphp
                      @foreach ($downloads as $download)
                      <tr>
                        <td class="text-center">{{ $i++ }}</td>
                        <td>{{$download->name}}</td>
                        <td>{{$download->description}}</td>
                        <td>{{$download->sha1}}</td>
                        <td class="text-center">
                          <div class="btn-group">
                            <a href="{{$download->link}}" class="btn btn-success" target="_blank"><i class="nav-icon fa fa-download"></i></a>
                            @if(UserInfo() -> level >=3)
                            <a href="{{route('staff.download.edit.get', ['download_id' => $download->id])}}" class="btn btn-primary"><i class="nav-icon fa fa-edit"></i></a>
                            <a href="{{route('staff.download.delete.get', ['download_id' => $download->id])}}" class="btn btn-danger"><i class="nav-icon fa fa-trash"></i></a>
                            @endif
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
        "order": [[0, 'desc']],
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