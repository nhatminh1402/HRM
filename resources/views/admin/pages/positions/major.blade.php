@extends('admin.layouts.app')

@section('title', 'Major')

@section('content')
    <h2 class="mb-4 pb-2 border-bottom text-primary">Chuyên môn</h2>
    <div class="row ml-4">
        <div class="col-12 mb-4">
            <form action="">
                <div class="mb-3">
                    <label for="code_major" class="form-label mb-2 font-weight-bold">Mã chuyên môn</label>
                    <input type="text" class="form-control" id="code_">
                </div>
                <div class="mb-3">
                    <label for="name_major" class="form-label mb-2 font-weight-bold">Tên chuyên môn</label>
                    <input type="text" class="form-control" id="name_major">
                </div>
                <div class="mb-3">
                    <label for="code_degree" class="form-label mb-2 font-weight-bold">Mã bằng cấp</label>
                    <input type="text" class="form-control" id="code_degree">
                </div>
                <div class="mb-3">
                    <label for="name_degree" class="form-label mb-2 font-weight-bold">Tên bằng cấp</label>
                    <input type="text" class="form-control" id="name_degree">
                </div>  <div class="mb-3">
                    <label for="create_by" class="form-label mb-2 font-weight-bold">Người tạo</label>
                    <input type="text" class="form-control" id="create_by">
                </div>
                <div class="mb-3">
                    <label for="create_date" class="form-label mb-2 font-weight-bold">Ngày tạo</label>
                    <input type="date" class="form-control" id="create_date">
                </div>
                <button class="btn btn-success">Thêm chuyên môn</button>
            </form>
        </div>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h3 class="h3">Danh sách chuyên môn </h3>
            </div>
        </div>
        <div class="card">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start text-center">STT</th>
                            <th class="border-0  text-center">Mã chuyên ngành</th>
                            <th class="border-0  text-center">Tên chuyên ngành</th>
                            <th class="border-0  text-center">Mã bằng cấp</th>
                            <th class="border-0  text-center">Tên bằng cấp</th>
                            <th class="border-0  text-center">Mô tả</th>
                            <th class="border-0  text-center">Người tạo</th>
                            <th class="border-0  text-center">Ngày tạo</th>
                            <th class="border-0  text-center">Người sửa</th>
                            <th class="border-0  text-center">Ngày sửa</th>
                            <th class="border-0  text-center rounded-end">Sửa</th>
                            <th class="border-0  text-center rounded-end">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class='text-center'>1</td>
                            <td class='text-center'>MCV2153232001</td>
                            <td class='text-center'>Công nghệ thông tin</td>
                            <td class='text-center'>MBC6456165462</td>
                            <td class='text-center'>Đại học</td>
                            <td class='text-center'>Đại học khoa học</td>
                            <td class='text-center'>Admin</td>
                            <td class='text-center'>2024-01-01 01:10:10</td>
                            <td class='text-center'>Admin</td>
                            <td class='text-center'>2024-01-01 01:10:10</td>
                            <td class='text-center'>
                                <a href="" class="btn btn-warning">Sửa</a>
                            </td>
                            <td class='text-center'>
                                <a href="" class="btn btn-danger">Xóa</a>
                            </td>
                        </tr>
                        <tr>
                            <td class='text-center'>1</td>
                            <td class='text-center'>MCV2153232001</td>
                            <td class='text-center'>Công nghệ thông tin</td>
                            <td class='text-center'>MBC6456165462</td>
                            <td class='text-center'>Đại học</td>
                            <td class='text-center'>Đại học khoa học</td>
                            <td class='text-center'>Admin</td>
                            <td class='text-center'>2024-01-01 01:10:10</td>
                            <td class='text-center'>Admin</td>
                            <td class='text-center'>2024-01-01 01:10:10</td>
                            <td class='text-center'>
                                <a href="" class="btn btn-warning">Sửa</a>
                            </td>
                            <td class='text-center'>
                                <a href="" class="btn btn-danger">Xóa</a>
                            </td>
                        </tr><tr>
                            <td class='text-center'>1</td>
                            <td class='text-center'>MCV2153232001</td>
                            <td class='text-center'>Công nghệ thông tin</td>
                            <td class='text-center'>MBC6456165462</td>
                            <td class='text-center'>Đại học</td>
                            <td class='text-center'>Đại học khoa học</td>
                            <td class='text-center'>Admin</td>
                            <td class='text-center'>2024-01-01 01:10:10</td>
                            <td class='text-center'>Admin</td>
                            <td class='text-center'>2024-01-01 01:10:10</td>
                            <td class='text-center'>
                                <a href="" class="btn btn-warning">Sửa</a>
                            </td>
                            <td class='text-center'>
                                <a href="" class="btn btn-danger">Xóa</a>
                            </td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
