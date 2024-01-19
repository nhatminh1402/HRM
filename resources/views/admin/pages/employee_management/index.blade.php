@extends('admin.layouts.app')

@section('title', 'Position')

@section('css')

@endsection

@section('script')
    <script src="{{ asset('assets/js/delete-position.js') }}"></script>
@endsection

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
                <button class="btn btn-success text-white">
                    <svg class="mb-1 me-2" xmlns="http://www.w3.org/2000/svg" height="16" width="14"
                        viewBox="0 0 448 512">
                        <path
                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"
                            fill="white"></path>
                    </svg>Thêm chức vụ
                </button>
            </form>
        </div>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h3 class="h3">Danh sách chức vụ </h3>
            </div>
            <form class="navbar-search w-25 mb-4" id="navbar-search-main"
                action="{{ route('admin.employee.search-position') }}" method="GET">
                <div class="input-group input-group-merge search-bar">
                    <span class="input-group-text" id="topbar-addon">
                        <svg class="icon icon-xs" x-description="Heroicon name: solid/search"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </span>
                    <input type="text" name="key" value="{{ request()->key }}" class="form-control"
                        id="topbarInputIconLeft" placeholder="Tìm kiếm theo tên chức vụ" aria-label="Search"
                        aria-describedby="topbar-addon">
                </div>
            </form>
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
                        @if ($positions->isEmpty())
                            <td colspan="9" class="text-lg-center w-100">Không tìm thấy chức vụ !</td>
                        @else
                            @foreach ($positions as $key => $position)
                                <tr>
                                    <td class='text-center'>{{ $key + 1 }}</td>
                                    <td class='text-center'>{{ $position->code_position }}</td>
                                    <td class='text-center'>{{ $position->name }}</td>
                                    <td class='text-center'>{{ $position->salary_day }}</td>
                                    <td class='text-center'>{{ $position->description ?? 'Chưa có mô tả' }}</td>
                                    <td class='text-center'>{{ $position->created_at }}</td>
                                    <td class='text-center'>{{ $position->updated_at }}</td>
                                    <td class='text-center'>
                                        <a class="btn btn-warning"
                                            href="{{ route('admin.employee.edit-position', ['id' => $position->id, 'page' => $pageNumber]) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4
                                                        24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4
                                                        6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15
                                                        19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4
                                                        22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1
                                                        373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0
                                                        88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40
                                                        40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"
                                                    fill="#fff" />
                                            </svg>
                                        </a>
                                    </td>
                                    <td class='text-center'>
                                        <form id="form-delete"
                                            action="{{ route('admin.employee.position.destroy', $position->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14"
                                                    viewBox="0 0 448 512">
                                                    <path
                                                        d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3
                                                        32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2
                                                        6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"
                                                        fill="#fff" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
                {{ $positions->appends(request()->only('key'))->links() }}
            </div>
        </div>
    </div>
@endsection
