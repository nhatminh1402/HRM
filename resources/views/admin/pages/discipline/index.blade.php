@extends('admin.layouts.app')

@section('title', 'Discipline')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/manager-discipline.css') }}">
@endsection

@section('script')
    <script src="{{ asset('assets/js/delete-discipline.js') }}"></script>
    <script src="{{ asset('assets/js/create-discipline.js') }}"></script>
    <script src="{{ asset('assets/js/edit-discipline.js') }}"></script>
    <script>
        const CREATE_DISCIPLINE_URL = '{{ route('admin.discipline.store') }}';
        const UPDATE_DISCIPLINE_URL = '{{ route('admin.discipline.update') }}';
        const GET_DISCIPLINE_URL = '{{ route('admin.discipline.edit') }}';
    </script>
@endsection

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <div class="row ml-4 bg-white rounded shadow p-3 mb-4">
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h3 class="h3 mb-4">Danh sách kỷ luật </h3>
                <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal"
                    data-bs-target="#create-discipline">
                    <svg class="mb-1 me-2" xmlns="http://www.w3.org/2000/svg" height="16" width="14"
                        viewBox="0 0 448 512">
                        <path
                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"
                            fill="white"></path>
                    </svg>Thêm mới
                </button>
            </div>
            <form class="navbar-search w-25 mt-5" id="navbar-search-main" action="{{ route('admin.discipline.search') }}"
                method="GET">
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
                        id="topbarInputIconLeft" placeholder="Tìm kiếm theo tên kỷ luật" aria-label="Search"
                        aria-describedby="topbar-addon">
                </div>
            </form>
        </div>
        <div class="card border-0">
            <div class="table-responsive">
                <table class="table table-bordered mb-3 table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">STT</th>
                            <th class="text-start">Mã kỷ luật</th>
                            <th class="text-start">Tên kỷ luật</th>
                            <th class="text-start">Mô tả</th>
                            <th class="text-start">Ngày tạo</th>
                            <th class="text-start">Ngày sửa</th>
                            <th class="text-center" colspan="2">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($disciplines->isEmpty())
                            <td colspan="9" class="text-lg-center w-100">Không tìm thấy loại kỷ luật!</td>
                        @else
                            @foreach ($disciplines as $key => $discipline)
                                <tr>
                                    <td class='align-middle text-center'>{{ $key + 1 }}</td>
                                    <td class='align-middle text-start'>{{ $discipline->code_discipline }}</td>
                                    <td class='align-middle text-start text-name'>{{ $discipline->name }}</td>
                                    <td class='align-middle text-start text-area'>
                                        {{ e($discipline->description ?? 'Chưa có mô tả') }}
                                    </td>
                                    <td class='align-middle text-start'>
                                        {{ date('d/m/Y', strtotime($discipline->created_at)) }}
                                    </td>
                                    <td class='align-middle text-start'>
                                        {{ date('d/m/Y', strtotime($discipline->updated_at)) }}
                                    </td>
                                    <td class='text-center'>
                                        <div class="d-flex justify-content-center">
                                            <button class="btn border-0 btn-update" data-bs-toggle="modal"
                                                data-id="{{ $discipline->id }}" data-bs-target="#update-discipline">
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
                                            </button>
                                            <form id="form-delete-discipline"
                                                action="{{ route('admin.discipline.destroy', $discipline->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-delete-discipline"><svg
                                                        xmlns="http://www.w3.org/2000/svg" height="20" width="20"
                                                        viewBox="0 0 448 512">
                                                        <path
                                                            d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3
                                                                    32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2
                                                                    6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"
                                                            fill="red" />
                                                    </svg></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                {{ $disciplines->appends(request()->only('key'))->links() }}
            </div>
        </div>
        <!--Start Modal Create -->
        <div class="modal fade" id="create-discipline" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Thêm mới kỷ luật</h5>
                        <button type="submit" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.discipline.store') }}" method="POST" class="mb-4">
                            <div class="row ml-4">
                                @csrf
                                <input type="text" class="form-control d-none" name="code_discipline"
                                    id="code_discipline" value="{{ $disciplineCode }}" readonly disabled>
                                <div class="col-12 mb-3">
                                    <label for="name" class="form-label mb-2 font-weight-bold">Tên kỷ luật<span
                                            class="text-danger">*</span>:</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        value="{{ old('name') }}">
                                    <div class="text-danger" id="error_name"></div>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="description" class="form-label mb-2 font-weight-bold">Mô tả</label>
                                    <textarea name="description" class="form-control" id="description" rows="3" cols="3">{{ strip_tags(old('description')) }}</textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="button" class="btn btn-primary" id="add-discipline-btn">Thêm kỷ luật</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Create -->

        <!-- Start Modal Udpate -->
        <div class="modal fade" id="update-discipline" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Sửa kỷ luật</h5>
                        <button type="submit" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if (isset($discipline))
                            <form class="row" action="{{ route('admin.discipline.update') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="discipline_id" id="discipline_id"
                                    value="{{ $discipline->id }}">
                                <input type="text" id="code_discipline_update" name="code_discipline_update"
                                    class="form-control d-none">
                                <div class="col-12 mb-3">
                                    <label for="name" class="form-label mb-2 font-weight-bold">Tên loại kỷ
                                        luật<span class="text-danger">*</span>:</label>
                                    <input type="text" name="name_update" class="form-control" id="name_update"
                                        value="{{ old('name_update') }}">
                                    <div class="text-danger" id="error_name_update"></div>
                                    @error('name_update')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label mb-2 font-weight-bold">Mô tả</label>
                                    <textarea name="description_update" class="form-control" id="description_update" rows="3" cols="3">{{ strip_tags(old('description')) }}</textarea>
                                </div>
                                <input type="hidden" id="page_number_input" name="page"
                                    value="{{ $pageNumber }}">
                            </form>
                        @else
                            <div class="alert alert-danger">Không tìm thấy loại kỷ luật!</div>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="button" class="btn btn-primary" id="update-discipline-btn">Lưu lại</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Udpate -->
    @endsection
