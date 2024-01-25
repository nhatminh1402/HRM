@extends('admin.layouts.app')
@section('title', 'List leave')
@section('page-title', 'Danh sách đơn')
@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4 class="mb-4">Danh sách đơn nghi phép </h4>
            <div class="bg-white rounded shadow p-3 mb-4 mt-4">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">STT</th>
                            <th class="text-center" scope="col">Mã nhân viên</th>
                            <th class="text-center" scope="col">Tên nhân viên</th>
                            <th class="text-center" scope="col">Ngày làm đơn</th>
                            <th class="text-center" scope="col">Trạng thái</th>
                            <th class="text-center" scope="col">Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($leaves))
                            @foreach ($leaves as $key => $leave)
                                <tr>
                                    <td class='text-center'>{{ $key + 1 }}</td>
                                    <td class='text-center'>{{ $leave->employee->code_employee }}</td>
                                    <td class='text-center'>{{ $leave->employee->full_name }}</td>
                                    <td class='text-center'>{{ $leave->created_at->format('d-m-Y') }}</td>
                                    <td class='text-center'>
                                        <h6 style="margin-left: 20px" class="mb-0">
                                            @if ($leave->status == 0)
                                                <span class="rounded bg-warning text-white small font-weight-bold p-1">Đang chờ</span>
                                            @elseif ($leave->status == 1)
                                                <span class="rounded bg-success text-white small font-weight-bold p-1">Đã duyệt</span>
                                            @elseif ( $leave->status == 2)
                                                <span class="rounded bg-danger text-white small font-weight-bold p-1">Không duyệt</span>
                                            @endif
                                        </h6>
                                    </td>
                                    <td class='text-center'>
                                        <a class="btn btn-warning" href="{{ route('admin.leave.detail', $leave->id) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16"
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
                                                    fill="#fff" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                {{ $leaves->links() }}
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
