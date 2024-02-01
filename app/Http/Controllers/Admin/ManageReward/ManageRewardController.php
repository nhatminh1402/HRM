<?php

namespace App\Http\Controllers\Admin\ManageReward;

use App\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateRewardRequest;
use App\Http\Requests\Admin\UpdateRewardRequest;
use App\Models\Reward;
use App\Services\Reward\RewardService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ManageRewardController extends Controller
{
    private $rewardService;

    public function __construct(RewardService $rewardService)
    {
        $this->rewardService = $rewardService;
    }

    public function create(Request $request)
    {
        session()->forget('url_previous');
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
        return response()->json([], Response::HTTP_CREATED);
    }

    public function delete($id)
    {
        $this->rewardService->delete($id);
        return back()->with('success', 'Xóa thành công!');
    }

    public function update(UpdateRewardRequest $requets, $id)
    {
        $this->rewardService->update($requets->all(), $id);
        return response()->json([], Response::HTTP_OK);
    }

    public function find($id)
    {
        return $this->rewardService->find($id);
    }
}
