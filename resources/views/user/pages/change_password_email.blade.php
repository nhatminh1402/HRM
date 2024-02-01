<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>

<body style="font-family: Arial, sans-serif;">

    <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <h2 style="text-align: center;">Cấp lại mật khẩu cho tài khoản của bạn</h2>

        <p>Xin chào,</p>

        <p>Chúng tôi đã nhận được yêu cầu của bạn để cấp lại mật khẩu cho tài khoản của bạn.
        </p>

        <p>Vui lòng nhấp vào nút bên dưới để cấp lại mật khẩu của bạn:</p>

        <div style="text-align: center;">
            <a href="{{ route('forgotPassword.form', ['employee_id' => $employee->id, 'token' => $employee->remember_token]) }}"
                style="display: inline-block; background-color: #007bff; color: #ffffff; text-decoration: none; padding: 10px 20px; border-radius: 5px;">Cấp
                lại mật khẩu</a>
        </div>

        <p>Nếu bạn không thực hiện yêu cầu này, vui lòng bỏ qua email này.</p>

        <p>Xin cảm ơn.</p>

        <p>Trân trọng</p>
    </div>

</body>

</html>
