@extends('master')
@section('title')
  <title>KING | Sửa biên nhận</title>
@endsection
@section('main')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>SỬA BIÊN NHẬN</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Sửa biên nhận</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- general form elements -->
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Sửa thông tin biên nhận</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('staff.ticket.edit.post')}}" method="post">
                {{csrf_field()}}
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputSostt">Tên Khách Hàng:</label> {{ $ticket->client->name }}   |   
                    <label for="inputSostt">Số Điện Thoại:</label> {{ $ticket->client->phone }}    |    
                    <label for="inputSostt">Ngày Sinh:</label> {{ $ticket->client->birthday }}
                    <input type="hidden" name="client_id" value="{{ $ticket->client->id }}">
                    <input type="hidden" name="staff_id" value="{{ $ticket->staff_id }}">
                    <input type="hidden" name="ticket_status_id" value="{{ $ticket->ticket_status_id }}">
                  </div>
                  <div class="form-group">
                    <label for="id">Biên nhận số:</label>
                    <input name="id" type="text" class="form-control" id="id" value="{{$ticket -> id}}" readonly="readonly">
                  </div>
                  <div class="form-group">
                    <label for="requestment">Yêu cầu khách hàng:</label>
                    <input name="requestment" type="text" class="form-control" id="requestment" value="{{$ticket -> requestment}}" autofocus required>
                  </div>
                  <div class="form-group">
                    <label for="model">Dòng máy:</label>
                    <input name="model"type="text" class="form-control" id="model" value="{{$ticket -> model}}" required>
                  </div>
                  <div class="form-group">
                    <label for="cpu">CPU:</label>
                    <input name="cpu" type="text" class="form-control" id="cpu" value="{{$ticket -> cpu}}">
                  </div>
                  <div class="form-group">
                    <label for="ram">Dung lượng RAM:</label>
                    <input name="ram" type="text" class="form-control" id="ram" value="{{$ticket -> ram}}">
                  </div>
                  <div class="form-group">
                    <label for="storage">Dung lượng ổ cứng:</label>
                    <input name="storage" type="text" class="form-control" id="storage" value="{{$ticket -> storage}}">
                  </div>
                  <div class="form-group">
                    <label for="note">Tình trạng máy:</label>
                    <input name="note" type="text" class="form-control" id="note" value="{{$ticket -> note}}">
                  </div>
                  <div class="form-group">
                    <label for="other">Phụ kiện kèm theo:</label>
                    <input name="other" type="text" class="form-control" id="other" value="{{$ticket -> other}}">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Lưu chỉnh sửa</button>
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