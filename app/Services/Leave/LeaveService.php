<?php

namespace App\Services\Leave;

use App\Helpers;
use App\Mail\SampleMail;
use App\Repositories\Employee\EmployeeRepository;
use App\Repositories\Leave\LeaveRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class LeaveService
{
    private $leaveRepository;
    private $userRepository;
    const EMAIL_ADMIN = 'phuoc250320@gmail.com';
    public function __construct(LeaveRepository $leaveRepository, EmployeeRepository $userRepository)
    {
        $this->leaveRepository = $leaveRepository;
        $this->userRepository = $userRepository;
    }

    public function getByEmployeeId($employeeId)
    {
        return $this->leaveRepository->getByEmployeeId($employeeId);
    }
    
    public function createLeave($request)
    {
        $data = $request->all();
        $idUser = Auth::guard('employee')->user()->id;
        $data['employee_id'] = $idUser;
        $employee = $this->userRepository->getById($idUser);
        $dataHtml = $data;

        $content = [
            'name' => $employee->full_name,
            'position' => $employee->position->name,
            'phonenumber' => $employee->phone_number,
            'email' => $employee->email,
            'startleave' => $dataHtml['start_leave'],
            'endleave' => $dataHtml['end_leave'],
            'number_days' => $dataHtml['number_days'],
            'decsription' => $dataHtml['description'],
        ];
        Mail::to(self::EMAIL_ADMIN)->send(new SampleMail($content));
        $leave = $this->leaveRepository->create($dataHtml);
        return $leave;
    }

    public function getLeaveDetail($id)
    {
        $leave = $this->leaveRepository->getById($id);
        return $leave;
    }

    public function getAllLeaves()
    {
        return $this->leaveRepository->getAllLeaves();
    }

    public function acceptLeave($id)
    {
        return $this->leaveRepository->updateStatus($id, 1);
    }

    public function nonAcceptLeave($id)
    {
       return $this->leaveRepository->updateStatus($id, 2);
    }
}