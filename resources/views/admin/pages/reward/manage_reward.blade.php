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
                <form action="{{ route('admin.reward.store') }}" method="POST">
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
                        <h5 id="list-reward">DANH SÁCH LOẠI KHEN THƯỞNG</h5>
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
                            @php
                                $allParams = request()->all();
                                $allParams['id'] = $reward->id;
                            @endphp
                            <tr>
                                <td>{{ $reward->code_reward }}</td>
                                <td>{{ $reward->name }}</td>
                                <td>{!! empty($reward->description) ? 'CHƯA CÓ MÔ TẢ' : $reward->description !!}</td>
                                <td>{{ $reward->created_at }}</td>
                                <td>{{ $reward->updated_at }}</td>
                                <td class="text-center d-flex jusitfy-content-center">
                                    <a href="{{ route('admin.reward.show', $allParams) }}">
                                        <button class="btn btn-warning me-3">Sửa</button>
                                    </a>
                                    <form action="{{ route('admin.reward.delete', $reward->id) }}" method="post">
                                        @csrf
                                        <button class="btn btn-delete btn-danger" type="button">Xóa</button>
                                    </form>
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

@section('script')
    <script src="{{ asset('js/manage_reward.js') }}"></script>
    @if (session('success'))
        <script>
            const listReward = document.getElementById("list-reward");
            listReward.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        </script>
    @endif
@endsection
