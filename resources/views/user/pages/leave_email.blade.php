<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>

<body>
    <h1>Đơn xin nghỉ phép</h1>
    <p>Kính gửi ban điều hành, bộ phận nhân sự Công ty Deha Việt Nam</p>
    <p>Tôi, {{ $mailData['name'] }}, là nhân viên tại Deha chi nhánh Huế với vai trò {{ $mailData['position'] }}. Tôi viết
        đơn này để xin nghỉ phép trong thời gian dưới đây:</p>
    <ul>
        <li>Ngày bắt đầu nghỉ:{{ $mailData['startleave'] }}</li>
        <li>Ngày kết thúc: {{ $mailData['endleave'] }}</li>
        <li>Tổng số ngày nghỉ: {{ $mailData['number_days'] }}</li>
    </ul>
    <p>Tôi xin được nghỉ phép vì: {!! $mailData['decsription'] !!}. Tôi cam đoan sẽ hoàn thành tất cả các công việc trước
        khi nghỉ và chắc chắn rằng không gây ảnh hưởng đến sự hoạt động của công ty/đơn vị.</p>
    <p>Tôi đã thông báo về việc nghỉ này cho đồng nghiệp và tôi sẽ cung cấp mọi thông tin cần thiết để đảm bảo sự liên
        tục trong công việc.</p>
    <p>Tôi xin chân thành cảm ơn sự đồng thuận và sự chấp thuận của bạn. Mong nhận được sự phê duyệt từ phía quý công
        ty/đơn vị.</p>
    <p>Trân trọng,</p>
    <p>{{ $mailData['name'] }}</p>
    <p>{{ $mailData['position'] }}</p>
    <p>{{ $mailData['phonenumber'] }}</p>
    <p>{{ $mailData['email'] }}</p>
</body>
</html>
