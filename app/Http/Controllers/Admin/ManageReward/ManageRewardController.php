<?php

namespace App\Http\Controllers\Admin\ManageReward;

use App\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateRewardRequest;
use App\Models\Reward;
use App\Services\Reward\RewardService;
use Illuminate\Http\Request;

class ManageRewardController extends Controller
{
    private $rewardService;

    public function __construct(RewardService $rewardService)
    {
        $this->rewardService = $rewardService;
    }

    public function create(Request $request)
    {
        //get list employee
        $listRewards = $this->rewardService->search();
        // auto genarate reward code
        $rewardCode = Helpers::generateCode('MKV');
        return view('admin.pages.reward.manage_reward', compact('rewardCode', 'listRewards'));
    }

    public function store(CreateRewardRequest $request)
    {
        $data = $request->all();
        $this->rewardService->create($data);
        toastr()->success('THÊM MỚI THÀNH CÔNG');
        return redirect()->route('admin.reward.index');
    }

    public function delete($id)
    {
        $this->rewardService->delete($id);
        return back()->with('success', 'Xóa thành công!');
    }

    public function show(Request $requets)
    {
        if ($requets->has('id')) {
            $id = $requets->id;
            $reward = $this->rewardService->find($id);
            return view('admin.pages.reward.update_reward', compact('reward'));
        }
        return abort(404);
    }

    public function update(CreateRewardRequest $requets)
    {
        if ($requets->has('id')) {
            $id = $requets->id;
            $this->rewardService->update($requets->all(), $id);
            return redirect()->route('admin.reward.index', $requets->except('id'))->with("success", "CẬP NHẬT THÀNH CÔNG!");
        }
        return abort(404);
    }
}
