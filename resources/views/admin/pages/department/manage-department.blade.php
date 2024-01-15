@extends('admin.layouts.app')
@section('title', 'Department manage')
@section('content')
    @if (!empty($department))
        <h2 class="mb-4 pb-2 border-bottom text-primary">Phòng ban: {{ $department->name }}</h2>
        <div class="row ml-4">
            <div class="col-12 mb-4">
                <form action="{{ route('admin.department.update', $department->id )}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="code" class="form-label mb-2 font-weight-bold">Mã phòng ban
                        </label>
                        <input type="text" name="code" value="{{ $department->code_department ?? null }}"
                            class="form-control" id="code" disabled >
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
                        <textarea name="description" class="form-control" value=""   id="description" rows="50" cols="50">{{ old('name', $department->description) }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label mb-2 font-weight-bold" value="{{ old('name') }}">Chọn nhân
                            viên</label>
                        <select class="form-select mb-0">
                            <option selected>Chọn nhân viên</option>
                            <option value="1">PB2153232001-Trương Văn Phước</option>
                            <option value="2">PB2153232001-Trương Văn Phước</option>
                            <option value="3">PB2153232001-Trương Văn Phước</option>
                        </select>
                    </div>
                    <button class="btn btn-success"    > <svg class="icon icon-xs me-2" fill="none" stroke="currentColor"
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
                            <tr>
                                <td class='text-center'>1</td>
                                <td class='text-center'>NV001</td>
                                <td class='text-center'>
                                    <img class="image image-md" alt="Image placeholder"
                                        src="https://chuphinhthe.com/upload/product/1824-quan-3112.jpg">
                                </td>
                                <td class='text-center'>John Doe</td>
                                <td class='text-center'>Nam</td>
                                <td class='text-center'>1990</td>
                                <td class='text-center'>Nhân viên HR</td>
                                <td class='text-center'>2021-10-3</td>
                                <td class='text-center'>Đang làm việc</td>
                                <td class='text-center'>
                                    <a href="" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td class='text-center'>1</td>
                                <td class='text-center'>NV001</td>
                                <td class='text-center'>
                                    <img class="image image-md" alt="Image placeholder"
                                        src="https://chuphinhthe.com/upload/product/1824-quan-3112.jpg">
                                </td>
                                <td class='text-center'>John Doe</td>
                                <td class='text-center'>Nam</td>
                                <td class='text-center'>1990</td>
                                <td class='text-center'>Nhân viên HR</td>
                                <td class='text-center'>2021-10-3</td>
                                <td class='text-center'>Đang làm việc</td>
                                <td class='text-center'>
                                    <a href="" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
@endsection
