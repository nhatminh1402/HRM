@extends('admin.layouts.app')

@section('title', 'Edit Discipline')

@section('content')
    <h2 class="mt-4 mb-4 pb-2 border-bottom text-primary">Sửa loại kỷ luật</h2>
    <div class="row ml-4 w-100">
        <div class="col-12 mb-4">
            <form action="{{ route('admin.discipline.update', ['id' => $discipline->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="code_discipline" class="form-label mb-2 font-weight-bold">Mã kỷ luật</label>
                    <input type="text" name="code_discipline" class="form-control" value="{{ $discipline->code_discipline }}"
                        readonly disabled>
                    @error('code_discipline')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label mb-2 font-weight-bold">Tên loại kỷ luật</label>
                    <input type="text" name="name" class="form-control" id="name"
                        value="{{ old('name', $discipline->name) }}">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label mb-2 font-weight-bold">Mô tả</label>
                    <textarea name="description" class="form-control" id="description" rows="50" cols="50">{{ (old('description', $discipline->description)) }}</textarea>
                </div>
                <input type="hidden" name="page" value="{{ $pageNumber }}">
                <button class="btn btn-success">Lưu lại</button>
            </form>
        </div>
    </div>
@endsection
