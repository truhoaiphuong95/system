<head>
<style>table, th, td {
  border: 1px solid black;
}
</style>
</head>

@foreach($groups as $group)
<h2>{{$group->name}}</h2>
<table style="width:100%">
  <tr>
    <th>TÊN KHÁCH HÀNG</th>
    <th>NGÀY NHẬN</th>
    <th>THỜI GIAN THIẾT KẾ</th>
  </tr>
  @foreach($group->courses as $course)
  <tr>
    <td>{{$group->courses[$i]->name}}</td>
    <td>{{$course->opening_at}}</td>
    <td>{{$course->sumDone()}}</td>
  </tr>
  @endforeach
</table>

@endforeach