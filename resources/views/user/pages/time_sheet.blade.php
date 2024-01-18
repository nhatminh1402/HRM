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
                        <h6 class="text-white text-capitalize ps-3"> ATTENDANCE TIME SHEET</h6>
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
                                                <input type="text" class="form-control" onfocus="focused(this)"
                                                    onfocusout="defocused(this)" placeholder="Search">
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                                <tr class="text-center">
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        MÃ NHÂN VIÊN</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        TÊN NHÂN VIÊN</th>

                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        CHECK IN DATE</th>
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
                                @if (!empty($timesheets))
                                    
                               @foreach ( $timesheets as $ket=>$item )
                                <tr>
                                    <td class="text-center">
                                        <h6 style="margin-left: 20px" class="mb-0">{{ $item->employee->code_employee}}</h6>
                                    </td>
                                    <td class="text-center">
                                        <h6 style="margin-left: 20px" class="mb-0">{{ $item->employee->full_name}}</h6>
                                    </td>
                                    <td class="text-center">
                                        <h6 style="margin-left: 20px" class="mb-0">{{ $item->created_at->format('d/m/Y') }}</h6>
                                    </td>
                                    <td class="text-center">
                                        <h6 style="margin-left: 20px" class="mb-0">{{ $item->created_at->format('H:i') }}</h6>
                                    </td>
                                    <td class="text-center">
                                        <h6 style="margin-left: 20px" class="mb-0">{{ $item->updated_at->format('H:i') }}</h6>
                                    </td>
                                    <td class="text-center">
                                        <h6 style="margin-left: 20px" class="mb-0">{{ $item->workingtime }}</h6>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
