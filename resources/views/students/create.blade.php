@extends ('students.master')
@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card">
    <div class="card-header">Thêm học sinh mới</div>
    <div class="card-body">
        <form method="post" action="{{ route('students.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Họ</label>
                <div class="col-sm-10">
                    <input type="text" name="first_name" class="form-control" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Tên</label>
                <div class="col-sm-10">
                    <input type="text" name="last_name" class="form-control" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Ngày sinh</label>
                <div class="col-sm-10">
                    <input type="date" name="date_of_birth" class="form-control" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">SDT phụ huynh</label>
                <div class="col-sm-10">
                    <input type="number" name="parent_phone" class="form-control" />
                </div>
            </div>
            <div class="mb-3">
                <label for="class_id" class="form-label">Chọn cấp lớp</label>
                <select id="class_id" class="form-select" name="class_id" required>
                    @foreach($classes as $class)
                    <option value="{{$class->id}}">{{$class->grade_level}} {{$class->room_number}}</option>
                    <!-- <option value="{{$class->id}}"></option> -->
                    @endforeach
                </select>
            </div>
            <div class="text-center">
                <a href="{{ route('students.index') }}" class="btn btn-secondary">Quay lại</a>
                <input type="submit" class="btn btn-primary" value="Thêm" />
            </div>
        </form>
    </div>
</div>

@endsection('content')