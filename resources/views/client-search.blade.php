@extends('master')
@section('head')
<title>KING | Tìm khách hàng</title>
@stop
@section('main')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>TÌM KHÁCH HÀNG</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Tìm khách hàng</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tìm kiếm theo số điện thoại</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="/timkiem" method="get">
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputSdt">Số điện thoại hoặc Số phiếu:</label>
                    <input name="keyword" class="form-control" id="inputSdt" placeholder="Đầu số mới 10 số" autofocus required>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@stop