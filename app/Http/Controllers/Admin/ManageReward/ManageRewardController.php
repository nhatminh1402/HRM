<?php

namespace App\Http\Controllers\Admin\ManageReward;

use App\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateRewardRequest;
use Illuminate\Http\Request;

class ManageRewardController extends Controller
{
    public function create()
    {
        // auto genarate reward code
        $rewardCode = Helpers::generateCode("MKV");
        return view("admin.pages.reward.manage_reward", compact("rewardCode"));
    }

    public function store(CreateRewardRequest $request)
    {
    }
}
