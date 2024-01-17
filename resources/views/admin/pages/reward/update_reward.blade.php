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
                <form action="{{ route('admin.reward.update', $reward->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="mb-3">
                            <label class="form-label">MÃ KHEN THƯỞNG</label>
                            <input name="code_reward" type="text"
                                class="form-control {{ $errors->has('code_reward') ? 'is-invalid' : '' }}"
                                value="{{ $reward->code_reward }}" readonly>
                            @error('code_reward')
                                <div class="invalid-feedback"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">TÊN KHEN THƯỞNG</label>
                            <input name="name" type="text"
                                class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                value="{{ old('name', $reward->name) }}">
                            @error('name')
                                <div class="invalid-feedback"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label mb-2 font-weight-bold">Mô tả</label>
                            <textarea name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description"
                                rows="50" cols="50"> {!! old('name', $reward->description) !!}</textarea>
                            @error('description')
                                <div class="invalid-feedback"> {{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success">CẬP NHẬT</button>
                    </div>
                </form>
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
