@extends('layouts.user.base')

{{-- Định nghĩa tiêu đề --}}
@section('title', 'Trang chủ')

@section('breadcrumb-item-after', "Trang chủ")
    
{{-- Đinh nghĩa nội dung cho trang index ở đây --}}
@section('content')
    {{-- Nội dung mẫu, sửa đổi nội dung ở đây --}}
    @include('layouts.user.content')
@endsection
