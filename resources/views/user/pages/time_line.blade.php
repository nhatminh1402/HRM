@extends('user.layouts.base')

{{-- Định nghĩa tiêu đề --}}
@section('title', 'TIME LINE')

@section('breadcrumb-item-after', 'Lương cá nhân')
@section('breadcrumb-item-before', 'Lịch sử làm việc')

{{-- Đinh nghĩa nội dung cho trang index ở đây --}}
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Thông tin lịch sử làm việc</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                        Vị trí
                                    </th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Ngày bắt đầu</th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Lương cơ bản
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($timelineInfor as $timeline)
                                    <tr>
                                        <td>
                                            <h5 style="text-align: center" class="mb-0 ">
                                                {{ $timeline->position->name }}
                                            </h5>
                                        </td>
                                        <td class="align-middle">
                                            <h5 style="text-align: center" class="mb-0 ">
                                                {{ $timeline->created_at->format('d-m-Y')   }}
                                            </h5>
                                        </td>
                                        <td>
                                            <h5 style="text-align: center" class="mb-0">
                                                {{ number_format($timeline->basic_salary, 0, '', ',') . ' VNĐ' }}
                                            </h5>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $timelineInfor->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
