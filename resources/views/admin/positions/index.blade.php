@extends('layouts.admin.app')

@section('title', 'Position')

@section('css')

@endsection

@section('content')
    <h2 class="mb-4 pb-2 border-bottom text-primary">Chức vụ</h2>
    <div class="row ml-4">
        <div class="col-12 mb-4">
            <form action="">
                <div class="mb-3">
                    <label for="code" class="form-label mb-2 font-weight-bold">Mã chức vụ</label>
                    <input type="email" class="form-control" id="code">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label mb-2 font-weight-bold">Tên chức vụ</label>
                    <input type="email" class="form-control" id="name">
                </div>
                <div class="mb-3">
                    <label for="salary" class="form-label mb-2 font-weight-bold">Lương ngày</label>
                    <input type="email" class="form-control" id="salary">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label mb-2 font-weight-bold">Mô tả</label>
                    <textarea class="form-control" id="description" rows="50" cols="50"></textarea>
                </div>
                <div class="mb-3">
                    <label for="create_date" class="form-label mb-2 font-weight-bold">Ngày tạo</label>
                    <input type="email" class="form-control" id="create_date">
                </div>
                <button class="btn btn-success">Thêm chức vụ</button>
            </form>
        </div>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h3 class="h3">Danh sách chức vụ </h3>
            </div>
        </div>
        <div class="card">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start text-center">STT</th>
                            <th class="border-0  text-center">Mã chức vụ</th>
                            <th class="border-0  text-center">Tên chức vụ</th>
                            <th class="border-0  text-center">Lương ngày</th>
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
                            <td class='text-center'>Phó giám đốc</td>
                            <td class='text-center'>560, 000đ</td>
                            <td class='text-center'>Giám đốc kinh doanh</td>
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
                            <td class='text-center'>2</td>
                            <td class='text-center'>MCV2153232001</td>
                            <td class='text-center'>Phó giám đốc</td>
                            <td class='text-center'>560, 000đ</td>
                            <td class='text-center'>Giám đốc kinh doanh</td>
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
                            <td class='text-center'>3</td>
                            <td class='text-center'>MCV2153232001</td>
                            <td class='text-center'>Phó giám đốc</td>
                            <td class='text-center'>560, 000đ</td>
                            <td class='text-center'>Giám đốc kinh doanh</td>
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

@section('script')

    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>

@endsection
