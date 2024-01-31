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

        .text-area {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 150px;
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
                            <svg class="mb-1 me-2" xmlns="http://www.w3.org/2000/svg" height="16" width="14"
                                viewBox="0 0 448 512">
                                <path
                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"
                                    fill="white"></path>
                            </svg>THÊM MỚI
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
                                <input style="border-top-left-radius: 0%;border-bottom-left-radius: 0%; " name="keySearch"
                                    value="{{ request()->keySearch }}" type="text" class="form-control"
                                    placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">MÃ KHEN THƯỞNG</th>
                            <th class="text-center" scope="col">TÊN KHEN THƯỞNG</th>
                            <th class="text-center text-area" scope="col">MÔ TẢ</th>
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
                                <td class="text-area">
                                    {{ empty($reward->description) ? 'CHƯA CÓ MÔ TẢ' : $reward->description }}</td>
                                <td>{{ $reward->created_at }}</td>
                                <td>{{ $reward->updated_at }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <button class="btn-edit btn border-0 btn-update" data-bs-toggle="modal"
                                            data-bs-target="#modalUpdateReward" data-id="{{ $reward->id }}">
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
                                                    fill="blue "></path>
                                            </svg>
                                        </button>
                                        <form action="{{ route('admin.reward.delete', $reward->id) }}" method="post">
                                            @csrf
                                            <button type="button" class="btn btn-delete"><svg
                                                    xmlns="http://www.w3.org/2000/svg" height="20" width="20"
                                                    viewBox="0 0 448 512">
                                                    <path
                                                        d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3
                                                                                                                                                                                                                            32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2
                                                                                                                                                                                                                            6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"
                                                        fill="red">
                                                    </path>
                                                </svg>
                                            </button>
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
                <div id="modal-add-reward" class="modal-body">
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
                                        <textarea name="description" class="form-control" id="description" rows="3" cols="3"></textarea>
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
    <!-- Button trigger modal -->
    <div class="modal fade" id="modalUpdateReward" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog  modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">CẬP NHẬT THÔNG TIN</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        @csrf
                        <input type="text" name="id" hidden>
                        <label class="form-label">TÊN KHEN THƯỞNG</label>
                        <input name="name" type="text" class="form-control">
                        <div class="err-area"></div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label mb-2 font-weight-bold">Mô tả</label>
                        <textarea name="description" class="form-control" id="description" rows="5" cols="5"> </textarea>
                        <div class="err-area"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-submit-update">Save changes</button>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('script')
    <script type="module" src="{{ asset('js/manage_reward.js') }}"></script>
@endsection
