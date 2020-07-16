@extends('master')

@section('head')
<title>KING | Thêm lớp học mới</title>
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@stop

@section('main')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>XOÁ LỚP HỌC</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active">Nhập lớp học</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      @if (count($errors) > 0)
      @foreach ($errors->all() as $error)
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> Thất bại!</h4> {!! $error !!}
      </div>
      @endforeach
      @endif
      <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-warning"></i> Cẩn thận!</h4> Bạn có chắc muốn xoá lớp này không? Nếu có, hãy điền <b>{{ $course->shortname }}</b> vào ô xác nhận!
      </div>
      <form action="{{route('staff.course.delete.post', ['course_id' => $course->id])}}" method="post">
        {{csrf_field()}}
        <div class="row">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Xác nhận xoá lớp</h3>
              </div>
              <div class="card-body">
                <div class="col-md-12">
                  <div class="form-group col-md-12">
                    <label>Bạn chắc chắn muốn xoá?</label>
                    <input type="text" class="form-control" name="delete_shortname" placeholder="{{ $course->shortname }}" required autofocus>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-danger pull-right">Xác nhận xoá</button>
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
@stop

@section('script')
<!-- bootstrap datepicker -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script>
  /* global $ */
  $(function() {
    $('.select2').select2()
  })
</script>
@stop