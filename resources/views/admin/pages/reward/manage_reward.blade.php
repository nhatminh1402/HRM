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
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="bg-white rounded shadow p-3 mb-4 mt-4">
                <div class="row">
                    <div class="col-12 col-md-4 col-xl-6 mb-4 mb-md-0">
                        <p style="font-size: 22px; font-weight: bold" class="mb-0 text-center  text-lg-start">QUẢN LÝ LOẠI
                            KHEN THƯỞNG
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="bg-white rounded shadow p-3 mb-4 mt-4">
                <form action="{{ route('admin.reward.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="mb-3">
                            <label class="form-label">MÃ KHEN THƯỞNG</label>
                            <input name="code_reward" type="text"
                                class="form-control {{ $errors->has('code_reward') ? 'is-invalid' : '' }}"
                                value="{{ $rewardCode }}" readonly>
                            @error('code_reward')
                                <div class="invalid-feedback"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">TÊN KHEN THƯỞNG</label>
                            <input name="name" type="text"
                                class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label mb-2 font-weight-bold">Mô tả</label>
                            <textarea value="{{ old('description') }}" name="description"
                                class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description" rows="50"
                                cols="50"></textarea>
                            @error('description')
                                <div class="invalid-feedback"> {{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success">THÊM MỚI</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="bg-white rounded shadow p-3 mb-4 mt-4">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h5>DANH SÁCH LOẠI KHEN THƯỞNG</h5>
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
                            <th scope="col">MÃ KHEN THƯỞNG</th>
                            <th scope="col">TÊN KHEN THƯỞNG</th>
                            <th scope="col">MÔ TẢ</th>
                            <th scope="col">NGÀY TẠO</th>
                            <th scope="col">NGÀY SỬA</th>
                            <th scope="col">THAO TÁC</th>
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
                                    <a href="">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                        </svg>
                                    </a>
                                    <a href="">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14"
                                            viewBox="0 0 448 512">
                                            <path
                                                d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                        </svg>
                                    </a>
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
@endsection
