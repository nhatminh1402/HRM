<?php

namespace App\Http\Controllers\Admin\ManageReward;

use App\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateRewardRequest;
use App\Services\Reward\RewardService;
use Illuminate\Http\Request;

class ManageRewardController extends Controller
{
    private $rewardService;

    public function __construct(RewardService $rewardService)
    {
        $this->rewardService = $rewardService;
    }

    public function create()
    {
        // auto genarate reward code
        $rewardCode = Helpers::generateCode("MKV");
        return view("admin.pages.reward.manage_reward", compact("rewardCode"));
    }

    public function store(CreateRewardRequest $request)
    {
        $data = $request->all();
        $this->rewardService->create($data);
        toastr()->success('THÊM MỚI THÀNH CÔNG');
        return redirect()->route("admin.reward.index");
    }
}
