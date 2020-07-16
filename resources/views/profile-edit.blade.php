@extends('master')
@section('head')
<title>KING | Thông tin cá nhân</title>
@stop
@section('main')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>THÔNG TIN CÁ NHÂN</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Chỉnh sửa thông tin</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- general form elements -->
              @if($errors->any())
              <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fa fa-warning"></i> Có gì đó sai sai!</h5>
                {{$errors->first()}}
              </div>
              @endif
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Nhập thông tin khách hàng</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="/nhanvien/canhan" method="post">
                {{csrf_field()}}
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputSdt">Số điện thoại:</label>
                    <input name="inputSdt" pattern="[0-9]{10}" class="form-control" id="inputSdt" value="{{UserInfo()->sdt}}" autofocus required>
                  </div>
                  <div class="form-group">
                    <label for="inputTen">Họ và tên:</label>
                    <input name="inputTen" type="text" class="form-control" id="inputTen" value="{{UserInfo()->ten}}" required>
                  </div>
                  <div class="form-group">
                    <label for="inputNgaysinh">Ngày sinh:</label>
                    <input name="inputNgaysinh" type="date" class="form-control" id="inputNgaysinh" value="{{UserInfo()->ngaysinh}}">
                  </div>
                  <div class="form-group">
                    <label for="inputMatkhau">Mật khẩu mới:</label>
                    <input name="inputMatkhau" type="password" class="form-control" id="inputMatkhau" placeholder="(Bỏ trống nếu không thay đổi)">
                  </div>
                  <div class="form-group">
                    <label for="inputReMatkhau">Nhập lại mật khẩu:</label>
                    <input name="inputReMatkhau" type="password" class="form-control" id="inputReMatkhau" value="">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                  <a onclick="history.go(-1);" class="btn">Quay lại</a>
                </div>
              </form>
            </div>
            <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@stop

@section('script')
@stop