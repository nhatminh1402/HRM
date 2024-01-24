<?php

namespace App\Http\Controllers\User\leave;


use App\Http\Controllers\Controller;
use App\Services\Leave\LeaveService;
use Illuminate\Http\Request;


class LeaveController extends Controller
{
    private $leaveService;

    public function __construct(LeaveService $leaveService)
    {
        $this->leaveService = $leaveService;
    }

    public function index()
    {
        $leaves = $this->leaveService->getByEmployeeId(auth()->guard('employee')->user()->id);
        return view('user.pages.leave_list', compact('leaves'));
    }

    public function create(Request $request)
    {
        $leave = $this->leaveService->createLeave($request);
        return redirect()->route('user.leave.detailEmail', $leave->id)->with('success', 'Tạo đơn thành công');
    }

    public function detail($id)
    {
        $leave = $this->leaveService->getLeaveDetail($id);
        return view('user.pages.leave_detailEmail', compact('leave'));
    }

    public function admingetleaves()
    {
        $leaves = $this->leaveService->getAllLeaves();
        return view('admin.pages.leave.leave-list', compact('leaves'));
    }

    public function adminGetDetailLeave($id)
    {
        $leave = $this->leaveService->getLeaveDetail($id);
        return view('admin.pages.leave.leave-detail', compact('leave'));
    }

    public function adminAcceptLeave($id)
    {
        $this->leaveService->acceptLeave($id);
        return redirect()->back()->with('success', 'Duyệt đơn thành công.');
    }

    public function adminNonAcceptLeave($id)
    {
        $this->leaveService->nonAcceptLeave($id);
        return redirect()->back()->with('success', 'Xác nhận đơn đã không được duyệt.');
    }
}
