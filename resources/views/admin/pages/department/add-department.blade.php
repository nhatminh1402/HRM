@extends('admin.layouts.app')
@section('title', 'Add Department')
@section('page-title', 'TẠO PHÒNG BAN')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/create-department.css') }}">
    <link href="{{ asset('lib/select/dist/css/select2.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('lib/select/dist/js/select2.min.js') }}"></script>
@endsection
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <div class="row">
        <div class="col-md-12">
            <div class="bg-white rounded shadow p-3 mb-4 mt-4">
                <div class="mb-2 mb-lg-0">
                    <h4 class="mb-4">Danh sách phòng ban </h4>
                    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal"
                        data-bs-target="#create-deparment">
                        <svg class="mb-1 me-2" xmlns="http://www.w3.org/2000/svg" height="16" width="14"
                            viewBox="0 0 448 512">
                            <path
                                d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"
                                fill="white"></path>
                        </svg>Thêm phòng ban
                    </button>
                </div>
                <table class="table table-bordered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">STT</th>
                            <th class="text-start text-center">Mã chức vụ</th>
                            <th class="text-start text-center">Tên chức vụ</th>
                            <th class="text-start text-center">Mô tả</th>
                            <th class="text-start text-center">Ngày tạo</th>
                            <th class="text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($departments->isEmpty())
                            <td colspan="9" class="text-lg-center w-100">Chưa thấy phòng ban nào!</td>
                        @else
                            @foreach ($departments as $key => $department)
                                <tr>
                                    <td class='align-middle text-center'>{{ $key + 1 }}</td>
                                    <td class='align-middle text-start'>{{ $department->code_department }}</td>
                                    <td class='align-middle text-start'>{{ $department->name }}</td>
                                    <td class='align-middle text-start'>{{ $department->description }}</td>
                                    <td class='align-middle text-start'>{{ $department->created_at->format('d-m-Y') }}</td>
                                    <td class='text-center'>
                                        <div class="d-flex justify-content-center">
                                            <a class="btn border-0"
                                                href="{{ route('admin.department.detail', $department->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20"
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
                                                        fill="blue " />
                                                </svg>
                                            </a>
                                            <form id="formDeleteDeparment"
                                                action="{{ route('admin.department.delete', $department->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20"
                                                        viewBox="0 0 448 512">
                                                        <path
                                                            d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3
                                                                                            32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2
                                                                                            6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"
                                                            fill="red" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>

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
    {{-- Modal --}}
    <div class="modal fade" id="create-deparment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Thêm phòng ban</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.department.post_add') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label mb-2 font-weight-bold">Tên phòng
                                ban</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                id="name">
                            <div class="text-danger" id="error_name"></div>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label mb-2 font-weight-bold">Mô tả</label>
                            <textarea name="description" class="form-control border-5" id="description" rows="10" cols="50">{{ old('description') }}</textarea>
                            <div class="text-danger" id="error_description"></div>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 d-flex flex-column">
                            <label for="name" class="form-label mb-2 font-weight-bold"
                                value="{{ old('name') }}">Chọn
                                nhân
                                viên</label>
                            <select id="selected_employees" name="id_employee[]"
                                class="form-control js-example-basic-multiple-limit" multiple>
                                @foreach ($employeesHaveDeparmentNull as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->full_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary" id="add-department-btn">Phòng ban</button>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/js/delete-department.js') }}"></script>
@endsection
