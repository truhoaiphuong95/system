@extends('master')
@section('head')
<title>KING | Thêm dịch vụ</title>
<link rel="stylesheet" href="{{secure_asset('plugins/select2/select2.min.css')}}">
@stop
@section('main')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Thêm dịch vụ mới</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active">Dịch vụ</li>
          </ol>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    @if (count($errors) > 0) 
    @foreach ($errors->all() as $error) 
    <div class="col-md-12">
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fa fa-ban"></i> Thất bại!</h5>
        {!! $error !!}
      </div>
    </div>
    @endforeach
    @endif
    <!-- general form elements -->
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Nhập thông tin dịch vụ</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{route('staff.service.add.post')}}" method="post">
          {{csrf_field()}}
          <div class="card-body">
            <div class="form-group">
              <label for="sku">SKU:</label>
              <input name="sku" type="text" class="form-control" id="sku" placeholder="Tên rút gọn" autofocus required>
            </div>
            <div class="form-group">
              <label for="name">Tên dịch vụ:</label>
              <input name="name" type="text" class="form-control" id="name" placeholder="Tên dịch vụ" required>
            </div>
            <div class="form-group">
              <label for="price">Phí dịch vụ:</label>
              <input name="price" type="number" class="form-control" id="price" placeholder="Giá dịch vụ" required>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm vào</button>
            <a onclick="history.go(-1);" class="btn">Quay lại</a>
          </div>
        </form>
      </div>
    </div>
    <!-- /.card -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@stop
@section('script')
<!-- Select2 -->
<script src="{{secure_asset('plugins/select2/select2.full.min.js')}}"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
</script>
@stop