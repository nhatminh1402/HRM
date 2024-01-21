@extends('user.layouts.base')

{{-- Định nghĩa tiêu đề --}}
@section('title', 'Time sheet')

@section('breadcrumb-item-after', 'Time sheet')
@section('breadcrumb-item-before', '')


{{-- Đinh nghĩa nội dung cho trang index ở đây --}}
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3"> Bảng chấm công </h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th colspan="8">
                                        <div class="input-group input-group-outline row">
                                            <div class="col-md-9">
                                            </div>
                                            <div class="col-md-3">
                                                <form action="{{ route('user.timesheet-user') }}" method="GET">
                                                    <label for="month">Month:</label>
                                                    <select name="month" id="month">
                                                        @for ($m = 1; $m <= 12; $m++)
                                                            <option value="{{ $m }}"
                                                                @if ($selectedMonth == $m) selected @endif>
                                                                {{ DateTime::createFromFormat('!m', $m)->format('F') }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                    <label for="year">Year:</label>
                                                    <select name="year" id="year">
                                                        @for ($y = 2020; $y <= 2030; $y++)
                                                            <option value="{{ $y }}"
                                                                @if ($selectedYear == $y) selected @endif>
                                                                {{ $y }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                    <button type="submit">Show</button>
                                                </form>
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                                <tr class="text-center">
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        NO.</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                        DATE</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                        DATE OF WEEK</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        NAME</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID EMPLOYEE</th>

                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        TIME CHECK IN</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        TIME CHECK OUT</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        WORKING TIME</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dates as $key => $date)
                                    <tr>
                                        <td class="text-center">
                                            <h6 style="margin-left: 20px" class="mb-0">{{ $key + 1 }}</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6 style="margin-left: 20px" class="mb-0">
                                                {{ $date['date']->format('Y-m-d') }}</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6 style="margin-left: 20px"
                                                class="mb-0 {{ $date['day_of_week'] === 'Saturday' || $date['day_of_week'] === 'Sunday' ? 'badge badge-sm bg-gradient-success' : '' }}">
                                                {{ $date['day_of_week'] }}</h6>
                                        </td>

                                        <td class="text-center">
                                            <h6 style="margin-left: 20px" class="mb-0">
                                                {{ $date['employee'] }}</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6 style="margin-left: 20px" class="mb-0"> {{ $date['code_employee'] }}
                                            </h6>
                                        </td>
                                        <td class="text-center">
                                            <h6 style="margin-left: 20px" class="mb-0">{{ $date['check_in'] }}</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6 style="margin-left: 20px" class="mb-0">{{ $date['check_out'] }}</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6 style="margin-left: 20px" class="mb-0">{{ $date['workingtime'] }}</h6>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
