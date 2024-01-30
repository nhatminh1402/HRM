@extends('admin.layouts.app')
@section('title', 'Department manage')
@section('page-title')
    PHÒNG BAN: {{ $department->name }}
@endsection
@section('css')
    <link href="{{ asset('lib/select/dist/css/select2.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('lib/select/dist/js/select2.min.js') }}"></script>
@endsection
@section('content')
    @if (!empty($department))
        <div class="row ml-4">
            <div class="col-12 mb-4">
                <form action="{{ route('admin.department.update', $department->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="code" class="form-label mb-2 font-weight-bold">Mã phòng ban
                        </label>
                        <input type="text" name="code" value="{{ $department->code_department ?? null }}"
                            class="form-control" id="code" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label mb-2 font-weight-bold" value="{{ old('name') }}">Tên phòng
                            ban</label>
                        <input type="text" name="name" value="{{ old('name', $department->name) }}"
                            class="form-control" id="name">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label mb-2 font-weight-bold">Mô tả</label>
                        <textarea name="description" class="form-control" value="" id="description" rows="5" cols="10">{{ old('name', $department->description) }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label mb-2 font-weight-bold" value="{{ old('name') }}">Chọn
                            nhân
                            viên</label>
                        <select id="selected_employees" name="id_employee[]"
                            class="form-control js-example-basic-multiple-limit" multiple>
                            @foreach ($employeesHaveDeparmentNull as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->full_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-success"> <svg class="icon icon-xs me-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>Cập nhật</button>
                </form>
            </div>
        </div>
        <div class="row ml-4">
            <h2 class="mb-4 pb-2  text-primary">Nhân viên trong phòng ban</h2>
            <div class="card">
                <table class="table table-bordered table-centered ">
                    <thead class="border">
                        <tr class="table border">
                            <th class="rounded-start text-center">STT</th>
                            <th class="text-center">Mã nhân viên</th>
                            <th class="text-center">Tên nhân viên</th>
                            <th class="text-center">Giới tính</th>
                            <th class="text-center">Ngày sinh</th>
                            <th class="text-center">Chức vụ</th>
                            <th class="text-center">Ngày thêm</th>
                            <th class="text-center rounded-end">Tình trạng</th>
                            <th class="text-center rounded-end">Action</th>


                        </tr>
                    </thead>
                    <tbody>
                        @if ($employees->isEmpty())

                            <td colspan="9" class="text-lg-center w-100">Không có nhân viên nào trong phòng ban !
                            </td>
                        @else
                            @foreach ($employees as $key => $employee)
                                <tr>
                                    <td class='text-center'>{{ $key + 1 }}</td>
                                    <td class='text-center'>{{ $employee->code_employee }}</td>
                                    <td class='text-center'>{{ $employee->full_name }}</td>
                                    <td class='text-center'>
                                        @if ($employee->gender == 1)
                                            Nam
                                        @else
                                            Nữ
                                        @endif
                                    </td>
                                    <td class='text-center'>{{ $employee->dob}}</td>
                                    <td class='text-center'>{{ $employee->position->name ?? '' }}</td>
                                    <td class='text-center'>{{ $employee->created_at->format('d-m-Y') }}</td>
                                    <td class='text-center'>{{ $employee->status ? 'Đang làm viêc' : 'Đã nghĩ việc' }}
                                    </td>
                                    <td class='text-center'>
                                        <a class="btn btn-delete"
                                            href="{{ route('admin.department.deleteEmployee', $employee->id) }}"
                                            class="btn btn-danger"> <svg xmlns="http://www.w3.org/2000/svg" height="20"
                                                width="20" viewBox="0 0 448 512">
                                                <path
                                                    d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3
                                                                                        32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2
                                                                                        6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"
                                                    fill="red" />
                                            </svg></a>
                                    </td>

                                </tr>
                            @endforeach

                        @endif
                    </tbody>
                </table>
                {{ $employees->links() }}
            </div>
        </div>
    @endif

@endsection
@section('script')
    <script src="{{ asset('assets/js/delete-employee-department.js') }}"></script>
@endsection
