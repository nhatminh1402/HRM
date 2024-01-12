@extends('admin.layouts.app')

@section('title', 'Position')

@section('content')
    <h2 class="mt-3 mb-4 pb-2 border-bottom text-primary">Chức vụ</h2>
    <div class="row ml-4">
        <div class="col-12 mb-4">
            <form action="{{ route('admin.employee.positions.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="code_position" class="form-label mb-2 font-weight-bold">Mã chức vụ</label>
                    <input type="text" class="form-control" name="code_position" id="code_position"
                        value="{{ $employeeCode }}" readonly disabled>
                    @error('code_position')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label mb-2 font-weight-bold">Tên chức vụ</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="salary_day" class="form-label mb-2 font-weight-bold">Lương ngày</label>
                    <input type="number" class="form-control" id="salary_day" name="salary_day"
                        value="{{ old('salary_day') }}">
                    @error('salary_day')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label mb-2 font-weight-bold">Mô tả</label>
                    <textarea name="description" class="form-control" id="description" rows="50" cols="50">{{ strip_tags(old('description')) }}</textarea>
                </div>
                <button class="btn btn-success">Thêm chức vụ</button>
            </form>
        </div>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h3 class="h3">Danh sách chức vụ </h3>
            </div>
        </div>
        <div class="card">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start text-center">STT</th>
                            <th class="border-0  text-center">Mã chức vụ</th>
                            <th class="border-0  text-center">Tên chức vụ</th>
                            <th class="border-0  text-center">Lương ngày</th>
                            <th class="border-0  text-center">Mô tả</th>
                            <th class="border-0  text-center">Ngày tạo</th>
                            <th class="border-0  text-center">Ngày sửa</th>
                            <th class="border-0  text-center rounded-end">Sửa</th>
                            <th class="border-0  text-center rounded-end">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($positions as $key => $position)
                            <tr>
                                <td class='text-center'>{{ $key + 1 }}</td>
                                <td class='text-center'>{{ $position->code_position }}</td>
                                <td class='text-center'>{{ $position->name }}</td>
                                <td class='text-center'>{{ $position->salary_day }}</td>
                                <td class='text-center'>{{ $position->description }}</td>
                                <td class='text-center'>{{ $position->created_at }}</td>
                                <td class='text-center'>{{ $position->updated_at }}</td>
                                <td class='text-center'>
                                    <a href="{{ route('admin.employee.edit-position', $position->id) }}"
                                        class="btn btn-warning">Sửa</a>
                                </td>
                                <td class='text-center'>
                                    <form action="" method="POST"
                                        onsubmit="return confirm('Are you want to delete task?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
                {{ $positions->links() }}
            </div>
        </div>
    </div>
@endsection
