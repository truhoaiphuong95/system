@extends('tracking-master')
@section('main')
      <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Danh sách biên nhận</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Số phiếu</th>
                  <th>Dòng Máy</th>
                  <th>Tiến độ</th>
                  <th class="d-none d-md-table-cell"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($tickets as $ticket)
                <tr>
                  <td>{{$ticket->id}}</td>
                  <td><a href="/tracking/{{$ticket->id}}">{{$ticket->model}}</a></td>
                  <td>
                    @if ($ticket->ticket_status_id == 5)
                    <span class="badge bg-success">HOÀN THÀNH</span>
                    @else
                    <span class="badge bg-warning">ĐANG XỬ LÝ</span>
                    @endif
                    
                  </td>
                  <td class="d-none d-md-block d-lg-block"><a href="/tracking/{{$ticket->id}}/{{$sixdigit}}" class="btn btn-primary">Xem</a></td>
                </tr>
                @endforeach
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <a onclick="history.go(-1);" class="btn btn-block btn-outline-secondary">Quay lại</a>
            </div>
            <!-- /.card-footer -->
      </div>
  @stop