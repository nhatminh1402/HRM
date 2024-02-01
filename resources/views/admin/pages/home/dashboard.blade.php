@extends('admin.layouts.app')
@section('title', 'Dashboard')

@section('css')
    <link rel="stylesheet" href="{{ asset('lib/year-picker/yearpicker.css') }}">
    <script src="{{ asset('lib/year-picker/yearpicker.js') }}"></script>
@endsection

@section('content')
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <strong>BIỂU ĐỒ MÔ TẢ BIẾN ĐỘNG NHÂN SỰ TRONG NĂM</strong>
                    </div>
                    <div id="select-year-employee-area">
                        <input name="year" style="width: 140px" id="selectYearPickerEmployee" type="text"
                            class="form-select yearpicker" value="">
                        <div class="err-area invalid-feedback"></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="example">
                        <div class="tab-content rounded-bottom">
                            <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1000">
                                <canvas id="chartEmployee" style="width:100%; height: 370px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-4">
                <div style="height: 59px" class="card-header d-flex align-items-center"><strong>PHÒNG BAN</strong></div>
                <div class="card-body">
                    <div class="example">
                        <div class="tab-content rounded-bottom">
                            <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1001">
                                <div class="c-chart-wrapper">
                                    <canvas id="chartDepartment" style="width:100%;max-width:600px; height: 430px"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-4">
                <div style="height: 59px" class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <strong>DỰ ÁN</strong>
                    </div>
                    <div id="select-year-project-area">
                        <input name="year" style="width: 140px" id="selectYearPickerProject" type="text"
                            class="form-select yearpicker" value="">
                        <div class="err-area invalid-feedback"></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="example">
                        <div class="tab-content rounded-bottom">
                            <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1002">
                                <div class="c-chart-wrapper">
                                    <canvas id="chartProject" style="width:100%;max-width:600px; height:430px"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endsection
