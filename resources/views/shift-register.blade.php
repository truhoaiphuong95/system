@extends('master')

@section('head')
<title>KING | Đăng ký ca làm việc</title>
<link rel="stylesheet" href="{{ secure_asset('plugins/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ secure_asset('plugins/iCheck/all.css') }}">
@stop

@section('main')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>ĐĂNG KÝ CA LÀM VIỆC</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active">Đăng ký ca làm việc</li>
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
      @if (isset($warning))
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fa fa-warning"></i> Lưu ý!</h5>
            {{ $warning }}
          </div>
        </div>
      </div>
      @endif
      <input type="hidden" name="staff_id" value="{{UserInfo()->id}}" />
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <form role="form" action="{{route('staff.shift.register.post')}}" method="post">
              {{csrf_field()}}
              <div class="card-body">
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <th>Buổi</th>
                      @foreach($dayofweek as $d => $dow)
                      <th>{{ $dow }} <br> ({{DateFormat($next_days[$d])}})</th>
                      @endforeach
                    </tr>
                    @foreach($sessionofday as $s => $sod)
                    <tr>
                      <td>{{ $sod }}</td>
                      @foreach($next_days as $d => $day)
                      <td>
                        <div class="form-group">
                          <label>
                            <input type="hidden" name="checkbox[{{$d}}][{{$s}}]" class="minimal" value="0">
                            <input type="checkbox" name="checkbox[{{$d}}][{{$s}}]" class="minimal" value="1" @if(isset($next_shifts[$s][$day])) checked @endif >
                            Đăng ký
                          </label>
                        </div>
                      </td>
                      @endforeach
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary pull-right">Lưu lịch làm</button>
            </div>
            </form>
          </div>
        </div>
      </div>
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
<script language="JavaScript" type="text/javascript" src="{{ asset('/plugins/ckeditor/ckeditor.js')}}"></script>
<script language="JavaScript" type="text/javascript" src="{{ asset('/plugins/iCheck/icheck.min.js')}}"></script>
<script>
  $(function() {
    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    })
  })
</script>
@stop