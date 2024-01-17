@extends('admin.layouts.app')
@section('title', 'Department manage')
@section('content')
    @if (!empty($department))
        <h2 class="mb-4 pb-2 border-bottom text-primary">Phòng ban: {{ $department->name }}</h2>
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
                        <textarea name="description" class="form-control" value="" id="description" rows="50" cols="50">{{ old('name', $department->description) }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label mb-2 font-weight-bold" value="{{ old('name') }}">Chọn nhân
                            viên</label>
                        <select class="form-select mb-0" name="id_employee">
                            <option value="">Chọn nhân viên</option>
                            @if (!empty($employeesHaveDeparmentNull))
                                @foreach ($employeesHaveDeparmentNull as $employee)
                                    <option value="{{ $employee->id }}">
                                        {{ $employee->code_employee . '-' . $employee->full_name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <button class="btn btn-success"> <svg class="icon icon-xs me-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>Thêm nhân viên</button>
                </form>
            </div>
        </div>
        <div class="row ml-4">
            <h2 class="mb-4 pb-2  text-primary">Nhân viên trong phòng ban</h2>
            <div class="card">
                <div class="table-responsive">

                    <table class="table table-centered table-nowrap mb-0 rounded">
                        <tr>
                            <th class="border-0 rounded-start text-center">STT</th>
                            <th class="border-0  text-center">Mã nhân viên</th>
                            <th class="border-0  text-center">Ảnh</th>
                            <th class="border-0  text-center">Tên nhân viên</th>
                            <th class="border-0  text-center">Giới tính</th>
                            <th class="border-0  text-center">Năm sinh</th>
                            <th class="border-0  text-center">Chức vụ</th>
                            <th class="border-0  text-center">Ngày thêm</th>
                            <th class="border-0  text-center">Trạng thái</th>
                            <th class="border-0  text-center rounded-end">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if (!empty($employees))
                                @foreach ($employees as $key => $employee)
                                    <tr>
                                        <td class='text-center'>{{ $key + 1 }}</td>
                                        <td class='text-center'>{{ $employee->code_employee }}</td>
                                        <td class='text-center'>
                                            <img class="image image-md" alt="Image placeholder"
                                                src="/uploads/{{ $employee->image }}">
                                        </td>
                                        <td class='text-center'>{{ $employee->full_name }}</td>
                                        <td class='text-center'>{{ $employee->gender ? 'Name' : 'Nữ' }}</td>
                                        <td class='text-center'>{{ $employee->dob }}</td>
                                        <td class='text-center'>{{ $employee->department->name ?? '' }}</td>
                                        <td class='text-center'>{{ $employee->created_at->format('Y-m-d') }}</td>
                                        <td class='text-center'>{{ $employee->status ? 'Đang làm viêc' : 'Đã nghĩ việc' }}
                                        </td>
                                        <td class='text-center'>
                                            <a class="btn btn-danger btn-delete"
                                                href="{{ route('admin.department.deleteEmployee', $employee->id) }}"
                                                class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg"
                                                    height="16" width="14" viewBox="0 0 448 512">
                                                    <path
                                                        d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3
                                                                                            32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2
                                                                                            6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"
                                                        fill="#fff" />
                                                </svg></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

@endsection
@section('script')
    <script src="{{ asset('assets/js/delete-employee-department.js') }}"></script>
@endsection
