<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ChangePasswordRequest;
use App\Http\Requests\Auth\UpdatePasswordRequest;
use App\Http\Requests\ForgotPasswordRequest;
use App\Mail\ForgotPasswordMail;
use App\Services\Employee\EmployeeService;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Mail;

class PasswordController extends Controller
{
    private $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function showViewChangePassword()
    {
        return view('user.pages.change_password');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $user = Auth::guard('employee')->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không chính xác.']);
        }

        $user->update(['password' => $request->new_password]);
        toastr()->success('Cập nhật mật khẩu thành công!');
        return redirect()->route('user.view-change-password');
    }

    public function showViewForgotPassword()
    {
        return view('user.pages.forgot_password');
    }

    public function sendMailToUpdatePassword(ForgotPasswordRequest $request)
    {
        $employee = $this->employeeService->findByEmail($request->email);
        $employee->remember_token = \Str::random(40);
        $employee->save();
        Mail::to($employee->email)->send(new ForgotPasswordMail($employee));

        return redirect()
            ->back()
            ->withInput()
            ->with('message_success', 'Hệ thống đã gởi yêu cầu kích hoạt lại mật khẩu tại địa chỉ email bạn vừa cung cấp.');
    }

    public function showFormUpdate($employee_id, $token)
    {
        $employee = $this->employeeService->verifyToken($employee_id, $token);

        if (empty($employee)) {
            return abort(404);
        } else {
            return view('user.pages.update_password', compact('employee_id', 'token'));
        }
    }

    public function update(UpdatePasswordRequest $request, $employee_id, $token)
    {
        $employee = $this->employeeService->verifyToken($employee_id, $token);

        if (empty($employee)) {
            return abort(404);
        } else {
            $employee->update(['password' => $request->password, 'remember_token' => null]);
            return redirect()
                ->route('login.index')
                ->with('success', 'Cập nhật thành công! Đăng nhập để tiếp tục.');
        }
    }
}
