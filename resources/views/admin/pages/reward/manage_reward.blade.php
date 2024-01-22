@extends('admin.layouts.app')
@section('title', 'THÊM LOẠI KHEN THƯỞNG')

@section('css')
    <style>
        .card-header:hover {
            box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px;
        }

        .card-header {
            transition: all ease-out 0.1s;
        }
    </style>
@endsection

@section('page-title', 'QUẢN LÝ LOẠI KHEN THƯỞNG')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="bg-white rounded shadow p-3 mb-4 mt-4">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            THÊM MỚI
                        </button>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group d-flex justify-content-end">
                            <span class="input-group-text">
                                <svg class="icon icon-xs" x-description="Heroicon name: solid/search"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <form method="get" action="{{ route('admin.reward.index') }}">
                                <input name="keySearch" value="{{ request()->keySearch }}" type="text"
                                    class="form-control" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div>
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">MÃ KHEN THƯỞNG</th>
                            <th class="text-center" scope="col">TÊN KHEN THƯỞNG</th>
                            <th class="text-center" scope="col">MÔ TẢ</th>
                            <th class="text-center" scope="col">NGÀY TẠO</th>
                            <th class="text-center" scope="col">NGÀY SỬA</th>
                            <th class="text-center" scope="col">THAO TÁC</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listRewards as $reward)
                            <tr>
                                <td>{{ $reward->code_reward }}</td>
                                <td>{{ $reward->name }}</td>
                                <td>{!! empty($reward->description) ? 'CHƯA CÓ MÔ TẢ' : $reward->description !!}</td>
                                <td>{{ $reward->created_at }}</td>
                                <td>{{ $reward->updated_at }}</td>
                                <td class="text-center">
                                    <div class="d-flex ">
                                        <a href="{{ route('admin.reward.edit', $reward->id) }}">
                                            <button class="btn btn-warning me-3">Sửa</button>
                                        </a>
                                        <form action="{{ route('admin.reward.delete', $reward->id) }}" method="post">
                                            @csrf
                                            <button class="btn btn-delete btn-danger" type="button">Xóa</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        @if ($listRewards->isEmpty())
                            <td style="font-size: 20px" colspan="6" class="text_center p-3">KHÔNG CÓ DỮ LIỆU ĐỂ HIỂN THỊ
                            </td>
                        @endif
                    </tbody>
                </table>

                {{ $listRewards->appends(request()->all())->links() }}
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade modal-add-reward" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">THÊM MỚI LOẠI KHEN THƯỞNG</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bg-white rounded shadow p-3 mb-4 mt-4">
                                @csrf
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label">TÊN KHEN THƯỞNG</label>
                                        <input name="name" type="text" class="form-control">
                                        <div class="err-area"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label mb-2 font-weight-bold">Mô tả</label>
                                        <textarea name="description" class="form-control" id="description" rows="10" cols="5"></textarea>
                                        <div class="err-area"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="btn-submit" type="button" class="btn btn-primary">THÊM</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/ckeditor5-build-classic/ckeditor.js') }}"></script>
    <script type="module" src="{{ asset('js/manage_reward.js') }}"></script>
@endsection
