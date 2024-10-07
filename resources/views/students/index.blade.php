@extends ('students.master')
@section('content')
@if ($message = Session::get('success'))

<div class="alert alert-success">
    {{ $message }}
</div>
@endif
<div class="container mt-5">
    <h1 class="text-primary mt-3 mb-4 text-center"><b>Quản lý học sinh</b></h1>
</div>

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col col-md-6"> <b></b></div>
            <div class="col col-md-6">
                <a href="{{ route('students.create') }}" class="btn btn-success btn-sm float-end">Thêm học sinh mới</a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Mã học sinh </th>
                <th>Họ và tên </th>
                <th>Ngày sinh</th>
                <th>Số điện thoại phụ huynh </th>
                <!--<th>ClassID</th>-->
                <th>Cấp Lớp</th>
                <th>Phòng học</th>
                <th>Thao tác</th>
            </tr>
            @if(count($students) > 0)
            @foreach($students as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->first_name }} {{ $row->last_name}}</td>
                <td>{{ $row->date_of_birth }}</td>
                <!--<td>{{ $row->ClassRoomID }}</td>-->
                <td>{{ $row->parent_phone }}</td>
                <td>{{ $row->classes->grade_level }}</td>
                <td>{{ $row->classes->room_number }}</td>
                <td>
                    <form method="post" action="{{ route('students.destroy', $row->id) }}">
                        @csrf
                        @method('DELETE')
                        <a href=" {{ route('students.edit', $row->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <input type="submit" class="btn btn-danger btn-sm" value="Xoá" />
                    </form>
                </td>
            </tr>
            @endforeach

            @else
            <tr>
                <td colspan="5" class="text-center">No Data Found</td>
            </tr>
            @endif

        </table>
        {!! $students->links() !!}
    </div>
</div>
@endsection
