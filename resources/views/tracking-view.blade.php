@extends('tracking-master')
@section('main')
<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">THÔNG TIN KHÁCH HÀNG</h3>
  </div>
  <div class="card-body">
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td colspan="2">
            <address>
              <strong class="text-uppercase">{{ $ticket->client->name }}</strong><br>
              <b>Số điện thoại:</b> {{ PhoneFormat($ticket->client->phone) }}<br>
              <b>Ngày sinh:</b> {{ date("d/m/Y", strtotime($ticket->client->birthday)) }}<br>
              <b>Mã khách hàng:</b> KH{{ $ticket->client->id }}<br>
              <b>Ngày nhận:</b> {{ $ticket->created_at->timezone('Asia/Ho_Chi_Minh')->format("d/m/Y - H:i") }}<br>
              <b>Nhân viên nhận:</b> {{ $ticket->staff->name }}
            </address>
          </td>
        </tr>
        <tr>
          <td>Tên thương hiệu:</td>
          <td>{{$ticket->model}} </td>
        </tr>
        <tr>
          <td>Lĩnh vực kinh doanh:</td>
          <td>{{$ticket->requestment}} </td>
        </tr>
        <tr>
          <td>Màu sắc:</td>
          <td>{{$ticket->cpu}} </td>
        </tr>
        <tr>
          <td>Mô tả yêu cầu:</td>
          <td>{{$ticket->ram}} </td>
        </tr>
        <tr>
          <td>Phong cách thiết kế:</td>
          <td>{{$ticket->storage}} </td>
        </tr>
        <tr>
          <td>Bố cục thiết kế mà bạn mong muốn? (Ngang/Dọc):</td>
          <td>{{$ticket->note}} </td>
        </tr>
        <tr>
          <td>Đặt in ấn:</td>
          <td>{{$ticket->other}} </td>
        </tr>
      </tbody>
    </table>
  </div>
  <!-- /.card-footer -->
</div>
<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">THEO DÕI TIẾN ĐỘ THIẾT KẾ</h3>
  </div>
  <div class="card-body">
    <table class="table table-bordered">
      <tbody>
        <tr class="text-center">
          <th>THỜI GIAN</th>
          <th>NỘI DUNG</th>
        </tr>
        @foreach ($logs as $data)
        <tr>
          <td class="text-center">{{date("d/m/Y - h:i", strtotime($data->created_at))}}</td>
          <td><i class="fa fa-globe"></i>&nbsp; {{$data->content}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="card-footer">
    <a onclick="history.go(-1);" class="btn btn-block btn-outline-secondary">Quay lại</a>
  </div>
  <!-- /.card-footer -->
</div>
@stop