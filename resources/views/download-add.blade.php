@extends('master')

@section('head')
<title>KING | Thêm link tải về</title>
<link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@stop
  
@section('main')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>THÊM LINK TẢI VỀ</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Tải về</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
    @if (session('success'))
    <div class="row"><div class="col-md-12">
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fa fa-check"></i> Thành công!</h5> {{ session('success') }}
      </div>
    </div></div>
    @endif
    @if (count($errors) > 0) 
    @foreach ($errors->all() as $error) 
      <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-ban"></i> Thất bại!</h4> {!! $error !!}
      </div>
    @endforeach
    @endif
    <form action="{{route('staff.download.add.post')}}" method="post">
    {{csrf_field()}}
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-body">
            <div class="col-md-12">
              <div class="form-group col-md-12">
                <label>Tên phần mềm</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
              </div>
              <div class="form-group col-md-12">
                <label>Mô tả</label>
                <input type="text" class="form-control" name="description" value="{{ old('description') }}">
              </div>
              <div class="form-group col-md-12">
                <label>Link</label>
                <input type="text" class="form-control" name="link" value="{{ old('link') }}" required>
              </div>
              <div class="form-group col-md-12">
                <label>SHA1</label>
                <input type="text" class="form-control" name="sha1" value="{{ old('sha1') }}">
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary pull-right">Thêm mới</button>
          </div>
        </div>
      </div>
    </div>
    </form>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- bootstrap datepicker -->
<script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script>
/* global $ */
  $(function () {
    $('.select2').select2()
    $("#datepicker").datepicker({ format: 'yyyy-mm-dd', autoclose: true });
  })
</script>
@stop