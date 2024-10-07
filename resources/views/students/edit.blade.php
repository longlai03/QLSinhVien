@extends('students.master')

@section('content')

<div class="card">
    <div class="card-header">Sửa thông tin học sinh</div>
    <div class="card-body">
        <form method="post" action="{{ route('students.update', $student->id) }}" enctype="multipart/form-data">
            @csrf
            @method ('PUT')
            <div class=" row mb-3">
                <label class="col-sm-2 col-label-form">Họ</label>
                <div class="col-sm-10">
                    <input type="text" name="first_name" class="form-control" value="{{ $student->first_name }}" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Tên</label>
                <div class="col-sm-10">
                    <input type="text" name="last_name" class="form-control" value="{{ $student->last_name }}" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Ngày sinh</label>
                <div class="col-sm-10">
                    <input type="date" name="date_of_birth" class="form-control" value="{{ $student->date_of_birth }}" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">SDT phụ huynh</label>
                <div class="col-sm-10">
                    <input type="text" name="partent_phone" class="form-control" value="{{ $student->partent_phone }}" />
                </div>
            </div>
            <div class="mb-3">
                <label for="class_id" class="form-label">Lớp</label>
                <select id="class_id" class="form-select" name="class_id" required>
                    @foreach ($classes as $class)
                    <option value="{{ $class->class_id }}" @if ($class->id == $student->class_id) selected @endif>
                        {{ $class->grade_level }} {{$class->room_number}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="text-center">
                <input type="hidden" name="hidden_id" value="{{ $student->id }}" />
                <a href="{{ route('students.index') }}" class="btn btn-secondary">Quay lại</a>
                <input type="submit" class="btn btn-primary" value="Sửa" />
            </div>
        </form>
    </div>
</div>
@endsection('content')
