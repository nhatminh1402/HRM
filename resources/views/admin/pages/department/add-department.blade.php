@extends('admin.layouts.app')
@section('title', 'Add Department')
@section('content')
    <h2 class="mb-4 pb-2 border-bottom text-primary">Tạo phòng ban</h2>
    <div class="row ml-4">
        <div class="col-12 mb-4">
            <form action="{{ route('admin.department.post_add') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label mb-2 font-weight-bold">Tên phòng
                        ban</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" id="name">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label mb-2 font-weight-bold">Mô tả</label>
                    <textarea name="description" class="form-control" id="description" rows="50" cols="50">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-success" type="submit"> <svg class="icon icon-xs me-2" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>Thêm phòng ban</button>
            </form>
        </div>
    </div>
    <div class="row ml-4">
        <h2 class="mb-4 pb-2  text-primary">Phòng ban</h2>
        <div class="card">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start text-center">STT</th>
                            <th class="border-0  text-center">Mã phòng ban</th>
                            <th class="border-0  text-center">Tên phòng ban</th>
                            <th class="border-0  text-center">Mô tả</th>
                            <th class="border-0  text-center">Người tạo</th>
                            <th class="border-0  text-center">Ngày tạo</th>
                            <th class="border-0  text-center">Ngày sửa</th>
                            <th class="border-0  text-center">Sửa</th>
                            <th class="border-0  text-center rounded-end">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($departments))
                            @foreach ($departments as $key => $department)
                                <tr>
                                    <td class='text-center'>{{ $key + 1 }}</td>
                                    <td class='text-center'>{{ $department->code_department }}</td>
                                    <td class='text-center'>{{ $department->name }}</td>
                                    <td class='text-center'>{{ $department->description }}</td>
                                    <td class='text-center'>Admin</td>
                                    <td class='text-center'>{{ $department->created_at }}</td>
                                    <td class='text-center'>{{ $department->updated_at }}</td>


                                    <td class='text-center'>
                                        <a href="{{ route('admin.department.detail', $department->id) }}"
                                            class="btn btn-warning">Sửa</a>
                                    </td>
                                    <td class='text-center'>
                                        <form method="POST"
                                            action="{{ route('admin.department.delete', $department->id) }}"
                                            onSubmit="return confirm('Do you want to Deparment {{ $department->name }}?')">
                                            @csrf 
                                            @method('DELETE')
                                            <button class="btn btn-danger">Xóa </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                {{ $departments->links() }}
            </div>
        </div>
    </div>
@endsection
