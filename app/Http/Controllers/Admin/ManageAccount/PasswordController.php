<?php

namespace App\Http\Controllers\Admin\ManageAccount;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ChangePasswordRequest;
use Auth;
use Hash;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function ChangePassword()
    {
        return view('admin.pages.user.change_password');
    }

    public function saveChangePassword(ChangePasswordRequest $request)
    {
        $user = Auth::user();
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không chính xác.']);
        }

        $user->update(['password' => $request->new_password]);
        toastr()->success('Cập nhật mật khẩu thành công!');
        return redirect()->route('user.change-password');
    }
}
