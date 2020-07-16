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
    <th>Tên khoá</th>
    <th>Ngày khai giảng</th>
    <th>Số lượng</th>
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