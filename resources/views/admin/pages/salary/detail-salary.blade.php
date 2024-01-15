@extends('admin.layouts.app')

@section('title', 'Detail salary')

@section('css')
    <link type="text/css" href="{{ asset('assets/css/user-infor.css') }}" rel="stylesheet">
@endsection


@section('content')
    <h2 class="mb-4 pb-2 border-bottom text-primary">Thông tin nhân viên</h2>
    <h5 class="mb-4 pb-2 border-bottom text-primary">Mã nhân viên: </h5>
    <div class="container">
        <div class="row">
            <div class="column">
                <p>Ảnh nhân viên:</p>
                <img class="image image-lg w-auto" alt="Image placeholder"
                    src="https://chuphinhthe.com/upload/product/1824-quan-3112.jpg">
            </div>
            <div class="column">
                <p>Tên nhân viên: John Doe</p>
                <p>Biệt danh: JD</p>
                <p>Giới tính: Nam</p>
                <p>Ngày sinh: 15/03/1990</p>
                <p>Nơi sinh: Hà Nội</p>
                <p>Tình trạng hôn nhân: Độc thân</p>
                <p>Số CCCD: 123456789</p>
                <p>Ngày cấp: 01/01/2010</p>
                <p>Nơi cấp: Hà Nội</p>
                <p>Nguyên quán: Hà Nội</p>
                <p>Quốc tịch: Việt Nam</p>
                <p>Dân tộc: Kinh</p>
                <p>Tôn giáo: Không</p>
            </div>
            <div class="column" style="background-color:#bbb;">
                <p>Hộ khẩu: Hà Nội</p>
                <p>Trạm trú: Hà Nội</p>
                <p>Bằng cấp: Đại học</p>
                <p>Chuyên môn: Kỹ sư Công nghệ thông tin</p>
                <p>Phòng ban: IT</p>
                <p>Chức vụ: Nhân viên</p>
                <p>Trạng thái: <span class="text-white bg-success rounded fw-bold p-2 ml-3">Đang làm việc</span>
            </div>
        </div>
        <div class="row">
            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div class="mb-3 mb-lg-0">
                    <h5 class="mb-4 pb-2 border-bottom text-primary">Lương nhân viên </h5>
                </div>
            </div>
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="input-group my-3 w-50">
                        <span class="input-group-text">
                            <svg class="icon icon-xs" x-description="Heroicon name: solid/search"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="border-gray-200 text-center rounded-start">STT</th>
                                    <th class="border-gray-200 text-center">Mã lương</th>
                                    <th class="border-gray-200 text-center">Tên Nhân viên</th>
                                    <th class="border-gray-200 text-center">Chức vụ</th>
                                    <th class="border-gray-200 text-center">Lương tháng</th>
                                    <th class="border-gray-200 text-center">Ngày công</th>
                                    <th class="border-gray-200 text-center">Thục lãnh</th>
                                    <th class="border-gray-200 text-center">Ngày chấm</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td class="text-center">ML001</td>
                                    <td class="text-center">John Doe</td>
                                    <td class="text-center">Nhân viên</td>
                                    <td class="text-center">10,000,000</td>
                                    <td class="text-center">20</td>
                                    <td class="text-center">8,000,000</td>
                                    <td class="text-center">2024-01-01</td>
                                   
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td class="text-center">ML001</td>
                                    <td class="text-center">John Doe</td>
                                    <td class="text-center">Nhân viên</td>
                                    <td class="text-center">10,000,000</td>
                                    <td class="text-center">20</td>
                                    <td class="text-center">8,000,000</td>
                                    <td class="text-center">2024-01-01</td>
                                   
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td class="text-center">ML001</td>
                                    <td class="text-center">John Doe</td>
                                    <td class="text-center">Nhân viên</td>
                                    <td class="text-center">10,000,000</td>
                                    <td class="text-center">20</td>
                                    <td class="text-center">8,000,000</td>
                                    <td class="text-center">2024-01-01</td>
                                  
                                </tr>
                                <tr>
                                    <td class="text-center">4</td>
                                    <td class="text-center">ML001</td>
                                    <td class="text-center">John Doe</td>
                                    <td class="text-center">Nhân viên</td>
                                    <td class="text-center">10,000,000</td>
                                    <td class="text-center">20</td>
                                    <td class="text-center">8,000,000</td>
                                    <td class="text-center">2024-01-01</td>
                            
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
@endsection
