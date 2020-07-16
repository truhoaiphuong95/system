@extends('master')

@section('head')
<title>KING | Sửa học viên</title>
<link rel="stylesheet" href="{{ secure_asset('plugins/select2/select2.min.css') }}">
@stop
  
@section('main')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>SỬA THÔNG TIN</h1>
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
    <form action="{{route('staff.coursestudent.edit.post', ['id'=>$course_student->id])}}" method="post">
    {{csrf_field()}}
    <input type="hidden" name="id" value="{{$course_student->id}}"/>
    <input type="hidden" name="client_id" value="{{$course_student->client_id}}"/>
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-body">
            <div class="col-md-12">
              <div class="form-group col-md-12">
                <label>Tên học viên</label>
                <input type="text" class="form-control" value="{{$course_student->client->name}}" disabled>
              </div>
              <div class="form-group col-md-12">
                <label>Chọn lớp học</label>
                <select name="course_id" class="form-control select2" style="width: 100%;">
                  @foreach($courses as $data)
                  <option value="{{$data->id}}" @if($data->id==$course_student->course_id) selected="selected" @endif>{{$data->shortname}} - {{$data->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-md-12">
                <label>Phần trăm ưu đãi (%)</label>
                <input type="number" class="form-control" name="deal_rate" value="{{ $course_student->deal_rate }}" required>
              </div>
              <div class="form-group col-md-12">
                <label>Số tiền đã thu</label>
                <input type="number" class="form-control" name="tuition_done" value="{{ $course_student->tuition_done }}" required>
              </div>
              <div class="form-group col-md-12">
                <label>Chương trình ưu đãi</label>
                <input type="textarea" class="form-control" name="deal_note" value="{{ $course_student->deal_note }}" placeholder="Ghi rõ nội dung ưu đãi" required>
              </div>
              <div class="form-group col-md-12">
                <label>Ghi chú</label>
                <input type="textarea" class="form-control" name="content" value="{{ $course_student->content }}" placeholder="Một vài dòng tâm sự...">
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary pull-right">Lưu thay đổi</button>
            <a onclick="history.go(-1);" class="btn">Quay lại</a>
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
<script language="JavaScript" type="text/javascript" src="{{ asset('/plugins/jquery/jquery.min.js')}}"></script>
<script language="JavaScript" type="text/javascript" src="{{ asset('/plugins/select2/select2.full.min.js')}}"></script>
<script>
/* global $ */
  $(function () {
    $('.select2').select2()
  })
</script>
@stop