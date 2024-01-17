<?php

namespace App\Repositories\Location\Ward;

use App\Models\Ward;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Location\Ward\WardRepository;
use App\Validators\Location\Ward\WardValidator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;

/**
 * Class WardRepositoryEloquent.
 *
 * @package namespace App\Repositories\Location\Ward;
 */
class WardRepositoryEloquent extends BaseRepository implements WardRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Ward::class;
    }

    public function getWardsByDistrcitId($district_id)
    {
        try {
            $listWards = $this->model->where("district_id", $district_id)->get(["id", "name"]);
            return response()->json(['wards' => $listWards], Response::HTTP_OK);
        } catch (ModelNotFoundException $ex) {
            return response()->json(['message' => 'Phường/xã không tồn tại.'], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
