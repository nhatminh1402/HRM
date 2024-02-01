@extends('admin.layouts.app')

@section('title', 'Create Salary')

@section('css')

@endsection

@section('content')
    <h2 class="mb-4 mt-4 pb-2 border-bottom">Cập nhật lương nhân viên </h2>
    <div class="row ml-4">
        <div class="col-12 mb-4 ">
            <form class="row" action="{{ route('admin.salary.store') }}" method="POST">
                @csrf
                <div class="col-md-6 mb-3">
                    <label for="code_salary" class="form-label mb-2 font-weight-bold">Mã lương nhân
                        viên
                    </label>
                    <input type="text" value="{{ $salaryCode }}" name="code_salary" class="form-control"
                        id="code_salary" readonly disabled>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="count-workday" class="form-label mb-2 font-weight-bold">Số ngày công
                    </label>
                    <input type="text" name="count-workday" class="form-control" id="count-workday" disabled readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="employee" class="form-label mb-2 font-weight-bold">Chọn nhân viên<span
                            class="text-danger">*</span>:</label>
                    <select name="selected_employees" class="select-employees pb-2 d-flex form-control">
                        <option value="">--Chọn nhân viên--</option>
                        @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->full_name }}</option>
                        @endforeach
                    </select>
                    @error('selected_employees')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="created_at" class="form-label mb-2 font-weight-bold">Ngày tính
                        lương</label>
                    <input type="text" name="created_at" value="{{ $currentDate }}" class="form-control"
                        id="created_at" readonly disabled>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="description" class="form-label mb-2 font-weight-bold">Mô tả</label>
                    <textarea name="description" class="form-control" id="description" rows="3" cols="3">{{ old('description') }}</textarea>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-success text-white">
                        Lưu lại</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.select-employees').change(function() {
                var selectedEmployeeId = $(this).val();
                var selectedEmployeeWorkday = {!! json_encode($countWorkDaysString) !!};
                var countWorkDays = JSON.parse(selectedEmployeeWorkday);
                var workDays = countWorkDays[selectedEmployeeId];
                $('#count-workday').prop('value', workDays);
            });
        });
    </script>
@endsection
